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

  <table class="table table-striped">
    <tr>
      <th>Request #</th>
      <th>Project Name</th>
      <th>Request Type</th>
      <th>User ID</th>
      <th>Last Name, First Name</th>
    </tr>
    <?php
    $sql_string = "select * from ms_request_queue";
    $statement = $db->prepare(html_entity_decode($sql_string));
    $statement->execute();
    while ($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
      echo "<tr>";
      echo "<td>".$row['ms_request_queue_id']."</td>";
      echo "<td>".$row['ms_project_id']."</td>";
      echo "<td>".$row['ms_request_type_id']."</td>";
      echo "<td>".$row['userid']."</td>";
      echo "<td>".$row['lastname_firstname']."</td>";
      echo "</tr>";
    }
    ?>
  </table>

</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../js/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../js/jquery.min.js"><\/script>')</script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
