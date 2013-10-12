<?php

// CLIENT INFORMATION

$fname = htmlspecialchars(trim($_POST['fname']));
$lname = htmlspecialchars(trim($_POST['lname']));
$email = htmlspecialchars(trim($_POST['email']));
$password = htmlspecialchars(trim($_POST['password']));
$dob = htmlspecialchars(trim($_POST['dob']));

////////////////////////////////////////////////////////////////////////////////////////////////


$mysqli= new mysqli("willy", "agendrea", "agendrea", "agendrea");
// for your reference (host,username,password,dbname);
if ($mysqli->connect_errno)
{
echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


//INSERT INTO tbl_students (FirstName, LastName, Grade) VALUES( '$fname', '$lname', '$grade')"
$sql= "INSERT INTO DIS_USER_PROFILE(USER_FNAME, USER_LNAME, USER_BIRTHDATE, USER_EMAIL, USER_PASSWORD) VALUES('$fname', '$lname', '$dob', '$email', '$password' );";

if(!$mysqli->query($sql))
{
echo"Welcome!";
echo "Query Failed: (" . $mysqli->errno . ") " . $mysqli->error;
echo "Welcome to Disbook!!";
}
else {
echo "Welcome to Disbook!!!";
}






?>
