<?php require("innerNavbar.php");

// Connect to the database
$dbname = "C:\\xampp\\htdocs\\hospital_project\\hospital_database.db";

// Create connection
$conn = new SQLite3($dbname);

// Get the form data from the query parameters
$fname = $_GET['fname'];
$lname = $_GET['lname'];
$datebirth = $_GET['datebirth'];
$symptoms = $_GET['symptoms'];
$diagnosis = $_GET['diagnosis'];
  
// Select the maximum patient_id from the Patient_details table
$max_query = "SELECT MAX(patient_id) FROM Patient_details";
$result = $conn->query($max_query);
$max_id = $result->fetchArray()[0];

// Calculate the new patient ID
$patient_id = $max_id + 1;


// Insert the new patient record
$sql = "INSERT INTO Patient_details (patient_id, fname, lname, datebirth, symptoms, diagnosis) VALUES ('$patient_id', '$fname', '$lname', '$datebirth', '$symptoms', '$diagnosis')";
$conn->exec($sql);

// Close the connection
$conn->close();

?>

<div class="container bgColor">
    <main role="main" class="pb-3">
        <h1>You have successfully added a patient</h1>
        

        <?php echo '<form action="receptionist.php" method="post">' ?> 
        <?php echo '<input type="submit" value="Back to home">' ?>
        <?php echo '</form>'?>

    </main>
</div>