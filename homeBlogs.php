<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");
include("config.php");

$sql = "SELECT * FROM blogs ORDER BY created_at DESC limit 6";
$result = $conn->query($sql);

$blogs = [];
while ($row = $result->fetch_assoc()) {
    $row['date'] = date("Y-m-d", strtotime($row['created_at']));
    $row['readTime'] = ceil(str_word_count($row['content']) / 200) . " min read";
    $blogs[] = $row;
}

echo json_encode([
    "success" => true,
    "data" => $blogs
]);
?>
