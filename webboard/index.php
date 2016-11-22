<?php session_start();?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Korawin.com Copy and Print</title>
<link href="../css/copy.css" rel="stylesheet" type="text/css" />
<link href="stylesheet/board.css"  rel="stylesheet" type="text/css" />
</head>


<body>
<?
  include('../menu.php');
?>
<center>
  <div id="board-element">
<div class="board-text">

<table width="1000" border="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">
    <?
include("../config/dbc.php");
$strSQL = "SELECT * FROM forum";
$objQuery = mysql_query($strSQL);
$Num_Rows = mysql_num_rows($objQuery);

$strSQL2 = "SELECT * FROM forum_sub";
$objQuery2 = mysql_query($strSQL2);
$Num_Rows2 = mysql_num_rows($objQuery2);
$objResult2 = mysql_fetch_array($objQuery2);

while($objResult = mysql_fetch_array($objQuery))
{
	echo $objResult["forum_name"],"<br/>";
	  if ($objResult["forum_id"] == $objResult2["forum_id"]){
	  while($objResult2 = mysql_fetch_array($objQuery2))
	 {
		 echo $objResult2["forum_sub_name"],"<br/>";
	 }}
}




?>
    
    </td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>



</div>
</div></center>





</body>
</html>