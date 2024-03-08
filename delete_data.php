<?php
// Check if the ID parameter is set
if(isset($_GET['id'])) {
    include 'db.php';

    // Get the ID parameter
    $id = $_GET['id'];

    // Prepare and execute SQL query to delete data from the database
    $sql = "DELETE FROM students WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Data deleted successfully";
    } else {
        echo "Error deleting data: " . $conn->error;
    }

    // Close connection
    $conn->close();
} else {
    echo "ID parameter is not set";
}
?>
