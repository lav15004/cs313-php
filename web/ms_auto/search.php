<?php
include 'inc/dbstuff.inc';
?>
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
  <script type="javascript">
      function showOrHide(id) {
          var elem = document.getElementById(id);
          elem.style.visibility = (elem.style.visibility === 'hidden')? 'visible' : 'hidden';
      }
  </script>
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

  <![endif]-->
</head>

<body>
<form method="post" action="">
<div class="container">
  <?php include 'navbar.inc' ?>
  <div class="row">
    <div class="col-lg-12">
      <br />
      <br />
      <br />
    </div>
  </div>
  <br />
  <br />
  <label for="project_name">Project Name: </label>
  <input type="text" name="project_name" id="project_name">
  <br /><br />
  <button style="submit" name="submit">Search</button>
  <div id="sr_table" class="row">
    <div class="col-lg-12">
      <span>test</span>
    </div>
  </div>
  <br /><br />
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<script type='text/javascript'>showOrHide('sr_table');</script>";
        echo "boo";
    }
    else
    ?>
</div>
</form>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../js/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../js/jquery.min.js"><\/script>')</script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
