<?php

require_once '../basic-header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = 1;
    $date_from = $_POST['date_from'];
    $date_to = $_POST['date_to'];
    $reason = $_POST['reason'];

    // Change DD/MM/YYYY in YYYY-MM-DD
    $date_from = DateTime::createFromFormat('d/m/Y', $date_from)->format('Y-m-d');
    $date_to = DateTime::createFromFormat('d/m/Y', $date_to)->format('Y-m-d');

    // SQL For new_requests Table
    $sql_new_requests = "INSERT INTO new_requests (user_id, date_from, date_to, reason) VALUES (:user_id, :date_from, :date_to, :reason)";

    // SQL For requests Table
    $sql_requests = "INSERT INTO requests (user_id, date_submit, dates_requested, total_days, reason, status) VALUES (:user_id, NOW(), :dates_requested, :total_days, :reason, 'pending')";

    $db = new Database();
    $conn = $db->getConnection();

    try {
        // Add Data In Table new_requests
        $stmt_new_requests = $conn->prepare($sql_new_requests);
        $stmt_new_requests->bindParam(':user_id', $user_id);
        $stmt_new_requests->bindParam(':date_from', $date_from);
        $stmt_new_requests->bindParam(':date_to', $date_to);
        $stmt_new_requests->bindParam(':reason', $reason);
        $stmt_new_requests->execute();

        // Create dates_requested Column For requests Table
        $dates_requested = $date_from . ' - ' . $date_to;

        // Calculate total_days
        $start_date = new DateTime($date_from);
        $end_date = new DateTime($date_to);
        $interval = $start_date->diff($end_date);
        // Total Days Between The Two Dates
        $total_days = $interval->days;

        // Add Data In Table requests
        $stmt_requests = $conn->prepare($sql_requests);
        $stmt_requests->bindParam(':user_id', $user_id);
        $stmt_requests->bindParam(':dates_requested', $dates_requested);
        $stmt_requests->bindParam(':total_days', $total_days);
        $stmt_requests->bindParam(':reason', $reason);
        $stmt_requests->execute();

        if ($stmt_new_requests->rowCount() > 0) {
            header("Location: requests.php");
            exit();
        } else {
            echo "No rows affected in new_requests.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        var_dump($stmt_new_requests->errorInfo());
    }
}