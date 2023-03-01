<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <!--Page Title-->
  <title></title>
  <!--Link to StyleSheet-->
  <link href="style.css" rel="stylesheet" />

  <link href="navbar.css" rel="stylesheet" />

  <link href="post.css" rel="stylesheet" />
  

</head>
<body>
<!--Page Content Goes here-->

<!--  -->

<!-- Nav bar -->
<div class='navbar'> 
    <div><text> Home </text></div>
    <div><text> Test </text></div> 

    <form action="future script name here" method="POST">
        <input type="search" />
        <button type="submit" > Go </button>
    </form>

    <div class='navUserIcon'>
        <img src="assets/default_pfp.svg"/>
    </div>
</div>


<!-- post -->

<?php


$loreIpsum="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";

     require_once("post.php");
     form_post(0, "Johnny Appleseed", "Lore Ipsum", 5);
     form_post(0, "Johnny Appleseed", "Test Test Test", 10000);
     form_post(1, "Dan McDan", "DanDanDanDanDanDanDanDanDanDanDanDanDanDanDanDan", 3);
     form_post(0, "Ada Lovelace", $loreIpsum, 1);

 ?>

</body>
</html>
