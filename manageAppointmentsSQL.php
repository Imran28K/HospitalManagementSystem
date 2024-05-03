<?php
function getAppointment()
{
    $db = new SQLITE3("C:\\xampp\\htdocs\\hospital_project\\hospital_database.db");
    $sql = "SELECT * FROM Appointment_details JOIN Patient_details ON Appointment_details.patient_id = Patient_details.patient_id";
    $stmt = $db->prepare($sql);
    $result = $stmt->execute();

    while ($row = $result->fetchArray()) {
        $arrayResult[] = $row;
    }
    return $arrayResult;
} 