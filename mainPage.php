<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <!--Page Title-->
  <title></title>
  <!--Link to StyleSheet-->
  <link href="css/style.css" rel="stylesheet" />

  <link href="css/navbar.css" rel="stylesheet" />

  <link href="css/post.css" rel="stylesheet" />
  

</head>
<body>
<!--Page Content Goes here-->

<!--  -->

<!-- Nav bar -->
<?php require 'navbar.php'; ?>



<!-- post -->

<?php


$loreIpsum="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";

     require_once("post.php");

     require_once("createPost.php");
     
     form_post(0, "Johnny Appleseed", "Lore Ipsum", 5);
     form_post(0, "Johnny Appleseed", "Test Test Test", 10000);
     form_post(1, "Dan McDan", "DanDanDanDanDanDanDanDanDanDanDanDanDanDanDanDan", 3);
     form_post(0, "Ada Lovelace", $loreIpsum, 1);

 ?>

</body>
</html>
