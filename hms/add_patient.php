<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $conn = new mysqli('localhost', 'root', '', 'hospital_db');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO patients (name, age, address, phone, email) VALUES ('$name', '$age', '$address', '$phone', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Patient added successfully!";
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
    <title>Add Patient</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Add New Patient</h2>
    <form action="" method="post">
        <input type="text" name="name" placeholder="Patient's Name" required>
        <input type="number" name="age" placeholder="Age" required>
        <input type="text" name="address" placeholder="Address" required>
        <input type="text" name="phone" placeholder="Phone Number" required>
        <input type="email" name="email" placeholder="Email" required>
        <button type="submit">Add Patient</button>
    </form>
</body>
</html>