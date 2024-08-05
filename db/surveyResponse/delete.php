<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id = $_POST['id'];

    try {
        $stmt = $conn->prepare("DELETE FROM SurveyResponses WHERE id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        echo "Response deleted successfully";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
