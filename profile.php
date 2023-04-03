<?php
session_start();
if (!$_SESSION["uID"] || !$_SESSION["username"]) {
    header("Location: login.php");
    echo "<a href='./login.php'>Please login to continue</a>";
    die();
}
?>

<!-- Included Navbar And Header Info-->
<?php 
	require ( 'header.php' );
require_once( 'navbar.php' );
include("post.php");


?>
	
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
	$query = $dbh->prepare("SELECT UserProfile.ID, Description, Image.Filename as Filename FROM UserProfile INNER JOIN Image ON ProfilePicture = Image.ID WHERE Username = ? LIMIT 1");
	$query->bindParam(1, $usr, PDO::PARAM_STR);
	$query->execute();
} catch ( PDOException $e ) {
	echo "Query failed: ". $e->getMessage();
}

try {
    $values= $query->fetch(PDO::FETCH_ASSOC);
    $description = $values["Description"];
    $profilePic  = $values["Filename"];
    $UsrID = $values["ID"];
}catch (PDOException $e) {
    echo "Fetch error: ". $e->getMessage();
}

//PlaceHolder Variables
$userName = $usr;
$dislikes = 5453;


echo 
"<div class=\"profile\">
    
<div>
<div>
		
        <img src= $profilePic class=\"profileIcon\"/>
    </div>
     <div class=\"userName\">
        $userName
    </div>
</div>    
<div class=\"description\">
        $description
    </div>

</div>";



$page = 1;
$pagecount = 1;

$pgTmp = $page - 1;
$pageLimit = 10;
$pageIdx = $pgTmp * $pageLimit;


// Selects the post ID, content, and joins the user's username, orders by datetimestamp
$query = "SELECT p.ID, p.PostContent, p.Date, UserProfile.Username, Image.Filename as Filename ".
       "FROM (SELECT * FROM Post WHERE UserID = ? ORDER BY ID DESC LIMIT ?,10) as p ".
       "LEFT JOIN UserProfile ON p.UserID = UserProfile.ID ".
       "LEFT JOIN Image ON UserProfile.ProfilePicture = Image.ID ".
       "ORDER BY p.Date DESC";


try {
    $result = $dbh->prepare($query);
    $result->bindParam(1, $UsrID, PDO::PARAM_INT);
    $result->bindParam(2, $pageIdx, PDO::PARAM_INT);
    
    $result->execute();
    $count = $result->rowCount();
    
} catch ( PDOException $e ) {
    echo "Error: ". $e->getMessage();
    die();
}



//------------------------------------------------------------------------

echo "<div>";

// For each response, grab post information and pass to the form post component
foreach($result as $row) {

    $userId      = $row["ID"];
    $postContent = $row["PostContent"];
    $postName    = $row["Username"];
    $postDate    = $row["Date"];
    $pfpPath     = $row["Filename"];
    
    form_post($userId, $postName, $postContent, $postDate, $pfpPath);    
}
echo "</div>";


    ?>
<!-- List of posts the User made-->

</body>
</html>
