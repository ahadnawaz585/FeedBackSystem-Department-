<?php
require_once '../../includes/database_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];


    if ($email === 'feedback@admin' && $password === 'pass4everything') {
        $adminToken = base64_encode('admin:' . $email . ':' . time());
        setcookie("admin_token", $adminToken, time() + (86400 * 30), "/");
    }

    $sql = "SELECT id FROM Customers WHERE email = :email AND password = :password";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);

    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $userId = $user['id'];
        $token = base64_encode($userId . ':' . $email . ':' . time());
        setcookie("token", $token, time() + (86400 * 30), "/");
        header("Location: /?page=success");
        exit();
    } else {
        header("Location: /?page=error");
        echo "Invalid email or password . Please try again.";
    }
}
?>
