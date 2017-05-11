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
<html>
  <head>
    <title>Sue's Juices!</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,400italic,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:700" rel="stylesheet" />
    <link rel="stylesheet" href="normalize.css" />
    <link rel="stylesheet" href="main.css" />
  </head>
  <body>
    <header class="hero">
      <div class="container">
        <p class="logo">Juice List!</p>
      </div>
    </header>
    <main class="content">
      <div class="container">

        <header class="subheader">
          <h1>Welcome!</h1>
          <p>Find Your Favorites Here, or <a href="addJuice.php"> Add a New Juice Now!</a></p>
        </header>

<!--
        <header class="subheader">
          <h1>Welcome!</h1>
          <p>Find Your Favorites Here, or <a class="js-add-link" href="#"> Add a New Juice Now!</a></p>
            <form class="form js-form" action="index.php" method="post">
              <label class="form-label" for="form-link-input">Add a juice:</label>
              <input class="form-input" type="text" id="form-link-input" name="juicename" />
              <input type="submit" value="submit">
            </form>
        </header>
-->

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
    </main>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"
      integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
      crossorigin="anonymous"></script>
    <script src="app.js"></script>
  </body>
</html>
