<?php
// Database connection
$servername = "localhost";
$username = "root";      // change if needed
$password = "rootadmin";          // change if needed
$dbname = "nexgeniq";    // your DB name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$email = $_POST['email'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$job_title = $_POST['job_title'];
$company = $_POST['company'];
$phone = $_POST['phone'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // hash password

// Insert into DB
$sql = "INSERT INTO users (email, first_name, last_name, job_title, company, phone, password)
        VALUES ('$email', '$first_name', '$last_name', '$job_title', '$company', '$phone', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Record added successfully!";
    // redirect if you want
    // header("Location: 3rdpage.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
