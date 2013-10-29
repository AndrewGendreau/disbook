<?php
//echo  "{".$_POST['Emaillogin']."}";
//echo  "{".$_POST['password']."}";

$mysqli= new mysqli("willy", "agendrea", "agendrea", "agendrea");
// for your reference (host,username,password,dbname);
if ($mysqli->connect_errno)
{
echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}




 // makes sure they filled it in

if(!$_POST['Emaillogin'] | !$_POST['password']) 
{
	echo('You did not fill in a required field.');
}
//Check with password
$check = $mysqli->query("SELECT USER_FNAME,USER_LNAME FROM DIS_USER_PROFILE WHERE USER_EMAIL = '".$_POST['Emaillogin']."' AND USER_PASSWORD = '".$_POST['password']."'")or die(mysql_error());

//check with no password
//$check = $mysqli->query("SELECT USER_FNAME,USER_LNAME FROM DIS_USER_PROFILE WHERE USER_EMAIL = '".$_POST['Emaillogin']."'")or die(mysql_error());

//Fetches rows into an array and echos the 0th and 1st element in the array called row
$row = $check->fetch_row();
echo "[".$row[0]."]";
echo "[".$row[1]."]";

//holds the row count
$rowCount= $check->num_rows;

//checks if the row count is 0 if it is echos user does not exist then destroys the session
if ($rowCount > 0)
{
	session_start();
} 
else
{
	echo('That user does not exist in our database.');
}


?>
