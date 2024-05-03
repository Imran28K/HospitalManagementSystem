<?php require("innerNavbar.php");

// Start the session to retrieve the username
session_start();

// Retrieve the username from the session
$username = $_SESSION['username'];



?>

<style>
	.box {
		background-color: #25383C;
		display: flex;
		justify-content: center;
		align-items: center;
		height: 70vh;
		max-width: 500px;
		margin: 0 auto;
		position: relative;
		border: 6px solid #777777;
		border-radius: 5px;
	}
	.button-container {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    width: 70%;
    height: 70%;
  }

  .button-group {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 50%;
  }

  .top {
    margin-bottom: 10px;
  }

  .bottom {
    margin-top: 10px;
  }

  .button {
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #FFFFFF;
    width: calc(50% - 10px);
    height: 100%;
    margin: 5px;
    border: 6px solid #777777;
    border-radius: 5px;
    transition: background-color 0.3s ease;
  }

  .button:hover {
    background-color: #EEEEEE;
  }

  .button img {
    max-width: 100%;
    max-height: 80%;
    object-fit: contain;
  }
  .button:hover:after {
    content: attr(data-name);
    position: absolute;
    top: 100%;
    left: 50%;
    transform: translateX(-50%);
    background-color: #000000;
    color: #FFFFFF;
    padding: 5px;
    border-radius: 5px;
    font-size: 20px;
    white-space: nowrap;
  }
</style>

<div class="container bgColor">
	<main role="main" class="pb-3">
		<h2 style="text-align: center;">Welcome <?php echo $username;  ?> (Receptionist)</h2>
		<div class="box">
			<div class="button-container">
				<div class="button-group top">
					<a href="managePatient.php" class="button" data-name="Manage Patient">
						<img src="images/managePatientLogo.png" alt="Logo 1">
					</a>
					<a href="manageAppointments.php" class="button" data-name="Manage Appointments">
						<img src="images/appointmentLogo.png" alt="Logo 2">
					</a>
				</div>
				<div class="button-group bottom">
					<a href="manageAssignedDoctors.php" class="button" data-name="Assign Doctors">
						<img src="images/assigndoctor.png" alt="Logo 3">
					</a>
					<a href="createPatient.php" class="button" data-name="Add New Patient">
						<img src="images/addPatient.png" alt="Logo 3">
					</a>
					
				</div>
			</div>
		</div>

	</main>
</div>