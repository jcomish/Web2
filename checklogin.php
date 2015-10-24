<?php



require '../inc/connect.php';

$db = dbConnect();



// username and password sent from form
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];


// To protect MySQL injection (more detail about MySQL injection)
// $myusername = stripslashes($myusername);
// $mypassword = stripslashes($mypassword);



$myusername = ('SELECT * FROM members WHERE username=:username');
$mypassword = ('SELECT * FROM members WHERE password=:password');


$sql="SELECT * FROM members WHERE username='$myusername' and password='$mypassword'";
$result=($sql);

// Mysql_num_row is counting table row
$count=($result);

// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
session_register("myusername");
session_register("mypassword");
header("location:login_success.php");
}
else {
echo "Wrong Username or Password";
}
?>