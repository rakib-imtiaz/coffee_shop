<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Little Avenue Coffee</title>
    <link rel="stylesheet" href="../Assets/CSS/admin_login.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>

    <div class="admin-login-container">
        <div class="login-box">
            <h2>Admin Login</h2>
            <form action="admin_dashboard.php" method="POST">
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
                <a href="../index.php">Back to Homepage</a>
            </div>
        </div>

    </div>

</body>
</html>
