<?php
session_start();
include 'inc/dbstuff.inc';
if (isset($_SESSION) && isset($_SESSION['user_id']) && $_SESSION["auth"] == 'True') {
} else {
    header("Location: login.php");
    die();
}
if ($_POST) {
  if ($_POST["update"]==""){
      $sql_form_string = "select ms_request_queue_id id, q.ms_project_id pid, q.ms_request_type_id rid, userid, lastname_firstname lfname,
                        e.server_id eid from ms_request_queue q join ms_projects p on q.ms_project_id = p.ms_project_id join
                        env_for_ddl e on p.ms_server_list_id = e.server_id where ms_request_queue_id=".$_POST["ms_request_queue_id"];
      $statement = $db->prepare($sql_form_string);
      $statement->execute();
      while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
          $id = $row["id"];
          $name = $row["pid"];
          $rtype = $row["rid"];
          $userid = $row["userid"];
          $lfname = $row["lfname"];
          $env = $row["eid"];
      }
  } else {
      $sql_string = "Update ms_request_queue
                      set ms_project_id = ". filter_var($_POST["ddl_projects"], FILTER_SANITIZE_STRING).", ".
                      "ms_request_type_id = " . filter_var($_POST["ddl_access_type"], FILTER_SANITIZE_STRING).", ".
                      "userid = '" .filter_var($_POST["userid"],FILTER_SANITIZE_STRING). "', ".
                      "lastname_firstname = '" . filter_var($_POST["last_first"],FILTER_SANITIZE_STRING)."', ".
                      "web_user_id = " . $_SESSION["user_row_id"].
                      " where ms_request_queue_id = " . filter_var($_POST["update"],FILTER_SANITIZE_STRING);

      $statement = $db->prepare($sql_string);
      if($statement->execute()) {
          header("Location: queue.php");
          die();
      } else {
          $result = "Form Submit failed please try again.";
      }
  }
}


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
      <label class="requestFormlbl"  for="ddl_projects">Project: </label>
      <select id="ddl_projects" name="ddl_projects">
      </select>
    </div>
  </div>
  <br />
  <div class="row">
    <div class="col-xs-offset-1 col-xs-11">
      <label class="requestFormlbl"  for="ddl_access_type">Access Type: </label>
      <select id="ddl_access_type" name="ddl_access_type">
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
      <button class="btn btn-default btn-sm" type="submit" name="update" id="submit" value="<?php echo $id?>">Update</button>
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


        $('#ddl_env').change(function(e){
            var selectvalue = $(this).val();
            $('#ddl_projects').html('<option value="">Loading...</option>');
            if (selectvalue== ""){
                $('#ddl_projects').html('<option value="">Select Project...</option>');
            } else {
                e.preventDefault();
                $.ajax({url: 'inc/selectproject-inc.php?svalue='+selectvalue+'&pvalue='+<?php echo $name; ?>,
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

        $('#ddl_env').val('<?php echo $env; ?>');
        $('#ddl_env').trigger('change');
        $('#ddl_access_type').val('<?php echo $rtype; ?>');

    });
</script>
</form>
</body>
</html>
