<!DOCTYPE html>

<html lang="en-us">

<head>
  <meta charset="utf-8" />
  <title></title>
</head>
<body>
<p>
  Your name is: <?php echo $_POST["name"]; ?><br>
  Your email is: <a href="mailto:<?php echo $_POST["email"]; ?>?Subject=Hello%20again" target="_top">
    <?php echo $_POST["email"]; ?></a>
  Your select Major is: <?php echo $_POST["major"]; ?><br>
  Your comments are: <?php echo $_POST["comments"]; ?><br>
</p>
</body>
</html>