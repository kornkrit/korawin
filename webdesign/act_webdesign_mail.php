<?
	session_start();
	$strfrom = $_POST['name'];
	$strmail = $_POST['email'];
	$strphone = $_POST['phone'];
	$strtopic = $_POST['topic'];
	$strdetail = $_POST['detail'];
	$ref = $_SERVER['HTTP_REFERER'];
	
	$strTo = "admin@korawin.com";
	$strHeader .= "MIME-Version: 1.0' . \r\n";
	$strHeader .= "Content-type: text/html; charset=utf-8\r\n"; 
	$strHeader .= "From: $strfrom<$strmail>\r\nReply-To: $strmail";
	$strmessage = "Name : ".$strfrom." Email : ".$strmail." phone : ".$strphone." <br/>".$strdetail ;

	$flgSend = mail($strTo,$strtopic,$strmessage,$strHeader);  // @ = No Show Error

	
	header("Location:$ref ");
?>
</body>
</html>
