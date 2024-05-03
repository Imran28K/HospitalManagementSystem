<?php
function getAssigned()
{
    $db = new SQLITE3("C:\\xampp\\htdocs\\hospital_project\\hospital_database.db");
    $sql = "SELECT * FROM Assigned_patient JOIN Staff_details ON Assigned_Patient.staff_id = Staff_details.staff_id JOIN Appointment_details ON Assigned_Patient.patient_id = Appointment_details.patient_id JOIN Patient_details ON Assigned_Patient.patient_id = Patient_details.patient_id" ;


    $stmt = $db->prepare($sql);
    $result = $stmt->execute();

    while ($row = $result->fetchArray()) {
        $arrayResult[] = $row;
    }
    return $arrayResult;
} 