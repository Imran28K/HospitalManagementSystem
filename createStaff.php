<?php require("innerNavbar.php");
// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Get the form data
    $staff_id = $_POST['staff_id'];
    $username = $_POST['username'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $datebirth = $_POST['datebirth'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $role = $_POST['role'];
    $status = $_POST['status'];




    // Validate the form data
    $errors = array();
    if (empty($fname)) {
        $errors[] = "First name is required";
    }
    if (empty($lname)) {
        $errors[] = "Last name is required";
    }
    if (empty($datebirth)) {
        $errors[] = "Date of birth is required";
    }
    if (empty($email)) {
        $errors[] = "Email is required";
    }
    if (empty($role)) {
        $errors[] = "Role is required";
    }
    if (empty($status)) {
        $errors[] = "Status is required";
    }


    // If there are no errors, redirect to the database insertion file, passing the form data as query parameters
    if (empty($errors)) {
        // Generate a username using the first 3 letters of the first name, the last 2 letters of the last name, and 2 random digits
        $patient_id = " ";

        $pwd = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 7);






        header("Location: createStaffSQL.php?staff_id=$staff_id&fname=$fname&lname=$lname&datebirth=$datebirth&email=$email&pwd=$pwd&role=$role&status=$status");
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
                height: 110vh;
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
        <h2 style="font-family: 'Trebuchet MS', sans-serif; text-align: center;"><strong>Create Account</strong></h2>
        <div class="box">
            <form method="post">
                <div class="form-group col-md-14">
                    <label class="control-label labelFont" for="fname">First Name</label>
                    <input class="form-control" type="text" id="fname" name="fname">

                </div>

                <div class="form-group col-md-14">
                    <label class="control-label labelFont" for="lname">Last Name</label>
                    <input class="form-control" type="text" id="lname" name="lname">

                </div>

                <div class="form-group col-md-14">
                    <label class="control-label labelFont" for="datebirth">Date of Birth</label>
                    <input class="form-control" type="date" id="datebirth" name="datebirth">

                </div>

                <div class="form-group col-md-14">
                    <label class="control-label labelFont" for="email">Email</label>
                    <input class="form-control" type="text" id="email" name="email">

                </div>

                <div class="form-group col-md-14">
                    <label class="control-label labelFont" for="role">Role</label>
                    <select class="form-control" id="role" name="role">
                        <option value="Receptionist">Receptionist</option>
                        <option value="Doctor">Doctor</option>
                        <option value="Nurse">Nurse</option>
                    </select>

                </div>

                <div class="form-group col-md-14">
                    <label class="control-label labelFont" for="status">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                        <option value="Suspended">Suspended</option>
                    </select>

                </div>



                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary" value="Create">
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