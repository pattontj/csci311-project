
<link href="css/style.css" rel="stylesheet" />

<body>
	<div class="loginCreate">
		<div class="center">
		<form action="createAccountHandler.php" method="post" enctype="multipart/form-data">
		 <label for="username">User Name: </label> <br />
		  <input type="text" id="reqUserName" name="reqUserName" placeholder="Desired username..." required /> <br /> <br />
		 <label for="password">Password: </label> <br />
		 <input type="text" id="reqPassword" name = "reqPassword" placeholder="password..." required /> <br /> <br />

		  <label for="reqEmail">Email Address: </label> <br />
		   <input type="text" id="reqEmail" name="reqEmail" placeholder="Your Email..." required /> <br /> <br />

			  
			  <label for="pfp">Select a Profile Icon: </label> <br />
			  <input type="file" id="pfp" name="pfp"> <br /> <br />
		 <input type="submit" value="Create" name="create">
		 <input type="reset" value="Reset">
		 
		 </form>

			<div>
				<br>
					<a href="./loginPage.php">Have an account? Login</a>
			</div>
		 </div>
	</div>
     
</body>