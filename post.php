

<?php

// Purpose: generate a single post in HTML using given parameters.
//          Parameters should be fetched from the database, not inside this function.

// posterID:   ID of the person who posted
// posterName: Text name of the person who made the post
// content:    Text content of the post
// dislikes:   number of dislikes on post.
function form_post($posterID=0, $posterName="Name User", $content = "Lore Ipsum",
                   $dislikes=0) {

// TOOD: add params for the poster's profile icon, and possibly if you have disliked the post
//       so we don't have to double query and change it with JS or something.

    echo "
    <div class='post'>


    <div class='userInfo'>
        <div>
            <img src='assets/default_pfp.svg' class=userIcon height='40px'/>
        </div>
    <p style='vertical-align: 80%;'>$posterName</p>   
    </div>
    
    
    
    
    <text class='postContent'> $content </text>
    
    

    </div>

";
    
}


?>
