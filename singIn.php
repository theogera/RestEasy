<?php

require_once 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $db = new Database();
    $conn = $db->getConnection();

    // Check Table manager_accounts
    $stmt = $conn->prepare("SELECT * FROM manager_accounts WHERE username = :username AND password = :password");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $manager = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($manager) {
        header("Location: manager/users.php");
        exit();
    }

    // Check Table employee_accounts
    $stmt = $conn->prepare("SELECT * FROM employee_accounts WHERE username = :username AND password = :password");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $employee = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($employee) {
        header("Location: employee/requests.php");
        exit();
    }

    // If Can't Find Account
    echo "<div id='custom-alert' style='position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #f44336; color: white; padding: 20px; border-radius: 5px; z-index: 1000;'>
            Invalid username or password. Please try again.
          </div>
          <script>
            setTimeout(function() {
                document.getElementById('custom-alert').style.display = 'none';
                window.location.href = 'index.php';
            }, 2000);
          </script>";
    exit();
}
?>