<?php
ob_start(); // Start output buffering

$host = "sql112.epizy.com";
$user = "if0_39971671";      
$pass = "3EE710808";    
$db   = "if0_39971671_thoughtflow"; 

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    ob_end_clean(); // Clear any buffered output
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    http_response_code(500);
    echo json_encode(["success" => false, "message" => "Connection failed"]);
    exit();
}
?>
