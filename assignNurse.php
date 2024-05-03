<?php require("innerNavbar.php");

$db = new SQLite3("C:\\xampp\\htdocs\\hospital_project\\hospital_database.db");

$results = $db->query('SELECT staff_id, fname, lname FROM Staff_details');

$results1 = $db->query('SELECT patient_id, fname, lname FROM Patient_details');




// Check if the form has been submitted

if (isset($_POST['submit'])) {
    // Get the form data
    $patient_id = $_POST['patient_id'];
    $staff_id = $_POST['staff_id'];





    // Validate the form data
    $errors = array();
    if (empty($patient_id)) {
        $errors[] = "Patient is required";
    }
    if (empty($staff_id)) {
        $errors[] = "Doctor is required";
    }




    if (empty($errors)) {




        header("Location: assignDoctorSQL.php?patient_id=$patient_id&staff_id=$staff_id");
        exit;
    }
}


?>

<div class="container bgColor">
    <main role="main" class="pb-3">
        <style>
            .box {
                background-color: #25383C;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 80vh;
                max-width: 500px;
                margin: 0 auto;
                position: relative;
                border: 6px solid #777777;
                border-radius: 5px;
            }

            form {
                display: flex;
                flex-direction: column;
                align-items: center;

                padding: 20px;
                color: white;
                font-weight: bold;
                font-size: 20px;
                width: 100%;
                margin-top: 20px;
            }

            form::before {
                position: absolute;
                top: 5px;
                left: 50%;
                transform: translateX(-50%);
                background-color: #25383C;
                padding: 0 10px;
                color: white;
                font-weight: bold;
                font-size: 18px;
            }

            form label {
                display: inline-block;
                margin-bottom: 5px;
            }

            form input[type="text"],
            form input[type="password"] {
                border: 1px solid #ccc;
                padding: 5px;
                margin-bottom: 10px;
                width: 100%;
                max-width: 300px;
            }

            form input[type="submit"] {
                background-color: #4CAF50;
                color: white;
                border: none;
                padding: 10px 20px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin-bottom: 10px;
                cursor: pointer;
                border-radius: 5px;
            }

            form input[type="submit"]:hover {
                background-color: #3e8e41;
            }

            form .text-danger {
                color: red;
                font-size: 14px;
                margin-top: -10px;
                margin-bottom: 10px;
            }
        </style>
        <?php if (isset($_GET['deleted'])) : ?>
            <div class="alert alert-success col-15" role="alert" style="font-weight: bold;">
                The user has been deleted
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <h2 style="font-family: 'Trebuchet MS', sans-serif; text-align: center;"><strong>Assign Doctor</strong></h2>
        <div class="box">
            <form method="post">


                <div class="form-group col-md-14">
                    <label class="control-label labelFont" for="patient_id">Patient</label>
                    <select class="form-control" id="patient_id" name="patient_id">
                        <?php
                        $query = "SELECT patient_id, fname, lname FROM Patient_details";
                        $results = $db->query($query);
                        while ($row = $results->fetchArray()) {
                            $optionText = $row['patient_id'] . ' - ' . $row['fname'] . ' ' . $row['lname'];
                        ?>
                            <option value="<?php echo $row['patient_id']; ?>"><?php echo $optionText; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group col-md-14">
                    <label class="control-label labelFont" for="staff_id">Nurse</label>
                    <select class="form-control" id="staff_id" name="staff_id">
                        <?php
                        $query = "SELECT staff_id, fname, lname FROM Staff_details WHERE role='Nurse'";
                        $results1 = $db->query($query);
                        while ($row = $results1->fetchArray()) {
                            $optionText = $row['staff_id'] . ' - ' . $row['fname'] . ' ' . $row['lname'];
                        ?>
                            <option value="<?php echo $row['staff_id']; ?>"><?php echo $optionText; ?></option>
                        <?php } ?>
                    </select>
                </div>


                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary" value="Set">
                </div>
            </form>
        </div>


    </main>
</div>

<?php

// If there are errors, display them
if (!empty($errors)) {
    echo "<script>alert('Please fill in all information');</script>";
}

?>