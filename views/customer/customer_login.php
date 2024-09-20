<?php
session_start();
require_once '../../includes/db_connect.php'; // Database connection

// Initialize variables for error messages
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate form data
    if (empty($email) || empty($password)) {
        $error = "Please enter both email and password.";
    } else {
        // Prepare SQL to select the customer by email
        $sql = "SELECT * FROM users WHERE email = ? AND role = 'customer' LIMIT 1";
        $stmt = $db->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if the user exists and password is correct
        if ($user && password_verify($password, $user['password'])) {
            // If the login is successful, create session variables
            $_SESSION['customer_id'] = $user['id'];
            $_SESSION['customer_email'] = $user['email'];
            $_SESSION['customer_name'] = $user['username'];

            // Redirect to the customer dashboard or homepage
            header("Location: customer_dashboard.php");
            exit;
        } else {
            $error = "Invalid email or password.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login - Coffee Shop</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-[#F5F5DC]">

    <div class="bg-white bg-opacity-90 p-8 rounded-lg shadow-lg max-w-md w-full">

        <h2 class="text-3xl font-bold text-center text-[#78493C] mb-6">Welcome Back!</h2>
        <p class="text-center text-[#78493C] mb-4">Log in to your Coffee Shop Account</p>

        <!-- Display error message -->
        <?php if (!empty($error)): ?>
            <p class="text-red-600 mb-4 text-center"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <form method="POST" action="customer_login.php" class="space-y-6">
            <div>
                <label for="email" class="block text-sm text-[#78493C]">Email:</label>
                <input type="email" name="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#78493C]" placeholder="Your email" required>
            </div>
            
            <div>
                <label for="password" class="block text-sm text-[#78493C]">Password:</label>
                <input type="password" name="password" id="password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#78493C]" placeholder="Your password" required>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="w-full bg-[#78493C] text-white py-2 rounded-md hover:bg-[#A0522D] transition ease-in-out duration-300">Login</button>
            </div>
        </form>

        <div class="text-center mt-6">
            <p class="text-[#78493C]">Don't have an account? <a href="register.php" class="text-[#78493C] font-bold hover:underline">Sign Up</a></p>
        </div>
    </div>

</body>
</html>

