<?php
session_start();
?>
<!-- Nav bar -->
<div class='navbar'> 
    <div><a href="./index.php"> Home </a></div>
    <div><a href='./profile.php'> Profile </a></div>
     <div><a href='./logoutHandler.php'> Logout </a></div>

    <form action="future script name here" method="POST">
        <input type="search" />
        <button type="submit" > Go </button>
    </form>

    <div>
		<?php
			echo "<img src=".$_SESSION['profilePicture']." class=navUserIcon width='40px' height='40px'/>";
        ?>
        <!-- Drop down menu: edit profile, logout, etc. -->
    </div>
</div>
