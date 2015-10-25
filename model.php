<!DOCTYPE html>
<html lang = "en">
  <head>
    <title>Joshua Comish</title>
    <link rel="stylesheet" type="text/css" href="Jomish.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" charset="utf-8"/>
      <?php

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


<?php

function get_all_members() {
    global $db;
    try {
        $query = 'SELECT * FROM members';
        $stmt = $db->prepare($query);
        $stmt->execute();
        $members = $stmt->fetchAll();
        $stmt->closeCursor();
        return $members;
    } catch (Exception $ex) {
        return FALSE;
    }
}

function get_userpass($id) {
    global $db;
    try {
        $query = 'SELECT * FROM members WHERE id=:id';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $members = $stmt->fetch();
        $stmt->closeCursor();
        return $members;
    } catch (Exception $ex) {
        return FALSE;
    }
}

function update_userpass($id, $username, $password) {
    global $db;
    try {
        $query = 'UPDATE members SET username=:username,'
                . 'password:password WHERE id=:id';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':password', $password);
//         $stmt->bindValue(':active', $active);
        $stmt->execute();
        $stmt->closeCursor();
        return TRUE;
    } catch (Exception $ex) {
        return FALSE;
    }
}

function add_member($username, $password) {
        try {
        define('DB_HOST', getenv('OPENSHIFT_MYSQL_DB_HOST'));
        define('DB_PORT',getenv('OPENSHIFT_MYSQL_DB_PORT'));
        define('DB_USER',getenv('OPENSHIFT_MYSQL_DB_USERNAME'));
        define('DB_PASS',getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));
        define('DB_NAME',getenv('OPENSHIFT_GEAR_NAME'));
      try
      {
        $dsn = 'mysql:dbname=members;host='.DB_HOST.';port='.DB_PORT;
        $db = new PDO($dsn, DB_USER, DB_PASS);
      }
      catch (PDOException $ex)
      {
        echo 'Error!: ' . $ex->getMessage();
        die();
      }
    	echo password_hash($password, PASSWORD_DEFAULT);
        //echo $password;
        $query = $db->query("USE members");
//echo password_hash("rasmuslerdorf", PASSWORD_BCRYPT);
        $query = $db->query("INSERT INTO members (username, password) VALUES ('$username', '$password')");
        //$stmt = $db->prepare($query);
        //$stmt->bindValue(':username', $username);
        //$stmt->bindValue(':password', $password);
        //$stmt->execute();
        //$stmt->closeCursor();
        return TRUE;
    } catch (Exception $ex) {
        return FALSE;
    }
}