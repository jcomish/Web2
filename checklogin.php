<!DOCTYPE html>
<html lang = "en">
  <head>
    <title>Joshua Comish</title>
    <link rel="stylesheet" type="text/css" href="Jomish.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" charset="utf-8"/>

  </head>
        <?php
        define('DB_HOST', getenv('OPENSHIFT_MYSQL_DB_HOST'));
        define('DB_PORT',getenv('OPENSHIFT_MYSQL_DB_PORT'));
        define('DB_USER',getenv('OPENSHIFT_MYSQL_DB_USERNAME'));
        define('DB_PASS',getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));
        define('DB_NAME',getenv('OPENSHIFT_GEAR_NAME'));
      try
      {
        $dsn = 'mysql:dbname=members;host='.DB_HOST.';port='.DB_PORT;
        $db = new PDO($dsn, DB_USER, DB_PASS);
      }
      catch (PDOException $ex)
      {
        echo 'Error!: ' . $ex->getMessage();
        die();
      }
      ?>
    <header>
    </br>
    <h4><a href="index.html" onMouseOver="this.style.color='White'" onMouseOut="this.style.color='Orange'">Home</a> </h4>
    <h4><a href="assign032.html" onMouseOver="this.style.color='White'" onMouseOut="this.style.color='Orange'">Projects</a> </h4>
    <h4><a href="assignments.html" onMouseOver="this.style.color='White'" onMouseOut="this.style.color='Orange'">Assignments</a></h4>
    </br>
    </br>
  </header>
  <br/><br/>
<?php

// username and password sent from form
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];

$statement = $db->query("USE members");
$statement = $db->query("SELECT * FROM members");
$success = 0;
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
  { 
  $password = password_hash('$password', PASSWORD_DEFAULT);
	if($row ['username'] == $myusername && password_verify($mypassword, $row['password']) )
  {
  session_start();
  $_SESSION['user'] = $row['username'];
	echo "<p2> Login Successful!<br/> Welcome, " . $_SESSION['user'] . "<br/></p2>";
  $success = 1;
	}

  }
    if ($success != 1)
    {
    echo "<p2>Wrong Username or Password</p2>";
    header('Location: main_login.php');
  }

?>