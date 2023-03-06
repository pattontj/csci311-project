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

<!-- Included Navbar -->
<?php require 'navbar.php';?>
<?php

echo "
<!-- User Profile -->
<div class=\"profile\">
    <div>
        <img src=\"assets/default_pfp.svg\" class=\"profileIcon\"/><br>
        <text>Username username</text>
    </div>
    <div class=\"description\">
        <text>Torem ipsum dolor sit amet, consectetur adipiscing elit. Aenean in nisl luctus ante consequat rutrum. Morbi porta mi quis quam sagittis imperdiet in id nisl. Maecenas vel venenatis neque. Quisque facilisis luctus dignissim. Aliquam commodo arcu vitae urna porttitor, id accumsan massa mollis. Pellentesque mollis quis nunc a interdum. Pellentesque.</text>
    </div>
    <div style=\"float: right; margin-top: 11px;\">
        <text>Dislikes</text>
    </div>

</div>

<!-- List of posts the User made-->"
?>

</body>
</html>
