
<?php

session_start();

require("header.php");

require("post.php");
require("database.php");

require("navbar.php");

if ( !isset($_GET["search"]) ) {
    echo "error!";
    die();
}


$search = $_GET["search"];

if ( isset($_GET["page"]) ) {
    $page = $_GET["page"];
    $pagecount = $_GET["page"];
    
    if ( !is_numeric($page) || $page <= 0 ) {
        header("Location: ./index.php");
    }
}
else {
    $page = 1;
    $pagecount = 1;
}

$pgTmp = $page - 1;
$pageLimit = 10;
$pageIdx = $pgTmp * $pageLimit;



// $sql = "SELECT * FROM Post WHERE PostContet LIKE %?%";

$sql = "SELECT p.ID, p.PostContent, p.Date, UserProfile.Username, Image.Filename as Filename ".
       "FROM (SELECT * FROM Post WHERE PostContent LIKE ? ORDER BY ID DESC) as p ".
       "LEFT JOIN UserProfile ON p.UserID = UserProfile.ID ".
       "LEFT JOIN Image ON UserProfile.ProfilePicture = Image.ID ".
       "ORDER BY p.Date DESC";


$test = "SELECT p.ID, p.PostContent, p.Date, UserProfile.Username, Image.Filename as Filename ".
       "FROM (SELECT * FROM Post ORDER BY ID DESC LIMIT ?,10) as p ".
       "LEFT JOIN UserProfile ON p.UserID = UserProfile.ID ".
       "LEFT JOIN Image ON UserProfile.ProfilePicture = Image.ID ".
       "ORDER BY p.Date DESC";


// Connect to the DB
try {
    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch ( PDOException $e ) {
    echo "Connection failed: ". $e->getMessage();
}


try {
    $searchParam = "%".$search."%";
    $query = $dbh->prepare($sql);
    $query->bindParam(1, $searchParam, PDO::PARAM_STR);
    // $query->bindParam(2, $pageIdx,   PDO::PARAM_INT);

    $result = $query->execute();
    $count = $query->rowCount();

} catch ( PDOException $e ) {
    echo "Query failed: ". $e->getMessage();
}

echo "<br/ > <a class='searchres'>$count results found for: \"$search\"</a> <br />";

foreach ( $query as $row ) {
    $userId      = $row["ID"];
    $postContent = $row["PostContent"];
    $postName    = $row["Username"];
    $postDate    = $row["Date"];
    $pfpPath     = $row["Filename"];
    
    form_post($userId, $postName, $postContent, $postDate, $pfpPath);    

}

if ($count == $pageLimit) {
    $more = $page+1;
    echo " <a class='pageBtn' href='search.php?search=$search&page=$more'> Load More... </a>";
}



?>
