<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

if (isset($_GET['delid'])) {
    $id = intval($_GET['delid']);

    // Archive the record before deleting
    $archive_sql = mysqli_query($con, "INSERT INTO dogprofile_archive SELECT * FROM dogprofile WHERE id='$id'");

    // Check if the record was successfully archived before deleting
    if ($archive_sql) {
        $delete_sql = mysqli_query($con, "DELETE FROM dogprofile WHERE id='$id'");

        if ($delete_sql) {
            echo "<script>alert('Record has been successfully archived and deleted!');</script>";
            echo "<script>window.location='doginfos.php';</script>";
        } else {
            echo "<script>alert('Failed to delete record.');</script>";
            echo "<script>window.location='doginfos.php';</script>";
        }
    } else {
        echo "<script>alert('Failed to archive record.');</script>";
        echo "<script>window.location='doginfos.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dog Profiling</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-xrBdQeJeI+83Mnntz5GxksG9fKvGDhZQYD61eOvVCv3ajhvrDTK+JiD92Q1l3KK5aPnjU9bQa1E2IVxL/7WphTQ==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" integrity="sha384-T6L+8vldGcNUqPZl6a8eqIZqPDS1fMY2PmxctW+9HVh2H8uvvAafeKo10LUwslxE" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-eqSV1aIKdMYWPuX/Tf6Fq0RdNV4yp1aNDrKK5tR3lAO+q3T92Jm5/8jZWssbiuK5" crossorigin="anonymous"></script>
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

        .content a {
            color: white;
            font-family: 'Montserrat', sans-serif;
            font-size: 15px;
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

        @media print {
    .dropdown-toggle-black {
        display: none !important;
        }
        }

    th {
        text-align: center;
    }

    th#header-without-centering {
        text-align: left; /* Override text alignment for this specific header */
    }

    .dropdown-toggle:hover,
    .dropdown-toggle:hover .fas {
        background-color: #2899D5;
        color: white;
    }

    .dropdown-item:hover {
        background-color: #2899D5;
        color: white;
    }

    tr.text-capitalize:hover td {
        background-color: #FFD966;
    }

    .count-container {
        display: flex;
        align-items: center;
    }

    .count-container span {
        margin-right: 4px; /* Adjust the margin as needed */
    }n-right: 4px; /* Adjust the margin as needed */
    
    </style>
</head>
<script>
        $(document).ready(function () {
            // Function to handle dropdown change event
            $("#filterDropdown").change(function () {
                var filterValue = $(this).val();

                // Ajax request to fetch filtered data
                $.ajax({
                    url: "filter_data.php", // Create a new PHP file (filter_data.php) to handle the backend logic
                    method: "POST",
                    data: { filter: filterValue },
                    success: function (data) {
                        // Update the table body with the filtered data
                        $("#myTable").html(data);
                    }
                });
            });

            // Existing code for search functionality ...
        });
    </script>
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
    <a href="#" class="active"><i class="fa-solid fa-shield-dog fa-lg"></i> Dog Summary</a>
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
            <h3>
                <i class="fa-solid fa-shield-dog fa-lg"></i> Dog Summary 
                <a href="archive.php" class="btn btn-info pull-right" style="width: 80px; margin-right: 10px; margin-top: 1px; letter-spacing: -1px ">
                    <i class="fa-solid fa-box-archive fa-sm"></i> Archive
                </a>
                <a href="insert.php" class="btn btn-warning pull-right" style="width: 130px; margin-right: 10px; letter-spacing: -1px">
                    <i class="fa-solid fa-folder-plus fa-sm"></i> Add new record
                </a>
                <button class="btn btn-primary pull-right" onclick="printTable()" style="margin-right: 10px; height: 28.5px; margin-top: 1px;">
                    <i class="fa-solid fa-print fa-sm"></i> Print
                </button>
            </h3>
                <select id="filterDropdown" class="form-control pull-right" style="width: 220px; margin-right: 10px; height: 30px;">
                    <option value="all">All Dog Summary</option>
                    <option value="soon_to_expire">Soon to Expire Vaccination</option>
                    <option value="expired">Expired Vaccination</option>
                    <option value="unvaccinated">Unvaccinated Since Registered</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" style="width: 111%;">
                <div class="table-responsive">
                    <div class="form-group pull-left">
                        <input type="text" id="myInput" placeholder="Search Keywords...." class="form-control text-capitalize">
                    </div>
                    <table class="table table-bordered table-striped" id="myTable">
                        <thead style="background-color: #2899D5; color: black;">
                        <th id="header-without-centering">#</th>
                        <th>Pet Name</th>
                        <th>Breed</th>
                        <th>Vaccine Status</th>
                        <th>Date Vaccinated</th>
                        <th>Expiration Date</th>
                        <th>Pet Owner Name</th>
                        <th>Mobile No.</th>
                        <th>Address</th>
                        </thead>
                        <tbody>
                        <?php
                        require_once "connection.php";
                        $sql = mysqli_query($con, "SELECT * FROM dogprofile ORDER BY id DESC");
                        $row_count = mysqli_num_rows($sql); // Correctly initialize $row_count
                        $count = $row_count;

                        if ($row_count > 0) {
                            while ($row = mysqli_fetch_array($sql)) {
                                ?>
                                <tr class="text-capitalize">
                                <td>
                                <div class="dropdown dropup">
                                    <div class="count-container">
                                        <span class="custom-margin"><?php echo $count; ?></span>
                                        <button class="btn btn-sm dropdown-toggle dropdown-toggle-black" type="button" id="dropdownMenuButton<?php echo $row['id']; ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: transparent; color: black;" data-bs-toggle="tooltip" data-bs-placement="bottom" title="More Actions">
                                            <i class="fas fa-ellipsis-v" style="color: black;"></i>
                                        </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton<?php echo $row['id']; ?>" style="min-width: auto; border: 1px solid #ccc; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); border-radius: 5px;">
                                        <div class="dropdown-item">
                                            <button type="button" class="btn btn-link" onclick="window.location.href='edit.php?editid=<?php echo htmlentities($row['id']); ?>'">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                        </div>
                                        <div class="dropdown-item">
                                            <button type="button" class="btn btn-link" onclick="confirmDelete(<?php echo htmlentities($row['id']); ?>)">
                                                <i class="fas fa-trash-alt"></i> Delete
                                            </button>
                                        </div>

                                            <!-- Add more items as needed -->

                                        </div>
                                        <script>
                                        function confirmDelete(id) {
                                            if (confirm('Do you really want to remove this record?')) {
                                                window.location.href = 'doginfos.php?delid=' + id;
                                            }
                                        }
                                        </script>
                                        <script>
                                        // Enable Bootstrap Tooltip on the 3-dot button
                                        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                                        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                                            return new bootstrap.Tooltip(tooltipTriggerEl)
                                        });
                                    </script>
                                    </div>
                                    </td>
                                    <td><?php echo $row['petname']; ?></td>
                                    <td><?php echo $row['breed']; ?></td>
                                    <td><?php echo preg_replace('/Pet \d+\s*/', '', $row['vacstatus']);?></td>
                                    <td><?php echo $row['vacsdate']; ?></td>
                                    <td><?php echo $row['expiredate']; ?></td>
                                    <td><?php echo $row['petownername']; ?></td>
                                    <td><?php echo $row['mobilenum']; ?></td>
                                    <td><?php echo $row['address']; ?></td>
                                </tr>
                                <?php
                                $count = $count - 1; // Decrement the count for descending order
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function printTable() {
        var printContents = document.getElementById("myTable").outerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        // Add an event listener for the afterprint event
        window.addEventListener('afterprint', handleAfterPrint);

        // Print the contents
        window.print();
    }

    function handleAfterPrint() {
        // Remove the event listener to prevent multiple reloads
        window.removeEventListener('afterprint', handleAfterPrint);

        // Reload the page when the print is canceled
        location.reload();
    }
</script>

<script>
    $(document).ready(function () {
        $('#myInput').on('keyup', function () {
            var value = $(this).val().toLowerCase();
            $('#myTable tr').filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>



</body>
</html>
