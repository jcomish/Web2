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

echo "<select name=\"rel\">"; 
echo "<option size =30 ></option>";
foreach ($rel as $value) {
    echo "<option selected='selected' value='" . $value['name'] . "'>" . $value['name'] . "</option>";
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


<html>
      <head>
        <!--Load the AJAX API-->
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">

          // Load the Visualization API and the piechart package.
          google.load('visualization', '1.0', {'packages':['corechart']});

          // Set a callback to run when the Google Visualization API is loaded.
          google.setOnLoadCallback(init);
          function init()
          {
            drawChart1();
            //drawChart2();
          }

          function drawChart1() 
          {

            // Create the data table.
var data2 = new google.visualization.DataTable();
      data2.addColumn('date', 'Time (In Hours)');
      data2.addColumn('number', 'Due Date');
      data2.addColumn('number', 'Progress');

      data2.addRows([
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



            // Set chart options
var options2 = {
        chart: {
          title: 'Rocket Boots',
          subtitle: 'Time remaining in hours'
        },
        width: 400,
        height: 300
      };
            // Set chart options


            // Instantiate and draw our chart, passing in some options.
            var chart2 = new google.visualization.LineChart(document.getElementById('chart_div2'));
            chart2.draw(data2, options2);

          }
          /*function drawChart2()
          {

var data3 = new google.visualization.DataTable();
      data3.addColumn('date', 'Time (In Hours)');
      data3.addColumn('number', 'Due Date');
      data3.addColumn('number', 'Progress');

      data3.addRows([
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

      var options3 = {
        chart: {
          title: 'Rocket Boots',
          subtitle: 'Time remaining in hours'
        },
        width: 400,
        height: 300
      };
                  var chart3 = new google.visualization.LineChart(document.getElementById('chart_div3'));
            chart3.draw(data3, options3);
          }*/
          
        </script>
      </head>

      <body>
        <!--Divs that will hold the charts-->
        <div id="chart_div2"></div>
        <div id="chart_div3"></div>
      </body>
    </html>




  