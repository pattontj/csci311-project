<?php
session_start();
if (!$_SESSION["uID"] || !$_SESSION["username"]) {
    header("Location: loginPage.php");
    echo "<a href='./loginPage.php'>Please login to continue</a>";
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <!--Page Title-->
  <title></title>
  <!--Link to StyleSheet-->
  <link href="css/style.css" rel="stylesheet" />

  <link href="css/navbar.css" rel="stylesheet" />

  <link href="css/post.css" rel="stylesheet" />
  

</head>
<body>

<!-- Included Navbar -->
<?php require_once( 'navbar.php' );?>
<!-- User Profile -->
<?php

//fetch dtabase info
include("database.php");
// Connect to the DB
try {
    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<br/> <a style='margin:20%;text-align:center;'>Debug Info: Connected successfully </a><br/>";

} catch ( PDOException $e ) {
    echo "Connection failed: ". $e->getMessage();
}

// fetch the GET request for the user profile

if (!isset($_GET["user"])) {
    $usr = $_SESSION["username"];
}
else {
    $usr = $_GET["user"];
}

try{
	$query = $dbh->prepare("SELECT Description, Image.Filename as Filename FROM UserProfile INNER JOIN Image ON ProfilePicture = Image.ID WHERE Username = ? LIMIT 1");
	$query->bindParam(1, $usr, PDO::PARAM_STR);
	$query->execute();
} catch ( PDOException $e ) {
	echo "Query failed: ". $e->getMessage();
}

try {
    $values= $query->fetch(PDO::FETCH_ASSOC);
    $description = $values["Description"];
    $profilePic  = $values["Filename"];
}catch (PDOException $e) {
    echo "Fetch error: ". $e->getMessage();
}

//PlaceHolder Variables
$userName = $usr;
$dislikes = 5453;


echo "
<div class=\"profile\">
    <div>
		
        <img src= $profilePic class=\"profileIcon\"/><br>
        <div class=\"userName\">
        $userName
        </div>
    </div>
    <div class=\"description\">
        $description
    </div>
    <div class=\"dislikes\">
        <text>Dislikes: </text>$dislikes
    </div>

</div>"
?>
<!-- List of posts the User made-->

</body>
</html>
