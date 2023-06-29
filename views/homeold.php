<?php
// Include necessary files
require_once 'config/config.php';
require_once 'inc/functions.php';

// Function to get the vote results
function getVoteResults()
{
    global $conn;

    $results = array();

    $sql = "SELECT candidate, points FROM Voting_website.miss_agriculture_votes";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $results[$row['candidate']] = $row['points'];
        }
    }

    return $results;
}

// Process vote submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $candidate = isset($_POST['candidate']) ? $_POST['candidate'] : '';

    // Validate the selected candidate
    if ($candidate === '') {
        $response = array('success' => false, 'message' => 'Invalid request.');
        echo json_encode($response);
        exit;
    }

    // Save the vote in the database for each candidate
    if ($candidate === 'Joy Model Challenge') {
        if (submitVote($candidate)) {
            // Increment the vote points for the selected candidate
            incrementVotePoints($candidate);

            $response = array('success' => true, 'message' => 'Vote submitted successfully for Joy Model Challenge.');
            echo json_encode($response);
            exit;
        } else {
            $response = array('success' => false, 'message' => 'Error submitting the vote for Joy Model Challenge.');
            echo json_encode($response);
            exit;
        }
    } elseif ($candidate === 'Miss Agriculture') {
        if (submitVote($candidate)) {
            // Increment the vote points for the selected candidate
            incrementVotePoints($candidate);

            $response = array('success' => true, 'message' => 'Vote submitted successfully for Miss Agriculture.');
            echo json_encode($response);
            exit;
        } else {
            $response = array('success' => false, 'message' => 'Error submitting the vote for Miss Agriculture.');
            echo json_encode($response);
            exit;
        }
    } else {
        $response = array('success' => false, 'message' => 'Invalid candidate selection.');
        echo json_encode($response);
        exit;
    }
}

// Get the vote results
$results = getVoteResults();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting Website</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<?php include 'inc/header.php'; ?>
<body>
    <section id="hero">
        <h1>Welcome to Media Billo Voting</h1>
        <p>Every Vote is Needed!</p>
    </section>
    <section class="column-container">
    <section class="column">
        <h2>Vote, Miss Agriculture Ghana 2023</h2>
        <form id="voting-form" action="home.php" method="POST">
            <label for="candidate-selection">List of Contestant</label>
            <select id="candidate-selection" name="candidate">
            <option value="">Select a Contestant</option>
            <option value="Adom">Adom (Agro processing)</option>
<option value="Mawuena">Mawuena(Aquaculture)</option>
<option value="Ruth">Ruth(Poultry production)</option>
<option value="Najat">Najat (Agro processing)</option>
<option value="Franca">Franca (Poultry production)</option>
<option value="Eunice">Eunice (ineapple farming and production)</option>
<option value="Tracy ">Tracy (Maize and Soya Bean production)</option>
<option value="Gifty">Gifty (Maize farming)</option>
<option value="Dora">Dora (Piggery)</option>
<option value="Eugenia">Eugenia (Gari production)</option>

            </select>
            <button type="button" id="vote-button"> Vote </button>
        </form>
        <?php if (isset($success_message)) : ?>
            <p class="success"><?php echo $success_message; ?></p>
        <?php elseif (isset($error_message)) : ?>
            <p class="error"><?php echo $error_message; ?></p>
        <?php endif; ?>
   
    <section id="results">
        <h2>Vote Results</h2>
        <div class="result-chart">
    <?php
    if ($results) {
        $maxVotes = max($results);
        $colorClasses = array('green', 'yellow', 'blue', 'magenta', 'red'); // Color classes in the specified order
        $percentageRanges = array(82, 65, 40, 30, 10); // Percentage ranges for color assignment
        
        foreach ($results as $candidate => $votes) {
            $percentage = ($votes / $maxVotes) * 100;
            $colorClass = '';
        
            if ($percentage >= $percentageRanges[0]) {
                $colorClass = $colorClasses[0]; // Assign 'green' color
            } elseif ($percentage >= $percentageRanges[1]) {
                $colorClass = $colorClasses[1]; // Assign 'yellow' color
            } elseif ($percentage >= $percentageRanges[2]) {
                $colorClass = $colorClasses[2]; // Assign 'blue' color
            }elseif ($percentage >= $percentageRanges[3]) {
                $colorClass = $colorClasses[3]; // Assign 'magenta' color
            } else {
                $colorClass = $colorClasses[4]; // Assign 'red' color
            }
        
            echo '<div class="result-bar ' . $colorClass . '">';
            echo '<span class="candidate-name">' . $candidate . '</span>';
            echo '<div class="bar-container">';
            echo '<div class="bar"  ' . $percentage . '%;"></div>';
            echo '</div>';
            echo '<span class="percentage">' . $percentage . '%</span>';
            echo '</div>';
        }
    } else {
        echo 'No results available.';
    }
    ?>
</div> </section> </section><hr>
<!-- /*  joy model* */ -->
    <section class="column">
        <h2>Vote,The Joy Model Challenge 2023(coming soon)</h2>
        <form id="voting-form" action="home.php" method="POST">
            <label for="candidate-selection">List of Contestant</label>
            <select id="candidate-selection" name="candidate">
                <option value="">Select a Contestant</option>
                <option value="Elinam"> Elinam </option>
                <option value="Akua"> Akua </option>
                <option value="Adjoa"> Adjoa </option>
                <option value="Nyarkoa"> Nyarkoa </option>
                <option value="Gwagwalada"> Gwagwalada </option>
            </select>
            <button type="submit" id="vote-button">Vote</button>

        </form>
        <?php if (isset($success_message)) : ?>
            <p class="success"><?php echo $success_message; ?></p>
        <?php elseif (isset($error_message)) : ?>
            <p class="error"><?php echo $error_message; ?></p>
        <?php endif; ?>
    
    <section id="results">
        <h2>Vote Results</h2>
        <div class="result-chart1">
    <?php
    if ($results) {
        $maxVotes = max($results);
        $colorClasses = array('green', 'yellow', 'blue', 'magenta', 'red'); // Color classes in the specified order
        $percentageRanges = array(82, 65, 40, 30, 10); // Percentage ranges for color assignment
        
        foreach ($results as $candidate => $votes) {
            $percentage = ($votes / $maxVotes) * 100;
            $colorClass = '';
        
            if ($percentage >= $percentageRanges[0]) {
                $colorClass = $colorClasses[0]; // Assign 'green' color
            } elseif ($percentage >= $percentageRanges[1]) {
                $colorClass = $colorClasses[1]; // Assign 'yellow' color
            } elseif ($percentage >= $percentageRanges[2]) {
                $colorClass = $colorClasses[2]; // Assign 'blue' color
            }elseif ($percentage >= $percentageRanges[3]) {
                $colorClass = $colorClasses[3]; // Assign 'magenta' color
            } else {
                $colorClass = $colorClasses[4]; // Assign 'red' color
            }
        
            echo '<div class="result-bar ' . $colorClass . '">';
            echo '<span class="candidate-name">' . $candidate . '</span>';
            echo '<div class="bar-container">';
            echo '<div class="bar"  ' . $percentage . '%;"></div>';
            echo '</div>';
            echo '<span class="percentage">' . $percentage . '%</span>';
            echo '</div>';
        }
        
    } else {
        echo 'No results available.';
    }
    ?>
</div>
   </section>  </section></section>
    <?php include 'inc/footer.php'; ?>

    <div id="popup-container">
        <div id="popup-content">
            <h3>Enter Your Phone Number or 
            dial<p> *920*36*2# to continue the vote</h3></p>
            <input type="number" id="phone-input" placeholder="Phone Number" required>
            <div id="popup-buttons">
            <button type="button" id="submit-button"> Submit </button>
                <button type="button" id="cancel-button"> Cancel </button>
               
            </div>
        </div>
    </div>
    <div id="success-popup-container">
    <div id="success-popup-content">
        <h3>Partially Success!</h3>
        <p id="success-message">Conform successfully.</p>
        <button type="button" id="close-success-popup-button">Close</button>
    </div>
</div>
<div id="popup-container1">
        <div id="popup-content1">
            <h3>Enter Your Phone Number or 
            dial<p> *920*36*2# to continue the vote</h3></p>
            <input type="number" id="phone-input1" placeholder="Phone Number" required>
            <div id="popup-buttons1">
            <button type="button1" id="submit-button1"> Submit </button>
                <button type="button1" id="cancel-button1"> Cancel </button>
               
            </div>
        </div>
    </div>
<div id="success-popup-container1">
    <div id="success-popup-content1">
        <h3>Partially Success!</h3>
        <p id="success-message1">Conform successfully.</p>
        <button type="button1" id="close-success-popup-button1">Close</button>
    </div>
</div>


    <script src="assets/js/script.js"></script>
</body>

</html>
<script>

// Function to show the popup
function showPopup(message) {
    popupContainer.classList.add('active');
    document.getElementById('popup-message').textContent = message;
}
// Function to show the popup
function showPopup1(message) {
    popupContainer.classList.add('active');
    document.getElementById('popup-message1').textContent = message;
}




</script>