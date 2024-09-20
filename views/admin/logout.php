<?php
// Start the session
session_start();

// Unset all of the session variables
$_SESSION = [];

// If it's desired to kill the session entirely, also delete the session cookie.
// This will destroy the session, and the browser will remove the session cookie.
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// Finally, destroy the session.
session_destroy();

// Redirect to the login page or homepage after logout
header("Location: admin_login.php"); // Change "login.php" to your desired location
exit;
