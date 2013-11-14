<?php
session_start();
$mysqli= new mysqli("willy", "agendrea", "agendrea", "agendrea");
// for your reference (host,username,password,dbname);
if ($mysqli->connect_errno)
{
echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

//echo ('I work!');
$sql = "SELECT USER_FNAME, USER_LNAME, USER_BIRTHDATE FROM DIS_USER_PROFILE WHERE USER_EMAIL = '".$_SESSION['email']."'";
$data = $mysqli->query($sql) or die(mysql_error());
$row = $data->fetch_row();
$_SESSION['Firstnamedisplay'] = $row[0];
echo $_SESSION['Firstnamedisplay'];
$_SESSION['Lastnamedisplay'] = $row[1];
$_SESSION['Birthdatedisplay'] = $row[2];
echo $_SESSION['Lastnamedisplay'];
echo $_SESSION['Birthdatedisplay'];
?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script type="text/javascript">
	function logout()
	{
		window.location.replace("logout.php");
	}
        /*$(document).ready(function () {
		$("#logoutBtn").click( function() {
		window.location.replace("logout.php");
		}
	}); */
</script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<link rel="stylesheet" type="text/css" href="user_page.css" />

<div id="ProfilePage">
    <div id="LeftCol">
        <div id="Photo"></div>
        <div id="ProfileOptions">
        Picture Above
        </div>
    </div>

    <div id="Info">

        <p>
            <strong>Name:</strong>
            <span> <?php echo $_SESSION['Firstnamedisplay'] . ' ' . $_SESSION['Lastnamedisplay'];?> </span>
        </p>
        <p>
            <strong>Date of Birth:</strong>
            <span><?php echo $_SESSION['Birthdatedisplay']?></span>
        </p>
        <p>
            <strong>Location:</strong>
            <span><a href = "">Fill </a></span>
        </p>
        <p>
            <strong>Gender:</strong>
            <span><a href = "">Fill </a></span>
        </p>
        <p>
            <strong>Relationship Status:</strong>
            <span><a href = "">Fill </a></span>
        </p>
       
    </div>

<button type= "button" id="logoutBtn" onclick="logout()"> Logout </button>

    <div style="clear:both"></div>
</div>
<html>
