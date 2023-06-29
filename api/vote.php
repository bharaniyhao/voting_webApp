<?php
// Include necessary files
require_once '../inc/functions.php';

// Process vote submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $candidate = $_POST['candidate'];

    // Validate the selected candidate
    if (empty($candidate)) {
        $response = array('success' => false, 'message' => 'Invalid request.');
        echo json_encode($response);
        exit;
    }

    // Save the vote in the database
    if (submitVote($candidate)) {
        // Increment the vote points for the selected candidate
        incrementVotePoints($candidate);

        $response = array('success' => true, 'message' => 'Vote submitted successfully.');
        echo json_encode($response);
        exit;
    } else {
        $response = array('success' => false, 'message' => 'Error submitting the vote.');
        echo json_encode($response);
        exit;
    }
}

// Invalid request
$response = array('success' => false, 'message' => 'Invalid request.');
echo json_encode($response);
exit;
?>
