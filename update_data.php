<?php
// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are set
    if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['birthdate']) && isset($_POST['age']) && isset($_POST['12th_marks']) && isset($_POST['10th_marks']) && isset($_POST['adharcard'])) {

        include 'db.php';
        // Sanitize input data
        $id = $_POST['id'];
        $name = $_POST['name'];
        $birthdate = $_POST['birthdate'];
        $age = $_POST['age'];
        $th_marks_12 = $_POST['12th_marks'];
        $th_marks_10 = $_POST['10th_marks'];
        $adharcard = $_POST['adharcard'];

        // Prepare and execute SQL query to update data in the database
        $sql = "UPDATE students SET name='$name', birthdate='$birthdate', age='$age', `12th_marks`='$th_marks_12', `10th_marks`='$th_marks_10', adharcard='$adharcard' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            // Data updated successfully
            echo '<div class="alert alert-success" role="alert">Record Updated successfully</div>';
        } else {
            // Error updating record
            echo '<div class="alert alert-danger" role="alert">Error updating record: ' . $conn->error . '</div>';
        }

        // Close connection
        $conn->close();
    } else {
        echo '<div class="alert alert-danger" role="alert">All required fields are not set</div>';
    }
} else {
    echo '<div class="alert alert-danger" role="alert">Form data not submitted</div>';
}
?>
