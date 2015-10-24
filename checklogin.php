<?php



require '../inc/connect.php';

$db = dbConnect();



// username and password sent from form
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];

// COME BACK TO CODE LATER
// To protect MySQL injection (more detail about MySQL injection)
// $myusername = stripslashes($myusername);
// $mypassword = stripslashes($mypassword);
// $userpass_compare = compare_user_pass(['myusername, mypassword']);
// if ($myusername = 
// $myusername = ('SELECT * FROM members WHERE username=:username');
// $mypassword = ('SELECT * FROM members WHERE password=:password');

$statement = $db->query("SELECT * FROM members");
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
  { 
  echo '<br />';
  echo $row['username'];
  echo '<br />';
  echo $row['password'];
  
	if($row ['username'] == $myusername && password_verify($mypassword, $row['password'])){
// 	session_start();
	include 'login_success.php';
	}
	else {
		echo "Wrong Username or Password";
	}
  }
  echo '<br />';
  echo $myusername;
  echo '<br />';
  echo password_hash('$mypassword', PASSWORD_DEFAULT);
  



// $sql="SELECT * FROM members WHERE username='$myusername' and password='$mypassword'";
// $result=($sql);
// 
// // Mysql_num_row is counting table row
// $count=($result);
// 
// // If result matched $myusername and $mypassword, table row must be 1 row
// 
// if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"

?>