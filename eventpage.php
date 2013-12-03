<?php
session_start();
$mysqli= new mysqli("willy", "agendrea", "agendrea", "agendrea");
// for your reference (host,username,password,dbname);
if ($mysqli->connect_errno)
{
echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


$sql = "SELECT EVENT_NAME, EVENT_LOCATION, EVENT_TIME, EVENT_DESCRIPt FROM DIS_EVENTS WHERE USER_EMAIL = '".$_SESSION['email']."'";
$data = $mysqli->query($sql) or die(mysql_error());
$row = $data->fetch_row();
$_SESSION['Eventnamedisplay'] = $row[0];
$_SESSION['Eventlocationdisplay'] = $row[1];
$_SESSION['Timedisplay'] = $row[2];
$_SESSION['Descriptiondisplay'] = $row[3];
?>

<script type="text/javascript">
        function logout()
        {
                window.location.replace("logout.php");
        }

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
        <br>
        <br>
    </div>

    <div id="Info">

        <p>
            <strong>Event Name:</strong>
            <span> <?php echo $_SESSION['Firstnamedisplay'];?> </span>
        </p>
        <p>
            <strong>Location:</strong>
            <span> <?php echo $_SESSION['Eventlocationdisplay'];?> </span>
        </p>
<p>
            <strong>Time:</strong>
            <span> <?php echo $_SESSION['Timedisplay'];?> </span>
        </p>
<p>
            <strong>Description:</strong>
            <span> <?php echo $_SESSION['Descriptiondisplay'];?> </span>
        </p>
       
    </div>

<a href = "index.html"><button type= "button" id="logoutBtn" onclick="logout()"> Logout </button> </a>

    <div style="clear:both"></div>
</div>
<html>
