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

$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "No record found.";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2 class="mt-5">View Record</h2>
    <p><strong>Name:</strong> <?php echo $row['name']; ?></p>
    <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
    <p><strong>Gender:</strong> <?php echo $row['gender']; ?></p>
    <p><?php echo $row['mail_status'] == 'yes' ? 'You will receive e-mails from us.' : 'You will not receive e-mails from us.'; ?></p>
    <a href="index.php" class="btn btn-primary">Back</a>
</div>
</body>
</html>
