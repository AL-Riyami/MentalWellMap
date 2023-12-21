<?php

// Get the data from HTML FORM
$firstnamee = $_GET["fname"];
$LastNamee = $_GET["lname"];
$userNamee = $_GET["username"];
$passwordd = $_GET["password"];
$emaill = $_GET["email"];
$phoneNumber = $_GET["phoneNum"];

// Create connection
$conn = mysqli_connect('localhost', 'root', '', 'mentalwellmap');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Sanitize input data to prevent SQL injection
$firstnamee = mysqli_real_escape_string($conn, $firstnamee);
$LastNamee = mysqli_real_escape_string($conn, $LastNamee);
$userNamee = mysqli_real_escape_string($conn, $userNamee);
$emaill = mysqli_real_escape_string($conn, $emaill);
$phoneNumber = mysqli_real_escape_string($conn, $phoneNumber);
$passwordd = mysqli_real_escape_string($conn, $passwordd);

// SQL Query to save the data into the database using prepared statement
$sql = "INSERT INTO `users` (`FirstName`, `LastName`, `Email`, `UserName`, `Password`, `PhoneNumber`) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);

// Bind parameters to the prepared statement
mysqli_stmt_bind_param($stmt, "ssssss", $firstnamee, $LastNamee, $emaill, $userNamee, $passwordd, $phoneNumber);

// Execute the query to store the data in the database
$res = mysqli_stmt_execute($stmt);

// Check for successful insertion
if ($res) {
    $message = "Data inserted successfully!";
    // Redirect to user.html after successful insertion
    echo '<script>window.location.href = "index.html";</script>';
    exit();
} else {
    // Handle insertion failure
    $message = "Error: " . mysqli_error($conn);
}

// Close the prepared statement and connection
mysqli_stmt_close($stmt);
mysqli_close($conn);

// Output the final message (success or error)
echo $message;

?>
