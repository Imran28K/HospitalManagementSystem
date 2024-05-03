<?php

require("../innerNavbar.php");

// Connect to the database
$db = new SQLite3('C:\\xampp\\htdocs\\hospital_project\\hospital_database.db');

// Select the customer record to be updated
$sql = "SELECT * FROM Staff_details WHERE staff_id = :staff_id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':staff_id', $_GET['staff_id'], SQLITE3_TEXT);
$result = $stmt->execute();

// Fetch the customer record as an array
while ($row = $result->fetchArray(SQLITE3_NUM)) {
    $arrayResult[] = $row;
}

if (isset($_POST['submit'])) {
    // Update the customer record with the new values
    $sql = "UPDATE Staff_details SET username = :username, fname = :fname, lname = :lname, datebirth = :datebirth, email =:email, role = :role, status = :status WHERE staff_id = :staff_id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':staff_id', $_POST['staff_id'], SQLITE3_TEXT);
    $stmt->bindParam(':username', $_POST['username'], SQLITE3_TEXT);
    $stmt->bindParam(':fname', $_POST['fname'], SQLITE3_TEXT);
    $stmt->bindParam(':lname', $_POST['lname'], SQLITE3_TEXT);
    $stmt->bindParam(':datebirth', $_POST['datebirth'], SQLITE3_TEXT);
    $stmt->bindParam(':email', $_POST['email'], SQLITE3_TEXT);
    $stmt->bindParam(':role', $_POST['role'], SQLITE3_TEXT);
    $stmt->bindParam(':status', $_POST['status'], SQLITE3_TEXT);


    $stmt->execute();

    header('Location: ../manageStaff.php?updated=1');
}

?>
<style>
    .box {
        background-color: #25383C;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 125vh;
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
        <h2 style="text-align: center;">Update Staff Info</h2>

        <div class="box">
            <form method="post">
                <div class="form-group col-md-14">
                    <label class="control-label labelFont" for="staff_id">ID</label>
                    <input class="form-control" type="text" name="staff_id" value="<?php echo $arrayResult[0][0]; ?>">


                    <div class="form-group col-md-14">
                        <label class="control-label labelFont" for="username">Username</label>
                        <input class="form-control" type="text" name="username" value="<?php echo $arrayResult[0][1]; ?>">


                        <div class="form-group col-md-14">
                            <label class="control-label labelFont" for="fname">First Name</label>
                            <input class="form-control" type="text" name="fname" value="<?php echo $arrayResult[0][2]; ?>">

                        <div class="form-group col-md-14">
                            <label class="control-label labelFont" for="lname">Last Name</label>
                            <input class="form-control" type="text" name="lname" value="<?php echo $arrayResult[0][3]; ?>">


                        <div class="form-group col-md-14">
                            <label class="control-label labelFont" for="datebirth">Date of birth</label>
                            <input class="form-control" type="text" name="datebirth" value="<?php echo $arrayResult[0][4]; ?>">


                        <div class="form-group col-md-14">
                            <label class="control-label labelFont" for="email">Email</label>
                            <input class="form-control" type="text" name="email" value="<?php echo $arrayResult[0][5]; ?>">

                        <div class="form-group col-md-14">
                            <label class="control-label labelFont" for="role">Role</label>
                            <select class="form-control" name="role">
                                <option value="Receptionist" <?php if ($arrayResult[0][7] == 'Receptionist') echo 'selected'; ?>>Receptionist</option>
                                <option value="Doctor" <?php if ($arrayResult[0][7] == 'Doctor') echo 'selected'; ?>>Doctor</option>
                                <option value="Nurse" <?php if ($arrayResult[0][7] == 'Nurse') echo 'selected'; ?>>Nurse</option>
                            </select>

                        <div class="form-group col-md-14">
                            <label class="control-label labelFont" for="status">Status</label>
                            <select class="form-control" name="status">
                                <option value="Active" <?php if ($arrayResult[0][8] == 'Active') echo 'selected'; ?>>Active</option>
                                <option value="Inactive" <?php if ($arrayResult[0][8] == 'Inative') echo 'selected'; ?>>Inactive</option>
                                <option value="Suspended" <?php if ($arrayResult[0][8] == 'Suspended') echo 'selected'; ?>>Suspended</option>
                            </select>


                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-primary" value="Update">
                        </div>
            </form>
        </div>




    </main>
</div>