<!DOCTYPE html>

<html lang="en-us">

<head>
  <meta charset="utf-8" />
  <title></title>
</head>
<body>
<?php echo $_POST["name"]; ?><br>
<?php echo $_POST["email"]; ?><br>
<p>

    <a href="mailto:<?php echo $_POST["email"]; ?>?Subject=Hello%20again" target="_top">
        <?php echo $_POST["email"]; ?></a>
</p>
<?php echo $_POST["major"]; ?><br>
<?php echo $_POST["comments"]; ?><br>
</body>
</html>