
<link href="css/style.css" rel="stylesheet" />

<body>
    <div class="center">
    <form action="createAccountHandler.php" method="post">
     <label for="username">user name: </label> <br />
      <input type="text" id="reqUserName" name="reqUserName" placeholder="Desired username..." required /> <br /> <br />
     <label for="password">Password: </label> <br />
     <input type="text" id="reqPassword" name = "reqPassword" placeholder="password..." required /> <br /> <br />

      <label for="reqEmail">email address: </label> <br />
       <input type="text" id="reqEmail" name="reqEmail" placeholder="Your Email..." required /> <br /> <br />

          
          // <label for="pfp">Select a Profile Icon: </label> <br />
          //<input type="file" id="pfp" name="pfp"> <br /> <br />
     <input type="submit" value="Login">
     <input type="reset" value="Reset">
     
     </form>

     </div>
     
</body>
