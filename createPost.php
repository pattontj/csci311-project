




<div class='post'>

    <div class='userInfo'>
        <div>
          <?php
          echo "<img src=".$_SESSION['profilePicture']." class=userIcon width='40px' height='40px'/>";
          ?>
          </div>
        <?php
          session_start();
          echo "<p style='vertical-align: 80%;'>".$_SESSION["username"]."</p>";   
         ?>
          </div>

     <!--// autocomplete off: https://stackoverflow.com/questions/48948460/reload-the-page-php-without-fill-the-text-boxes-with-old-data-php -->
    <form action='newPost.php' method='post' style='display: inline-block;'>
          <textarea id='postBox' name='postBox' class='createPostBox' wrap='soft' maxlength='500' placeholder='Say something fun!' autocomplete='off'></textarea>
          <input type='submit' value='post' style='vertical-align:bottom; width: 45px;'/>
    </form>

</div>



<!--// submit post to database --!> 
<?php

          

?>
