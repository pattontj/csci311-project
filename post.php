

<?php

//purpose: generate a single post in HTML using given parameters.
//          Parameters should be fetched from the database, not inside this function.

// posterID:   ID of the person who posted
// posterName: Text name of the person who made the post
// content:    Text content of the post
// date:       Date TimeStamp of the post
// dislikes:   number of dislikes on post.
function form_post($posterID=0, $posterName="Name User",
                   $content = "Lore Ipsum",
                   $date,
                   $imgPath,
                   $dislikes=0) {

// TOOD: add params for the poster's profile icon, and possibly if you have disliked the post
//       so we don't have to double query and change it with JS or something.
    
    echo "
    <div class='post'>

    <div class='userInfo'>
        <div>
            <img src=$imgPath class=userIcon width='40px' height='40px'/>
        </div>
    <a style='vertical-align: 80%;' href='profilePage.php?user=$posterName'>$posterName</a>   
    
    <div style='float:right;'>
        <a> $date </a>
    </div>

    </div>
    
    <text class='postContent'> $content </text>
    
    </div>

";
    
}


?>
