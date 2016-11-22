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
<li><a href="post.php">Start New Topic</a></li>
<?php
  include("../config/dbc.php");

$strSQL = "SELECT * FROM board ";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysql_num_rows($objQuery);
  $Per_Page = 10;  

$Page = $_GET["Page"];
if(!$_GET["Page"])
{
	$Page=1;
}

$Prev_Page = $Page-1;
$Next_Page = $Page+1;

$Page_Start = (($Per_Page*$Page)-$Per_Page);
if($Num_Rows<=$Per_Page)
{
	$Num_Pages =1;
}
else if(($Num_Rows % $Per_Page)==0)
{
	$Num_Pages =($Num_Rows/$Per_Page) ;
}
else
{
	$Num_Pages =($Num_Rows/$Per_Page)+1;
	$Num_Pages = (int)$Num_Pages;
}

$strSQL .=" order  by id DESC LIMIT $Page_Start , $Per_Page";
$objQuery  = mysql_query($strSQL);
?>

<table width="1000" border="0" align="left" cellpadding="0" cellspacing="1">
  <tr>
    <th width="458" bgcolor="#999999"> <div align="center">Title</div></th>
    <th width="90" bgcolor="#999999"> <div align="center">Post by</div></th>
    <th width="45" bgcolor="#999999"> <div align="center">View</div></th>
    <th width="47" bgcolor="#999999"> <div align="center">Reply</div></th>
  </tr>
<?
while($objResult = mysql_fetch_array($objQuery))
{
?>
  <tr>
    <td bgcolor="#3399FF"><a href="ViewWebboard.php?QuestionID=<?=$objResult["id"];?>"><?=$objResult["title"];?></a></td>
    <td bgcolor="#3399FF"><?=$objResult["name"];?>
    <br/><?=$objResult["date"];?></td>
    
    <td align="right" bgcolor="#3399FF"><?=$objResult["view"];?></td>
    <td align="right" bgcolor="#3399FF"><?=$objResult["reply"];?></td>
  </tr>
<?
}
?>
</table>

<br>
Total <?= $Num_Rows;?> Record : <?=$Num_Pages;?> Page :

<?
if($Prev_Page)
{
	echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page'><< Back</a> ";
}

for($i=1; $i<=$Num_Pages; $i++){
	if($i != $Page)
	{
		echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i'>$i</a> ]";
	}
	else
	{
		echo "<b> $i </b>";
	}
}
if($Page!=$Num_Pages)
{
	echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page'>Next>></a> ";
}

?>


</div>
</div></center>





</body>
</html>