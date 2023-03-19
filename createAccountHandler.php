
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
$pfpImg = $_POST["pfp"];

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


//------------------------------- SECTION: Image Uploading -------------------------------------------

if ( !empty($_FILES["pfp"]["name"]) && !empty($_FILES["pfp"]["tmp_name"]) ) {

    // Fetches the current highest image ID, adds one, names the next file max(ID)+1.extention
    try {
        $res = $dbh->prepare("SELECT * FROM Image ORDER BY ID DESC LIMIT 1");
        $res->execute();
    } catch (PDOException $e) {
        echo "Query error: ". $e->getMessage();
        die();
    }

    try {
        $imgNo = $res->fetch(PDO::FETCH_ASSOC)["ID"];
    
    } catch (PDOException $e) {
        echo "Query error: ". $e->getMessage();
        die();
    }

    // track the filetype of the image
    $imageFileType = strtolower(pathinfo($_FILES["pfp"]["name"], PATHINFO_EXTENSION));

    // set up the target path/filename on the server
    $imgNo = $imgNo + 1;
    $targetDir = "img/";
    $targetFile = "img/".$imgNo .".". $imageFileType;

    // upload flag
    $uploadOK = true;

    // TODO: Check more conditions on images
    if ( isset($_POST["create"]) ) {
        echo "set ". $_POST["create"]. "<br />";

        $check = getimagesize($_FILES["pfp"]["tmp_name"]);

        if ($check) {
            echo "File is an image - ". $check["mime"]. "<br />";
        }
        else {
            echo "File is not an image! <br />";
            $uploadOK = false;
            die();
        }    
    }

    // if image checks pass, attempt to upload 
    if ($uploadOK == true) {
        if ( move_uploaded_file($_FILES["pfp"]["tmp_name"], $targetFile) ) {       
            try {
                $ins = $dbh->prepare("INSERT INTO Image (Filename) VALUES (?)");
                $ins->execute([$targetFile]);
            } catch (PDOException $e) {
                echo "Insert error: ". $e->getMessage();
                die();
            }
            echo "File has been uploaded.";
        }
    }
    else {
        echo "Did not upload! <br />";
    }
}
//------------------------------------------------------------------------------------


// NOTE: BCRYPT will always return a length 60 string for hashed PWDs.
try {
    $pwdHash = password_hash($pwd, PASSWORD_BCRYPT);
} catch (ValueError $e) {
    echo "Error in hashing password: ". $e->getMessage();
    die();
}


// echo "pwd: ". $pwdHash. "<br />";

// NOTE/TODO: REMOVE FROM PRODUCTION CODE
// Run a test that the password can be verified
$pwdTest = password_verify($pwd, $pwdHash);
echo "pwdTest: $pwdTest";
// ----------------------------------------------

$insertQuery = "INSERT INTO UserProfile ".
    "(Email, Username, PasswordHash, Status, ProfilePicture) VALUES ".
    "(?, ?, ?, 0, ?)";

/*
try {
    $insert = $dbh->prepare($insertQuery);
    $insert->execute([$email, $uName, $pwdHash, $imgNo]);
    

} catch (PDOException $e) {
    echo "Insert failed: " . $e->getMessage();
}
*/



?>
