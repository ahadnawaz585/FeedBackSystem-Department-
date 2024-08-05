<?php
require_once '../../includes/database_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {
    $name = $_POST['name'];

    try {
        $stmt = $conn->prepare("INSERT INTO Departments (name) VALUES (:name)");
        $stmt->bindParam(':name', $name);
        $stmt->execute();
        echo "Record created successfully";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    header("Location: /?page=error");
    echo "No POST request received";
}
?>