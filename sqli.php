<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

$server = "localhost"; // Replace with your database server
$username = "claimbo1_wallet"; // Replace with your database username
$password = "claimbo1_wallet"; // Replace with your database password
$database = "claimbo1_wallet"; // Replace with your database name

// Create a connection to the database
$conn = mysqli_connect($server, $username, $password, $database);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Path where you want to store the SQL dump file
$outputFile = '/home/claimbo1/public_html/booster.sql'; 

// Check if database connection variables are defined
if (isset($server, $username, $password, $database)) {
    // Command to execute mysqldump
    $command = "mysqldump -u $username -p$password -h $server $database > $outputFile 2>&1";

    // Execute the command
    exec($command, $output, $returnVar);

    // Check if the command executed successfully
    if ($returnVar === 0) {
        echo "Database backup created successfully!";
    } else {
        echo "Error creating database backup. Please check your credentials and try again.";
    }
} else {
    echo "Database connection variables are not properly defined. Please check the database connection file.";
}
?>
