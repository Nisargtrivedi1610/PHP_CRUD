<?php
include 'db.php';
// Get form data
$name = $_POST['name'];
$age = $_POST['age'];
$birthdate = $_POST['birthdate'];
$th_marks_12 = $_POST['12th_marks']; // Changed variable name
$th_marks_10 = $_POST['10th_marks']; // Changed variable name
$adharcard = $_POST['adharcard'];
// if (empty($name)) {
//     echo "Name is required";
//     // Handle validation error, e.g., display error message to the user
// } elseif (!is_numeric($age)) {
//     echo "Age must be a number";
//     // Handle validation error
// } elseif (empty($birthdate)) {
//     echo "Date of birth is required";
//     // Handle validation error
// } else {
// Prepare and execute SQL query to insert data into database
$sql = "INSERT INTO students (name, age, birthdate, `12th_marks`, `10th_marks`, adharcard) VALUES ('$name', '$age', '$birthdate', '$th_marks_12', '$th_marks_10', '$adharcard')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
// }
// Close connection
$conn->close();
?>
