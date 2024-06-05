<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

// Check if id is set in the URL parameters
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Use prepared statement to avoid SQL injection
    $delete_query = "DELETE FROM users WHERE id = ?";
    $stmt = $con->prepare($delete_query);
    $stmt->bind_param("i", $id);

    // Execute the query
    if ($stmt->execute()) {
        header("Location: adminusers.php"); // Redirect back to adminusers.php
        exit();
    } else {
        echo "Error deleting admin: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Invalid id parameter.";
}
?>
