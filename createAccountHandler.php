
<?php

include("database.php");

try {
    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<br/> <a style='margin:20%;text-align:center;'>Debug Info: Connected successfully </a><br/>";
} catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}


// Check if username already exists 
$uName = $_POST["reqUserName"];
$email = $_POST["reqEmail"];
$pwd = $_POST["reqPassword"];

try {
    
    $sql = "SELECT * FROM UserProfile WHERE Username = ? OR Email = ?";
    $result = $dbh->prepare($sql);
    $result->execute([$uName, $email]);
    
} catch(PDOException $e) {
    echo "Query failed: " . $e->getMessage();
} 

try {
    $res = $result->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Fetch failed: " . $e->getMessage();
}

// echo reason for account creation failure
if ($res) {
    if ($uName == $res["Username"]) {
        echo "<a>Username already exists!</a> <br />";
    }
    elseif ( $email == $res["Email"]) {
        echo "<a>Account with this email already exists!</a> <br />";
    }
    
    $dbh = null;
    die();
}



// TODO: has password here
$pwdHash = "FAKE_PASSWORD_HASH_EX";

$insertQuery = "INSERT INTO UserProfile ".
    "(Email, Username, PasswordHash, Status) VALUES ".
    "(?, ?, ?, 0)";

try {
    $insert = $dbh->prepare($insertQuery);
    $insert->execute([$email, $uName, $pwdHash]);
    

} catch (PDOException $e) {
    echo "Insert failed: " . $e->getMessage();
}



?>
