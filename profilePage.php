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
<?php require_once( 'navbar.php' );?>
<!-- User Profile -->
<?php
//PlaceHolder Variables
$userName = "Johnny Appleseed";
$description = "Torem ipsum dolor sit amet, consectetur adipiscing elit. Aenean in nisl luctus ante consequat rutrum. Morbi porta mi quis quam sagittis imperdiet in id nisl. Maecenas vel venenatis neque. Quisque facilisis luctus dignissim. Aliquam commodo arcu vitae urna porttitor, id accumsan massa mollis. Pellentesque mollis quis nunc a interdum. Pellentesque.";
$dislikes = 5453;
$profilePic = "assets/default_pfp.svg";
echo "
<div class=\"profile\">
    <div>
        <img src= $profilePic class=\"profileIcon\"/><br>
        <div class=\"userName\">
        $userName
        </div>
    </div>
    <div class=\"description\">
        $description
    </div>
    <div style=\"float: right; margin-top: 11px;\">
        <text>Dislikes: </text>$dislikes
    </div>

</div>"
?>
<!-- List of posts the User made-->

</body>
</html>
