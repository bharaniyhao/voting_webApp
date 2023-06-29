<?php
// Include necessary files
require_once 'config/config.php';
require_once 'inc/functions.php';

?>

<!DOCTYPE html>
<html lang="en">

<?php include 'inc/header.php'; ?>
<body>
    <section id="hero">
        <h1>Welcome to WayStudio Voting site</h1>
        <p>Every Vote is Needed!</p>
    </section>
    <section class="column-container">
            <section class="column">
                <h2>Vote for Miss Agriculture Ghana 2023</h2>
                <form id="miss-agriculture-voting-form" action="api/missagri.php" method="POST">
                    <label for="miss-agriculture-candidate-selection">List of Contestants</label>
                    <select id="miss-agriculture-candidate-selection" name="candidate">
                        <option value="">Select a Contestant</option>
                        <option value="Adom">Adom (Agro processing)</option>
                        <option value="Mawuena">Mawuena (Aquaculture)</option>
                        <option value="Ruth">Ruth (Poultry production)</option>
                        <option value="Najat">Najat (Agro processing)</option>
                        <option value="Franca">Franca (Poultry production)</option>
                        <option value="Eunice">Eunice (Pineapple farming and production)</option>
                        <option value="Tracy">Tracy (Maize and Soya Bean production)</option>
                        <option value="Gifty">Gifty (Maize farming)</option>
                        <option value="Dora">Dora (Piggery)</option>
                        <option value="Eugenia">Eugenia (Gari production)</option>
                    </select>
                    <button type="button" id="vote-button">Vote</button>
                </form>
                <?php if (isset($success_message)) : ?>
                    <p class="success"><?php echo $success_message; ?></p>
                <?php elseif (isset($error_message)) : ?>
                    <p class="error"><?php echo $error_message; ?></p>
                <?php endif; ?>

                <section id="miss-agriculture-results">
                    <h2>Miss Agriculture Ghana 2023 Vote Results</h2>
                    <div class="result-chart">
                        <?php
    if ($missAgricultureResults) {
        $maxVotes = max($missAgricultureResults);
        $colorClasses = array('red', 'magenta', 'blue', 'yellow', 'green'); // Color classes in the specified order
        $percentageRanges = array(20, 40, 60, 75, 90); // Percentage ranges for color assignment
        
        foreach ($missAgricultureResults as $candidate => $point) {
            $percentage = 0; // Initialize percentage to 0
        
            if ($maxVotes != 0) {
                $percentage = ($point / $maxVotes) * 100;
            }
        
            $colorClass = '';
        
            if ($percentage <= $percentageRanges[0]) {
                $colorClass = $colorClasses[0]; // Assign 'red' color
            } elseif ($percentage <= $percentageRanges[1]) {
                $colorClass = $colorClasses[1]; // Assign 'magenta' color
            } elseif ($percentage <= $percentageRanges[2]) {
                $colorClass = $colorClasses[2]; // Assign 'blue' color
            } elseif ($percentage <= $percentageRanges[3]) {
                $colorClass = $colorClasses[3]; // Assign 'yellow' color
            } else {
                $colorClass = $colorClasses[4]; // Assign 'green' color
            }
        
            echo '<div class="result-bar">';
            echo '<span class="candidate-name">' . $candidate . '</span>';
            echo '<div class="bar-container">';
            echo '<div class="bar ' . $colorClass . '" style="width:' . $percentage . '%;">';
            echo '<span class="percentage" style="color: ' . $colorClass . ';">' . $percentage . '%</span>'; // Display the percentage value on the bar with color based on the class
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        
          
                            
        } else {
            echo 'No results available.';
        }
                        ?>
                    </div>
 </section> </section><hr>
<!-- /*  joy model* */ -->
<section class="column">
                <h2>Vote for The Joy Model Challenge 2023 (coming soon)</h2>
                <form id="joy-model-challenge-voting-form" action="api/joymodel.php" method="POST">
                    <label for="joy-model-candidate-selection">List of Contestants</label>
                    <select id="joy-model-candidate-selection" name="candidate">
                        <option value="candidate">Select a Contestant</option>
                        <option value="Elinam">Elinam</option>
                        <option value="Akua">Akua</option>
                        <option value="Adjoa">Adjoa</option>
                        <option value="Nyarkoa">Nyarkoa</option>
                        <option value="Gwagwalada">Gwagwalada</option>
                    </select>
                    <button type="submit" id="vote-button1">Vote</button>
                </form>
                <?php if (isset($success_message)) : ?>
                    <p class="success"><?php echo $success_message; ?></p>
                <?php elseif (isset($error_message)) : ?>
                    <p class="error"><?php echo $error_message; ?></p>
                <?php endif; ?>

                <section id="joy-model-challenge-results">
                    <h2>Joy Model Challenge 2023 Vote Results</h2>
                    <div class="result-chart">
                        <?php
    if ($joyModelChallengeResults) {
        $maxVotes = max($joyModelChallengeResults);
        $colorClasses = array('green', 'yellow', 'blue', 'magenta', 'red'); // Color classes in the specified order
        $percentageRanges = array(82, 65, 40, 30, 10); // Percentage ranges for color assignment

        foreach ($joyModelChallengeResults as $candidate => $votes) {
            $percentage = ($votes / $maxVotes) * 100;
            $colorClass = '';

            if ($percentage >= $percentageRanges[0]) {
                $colorClass = $colorClasses[0]; // Assign 'green' color
            } elseif ($percentage >= $percentageRanges[1]) {
                $colorClass = $colorClasses[1]; // Assign 'yellow' color
            } elseif ($percentage >= $percentageRanges[2]) {
                $colorClass = $colorClasses[2]; // Assign 'blue' color
            } elseif ($percentage >= $percentageRanges[3]) {
                $colorClass = $colorClasses[3]; // Assign 'magenta' color
            } else {
                $colorClass = $colorClasses[4]; // Assign 'red' color
            }

            echo '<div class="result-bar ' . $colorClass . '">';
            echo '<span class="candidate-name">' . $candidate . '</span>';
            echo '<div class="bar-container">';
            echo '<div class="bar" style="width:' . $percentage . '%;"></div>';
            echo '</div>';
            echo '<span class="percentage">' . $percentage . '%</span>';
            echo '</div>';
            }
        } else {
            echo 'No results available.';
        }
                        ?>
                    </div>
</section>
 </section></section>
    <?php include 'inc/footer.php'; ?>
 <!-- Miss Agriculture Popup -->
 <div id="miss-agriculture-popup-container">
        <div id="miss-agriculture-popup-content">
        <form method="POST" action="api/missagri.php">
            <h3>Enter Your Phone Number to continue the vote</h3>
            <input type="number" id="phone-input" placeholder="Phone Number" required>
            <div id="popup-buttons">
                <button type="button" id="miss-agriculture-vote-button">Submit</button>
                <button type="button" id="miss-agriculture-cancel-button">Cancel</button>
            </div>
            </form>
        </div>
    </div>

    <!-- Miss Agriculture Success Popup -->
    <div id="success-popup-container" class="popup-container">
    <div class="popup">
        <h3>Thank for casting your voting for Miss Agriculture 2023</h3>
        <p id="success-message">check the prompt on your phone to complete your vote.</p>
        <button type="button" id="close-success-popup-button">Close</button>
    </div>
</div>

    <!-- Joy Model Challenge Popup -->
    <div id="joy-model-challenge-popup-container">
        <div id="joy-model-challenge-popup-content">
        <form method="POST" action="api/prompt.php">
            <h3>Enter Your Phone Number or dial <br> *920*36*2# to continue the vote</h3>
            <input type="number" id="phone-input1" placeholder="Phone Number" required>
            <div id="popup-buttons1">
                <button type="button" id="joy-model-vote-button">Submit</button>
                <button type="button" id="joy-model-cancel-button">Cancel</button>
            </div>
            </form>
        </div>
    </div>

    <!-- Joy Model Challenge Success Popup -->
    <div id="success-popup-container1" class="popup-container">
        <div class="popup">
            <h3>Success!</h3>
            <p id="success-message1">Thank you for voting for the Joy Model Challenge.</p>
            <button type="button" id="close-success-popup-button1">Close</button>
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