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
        $dsn = 'mysql:dbname=project;host='.DB_HOST.';port='.DB_PORT;
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

  echo '<p2>';
  echo '<br />';
  echo $myusername;
  echo '<br />';
  echo password_hash('$mypassword', PASSWORD_DEFAULT);
  echo '</p2>';

$statement = $db->query("SELECT * FROM members");
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
  { 
  echo '<p2>';
  echo '<br />';
  echo $row['username'];
  echo '<br />';
  echo $row['password'];
  echo '</p2>';
  
  //password_verify($mypassword, $row['password'])
	if($row ['username'] == $myusername && $row ['password'] == $mypassword ){
// 	session_start();
	echo "<p2> Login Successful!<br/> Welcome, " . $row['username'] . "<br/></p2>";
	}
	else {
		echo "<p2>Wrong Username or Password</p2>";
    header('Location: main_login.php');
	}
  }

?>