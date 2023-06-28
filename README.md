# voting_webApp
waystudio Voting Website
Project Description: Media Billo Voting Website  waystudio Voting Website is a platform designed to facilitate online voting for two different contests: Miss Agriculture Ghana 2023 and The Joy Model Challenge 2023. The website allows users to select their preferred contestant and submit their votes. It also displays the current vote results in an interactive chart.  Key Features: 1. Contest Selection: The website provides two separate sections for voting: Miss Agriculture Ghana 2023 and The Joy Model Challenge 2023. Users can choose their desired contest and proceed with voting.  2. Candidate Selection: Within each contest section, users can select their preferred contestant from a dropdown list. The available options are dynamically populated based on the contestants participating in each contest.  3. Vote Submission: After selecting a contestant, users can submit their votes by clicking on the "Vote" button. The vote submission is handled through an asynchronous request to the corresponding API endpoint.  4. Vote Validation: The website performs basic validation to ensure that a valid candidate is selected before submitting the vote. If a candidate is not selected, an error message is displayed.  5. Vote Results: The website displays the current vote results for each contest in the form of an interactive chart. The chart visualizes the percentage of votes received by each contestant, using different color codes to indicate the popularity of the contestants.  6. Pop-up Modals: The website utilizes pop-up modals for certain actions, such as confirming vote submission and displaying success messages. These modals provide a user-friendly experience and keep the main page unobstructed.  7. Phone Number Input: The pop-up modals require users to enter their phone numbers as an additional step to verify their votes. This feature ensures that each vote is associated with a unique phone number, enhancing the security and integrity of the voting process.  8. Backend Functionality: The website relies on server-side scripting using PHP. It includes configuration files, utility functions, and API endpoints to handle vote submission and retrieval of vote results from a database.

- index.html
- style.css
- script.js
- assets/
    - images/
        - logo.png
    - js/
        - script.js
    - css/
        - style.css
- inc/
    - header.php
    - footer.php
    - functions.php
- api/
    - vote.php
    - missagri.php
    - joymodel.php
    - callback.php
    - prompt.php
- config/
    - config.php

index.html: The main HTML file for the website.
style.css: The CSS file containing styles for the website.
script.js: The JavaScript file containing client-side code for the website.
assets/: Directory to store all the website's assets (images, CSS, and JS files).
assets/images/: Directory to store images used in the website (e.g., logo.png).
assets/js/: Directory to store JavaScript files (e.g., script.js).
assets/css/: Directory to store CSS files (e.g., style.css).
inc/: Directory to store PHP include files (e.g., header.php, footer.php).
api/: Directory to store PHP files related to API endpoints (e.g., vote.php).
config/: Directory to store configuration files (e.g., config.php).
inc/: Directory to store PHP files containing functions and utilities (e.g., functions.php) 

