// Get DOM elements
const missAgricultureVoteButton = document.getElementById('vote-button');
const missAgriculturePopupContainer = document.getElementById('miss-agriculture-popup-container');
const missAgricultureSubmitButton = document.getElementById('miss-agriculture-vote-button');
const missAgricultureCancelButton = document.getElementById('miss-agriculture-cancel-button');
const joyModelVoteButton = document.getElementById('vote-button1');
const joyModelPopupContainer = document.getElementById('joy-model-challenge-popup-container');
const joyModelCancelButton = document.getElementById('joy-model-cancel-button');
const joyModelSubmitButton = document.getElementById('joy-model-vote-button');

const joyModelPhoneInput = document.getElementById('phone-input1');
const missAgriculturePhoneInput = document.getElementById('phone-input');
const joyModelVotingForm = document.getElementById('joy-model-challenge-voting-form');
const missAgricultureVotingForm = document.getElementById('miss-agriculture-voting-form');
const joyModelSuccessPopupContainer = document.getElementById('success-popup-container1');
const missAgricultureSuccessPopupContainer = document.getElementById('success-popup-container');
const joyModelSuccessMessage = document.getElementById('success-message1');
const missAgricultureSuccessMessage = document.getElementById('success-message');

// Function to show the popup for Joy Model Challenge
function showJoyModelPopup() {
    joyModelPopupContainer.classList.add('active');
}

// Function to hide the popup for Joy Model Challenge
function hideJoyModelPopup() {
    joyModelPopupContainer.classList.remove('active');
}

// Function to show the popup for Miss Agriculture
function showMissAgriculturePopup() {
    missAgriculturePopupContainer.classList.add('active');
}

// Function to hide the popup for Miss Agriculture
function hideMissAgriculturePopup() {
    missAgriculturePopupContainer.classList.remove('active');
}

// Function to show the success popup for Joy Model Challenge
function showJoyModelSuccessPopup() {
    joyModelSuccessPopupContainer.classList.add('active');
}

// Function to hide the success popup for Joy Model Challenge
function hideJoyModelSuccessPopup() {
    joyModelSuccessPopupContainer.classList.remove('active');
}

// Function to show the success popup for Miss Agriculture
function showMissAgricultureSuccessPopup() {
    missAgricultureSuccessPopupContainer.classList.add('active');
}

// Function to hide the success popup for Miss Agriculture
function hideMissAgricultureSuccessPopup() {
    missAgricultureSuccessPopupContainer.classList.remove('active');
}

// Function to handle the submission of Miss Agriculture vote
function submitMissAgricultureVote() {
    // Get the selected candidate name
    const candidateSelect = document.getElementById('miss-agriculture-candidate-selection');
    const candidate = candidateSelect.value;

    // Check if a candidate is selected
    if (candidate === '') {
        alert('Please select a candidate.');
        return;
    }

    // Make an AJAX request to the server
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'api/missagri.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                if (response.success) {
                    hideMissAgriculturePopup();
                    showMissAgricultureSuccessPopup(); // Show success popup
                } else {
                    alert(response.message);
                }
            } else {
                alert('An error occurred while submitting the vote. Please try again.');
            }
        }
    };

    // Send the candidate name as POST data
    const data = `candidate=${encodeURIComponent(candidate)}`;
    xhr.send(data);
}

// Function to handle the submission of Joy Model Challenge vote
function submitJoyModelVote() {
    const candidateSelect = document.getElementById('joy-model-candidate-selection');
    const candidate = candidateSelect.value;

    // Check if a candidate is selected
    if (candidate === '') {
        alert('Please select a candidate.');
        return;
    }
    // Make an AJAX request to the server
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'api/joymodel.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                if (response.success) {
                    hideJoyModelPopup();
                    showJoyModelSuccessPopup(); // Show success popup
                } else {
                    alert(response.message);
                }
            } else {
                alert('An error occurred while submitting the vote. Please try again.');
            }
        }
    };

    // Send the candidate name as POST data
    const data = `candidate=${encodeURIComponent(candidate)}`;
    xhr.send(data);
}


// Event listener for Joy Model Challenge vote button click
joyModelVoteButton.addEventListener('click', function() {
    showJoyModelPopup();
});

// Event listener for Miss Agriculture vote button click
missAgricultureVoteButton.addEventListener('click', function() {
    showMissAgriculturePopup();
});

// Event listener for Joy Model Challenge cancel button click
joyModelCancelButton.addEventListener('click', function() {
    hideJoyModelPopup();
});

// Event listener for Miss Agriculture cancel button click
missAgricultureCancelButton.addEventListener('click', function() {
    hideMissAgriculturePopup();
});

// Event listener for Joy Model Challenge submit button click
joyModelSubmitButton.addEventListener('click', function() {
    // Check if the phone number is entered
    if (joyModelPhoneInput.value.trim() === '') {
        alert('Please enter your phone number.');
    } else {
        submitJoyModelVote();
    }
});

// Event listener for Miss Agriculture submit button click
missAgricultureSubmitButton.addEventListener('click', function() {
    // Check if the phone number is entered
    if (missAgriculturePhoneInput.value.trim() === '') {
        alert('Please enter your testting phone number.');
    } else {
        submitMissAgricultureVote();
    }
});

// Get DOM elements
const joyModelCloseSuccessPopupButton = document.getElementById('close-success-popup-button1');
const missAgricultureCloseSuccessPopupButton = document.getElementById('close-success-popup-button');

// Event listener for Joy Model Challenge close button click
joyModelCloseSuccessPopupButton.addEventListener('click', function() {
    hideJoyModelSuccessPopup();
});

// Event listener for Miss Agriculture close button click
missAgricultureCloseSuccessPopupButton.addEventListener('click', function() {
    hideMissAgricultureSuccessPopup();
});