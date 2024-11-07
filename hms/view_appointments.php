<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'hospital_db');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve appointments with doctor and patient information
$sql = "SELECT appointments.id, appointments.appointment_date, appointments.status,
               doctors.name AS doctor_name, doctors.specialty,
               patients.name AS patient_name
        FROM appointments
        JOIN doctors ON appointments.doctor_id = doctors.id
        JOIN patients ON appointments.patient_id = patients.id";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Appointments</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Scheduled Appointments</h2>

    <?php if ($result->num_rows > 0): ?>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Doctor</th>
                <th>Specialty</th>
                <th>Patient</th>
                <th>Appointment Date</th>
                <th>Status</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['doctor_name'] ?></td>
                    <td><?= $row['specialty'] ?></td>
                    <td><?= $row['patient_name'] ?></td>
                    <td><?= $row['appointment_date'] ?></td>
                    <td><?= $row['status'] ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No appointments found.</p>
    <?php endif; ?>

</body>
</html>

<?php
$conn->close();
?>
