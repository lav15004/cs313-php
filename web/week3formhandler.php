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
    <?php echo $_POST["email"]; ?></a><br>
  Your select Major is: <?php echo $_POST["major"]; ?><br>

    <?php
    $aDoor = $_POST['cont'];
    if(empty($aDoor))
    {
        echo("You didn't select any buildings.");
    }
    else
    {
        $N = count($aDoor);

        echo("You selected $N door(s): ");
        for($i=0; $i < $N; $i++)
        {
            echo($aDoor[$i] . " ");
        }
    }
    ?>

  Your comments are: <?php echo $_POST["comments"]; ?><br>

</p>
</body>
</html>