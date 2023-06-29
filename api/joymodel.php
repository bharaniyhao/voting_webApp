<?php
// Include the configuration file
require_once __DIR__ . '/../config/config.php';

// Function to submit the vote and increment points for Miss Agriculture
function submitJoyModelVote($candidate)
{
    global $conn;

    // Sanitize the input to prevent SQL injection
    $candidate = mysqli_real_escape_string($conn, $candidate);

    // Update the points for the selected candidate
    $sql = "UPDATE joy_model_challenge_votes SET points = points + 1 WHERE candidate = '$candidate'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Vote submission successful
        $response = array('success' => true, 'message' => 'Vote testing submitted successfully.');
    } else {
        // Vote submission failed
        $response = array('success' => false, 'message' => 'Failed to submit vote. Please try again.');
    }

    // Return the response as JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and process the vote submission
    if (isset($_POST['candidate'])) {
        $candidate = $_POST['candidate'];
        submitJoyModelVote($candidate);
    } else {
        // Invalid request, missing candidate parameter
        $response = array('success' => false, 'message' => 'Invalid request. Missing candidate parameter.');
        header('Content-Type: application/json');
        echo json_encode($response);
    }
} else {
    // Invalid request method
    $response = array('success' => false, 'message' => 'Invalid request method.');
    header('Content-Type: application/json');
    echo json_encode($response);
}

?>
