<?php require("Navbar.php");
include_once("loginpagesql.php");
$errorUsername = $errorPassword = "";
$allFields = "yes";

if (isset($_POST['submit'])) {
	if (!isset($_POST['username'])) {
		$errorUsername = "Username is mandatory";
		$allFields = "no";
	}
	if (!isset($_POST['password'])) {
		$errorPassword = "Password is mandatory";
		$allFields = "no";
	}
	if ($allFields == "yes") {
		$loginResult = login($_POST['username'], $_POST['password']);
		if ($loginResult) {

			session_start();
			$_SESSION['username'] = $_POST['username'];

			header('Location: staff.php');  //needs to be change
		} else {
			$errorUsername = "Invalid username or password";
			$errorPassword = "Invalid username or password";
		}
	}
}
if (isset($_GET['resetPassword.php'])) {
	session_destroy();
}
?>
<style>
	.box {
		background-color: #25383C;
		display: flex;
		justify-content: center;
		align-items: center;
		height: 70vh;
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
		border: 1px solid black;
		padding: 20px;
		color: white;
		font-weight: bold;
		font-size: 20px;
		width: 100%;
		margin-top: 20px;
	}

	form::before {
		content: "Staff Login";
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
	<main role="main" class="pb-3">
		<div class="box">
			<form method="post">
				<div class="form-group col-md-14">
					<label class="control-label labelFont" for="username">Username</label>
					<input class="form-control" type="text" id="username" name="username">
					<span class="text-danger"><?php echo $errorUsername; ?></span>
				</div>

				<div class="form-group col-md-14">
					<label class="control-label labelFont" for="password">Password</label>
					<input class="form-control" type="password" id="password" name="password">
					<span class="text-danger"><?php echo $errorPassword; ?></span>
				</div>

				<div class="form-group">
					<input type="submit" name="submit" class="btn btn-primary" value="Login">
				</div>
			</form>
		</div>
	</main>
</div>

