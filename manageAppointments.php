<?php require("innerNavbar.php");
include_once("manageAppointmentsSQL.php");
$user = getAppointment();



?>
<style>
    form {
        display: inline-block;
    }

    td {
        border: 1px solid black;
        text-align: center;

    }

    .tableFrame {
        border: 6px solid #777777;

    }


    .updatebuttonfortable {
        background-color: transparent;
        color: darkslategrey;
        padding: 6px;
        border: 2px solid darkslategray;
        display: inline-block;
        width: 100px;
        height: 40px;
    }

    .deletebuttonfortable {
        background-color: transparent;
        color: darkslategrey;
        padding: 6px;
        border: 2px solid darkslategray;
        display: inline-block;
        width: 100px;
        height: 40px;
    }

    .updatebuttonfortable:hover {
        background-color: lightgreen;
        color: black;
    }

    .deletebuttonfortable:hover {
        background-color: red;
        color: black;
    }
</style>




<div class="container pb-5">
    <main role="main" class="pb-3">
        <h2 style="font-family: 'Trebuchet MS', sans-serif; text-align: center;"> <strong>Appointment details</strong> </h2>
        <br>

        <div style="display: flex; justify-content: center;">
            <a href="setAppointment.php"><button style="background-color: green; color: white; margin-left: -385px;">Set new appointment</button></a>
            
        </div>
        <br> 

        <?php if (isset($_GET['deleted'])) : ?>
            <div class="alert alert-success col-15" role="alert" style="font-weight: bold;">
                The user has been deleted
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>




        <div class="row">
            <div class="col-14" style="margin: 0 auto;">
                <table class="table table-striped tableFrame">
                    <thead class="table-dark">
                        <td>Appoint.ID</td>
                        <td>Date</td>
                        <td>Time</td>
                        <td>Patient.ID</td>
                        <td>Name</td>
                        <td>Actions</td>

                    </thead>


                    <?php
                    for ($i = 0; $i < count($user); $i++) :

                    ?>
                        <tr>
                            <td><?php echo $user[$i]['appointment_id']; ?></td>
                            <td><?php echo $user[$i]['date'] ?></td>
                            <td><?php echo $user[$i]['time'] ?></td>
                            <td><?php echo $user[$i]['patient_id'] ?></td>
                            <td><?php echo $user[$i]['fname'] . ' ' . $user[$i]['lname']; ?></td>



                            <td>
                                <form action="actionAppointment/updateAppointment.php" method="get">
                                    <input type="hidden" name="appointment_id" value="<?php echo $user[$i]['appointment_id']; ?>">
                                    <button type="submit" class="updatebuttonfortable">Update</button>
                                </form>

                                <form action="actionAppointment/deleteAppointment.php" method="get">
                                    <input type="hidden" name="appointment_id" value="<?php echo $user[$i]['appointment_id']; ?>">
                                    <button type="submit" class="deletebuttonfortable">Delete</button>
                                </form>
                            </td>


                        </tr>
                    <?php endfor; ?>
                </table>

            </div>
        </div>


    </main>
</div>