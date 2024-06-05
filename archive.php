<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

if (isset($_GET['restoreid'])) {
    $id = intval($_GET['restoreid']);

    // Restore the record from the archive to the dogprofile table
    $restore_sql = mysqli_query($con, "INSERT INTO dogprofile SELECT * FROM dogprofile_archive WHERE id='$id'");

    // Check if the record was successfully restored before deleting from the archive
    if ($restore_sql) {
        $delete_archive_sql = mysqli_query($con, "DELETE FROM dogprofile_archive WHERE id='$id'");

        if ($delete_archive_sql) {
            echo "<script>alert('Record has been successfully restored!');</script>";
            echo "<script>window.location='archive.php';</script>";
        } else {
            echo "<script>alert('Failed to delete record from the archive.');</script>";
            echo "<script>window.location='archive.php';</script>";
        }
    } else {
        echo "<script>alert('Failed to restore record.');</script>";
        echo "<script>window.location='archive.php';</script>";
    }

}
?>

<!DOCTYPE html>
<html>
<head>
<title>Archive</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src ="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link rel="stylesheet" href="style2.css">
</head>
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

        .sidebar .logout a {
            padding: 10px 25px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
            transition: 0.3s;
            font-family: 'Montserrat', sans-serif;
        }

        .content {
            margin-left: 120px; /* Keep the margin for the sidebar */
            padding: 20px;  
            overflow-x: hidden; /* Hide horizontal overflow */
            font-size: 12px;
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

        .content h3 {
            color: #111;
            font-family: 'Montserrat', sans-serif;
            font-size: 25px;
            letter-spacing: -1px;
            line-height: 1;
            text-align: left;
            margin-bottom: -25px;
        }

        .dropdown-toggle-black::after {
        color: black; /* Set the color you want for the three-dot icon */
         }

         .custom-margin {
        margin-right: 20px; /* Adjust the margin as needed */
        }
    </style>
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
    <a href="#" class="active"><i class="fa-solid fa-shield-dog fa-lg"></i> Dog Information</a>
    <a href="analytics.php"><i class="fa-solid fa-chart-simple fa-lg"></i> Analytics</a>
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
        <div class="row">
            <div class="col-md-12 form-group" style="width: 111%;">
                <h3><i class="fa-solid fa-archive fa-lg"></i> Archived Dog Profiles</h3>
                <a href="doginfos.php" class="btn btn-info pull-right" style="margin-right: 10px;"><span class="glyphicon glyphicon-archive"></span> Back to Dog summary</a></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" style="width: 111%;">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <th>#</th>
                        <th>Pet Name</th>
                        <th>Breed</th>
                        <th>Vaccine Status</th>
                        <th>Date Vaccinated</th>
                        <th>Expiration Date</th>
                        <th>Pet Owner Name</th>
                        <th>Mobile No.</th>
                        <th>Address </th>
                        <th>Actions</th>
                        </thead>
                        <tbody>
                        <?php
                        $sql_archive = mysqli_query($con, "SELECT * FROM dogprofile_archive ORDER BY id");
                        $count = 1;
                        while ($row = mysqli_fetch_array($sql_archive)) {
                            ?>
                            <tr>
                            <td>    
                                    <td><?php echo $row['petname']; ?></td>
                                    <td><?php echo $row['breed']; ?></td>
                                    <td><?php echo preg_replace('/Pet \d+\s*/', '', $row['vacstatus']); ?></td>
                                    <td><?php echo $row['vacsdate']; ?></td>
                                    <td><?php echo $row['expiredate']; ?></td>
                                    <td><?php echo $row['petownername']; ?></td>
                                    <td><?php echo $row['mobilenum']; ?></td>
                                    <td><?php echo $row['address']; ?></td>
                                <td>
                                    <a href="archive.php?restoreid=<?php echo htmlentities($row['id']);?>" onclick="return confirm('Do you really want to restore this record?')" class="btn btn-success btn-sm"> <i class="fas fa-undo"></i> Restore</a>
                                </td>
                            </tr>
                            <?php
                            $count = $count + 1;
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>