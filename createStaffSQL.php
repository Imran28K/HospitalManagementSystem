<?php require("innerNavbar.php");

// Connect to the database
$dbname = "C:\\xampp\\htdocs\\hospital_project\\hospital_database.db";

// Create connection
$conn = new SQLite3($dbname);

// Get the form data from the query parameters
$fname = $_GET['fname'];
$lname = $_GET['lname'];
$datebirth = $_GET['datebirth'];
$email = $_GET['email'];
$pwd = $_GET['pwd'];
$role = $_GET['role'];
$status = $_GET['status'];

if ($role == "Receptionist"){
    $username = "Re" . substr($fname, 0, 2) . substr($lname, -2) . rand(10, 99);
}
else if ($role == "Doctor"){
    $username = "Dr" . substr($fname, 0, 2) . substr($lname, -2) . rand(10, 99);
}
else if ($role == "Nurse"){
    $username = "Nu" . substr($fname, 0, 2) . substr($lname, -2) . rand(10, 99);
}


  
// Select the maximum staff_id from the Staff_details table
$max_query = "SELECT MAX(staff_id) FROM Staff_details";
$result = $conn->query($max_query);
$max_id = $result->fetchArray()[0];

// Calculate the new patient ID
$staff_id = $max_id + 1;


// Insert the new patient record
$sql = "INSERT INTO Staff_details (staff_id, username, fname, lname, datebirth, email, pwd, role, status) VALUES ('$staff_id', '$username', '$fname', '$lname', '$datebirth', '$email', '$pwd', '$role', '$status')";
$conn->exec($sql);

// Close the connection
$conn->close();

?>

<div class="container bgColor">
    <main role="main" class="pb-3">
        <h1>You have successfully added a staff member</h1>
        <h2>Username: <?php echo $username; ?> </h2>
        <h2>Password: <?php echo $pwd; ?> </h2>
        

        <?php echo '<form action="loginpage.php" method="post">' ?> 
        <?php echo '<input type="submit" value="Login Page">' ?>
        <?php echo '</form>'?>

    </main>
</div>