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
  <script type="text/javascript" src="js/survey_validation.js"></script>
  <title>Aaron Lavold - CS 313: 02 (Online)</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

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
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="assignments.php">Assignments Page</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Assignments <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="assignments.php">Assignments Page</a></li>
                <li><a href="hello.html">Hello World</a></li>
                <li><a href="week2team.php">Week 02: Team</a></li>
                <li><a href="index.php">Week 02: Personal Homepage</a></li>
                <li><a href="week3team.php">Week 03: Team</a></li>
                <li class="active"><a href="php_survey.php">03 Prove : Assignment - PHP Survey</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="jumbotron">
      <h1>03 Prove : Assignment - PHP Survey</h1><br /><br />
    </div>
    <h2>Aaron's dumb survey questions</h2><br /><br />
    <div class="row">
      <div class="col-lg-12">
        <br />
        <br />
        <br />
      </div>
    </div>
    <form method="post" action="survey_results.php" onsubmit="return isValid();">
      <div class="row">
        <div class="col-md-12">
          <label for="bed">How big is your bed?</label>
          <select id="bed" name="bed">
            <option value=""></option>
            <option value="Single">Single</option>
            <option value="Double">Double</option>
            <option value="Queen">Queen</option>
            <option value="King">King</option>
          </select><br /><br />
          <label for="clown">Are you scared of clowns?</label>
          <select id="clown" name="clown">
            <option value=""></option>
            <option value="Nope, not me!">Nope, not me!</option>
            <option value="Yes! They are creepy!">Yes! They are creepy!</option>
          </select><br /><br />
          <label for="catdog">Are you cat or dog person?</label>
          <select id="catdog" name="catdog">
            <option value=""></option>
            <option value="Woof">Woof</option>
            <option value="Meow">Meow</option>
          </select><br /><br />
          <label for="sing">Do you sing in the shower?</label>
          <select id="sing" name="sing">
            <option value=""></option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
          </select><br /><br />
          <label for="nightlight">Do you sleep with a night light on?</label>
          <select id="nightlight" name="nightlight">
            <option value=""></option>
            <option value="No">No</option>
            <option value="Yes">Yes</option>
          </select><br /><br />
          <button type="submit">Submit</button>
          <br><br>
          <a href="survey_results.php">Click here for current survey results.</a>
        </div>
      </div>
    </form>
  </div>
  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="js/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="../js/jquery.min.js"><\/script>')</script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
