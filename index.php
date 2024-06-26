<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2 class="mt-5">Users Details</h2>
    <a href="add_user.php" class="btn btn-success mb-3">Add New User</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Mail Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td>".$row['email']."</td>";
                    echo "<td>".$row['gender']."</td>";
                    echo "<td>".$row['mail_status']."</td>";
                    echo "<td>
                        <a href='view.php?id=".$row['id']."' class='btn btn-info btn-sm'><i class='fa fa-eye'></i></a>
                        <a href='edit.php?id=".$row['id']."' class='btn btn-primary btn-sm'><i class='fa fa-edit'></i></a>
                        <a href='delete.php?id=".$row['id']."' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure?\")'><i class='fa fa-trash'></i></a>
                    </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6' class='text-center'>No users found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>

<?php
$conn->close();
?>
