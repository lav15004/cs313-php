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
    $cont = $_POST['cont'];
    $cont_array = array("na"=>"North America","sa"=>"South America","eu"=>"Europe","as"=>"Asia","au"=>"Australia","af"=>"Africa","an"=>"Antarctica");
    if(empty($aDoor))
    {
        echo("You didn't select any Continents.");
    }
    else
    {
        $N = count($cont);
        echo("Continents you have visited are:<br />");
        for($i=0; $i < $N; $i++)
        {

            echo(array_search($cont[$i],$cont_array) . " <br />"  );
        }
    }
    ?>

  Your comments are: <?php echo $_POST["comments"]; ?><br>

</p>
</body>
</html>