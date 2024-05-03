<?php require("innerNavbar.php");
include_once("orderMedicineSQL.php");
$user = orderMedicine();

// Start the session to retrieve the username
session_start();

// Retrieve the username from the session
$username = $_SESSION['username'];

$db = new SQLite3('C:\\xampp\\htdocs\\hospital_project\\hospital_database.db');



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
        <?php if (isset($_GET['request'])) : ?>
            <div class="alert alert-success col-15" role="alert" style="font-weight: bold;">
                Request sent
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <h2 style="font-family: 'Trebuchet MS', sans-serif; text-align: center;"> <strong>Medicine & Equipment</strong> </h2>
        <br>






        <div class="row">
            <div class="col-14" style="margin: 0 auto;">
                <table class="table table-striped tableFrame">
                    <thead class="table-dark">
                        <td>Stock.ID</td>
                        <td>Name</td>
                        <td>Purpose</td>
                        <td>No. Of Stock</td>
                        <td>Request</td>
                        <td>Actions</td>

                    </thead>


                    <?php
                    for ($i = 0; $i < count($user); $i++) :

                    ?>
                        <tr>
                            <td><?php echo $user[$i]['stock_id']; ?></td>
                            <td><?php echo $user[$i]['name'] ?></td>
                            <td><?php echo $user[$i]['purpose'] ?></td>
                            <td><?php echo $user[$i]['stocknumber'] ?></td>
                            <td><?php echo $user[$i]['request'] ?></td>
                            <td>
                                <form action="orderMedicine/orderMedicine.php" method="get">
                                    <input type="hidden" name="stock_id" value="<?php echo $user[$i]['stock_id']; ?>">
                                    <button type="submit" class="updatebuttonfortable">Order</button>
                                </form>

                                <form action="orderMedicine/deleteMedicine.php" method="get">
                                    <input type="hidden" name="stock_id" value="<?php echo $user[$i]['stock_id']; ?>">
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