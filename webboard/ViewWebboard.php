<?php session_start();?>
<?
include("../config/dbc.php");

if($_GET["Action"] == "Save")
{
	$name = $_SESSION['p_name'];
	//*** Insert Reply ***//
	$strSQL = "INSERT INTO reply ";
	$strSQL .="(QuestionID,CreateDate,Details,Name) ";
	$strSQL .="VALUES ";
	$strSQL .="('".$_GET["QuestionID"]."','".date("Y-m-d H:i:s")."','".$_POST["detail"]."','$name') ";
	$objQuery = mysql_query($strSQL);
	
	//*** Update Reply ***//
	$strSQL = "UPDATE board ";
	$strSQL .="SET reply = reply + 1 WHERE id = '".$_GET["QuestionID"]."' ";
	$objQuery = mysql_query($strSQL);	
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Korawin.com Copy and Print</title>
<link href="../css/copy.css" rel="stylesheet" type="text/css" />
<link href="stylesheet/board.css"  rel="stylesheet" type="text/css" />
</head>


<body>

<div class="width"><div class="menu">
  <ul id="webdesign-nav-horizontal">
  <li><a href="../index.php">HOME</a></li>
  <li>PRODUCT
<ul>
  <li><a href="../copy.php">Copied/Duplicate</a></li>
  <li><a href="../card.php">Card</a></li>
  <li><a href="../namecard.php">Name Card</a></li>
  <li><a href="../graphic.php">Graphic</a></li>
  <li><a href="../index.php?page=webdesign">Web design</a></li>
  <li><a href="../insurance.php">Insurance</a></li>
</ul></li>
  <li><a href="../care.php">CARE</a></li>
  <li>MEMBER
  <ul>
  <li><a href="../index.php?page=register">Register</a></li>
  <li><a href="../login.php">Log in</a></li>
  </ul></li>
  <li><a href="webboard.php">WEBBOARD</a></li>
  <li><a href="../contact-us.php">CONTACT US</a></li>
  </ul>
  <div class="right">
  <?php 
        
		 if($_SESSION['ses_userid'] <> session_id()){
		echo "<form id= 'login' name= 'login' method= 'post' action= '../act_login.php' > " ;
				echo "<input type= 'hidden' name= 'url' id='url' value='curPageURL()'  />" ;
        echo "<input type= 'text' name= 'user' id='user'  />" ;
		echo "  " ;
		echo "<input type= 'password' name= 'password' id='password' /> " ;
		echo "<input name= 'login' type= 'submit' value= '  login  ' />" ;
		echo "</br><input type= 'checkbox' name='keeplogin' id='keeplogin' value='on' /> Keep me logged in ";
		echo "  " ;
		echo " <span style='padding-left:25px;'>Forgot your password?</span>";
        echo "</form>";}
		else{
	    echo "<form id= 'logout' name= 'logout' method= 'post' action= '../act_logout.php' > " ;
		echo $_SESSION['p_name']," ",$_SESSION['p_surname']," ";
		echo "<input name= 'logout' type= 'submit' value= 'logout' />" ;
		echo "</form>";
	   }
  ?>
</div></div></div>

<center>
<div id="board-element">
<div class="board-text">
<center>
  <?
//*** Select Question ***//
$strSQL = "SELECT * FROM board  WHERE id = '".$_GET["QuestionID"]."' ";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
$objResult = mysql_fetch_array($objQuery);

//*** Update View ***//
$strSQL = "UPDATE board ";
$strSQL .="SET view = view + 1 WHERE id = '".$_GET["QuestionID"]."' ";
$objQuery = mysql_query($strSQL);	
?>
<div class="header">
<table width="900" border="0" bordercolorlight="#009999" cellpadding="0" cellspacing="0">
  <tr>
    <td height="50" colspan="2" valign="middle"><center><h1>
      <font color="#FFFF00"><?=$objResult["title"];?></font>
      <br /></h1></center></td>
  </tr>
  <tr>
    <td height="53" colspan="2"><?=$objResult["detail"];?></td>
  </tr>
  <tr>
    <td width="397">Name : <?=$objResult["name"];?> Create Date : <?=$objResult["date"];?></td>
    <td width="253">View : <?=$objResult["view"];?> Reply : <?=$objResult["reply"];?></td>
  </tr>
</table></div>
<br>
<br>
<?
$intRows = 0;
$strSQL2 = "SELECT * FROM reply  WHERE QuestionID = '".$_GET["QuestionID"]."' order by CreateDate";
$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL."]");
while($objResult2 = mysql_fetch_array($objQuery2))
{
	$intRows++;
?>
<div class="reply">
<table width="900" border="0" cellpadding="1" cellspacing="1">

  <tr>
    <td height="53" colspan="1" ><p>ความคิดเห็นที่ 
      <?=$intRows;?>      
      <br />
      <br />
    </p>      <?=nl2br($objResult2["Details"]);?>
    <br />
    <br /></td>
  </tr>
  <tr>
    <td width="397">Name :
    <?=$objResult2["Name"];?>      </td>
    <td width="253"> Posted :
    <?=$objResult2["CreateDate"];?></td>
  </tr>
</table></div><br>
<?
}
?>
<br>
<a href="webboard.php">Back to Webboard</a> <br>
<br>
<form action="ViewWebboard.php?QuestionID=<?=$_GET["QuestionID"];?>&Action=Save" method="post" name="frmMain" id="frmMain">
<div>
 
  <table width="743" border="0" cellpadding="2">
    <tr>
    <td width="18">&nbsp;</td>
    <td colspan="2"></td>
    </tr>
   <tr>
    <td>&nbsp;</td>
    <td>Message:</td>
    <td><label for="message"></label>
      <textarea name="detail" id="detail" cols="100" rows="10"></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">
     <?  
	   if($_SESSION['ses_userid'] <> session_id()){
		   echo "please login";}
	  else
	   {echo "Post by : ",$_SESSION['p_name'];
	    echo "<br/>Email : ",$_SESSION['p_email'];
	    echo '</td>
        </tr>
       <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><div align="right"><input type="submit" name="submit" id="submit" value="POST" /></div></td>
     </tr>'; }
  ?>
  
  </table>

</div>
</form>
</center>
</div>
</div></center>

</body>
</html>
<?
mysql_close();
?>