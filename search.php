<?php

// search.php

// Create connection
$conn = mysqli_connect('localhost', 'root', '', 'mentalwellmap');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the search name
    $searchName = mysqli_real_escape_string($conn, $_POST["searchName"]);

    // SQL Query to search for users by name
    $sql = "SELECT * FROM Users WHERE Username LIKE '%$searchName%'";
    $result = mysqli_query($conn, $sql);

    // Display matching records
    echo "<h2>Search Results</h2>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<p><strong>First Name:</strong> {$row['FirstName']}</p>";
        echo "<p><strong>Last Name:</strong> {$row['LastName']}</p>";
        echo "<p><strong>Email:</strong> {$row['Email']}</p>";
        echo "<p><strong>Username:</strong> $searchName</p>";
        echo "<p><strong>Phone Number:</strong> {$row['PhoneNumber']}</p>";
        echo "<hr>";
    }

    // Close the result set
    mysqli_free_result($result);
}

// Close the connection
mysqli_close($conn);

?>
