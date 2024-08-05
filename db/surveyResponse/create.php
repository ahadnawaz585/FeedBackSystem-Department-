<?php
require_once '../../includes/database_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $data = json_decode(file_get_contents("php://input"), true);

    foreach ($data as $response) {
        $customerID = $response['customerID'];
        $departmentID = $response['departmentID'];
        $questionID = $response['questionID'];
        $responseValue = $response['response'];

        try {
            $stmt = $conn->prepare("INSERT INTO surveyResponses(customerID, departmentID, questionID, response) VALUES (:customerID, :departmentID, :questionID, :response)");
            $stmt->bindParam(':customerID', $customerID);
            $stmt->bindParam(':departmentID', $departmentID);
            $stmt->bindParam(':questionID', $questionID);
            $stmt->bindParam(':response', $responseValue);
            $stmt->execute();
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    
    echo "Responses inserted successfully!";
}
?>
