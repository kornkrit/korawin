<? session_start() ?>
<?php
	include("../config/dbc.php");
	$isSubmitted = 1;
	

if($isSubmitted && $isSubmitted == '1')
{
	$id	= $_POST['id'];
	$title = $_POST['title'];
	$date  = $_POST['date'];
	$message = $_POST['message'];
	$email = $_SESSION['p_email'];
	$name = $_SESSION['p_name'];
	$date =  date("Ymd");
	
	$dbquery = mysql_db_query(korawinc_korawin,"INSERT INTO `korawinc_korawin`.`board`(`id` ,`title` ,`detail` ,`date`,`name` ,`email`) VALUES (NULL ,'$title','$message','$date','$name','$email');");
	header("Location:webboard.php ");
	
}
 
?>