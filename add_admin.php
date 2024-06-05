<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

$alert_message = '';
$error_messages = [];

// Validate password function
function isValidPassword($password) {
    // Password should be a combination of text, characters, and symbols with a minimum length of 8
    return preg_match('/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password);
}

// Initialize form fields with empty values or values from the POST request
$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';

// Check if the form for adding admin users is submitted
if (isset($_POST['add_admin'])) {
    // Handle adding admin user
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if user_id already exists
    $check_user_query = "SELECT * FROM users WHERE user_id = '$user_id'";
    $check_user_result = $con->query($check_user_query);

    // Check if username already exists
    $check_username_query = "SELECT * FROM users WHERE user_name = '$username'";
    $check_username_result = $con->query($check_username_query);

    // Validate password
    if (!isValidPassword($password)) {
        $error_messages[] = 'Password should be a combination of text, characters, and symbols (minimum of 8 characters).';
    }

    // Check if the password and confirm password match
    if ($password !== $confirm_password) {
        $error_messages[] = 'Password and confirm password do not match.';
    }

    if ($check_user_result->num_rows > 0) {
        $error_messages[] = 'User ID already exists. Please choose a different one.';
    }

    if ($check_username_result->num_rows > 0) {
        $error_messages[] = 'Username already exists. Please choose a different one.';
    }

    if (empty($error_messages)) {
        // All checks passed, proceed with adding the user
        // No password hashing during registration (for testing purposes)
        // $hashed_password = password_hash($plain_text_password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (user_id, user_name, password) VALUES ('$user_id','$username', '$password')";
        if ($con->query($sql) === TRUE) {
            $alert_message = 'Admin user added successfully!';
            // Reset form fields after successful submission
            $user_id = $username = $password = $confirm_password = '';
        } else {
            $alert_message = 'Error adding admin user: ' . $con->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Add your head content here -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            margin: 20px;
            color: #333;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h3 {
            color: #555;
            text-align: center;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #2ecc71;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #27ae60;
        }

        .alert {
            margin-top: 20px;
            padding: 10px;
            background-color: #e74c3c;
            color: #fff;
            border-radius: 5px;
            display: none;
        }
        .back-btn {
            float: right;
            background-color: #3498db;
            margin-bottom: 20px;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-right: 10px;
        }

        .back-btn:hover {
            background-color: #2980b9;
        }
    </style>
</head>

<body>

<div class="content">
    <a href="adminusers.php" class="back-btn">&#8592; Back</a>
    <div class="container">
        <h3><i class="fa-solid fa-users fa-sm"></i> Add Admin User</h3>
        <br>

        <!-- Add Admin Form -->
        <form method="post">
            <label for="user_id">Company ID:</label>
            <input type="text" name="user_id" value="<?php echo htmlspecialchars($user_id); ?>" required>
            <label for="username">Username:</label>
            <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>" required>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" value="<?php echo htmlspecialchars($password); ?>" required>
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" name="confirm_password" id="confirm_password" value="<?php echo htmlspecialchars($confirm_password); ?>" required>
            <div id="password-warning" style="color: red;"></div> <!-- Display password requirements -->
            <input type="submit" name="add_admin" value="Submit">
        </form>
        <script>
            // JavaScript to dynamically update the password warning message
            document.getElementById('password').addEventListener('input', function() {
                var password = this.value;
                var warningMessage = document.getElementById('password-warning');

                // Check if the password meets the requirements
                if (/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(password)) {
                    warningMessage.textContent = ''; // Password meets the requirements
                } else {
                    warningMessage.textContent = 'Password should be a combination of text, characters, and symbols (minimum of 8 characters).';
                }
            });
        </script>
        <script type="text/javascript">
            <?php
            if (!empty($error_messages)) {
                echo "alert('" . implode('\n', $error_messages) . "');";
            } elseif (!empty($alert_message)) {
                echo "alert('$alert_message');";
                echo "window.location.href = 'adminusers.php';";
            }
            ?>
        </script>
    </div>
</div>

</body>
</html>
