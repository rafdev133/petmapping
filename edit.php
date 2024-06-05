<?php
require_once "connection.php";

if(isset($_POST['update'])){
    $eid = $_GET['editid'];
    $petname = $_POST['petname'];
    $breed = $_POST['breed'];
    $address_line1 = $_POST['address_line1'];
    $barangay = $_POST['barangay'];
    $city = $_POST['city'];
    $state_province = $_POST['state_province'];
    $mobilenum = $_POST['mobilenum'];
    $vacsdate = $_POST['vacsdate'];
    $petownername = $_POST['petownername'];

    $address = "$address_line1, $barangay, $city, $state_province";
    
    // Retrieve the original record
    $originalRecord = mysqli_query($con, "SELECT * FROM dogprofile WHERE id = '$eid'");
    $originalData = mysqli_fetch_assoc($originalRecord);

    // Extract the number from the original vaccine status
    $existingNumber = intval(preg_replace('/[^0-9]+/', '', $originalData['vacstatus']));

    // Use the existing number for the vaccine status
    $vacstatus = ($_POST['vacstatus'] == 'Vaccinated') ? "Vaccinated Pet $existingNumber" : "Unvaccinated Pet $existingNumber";

    // Calculate the expiration date (if vaccinated)
    $expiredate = ($_POST['vacstatus'] == 'Vaccinated') ? date('Y-m-d', strtotime($vacsdate . ' +6 months')) : null;

    $sql = mysqli_query($con, "UPDATE dogprofile SET petname='$petname', breed='$breed', vacstatus='$vacstatus', vacsdate='$vacsdate', petownername='$petownername', mobilenum='$mobilenum', address='$address', expiredate='$expiredate' WHERE id='$eid'");
    
    if($sql){
        echo "<script>alert('You have successfully updated the record!');</script>";
        echo "<script>document.location='doginfos.php';</script>";
    } else {
        echo "<script>alert('Something went wrong');</script>";
    }
}

function getAddressDetails($address)
{
    $details = explode(', ', $address);
    $result = array(
        'line1' => isset($details[0]) ? $details[0] : '',
        'barangay' => isset($details[1]) ? $details[1] : '',
        'city' => isset($details[2]) ? $details[2] : '',
        'state_province' => isset($details[3]) ? $details[3] : ''
    );
    return $result;
}
?>

<html>
<head>
    <title>Edit Record</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
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
    
<body onload="toggleDateInput()">
    <div class="container" style="width:50%">
        <div class="row">
            <div class="col-md-6">
                <h2>Update Record</h2>
            </div>
        </div>
        <form method="POST">
        <?php
            $eid = $_GET['editid'];
            $sql = mysqli_query($con, "SELECT * FROM dogprofile WHERE id='$eid'");
            while($row = mysqli_fetch_array($sql)){
        ?>
            <div class="row">
                <div class="col-md-6">
                    <label>Pet Name</label>
                    <input type="text" name="petname" value="<?php echo $row['petname'];?>" class="form-control text-capitalize" placeholder="Enter Pet name" required>
                </div>
                <div class="col-md-6">
                    <label for="vacstatus">Vaccination Status</label>
                    <select name="vacstatus" id="vacstatus" class="form-control" required onchange="toggleDateInput()">
                        <option value="" disabled>Select Vaccine Status</option>
                        <option value="Vaccinated" <?php echo (strpos($row['vacstatus'], 'Vaccinated') !== false) ? 'selected' : ''; ?>>Vaccinated</option>
                        <option value="Unvaccinated" <?php echo (strpos($row['vacstatus'], 'Unvaccinated') !== false) ? 'selected' : ''; ?>>Unvaccinated</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label>Date Vaccinated</label>
                    <?php
                    $disabledAttribute = (strpos($row['vacstatus'], 'Unvaccinated') !== false) ? 'disabled' : '';
                    ?>
                    <input type="date" name="vacsdate" id="vacsdate" value="<?php echo isset($_POST['vacsdate']) ? $_POST['vacsdate'] : (isset($row['vacsdate']) ? $row['vacsdate'] : ''); ?>" class="form-control text-capitalize" required <?php echo $disabledAttribute; ?>>
                </div>
                <div class="col-md-6">
                    <label>Expiration Date</label>
                    <?php
                    $disabledAttribute = (strpos($row['vacstatus'], 'Unvaccinated') !== false) ? 'disabled' : '';
                    ?>
                    <input type="date" name="expiredate" id="expiredate" value="<?php echo isset($_POST['expiredate']) ? $_POST['expiredate'] : (isset($row['expiredate']) ? $row['expiredate'] : ''); ?>" class="form-control text-capitalize" required <?php echo $disabledAttribute; ?>>
                </div>

                <script>
                    function toggleDateInput() {
                        var vacstatus = document.getElementById('vacstatus');
                        var vacsdate = document.getElementById('vacsdate');
                        var expiredate = document.getElementById('expiredate');

                        // If "Unvaccinated" is selected, disable the date inputs and clear their values
                        if (vacstatus.value === 'Unvaccinated') {
                            vacsdate.disabled = true;
                            expiredate.disabled = true;
                            vacsdate.value = '';
                            expiredate.value = '';
                        } else {
                            // If "Vaccinated" is selected, enable the date inputs

                            vacsdate.disabled = false;

                            // Calculate expiration date when date vaccinated is entered
                            if (vacsdate.value) {
                                var sixMonthsLater = new Date(vacsdate.value);
                                sixMonthsLater.setMonth(sixMonthsLater.getMonth() + 6);

                                // Format the date as 'YYYY-MM-DD'
                                var formattedDate = sixMonthsLater.toISOString().split('T')[0];

                                // Set the calculated expiration date
                                expiredate.value = formattedDate;
                            }
                        }
                    }
                </script>


                <div class="col-md-6">
                    <label>Pet Breed</label>
                    <select name="breed" class="form-control text-capitalize" required>
                        <option value="" disabled selected>Select Pet Breed</option>
                        <option value="American Bully" <?php if($row['breed'] === 'American Bully') echo 'selected'; ?>>American Bully</option>
                        <option value="Aspin" <?php if ($row['breed'] === 'Aspin') echo 'selected'; ?>>Aspin</option>
                        <option value="Beagle" <?php if ($row['breed'] === 'Beagle') echo 'selected'; ?>>Beagle</option>
                        <option value="Boxer" <?php if ($row['breed'] === 'Boxer') echo 'selected'; ?>>Boxer</option>
                        <option value="Bulldog" <?php if ($row['breed'] === 'Bulldog') echo 'selected'; ?>>Bulldog</option>
                        <option value="Cairn Terrier" <?php if ($row['breed'] === 'Cairn Terrier') echo 'selected'; ?>>Cairn Terrier</option>
                        <option value="Chihuahua" <?php if ($row['breed'] === 'Chihuahua') echo 'selected'; ?>>Chihuahua</option>
                        <option value="Chow Chow" <?php if ($row['breed'] === 'Chow Chow') echo 'selected'; ?>>Chow Chow</option>
                        <option value="Dachshund" <?php if ($row['breed'] === 'Dachshund') echo 'selected'; ?>>Dachshund</option>
                        <option value="Dalmatian" <?php if ($row['breed'] === 'Dalmatian') echo 'selected'; ?>>Dalmatian</option>
                        <option value="Doobie" <?php if ($row['breed'] === 'Doobie') echo 'selected'; ?>>Doobie</option>
                        <option value="Dobberman" <?php if ($row['breed'] === 'Dobberman') echo 'selected'; ?>>Dobberman</option>
                        <option value="French Bulldog" <?php if ($row['breed'] === 'French Bulldog') echo 'selected'; ?>>French Bulldog</option>
                        <option value="Golden Retriever" <?php if ($row['breed'] === 'Golden Retriever') echo 'selected'; ?>>Golden Retriever</option>
                        <option value="Husky" <?php if ($row['breed'] === 'Husky') echo 'selected'; ?>>Husky</option>
                        <option value="Japanese Spitz" <?php if ($row['breed'] === 'Japanese Spitz') echo 'selected'; ?>>Japanese Spitz</option>
                        <option value="Labrador Retriever" <?php if ($row['breed'] === 'Labrador Retriever') echo 'selected'; ?>>Labrador Retriever</option>
                        <option value="Maltese" <?php if ($row['breed'] === 'Maltese') echo 'selected'; ?>>Maltese</option>
                        <option value="Papillon" <?php if ($row['breed'] === 'Papillon') echo 'selected'; ?>>Papillon</option>
                        <option value="Poddle" <?php if ($row['breed'] === 'Poddle') echo 'selected'; ?>>Poddle</option>
                        <option value="Pomeranian" <?php if ($row['breed'] === 'Pomeranian') echo 'selected'; ?>>Pomeranian</option>
                        <option value="Pug" <?php if ($row['breed'] === 'Pug') echo 'selected'; ?>>Pug</option>
                        <option value="Rottweiler" <?php if ($row['breed'] === 'Rottweiler') echo 'selected'; ?>>Rottweiler</option>
                        <option value="Sharpei" <?php if ($row['breed'] === 'Sharpei') echo 'selected'; ?>>Sharpei</option>
                        <option value="Shih Tzu" <?php if ($row['breed'] === 'Shih Tzu') echo 'selected'; ?>>Shih Tzu</option>
                        <option value="Siberian Husky" <?php if ($row['breed'] === 'Siberian Husky') echo 'selected'; ?>>Siberian Husky</option>
                        <option value="St Bernard" <?php if ($row['breed'] === 'St Bernard') echo 'selected'; ?>>St Bernard</option>
                        <option value="Yorkshire Terrier" <?php if ($row['breed'] === 'Yorkshire Terrier') echo 'selected'; ?>>Yorkshire Terrier</option>
                        
                    </select>
                </div>
            </div>
            <br>
            <br>
            
            <div class="row">
                <div class="col-md-6">
                    <label>Pet Owner Name</label>
                    <input type="text" name="petownername" value="<?php echo isset($_POST['petownername']) ? $_POST['petownername'] : (isset($row['petownername']) ? $row['petownername'] : ''); ?>" class="form-control text-capitalize" placeholder="Enter Pet Owner Name" required>
                </div>
                <div class="col-md-6">
                    <label>Mobile Number</label>
                    <input type="text" name="mobilenum" value="<?php echo isset($_POST['mobilenum']) ? $_POST['mobilenum'] : (isset($row['mobilenum']) ? $row['mobilenum'] : ''); ?>" class="form-control text-capitalize" placeholder="Enter Mobile Number" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Blk/Lot/Section/Phase/Subdivision</label>
                    <input type="text" name="address_line1" value="<?php echo isset($_POST['address_line1']) ? $_POST['address_line1'] : (isset($row['address']) ? getAddressDetails($row['address'])['line1'] : ''); ?>" class="form-control text-capitalize" placeholder="Blk/Lot/Phase/Section/Subdivision" required>
                </div>
                <div class="col-md-6">
                    <label>Barangay</label>
                    <input type="text" name="barangay" value="<?php echo isset($_POST['barangay']) ? $_POST['barangay'] : (isset($row['address']) ? getAddressDetails($row['address'])['barangay'] : ''); ?>" class="form-control text-capitalize" placeholder="Enter your Barangay" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label>City</label>
                    <input type="text" name="city" value="<?php echo isset($_POST['city']) ? $_POST['city'] : (isset($row['address']) ? getAddressDetails($row['address'])['city'] : ''); ?>" class="form-control text-capitalize" placeholder="Enter your City" required>
                </div>
                <div class="col-md-6">
                    <label>State/Province</label>
                    <input type="text" name="state_province" value="<?php echo isset($_POST['state_province']) ? $_POST['state_province'] : (isset($row['address']) ? getAddressDetails($row['address'])['state_province'] : ''); ?>" class="form-control text-capitalize" placeholder="Enter your State/Province" required>
                </div>
            </div>
            <?php } ?>            
            <div class="row" style="margin-top 1%">
                <div class="col-md-6">
                    <button type="submit" name="update" class="btn btn-primary">Submit</button>
                    <a href="doginfos.php" class="btn btn-success">View Record</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
