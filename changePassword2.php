<?php require("Navbar.php");


// Connect to the database
$db = new SQLite3('C:\\xampp\\htdocs\\hospital_project\\hospital_database.db');

session_start();
$username = $_SESSION['username'];


// Select the customer record to be updated
$sql = "SELECT * FROM Staff_details WHERE username = :username";
$stmt = $db->prepare($sql);
$stmt->bindParam(':username', $username, SQLITE3_TEXT);
$result = $stmt->execute();

// Fetch the customer record as an array
while ($row = $result->fetchArray(SQLITE3_NUM)) {
    $arrayResult[] = $row;
}

if (isset($_POST['submit'])) {
    // Update the customer record with the new values
    $sql = "UPDATE Staff_details SET pwd = :pwd WHERE username = :username";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':username', $username, SQLITE3_TEXT);
    $stmt->bindParam(':pwd', $_POST['pwd'], SQLITE3_TEXT);

    $stmt->execute();

    header('Location: changePasswordResult.php');
}

?>

<div class="container bgColor">
    <main role="main" class="pb-3">
        <h2>Update Password</h2>
        <div class="row">
            <div class="col-11">
                <form method="post">
                    <div class="form-group col-md-3">
                        <label class="control-label labelFont">New Password</label>
                        <input class="form-control" type="pwd" name="pwd" value="<?php echo $arrayResult[0][6]; ?>">
                    </div>

                    <div class="form-group col-md-3">
                        <form action="successpwdChange.php">
                            <input type="submit" name="submit" value="Update" class="btn btn-primary">
                        </form>
                    </div>

                </form>


    </main>
</div>

