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


<body class="body">
  <div id="clear_both"></div>
  
<div id="assignments1">

<h1>Add Username and Password</h1>

<form action='.' method='POST'>
	<input type='hidden' name='action' value='get_userpass'>
	Member ID<br />
	<input type='text' name='id'><br />
	<input type='submit' value='Get Member Info'><br />
	
	</form>

<hr>

<form action='.' method='POST'>
<input name='id' value='<?php echo $id ?>'>
            Enter Username <br/>
            <input type='text' name='username' value='<?php echo $username ?>'><br/>
            Enter Password<br/>
            <input type='password' name='password' value='<?php echo $password ?>'><br/>
           
            <input type='submit' name='action' value=''>
           <!--  <input type='submit' name='action' value='Update Member'> -->
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

            <?php
            include_once 'model.php';
            $members = get_all_members();
            foreach ($members as $index):
                ?>

                <tr>
                    <td><?php echo $index['id'] ?></td>
                    <td><?php echo $index['username'] ?></td>
                    <td><?php echo $index['password'] ?></td>
                  <!--   <td><?php echo $index['active'] ?></td> -->
                </tr>
            <?php endforeach; ?>
        </table>
    </div> 
</body>