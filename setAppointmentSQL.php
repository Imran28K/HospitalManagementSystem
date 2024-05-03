<?php require("innerNavbar.php");

// Connect to the database
$dbname = "C:\\xampp\\htdocs\\hospital_project\\hospital_database.db";
// Create connection
$conn = new SQLite3($dbname);

// Get the form data from the query parameters
$date = $_GET['date'];
$time = $_GET['time'];
$patient_id = $_GET['patient_id'];

// Select the maximum appointment_id from the Appointment_details table
$max_query = "SELECT MAX(appointment_id) FROM Appointment_details";
$result = $conn->query($max_query);
$max_id = $result->fetchArray()[0];

// Calculate the new appointment_id
$appointment_id = $max_id + 1;

// Insert the new appointment record
$sql = "INSERT INTO Appointment_details (appointment_id, date, time, patient_id) VALUES ('$appointment_id', '$date', '$time', '$patient_id')";
$conn->exec($sql);

// Close the connection
$conn->close();



?>

<div class="container bgColor">
    <main role="main" class="pb-3">
        <h1>You have successfully set an appointment to patient ID <?php echo $patient_id ?></h1>
        <p>Your appointment ID is: <?php echo $appointment_id ?></p>

        <?php echo '<form action="receptionist.php" method="post">' ?> 
        <?php echo '<input type="submit" value="Back to home">' ?>
        <?php echo '</form>'?>

    </main>
</div>