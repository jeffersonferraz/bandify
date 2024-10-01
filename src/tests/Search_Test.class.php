<?php

require 'Database.class.php';  // Path to your Database class
require 'Search.class.php';          // Path to your Search class

$search = new Search();

// Get the request method (POST, GET, PUT, DELETE)
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Handle the request based on the method type
switch ($requestMethod) {
    case 'POST':
        // Create a new post
        $data = json_decode(file_get_contents('php://input'), true);
        if (isset($data['title']) && isset($data['body'])) {
            $search->create($data);
            echo json_encode(['message' => 'Post created successfully.']);
        } else {
            echo json_encode(['message' => 'Invalid input.']);
        }
        break;

    case 'GET':
        // Read a specific post by ID
        if (isset($_GET['id'])) {
            $post = $search->read($_GET['id']);
            if ($post) {
                echo json_encode($post);
            } else {
                echo json_encode(['message' => 'Post not found.']);
            }
        } else {
            echo json_encode(['message' => 'No post ID provided.']);
        }
        break;

    case 'PUT':
        // Update a post
        $data = json_decode(file_get_contents('php://input'), true);
        if (isset($_GET['id']) && isset($data['title']) && isset($data['body'])) {
            $search->update($_GET['id'], $data);
            echo json_encode(['message' => 'Post updated successfully.']);
        } else {
            echo json_encode(['message' => 'Invalid input or post ID.']);
        }
        break;

    case 'DELETE':
        // Delete a post by ID
        if (isset($_GET['id'])) {
            $search->delete($_GET['id']);
            echo json_encode(['message' => 'Post deleted successfully.']);
        } else {
            echo json_encode(['message' => 'No post ID provided.']);
        }
        break;

    default:
        echo json_encode(['message' => 'Invalid request method.']);
        break;
}
?>
