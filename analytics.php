<?php
session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);

    require_once "connection.php";

    
?>
<!DOCTYPE html>
<html>
<head>
    <title>Analytics</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src ="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
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
            margin-left: 320px;
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
    <a href="#" class="active"><i class="fa-solid fa-chart-simple fa-lg"></i>  Analytics</a>
    <a href="adminusers.php"><i class="fa fa-users aria" aria-hidden="true"></i> Admin Users</a>
    <a href="about.php"><i class="fa fa-info-circle" aria-hidden="true"></i> About</a>
    <div class="logout">
        <a href="logout.php">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    </div>
</div>

<div class="content">
    <div class="container">
    <h3><i class="fa-solid fa-chart-simple fa-sm"></i> Analytics</h3>
    <iframe title="mapping" width="1024" height="1060" src="https://app.powerbi.com/view?r=eyJrIjoiOTBjNDA3NzMtNjY4NS00NWRkLWE3ZDAtN2I5YTc4N2Y4MzE0IiwidCI6IjNhMjIzN2Y5LWVlZjYtNGMzNS1iYjkwLTVkZTc3ODAwODA4ZiIsImMiOjEwfQ%3D%3D" frameborder="0" allowFullScreen="true"></iframe>
    </div>    
</div>

</body>


</html>
