<html>
<body>

Name: <?php echo $_POST["name"]; ?><br/>
Email Address: <?php echo $_POST["email"]; ?><br/>
Major: <?php echo $_POST["major"]; ?><br/>
Place Visited: <?php if ($_POST["item1"] == 'on') echo North America?> 
			   <?php echo $_POST["item2"]; ?> 
			   <?php echo $_POST["item3"]; ?> 
			   <?php echo $_POST["item4"]; ?> 
			   <?php echo $_POST["item5"]; ?> 
			   <?php echo $_POST["item6"]; ?> 
			   <?php echo $_POST["item7"]; ?><br/>
Comments: <?php echo $_POST["comments"]; ?><br/>

</body>
</html>