<?php

// delete.php

// Create connection
$conn = mysqli_connect('localhost', 'root', '', 'mentalwellmap');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the username to delete
    $deleteUsername = mysqli_real_escape_string($conn, $_POST["deleteUsername"]);

    // SQL Query to delete user by username
    $sql = "DELETE FROM Users WHERE Username = '$deleteUsername'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<p>User with username '$deleteUsername' deleted successfully.</p>";
    } else {
        echo "<p>Error deleting user: " . mysqli_error($conn) . "</p>";
    }
}

// Close the connection
mysqli_close($conn);

?>
