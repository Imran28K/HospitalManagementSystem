<?php

require("../innerNavbar.php");

// Start the session to retrieve the username
session_start();

// Retrieve the username from the session
$username = $_SESSION['username'];

// Connect to the database
$db = new SQLite3('C:\\xampp\\htdocs\\hospital_project\\hospital_database.db');

// Select the customer record to be updated
$sql = "SELECT * FROM Patient_details WHERE patient_id = :patient_id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':patient_id', $_GET['patient_id'], SQLITE3_TEXT);
$result = $stmt->execute();

// Fetch the customer record as an array
while ($row = $result->fetchArray(SQLITE3_NUM)) {
    $arrayResult[] = $row;
}

if (isset($_POST['submit'])) {
    // Update the customer record with the new values
    $sql = "UPDATE Patient_details SET lab_test_result =:lab_test_result WHERE patient_id = :patient_id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':patient_id', $_POST['patient_id'], SQLITE3_TEXT);
    $stmt->bindParam(':lab_test_result', $_POST['lab_test_result'], SQLITE3_TEXT);
    


    $stmt->execute();

    header('Location: ../manageLabtest.php?updated=1');
}

?>
<style>
    .box {
        background-color: #25383C;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 50vh;
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

    .no-permission {
        background-color: #f8d7da;
        color: #721c24;
    }

    .no-permission:hover {
        cursor: not-allowed;
        background-color: #f8d7da !important;
        color: #721c24 !important;
    }
</style>


<div class="container bgColor">
    <main role="main" class="pb-5">
        <h2 style="text-align: center;">Update Lab test Info</h2>

        <div class="box">
            <form method="post">
                <div class="form-group col-md-14">
                    <label class="control-label labelFont" for="patient_id">ID</label>
                    <input class="form-control" type="text" name="patient_id" value="<?php echo $arrayResult[0][0]; ?>">


                    <div class="form-group col-md-14">
                    <label class="control-label labelFont" for="lab_test_result">Lab test result</label>
                    <input class="form-control" type="text" name="lab_test_result" value="<?php echo $arrayResult[0][6]; ?>">

                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary" value="Update">
                    </div>
            </form>
        </div>




    </main>
</div>