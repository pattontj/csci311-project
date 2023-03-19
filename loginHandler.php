<?php
//This code has been copied and modified from the example code provided in class
//start the session
session_start();

//db connection
require_once("database.php");

try {
    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


$uName = $_POST["userName"];
$pwd = $_POST["password"];

echo "username: ".$_POST["userName"]. " pwd: ".$_POST["password"]."<br />";

// Run DB query for pwd

$sql = "SELECT UserProfile.ID, UserProfile.PasswordHash, UserProfile.ProfilePicture, Image.Filename as Filename FROM UserProfile ".
    "LEFT JOIN Image ON Image.ID = ProfilePicture ".
    "WHERE Username = ? ";

try {
    $res = $dbh->prepare($sql);
    $res->bindParam(1, $uName, PDO::PARAM_STR);
    $res->execute();

} catch (PDOException $e) {
    echo "Query error: ". $e->getMessage();
}

try {
    $values= $res->fetch(PDO::FETCH_ASSOC);
    $pwdHash =    $values["PasswordHash"];
    $uID =        $values["ID"];
    $imgID =      $values["ProfilePicture"];
    $profilePic = $values["Filename"];
    echo "pwdHash: ". $pwdHash ."<br />";
}catch (PDOException $e) {
    echo "Fetch error: ". $e->getMessage();
}

if (password_verify($pwd, $pwdHash)) {

    $_SESSION["username"] = $uName;
    $_SESSION["uID"] = $uID;
    $_SESSION["imgID"] = $imgID;
    $_SESSION["profilePicture"] = $profilePic;
    echo "username: ". $_SESSION["username"]."<br /> uID: ". $_SESSION["uID"]."<br />";
    echo "imgID: ". $_SESSION["imgID"]."<br /> pfpPic: ". $_SESSION["profilePicture"]."<br />";
                                
                                
} else {
    echo "Username or Password are incorrect.";
    die();
}



//used to redirect to mainpage
 header("Location: mainPage.php");
	
	
//either the form handling goes here....
	
	
die();
	
//or here...
?>
