<?php
require("innerNavbar.php");
include_once("patientAssignedSQL.php");
$user = getAssigned();

// Start the session to retrieve the username
session_start();

// Retrieve the username from the session
$username = $_SESSION['username'];
?>

<style>
    .card {
        border: 10px solid #ccc;
        border-radius: 4px;
        margin: 10px;
        padding: 10px;
        width: 400px;
        background-color: darkslategray;
        color: white;

    }

    .card h4 {
        margin-top: 0;
    }

    .card p {
        margin-bottom: 5px;
    }

    .card label {
        font-weight: bold;
    }
</style>

<div class="container pb-5">
    <main role="main" class="pb-3">
        <h2 style="font-family: 'Trebuchet MS', sans-serif; text-align: center;"> <strong>Patient</strong> </h2>
        <br>

        <br>

        <?php
        for ($i = 0; $i < count($user); $i++) :
            if ($user[$i]['username'] == $username) :
        ?>

                <div class="row">
                    <div class="col-14" style="margin: 0 auto;">
                        <div class="card">
                            <h4><strong>Assigned Patient</strong></h4>

                            <p><label>Patient Name:</label> <?php echo $user[$i]['fname'] . ' ' . $user[$i]['lname']; ?></p>
                            <p><label>Patient ID:</label> <?php echo $user[$i]['patient_id']; ?></p>
                            <p><label>Patient Symptoms:</label> <?php echo $user[$i]['symptoms']; ?></p>
                            <h4><strong>Scheduled to meet</strong></h4>
                            <p><label>Date:</label> <?php echo $user[$i]['date']; ?></p>
                            <p><label>Time:</label> <?php echo $user[$i]['time']; ?></p>
                            <h4><strong>Your username</strong></h4>
                            <p><label>Username:</label> <?php echo $user[$i]['username']; ?></p>
                        </div>
                    </div>
                </div>

        <?php
            endif;
        endfor; ?>

    </main>
</div>