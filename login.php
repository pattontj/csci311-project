<?php
session_start();
?>

<?php
	 require("header.php");
?>
	
	<div class="loginCreate">
		<div class="center">
			
		<img src="assets/Logo.png">

		<!-- Once user selects Login they will be redirected to their home page -->
		<form action="loginHandler.php" method="post">


		<?php
		if ($_SESSION["failedAttempt"] || $_SESSION["failedAttempt"] == true) {
			echo "<a>Login attempt failed</a> <br/> <br />";
			$_SESSION["failedAttempt"] = false;
		}
		?>
     

		<label for="userName">UserName:</label><br>
			<input type="text" id="userName" name="userName" placeholder="Karl_Wheezer" size="20" required><br><br>
			<label for="password">Password:</label><br>
			<input type="password" id="password" name="password" placeholder="Enter_Password" size="20" required><br><br>
		<input type="submit" value="Login">
		<input type="reset" value="Reset">
		</form>

	
		<div class="loginLink">
			<br>
			<a href="./createAccount.php">New User? Create a account</a>
		</div>
     
		</div>
	</div>
	
	
</body>
</html>
