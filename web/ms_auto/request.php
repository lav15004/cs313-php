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
    <div class="col-xs-12">
      <br />
      <br />
      <br />
    </div>
  </div>

  <br /><br />
  <div class="row">
    <div class="col-xs-offset-1 col-xs-11">
      <label class="requestFormlbl" for="userid">User ID: </label>
      <input type="text" name="userid" id="userid">
    </div>
  </div>
  <br />
  <div class="row">
    <div class="col-xs-offset-1 col-xs-11">
      <label class="requestFormlbl"  for="last_first">Name (Last, First): </label>
      <input type="text" name="last_first" id="last_first">
    </div>
  </div>
  <br />
  <div class="row">
    <div class="col-xs-offset-1 col-xs-11">
      <label class="requestFormlbl"  for="ddl_env">Environment: </label>
      <select name="ddl_env">
        <option value="">Select Environment...</option>
          <?php
          $sql_string = "select server_id, env from env_for_ddl";
          echo $sql_string;
          $statement = $db->prepare(html_entity_decode($sql_string));
          $statement->execute();
          while ($row = $statement->fetch(PDO::FETCH_ASSOC))
          {
              echo "<option value='".$row['server_id']."'>".$row['env']."</option>";
          }
          ?>
      </select>
    </div>
  </div>
  <br />
  <div class="row">
    <div class="col-xs-offset-1 col-xs-11">
      <label class="requestFormlbl"  for="ddl_env">Project: </label>
      <select name="ddl_env">
        <option value="">Select Project...</option>
          <?php
          $sql_string = "select ms_project_id, project_name from ms_projects";
          echo $sql_string;
          $statement = $db->prepare(html_entity_decode($sql_string));
          $statement->execute();
          while ($row = $statement->fetch(PDO::FETCH_ASSOC))
          {
              echo "<option value='".$row['ms_project_id']."'>".$row['project_name']."</option>";
          }
          ?>
      </select>
    </div>
  </div>
  <br />
  <div class="row">
    <div class="col-xs-offset-1 col-xs-11">
      <label class="requestFormlbl"  for="ddl_env">Access Type: </label>
      <select name="ddl_env">
        <option value="">Select Access Type...</option>
          <?php
          $sql_string = "select ms_request_type_id, request_type from ms_request_types";
          echo $sql_string;
          $statement = $db->prepare(html_entity_decode($sql_string));
          $statement->execute();
          while ($row = $statement->fetch(PDO::FETCH_ASSOC))
          {
              echo "<option value='".$row['ms_request_type_id']."'>".$row['request_type']."</option>";
          }
          ?>
      </select>
    </div>
  </div>
  <br />
  <div class="row">
    <div class="col-xs-offset-1 col-xs-11">
      <button type="submit" name="submit" id="submit">Submit</button>
    </div>
  </div>
  <br />
</div>
<br />
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../js/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../js/jquery.min.js"><\/script>')</script>
<script src="../js/bootstrap.min.js"></script>
</form>
</body>
</html>
