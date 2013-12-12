<?php

if(!$_POST['FName'] | !$_POST['LName'] | !$_POST['RegEmail'] | !$_POST['password'] | !$_POST['birthday']) 
{
	echo('You did not fill in a required field!.');
	header('location: index.html');
} 
// CLIENT INFORMATION and pointer back to index.html

$fname = htmlspecialchars(trim($_POST['FName'])); //strips special characters and assigns the first name
$lname = htmlspecialchars(trim($_POST['LName'])); //strips special characters and assigns the last name
$email = htmlspecialchars(trim($_POST['RegEmail']));//strips special characters and assigns the email address
$password = htmlspecialchars(trim($_POST['password']));//strips special characters and assigns the password
$dob = htmlspecialchars(trim($_POST['birthday']));//strips special characters and assigns the birthday

////////////////////////////////////////////////////////////////////////////////////////////////


$mysqli= new mysqli("willy", "agendrea", "agendrea", "agendrea");
// for your reference (host,username,password,dbname);
if ($mysqli->connect_errno)
{
echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
//sql connnection

//INSERT INTO tbl_students (FirstName, LastName, Grade) VALUES( '$fname', '$lname', '$grade')"
$sql= "INSERT INTO DIS_USER_PROFILE(USER_FNAME, USER_LNAME, USER_BIRTHDATE, USER_EMAIL, USER_PASSWORD) VALUES('$fname', '$lname', '$dob', '$email', '$password' );";


if(!$mysqli->query($sql))
{

echo "Query Failed: (" . $mysqli->errno . ") " . $mysqli->error;
}
//error if it failed




?>
