<?php

function getPatientforDoc()
{
    $db = new SQLITE3("C:\\xampp\\htdocs\\hospital_project\\hospital_database.db");
    $sql = "SELECT * FROM Patient_details";
    $stmt = $db->prepare($sql);
    $result = $stmt->execute();

    while ($row = $result->fetchArray()) { // use fetchArray(SQLITE3_NUM) - another approach
        $arrayResult[] = $row; //adding a record until end of records
    }
    return $arrayResult;
}