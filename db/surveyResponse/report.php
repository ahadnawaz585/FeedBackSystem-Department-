<?php
require_once '../../includes/database_connection.php';

try {
    $department_id = $_POST['department_id'];

    $stmt = $conn->prepare("
    SELECT 
    sq.id AS question_id,
    sq.questionText AS question_text,
    COALESCE(
        ROUND((SUM(CASE WHEN sr.response = 'Agreed' THEN 1 ELSE 0 END) / NULLIF(COUNT(sr.questionID), 0)) * 100, 2),
        0
    ) AS percent_Agreed,
    COALESCE(
        ROUND((SUM(CASE WHEN sr.response = 'Very Agreed' THEN 1 ELSE 0 END) / NULLIF(COUNT(sr.questionID), 0)) * 100, 2),
        0
    ) AS percent_Very_Agreed,
    COALESCE(
        ROUND((SUM(CASE WHEN sr.response = 'Neutral' THEN 1 ELSE 0 END) / NULLIF(COUNT(sr.questionID), 0)) * 100, 2),
        0
    ) AS percent_Neutral,
    COALESCE(
        ROUND((SUM(CASE WHEN sr.response = 'Not Agreed' THEN 1 ELSE 0 END) / NULLIF(COUNT(sr.questionID), 0)) * 100, 2),
        0
    ) AS percent_Not_Agreed,
    COALESCE(
        ROUND((SUM(CASE WHEN sr.response = 'Strongly Disagree' THEN 1 ELSE 0 END) / NULLIF(COUNT(sr.questionID), 0)) * 100, 2),
        0
    ) AS percent_Strongly_Disagree
FROM 
    surveyquestions sq
LEFT JOIN 
    surveyresponses sr ON sq.id = sr.questionID
WHERE 
    sq.departmentID = :department_id
GROUP BY 
    sq.id, sq.questionText;
    ");

    $stmt->bindParam(':department_id', $department_id, PDO::PARAM_INT);

    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Output data as JSON
    header('Content-Type: application/json');
    echo json_encode($results);
} catch (PDOException $e) {
    // Handle errors
    http_response_code(500);
    echo json_encode(array('error' => $e->getMessage()));
}
?>