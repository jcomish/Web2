<?php
session_start();
?>
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
  <br/>
  <br/>
  <br/>
  <br/>
  <?php
    if ($_SESSION["visited"] == "true")
    {
    	header('Location: http://php-jcomish.rhcloud.com/phpSurvey.php');
    }
  ?>
  <form action="phpSurvey.php" method="post">
    <div>
        
        <p2>Question 1: What is your favorite Food?</p2><br/>
          <input type="radio" name="food" value="Burritos"><p2>Burritos</p2><br/>
          <input type="radio" name="food" value="Bagels"><p2>Bagels</p2><br/>
          <input type="radio" name="food" value="Steak"><p2>Steak</p2><br/>
          <input type="radio" name="food" value="Pizza"><p2>Pizza</p2><br/>
        <br/>
        <br/>
        <p2>Question 2: What is your favorite Color?</p2><br/>
          <input type="radio" name="color" value="Red"><p2>Red</p2><br/>
          <input type="radio" name="color" value="Blue"><p2>Blue</p2><br/>
          <input type="radio" name="color" value="Green"><p2>Green</p2><br/>
          <input type="radio" name="color" value="Moave"><p2>Moave</p2><br/>
        <br/>
        <br/>
        <p2>Question 3: What is your favorite Animal?</p2><br/>
          <input type="radio" name="animal" value="Bears"><p2>Bears</p2><br/>
          <input type="radio" name="animal" value="Cats"><p2>Cats</p2><br/>
          <input type="radio" name="animal" value="Bear Cats"><p2>Bear Cats</p2><br/>
          <input type="radio" name="animal" value="Snakes"><p2>Snakes</p2><br/>
        <br/>
        <br/>
        <p2>Question 4: Is the cake real?</p2><br/>
          <input type="radio" name="cake" value="yes"><p2>Yes!</p2><br/>
          <input type="radio" name="cake" value="no"><p2>No...</p2><br/>
        <br/>
        <br/>
          <input type="submit" name="submit" value="Submit" />
          <input type="reset" value="Reset" />    
          
    </div>

<h5><a href="phpSurvey.php" onMouseOver="this.style.color='White'" onMouseOut="this.style.color='Orange'">See Results!</a></h5>


</html>

