<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>MyTxState Login</title>
<link rel="stylesheet" type="text/css" href="../../css/loginPage.css">
<link href="../../rsrcs/fontawesome-free-5.10.2-web/css/all.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=PT+Sans|Rubik|Noto+Serif|Source+Sans+Pro|Lato|Roboto|Mukta" rel="stylesheet">
</head>
<body>
	<section id="navigation-section">
		<img id="txstate-bobcat" src="../../img/txstate-bobcat.png" alt="txstate-bobcat.png" height="150px" width="150px">
		<nav id="navigation-wrapper">
			<a href="#">Login</a>
			<a href="#">About us</a>
			<a href="#">Register</a>
			<a href="#">Contact</a>
		</nav>
	</section>
	<section id="login-section">
		<h1 id="login-title">Login</h1>
		<form id="username-password-input-form" method="POST">
			<div id="username-wrapper">
				<i id="username-icon" class="fas fa-user"></i>
				<input id="username-input-text"type="text" name="username" maxlength="30" />
			</div>
			<div id="password-wrapper">
				<i id="password-icon" class="fas fa-lock"></i>
				<input id="password-input-text" type="password" name="password" maxlength="30" />
			</div>
			<div id="get-started-wrapper">
				<input id="get-started" type="submit" name="get-started-button" value="Get Started"/>
			</div>
		</form>
		<h1>WRONG PASSWORD!</h1>
		<?php 
		$serverName = "localhost";
		$userName = "admin";
		$password = "admin4321";
		$database = "my_txstate";

		$conn = new mysqli($serverName, $userName, $password, $database);

		if ($conn->connect_error){
		    die("Connection failed: " . $conn->connect_error);
		} 
		else {
			if (isset($_POST['get-started-button'])) {
				$query = "SELECT username, password FROM users_login_info";
				$result = $conn->query($query);
				if (!$result) die ("Database access failed: " . $conn->error);

				$rows = $result->num_rows;
            	for ($j = 0 ; $j < $rows ; ++$j) {
            		$result->data_seek($j);
					$row = $result->fetch_array(MYSQLI_NUM);

					if ($_POST['username'] == $row[0] AND $_POST['password'] == $row[1]) {
						header('Location: ../../myProfile.php');
					} else {
						if ($_POST['username'] != $row[0]) {
							header('Location: wrongUsername.php');
						}
						else {
							header('Location: wrongPassword.php');
						}
					}
            	}
            }
		}
		?>
		<p id="keep-logged-in-option">Keep logged in</p>
		<a id="forgot-password" href="#">Forgot Password</a>
		<div id="create-account-need-help-wrapper">
			<a id="create-account" href="#">CREATE ACCOUNT</a>
			<a id="need-help" href="#">Need Help?</a>
		</div>
	</section>
	<footer>
		<ul id="footer-list-wrapper">
			<li><a id="about-us-footer" href="#">About us</a></li>
			<li><a id="privacy-policy" href="#">Privacy Policy</a></li>
			<li><a id="terms-of-use" href="#">Terms of Use</a></li>
			<p id="copyright">&copy; MyTxState All Rights Reserved</p>
		</ul>
	</footer>
</body>
</html>