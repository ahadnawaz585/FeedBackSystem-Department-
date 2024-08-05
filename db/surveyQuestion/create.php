<?php
require_once '../../includes/database_connection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {
    $questionTexts = $_POST['questionText']; 
    $departmentID = $_POST['departmentID']; 

    try {
        foreach ($questionTexts as $questionText) {
            $stmt = $conn->prepare("INSERT INTO SurveyQuestions (questionText, departmentID) VALUES (:questionText, :departmentID)");
            $stmt->bindParam(':questionText', $questionText);
            $stmt->bindParam(':departmentID', $departmentID);
            $stmt->execute();
            header("Location: /?page=success");
        }

    } catch(PDOException $e) {
        header("Location: /?page=error");
        exit("Error: " . $e->getMessage()); 
    }
}
?>
