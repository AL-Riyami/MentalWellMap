<?php

// Get the data from HTML FORM
$rev = $_GET["Rev"];
$AuthorName = $_GET["AuthorName"];
$Date = $_GET["DateD"];

// Create connection
$conn = mysqli_connect('localhost', 'root', '', 'mentalwellmap');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Sanitize input data
$rev = mysqli_real_escape_string($conn, $rev);
$AuthorName = mysqli_real_escape_string($conn, $AuthorName);
$Date = mysqli_real_escape_string($conn, $Date);


// SQL Query to save the data into the database using prepared statement
// SQL Query to save the data into the database using prepared statement
$sql = "INSERT INTO `reviews` (`Name`, `ReviewText`, `ReviewDate`) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);

// Bind parameters
mysqli_stmt_bind_param($stmt, "sss", $AuthorName, $rev, $Date);

// Execute the query to store the data in the database
$res = mysqli_stmt_execute($stmt);


// Check for successful insertion
if ($res) {
    $message = "Data inserted successfully!";
    // Redirect to user.html
    echo '<script>window.location.href = "index.html";</script>';
    exit();

   
} else {
    $message = "Error: " . mysqli_error($conn);
}

// Close the statement and connection
mysqli_stmt_close($stmt);
mysqli_close($conn);

echo $message;
?>

      
</body>
</html>




