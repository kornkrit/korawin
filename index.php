<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>บริการรับทำเว็บไซต์ ออกแบบเว็บ ใช้งานสะดวก</title>
<link href="css/webdesign.css" rel="stylesheet" type="text/css" />
</head>


<body>
<!-- header -->
<?
 include("menu.php");
?>
<!-- close header -->     
      
<!-- body  -->
<br /><br />
 <hr size="2" color="#990000" />
 <div align="center">
 	<!-- เมนูย่อย -->
    
    <div align="center" style="width:1000px; line-height:30px;" >
          <div align="left">
          <ul class ="sub_menu">
          <li class="current"><a href="webdesign.php">WEBDESIGN</a></li>
          <li><a href="webdesign.php?webdesign=service">SERVICES</a></li>
          <li><a href="#">PORTFOLIO</a></li>
          <li><a href="webdesign.php?webdesign=contact">CONTACT</a></li>
          </ul>
          </div>
    </div>
   <br />
   <span>
   <div class="inline" align="left" >
   		<div align="left" style="width:280px; float:left;">
   			<ul class="s_menu">
   				<li><a href="webdesign.php">ออกแบบเว็บไซต์</a></li>
   				<li><a href="webdesign.php?webdesign=domain">โดเมน</a></li>
   				<li><a href="webdesign.php?webdesign=contact">ติดต่อสอบถาม</a></li>
   			</ul>
   		</div></div>
   

        
        <div class="show">
		
           		<?php 
  switch ($_GET[webdesign]){
	  		
			case service :
			include ('webdesign/webdesign-service.php');
			break;
			
			case domain :
			include ('webdesign/webdesign-domain.php');
			break;
			
			case contact :
			include ('webdesign/webdesign-contact.php');
			break;
					
			default :
			{
				include ('webdesign/webdesign-home.php');
				break;
			}
	  }
?>
        
        </div>
<hr size="2" width="100%" color="#990000" /><br />
<?
	include('footer.php');
?>
</body>
</html>

