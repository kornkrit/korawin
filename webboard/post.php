<? session_start() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
  <li><<a href="../contact-us.php">CONTACT US</a></li>
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

<form action="act_post.php" method="post" name="quiz">
<div>
  <table width="743" border="0" cellpadding="2">
    <tr>
    <td width="18">&nbsp;</td>
    <td colspan="2"></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="87">Title :</td>
    <td width="618"><input name="title" id="title" type="text" size="99" maxlength="120" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Message:</td>
    <td><label for="message"></label>
      <textarea name="message" id="message" cols="100" rows="10"></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">
    <center><a href="webboard.php">Back to Webboard</a></center><br />
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
</div>
</div></center>
</body>
</html>