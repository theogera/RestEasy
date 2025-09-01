<?php
include '../database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['userId'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $database = new Database();
    $conn = $database->getConnection();
    try {
        $stmt = $conn->prepare("UPDATE list_users SET name = ?, email = ? WHERE id = ?");
        $stmt->execute([$name, $email, $userId]);
        // Success
        header("Location: users.php");
        exit();
    } catch (PDOException $e) {
        // Error
        echo json_encode(['success' => false, 'message' => 'Error updating user: ' . $e->getMessage()]);
    }
    $conn = null;
} else {
    // Method Not Allowed
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed.']);
}