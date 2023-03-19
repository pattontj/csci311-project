<?php
session_start();
if (!$_SESSION["uID"] || !$_SESSION["username"]) {
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
<!--Page Content Goes here-->

<!--  -->

<!-- Nav bar -->
<?php
     require_once("navbar.php");
?>
         
<!-- post -->
<?php


// Fetch the post component (form_post)
include("post.php");
// Fetch the component that allows a user to make a new post
include("createPost.php");
// Fetch DB information
include("database.php");

// start session
// session_start();

// Connect to the DB
try {
    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<br/> <a style='margin:20%;text-align:center;'>Debug Info: Connected successfully </a><br/>";

} catch ( PDOException $e ) {
    echo "Connection failed: ". $e->getMessage();
}


//--------------------- DO NOT TOUCH THIS SECTION -------------------------
// Section: Fetch Posts from Database

//TODO(Tyler): Fetch dislikes for post

$page = 2;
$pageLimit = 10;
$pageOffset = $page-1 * $pageLimit;

// Selects the post ID, content, and joins the user's username, orders by datetimestamp
$testQuery = "SELECT p.ID, p.PostContent, p.Date, UserProfile.Username ".
     "FROM (SELECT * FROM Post ORDER BY ID DESC LIMIT 10) as p ".
     "LEFT JOIN UserProfile ON p.UserID = UserProfile.ID ".
           "ORDER BY p.Date DESC";

try {
    $result = $dbh->query($testQuery);
} catch ( PDOException $e ) {
    echo "Error: ". $e->getMessage();
    die();
}

//------------------------------------------------------------------------

echo "<div>";

// For each response, grab post information and pass to the form post component
foreach($result as $row) {

    $userId =      $row["ID"];
    $postContent = $row["PostContent"];
    $postName =    $row["Username"];
    $postDate =    $row["Date"];

    form_post($userId, $postName, $postContent, $postDate);    
}
echo "</div>";
// close connection to DB
$dbh = null;
$result = null;


?>

</body>
</html>
