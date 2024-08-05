<?php
require_once '../../includes/database_connection.php';

$departmentId = isset($_GET['departmentId']) ? $_GET['departmentId'] : null;

try {
    if ($departmentId !== null) {
        $stmt = $conn->prepare("SELECT * FROM SurveyQuestions WHERE departmentID = :departmentId");
        $stmt->bindParam(':departmentId', $departmentId, PDO::PARAM_INT);
    } else {
        $stmt = $conn->prepare("SELECT * FROM SurveyQuestions");
    }
    
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header('Content-Type: application/json');
    echo json_encode($result);
} catch(PDOException $e) {
    error_log("Error in read.php: " . $e->getMessage());
    http_response_code(500);
    echo json_encode(array("error" => "An error occurred while fetching survey questions"));
}
?>
