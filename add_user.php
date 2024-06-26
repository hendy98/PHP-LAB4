<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_management";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $mail_status = isset($_POST['mail_status']) ? 'yes' : 'no';

    $sql = "INSERT INTO users (name, email, gender, mail_status) VALUES ('$name', '$email', '$gender', '$mail_status')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2 class="mt-5">User Registration Form</h2>
    <form action="add_user.php" method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label>Gender</label><br>
            <input type="radio" id="female" name="gender" value="F" required>
            <label for="female">Female</label><br>
            <input type="radio" id="male" name="gender" value="M">
            <label for="male">Male</label>
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="mail_status" name="mail_status">
            <label class="form-check-label" for="mail_status">Receive E-Mails from us.</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>
