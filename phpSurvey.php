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
  <body>
  	<br/>
  	<br/>
    <?php
    if (isset($_POST["food"]) && isset($_POST["color"]) && isset($_POST["animal"]) && isset($_POST["cake"]))
    {
    	$_SESSION["visited"] = "true";
    	
	    $Q1 = $_POST["food"];
	    $Q2 = $_POST["color"];
	    $Q3 = $_POST["animal"];
	    $Q4 = $_POST["cake"];

		$env = getenv("OPENSHIFT_DATA_DIR");

		$myfile = fopen($env . "results.txt", "r") or die("Unable to open file!");
		$data = fgets($myfile);

		$numbers = explode(" ", $data);
		foreach ($data as &$number)
		{
		    $number = intval($number);
		}
		fclose($myfile);

	    //Question 1
	    if ($Q1 == "Burritos")
	    {
	    	++$numbers[0];
	    }
	    elseif($Q1 == "Bagels")
	    {
	    	++$numbers[1];
	    }
	    elseif($Q1 == "Steak")
	    {
	    	++$numbers[2];
	    }
	    elseif($Q1 == "Pizza")
	    {
	    	++$numbers[3];
	    }

	    //Question 2
	    if ($Q2 == "Red")
	    {
	    	++$numbers[4];
	    }
	    elseif($Q2 == "Blue")
	    {
	    	++$numbers[5];
	    }
	    elseif($Q2 == "Green")
	    {
	    	++$numbers[6];
	    }
	    elseif($Q2 == "Moave")
	    {
	    	++$numbers[7];
	    }

	    //Question 3
	    if ($Q3 == "Bears")
	    {
	    	++$numbers[8];
	    }
	    elseif($Q3 == "Cats")
	    {
	    	++$numbers[9];
	    }
	    elseif($Q3 == "Bear Cats")
	    {
	    	++$numbers[10];
	    }
	    elseif($Q3 == "Snakes")
	    {
	    	++$numbers[11];
	    }

	    //Question 4
	    if ($Q4 == "yes")
	    {
	    	++$numbers[12];
	    }
	    elseif($Q4 == "no")
	    {
	    	++$numbers[13];
	    }

		$_fp = fopen($env . "results.txt", "w");
		foreach ($numbers as $number) {
		    fwrite($_fp, $number . " ");
		}
		fclose($_fp);
	}
	else
	{
		$env = getenv("OPENSHIFT_DATA_DIR");

		$myfile = fopen($env . "results.txt", "r") or die("Unable to open file!");
		$data = fgets($myfile);

		$numbers = explode(" ", $data);
		foreach ($data as &$number)
		{
		    $number = intval($number);
		}
		fclose($myfile);
	}

	echo "<h5>Question 1 Results</h5>";
	echo "<p2>Burritos:  " . $numbers[0] . "</p2><br/>";
	echo "<p2>Bagels:  " . $numbers[1] . "</p2><br/>";
	echo "<p2>Steak:  " . $numbers[2] . "</p2><br/>";
	echo "<p2>Pizza:  " . $numbers[3] . "</p2><br/><br/><br/>";

	echo "<h5>Question 2 Results</h5>";
	echo "<p2>Red:  " . $numbers[4] . "</p2><br/>";
	echo "<p2>Blue:  " . $numbers[5] . "</p2><br/>";
	echo "<p2>Green:  " . $numbers[6] . "</p2><br/>";
	echo "<p2>Moave:  " . $numbers[7] . "</p2><br/><br/><br/>";

	echo "<h5>Question 3 Results</h5>";
	echo "<p2>Bears:  " . $numbers[8] . "</p2><br/>";
	echo "<p2>Cats:  " . $numbers[9] . "</p2><br/>";
	echo "<p2>Bear Cats:  " . $numbers[10] . "</p2><br/>";
	echo "<p2>Snakes:  " . $numbers[11] . "</p2><br/><br/><br/>";

	echo "<h5>Question 4 Results</h5>";
	echo "<p2>Yes!:  " . $numbers[12] . "</p2><br/>";
	echo "<p2>No...:  " . $numbers[13] . "</p2><br/><br/><br/>";
    
    if ($_SESSION["visited"] != "true")
    {
    echo '<h5><a href="phpSurvey1.php">Go Back</a></h5>';
	}

	?>
</body>

</html>