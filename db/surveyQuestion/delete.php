<?php
require_once '../../includes/database_connection.php';

$postData = file_get_contents("php://input");
$data = json_decode($postData);

if ($data && isset($data->id)) {
    $id = $data->id;

    try {
        $stmt = $conn->prepare("DELETE FROM SurveyQuestions WHERE id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        echo "Question deleted successfully";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request";
}
?>
