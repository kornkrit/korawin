<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Korawin.com Copy and Print</title>
<link href="css/menu.css" rel="stylesheet" type="text/css" />
<link href="jquery/jquery.js" type="text/javascript"/>
<script type="text/javascript">	
	function toggle_visibility(id,ar) {
       var e = document.getElementById(id);
	   var ar = document.getElementById(ar);
       if(e.style.display == "block")
          {e.style.display = "none";
			document.getElementById("arrow").innerHTML = "▼";
		  }
       else
          {
		  e.style.display = "block";
		  document.getElementById("arrow").innerHTML = "▲";}
   	  	  } 	
</script>


</head>


<body>
<div class="width"><div class="menu">
 <ul id="webdesign-nav-horizontal">
  <li><a href="index.php">HOME</a></li>
  <li>PRODUCT
<ul>
  <li class="s_li"><a href="copy.php">Copied/Duplicate</a></li>
  <li class="s_li"><a href="webdesign.php">Web design</a></li>
  <li class="s_li"><a href="insurance.php">Insurance</a></li>
</ul></li>
  <li>MEMBER
  <ul>
  <li class="s_li"><a href="index.php?page=register">Register</a></li>
  <li class="s_li"><a href="login.php">Log in</a></li>
  </ul></li>
  <li><a href="webboard/webboard.php" target="_new">WEBBOARD</a></li>
  <li><a href="contact-us.php">CONTACT US</a></li>
  </ul>
  <div class="right">

		<!-- if($_SESSION["ses_userid"] <> session_id()){-->
<? 	
		
		if($_SESSION['ses_userid'] <> session_id()){
			
	echo"
		<form name='login' method='post' action='act_login.php'>
        <input type= 'text' name= 'user' id='user' placeholder='Username or Email' title='Username or Email' required/>
		<input type= 'password' name= 'password' id='password' placeholder='Password' required /> 
		<input name= 'login' type= 'submit' value= '  login  '  />
		";?> 
        <a href='#' onclick= "toggle_visibility('foo','arrow')"><span style='color:#FFF' id = 'arrow'>▼</span></a>
        <div id ='foo' style='display:none;'><input type= 'checkbox' name='keeplogin' id='keeplogin' value='on' /> Keep me logged in 
	    <span style='padding-left:25px;'>Forgot your password?</span></div>
        <? echo " </form>";}
        
		else{ echo "
		<form id= 'logout' name= 'logout' method= 'post' action= 'act_logout.php'>".
		$_SESSION['p_name']." ".$_SESSION['p_surname']." ".
		"<input name= '  logout  ' type= 'submit' value= 'logout'  />
		</form> ";
		}
    
 ?>
   		  <span><?
                if($_SESSION['wrong'] == 1 )
				{echo "Invalid user or password";
				 session_destroy();}
			    ?>
          </span>
  </div></div></div>
</body>
</html>