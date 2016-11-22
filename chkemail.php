<link href="stylesheets/register.css" rel="stylesheet" type="text/css" />
<?php
	
$strEmail = trim($_POST["tEmail"]);
$objConnect = mysql_connect("localhost","korawinc_admin","d36u84bg") or die("Error Connect to Database");
	mysql_select_db("korawinc_korawin");

	//*** Check Username (already exists) ***//

	$strSQL = "SELECT *  FROM `member` WHERE email = '$strEmail'";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$objResult = mysql_fetch_array($objQuery);
	if($objResult)
	{
		echo "<span class=red>Sorry, $strEmail already exists</span>";
	}
	mysql_close($objConnect);
?>
