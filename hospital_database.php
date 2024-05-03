<?php require("NavBar.php");
$db = new SQLite3("C:\\xampp\\htdocs\\hospital_project\\hospital_database.db");

if ($db){

echo "Database is successfully connected";

}

else{

echo "Fail to connect the database";

}

?>

	<div class="container bgColor">
        	<main role="main" class="pb-3">
		<h2>DB connection</h2>
		</main>
	</div>

<?php require("Footer.php");?>