<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $bed = htmlspecialchars($_POST["bed"]);
    $clown = htmlspecialchars($_POST["clown"]);
    $catdog = htmlspecialchars($_POST["catdog"]);
    $sing = htmlspecialchars($_POST["sing"]);
    $nightlight = htmlspecialchars($_POST["nightlight"]);
    $inputrow = "$bed|$clown|$catdog|$sing|$nightlight|\n";
    $myfilea = fopen("newfile.txt", "a") or die("Unable to open file!");
    fwrite($myfilea,$inputrow);
    fclose($myfilea);
}
// stuff to read file and display results
$bed_array = array();
$clown_array = array();
$catdog_array = array();
$sing_array = array();
$nightlight_array = array();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <link rel="stylesheet" href="css/cs313-php.css">

  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../favicon.ico">

  <title>Aaron Lavold - CS 313: 02 (Online)</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="js/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="../js/jquery.min.js"><\/script>')</script>
  <script src="js/bootstrap.min.js"></script>
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>
  <div class="container">
  <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">CS 313: 02 (Online)</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="assignments.php">Assignments Page</a></li>
            <li class="dropdown active">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Assignments <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="assignments.php">Assignments Page</a></li>
                <li><a href="hello.html">Hello World</a></li>
                <li><a href="week2team.php">Week 02: Team</a></li>
                <li><a href="index.php">Week 02: Personal Homepage</a></li>
                <li><a href="week3team.php">Week 03: Team</a></li>
                <li><a href="php_survey.php">03 Prove : Assignment - PHP Survey</a></li>
                <li class="active"><a href="survey_results.php">03 Prove : PHP Survey Results</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="row">
      <div class="col-lg-12">
        <br />
        <br />
        <br />
      </div>
    </div>
    <div class="jumbotron">
      <?php
      $myfiler = fopen("newfile.txt", "r") or die("<h2>No Survey Results Recorded</h2>");
      while(!feof($myfiler)) {
          $rowarray=array();
          $rowarray = explode("|",fgets($myfiler));
          if ($rowarray[0] != ""){
              array_push($bed_array,$rowarray[0]);
              array_push($clown_array,$rowarray[1]);
              array_push($catdog_array,$rowarray[2]);
              array_push($sing_array,$rowarray[3]);
              array_push($nightlight_array,$rowarray[4]);
          }
      }
      fclose($myfiler);
      echo "<h2>Survey Results / Assignment 3 </h2>"
      ?>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="col-sm-5">
            <?php
            echo "<label>How big is your bed?</label><br>";
            if (!empty($bed)) {
                echo "Your answer was \"$bed\".<br>";
            }
            ?>
          </div>
          <div class="col-sm-7">
            <?php
            echo "<label>Current Survey Results are:</label><br>";
            $occurances = array_count_values($bed_array);
            foreach($occurances as $ans => $freq) {
                $freq_percent = round((($freq/count($bed_array))*100),2,PHP_ROUND_HALF_UP);
                echo "\"$ans\" was selected $freq time(s) which is a frequency of $freq_percent%<br>";
            }
            ?>
            <br>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-5">
            <?php
              echo "<label>Are you scared of clowns?</label><br>";
              if (!empty($clown)) {
                  echo "Your answer was \"$clown\"<br>";
              }
            ?>
          </div>
          <div class="col-sm-7">
            <?php
              echo "<label>Current Survey Results are:</label><br>";
              $occurances = array_count_values($clown_array);
              foreach($occurances as $ans => $freq) {
                  $freq_percent = round((($freq/count($clown_array))*100),2,PHP_ROUND_HALF_UP);
                  echo "\"$ans\" was selected $freq time(s) which is a frequency of $freq_percent%<br>";
              }
            ?>
            <br>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-5">
            <?php
              echo "<label>Are you cat or dog person?</label><br>";
              if (!empty($catdog)) {
                  echo "Your answer was \"$catdog\"<br>";
              }
            ?>
          </div>
          <div class="col-sm-7">
            <?php
              echo "<label>Current Survey Results are:</label><br>";
              $occurances = array_count_values($catdog_array);
              foreach($occurances as $ans => $freq) {
                  $freq_percent = round((($freq/count($catdog_array))*100),2,PHP_ROUND_HALF_UP);
                  echo "\"$ans\" was selected $freq time(s) which is a frequency of $freq_percent%<br>";
              }
            ?>
            <br>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-5">
            <?php
              echo "<label>Do you sing in the shower?</label><br>";
              if (!empty($sing)) {
                  echo "Your answer was \"$sing\"<br>";
              }
            ?>
          </div>
          <div class="col-sm-7">
            <?php
              echo "<label>Current Survey Results are:</label><br>";
              $occurances = array_count_values($sing_array);
              foreach($occurances as $ans => $freq) {
                  $freq_percent = round((($freq/count($sing_array))*100),2,PHP_ROUND_HALF_UP);
                  echo "\"$ans\" was selected $freq time(s) which is a frequency of $freq_percent%<br>";
              }
            ?>
            <br>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-5">
            <?php
              echo "<label>Do you sleep with a night light on?</label><br>";
              if (!empty($nightlight)) {
                  echo "Your answer was \"$nightlight\"<br>";
              }
            ?>
          </div>
          <div class="col-sm-7">
            <?php
            echo "<label>Current Survey Results are:</label><br>";
            $occurances = array_count_values($nightlight_array);
            foreach($occurances as $ans => $freq) {
                $freq_percent = round((($freq/count($nightlight_array))*100),2,PHP_ROUND_HALF_UP);
                echo "\"$ans\" was selected $freq time(s) which is a frequency of $freq_percent%<br>";
            }
            ?>
            <br><br>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="js/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="../js/jquery.min.js"><\/script>')</script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
