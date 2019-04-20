   <?php
    session_start();
    if(session_destroy()) // Destroying All Sessions
    {
    header("Location: index_logged.php"); // Redirecting To Home Page
    }
    ?>