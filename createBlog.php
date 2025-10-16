<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

include("config.php");

$data = json_decode(file_get_contents("php://input"), true);

if (
    isset($data["title"]) &&
    isset($data["category"]) &&
    isset($data["author"]) &&
    isset($data["readTime"]) &&
    isset($data["excerpt"]) &&
    isset($data["content"])
) {
    $title = $conn->real_escape_string($data["title"]);
    $category = $conn->real_escape_string($data["category"]);
    $author = $conn->real_escape_string($data["author"]);
    $readTime = $conn->real_escape_string($data["readTime"]);
    $excerpt = $conn->real_escape_string($data["excerpt"]);
    $content = $conn->real_escape_string($data["content"]);

    $sql = "INSERT INTO blogs (title, excerpt, content, author, category, created_at)
            VALUES ('$title', '$excerpt', '$content', '$author', '$category', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["success" => true, "message" => "Blog added successfully"]);
    } else {
        echo json_encode(["success" => false, "message" => "Database error: " . $conn->error]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Missing required fields"]);
}

$conn->close();
?>
