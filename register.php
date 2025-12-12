<?php
// Define variables to store user input and error messages
$fullname = $email = $username = $password = "";
$fullname_err = $email_err = $username_err = $password_err = "";
$register_success = "";

// Processing form data when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate Full Name
    if (empty(trim($_POST["fullname"]))) {
        $fullname_err = "Please enter your full name.";
    } else {
        $fullname = trim($_POST["fullname"]);
    }

    // Validate Email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter your email.";
    } else {
        $email = trim($_POST["email"]);
        // Basic email format validation
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_err = "Invalid email format.";
        }
    }

    // Validate Username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Validate Password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Check input errors before proceeding
    if (empty($fullname_err) && empty($email_err) && empty($username_err) && empty($password_err)) {
        // For this lab concept, we just simulate a successful registration
        // In a real application, you would hash the password and store the data in a database here.
        $register_success = "Registration Successful! You can now login.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - UM CCE</title>
    <style>
        /* Reusing the same styles for consistency */
        body { font-family: sans-serif; background-color: #f4f7f6; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .wrapper { width: 350px; padding: 20px; background: #fff; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        h2 { text-align: center; color: #0056b3; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; color: #333; }
        .form-control { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        .btn-primary { width: 100%; padding: 10px; border: none; border-radius: 4px; background-color: #0056b3; color: white; font-size: 16px; cursor: pointer; }
        .btn-primary:hover { background-color: #004494; }
        .invalid-feedback { color: #dc3545; font-size: 14px; margin-top: 5px; }
        .success-message { color: #28a745; text-align: center; margin-bottom: 15px; font-weight: bold; }
        .login-link { text-align: center; margin-top: 15px; font-size: 14px; }
        .login-link a { color: #0056b3; text-decoration: none; }
        .login-link a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>UM CCE Registration</h2>
        <p style="text-align:center; color:#666;">Create your account.</p>

        <?php if (!empty($register_success)): ?>
            <div class="success-message"><?php echo $register_success; ?></div>
            <div class="login-link">
                <a href="login.php">Proceed to Login</a>
            </div>
        <?php else: ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="fullname" class="form-control" value="<?php echo htmlspecialchars($fullname); ?>">
                    <span class="invalid-feedback"><?php echo $fullname_err; ?></span>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>">
                    <span class="invalid-feedback"><?php echo $email_err; ?></span>
                </div>
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
                    <input type="submit" class="btn-primary" value="Register">
                </div>
                <div class="login-link">
                    Already have an account? <a href="login.php">Login here</a>.
                </div>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
