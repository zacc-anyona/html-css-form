<?php
$servername = "localhost"; // Change this to your server's name
$username = "your_username"; // Change this to your MySQL username
$password = "your_password"; // Change this to your MySQL password
$dbname = "survey_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$location = $_POST['location'];
$income = $_POST['income'];
$recommend = $_POST['recommend'];
$car_habit = $_POST['habit'];
$bmw_ownership = $_POST['own'];
$bmw_model = $_POST['model'];
$bmw_modifications = implode(', ', $_POST['modifications']);
$bmw_colors = implode(', ', $_POST['colors']);
$comments = $_POST['talk'];

// Insert data into the table
$sql = "INSERT INTO survey_responses (name, email, gender, age, location, income, recommend, car_habit, bmw_ownership, bmw_model, bmw_modifications, bmw_colors, comments)
VALUES ('$name', '$email', '$gender', $age, '$location', $income, '$recommend', '$car_habit', '$bmw_ownership', '$bmw_model', '$bmw_modifications', '$bmw_colors', '$comments')";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully.";
} else {
    echo "Error inserting data: " . $conn->error;
}

$conn->close();
?>
