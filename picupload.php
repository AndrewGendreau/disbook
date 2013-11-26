<?php
session_start();
$mysqli= new mysqli("willy", "agendrea", "agendrea", "agendrea");
// for your reference (host,username,password,dbname);
if ($mysqli->connect_errno)
{
echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo "test";

if(isset($_FILES['userFile']) && $_FILES['userFile']['size'] > 0)
{
echo "hi";
//$fileName = $_FILES['file']['name'];
$tmpName  = $_FILES['userFile']['tmp_name'];
echo $tmpName;
//$fileSize = $_FILES['file']['size'];
//$fileType = $_FILES['file']['type'];

$fp      = fopen($tmpName, 'r');
$content = fread($fp, filesize($tmpName));
$content = addslashes($content);
fclose($fp);

//if(!get_magic_quotes_gpc())
//{
  //  $fileName = addslashes($fileName);
//}

//include 'library/config.php';
//include 'library/opendb.php';
//The problem is the query
$query = "INSERT INTO DIS_PHOTOS (PHOTO_NAME, PHOTO_DATE, PHOTO_DATA, USER_EMAIL) ".
"VALUES ('$tmpName', 'SYSDATE', '$content', $_SESSION['EMAIL'])";


mysql_query($query) or die('Error, query failed');
//include 'library/closedb.php';

echo "<br>File $tmpName uploaded<br>";
}
?> 
