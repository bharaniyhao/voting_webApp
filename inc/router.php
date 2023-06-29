<?php
    // Get the requested page from the URL
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';

    // Load the appropriate controller based on the requested page
    switch ($page) {
        case 'home':
            include 'controllers/HomeController.php';
            break;
        // Add more cases for additional pages/controllers
        default:
            include 'controllers/HomeController.php';
            break;
    }
?>
