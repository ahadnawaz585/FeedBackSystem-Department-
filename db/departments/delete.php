<?php
require_once '../../includes/database_connection.php';

// Check if the request contains JSON data
$postData = file_get_contents("php://input");
$data = json_decode($postData);

if ($data && isset($data->id)) {
    $id = $data->id;

    try {
        $stmt = $conn->prepare("DELETE FROM Departments WHERE id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        echo "Record deleted successfully";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request";
}
?>
