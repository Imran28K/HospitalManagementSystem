<?php

function login($username, $password) {
    // Connect to the database
    $db = new sqlite3('C:\\xampp\\htdocs\\hospital_project\\hospital_database.db');

    
    $username = $db->escapeString($username);
    $password = $db->escapeString($password);


    $query = "SELECT * FROM Admin WHERE username='$username' AND pwd='$password'";

    

    // Execute the query and fetch the result
    $result = $db->query($query);

    // Check if the query returned a result
    if ($result->fetchArray()) {
        // If it did, it means the login credentials are valid
        return true;
        
    } else {
        // Otherwise, the login credentials are invalid
        return false;
    }

    


    

    
}

?>