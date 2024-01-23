<?php
header("Content-Type: application/json");

include "koneksi.php";

$request_method = $_SERVER["REQUEST_METHOD"];

switch ($request_method) {
    case "GET":
        // Handle GET requests
        break;
    case "POST":
        // Handle POST requests
        break;
    case "PUT":
        // Handle PUT requests
        break;
    case "DELETE":
        // Handle DELETE requests
        break;
    default:
        http_response_code(405); // Method Not Allowed
        echo json_encode(["message" => "Invalid request method"]);
        break;
}

$conn->close();
?>
