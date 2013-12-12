<?php
session_start();
$email = $_SESSION['email'];
$mysqli= new mysqli("willy", "agendrea", "agendrea", "agendrea");
// for your reference (host,username,password,dbname);
if ($mysqli->connect_errno)
{
echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
//Sql connection

if(isset($_FILES['userFile']) && $_FILES['userFile']['size'] > 0)
//checks the user file and if the file exists and if it's size is greater then zero
{
//$fileName = $_FILES['file']['name'];
$tmpName  = $_FILES['userFile']['tmp_name'];//assigns the userfile and a tempory name to the file

$fp      = fopen($tmpName, 'r'); //opens the file in read mode it and assigns it to fp
$content = fread($fp, filesize($tmpName)); //opens the file and reads it and calls filesize on it to get the size
$content = addslashes($content); //calls addslashes on the content variable
fclose($fp); //closes the file


$sql = "INSERT INTO DIS_PHOTOS (PHOTO_NAME, PHOTO_DATE, PHOTO_DATA, USER_EMAIL) VALUES ('$tmpName', 'SYSDATE', '$content', '$email')";
//assigns an insert into that inserts the temp name, date, the image and email of the user that uploaded it 

if(!$mysqli->query($sql))
	{
		echo "Query Failed: (" . $mysqli->errno . ") " . $mysqli->error;
	}
else
	{
//executes the query and if it failed echos a fail message 
//otherwise it echos the database's tempory name and a success message

echo "<br>File $tmpName uploaded<br>";
	}
}
?> 
