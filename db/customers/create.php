<?php
require_once '../../includes/database_connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = $_POST['password'];

    try {
        $stmt = $conn->prepare("INSERT INTO Customers (name, email, phone, address,password) VALUES (:name, :email, :phone, :address,:password)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
       header("Location: /?page=success");
        exit();
    } catch(PDOException $e) {
        header("Location: /?page=error");
        echo "Error: " . $e->getMessage();
    }
}
?>
