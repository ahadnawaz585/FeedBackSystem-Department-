<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['id'];
    $customerID = $_POST['customerID'];
    $departmentID = $_POST['departmentID'];
    $questionID = $_POST['questionID'];
    $response = $_POST['response'];

    try {
        $stmt = $conn->prepare("UPDATE SurveyResponses SET customerID=:customerID, departmentID=:departmentID, questionID=:questionID, response=:response WHERE id=:id");
        $stmt->bindParam(':customerID', $customerID);
        $stmt->bindParam(':departmentID', $departmentID);
        $stmt->bindParam(':questionID', $questionID);
        $stmt->bindParam(':response', $response);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        echo "Response updated successfully";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
