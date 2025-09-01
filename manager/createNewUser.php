<?php
include '../database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $employee_code = $_POST['employee_code'];
    // Change Password For Security
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Connect In Database
    $database = new Database();
    $conn = $database->getConnection();

    try {
        // Query For new_users
        $stmt = $conn->prepare("INSERT INTO new_users (name, email, employee_code, password) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $email, $employee_code, $password]);
        // Query For list_users
        $stmt = $conn->prepare("INSERT INTO list_users (name, email) VALUES (?, ?)");
        $stmt->execute([$name, $email]);

        // Success
        http_response_code(200);
        header('Location: users.php');
        exit();
    } catch (PDOException $e) {
        // Error
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
    }
    $conn = null;
} else {
    // Not Allowed
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed.']);
}
?>