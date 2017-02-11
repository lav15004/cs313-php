<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <link rel="stylesheet" href="../css/cs313-php.css">

  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../favicon.ico">

  <title>Aaron Lavold - CS 313: 02 (Online)</title>

  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>
<div class="container">
  <?php include 'navbar.inc' ?>
  <div class="row">
    <div class="col-lg-12">
      <br />
      <br />
      <br />
    </div>
  </div>
  <div class="row">
    <div class="col-lg-5 text-center">
    </div>
    <div class="col-lg-2 text-center">
      <input id="loginmode" type="radio" name="mode" value="login">
      <label for="loginmode">Login  </label>
      <span>&nbsp;&nbsp;</span>
      <input id="regmode" type="radio" name="mode" value="reg">
      <label for="regmode">Register</label>
    </div>
    <div class="col-lg-5 text-center">
    </div>
  </div>

  <div id="login">
    <div class="row">
      <div class="col-sm-3">
      </div>
      <div class="col-sm-6">
        <label class="loginFormlbl" for="userid">User ID: </label>
        <input type="text" name="userid" id="userid">
      </div>
      <div class="col-sm-3">
      </div>
    </div>
    <div class="row">
      <div class="col-sm-3">
      </div>
      <div class="col-sm-6">
        <label class="loginFormlbl" for="userid">Password: </label>
        <input type="text" name="password" id="password">
      </div>
      <div class="col-sm-3">
      </div>
    </div>
    <div class="row">
      <div class="col-sm-3">
      </div>
      <div class="col-sm-6">
        <button id="btnlogin">Submit</button>
      </div>
      <div class="col-sm-3">
      </div>
    </div>
  </div>
  <div id="reg">
    <div class="row">
      <div class="col-sm-3">
      </div>
      <div class="col-sm-6">
        <label class="loginFormlbl" for="userid">User ID: </label>
        <input type="text" name="userid" id="userid">
      </div>
      <div class="col-sm-3">
      </div>
    </div>
    <div class="row">
      <div class="col-sm-3">
      </div>
      <div class="col-sm-6">
        <label class="loginFormlbl" for="userid">Full Name: </label>
        <input type="text" name="fullname" id="fullname">
      </div>
      <div class="col-sm-3">
      </div>
    </div>
    <div class="row">
      <div class="col-sm-3">
      </div>
      <div class="col-sm-6">
        <label class="loginFormlbl" for="userid">Password: </label>
        <input type="text" name="password" id="password">
      </div>
      <div class="col-sm-3">
      </div>
    </div>
    <div class="row">
      <div class="col-sm-3">
      </div>
      <div class="col-sm-6">
        <label class="loginFormlbl" for="userid">Confirm Password: </label>
        <input type="text" name="confpassword" id="confpassword">
      </div>
      <div class="col-sm-3">
      </div>
    </div>
    <div class="row">
      <div class="col-sm-3">
      </div>
      <div class="col-sm-6">
        <button id="btnreg">Submit</button>
      </div>
      <div class="col-sm-3">
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
    </div>
  </div>


</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../js/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../js/jquery.min.js"><\/script>')</script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
