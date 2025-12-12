<?php
// Define variables to store user input and error messages
$username = "";
$password = "";
$username_err = "";
$password_err = "";
$login_success = "";

// Processing form data when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Check input errors before proceeding
    if (empty($username_err) && empty($password_err)) {
        // For this lab concept, we just simulate a successful login
        // In a real application, you would verify credentials against a database here.
        $login_success = "Login Successful! Welcome, " . htmlspecialchars($username) . ".";
        // To redirect instead, uncomment the line below:
        // header("location: welcome.php"); exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - UM CCE</title>
    <style>
        body { font-family: sans-serif; background-color: #f4f7f6; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .wrapper { width: 350px; padding: 20px; background: #fff; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        h2 { text-align: center; color: #0056b3; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; color: #333; }
        .form-control { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        .btn-primary { width: 100%; padding: 10px; border: none; border-radius: 4px; background-color: #0056b3; color: white; font-size: 16px; cursor: pointer; }
        .btn-primary:hover { background-color: #004494; }
        .invalid-feedback { color: #dc3545; font-size: 14px; margin-top: 5px; }
        .success-message { color: #28a745; text-align: center; margin-bottom: 15px; }
        .login-link { text-align: center; margin-top: 15px; font-size: 14px; }
        .login-link a { color: #0056b3; text-decoration: none; }
        .login-link a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>UM CCE Login</h2>
        <p style="text-align:center; color:#666;">Please enter your credentials.</p>

        <?php if (!empty($login_success)): ?>
            <div class="success-message"><?php echo $login_success; ?></div>
        <?php else: ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="<?php echo htmlspecialchars($username); ?>">
                    <span class="invalid-feedback"><?php echo $username_err; ?></span>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                    <span class="invalid-feedback"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn-primary" value="Login">
                </div>
                <div class="login-link">
                    Don't have an account? <a href="register.php">Register here</a>.
                </div>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
