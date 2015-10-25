<!DOCTYPE html>
<html lang = "en">
  <head>
    <title>Joshua Comish</title>
    <link rel="stylesheet" type="text/css" href="Jomish.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" charset="utf-8"/>
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
  </head>
    <header>
    </br>
    <h4><a href="index.html" onMouseOver="this.style.color='White'" onMouseOut="this.style.color='Orange'">Home</a> </h4>
    <h4><a href="assign032.html" onMouseOver="this.style.color='White'" onMouseOut="this.style.color='Orange'">Projects</a> </h4>
    <h4><a href="assignments.html" onMouseOver="this.style.color='White'" onMouseOut="this.style.color='Orange'">Assignments</a></h4>
    </br>
    </br>
  </header>

<br/><br/>
<body class="body">
  <div id="clear_both"></div>
  
<div id="assignments1">

<h5>Add Username and Password</h5>
<form action='index.php' method='POST'>
  <p2>Enter Username </p2><br/>
  <input type='text' name='username' value='<?php echo $username ?>'><br/>
  <p2>Enter Password</p2><br/>
  <input type='password' name='password' value='<?php echo $password ?>'><br/>
	<input type='submit' name='action' value='Add Member'>
</form>
</div>


<div id="admin_table">
<h1>Username and Passwords</h1>
        <table>
            <tr>
           		<td>ID</td>
                <td>Username</td> 
                <td>Password</td>
                <!-- <td>Active</td> -->
            </tr>
            <tr>
            <?php
            $statement = $db->query("USE members");
            $statement = $db->query("SELECT * FROM members");
              while ($row = $statement->fetch(PDO::FETCH_ASSOC))
              { 
              echo '<p2><td>';
              echo $row['id'];
              echo '</td><br /><td>';
              echo $row['username'];
              echo '</td><br /><td>';
              echo $row['password'];
              echo '</td></p2>';
              }
              ?>
                </tr>
        </table>
    </div> 
</body>