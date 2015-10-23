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

//Get the data
$statement = $db->query("USE project");
$statement = $db->query("SELECT * FROM rel");
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
    { 
      $rel[] = $row;
    }

$selRelease = -1;

//Dropdown menu
echo "<form action='burndownChart.php' method='post'>";
echo "</br></br><p2>Select Release:</p2></br>";
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
echo "</select>";


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


  <form action="write.php" method="post">
    
    <p2>Release: <p2> <input type="text" name="book"><br/>
    <p2>Chapter: <p2> <input type="text" name="chapter"><br/>
    <p2>Verse: <p2> <input type="text" name="verse"><br/>
    <p2>Scripture: <p2> <input type="textarea" style="width: 300px; height: 150px;" name="content"><br/>
    <input type="submit" value="Submit"> <br/><br/>
    <?php
    $statement = $db->query('USE scriptures');
    $statement = $db->query('SELECT * FROM topic');

    while ($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
      echo '<input type="checkbox" name="topic" value="' . $row['id'] . '">' . $row['topic'] . '<br/>';
    }
    ?>
  </form>

  </body>
</html>