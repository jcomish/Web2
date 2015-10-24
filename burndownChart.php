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

 $rel = array();
 $milestones = array();
 $task = array();

 $relTime = array();
 $milestoneTime = array();

//Get the data
$statement = $db->query("USE project");
$statement = $db->query("SELECT * FROM rel");
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
    { 
      $rel[] = $row;
    }

$selRelease = -1;

//Dropdown menu
echo "<form action='burndownChart.php' method='post'>";
echo "</br></br><p2>Select Release:</p2></br>";
echo "<select name='rel' id='release'>"; 
echo "<option size =30 ></option>";
$i = 0;
foreach ($rel as $value) 
{
  if ($selRelease == -1 && $i == 0)
  {
    echo "<option selected='selected' value='" . $value['rel_id'] . "'>" . $value['name'] . "</option>";
  }
  else 
  {
    echo "<option value='" . $value['rel_id'] . "'>" . $value['name'] . "</option>";
  }
}
echo "</select>";
echo "<input type='submit' value='View'>";
echo "</form>";
echo "<h5><a href='write.php'>Modify Database</a></h5>";


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

$i = 0;
$JSON[] = array();
foreach($milestones as $value)
{
  
  $selRelease = $_POST["rel"];
  if ($value['rel'] == $selRelease)
  {
    $ETC = 0;
    echo "<h6>" . $value['name'] . "</h6>";
    echo "<table border='1'><tr><td>Task</td><td>Estimated Time</td><td>Status</td></tr>";

    foreach($task as $value1)
    {
      $JSON[] = array('date' => $value1['date_completed'], $value1['task_id'], $value1['status'], $value1['time']);
      if ($value1['milestone'] == $value['milestone_id'])
      {
        if (!isset($value1['status']))
        {
          $ETC += $value1['time'];
        }
        echo "<tr><td>" . $value1['name'] . "</td><td>" . $value1['time'] . "</td><td>";
        if (isset($value1['status']))
        {
         if ($value1['status'] == 1)
         {
            echo "<p3>Passed</p3>";
         }
         else
         {
            echo "<p4>Failed</p4>";
         }
       }
        echo "</td></tr>";
      }
    }
    echo "</table></br><p3>Time Remaining: " . $ETC . "</p3><br/><br/></br></br>";

  }
}
      $data = json_encode($JSON);
?>


<html>
 <head>
  <title>Joshua Comish</title>
    <link rel="stylesheet" type="text/css" href="Jomish.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" charset="utf-8"/>
  <!--Load the AJAX API-->
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script type="text/javascript">

  // Load the Visualization API and the piechart package.
  google.load('visualization', '1.0', {'packages':['corechart']});
  // Set a callback to run when the Google Visualization API is loaded.
  google.setOnLoadCallback(drawChart);

    function drawChart() 
    {
      var json_parsed = JSON.parse(<?php echo $data; ?>);
      var items = json_parsed.Items;
      //var json = JSON.stringify(<?php echo $data; ?>);
      //var json = <?php echo $data; ?>
      //window.alert(JSON.stringify(<?php $data ?>);

    for (var i = 0; i < items.length; ++i) 
    {
    console.log("Item #" + i);
    for (var name in items[i]) 
    {
        console.log(name + "=" + items[i][name]);
    }


}
      // Create the data table.
      var data2 = new google.visualization.DataTable();
      data2.addColumn('date', 'Time (In Hours)');
      data2.addColumn('number', 'Due Date');
      data2.addColumn('number', 'Progress');

      /*while (JSON.parse(json))
      {
        alert(json["name"]);
      }*/

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
        width: 900,
        height: 700
      };
            // Set chart options


            // Instantiate and draw our chart, passing in some options.
      var chart2 = new google.visualization.LineChart(document.getElementById('chart_div2'));
      chart2.draw(data2, options2);

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
        <div id='chart_div2'></div>
        <!--Divs that will hold the charts-->
      </body>
    </html>




  