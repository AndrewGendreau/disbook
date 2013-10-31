<?php
	//error messages
	error_reporting( E_ERROR | E_PARSE );

	//connect to willy
	$conn = mysqli_connect( "willy", "agendrea", "agendrea", "agendrea" );
		if ( $conn->connect_errno )
		   {
			echo "<p>CONNECTION ERROR</p>\n";
		   }
	//Get information from the database
	$sql= "SELECT USER_FNAME, USER_LNAME, USER_BIRTHDATE FROM DIS_USER_PROFILE WHERE USER_ID = "


?>
