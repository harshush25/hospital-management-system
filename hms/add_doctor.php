<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $specialty = $_POST['specialty'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'hospital_db');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO doctors (name, specialty, phone, email) VALUES ('$name', '$specialty', '$phone', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Doctor added successfully!";
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
    <title>Add Doctor</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Add New Doctor</h2>
    <form action="" method="post">
        <input type="text" name="name" placeholder="Doctor's Name" required>
        <input type="text" name="specialty" placeholder="Specialty" required>
        <input type="text" name="phone" placeholder="Phone Number" required>
        <input type="email" name="email" placeholder="Email" required>
        <button type="submit">Add Doctor</button>
    </form>
</body>
</html>