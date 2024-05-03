<?php require("innerNavbar.php");
include_once("manageStaffSQL.php");
$user = getStaff();



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
        <h2 style="font-family: 'Trebuchet MS', sans-serif; text-align: center;"> <strong>Staff Details</strong> </h2>
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
                        <td>Username</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>DOB</td>
                        <td>Email</td>
                        <td>Role</td>
                        <td>Status</td>
                        <td>Actions</td>
                    </thead>


                    <?php
                    for ($i = 0; $i < count($user); $i++) :

                    ?>
                        <tr>
                            <td><?php echo $user[$i]['staff_id']; ?></td>
                            <td><?php echo $user[$i]['username']; ?></td>
                            <td><?php echo $user[$i]['fname'] ?></td>
                            <td><?php echo $user[$i]['lname'] ?></td>
                            <td><?php echo $user[$i]['datebirth'] ?></td>
                            <td><?php echo $user[$i]['email']; ?></td>
                            <td><?php echo $user[$i]['role'] ?></td>
                            <td><?php echo $user[$i]['status'] ?></td>

                            <td>
                                <form action="actionStaff/updateStaff.php" method="get">
                                    <input type="hidden" name="staff_id" value="<?php echo $user[$i]['staff_id']; ?>">
                                    <button type="submit" class="updatebuttonfortable">Update</button>
                                </form>

                                <form action="actionStaff/deleteStaff.php" method="get">
                                    <input type="hidden" name="staff_id" value="<?php echo $user[$i]['staff_id']; ?>">
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