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

    if(isset($_POST["book"]))
    {
     
    try 
    {
      $book = $_POST['book'];
      $chapter = $_POST['chapter'];
      $verse = $_POST['verse'];
      $content = $_POST['content'];
      $sql = $db->query('USE scriptures');
      $sql = $db->query("INSERT INTO scriptures (book, chapter, verse, content) VALUES ('$book', '$chapter', '$verse', '$content')");
    } 
    catch(PDOException $e) 
    {
      echo $e->getMessage();
    }

    try 
    {
      $id = $db->lastInsertId()
      $topic = $_POST['topic'];
      $sql = $db->query('USE scriptures');
      $sql = $db->query("INSERT INTO link (id, topic) VALUES ($id, $topic)";
    } 
    catch(PDOException $e) 
    {
      echo $e->getMessage();
    }


      //$statement = $db->exec("INSERT INTO scriptures (book, chapter, verse, content) VALUES (" . $_POST['book'] . ", " . $_POST['chapter'] . ", " . $_POST['verse'] . ", " . $_POST['content'] . ")");
      //$statement = $db->exec("INSERT INTO link (id, topic) VALUES (" . $db->lastInsertId() . ", " . $_POST['topic'] . ")");
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

  </br>
  <body>
    <h5>Scripture Resources</h5>


  <form action="databaseWrite.php" method="post">
    <p2>Book: <p2> <input type="text" name="book"><br/>
    <p2>Chapter: <p2> <input type="text" name="chapter"><br/>
    <p2>Verse: <p2> <input type="text" name="verse"><br/>
    <p2>Scripture: <p2> <input type="textarea" style="width: 300px; height: 150px;" name="content"><br/>
    <input type="submit" value="Submit"> <br/><br/>
    <?php
    $statement = $db->query('USE scriptures');
    $statement = $db->query('SELECT * FROM topic');
    while ($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
      echo '<input type="checkbox" name="topic" value="' . $row['name'] . '">' . $row['name'] . '<br/>';
    }
    ?>
  </form>
  <br/><br/><br/><br/><br/>


  <?php
    $statement = $db->query('USE scriptures');
    $statement = $db->query('SELECT * FROM scriptures');
    while ($row = $statement->fetch(PDO::FETCH_ASSOC))
    { 
       echo '<p2><b>' . $row['book'] . '</b> <b>';
       echo $row['chapter'] . '</b>:<b>';
       echo $row['verse'] . '</b> - "';
       echo $row['content'] . '"</br></br></p2>';
    }


    ?>
  </body>
</html>