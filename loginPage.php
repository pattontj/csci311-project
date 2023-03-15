
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <!--Page Title-->
  <title>Login Page</title>
  <!--Link to StyleSheet-->
  <link href="css/style.css" rel="stylesheet" />
  <!--Page Icon-->
  <link rel="icon" type="image/png" href="pathToImage">
  
</head>
<body>
	<div class="center">
	<!-- Once user selects Login they will be redirected to their home page -->
	<form action="loginHandler.php" method="POST">
		<label for="userName">UserName:</label><br>
		<input type="text" id="userName" name="userName" placeholder="Karl_Wheezer" size="20" required><br><br>
		<label for="password">Password:</label><br>
		<input type="paswword" id="password" name="password" placeholder="Enter_Password" size="20" required><br><br>
		<label for="pfp">Select a Profile Icon:</label><br>
		<input type="file" id="pfp" name="pfp"><br><br>
		<input type="submit" value="Login">
		<input type="reset" value="Reset">
	</form>
	</div>
	
	
	
</body>
</html>
