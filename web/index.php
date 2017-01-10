<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <script src="js/jquery.min.js"></script>
  <script src="js/week2team.js"></script>
  <link rel="stylesheet" href="css/week2team.css">


  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../favicon.ico">

  <title>02 Teach : Team Activity</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">


  <!-- Custom styles for this template -->
  <!-- <link href="navbar-fixed-top.css" rel="stylesheet"> -->


  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>
<br />
<div class="container">
<div class="jumbotron">

    <h1>02 Teach : Team Activity</h1>
    <p>This is Aaron Lavold's Team Activity page for week 02.</p>

</div>
<div class="row">
  <div id="div1" class="col-sm-4">
    <p id="p1"><span>First Div</span></p>
  </div>
  <div id="div2" class="col-sm-4">
    <p id="p2"><span>Second Div</span></p>
  </div>
  <div id="div3" class="col-sm-4">
    <p id="p3"><span>Third Div</span></p>
  </div>
</div>
<div class="row">
  <div class="col-sm-4">
    <button class="btn btn-primary" onclick="week2teamalert()">Click Me</button>
  </div>
    <div class="col-sm-4">
    <a href="http://www.w3schools.com/colors/colors_names.asp"
       target="_blank">Enter Color Name or Hex (follow link for a list)</a>
    <input id="colorname" name="colorname" type="text">
    <button class="btn btn-success" onclick="changedivcolor(document.getElementById('colorname').value)">Change Color (First Div</button>
    <button class="btn btn-info" id="jquerybutton" name="jquerybutton">Change Color Second Div (jQuery)</button>
  </div>
    <div class="col-sm-4">
    <button class="btn btn-warning" id="fadetoggle">Fade in/out</button>
  </div>
</div>

</div>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<script>window.jQuery || document.write('<script src="../js/jquery.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
