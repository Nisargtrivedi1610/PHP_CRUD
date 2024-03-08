<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Data</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Student Data</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Date of Birth</th>
                <th>Age</th>
                <th>12th Marks</th>
                <th>10th Marks</th>
                <th>Aadhar Card</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
include 'db.php';

// Select data from database
$sql = "SELECT id, name, birthdate, age, `12th_marks`, `10th_marks`, adharcard FROM students"; // Include id column in the query
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["id"]."</td>"; // Display id column
        echo "<td>".$row["name"]."</td>";
        echo "<td>".$row["birthdate"]."</td>";
        echo "<td>".$row["age"]."</td>";
        echo "<td>".$row["12th_marks"]."</td>";
        echo "<td>".$row["10th_marks"]."</td>";
        echo "<td>".$row["adharcard"]."</td>";
        echo "<td>";
        echo "<button class='btn btn-danger' onclick='deleteData(".$row["id"].")'>Delete</button>";
        echo "<button class='btn btn-primary ms-2' onclick='editData(".$row["id"].")'>Edit</button>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='8'>No data found</td></tr>"; // Adjust colspan to account for the id column
}
$conn->close();
?>

        </tbody>
    </table>
</div>

<!-- Bootstrap Bundle with Popper -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script>
    function deleteData(id) {
        if(confirm("Are you sure you want to delete this data?")) {
            // Perform AJAX request to delete data
            // You can use XMLHttpRequest or fetch API to send a request to delete_data.php with the ID to delete
            // Example using fetch API:
            fetch('delete_data.php?id=' + id, {
                method: 'DELETE'
            })
            .then(response => response.text())
            .then(data => {
                alert(data); // Display the response message
                location.reload(); // Reload the page to reflect changes
            })
            .catch(error => console.error('Error:', error));
        }
    }

    function editData(id) {
        // Redirect to edit_data.php with the ID to edit
        // Example:
        window.location.href = 'edit_data.php?id=' + id;
    }
</script>
</body>
</html>
