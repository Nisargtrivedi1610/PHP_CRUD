<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student Data</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Edit Student Data</h2>
    <?php
    // Check if the ID parameter is set
    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        include 'db.php';
        // Prepare SQL query to select student data by ID
        $sql = "SELECT * FROM students WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Fetch student data
            $row = $result->fetch_assoc();
            ?>
            <form action="update_data.php" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="birthdate" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" id="birthdate" name="birthdate" value="<?php echo $row['birthdate']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="age" class="form-label">Age</label>
                    <input type="number" class="form-control" id="age" name="age" value="<?php echo $row['age']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="12th_marks" class="form-label">12th Marks</label>
                    <input type="number" class="form-control" id="12th_marks" name="12th_marks" value="<?php echo $row['12th_marks']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="10th_marks" class="form-label">10th Marks</label>
                    <input type="number" class="form-control" id="10th_marks" name="10th_marks" value="<?php echo $row['10th_marks']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="adharcard" class="form-label">Aadhar Card</label>
                    <input type="text" class="form-control" id="adharcard" name="adharcard" value="<?php echo $row['adharcard']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
            <?php
        } else {
            echo "No student found with ID: $id";
        }

        // Close connection
        $conn->close();
    } else {
        echo "ID parameter is not set";
    }
    ?>
</div>

<!-- Bootstrap Bundle with Popper -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
