<?php
ob_start();

$host = "thought-flow-thoughtflow.e.aivencloud.com";
$port = 27690;
$user = "avnadmin";
$pass = "AVNS_sPIYwL5Dljh5gYP7_fp";
$db = "defaultdb";

// Aiven requires SSL, so we need to set SSL mode
$conn = mysqli_init();

if (!$conn) {
    die("mysqli_init failed");
}

// Set SSL options for Aiven (they require SSL)
$conn->ssl_set(NULL, NULL, NULL, NULL, NULL);

// Connect with SSL
if (!$conn->real_connect($host, $user, $pass, $db, $port, NULL, MYSQLI_CLIENT_SSL)) {
    ob_end_clean();
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    http_response_code(500);
    echo json_encode([
        "success" => false, 
        "message" => "Database connection failed: " . mysqli_connect_error()
    ]);
    exit();
}

// Connection successful - $conn is ready to use
?>
