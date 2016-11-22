<?php session_start();?>
<?php include("config/dbc.php");
      $username = $_POST['user'];
      $password = $_POST['password'];
	  $chkcookie =$_POST['keeplogin'];
  	  $ref = $_SERVER['HTTP_REFERER'];
$getMember = mysql_query("SELECT * FROM member WHERE (user  = '$username' OR email = '$username')  AND password = '$password' ");
  $row = mysql_fetch_array($getMember);
  if(mysql_num_rows($getMember) > 0)
  {
 	$_SESSION['ses_userid'] = session_id();
	$_SESSION['p_name'] = $row['name'];
	$_SESSION['p_surname'] = $row['surname'];
    $_SESSION['p_email'] = $row['email'];
	
	if($chkcookie == on){
		setcookie("username_log",$username,time()+3600*24*356);
		setcookie("password_log",$password,time()+3600*24*356);
	}
	$_SESSION['wrong'] = "0";
	header("Location:$ref ");
 }
 else
 {
	$_SESSION['wrong'] = "1";
	header("Location:$ref ");
 }
  
 
?>