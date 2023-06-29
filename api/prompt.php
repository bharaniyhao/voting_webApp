<?php
// Include the configuration file
require_once __DIR__ . '/../config/config.php';

// Function to send a prompt using the third-party API
function sendPrompt($phoneNumber) {
    $url = 'https://orchard-api.anmgw.com/sendRequest';
    $clientId = 'YOUR_CLIENT_ID';
    $signature = 'YOUR_SIGNATURE';

    // Prepare the request data
    $requestData = array(
        'callback_url' => 'https://my.callback_url.com/payment/callback',
        "customer_number" => $phoneNumber,
        "exttrid" => $_POST["exttrid"], // Retrieve exttrid from user input
        "nw" => $_POST["nw"], // Retrieve nw from user input
        "reference" => $_POST["reference"], // Retrieve reference from user input
        "service_id" => $_POST["service_id"], // Retrieve service ID from user input
        "trans_type" => $_POST["trans_type"], // Retrieve trans_type from user input
        "ts" => $_POST["ts"] // Retrieve ts from user input
    );

    $headers = array(
        'Authorization: ' . $clientId . ':' . $signature,
        'Content-Type: application/json'
    );

    $curl = curl_init();

    // Set the cURL options
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($requestData));
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    // Execute the request
    $response = curl_exec($curl);

    // Check for errors
    if (curl_errno($curl)) {
        // Prompt sending failed
        $errorMessage = curl_error($curl);
        $response = array('success' => false, 'message' => 'Failed to send prompt: ' . $errorMessage);
    } else {
        // Prompt sent successfully
        $response = array('success' => true, 'message' => 'Prompt sent successfully.', 'response' => json_decode($response, true));
    }

    // Close cURL
    curl_close($curl);

    return $response;
}

// Function to submit the vote and update the points for the selected candidate
function submitMissAgricultureVote($candidate)
{
    global $conn;

    // Sanitize the input to prevent SQL injection
    $candidate = mysqli_real_escape_string($conn, $candidate);

    // Update the points for the selected candidate
    $sql = "UPDATE miss_agriculture_votes SET points = points + 1 WHERE candidate = '$candidate'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Vote submission successful
        $response = array('success' => true, 'message' => 'Vote submitted successfully.');

        // Send a prompt to the phone number entered
        $phoneNumber = $_POST['phone'];
        $promptResponse = sendPrompt($phoneNumber); // Send the prompt and get the response

        if ($promptResponse['success']) {
            // Prompt sent successfully
            $amount = isset($promptResponse['response']['amount']) ? floatval($promptResponse['response']['amount']) : 0;
            $points = floor($amount / 2);

            // Update the candidate points based on the amount received
            $sqlUpdatePoints = "UPDATE miss_agriculture_votes SET points = points + $points WHERE candidate = '$candidate'";
            $resultUpdatePoints = mysqli_query($conn, $sqlUpdatePoints);

            if ($resultUpdatePoints) {
                // Candidate points updated successfully
                $response = array('success' => true, 'message' => 'Vote submitted successfully. Candidate points updated.');
            } else {
                // Failed to update candidate points
                $response = array('success' => false, 'message' => 'Failed to update candidate points.');
            }
        } else {
            // Failed to send prompt
            $response = array('success' => false, 'message' => 'Failed to send prompt: ' . $promptResponse['message']);
        }
    } else {
        // Vote submission failed
        $response = array('success' => false, 'message' => 'Failed to submit vote. Please try again.');
    }

    // Return the response as JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}

?>
