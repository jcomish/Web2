
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

//$con=mysql_connect("localhost","Username","Password") or die("Failed to connect with database!!!!");
//mysql_select_db("Database Name", $con); 
// The Chart table contains two fields: weekly_task and percentage
// This example will display a pie chart. If you need other charts such as a Bar chart, you will need to modify the code a little to make it work with bar chart and other charts
$statement = $db->query("USE project");
$statement = echo $sth->query("SELECT * FROM rel")
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
    { 
       echo '<p2><b>' . $row['rel_id'] . '</b> <b>';
       echo $row['name'] . '</b>:<b>';
       echo $row['due_date'] . '</b> </br></br></p2>';
    }

/*
---------------------------
example data: Table (Chart)
--------------------------
weekly_task     percentage
Sleep           30
Watching Movie  40
work            44
*/

$rows = array();
//flag is not needed
$flag = true;
$table = array();
$table['cols'] = array(

    // Labels for your chart, these represent the column titles
    // Note that one column is in "string" format and another one is in "number" format as pie chart only required "numbers" for calculating percentage and string will be used for column title
    array('label' => 'Weekly Task', 'type' => 'string'),
    array('label' => 'Percentage', 'type' => 'number')

);
 
?>

<html>
  <head>
    <!--Load the Ajax API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript">

    // Load the Visualization API and the piechart package.
    google.load('visualization', '1', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);

    function drawChart() {

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(<?=$jsonTable?>);
      var options = {
           title: 'My Weekly Plan',
          is3D: 'true',
          width: 800,
          height: 600
        };
      // Instantiate and draw our chart, passing in some options.
      // Do not forget to check your div ID
      var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
    </script>
  </head>

  <body>
    <!--this is the div that will hold the pie chart-->
    <div id="chart_div"></div>
  </body>
</html>
  