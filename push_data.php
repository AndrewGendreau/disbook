<?php
$dbhost = 'localhost:1522';
$dbuser = 'bfreed';
$dbpass = 'Cannon12';

$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if (! conn)
{
	die('Could not connect' . mysql_error());
}


$sql = 'INSERT INTO DIS_USER_PROFILE' .
       'USER_FNAME, USER_LNAME, USER_BIRTHDATE)'.
       'VALUES ("Ian", "Englbach", "17/03/1991")';

mysql_select_db('test_db');
$retval = mysql_query($sql, $conn);
if(! $retval)
{
	die ('Could not enter data: ' . myql_error());
}
echo "Entered data successfully\n";
mysql_close($conn);
?>
