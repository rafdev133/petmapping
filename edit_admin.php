<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

$alert_message = '';
$error_messages = [];

if (isset($_POST['edit_admin'])) {
    // Handle editing admin user
    $id = $_POST['id'];
    $new_user_id = $_POST['new_user_id'];
    $new_username = $_POST['new_username'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if the new user_id or new_username already exists
    $check_user_query = "SELECT * FROM users WHERE user_id = '$new_user_id' AND id != '$id'";
    $check_user_result = $con->query($check_user_query);

    $check_username_query = "SELECT * FROM users WHERE user_name = '$new_username' AND id != '$id'";
    $check_username_result = $con->query($check_username_query);

    // Validate password only if a new password is provided
    $isValidPassword = true;

    if (!empty($new_password)) {
        $isValidPassword = preg_match('/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $new_password);
    }

    // Check if the password and confirm password match
    if ($isValidPassword && ($new_password === $confirm_password || empty($new_password))) {
        if ($check_user_result->num_rows > 0) {
            $error_messages[] = 'User ID already exists. Please choose a different one.';
        } elseif ($check_username_result->num_rows > 0) {
            $error_messages[] = 'Username already exists. Please choose a different one.';
        } else {
            // No password hashing during edit (for testing purposes)
            $sql = "UPDATE users SET user_id='$new_user_id', user_name='$new_username'";

            // Include the new password in the update query if provided
            if (!empty($new_password)) {
                $sql .= ", password='$new_password'";
            }

            $sql .= " WHERE id='$id'";

            if ($con->query($sql) === TRUE) {
                $alert_message = 'Admin user edited successfully!';
            } else {
                $alert_message = 'Error editing admin user: ' . $con->error;
            }
        }
    } else {
        $error_messages[] = 'Password does not meet the requirements or passwords do not match.';
    }
}

// Fetch admin user details for editing
if (isset($_GET['id']) && !isset($row)) {
    $id = $_GET['id'];
    $result = $con->query("SELECT * FROM users WHERE id='$id'");
    $row = ($result->num_rows > 0) ? $result->fetch_assoc() : null;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Admin User</title>
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
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
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
        <h3><i class="fa-solid fa-users fa-sm"></i> Edit Admin User</h3>
        <br>

        <!-- Edit Admin Form -->
        <form method="post" action="" onsubmit="return validateForm()">
            <input type="hidden" name="id" value="<?php echo isset($row['id']) ? $row['id'] : ''; ?>">
            <label for="new_user_id">Company ID:</label>
            <input type="text" name="new_user_id" value="<?php echo isset($_POST['new_user_id']) ? $_POST['new_user_id'] : (isset($row['user_id']) ? $row['user_id'] : ''); ?>" required>
            <label for="new_username">New Username:</label>
            <input type="text" name="new_username" value="<?php echo isset($_POST['new_username']) ? $_POST['new_username'] : (isset($row['user_name']) ? $row['user_name'] : ''); ?>" required>

            <?php if (!empty($row['password']) && empty($new_password)) : ?>
                <!-- Display the current password only if a new password is not provided -->
                <label for="current_password">Current Password:</label>
                <input type="text" name="current_password" id="current_password" value="<?php echo $row['password']; ?>" readonly>
            <?php endif; ?>

            <label for="new_password">New Password:</label>
            <input type="password" name="new_password" id="new_password" placeholder="Leave blank to keep the current password">
            <label for="confirm_password">Confirm New Password:</label>
            <input type="password" name="confirm_password" id="confirm_password" placeholder="Leave blank to keep the current password">
            <div id="password-warning" style="color: red;"></div>
            <input type="submit" name="edit_admin" value="Submit">
        </form>
        <script>
            function validateForm() {
                // Add any additional validation logic here if needed
                return true; // Returning true allows the form to submit
            }
        </script>

        <!-- Display alert message -->
        <?php
        if (!empty($error_messages)) {
            echo "<script>alert('" . implode('\n', $error_messages) . "');</script>";
        } elseif (!empty($alert_message)) {
            echo "<script>alert('$alert_message');</script>";
            echo "<meta http-equiv='refresh' content='0;url=adminusers.php'>";
        }
        ?>
    </div>

    <script>
    // JavaScript to dynamically update the password warning message
    function updatePasswordWarning() {
        var password = document.getElementById('new_password').value;
        var confirm_password = document.getElementById('confirm_password').value;
        var warningMessage = document.getElementById('password-warning');
        var submitButton = document.querySelector('input[type="submit"]');

        // Check if the password meets the requirements
        var isValidPassword = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(password);

        if (isValidPassword) {
            warningMessage.textContent = ''; // Password meets the requirements
            submitButton.disabled = false; // Enable the submit button
        } else {
            warningMessage.textContent = 'Password should be a combination of text, characters, and symbols (minimum of 8 characters) including at least one letter, one number, and one special character.';
            submitButton.disabled = true; // Disable the submit button
        }

        // Check if the passwords match
        if (password !== confirm_password) {
            document.getElementById('confirm_password').setCustomValidity("Passwords don't match");
        } else {
            document.getElementById('confirm_password').setCustomValidity("");
        }
    }

    document.getElementById('new_password').addEventListener('input', updatePasswordWarning);
    document.getElementById('confirm_password').addEventListener('input', updatePasswordWarning);

</script>
</div>
</body>
</html>
