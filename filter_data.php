<?php
// Include necessary files and initialize the session
session_start();
include("connection.php");
include("functions.php");

// Check if the user is logged in
$user_data = check_login($con);

if (isset($_POST['filter'])) {
    $filter = $_POST['filter'];

    // Your existing SQL query logic with the filter value
    if ($filter === 'all') {
        // Fetch all data when the filter is "all"
        $sql = mysqli_query($con, "SELECT * FROM dogprofile ORDER BY id DESC");
    } elseif ($filter === 'soon_to_expire') {
        // Fetch data where vaccinations are automatically set to expire within the next 6 months
        $sixMonthsFromNow = date('Y-m-d', strtotime('+6 months'));
        $sql = mysqli_query($con, "SELECT * FROM dogprofile WHERE DATEDIFF(DATE_ADD(vacsdate, INTERVAL 6 MONTH), CURDATE()) BETWEEN 1 AND 30 ORDER BY id DESC");
    } elseif ($filter === 'expired') {
        // Fetch data where vaccinations are automatically set to expire within the next 6 months
        $sql = mysqli_query($con, "SELECT * FROM dogprofile WHERE DATE_ADD(vacsdate, INTERVAL 6 MONTH) <= CURDATE() ORDER BY id DESC");

        // Update the status of expired pets to "Unvaccinated"
        while ($row = mysqli_fetch_array($sql)) {
            $expireDate = $row['expiredate'];
            $currentDate = date('Y-m-d');

            if ($expireDate <= $currentDate && stripos($row['vacstatus'], 'unvaccinated') === false) {
                // Update the status to replace "Vaccinated" with "Unvaccinated" in the database
                $newVacstatus = str_replace('Vaccinated', 'Unvaccinated', $row['vacstatus']);
                mysqli_query($con, "UPDATE dogprofile SET vacstatus = '{$newVacstatus}' WHERE id = " . $row['id']);
            }
        }

        // Fetch the data again after the update
        $sql = mysqli_query($con, "SELECT * FROM dogprofile WHERE DATE_ADD(vacsdate, INTERVAL 6 MONTH) <= CURDATE() ORDER BY id DESC");
    }elseif ($filter === 'unvaccinated') {
        // Fetch data for unvaccinated dogs without a date vaccinated
        $sql = mysqli_query($con, "SELECT * FROM dogprofile WHERE LOWER(vacstatus) LIKE '%unvaccinated%' AND vacsdate IS NULL OR vacsdate = '' ORDER BY id DESC");
    }
    

    // Get the total number of rows
    $totalRows = mysqli_num_rows($sql);

    // Use the fetched data to generate the HTML for the table rows
    ?>
    <table class="table table-bordered table-striped">
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
        while ($row = mysqli_fetch_array($sql)) {
            // Calculate the current row number in descending order
            $count = $totalRows--;

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
        }
        ?>
        </tbody>
    </table>
    <?php
}
?>
