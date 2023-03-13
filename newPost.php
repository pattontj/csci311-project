
<?php
echo "<link href='css/post.css' rel='stylesheet'>";

include("post.php");
include("database.php");

// use some placeholder data where applicable
$userID = 1;
$uName = "Johhny Appleseed";
$content = $_POST['postBox'];
$dislikes = 0;

// $newPost = form_post($userID, $uName, $content, $dislikes);

// TODO: insert into database


try {
    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<br/> <a style='margin:20%;text-align:center;'>Debug Info: Connected successfully </a><br/>";
} catch (PDOException $e) {
    echo "Connection Failed: ". $e->getMessage();
}


// prep query
$insertQuery = "INSERT INTO Post ".
    "(UserID, PostContent) ".
    "VALUES ".
    "(?, ?)";


// attempt insert to DB
try {
    $insert = $dbh->prepare($insertQuery);
    $insert->execute([$userID, $content]);
} catch (PDOException $e) {
    echo "Insert error!: ". $e->getMessage();
    // die();
}

$dbh = null;
$insert = null;



// echo $content;
// echo $newPost;

// sleep(3);

// echo $newPost;

// send you back to the main page
header("Location: mainPage.php");

?>
