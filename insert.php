<?php
require_once "connection.php";

if(isset($_POST['submit'])){
    $petname = $_POST['petname'];
    $breed = $_POST['breed'];
    $address_line1 = $_POST['address_line1'];
    $barangay = $_POST['barangay'];
    $city = $_POST['city'];
    $state_province = $_POST['state_province'];
    $mobilenum = $_POST['mobilenum'];
    $vacsdate = $_POST['vacsdate'];
    $petownername = $_POST['petownername'];

    // Concatenate the address components into a single string
    $address = "$address_line1, $barangay, $city, $state_province";

    // Check the number of existing records with the same address
    $existingRecords = mysqli_query($con, "SELECT * FROM dogprofile WHERE address = '$address'");
    $recordCount = mysqli_num_rows($existingRecords);

    // Determine the vaccine status based on the count
    $vaccineNumber = $recordCount + 1;
    $vacstatus = ($_POST['vacstatus'] == 'Vaccinated') ? "Vaccinated Pet $vaccineNumber" : "Unvaccinated Pet $vaccineNumber";

    // Calculate the expiration date (if vaccinated)
    $expiredate = ($_POST['vacstatus'] == 'Vaccinated') ? date('Y-m-d', strtotime($vacsdate . ' +6 months')) : null;

    // Insert data into the database
    $sql = mysqli_query($con, "INSERT INTO dogprofile(petname, breed, vacstatus, vacsdate, petownername, mobilenum, address, expiredate) VALUES ('$petname','$breed','$vacstatus','$_POST[vacsdate]','$_POST[petownername]','$_POST[mobilenum]','$address','$expiredate')");

    if ($sql) {
        echo "<script>alert('New record successfully added!!!');</script>";
        echo "<script>document.location='doginfos.php';</script>";
    } else {
        echo "<script>alert('Something went wrong');</script>";
    }
}
?>

<script>
    function toggleDateInput() {
        var vacstatus = document.getElementById('vacstatus');
        var vacsdate = document.getElementById('vacsdate');
        var expiredate = document.getElementById('expiredate');

        // If "Unvaccinated" is selected, disable the date input; otherwise, enable it
        vacsdate.disabled = (vacstatus.value === 'Unvaccinated');

        // Calculate expiration date when date vaccinated is entered
        if (vacsdate.value && vacstatus.value === 'Vaccinated') {
            var sixMonthsLater = new Date(vacsdate.value);
            sixMonthsLater.setMonth(sixMonthsLater.getMonth() + 6);

            // Format the date as 'YYYY-MM-DD'
            var formattedDate = sixMonthsLater.toISOString().split('T')[0];

            // Set the calculated expiration date
            expiredate.value = formattedDate;
        } else {
            // Clear the expiration date if date vaccinated is not entered or pet is unvaccinated
            expiredate.value = '';
        }
    }
</script>
<html>
    <head>
        <title>Insert</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
        <script src ="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    </head>
        <style>
            body {
                background-color: #f8f9fa;
                font-family: 'Arial', sans-serif;
            }

            .container {
                margin-top: 50px;
                background-color: #ffffff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

            h2 {
                color: #333333;
            }

            label {
                font-weight: bold;
                color: #333333;
            }

            input, select {
                margin-bottom: 10px;
            }

            button, a {
                margin-top: 10px;
            }
        </style>
    <body>
        <div class="container" style="width:50%">
            <div class="row">
                <div class="col-md-6">
                    <h2>Add New Record</h2>
                </div>
            </div>
            <form method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <label>Pet Name</label>
                        <input type="text" name="petname" class="form-control text-capitalize" placeholder="Enter Pet name" required>
                    </div>
                    <div class="col-md-6">
                    <label>Vaccination Status</label>
                    <select name="vacstatus" id="vacstatus" class="form-control" required onchange="toggleDateInput()">
                        <option value="" <?php echo (!isset($_POST['vacstatus']) || $_POST['vacstatus'] == '') ? 'selected' : 'disabled'; ?>>Select Vaccination Status</option>
                        <option value="Vaccinated" <?php echo (isset($_POST['vacstatus']) && $_POST['vacstatus'] == 'Vaccinated') ? 'selected' : ''; ?>>Vaccinated</option>
                        <option value="Unvaccinated" <?php echo (isset($_POST['vacstatus']) && $_POST['vacstatus'] == 'Unvaccinated') ? 'selected' : ''; ?>>Unvaccinated</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label>Date Vaccinated</label>
                    <?php
                    $disabledAttribute = (!isset($_POST['vacstatus']) || $_POST['vacstatus'] == 'Unvaccinated') ? 'disabled' : '';
                    ?>
                    <input type="date" name="vacsdate" id="vacsdate" class="form-control text-capitalize" <?php echo $disabledAttribute; ?>>
                </div>
                <div class="col-md-6">
                    <label>Expiration Date</label>
                    <?php
                    $disabledAttribute = (!isset($_POST['vacstatus']) || $_POST['vacstatus'] == 'Unvaccinated') ? 'disabled' : '';
                    ?>
                    <input type="date" name="vacsdate" id="vacsdate" class="form-control text-capitalize" <?php echo $disabledAttribute; ?>>
                </div>

                <script>
                    function toggleDateInput() {
                        var vacstatus = document.getElementById('vacstatus');
                        var vacsdate = document.getElementById('vacsdate');

                        // If "Unvaccinated" is selected, disable the date input; otherwise, enable it
                        vacsdate.disabled = (vacstatus.value === 'Unvaccinated');
                    }
                </script>
                                
                
                    <div class="col-md-6">
                        <label>Pet Breed</label>
                                <select name="breed" class="form-control text-capitalize" required>
                                    <option value="" disabled selected>Select Pet Breed</option>
                                    <option value="American Bully">American Bully</option>
                                    <option value="Aspin">Aspin</option>
                                    <option value="Beagle">Beagle</option>
                                    <option value="Boxer">Boxer</option>
                                    <option value="Bulldog">Bulldog</option>
                                    <option value="Cairn Terrier">Cairn Terrier</option>
                                    <option value="Chihuahua">Chihuahua</option>
                                    <option value="Chow Chow">Chow Chow</option>
                                    <option value="Dachshund">Dachshund</option>
                                    <option value="Dalmatian">Dalmatian</option>
                                    <option value="Doobie">Doobie</option>
                                    <option value="Dobberman">Dobberman</option>
                                    <option value="French Bulldog">French Bulldog</option>
                                    <option value="Golden Retriever">Golden Retriever</option>
                                    <option value="Husky">Husky</option>
                                    <option value="Japanese Spitz">Japanese Spitz</option>
                                    <option value="Labrador Retriever">Labrador Retriever</option>
                                    <option value="Maltese">Maltese</option>
                                    <option value="Papillon">Papillon</option>
                                    <option value="Poddle">Poddle</option>
                                    <option value="Pomeranian">Pomeranian</option>
                                    <option value="Pug">Pug</option>
                                    <option value="Rottweiler">Rottweiler</option>
                                    <option value="Sharpei">Sharpei</option>
                                    <option value="Shih Tzu">Shih Tzu</option>
                                    <option value="Siberian Husky">Siberian Husky</option>
                                    <option value="St Bernard">St Bernard</option>
                                    <option value="Yorkshire Terrier">Yorkshire Terrier</option>
                                    <!-- Add more options for different common dog breeds in the Philippines -->
                                </select>
                    </div>
                </div>
                <br>
                <br>
            
            <div class="row">
                    <div class="col-md-6">
                        <label>Pet Owner Name</label>
                        <input type="text" name="petownername" class="form-control text-capitalize" placeholder="Enter Pet Owner Name" required>
                    </div>
                    <div class="col-md-6">
                        <label>Mobile Number</label>
                        <input type="int" name="mobilenum" class="form-control text-capitalize" placeholder="Enter Mobile Number" required>
                    </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label>Blk/Lot/Section/Phase/Subdivision</label>
                    <input type="text" name="address_line1" class="form-control text-capitalize" placeholder="Blk/Lot/Phase/Section/Subdivision" required>
                </div>
                    <div class="col-md-6">
                        <label>Barangay</label>
                        <input type="text" name="barangay" class="form-control text-capitalize" placeholder="Enter Barangay" required>
                    </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                        <label>City</label>
                        <input type="text" name="city" class="form-control text-capitalize" placeholder="Enter City" required>
                </div>
                    <div class="col-md-6">
                        <label>State/Province</label>
                        <input type="text" name="state_province" class="form-control text-capitalize" placeholder="Enter State/Province" required>
                    </div>  
            </div>
                <div class="row" style="margin-top 1%">
                    <div class="col-md-6">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        <a href="doginfos.php" class="btn btn-info">View Dog summary</a>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>