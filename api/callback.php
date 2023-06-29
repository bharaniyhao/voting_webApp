<?php

// Retrieve the callback data
$callbackData = json_decode(file_get_contents('php://input'), true);

// Process the callback data
if ($callbackData) {
    // Extract the relevant information from the callback data
    $transactionId = $callbackData['transaction_id'];
    $status = $callbackData['status'];
    // Additional data you may want to process
    
    // Perform any necessary actions based on the callback data
    // For example, update your database, send notifications, etc.
    
    // Send a response back to the API to acknowledge the callback
    $response = array('status' => 'success');
    echo json_encode($response);
} else {
    // Invalid callback data
    $response = array('status' => 'error', 'message' => 'Invalid callback data');
    echo json_encode($response);
}
