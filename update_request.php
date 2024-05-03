<?php

$db = new SQLite3('C:\\xampp\\htdocs\\hospital_project\\hospital_database.db');
// assuming you have already connected to your database using $db variable
if (isset($_POST['request'])) {
    $stock_id = $_POST['stock_id'];
    $update_query = "UPDATE Medicine_equipment SET request = 'Need Restocking' WHERE stock_id = '$stock_id'";
    $result = $db->exec($update_query);

    if ($result) {
        // Redirect back to the medicineEquipment.php page with a success message
        header('Location: manageMedicine.php?request=success');
        exit;
    }
    
}
?>