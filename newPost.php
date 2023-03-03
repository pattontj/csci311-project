



<?php

include("post.php");

    // use some placeholder data where applicable
    $userID = 0;
    $userName = "Johhny Appleseed";
    $content = $_POST['postBox'];
    $dislikes = 0;

    $newPost = form_post(userID, userName, content, dislikes);
    
    // TODO: insert into database
    
    echo $content;
    
    echo $newPost;
    
    sleep(3);

    // send you back to the main page
   // header("Location: mainPage.php");
?>
