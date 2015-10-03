<html>
<body>

Name: <?php echo $_POST["name"]; ?><br/>
Email Address: <?php echo $_POST["email"]; ?><br/>
Major: <?php echo $_POST["major"]; ?><br/>
Place Visited: 
<?php 
	if ($_POST["item1"] == 'on') 
	{
		echo "North America, ";
	}

	if ($_POST["item2"] == 'on')
	{
		echo "South America, ";
	}

	if ($_POST["item3"] == 'on')
	{
		echo "Europe, ";
	}

	if ($_POST["item4"] == 'on')
	{
		echo "Asia, ";
	}

	if ($_POST["item5"] == 'on')
	{
		echo "Austrailia, ";
	}

	if ($_POST["item6"] == 'on')
	{
		echo "Africa, ";
	}

	if ($_POST["item7"] == 'on')
	{
		echo "Antarctica.";
	}

?><br/>

Comments: <br/>
<?php echo $_POST["comments"]; ?>
<br/>

</body>
</html>