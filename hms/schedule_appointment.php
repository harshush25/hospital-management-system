<?php
$conn = new mysqli('localhost', 'root', '', 'hospital_db');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $doctor_id = $_POST['doctor_id'];
    $patient_id = $_POST['patient_id'];
    $appointment_date = $_POST['appointment_date'];
    $status = 'Scheduled';

    $sql = "INSERT INTO appointments (doctor_id, patient_id, appointment_date, status) 
            VALUES ('$doctor_id', '$patient_id', '$appointment_date', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "Appointment scheduled successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Retrieve doctors and patients for dropdown lists
$doctors = $conn->query("SELECT * FROM doctors");
$patients = $conn->query("SELECT * FROM patients");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Schedule Appointment</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Schedule an Appointment</h2>
    <form action="" method="post">
        <label for="doctor">Doctor:</label>
        <select name="doctor_id" required>
            <?php while ($doctor = $doctors->fetch_assoc()): ?>
                <option value="<?= $doctor['id'] ?>"><?= $doctor['name'] ?> - <?= $doctor['specialty'] ?></option>
            <?php endwhile; ?>
        </select>

        <label for="patient">Patient:</label>
        <select name="patient_id" required>
            <?php while ($patient = $patients->fetch_assoc()): ?>
                <option value="<?= $patient['id'] ?>"><?= $patient['name'] ?></option>
            <?php endwhile; ?>
        </select>

        <label for="appointment_date">Appointment Date:</label>
        <input type="date" name="appointment_date" required>

        <button type="submit">Schedule Appointment</button>
    </form>
</body>
</html>