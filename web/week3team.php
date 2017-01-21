<!DOCTYPE html>
<html lang="en-us">
<head>
  <meta charset="utf-8" />
  <title>03 Teach : Team Activity</title>
</head>
<body>
<h1>03 Teach : Team Activity - Group 1</h1>
<br />
<form method="post" action="week3formhandler.php">
  <label for="name">Name: </label>
  <input type="text" name="name" id="name"><br /><br />
  <label for="email">Email: </label>
  <input type="text" name="email" id="email"><br /><br />
  <label>Major:</label><br />
  <?php
    $majors = array("cs"=>"Computer Science", "wd"=>"Web Design and Development",
        "cit"=>"Computer information Technology","ce"=>"Computer Engineering");
    foreach($majors as $major_key => $major_value){
      echo "<input type=\"radio\" name=\"major\" id=\"" .$major_key."\" value=\"" . $major_value . "\">";
      echo "<label for=\"" .$major_key. "\">" .$major_value. "</label><br />";
    }
    ?>
  <br />
  <label>Check Continents you have visited: </label><br />
  <label for="na">North America</label>
  <input type="checkbox" name="cont[]" id="na" value="na"><br />
  <label for="sa">South America</label>
  <input type="checkbox" name="cont[]" id="sa" value="sa"><br />
  <label for="eu">Europe</label>
  <input type="checkbox" name="cont[]" id="eu" value="eu"><br />
  <label for="as">Asia</label>
  <input type="checkbox" name="cont[]" id="as" value="as"><br />
  <label for="au">Australia</label>
  <input type="checkbox" name="cont[]" id="au" value="as"><br />
  <label for="af">Africa</label>
  <input type="checkbox" name="cont[]" id="af" value="af"><br />
  <label for="an">Antarctica</label>
  <input type="checkbox" name="cont[]" id="an" value="an"><br /><br />
  <label style="display:inline-block; vertical-align: top" for="comments">Comments: </label>
  <textarea rows="4" cols="50" name="comments" id="comments"></textarea><br /><br />
  <button type="submit">Submit</button>
</form>
</body>
</html>