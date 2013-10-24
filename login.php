<?php
echo  "{".$_POST['Emaillogin']."}";
echo  "{".$_POST['password']."}";

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

$check = $mysqli->query("SELECT * FROM DIS_USER_PROFILE WHERE USER_EMAIL = '".$_POST['Emaillogin']."'")or die(mysql_error());

//$check2 = mysql_num_rows($check);

//if ($check2 == 0) 
//{
//	echo('That user does not exist in our database.')
//}


?>
