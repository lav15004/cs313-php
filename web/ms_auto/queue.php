<?php
session_start();
if (isset($_SESSION) && isset($_SESSION['user_id']) && $_SESSION["auth"] == 'True') {
} else {
    header("Location: login.php");
    die();
}
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
<form action="editrequest.php" method="post" id="editqueue" name="editqueue">
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
  <table class="table table-striped">
    <tr>
      <th>Edit Link</th>
      <th>Request #</th>
      <th>Project Name</th>
      <th>Request Type</th>
      <th>User ID</th>
      <th>User Name</th>
      <th>Last Modified by</th>
    </tr>
    <?php
    $sql_string = "select * from vw_queue";
    $statement = $db->prepare(html_entity_decode($sql_string));
    $statement->execute();
    $rownum = 0;
    while ($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
      $rownum++;
      $rowidname = "row".$rownum;
      echo "<tr>";
      echo "<td style='vertical-align: middle'>"."<button class='text-center btn btn-link' type='submit' name='ms_request_queue_id' id='".$rowidname."' value='".$row['id']."'>Edit</button></td>";
      echo "<td style='vertical-align: middle'>".$row['id']."</td>";
      echo "<td style='vertical-align: middle'>".$row['name']."</td>";
      echo '<td style=\'vertical-align: middle\'>'.$row["rtype"].'</td>';
      echo "<td style='vertical-align: middle'>".$row['userid']."</td>";
      echo "<td style='vertical-align: middle'>".$row['lfname']."</td>";
      echo "<td style='vertical-align: middle'>".$row['full_name']."</td>";
      echo "</tr>";
    }
    ?>
  </table>
</div>
</form>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../js/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../js/jquery.min.js"><\/script>')</script>
<script src="../js/bootstrap.min.js"></script>
<!--<script type="text/javascript">
    $(document).ready(function() {
        $('#editqueue').submit(function(e){
           alert(this.val())
        });
    });
</script>-->
</body>
</html>
