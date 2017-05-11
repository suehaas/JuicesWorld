<?php


$hostname = "mysql.juices.world"; // the hostname you created when creating the database
$username = "juicesworld";      // the username specified when setting up the database
$password = "p@thw@y5";      // the password specified when setting up the database
$database = "juicesworld";      // the database name chosen when setting up the database

$link = mysqli_connect($hostname, $username, $password, $database);
if (mysqli_connect_errno()) {
   die("Connect failed: %s\n" + mysqli_connect_error());
   exit();
}


/*
 $db = mysqli_connect('mysql.juices.world','juicesworld','p@thw@y5','juice')
 or die('Error connecting to MySQL server.');
*/
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  echo $_POST['juicename'];
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="main.css">
  <title>HTML Portfolio</title>
</head>
<body>
  <nav class="navbar navbar-default">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#portfolio-collapse-menu">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Juices World</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="portfolio-collapse-menu">
        <ul class="nav navbar-nav">
          <li><a href="#">Home</a></li>
          <li><a href="#">About</a></li>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
  </nav>

  <div class="container">
    <img src="images/juicesWorldLogo.png" width=300 />

    <ol class="juice">
        <!--<li class="juice-item">
          <a class="juice-link" href="#">Cucumber Lemonade</a>
          <ul class="juice-meta">
            <li class="juice-meta-item">
              <em>Posted by:</em>
              <a href="#">Sue Haas</a>
            </li>
            <li class="juice-meta-item">
              <a href="">2 comments</a>
            </li>
            <li class="juice-meta-item">
              <a class="js-like" href="#">Like this juice!</a>
            </li>
          </ul> -->

        <?php
        $query = "SELECT * FROM juice";
        mysqli_query($link, $query) or die('Error querying database.');

        $result = mysqli_query($link, $query);

        while ($row = mysqli_fetch_array($result)) {
         echo '<li class="juice-item"><a class="juice-link" href="#">' . $row['juicename'] . '</a></li>';
        }

        mysqli_close($link);
        ?>

      </ol>

  </div>

  <div class="footer">
    <div class="container">
      <p>Built by <a href="http://www.suehaas.com">www.suehaas.com</a></p>
    </div>
  </div>


  <script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>
