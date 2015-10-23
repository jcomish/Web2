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
  $dsn = 'mysql:dbname=scriptures;host='.DB_HOST.';port='.DB_PORT;
  $db = new PDO($dsn, DB_USER, DB_PASS);
 }
 catch (PDOException $ex)
 {
  echo 'Error!: ' . $ex->getMessage();
  die();
 }

 $rel = array();
 $milestones = array();
 $task = array();

 $relTime = array();
 $milestoneTime = array();


echo "<form action='burndownChart.php' method='post'>";
echo "<p2>Release: <p2> <input type='text' name='release'><br/>";
echo "<p2>Due Date: <p2> <input type='text' name='release_due_date'><br/>";


//Get the data
$statement = $db->query("USE project");
$statement = $db->query("SELECT * FROM milestone");
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
    { 
      $milestone[] = $row;
    }

$milestoneRelease = -1;

echo "</br></br><p2>Milestone:</p2></br>";
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
  echo '<input type="checkbox" name="milestones" value="' . $row['milestone_id'] . '">' . $row['name'] . '<br/>';
}
/*echo "<select name='milestone' id='milestone'>"; 
echo "<option size =30 ></option>";
$i = 0;
foreach ($milestone as $value) {
  if ($milestoneRelease == -1 && $i == 0)
  {
    echo "<option selected='selected' value='" . $value['milestone_id'] . "'>" . $value['name'] . "</option>";

  }
  else 
  {
    echo "<option value='" . $value['milestone_id'] . "'>" . $value['name'] . "</option>";
  }*/
}

echo "<p2>Milestone: <p2> <input type='text' name='release'><br/>";
echo "<p2>Due Date: <p2> <input type='text' name='release_due_date'><br/>";

//Get the data
$statement = $db->query("USE project");
$statement = $db->query("SELECT * FROM rel");
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
    { 
      $rel[] = $row;
    }

$selRelease = -1;

//Dropdown menu

/*echo "</br></br><p2>Select Release:</p2></br>";
echo "<select name='rel' id='release'>"; 
echo "<option size =30 ></option>";
$i = 0;
foreach ($rel as $value) {
  if ($selRelease == -1 && $i == 0)
  {
    echo "<option selected='selected' value='" . $value['rel_id'] . "'>" . $value['name'] . "</option>";

  }
  else 
  {
    echo "<option value='" . $value['rel_id'] . "'>" . $value['name'] . "</option>";
  }
}
echo "</select>";*/

echo "<input type='submit' value='View'>";
echo "</form>";
echo "<a href='write.php'>Modify Database</a>";
?>








  <header>
    </br>
    <h4><a href="index.html" onMouseOver="this.style.color='White'" onMouseOut="this.style.color='Orange'">Home</a> </h4>
    <h4><a href="assign032.html" onMouseOver="this.style.color='White'" onMouseOut="this.style.color='Orange'">Projects</a> </h4>
    <h4><a href="assignments.html" onMouseOver="this.style.color='White'" onMouseOut="this.style.color='Orange'">Assignments</a></h4>
    </br>
    </br>
  </header>

  </br>
  <body>
    <h5>Scripture Resources</h5>




  </body>
</html>