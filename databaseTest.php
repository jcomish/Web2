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
  </header>

  </br>
  <body>
    <?php
    //try
    //{
      $user = 'admin1l6TpZ1'
      $password = 's6ydBVys-qPm'; 
      $db = new PDO('mysql:host=https://php-jcomish.rhcloud.com/phpmyadmin;dbname=php', $user, $password);
    //}
    //catch (PDOException $ex) 
    //{
    //  echo 'Error!: ' . $ex->getMessage();
    //  die(); 
    //}
    ?>
  </body>
</html>