<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

require_once "connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>About</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
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
            font-family: 'Montserrat', sans-serif;
        }

        .sidebar .logout a {
            padding: 10px 25px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
            transition: 0.3s;
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

        }

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f0f0f0;
            margin: 20px;
        }

        .jumbotron {
            background-color: #2899D5;
            color: #fff;
            padding: 100px 25px;
            text-align: center;
            border-radius: 15px;
        }

        h1,
        h2,
        h4 {
            color: #333;
        }

        p {
            color: #555;
        }

        .container-fluid {
            padding: 60px 50px;
        }

        .bg-grey {
            background-color: #f6f6f6;
            padding: 20px;
            border-radius: 10px;
        }

        .btn-default {
            background-color: #2899D5;
            color: #fff;
            border: 2px solid #2899D5;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn-default:hover {
            background-color: #1d7cb4;
        }

        .logo {
            font-size: 150px;
            color: #2899D5;
        }

        .values {
            margin-top: 20px;
        }

        .mission-vision h4 {
            margin-bottom: 20px;
        }

        /* Updated styles for About Us section */
        .about-section {
            text-align: center;
            padding: 60px 0;
        }

        .about-heading {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 30px;
            color: #2899D5;
        }

        .about-content {
            font-size: 18px;
            color: #555;
            line-height: 1.6;
        }

        .btn-get-in-touch {
            background-color: #2899D5;
            color: #fff;
            border: 2px solid #2899D5;
            border-radius: 5px;
            transition: background-color 0.3s;
            margin-top: 20px;
        }

        .btn-get-in-touch:hover {
            background-color: #1d7cb4;
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
    <a href="adminusers.php"><i class="fa fa-users aria" aria-hidden="true"></i> Admin Users</a>
    <a href="#" class="active"><i class="fa fa-info-circle" aria-hidden="true"></i> About</a>
    <div class="logout">
        <a href="logout.php">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    </div>
</div>

<div class="content">
    <div class="about-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2 class="about-heading">About PetMapping</h2>
                        <p class="about-content">
                            This system is dedicated to monitoring the dog vaccination status of Barangay Muzon Pabahay 2000.
                            It is a vital resource for residents and pet owners in this community. It serves as a comprehensive
                            platform for the systematic tracking and management of dog vaccinations, promoting responsible pet
                            ownership and public safety.
                        </p>
                        <p class="about-content">
                            This system is dedicated to monitoring the dog vaccination status of Barangay Muzon Pabahay 2000.
                            It is a vital resource for residents and pet owners in this community. It serves as a comprehensive
                            platform for the systematic tracking and management of dog vaccinations, promoting responsible pet
                            ownership and public safety.
                        </p>
                        
                    </div>
                </div>
            </div>
</div>
        <!-- About Us Section -->
       

        <!-- Mission and Vision Section -->
        <div class="container
</div>

<?php //echo $user_data['user_name']; ?>
</body>
</html>
