<?php
session_start();
require_once '../../includes/db_connect.php'; // Include your database connection
include '../../includes/header'; // Include your database connection

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query to fetch the admin user
    $query = "SELECT * FROM users WHERE email = :email AND role = 'admin'";
    
    // Assuming your database connection variable is $db
    $stmt = $db->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if the user exists and the provided password matches the stored password
    if ($user && $user['password'] == $password) {
        // If password matches and user is an admin
        $_SESSION['admin_id'] = $user['id']; // Store the admin ID in session
        $_SESSION['username'] = $user['username'];
        header('Location: admin_dashboard.php');
        exit();
    } else {
        // Invalid credentials
        $error = "Invalid email or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Little Avenue Coffee</title>
    <link rel="stylesheet" href="/assets/css/admin_login.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>

    <div class="admin-login-container">
        <div class="login-box">
            <h2>Admin Login</h2>
            <?php if (!empty($error)): ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php endif; ?>
            <form action="admin_login.php" method="POST">
                <div class="input-group">
                    <span class="input-icon"><i class="fas fa-user-shield"></i></span>
                    <input type="email" name="email" placeholder="Admin Email" required>
                </div>
                <div class="input-group">
                    <span class="input-icon"><i class="fas fa-lock"></i></span>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="login-btn">Login</button>
            </form>
            <div class="additional-links">
                <a href="#">Forgot Password?</a>
                <a href="/index.php">Back to Homepage</a>
            </div>
        </div>
    </div>
</body>
</html>
