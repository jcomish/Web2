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
    <p>Scripture Resources!</p>
    <?php
    error_reporting(E_ALL | E_STRICT);
    ini_set('display_errors',1);
    ini_set('html_errors', 1);
    try
    {
      $user = 'jcomish'
      $password = 'myphpsql'; 
      $db = new PDO('mysql:host=127.3.118.2;dbname=scriptures', $user, $password);
      $sth->execute();
    }
    catch (PDOException $ex) 
    {
      echo 'Error!: ' . $ex->getMessage();
      die(); 
    }

    $statement = $db->query('SELECT * FROM scriptures');
    while ($row = $statement->fetch(PDO::FETCH_ASSOC))
    { 
       echo '<b>' . $row['book'] . '</b> <b>'  . $row['chapter'] . '</b>:<b>' . $row['verse'] . '</b> - "<b>' . $row['content'] . '"<br />';
    }


    ?>
  </body>
</html>