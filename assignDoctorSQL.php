<?php require("innerNavbar.php");

// Connect to the database
$dbname = "C:\\xampp\\htdocs\\hospital_project\\hospital_database.db";

// Create connection
$conn = new SQLite3($dbname);

// Get the form data from the query parameters
$patient_id = $_GET['patient_id'];
$staff_id = $_GET['staff_id'];


$sql = "INSERT INTO Assigned_patient (patient_id, staff_id) VALUES ('$patient_id', '$staff_id')";
$conn->exec($sql);

// Close the connection
$conn->close();

?>

<div class="container bgColor">
    <main role="main" class="pb-3">
        <h1>You have successfully assigned  <?php echo $patient_id ?> to <?php echo $staff_id ?> </h1>
        

    </main>
</div>