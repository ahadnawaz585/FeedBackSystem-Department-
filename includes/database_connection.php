<?php
$servername = "localhost"; //localhost
$username = "feedxkcp_asad";  //root
$password = "pass2use@website"; //password
$dbname = "feedxkcp_feedbacksystem"; //feedbacksyste

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>