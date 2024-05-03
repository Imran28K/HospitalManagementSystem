<?php

require("../innerNavbar.php");

// Connect to the database
$db = new SQLite3('C:\\xampp\\htdocs\\hospital_project\\hospital_database.db');

// Select the customer record to be updated
$sql = "SELECT * FROM Medicine_equipment WHERE stock_id = :stock_id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':stock_id', $_GET['stock_id'], SQLITE3_TEXT);
$result = $stmt->execute();

// Fetch the customer record as an array
while ($row = $result->fetchArray(SQLITE3_NUM)) {
    $arrayResult[] = $row;
}

if (isset($_POST['submit'])) {
    // Update the customer record with the new values
    $sql = "UPDATE Medicine_equipment SET stocknumber = :stocknumber, request = 'Not required' WHERE stock_id = :stock_id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':stock_id', $_POST['stock_id'], SQLITE3_TEXT);
    $stmt->bindParam(':stocknumber', $_POST['stocknumber'], SQLITE3_TEXT);

    $stmt->execute();

    
    

    header('Location: ../orderMedicine.php?updated=1');
}

?>
<style>
    .box {
        background-color: #25383C;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 90vh;
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


<div class="container bgColor">
    <main role="main" class="pb-5">
        <h2 style="text-align: center;">Update Appointment Details</h2>

        <div class="box">
            <form method="post">
                <div class="form-group col-md-14">
                    <label class="control-label labelFont" for="stock_id">Stock.ID</label>
                    <input class="form-control" type="text" name="stock_id" value="<?php echo $arrayResult[0][0]; ?>">

                    <div class="form-group col-md-14">
                        <label class="control-label labelFont" for="stocknumber">Order Stock</label>
                        <select class="form-control" name="stocknumber">
                            <option value="10" <?php if ($arrayResult[0][3] == "10") echo 'selected'; ?>>10</option>
                            <option value="20" <?php if ($arrayResult[0][3] == "20") echo 'selected'; ?>>20</option>
                            <option value="30" <?php if ($arrayResult[0][3] == "30") echo 'selected'; ?>>30</option>
                        </select>

                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-primary" value="Make Order">
                        </div>
            </form>
        </div>
    </main>
</div>