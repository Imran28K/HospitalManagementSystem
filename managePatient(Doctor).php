<?php require("innerNavbar.php");
include_once("managePatient(Doctor)SQL.php");
$user = getPatientforDoc();



?>
<style>
    form {
        display: inline-block;
    }

    td{
        border: 1px solid black;
        text-align: center;
        
    }
    .tableFrame{
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
        <h2 style="font-family: 'Trebuchet MS', sans-serif; text-align: center;"> <strong>Patient Details</strong> </h2>
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
                        <td>ID</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>DOB</td>
                        <td>Symptoms</td>
                        <td>Diagnosis</td>
                        <td>Actions</td>
                    </thead>


                    <?php
                    for ($i = 0; $i < count($user); $i++) :

                    ?>
                        <tr>
                            <td><?php echo $user[$i]['patient_id']; ?></td>
                            <td><?php echo $user[$i]['fname'] ?></td>
                            <td><?php echo $user[$i]['lname'] ?></td>
                            <td><?php echo $user[$i]['datebirth'] ?></td>
                            <td><?php echo $user[$i]['symptoms'] ?></td>
                            <td><?php echo $user[$i]['diagnosis'] ?></td>

                            <td>
                                <form action="actionPatient/updatePatient.php" method="get">
                                    <input type="hidden" name="patient_id" value="<?php echo $user[$i]['patient_id']; ?>">
                                    <button type="submit" class="updatebuttonfortable">Update</button>
                                </form>

                                <form action="actionPatient/deletePatient.php" method="get">
                                    <input type="hidden" name="patient_id" value="<?php echo $user[$i]['patient_id']; ?>">
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