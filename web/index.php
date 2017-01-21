<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <link rel="stylesheet" href="css/cs313-php.css">

  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../favicon.ico">

  <title>Aaron Lavold - CS 313: 02 (Online)</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>
<div class="container">
<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">CS 313: 02 (Online)</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="assignments.php">Assignments Page</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Assignments <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="assignments.php">Assignments Page</a></li>
            <li><a href="hello.html">Hello World</a></li>
            <li><a href="week2team.php">Week 02: Team</a></li>
            <li><a href="week3team.php">Week 03: Team</a></li>
            <li><a href="index.php">Week 02: Personal Homepage</a></li>
          </ul>
        </li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>
  <div class="row">
    <div class="col-lg-12">
      <br />
      <br />
      <br />
    </div>
  </div>
  <div id="jumbo" class="jumbotron">
    <h2>Hello, from Aaron Lavold!</h2>
    <p>My family and I currently live in Mesa, Arizona. I am a full-time online student that matriculated to BYU-I through the
      Pathway program. My major is Software Engineering. I have worked for AT&T for the past 23 years. Currently, in AT&T's Technology Development
      organization, as a Senior - Systems Engineer.  I love the job because it allows me to
      work with a lot of different technologies, and it doesn't hurt that the job is fun too. </p>
  </div>
  <div class="alert alert-success alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Attention:</strong> This page is for the "02 Prove : Assignment - Homepage" assignment.
    All requirements have been met. Bootstrap is utilized, so you will see the page change as you resize the browser. The image at the
    bottom will also resize if you make the browsers width narrow enough.  A few of the many "above and beyond" item are: I added this dismissable
    alert, a jumbotron to both this page and the assignment page, a list of links to completed assignment on the assignment page,
    and add completed assignments to the menu/nav bar.  You can dismiss this alert by clicking on the "x" in the upper right corner of this alert box.
  </div>
  <div class="row">
    <div class="col-sm-6">
      <table id="schedule">
        <tr>
          <th colspan="5">Winter 2017 - Class Schedule</th>
        </tr>
        <tr>
          <td class="scheduleth">Course #</td>
          <td class="scheduleth">Course Description</td>
          <td class="scheduleth">Sec#</td>
          <td class="scheduleth">Class Location</td>
        </tr>
        <tr>
          <td class="scheduletd">CS 308</td>
          <td class="scheduletd">Technical Communication</td>
          <td class="scheduletd">03 (Online)</td>
          <td class="scheduletd">Online <a href="https://byui.brightspace.com/d2l/home/195575">I-Learn 3</a></td>
        </tr>
        <tr>
          <td class="scheduletd">CS 313</td>
          <td class="scheduletd">Web Engineering II</td>
          <td class="scheduletd">02 (Online)</td>
          <td class="scheduletd">Online <a href="https://byui.brightspace.com/d2l/home/205275">I-Learn 3</a></td>
        </tr>
      </table>
    </div>
    <div class="col-sm-1">
    </div>
    <div class="col-sm-6">
      <table>
        <tr>
          <td>
            <blockquote cite="https://www.lds.org/general-conference/2003/04/in-search-of-treasure?lang=eng">
              <span id="favquote">Favorite Quote:<br /></span>“Don't save something for a special occasion. Every day in your life is a special occasion.”
              <span id="favquotesig">-Thomas S. Monson</span>
            </blockquote>
          </td>
        </tr>
      </table>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <p id="myfamP">
      <h2 id="myfamily">
        My beautiful family!!!
      </h2>
      </p>
      <img id="famimage" class="img-responsive img-rounded" src="../images/lavoldfamily500x316.jpg"
           alt="Picture of the Lavold Family">
    </div>
  </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../js/jquery.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
