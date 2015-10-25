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

<?php

include 'model.php';
if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
}


switch ($action) {

    
   case 'get_userpass' :
        $userpass = get_userpass($_POST['id']);
        if ($userpass) {
            $id = $userpass['id'];
            $username = $userpass['username'];
            $password= $userpass['password'];
            //$active = $ym_info['active'];
            include 'userpass_admin_view.php';
        } else {
            $message = 'There was a retrival error to members database.';
            include 'userpass_admin_view.php';
        }
        break;
        
    case 'Update Member' :
        $id = $_POST['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];
      //   $active = $_POST['active'];
        $result = update_userpass($id, $username, $password);
        if ($result) {
            $message = 'Update Member Successful';
            include 'userpass_admin_view.php';
        } else {
            $message = 'There was an update error.';
            include 'usernpass_admin_view.php';
        }

        break;
        
    case 'Add Member' :
        $username = $_POST['username'];
        $password = $_POST['password'];
        $result = add_member($username, $password);
        if ($result) {
            $message = '<br/><br/>Add Member Successful';
            include 'userpass_admin_view.php';
        } else {
            $message = '<br/><br/>There was an error adding the member.';
            include 'userpass_admin_view.php';
        }

        break;

  default:
        $members = get_all_members();
        include 'userpass_admin_view.php';
}











   

?>