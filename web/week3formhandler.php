<!DOCTYPE html>

<html lang="en-us">

<head>
  <meta charset="utf-8" />
  <title></title>
</head>
<body>
<p>
  Your name is: <?php echo htmlspecialchars($_POST["name"]); ?><br>
  Your email is: <a href="mailto:<?php echo htmlspecialchars($_POST["email"]); ?>?Subject=Hello%20again" target="_top">
    <?php echo htmlspecialchars($_POST["email"]); ?></a><br>
  Your select Major is: <?php echo htmlspecialchars($_POST["major"]); ?><br>

    <?php
    $cont = $_POST['cont'];
    $cont_array = array("North America"=>"na","South America"=>"sa","Europe"=>"eu","Asia"=>"as","Australia"=>"au",
        "Africa"=>"af","Antarctica"=>"an");
    if(empty($cont))
    {
        echo("You didn't select any Continents.");
    }
    else
    {
        $N = count($cont);
        echo("Continents you have visited are:<br />");
        for($i=0; $i < $N; $i++)
        {

            echo(htmlspecialchars(array_search($cont[$i],$cont_array)) . " <br />"  );
        }
    }
    ?>

  Your comments are: <?php echo htmlspecialchars($_POST["comments"]); ?><br>

</p>
</body>
</html>