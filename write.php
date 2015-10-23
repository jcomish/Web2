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

 if(isset($_POST["release"]))
 {
   try 
      {
        $release = $_POST['release'];
        $release_due_date = $_POST['release_due_date'];
        $sql = $db->query('USE project');
        $sql = $db->query("INSERT INTO rel (name, due_date) VALUES ('$release', '$release_due_date')");
        echo "</br><br><p2>Successfully added " . $release . "<p2/><br/>";
      } 
      catch(PDOException $e) 
      {
        echo $e->getMessage();
      }
  }
  else
  {
    echo "<br/><br/>";
  }

 if(isset($_POST["milestone"]))
 {
   try 
      {
        $milestone = $_POST['milestone'];
        $milestone_due_date = $_POST['milestone_due_date'];
        $rel = $_POST['rel'];
        $sql = $db->query('USE project');
        $sql = $db->query("INSERT INTO milestone (name, due_date, rel) VALUES ('$milestone', '$milestone_due_date', '$rel')");
        echo "</br><br><p2>Successfully added " . $milestone . "<p2/><br/>";
      } 
      catch(PDOException $e) 
      {
        echo $e->getMessage();
      }
  }
  else
  {
    echo "<br/><br/>";
  }




 //DISPLAY FORMS
 $rel = array();
 $milestones = array();
 $task = array();

 $relTime = array();
 $milestoneTime = array();

//Create Release
echo "<br/><br/><form action='write.php' method='post'>";
echo "<h5>New Release</h5>";
echo "<p2>Release Name: <p2> <input type='text' name='release'><br/>";
echo "<p2>Due Date: <p2> <input type='text' placeholder='YYYY-MM-DD' name='release_due_date'><br/><br/>";
echo "<br/><input type='submit' value='Create'>";
echo "</form><br/><br/><br/>";



//Create Milestone
echo "<br/><br/><form action='write.php' method='post'>";
echo "<h5>New Milestone</h5>";
echo "<p2>Milestone Name: <p2> <input type='text' name='milestone'><br/>";
echo "<p2>Due Date: <p2> <input type='text' placeholder='YYYY-MM-DD' name='milestone_due_date'><br/><br/>";
echo "<p2>Release:<p2/>";

//Create Release
$statement = $db->query("USE project");
$statement = $db->query("SELECT * FROM rel");
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
    { 
      $rel[] = $row;
    }

$selRelease = -1;
$i = 0;
echo "<select name='rel' id='release'>"; 
echo "<option size =30 ></option>";
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
echo "<br/><br/><input type='submit' value='Create'>";
echo "</form>";
echo "<br/><br/><br/><h5><a href='burndownChart.php'>Return to Summary</a></h5>";

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
  </body>
</html>