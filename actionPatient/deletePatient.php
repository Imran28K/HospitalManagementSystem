<?php require("../innerNavbar.php");

if (isset($_POST['delete'])) {

    $db = new SQLite3('C:\\xampp\\htdocs\\hospital_project\\hospital_database.db');

    $stmt = "DELETE FROM Patient_details WHERE patient_id = :patient_id";
    $sql = $db->prepare($stmt);
    $sql->bindParam(':patient_id', $_POST['patient_id'], SQLITE3_TEXT);

    $sql->execute();
    header("Location:../managePatient.php?deleted=true");
}

$db = new SQLite3('C:\\xampp\\htdocs\\hospital_project\\hospital_database.db');
$sql = "SELECT patient_id, fname, lname, datebirth, symptoms FROM Patient_details WHERE patient_id=:patient_id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':patient_id', $_GET['patient_id'], SQLITE3_TEXT);
$result = $stmt->execute();

while ($row = $result->fetchArray(SQLITE3_NUM)) {
    $arrayResult[] = $row;
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
</style>
<div class="container bgColor">
    <main role="main" class="pb-3">
        <h2>Delete Patient?</h2><br>
        <h4 style="color: red;">Are you sure you want to delete this patient?</h4><br>

        <div class="row">
            <div class="col-md-2">
                <label style="font-size: 20px; color:blue; font-weight: bold;">ID</label>
            </div>
            <div class="col-md-6">
                <label style="font-size: 20px;"><?php echo $arrayResult[0][0] ?></label>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <label style="font-size: 20px; color:blue; font-weight: bold;">First Name</label>
            </div>
            <div class="col-md-6">
                <label style="font-size: 20px;"><?php echo $arrayResult[0][1] ?></label>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <label style="font-size: 20px; color:blue; font-weight: bold;">Last Name</label>
            </div>
            <div class="col-md-6">
                <label style="font-size: 20px;"><?php echo $arrayResult[0][2] ?></label>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <label style="font-size: 20px; color:blue; font-weight: bold;">Date of birth</label>
            </div>
            <div class="col-md-6">
                <label style="font-size: 20px;"><?php echo $arrayResult[0][3] ?></label>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <label style="font-size: 20px; color:blue; font-weight: bold;">Symptoms</label>
            </div>
            <div class="col-md-6">
                <label style="font-size: 20px;"><?php echo $arrayResult[0][4] ?></label>
            </div>
        </div>

        <div class="row">
            <div class="col-5">
                <form method="post">
                    <input type="hidden" name="patient_id" value="<?php echo $_GET['patient_id'] ?>"><br>
                    <input type="submit" value="Delete" class="btn btn-danger" name="delete"><a href="hospital_project/userInterface/managePatient.php" style="font-weight: bold; padding-left: 30px;">Back</a>
                </form>
            </div>
        </div>



    </main>
</div>