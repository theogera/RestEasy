<?php
include '../database.php';

// Create Database Connection
$database = new Database();
$conn = $database->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Take Id From deleteVacationRequestModal.php File
    $requestId = $_POST['id'] ?? null;

    if ($requestId) {
        $stmt = $conn->prepare("DELETE FROM requests WHERE id = ?");
        $stmt->execute([$requestId]);
        if ($stmt->rowCount() > 0) {
            // Success
            $_SESSION['message'] = 'Request deleted successfully.';
        } else {
            $_SESSION['message'] = 'Request not found.';
        }
    } else {
        $_SESSION['message'] = 'No ID provided.';
    }
} else {
    $_SESSION['message'] = 'Method not allowed.';
}

// Return Page
header("Location: requests.php");
exit;