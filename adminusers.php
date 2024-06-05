<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

$alert_message = '';  // Initialize an empty alert message

// Check if 'delid' is set in the URL
if (isset($_GET['delid'])) {
    $id = intval($_GET['delid']);

    // Archive the record before deleting
    $archive_sql = mysqli_query($con, "INSERT INTO users_archive SELECT * FROM users WHERE id='$id'");

    // Check if the record was successfully archived before deleting
    if ($archive_sql) {
        $delete_sql = mysqli_query($con, "DELETE FROM users WHERE id='$id'");

        if ($delete_sql) {
            $alert_message = "Record has been successfully archived and deleted!";
        } else {
            $alert_message = "Failed to delete record.";
        }
    } else {
        $alert_message = "Failed to archive record.";
    }
}
// Fetch admin users for display
$result = $con->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Users</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src ="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link rel="stylesheet" href="style2.css">
    
    <style>
        /* CSS for the sidebar */
       
        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #2899D5;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidebar a {
            padding: 10px 25px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background-color: #D4D4D1;
        }

        .sidebar .logout {
            position: absolute;
            bottom: 20px;
            width: 100%;
            text-align: start;
        }

        .sidebar .logout a{
            padding: 10px 25px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
            transition: 0.3s;
            font-family: 'Montserrat', sans-serif;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }

        .header {
            padding: 10px 25px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
            transition: 0.3s;
            font-family: 'Montserrat', sans-serif;
        }
        body {
        font-family: 'Montserrat', sans-serif;
        background-color: #f0f0f0;
        margin: 20px;
        color: #333;
        }

        .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        }

        h1 {
        color: #555;
        }

        table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        font-size: 13px;
        }

        th, td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
        }

        th {
        background-color: #2899D5;
        }

        tr:hover {
        background-color: #FFD966;
        }

        .content h3{
            color: #111; font-family: 'Montserrat', sans-serif; 
            font-size: 25px; 
            letter-spacing: -1px; 
            line-height: 1; 
            text-align: left;
            margin-bottom: -25px;
        }

        #register {
        background-color: #FFD966;
        border: 1px solid #ddd;
        padding: 20px;
        border-radius: 5px;
        margin: 0 auto;
        width: 300px;
        }

        #register input {
        width: 100%;
        padding: 10px;
        margin: 5px 0;
        border: 1px solid #ccc;
        border-radius: 3px;
        }

        #register input[type="submit"] {
        background-color: #3498db;
        color: #fff;
        border: none;
        border-radius: 40px;
        padding: 10px 20px;
        cursor: pointer;
        }

        #register input[type="submit"]:hover {
        background-color: #FF6969;
        }

    </style>
</head>
<body>

<div class="sidebar">
    <div class="header">
    <h2 style="color: rgba(255, 255, 255, 1); font-family: Arial, sans-serif; font-size: 2.2rem; font-weight: bold; text-transform: uppercase; text-align: center; text-shadow: 2px 2px 0px rgba(64, 116, 181, 1), 
               2px -2px 0px rgba(64, 116, 181, 1), 
			   -2px 2px 0px rgba(64, 116, 181, 1), 
			   -2px -2px 0px rgba(64, 116, 181, 1), 
			   2px 0px 0px rgba(64, 116, 181, 1), 
			   0px 2px 0px rgba(64, 116, 181, 1), 
			   -2px 0px 0px rgba(64, 116, 181, 1), 
			   0px -2px 0px rgba(64, 116, 181, 1);"> PetMapping</h2>
    </div>
    <a href="index.php"><i class="fa-solid fa-house" aria-hidden="true"></i> Dashboard</a>
    <a href="doginfos.php"><i class="fa-solid fa-shield-dog fa-lg"></i> Dog Information</a>
    <a href="analytics.php"><i class="fa-solid fa-chart-simple fa-lg"></i> Analytics</a>
    <a href="#" class="active"><i class="fa fa-users aria" aria-hidden="true"></i> Admin Users</a>
    <a href="about.php"><i class="fa fa-info-circle" aria-hidden="true"></i> About</a>
    <div class="logout">
        <a href="logout.php">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    </div>
</div>

<div class="content">
    <div class="container">
        <table>
            <h3><i class="fa-solid fa-users fa-sm"></i> Admin Users<a href="add_admin.php" class="btn btn-warning" style="float: right;">+ Add Admin User</a></h3>
            <a href="archiveadmin.php" class="btn btn-info" style="float: right; margin-right: 10px;">View Archived Admins</a><br>
            <tr>
                <th>Company ID</th>
                <th>User Name</th>
                <th>Password</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['user_id'] . '</td>';
                    echo '<td>' . $row['user_name'] . '</td>';
                    echo '<td>' . $row['password'] . '</td>';
                    echo '<td>' . $row['date'] . '</td>';
                    echo '<td>';
                    echo '<a href="edit_admin.php?id=' . $row['id'] . '" class="btn btn-primary">Edit</a> ';
                    echo '<a href="adminusers.php?delid=' . $row['id'] . '" class="btn btn-danger" onclick="return confirmDelete()">Delete</a>';
                    echo '</td>';
                    echo '</tr>';
                }
            } else {
                echo '0 results';
            }
            ?>
        </table>
    </div>
</div>

<script type="text/javascript">
    <?php
    // Display alert message using JavaScript
    if (!empty($alert_message)) {
        echo "alert('$alert_message');";
    }
    ?>
    
    // Add this JavaScript function at the end of your HTML or in a <script> tag
    function confirmDelete() {
        return confirm("Are you sure you want to delete this admin?");
    }
</script>

</body>
</html>