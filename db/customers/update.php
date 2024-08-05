<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = $_POST['password'];

    try {
        $stmt = $conn->prepare("UPDATE Customers SET name=:name, email=:email,password=:password, phone=:phone, address=:address WHERE id=:id");

        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':id', $id);

        $stmt->execute();
        echo "Record updated successfully";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>