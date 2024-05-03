<?php

require("innerNavbar.php");

// Define the login() function
function login($username)
{
  $db = new sqlite3('C:\\xampp\\htdocs\\hospital_project\\hospital_database.db');
  $query = "SELECT * FROM Staff_details WHERE username = '$username'";
  $result = $db->query($query);


  while ($row = $result->fetchArray()) {
    // Print out the data for the specific row
    // Replace the table row element with a div element

	if (substr($username, 0, 2) == "Re"){
		header('Location: receptionist.php');
	}
  else if(substr($username, 0, 2) == "Dr" ){
    header('Location: doctor.php');

  }
  else if(substr($username, 0, 2) == "Nu"){
    header('Location: nurse.php');
  }
  }
  
  
}

// Start the session to retrieve the username
session_start();

// Retrieve the username from the session
$username = $_SESSION['username'];

?>
<div class="container bgColor">
  <main role="main" class="pb-3">

    <h2 style="font-family: 'Trebuchet MS', sans-serif;"><strong> Welcome <?php echo $username ?>!</strong> </h2>

    <div class="row">
      <div class="col-12">
        <!-- Replace the table element with a series of div elements -->
        <?php login($username); ?>
      </div>
    </div>
  </main>
</div>


<?php

// Close the session
session_write_close();



?>