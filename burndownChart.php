<!DOCTYPE html>
<html lang = "en">
  <head>
    <title>Joshua Comish</title>
    <link rel="stylesheet" type="text/css" href="Jomish.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" charset="utf-8"/>
  </head>

  <header>
    </br>
    <h4><a href="index.html" onMouseOver="this.style.color='White'" onMouseOut="this.style.color='Orange'">Home</a> </h4>
    <h4><a href="assign032.html" onMouseOver="this.style.color='White'" onMouseOut="this.style.color='Orange'">Projects</a> </h4>
    <h4><a href="assignments.html" onMouseOver="this.style.color='White'" onMouseOut="this.style.color='Orange'">Assignments</a></h4>
    </br>
    </br>
    </br>
    </br>
  </header>

<?php
 define('DB_HOST', getenv('OPENSHIFT_MYSQL_DB_HOST'));
      define('DB_PORT',getenv('OPENSHIFT_MYSQL_DB_PORT'));
      define('DB_USER',getenv('OPENSHIFT_MYSQL_DB_USERNAME'));
      define('DB_PASS',getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));
      define('DB_NAME',getenv('OPENSHIFT_GEAR_NAME'));
      try
      {
        $dsn = 'mysql:dbname=scriptures;host='.DB_HOST.';port='.DB_PORT;
        $db = new PDO($dsn, DB_USER, DB_PASS);
      }
      catch (PDOException $ex)
      {
        echo 'Error!: ' . $ex->getMessage();
        die();
      }

//Get the data
$statement = $db->query("USE project");
$statement = $db->query("SELECT * FROM rel");
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
    { 
       echo '<p2>' . $row['rel_id'];
       echo $row['name'];
       echo $row['due_date'] . '</br></br></p2>';
    }

$statement = $db->query("SELECT * FROM milestone");
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
    { 
       echo '<p2>' . $row['milestone_id'];
       echo $row['name'];
       echo $row['due_date'];
       echo $row['rel'];
       echo $row['visibile'] . '</br></br></p2>';
    }

  $statement = $db->query("SELECT * FROM task");
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
    { 
       echo '<p2>' . $row['task_id'];
       echo $row['name'];
       echo $row['milestone'];
       echo $row['date_completed'];
       echo $row['time'];
       echo $row['status'] . '</br></br></p2>';
    }
?>



  