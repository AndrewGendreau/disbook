<?php
session_start();
//echo  "{".$_POST['Emaillogin']."}";
//echo  "{".$_POST['password']."}";
$email = $_POST['Emaillogin'];
$password = $_POST['password'];
echo $password;
$mysqli= new mysqli("willy", "agendrea", "agendrea", "agendrea");
// for your reference (host,username,password,dbname);
if ($mysqli->connect_errno)
{
echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
//Sql connection


 // makes sure they filled it in

//if(!$_POST['Emaillogin'] | !$_POST['password']) 
//{
//	echo('You did not fill in a required field.');
//}

//Check password
$check = $mysqli->query("SELECT USER_FNAME,USER_LNAME FROM DIS_USER_PROFILE WHERE USER_EMAIL = '".$_POST['Emaillogin']."' AND USER_PASSWORD = '".$_POST['password']."'")or die(mysql_error());
echo $check->num_rows;

//Fetches rows into an array and echos the 0th and 1st element in the array called row
$row = $check->fetch_row();


//holds the row count
$rowCount= $check->num_rows;

//checks if the row count is 0 if it is echos user does not exist then it echos don't exist
if ($rowCount > 0)
{
	$_SESSION['email'] = $_POST['Emaillogin'];
	header('location: loginpage.php');
} 
else
{
	echo('That user does not exist in our database.');
}
?>
