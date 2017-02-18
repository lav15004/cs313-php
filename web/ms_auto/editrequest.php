<?php
session_start();

if (isset($_SESSION) && isset($_SESSION['user_id']) && $_SESSION["auth"] == 'True') {
} else {
    header("Location: login.php");
    die();
}
if ($_POST) {
  include 'inc/dbstuff.inc';
  $sql_string = "select id, name, rtype, userid, lfname, env from vw_queue vq join projects p on vq.id = p.id 
                    join env_for_dll e on p.sever_list_id = e.server_id where id=".$_POST["ms_request_queue_id"];
  $statement = $db->prepare($sql_string);
  $statement->execute();
  while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      $id = $row["id"];
      $name = $row["name"];
      $rtype = $row["rtype"];
      $userid = $row["userid"];
      $lfname = $row["lfname"];
      $env = $row["env"];
  }
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


  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../favicon.ico">

  <title>Aaron Lavold - CS 313: 02 (Online)</title>

  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/cs313-php.css">
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
    <div class="col-xs-offset-1 col-xs-11">
      <br />
      <br />
      <br />
    </div>
  </div>

  <br /><br />
  <div class="row">
    <div class="col-xs-offset-1 col-xs-11">
      <label class="requestFormlbl" for="userid">User ID: </label>
      <input type="text" name="userid" id="userid" value="<?php echo $userid?>">
    </div>
  </div>
  <br />
  <div class="row">
    <div class="col-xs-offset-1 col-xs-11">
      <label class="requestFormlbl"  for="last_first">Name (Last, First): </label>
      <input type="text" name="last_first" id="last_first" value="<?php echo $lfname?>">
    </div>
  </div>
  <br />
  <div class="row">
    <div class="col-xs-offset-1 col-xs-11">
      <label class="requestFormlbl"  for="ddl_env">Environment: </label>
      <select id="ddl_env" name="ddl_env">
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
      <select id="ddl_projects" name="ddl_projects">
      </select>
    </div>
  </div>
  <br />
  <div class="row">
    <div class="col-xs-offset-1 col-xs-11">
      <label class="requestFormlbl"  for="ddl_env">Access Type: </label>
      <select name="ddl_access_type">
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
      <button type="submit" name="submit" id="submit" value="<?php echo $id?>">Submit</button>
      <?php echo $sql_string ?>
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
<script type="text/javascript">
    $(document).ready(function() {
        $('#dll_env').val($env);
        $('#ddl_projects').val($name);
        $('#ddl_env').change(function(e){
            var selectvalue = $(this).val();
            alert(selectvalue);
            $('#ddl_projects').html('<option value="">Loading...</option>');
            if (selectvalue== ""){
                $('#ddl_projects').html('<option value="">Select Project...</option>');
            } else {
                e.preventDefault();
                $.ajax({url: 'inc/selectproject-inc.php?svalue='+selectvalue,
                    success: function(output) {
                        //alert(output);
                        $('#ddl_projects').html(output);
                      },
                    error: function (xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + " "+ thrownError);
                      }
                })
            }
        });
    });
</script>
</form>
</body>
</html>
