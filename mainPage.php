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




if ( isset($_GET["page"]) ) {
    $page = $_GET["page"];
    $pagecount = $_GET["page"];
    
    if ( !is_numeric($page) || $page <= 0 ) {
        header("Location: ./mainPage.php");
    }
}
else {
    $page = 1;
    $pagecount = 1;
}

$pgTmp = $page - 1;
$pageLimit = 10;
$pageIdx = $pgTmp * $pageLimit;


//--------------------- DO NOT TOUCH THIS SECTION -------------------------
// Section: Fetch Posts from Database

//TODO(Tyler): Fetch dislikes for post



// Selects the post ID, content, and joins the user's username, orders by datetimestamp
$query = "SELECT p.ID, p.PostContent, p.Date, UserProfile.Username, Image.Filename as Filename ".
       "FROM (SELECT * FROM Post ORDER BY ID DESC LIMIT ?,10) as p ".
       "LEFT JOIN UserProfile ON p.UserID = UserProfile.ID ".
       "LEFT JOIN Image ON UserProfile.ProfilePicture = Image.ID ".
       "ORDER BY p.Date DESC";



       
try {
    $result = $dbh->prepare($query);
    $result->bindParam(1, $pageIdx, PDO::PARAM_INT);
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

/*
if ($page > 1) {
    echo " <a class='pageBtn' > </a>";
}

if ($count < $pageLimit) {
    echo " <a class='pageBtn' > Next Page</a>";
}
*/

if ($count == $pageLimit) {
    $more = $page+1;
    echo " <a class='pageBtn' href='mainPage.php?page=$more'> Load More... </a>";
}
    

// close connection to DB
$dbh = null;
$result = null;


?>

</body>
</html>

<?php
    
?>
