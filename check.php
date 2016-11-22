<link href="stylesheets/main.css" rel="stylesheet" type="text/css" />
<?php
	
$strUsername = trim($_POST["tUsername"]);
$objConnect = mysql_connect("localhost","korawinc_admin","d36u84bg") or die("Error Connect to Database");
	mysql_select_db("korawinc_korawin");

	//*** Check Username (already exists) ***//

	$strSQL = "SELECT *  FROM `member` WHERE user = '$strUsername'";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$objResult = mysql_fetch_array($objQuery);
	if($objResult)
	{
		echo "<span class=red>Sorry, $strUsername already exists</span>";
	}
	else
	{
		echo "<span class= green>$strUsername can be used</span>";
	}

	mysql_close($objConnect);
?>
