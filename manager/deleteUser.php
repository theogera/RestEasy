<?php
include '../database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['deleteUserId'];
    // Connect In Database
    $database = new Database();
    $conn = $database->getConnection();
    try {        
        $stmt = $conn->prepare("DELETE FROM list_users WHERE id = ?");
        $stmt->execute([$userId]);
        http_response_code(200);
        header("Location: users.php");
        exit();
    } catch (PDOException $e) {
        // Error
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => 'Error deleting user: ' . $e->getMessage()]);
    }
    $conn = null;
} else {
    // Not Allowed
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed.']);
}
?>
