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
<div class="container">
  <?php include 'navbar.inc' ?>
  <div class="row">
    <div class="col-lg-12">
      <br />
      <br />
      <br />
    </div>
  </div>
  <label for="ddl_env">Environment: </label>
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

  <br /><br />

  <label for="ddl_env">Project: </label>
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

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../js/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../js/jquery.min.js"><\/script>')</script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
