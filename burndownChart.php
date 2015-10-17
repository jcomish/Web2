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

echo "<select name='release'></br></br></br></br>";
foreach ($rel as $value) {
    echo $value['name'];
    //echo "<option value='" . $value['name'] . "</option>";
}
echo "</select>";

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
      data.addColumn('date', 'Time (In Hours)');
      data.addColumn('number', 'Due Date');
      data.addColumn('number', 'Progress');

      data.addRows([
        [new Date(2015, 10, 16),  56, 55],
        [new Date(2015, 10, 17),  52, 53],
        [new Date(2015, 10, 18),  48, 51],
        [new Date(2015, 10, 19),  44, 49],
        [new Date(2015, 10, 20),  40, 42],
        [new Date(2015, 10, 21),  36, 36],
        [new Date(2015, 10, 22),  32, 31],
        [new Date(2015, 10, 23),  28, 25],
        [new Date(2015, 10, 24),  24, 20],
        [new Date(2015, 10, 25), 20, 15],
        [new Date(2015, 10, 26), 16,  11],
        [new Date(2015, 10, 27), 12,  6],
        [new Date(2015, 10, 28), 8,  2],
        [new Date(2015, 10, 29), 0,  0]
      ]);

      var options = {
        chart: {
          title: 'Rocket Boots',
          subtitle: 'Time remaining in hours'
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


  