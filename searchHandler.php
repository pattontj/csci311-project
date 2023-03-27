
<?php

session_start();

require("post.php");
require("database.php");


if ( !isset($_GET["search"]) ) {
    echo "error!";
    die();
}


$search = $_GET["search"];

// $sql = "SELECT * FROM Post WHERE PostContet LIKE %?%";

$sql = "SELECT p.ID, p.PostContent, p.Date, UserProfile.Username, Image.Filename as Filename ".
       "FROM (SELECT * FROM Post WHERE PostContent LIKE ? ORDER BY ID DESC LIMIT ?,10) as p ".
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
    echo "<br/> <a style='margin:20%;text-align:center;'>Debug Info: Connected successfully </a><br/>";

} catch ( PDOException $e ) {
    echo "Connection failed: ". $e->getMessage();
}


try {
    $zero = 0;
    $query = $dbh->prepare($test);
    // $query->bindValue(1, "%test%", PDO::PARAM_STR);
    $query->bindParam(1, $zero,   PDO::PARAM_INT);

    $result = $query->execute();

    echo "hey";
    
    $count = $result->rowCount();

    echo "<br/ > $count <br />";
    
} catch ( PDOException $e ) {
    echo "Query failed: ". $e->getMessage();
}

foreach ( $result as $row ) {
    echo "test";
    $userId      = $row["ID"];
    $postContent = $row["PostContent"];
    $postName    = $row["Username"];
    $postDate    = $row["Date"];
    $pfpPath     = $row["Filename"];
    
    form_post($userId, $postName, $postContent, $postDate, $pfpPath);    

}




?>
