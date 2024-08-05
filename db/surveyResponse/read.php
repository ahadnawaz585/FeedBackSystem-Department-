<?php
try {
    $stmt = $conn->prepare("SELECT * FROM SurveyResponses");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        echo "ID: " . $row['id'] . "<br>";
        echo "Customer ID: " . $row['customerID'] . "<br>";
        echo "Department ID: " . $row['departmentID'] . "<br>";
        echo "Question ID: " . $row['questionID'] . "<br>";
        echo "Response: " . $row['response'] . "<br>";
        echo "<br>";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
