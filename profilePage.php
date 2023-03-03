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

<!-- Included Navbar -->
<?php require 'navbar.php'; ?>

<!-- User Profile -->
<div class="profile">
    <div>
        <img src="assets/default_pfp.svg" class="profileIcon"/><br>
        <text>Username username</text>
    </div>
    <div class="description">
        <text>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean in nisl luctus ante consequat rutrum. Morbi porta mi quis quam sagittis imperdiet in id nisl. Maecenas vel venenatis neque. Quisque facilisis luctus dignissim. Aliquam commodo arcu vitae urna porttitor, id accumsan massa mollis. Pellentesque mollis quis nunc a interdum. Pellentesque.</text>
    </div>
    <div style="float: right; margin-top: 11px;">
        <text>Dislikes</text>
    </div>

</div>

<!-- List of posts the User made-->
<?php 
    for($x = 0; $x < 5 ; $x++){
        include 'post.php';
    } ?>

</body>
</html>
