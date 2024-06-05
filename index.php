<?php 

session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

	require_once "connection.php";

    $queryVaccinated = ("SELECT COUNT(*) as vaccinated_count FROM dogprofile WHERE vacstatus = 'Vaccinated Pet 1' OR vacstatus = 'Vaccinated Pet 2' OR vacstatus = 'Vaccinated Pet 3' OR vacstatus = 'Vaccinated Pet 4' OR vacstatus = 'Vaccinated Pet 5' OR vacstatus = 'Vaccinated Pet 6' OR vacstatus = 'Vaccinated Pet 7' OR vacstatus = 'Vaccinated Pet 8' OR vacstatus = 'Vaccinated Pet 9' OR vacstatus = 'Vaccinated Pet 10' ");
    $resultVaccinated = mysqli_query($con, $queryVaccinated);
    $rowVaccinated = mysqli_fetch_assoc($resultVaccinated);
    $vaccinatedCount = $rowVaccinated['vaccinated_count'];
    // Query the database to count unvaccinated dogs in the specified phase 1
    $queryUnvaccinated = ("SELECT COUNT(*) as unvaccinated_count FROM dogprofile WHERE vacstatus = 'Unvaccinated Pet 1' OR vacstatus = 'Unvaccinated Pet 2' OR vacstatus = 'Unvaccinated Pet 3' OR vacstatus = 'Unvaccinated Pet 4' OR vacstatus = 'Unvaccinated Pet 5' OR vacstatus = 'Unvaccinated Pet 6' OR vacstatus = 'Unvaccinated Pet 7' OR vacstatus = 'Unvaccinated Pet 8' OR vacstatus = 'Unvaccinated Pet 9' OR vacstatus = 'Unvaccinated Pet 10' ");
    $resultUnvaccinated = mysqli_query($con, $queryUnvaccinated);
    $rowUnvaccinated = mysqli_fetch_assoc($resultUnvaccinated);
    $unvaccinatedCount = $rowUnvaccinated['unvaccinated_count'];
    $totalRegister = $vaccinatedCount + $unvaccinatedCount;



    // Define the target phase
    $targetPhase = "Phase 1";
    $targetPhase2 = "Phase 2";
    $targetPhase3 = "Phase 3";

    // Query the database to count vaccinated dogs in the specified phase 1
    $queryVaccinated_phase_1 = ("SELECT COUNT(*) as vaccinated_count_phase_1 FROM dogprofile WHERE address LIKE '%$targetPhase%' AND vacstatus = 'Vaccinated Pet 1' OR vacstatus = 'Vaccinated Pet 2' OR vacstatus = 'Vaccinated Pet 3' OR vacstatus = 'Vaccinated Pet 4' OR vacstatus = 'Vaccinated Pet 5' OR vacstatus = 'Vaccinated Pet 6' OR vacstatus = 'Vaccinated Pet 7' OR vacstatus = 'Vaccinated Pet 8' OR vacstatus = 'Vaccinated Pet 9' OR vacstatus = 'Vaccinated Pet 10'");
    $resultVaccinated_phase_1 = mysqli_query($con, $queryVaccinated_phase_1);
    $rowVaccinated_phase_1 = mysqli_fetch_assoc($resultVaccinated_phase_1);
    $vaccinatedCount_phase_1 = $rowVaccinated_phase_1['vaccinated_count_phase_1'];
    // Query the database to count unvaccinated dogs in the specified phase 1
    $queryUnvaccinated_phase_1 = ("SELECT COUNT(*) as unvaccinated_count_phase_1 FROM dogprofile WHERE address LIKE '%$targetPhase%' AND vacstatus = 'Unvaccinated Pet 1' OR vacstatus = 'Unvaccinated Pet 2' OR vacstatus = 'Unvaccinated Pet 3' OR vacstatus = 'Unvaccinated Pet 4' OR vacstatus = 'Unvaccinated Pet 5' OR vacstatus = 'Unvaccinated Pet 6' OR vacstatus = 'Unvaccinated Pet 7' OR vacstatus = 'Unvaccinated Pet 8' OR vacstatus = 'Unvaccinated Pet 9' OR vacstatus = 'Unvaccinated Pet 10' ");
    $resultUnvaccinated_phase_1 = mysqli_query($con, $queryUnvaccinated_phase_1);
    $rowUnvaccinated_phase_1 = mysqli_fetch_assoc($resultUnvaccinated_phase_1);
    $unvaccinatedCount_phase_1 = $rowUnvaccinated_phase_1['unvaccinated_count_phase_1'];
    $totalRegister_phase_1 = $vaccinatedCount_phase_1 + $unvaccinatedCount_phase_1;



    // Query the database to count vaccinated dogs in the specified phase 2
    $queryVaccinated_phase_2 = "SELECT COUNT(*) as vaccinated_count_phase_2 FROM dogprofile WHERE address LIKE '%$targetPhase2%' AND (vacstatus = 'Vaccinated Pet 1' OR vacstatus = 'Vaccinated Pet 2' OR vacstatus = 'Vaccinated Pet 3' OR vacstatus = 'Vaccinated Pet 4' OR vacstatus = 'Vaccinated Pet 5' OR vacstatus = 'Vaccinated Pet 6' OR vacstatus = 'Vaccinated Pet 7' OR vacstatus = 'Vaccinated Pet 8' OR vacstatus = 'Vaccinated Pet 9' OR vacstatus = 'Vaccinated Pet 10')";
    $resultVaccinated_phase_2 = mysqli_query($con, $queryVaccinated_phase_2);
    $rowVaccinated_phase_2 = mysqli_fetch_assoc($resultVaccinated_phase_2);
    $vaccinatedCount_phase_2 = $rowVaccinated_phase_2['vaccinated_count_phase_2'];
    // Query the database to count unvaccinated dogs in the specified phase 2
    $queryUnvaccinated_phase_2 = "SELECT COUNT(*) as unvaccinated_count_phase_2 FROM dogprofile WHERE address LIKE '%$targetPhase2%' AND (vacstatus = 'Unvaccinated Pet 1' OR vacstatus = 'Unvaccinated Pet 2' OR vacstatus = 'Unvaccinated Pet 3' OR vacstatus = 'Unvaccinated Pet 4' OR vacstatus = 'Unvaccinated Pet 5' OR vacstatus = 'Unvaccinated Pet 6' OR vacstatus = 'Unvaccinated Pet 7' OR vacstatus = 'Unvaccinated Pet 8' OR vacstatus = 'Unvaccinated Pet 9' OR vacstatus = 'Unvaccinated Pet 10')";
    $resultUnvaccinated_phase_2 = mysqli_query($con, $queryUnvaccinated_phase_2);
    $rowUnvaccinated_phase_2 = mysqli_fetch_assoc($resultUnvaccinated_phase_2);
    $unvaccinatedCount_phase_2 = $rowUnvaccinated_phase_2['unvaccinated_count_phase_2'];
    $totalRegister_phase_2 = $vaccinatedCount_phase_2 + $unvaccinatedCount_phase_2;

    // Query the database to count vaccinated dogs in the specified phase 3
    $queryVaccinated_phase_3 = "SELECT COUNT(*) as vaccinated_count_phase_3 FROM dogprofile WHERE address LIKE '%$targetPhase3%' AND (vacstatus = 'Vaccinated Pet 1' OR vacstatus = 'Vaccinated Pet 2' OR vacstatus = 'Vaccinated Pet 3' OR vacstatus = 'Vaccinated Pet 4' OR vacstatus = 'Vaccinated Pet 5' OR vacstatus = 'Vaccinated Pet 6' OR vacstatus = 'Vaccinated Pet 7' OR vacstatus = 'Vaccinated Pet 8' OR vacstatus = 'Vaccinated Pet 9' OR vacstatus = 'Vaccinated Pet 10')";
    $resultVaccinated_phase_3 = mysqli_query($con, $queryVaccinated_phase_3);
    $rowVaccinated_phase_3 = mysqli_fetch_assoc($resultVaccinated_phase_3);
    $vaccinatedCount_phase_3 = $rowVaccinated_phase_3['vaccinated_count_phase_3'];
    // Query the database to count unvaccinated dogs in the specified phase 3
    $queryUnvaccinated_phase_3 = "SELECT COUNT(*) as unvaccinated_count_phase_3 FROM dogprofile WHERE address LIKE '%$targetPhase3%' AND (vacstatus = 'Unvaccinated Pet 1' OR vacstatus = 'Unvaccinated Pet 2' OR vacstatus = 'Unvaccinated Pet 3' OR vacstatus = 'Unvaccinated Pet 4' OR vacstatus = 'Unvaccinated Pet 5' OR vacstatus = 'Unvaccinated Pet 6' OR vacstatus = 'Unvaccinated Pet 7' OR vacstatus = 'Unvaccinated Pet 8' OR vacstatus = 'Unvaccinated Pet 9' OR vacstatus = 'Unvaccinated Pet 10')";
    $resultUnvaccinated_phase_3 = mysqli_query($con, $queryUnvaccinated_phase_3);
    $rowUnvaccinated_phase_3 = mysqli_fetch_assoc($resultUnvaccinated_phase_3);
    $unvaccinatedCount_phase_3 = $rowUnvaccinated_phase_3['unvaccinated_count_phase_3'];
    $totalRegister_phase_3 = $vaccinatedCount_phase_3 + $unvaccinatedCount_phase_3;


    // Query to fetch the last 5 recent rows from your database
    $sql = mysqli_query($con, "SELECT * FROM dogprofile ORDER BY id DESC LIMIT 5");



            
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
    <script src ="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
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
        .container {
            text-align: center;
            }

        .vacstatus {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            margin-top: 20px;
            }

        .vacstatus > div {
            color: #111; font-family: 'Montserrat', sans-serif; 
            font-size: 15px; 
            font-weight: bold; 
            letter-spacing: 1px; 
            line-height: 1; 
            width: 300px;
            height: 130px;
            color: #ffffff; /* Text color */
            text-shadow: 1px 1px 2px black;
            margin: 10px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;
            }

        .vacstatus .vaccine{
            background-color: #2899D5;
        }

        .vacstatus .unvaccine{
            background-color: #FF6969;
        }

        .vacstatus .register{
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
         /* Add styles for the label (words) */
        .vacstatus .label {
            font-size: 15px; /* Adjust the font size for the words */
            
        }

        /* Add styles for the count (numbers) */
        .vacstatus .count {
            font-size: 50px; /* Adjust the font size for the numbers */
        }
        .recent-input {
        margin-top: 20px;
        margin-left: 10px;
        margin-right: 10px;
        }

        .table-responsive {
            font-size: 12px; /* Set the font size to make it smaller */
            
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            background-color: #fff; /* Table background color */
            border-radius: 6px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .table thead th {
            border-top: none;
            background-color: #2899D5; /* Table header background color */
            text-align: center;
        }

        .table tbody tr {
            transition: background-color 0.3s;
        }

        .table tbody tr:hover {
            background-color: #FFD966; /* Hover color for table rows */
        }

        .table-bordered {
            border: 2px solid #e9e9e9;
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
    <a href="#" class="active"><i class="fa-solid fa-house"] aria-hidden="true"></i> Dashboard</a>
    <a href="doginfos.php"><i class="fa-solid fa-shield-dog fa-lg"></i> Dog Summary</a>
    <a href="analytics.php"><i class="fa-solid fa-chart-simple fa-lg"></i> Analytics</a>
    <a href="adminusers.php"><i class="fa fa-users aria" aria-hidden="true"></i> Admin Users</a>
    <a href="about.php"><i class="fa fa-info-circle" aria-hidden="true"></i> About</a>
    <div class="logout">
        <a href="logout.php">
        <i class="fas fa-sign-out-alt"></i> Logout
    </a>
</div>

</div>

	<div class="container">
		<div class="content">
            <h3><i class="fa-solid fa-house fa-sm"></i> Dashboard</h3>
            <label for="phaseSelect" style="display: inline-block; width: 120px; text-align: right;  margin-left: 550px; margin-top:"> Select a Phase:</label>
            <select id="phaseSelect" style="width: 150px;">
                <option value="all" selected>All</option>
                <option value="phase1">Phase 1</option>
                <option value="phase2">Phase 2</option>
                <option value="phase3">Phase 3</option>
            </select>   
            <div id ="vacstatus" class="vacstatus">
            </div>
            
			<div class="recent-input" >
				 <div class="table-responsive">
                    <h3><i class="fa-solid fa-keyboard fa-sm"></i> Recent Input</h3><br><br><br>
				    <table class="table table-bordered table-striped">
					<thead>
                        <th>Pet Name</th>
                        <th>Breed</th>
                        <th>Vaccine Status</th>
                        <th>Date Vaccinated</th>
                        <th>Expiration Date</th>
                        <th>Pet Owner Name</th>
                        <th>Mobile No.</th>
                        <th>Address </th>
					</thead>
					<tbody>
                        <?php
                        while ($row = mysqli_fetch_array($sql)) {
                        ?>
                        <tr class="text-capitalize">
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
                        }
                        ?>
                    </tbody>
				    </table>
				</div>
			</div>
		</div>
     </div>
	<?php //echo $user_data['user_name']; ?>
</body>
<script>
        // Get references to the select element and the output div
        const phaseSelect = document.getElementById('phaseSelect');
        const vacstatus = document.getElementById('vacstatus');

        // Define a function to handle the selection change
        const updateVacStatus = () => {
            const selectedValue = phaseSelect.value;
            let vaccinatedCount, unvaccinatedCount, totalRegister;
            
            // You can perform AJAX requests here to fetch and display data based on the selected phase
            // For this example, we'll just display a message based on the selection
            switch (selectedValue) {
                case 'all':
                    vaccinatedCount = <?php echo $vaccinatedCount; ?>;
                    unvaccinatedCount = <?php echo $unvaccinatedCount; ?>;
                    totalRegister = <?php echo $totalRegister; ?>;
                    break;
                case 'phase1':
                    vaccinatedCount = <?php echo $vaccinatedCount_phase_1; ?>;
                    unvaccinatedCount = <?php echo $unvaccinatedCount_phase_1; ?>;
                    totalRegister = <?php echo $totalRegister_phase_1; ?>;
                    break;
                case 'phase2':
                    vaccinatedCount = <?php echo $vaccinatedCount_phase_2; ?>;
                    unvaccinatedCount = <?php echo $unvaccinatedCount_phase_2; ?>;
                    totalRegister = <?php echo $totalRegister_phase_2; ?>;
                    break;
                case 'phase3':
                    vaccinatedCount = <?php echo $vaccinatedCount_phase_3; ?>;
                    unvaccinatedCount = <?php echo $unvaccinatedCount_phase_3; ?>;
                    totalRegister = <?php echo $totalRegister_phase_3; ?>;
                    break;
            }
            vacstatus.innerHTML = `
            <div class="vaccine">
                <span class="count">${vaccinatedCount}</span><br>
                <span class="label">Vaccinated Dogs</span> 
            </div>
            <div class="unvaccine">
                <span class="count">${unvaccinatedCount}</span><br>
                <span class="label">Unvaccinated Dogs</span> 
            </div>
            <div class="register">
                <span class="count">${totalRegister}</span><br>
                <span class="label">Dog Registered</span>   
            </div>
        `;
        };

        
            // Simulate the change event to set the default display
            updateVacStatus();
            // Add event listener to handle the selection change
            phaseSelect.addEventListener('change', updateVacStatus);
    </script>
</html>