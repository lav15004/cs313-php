<?php
include 'dbstuff.inc';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Scripture Resources - Form Page</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/cs313-php.css">
</head>
<body>
<h1>Scripture Resources</h1>
<br />
<form method="post" id="srform" action="">

  <table>
    <tr>
      <td><label for="txt_book">Book:</label></td>
      <td><input type="text" name="txt_book" id="txt_book"></td>
    </tr>
    <tr>
      <td><label for="txt_Chapter">Chapter:</label></td>
      <td><input type="text" name="txt_Chapter" id="txt_Chapter"></td>
    </tr>
    <tr>
      <td><label for="txt_Verse">Verse:</label></td>
      <td><input type="text" name="txt_Verse" id="txt_Verse"></td>
    </tr>
    <tr>
      <td><label for="txt_Content">Content:</label></td>
      <td><input type="text" name="txt_Content" id="txt_Content"></td>
    </tr>
  </table>

  <br />
  <label for="cbl_Content">Topics:</label>
<!--  <input type="checkbox" name="topics[]" value="A" />testing<br />-->
  <br />
    <?php
      $sql_string = 'select id, name from topic';
      $statement = $db->prepare(html_entity_decode($sql_string));
      $statement->execute();
      while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        echo '<input type="checkbox" name="topics[]" value="' . $row['id'] . '" />'. $row['name'].'<br />';
      }

    ?>
  <input type="checkbox" name="topics[]" value="-1" /><input type="text" name="newtopic" id="newtopic">
  <br />
  <br />
  <button>Submit</button>
</form>
<div id="results">
</div>

<br />
<hr>
<br />
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../js/jquery.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        // submit form using $.ajax() method

        $('#srform').submit(function(e){

            e.preventDefault(); // Prevent Default Submission

            $.ajax({
                url: 'getresults.php',
                type: 'POST',
                data: $(this).serialize() // it will serialize the form data
            })
                .done(function(data){
                    $('#results').fadeIn.('slow').html(data);
                })
                .fail(function(){
                    alert('Ajax Submit Failed ...');
                });
        });


      /*
       // submit form using ajax short hand $.post() method

       $('#reg-form').submit(function(e){

       e.preventDefault(); // Prevent Default Submission

       $.post('submit.php', $(this).serialize() )
       .done(function(data){
       $('#form-content').fadeOut('slow', function(){
       $('#form-content').fadeIn('slow').html(data);
       });
       })
       .fail(function(){
       alert('Ajax Submit Failed ...');
       });

       });
       */

    });
</script>
</body>
</html>
