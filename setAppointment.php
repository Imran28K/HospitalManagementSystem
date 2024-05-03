<?php require("innerNavbar.php");

$db = new SQLite3("C:\\xampp\\htdocs\\hospital_project\\hospital_database.db");

$results = $db->query('SELECT patient_id, fname, lname FROM Patient_details');




// Check if the form has been submitted

if (isset($_POST['submit'])) {
    // Get the form data
    $appointment_id = $_POST['appointment_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $patient_id = $_POST['patient_id'];




    // Validate the form data
    $errors = array();
    if (empty($date)) {
        $errors[] = "Date is required";
    }
    if (empty($time)) {
        $errors[] = "Time is required";
    }
    if (empty($patient_id)) {
        $errors[] = "Patient_id is required";
    }



    if (empty($errors)) {

        $appointment_id = " ";






        header("Location: setAppointmentSQL.php?appointment_id=$appointment_id&date=$date&time=$time&patient_id=$patient_id");
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
        <h2 style="font-family: 'Trebuchet MS', sans-serif; text-align: center;"><strong>Set appointment</strong></h2>
        <div class="box">
            <form method="post">
                <div class="form-group col-md-14">
                    <label class="control-label labelFont" for="date">Date</label>
                    <input class="form-control" type="date" id="date" name="date">

                </div>

                <div class="form-group col-md-14">
                    <label class="control-label labelFont" for="time">Time</label>
                    <input class="form-control" type="time" id="time" name="time">

                </div>

                <div class="form-group col-md-14">
                    <label class="control-label labelFont" for="patient_id">Patient.ID</label>
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