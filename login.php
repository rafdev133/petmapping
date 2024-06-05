<?php
session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Something was posted
    $user_name = trim($_POST['user_name']);
    $password = trim($_POST['password']);

    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

        // Read from the database
        $query = "SELECT * FROM users WHERE user_name = '$user_name' LIMIT 1";
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);

            // Directly compare passwords (not recommended for security reasons)
            if ($password === $user_data['password']) {
                // Regenerate session ID to help prevent session fixation
                session_regenerate_id(true);

                $_SESSION['user_id'] = $user_data['user_id'];
                header("Location: index.php");
                die;
            }
        }

        echo '<div style="display: inline-block; background-color: #FF6969; color: white; padding: 10px; border-radius: 5px; margin-bottom: 10px;">Wrong Username or Password! Try Again</div>';
    } else {
        echo '<div style="display: inline-block; background-color: #FF6969; color: white; padding: 10px; border-radius: 5px; margin-bottom: 10px;">Wrong Username or Password! Try Again</div>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Login Page</title>
</head>
    <style>
        .contact-button {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            background-color: #2899D5;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s ease; /* Add transition for smooth hover effect */
        }

        /* Hover effect */
        .contact-button:hover {
            background-color: #FFD966; /* Change background color on hover */
        }
    </style>
    <body>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form method="post">
                <h1>Create Account?</h1>
                <h3><a href="admincontact.php" class="contact-button">Contact the Administrator</a></h3>
            </form>
        </div>
        <div class="form-container sign-in">
            <form method="post">
                <h1>Log In</h1>
                <input type="text" name="user_name" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <button>Log in</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Contact the Administrator</h1>
                    <p>Login if you have an authorized account</p>
                    <button class="hidden" id="login">Already have an account</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Monitoring Dog Vaccination Status</h1>
                    <p>of Brgy. Muzon Pabahay 2000</p>
                    <button class="hidden" id="register">Create Admin Account</button>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>
