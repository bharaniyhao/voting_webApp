<?php

// Include the configuration file
require_once __DIR__ . '/../config/config.php';

// Function to submit the vote and increment points for Miss Agriculture
function submitMissAgricultureVote($candidate)
{
    global $conn;

    // Sanitize the input to prevent SQL injection
    $candidate = mysqli_real_escape_string($conn, $candidate);

    // Check if the candidate already exists in the miss_agriculture_votes table
    $sql = "SELECT * FROM miss_agriculture_votes WHERE candidate = '$candidate'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Candidate already exists, increment the points
        $sql = "UPDATE miss_agriculture_votes SET points = points + 1 WHERE candidate = '$candidate'";
        $result = mysqli_query($conn, $sql);
    } else {
        // Candidate does not exist, insert a new row with points = 1
        $sql = "INSERT INTO miss_agriculture_votes (candidate, points) VALUES ('$candidate', 1)";
        $result = mysqli_query($conn, $sql);
    }

    return $result;
}

// Function to increment the vote points for a candidate in Miss Agriculture
function incrementMissAgricultureVotePoints($candidate)
{
    global $conn;

    // Sanitize the input to prevent SQL injection
    $candidate = mysqli_real_escape_string($conn, $candidate);

    // Increment the points for the selected candidate in miss_agriculture_votes table
    $sql = "UPDATE miss_agriculture_votes SET points = points + 1 WHERE candidate = '$candidate'";
    $result = mysqli_query($conn, $sql);

    return $result;
}

// Function to get the vote results for Miss Agriculture
function getMissAgricultureVoteResults()
{
    global $conn;

    $results = array();

    $sql = "SELECT candidate, points FROM miss_agriculture_votes";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $results[$row['candidate']] = $row['points'];
        }
    }

    return $results;
}

// Function to submit the vote and increment points for Joy Model Challenge
function submitJoyModelVote($candidate)
{
    global $conn;

    // Sanitize the input to prevent SQL injection
    $candidate = mysqli_real_escape_string($conn, $candidate);

    // Check if the candidate already exists in the joy_model_challenge_votes table
    $sql = "SELECT * FROM joy_model_challenge_votes WHERE candidate = '$candidate'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Candidate already exists, increment the points
        $sql = "UPDATE joy_model_challenge_votes SET points = points + 1 WHERE candidate = '$candidate'";
        $result = mysqli_query($conn, $sql);
    } else {
        // Candidate does not exist, insert a new row with points = 1
        $sql = "INSERT INTO joy_model_challenge_votes (candidate, points) VALUES ('$candidate', 1)";
        $result = mysqli_query($conn, $sql);
    }

    return $result;
}

// Function to increment the vote points for a candidate in Joy Model Challenge
function incrementJoyModelVotePoints($candidate)
{
    global $conn;

    // Sanitize the input to prevent SQL injection
    $candidate = mysqli_real_escape_string($conn, $candidate);

    // Increment the points for the selected candidate in joy_model_challenge_votes table
    $sql = "UPDATE joy_model_challenge_votes SET points = points + 1 WHERE candidate = '$candidate'";
    $result = mysqli_query($conn, $sql);

    return $result;
}

// Function to get the vote results for Joy Model Challenge
function getJoyModelChallengeVoteResults()
{
    global $conn;

    $results = array();

    $sql = "SELECT candidate, points FROM Voting_website.joy_model_challenge_votes";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $results[$row['candidate']] = $row['points'];
        }
    }

    return $results;
}

// Get the vote results for Miss Agriculture
$missAgricultureResults = getMissAgricultureVoteResults();

// Get the vote results for Joy Model Challenge
$joyModelChallengeResults = getJoyModelChallengeVoteResults();

?>
