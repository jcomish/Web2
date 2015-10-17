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

 $rel = array();
 $milestones = array();
 $task = array();
//Get the data
$statement = $db->query("USE project");
$statement = $db->query("SELECT * FROM rel");
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
    { 
      $rel[] = $row;
    }

$statement = $db->query("SELECT * FROM milestone");
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
    { 
      $milestones[] = $row;
    }

  $statement = $db->query("SELECT * FROM task");
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
    { 
      $task[] = $row;
    }
?>


<html lang = "en">
  <head>
    <title>Joshua Comish</title>
    <link rel="stylesheet" type="text/css" href="Jomish.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" charset="utf-8"/>

    <!--Load the Ajax API-->
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
  <script type="text/javascript">
          // Load the Visualization API and the piechart package.
    google.load('visualization', '1.1', {packages: ['line']});
            // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('number', 'Time (In Hours)');
      data.addColumn('number', 'Due Date');
      data.addColumn('number', 'Progress');

      data.addRows([
        [1,  56, 80.8],
        [2,  52, 69.5],
        [3,  48,   57],
        [4,  44, 18.8],
        [5,  40, 17.6],
        [6,  36, 13.6],
        [7,  32, 12.3],
        [8,  28, 29.2],
        [9,  24, 42.9],
        [10, 20, 30.9],
        [11, 16,  7.9],
        [12, 12,  8.4],
        [13, 8,  6.3],
        [14, 0,  6.2]
      ]);

      var options = {
        chart: {
          title: 'Box Office Earnings in First Two Weeks of Opening',
          subtitle: 'in millions of dollars (USD)'
        },
        width: 900,
        height: 500
      };

      var chart = new google.charts.Line(document.getElementById('linechart_material'));

      chart.draw(data, options);
    }
  </script>






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
  </br>
  </br>

<!--this is the div that will hold the pie chart-->
  <div id="linechart_material"></div>
</body>


  