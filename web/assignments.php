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
        <li class="active"><a href="assignments.php">Assignments Page</a></li>
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
  <div class="row">
    <div class="col-lg-12">
      <br />
      <br />
      <br />
    </div>
  </div>
  <div class="jumbotron">
    <h1>Completed Assignments</h1>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="list-group">
        <li class="list-group-item active">Assignment Links</li>
        <a href="hello.html" class="list-group-item">Hello World</a>
        <a href="week2team.php" class="list-group-item">Week 02: Team</a>
        <a href="index.php" class="list-group-item">Week 02: Personal Homepage</a>
        <a href="week3team.php" class="list-group-item">Week 03: Team</a>
        <a href="php_survey.php" class="list-group-item">03 Prove : Assignment - PHP Survey</a>
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
