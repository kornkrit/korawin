<?php session_start();?>
 <?php
  $strSQL = "SELECT * FROM forum_sub";
  $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
  $Num_Rows = mysql_num_rows($objQuery);
  
  $objQuery  = mysql_query($strSQL);
?>

<?
while($objResult = mysql_fetch_array($objQuery))
{
	   	
   			$forum_sub_name = $objResult["forum_sub_name"];
    		$forum_sub_info = $objResult["forum_sub_info"];
 		    $forum_sub_post  = $objResult["forum_sub_post"];
 }
?>
  


