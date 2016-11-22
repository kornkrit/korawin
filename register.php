<?php
session_start();
$isSubmitted = isset($_POST['isSubmitted']);

if($isSubmitted && $isSubmitted == '1')
{
	require("config/dbc.php");
	$name	= $_POST['name'];
	$surname = $_POST['surname'];
	$user	= $_POST['user'];
	$pass	= md5($_POST['pass']);
	$phone   = $_POST['phone'];
	$email   = $_POST['email'];
	
	function chkuser(){
	
	$chkuser = "select*from member where user = '$user'";
	$dbquery = mysql_db_query(korawinc_korawin,$chkuser);
	$num_rows= mysql_num_rows($dbquery);
	echo "user $user";
	if($num_rows >= 1)
	{echo "User already used";}
	}
	
	if($name!=""){
	mysql_query("INSERT INTO `korawinc_korawin`.`member` (`id`, `name`, `surname`, `user`, `password`, `email`, `phone`) VALUES (NULL, '$name', '$surname', '$user', '$pass', '$email', '$phone')");
header("Location:register.php?msg=1");}
 }

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Register Korawin.com</title>
<link href="css/copy.css" rel="stylesheet" type="text/css" />
<link href="stylesheets/main.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationConfirm.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationCheckbox.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationCheckbox.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#register center #element table tr td #chksurname {
	text-align: left;
}
#register center #element table tr td {
	text-align: left;
}
</style>
<script language="JavaScript">
	 	  var HttPRequest = false;

	   function doCallAjax() {
		  HttPRequest = false;
		  if (window.XMLHttpRequest) { // Mozilla, Safari,...
		
			 HttPRequest = new XMLHttpRequest();
			 if (HttPRequest.overrideMimeType) {
				HttPRequest.overrideMimeType('text/html');
			 }
		  } else if (window.ActiveXObject) { // IE
			 try {
				HttPRequest = new ActiveXObject("Msxml2.XMLHTTP");
			 } catch (e) {
				try {
				   HttPRequest = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {}
			 }
		  } 
		  
		  if (!HttPRequest) {
			 alert('Cannot create XMLHTTP instance');
			 return false;
		  }
		  var url = 'check.php';
		  var pmeters = "tUsername=" + encodeURI( document.getElementById("user").value);

			HttPRequest.open('POST',url,true);

			HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			HttPRequest.setRequestHeader("Content-length", pmeters.length);
			HttPRequest.setRequestHeader("Connection", "close");
			HttPRequest.send(pmeters);
			
			
			HttPRequest.onreadystatechange = function()
			{

				if(HttPRequest.readyState == 3)  // Loading Request
				{
					document.getElementById("mySpan").innerHTML = "..";
				}

				if(HttPRequest.readyState == 4) // Return Request
				{
					if(HttPRequest.responseText == 'Y')
					{
						window.location = 'AjaxPHPRegister3.php';
					}
					else
					{
						document.getElementById("mySpan").innerHTML = HttPRequest.responseText;
					}
				}
				
			}

	   }
	</script>
<script language="JavaScript">
	 	  var HttPRequest = false;

	   function chkEmail() {
		  HttPRequest = false;
		  if (window.XMLHttpRequest) { // Mozilla, Safari,...
		
			 HttPRequest = new XMLHttpRequest();
			 if (HttPRequest.overrideMimeType) {
				HttPRequest.overrideMimeType('text/html');
			 }
		  } else if (window.ActiveXObject) { // IE
			 try {
				HttPRequest = new ActiveXObject("Msxml2.XMLHTTP");
			 } catch (e) {
				try {
				   HttPRequest = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {}
			 }
		  } 
		  
		  if (!HttPRequest) {
			 alert('Cannot create XMLHTTP instance');
			 return false;
		  }
		  var url = 'chkemail.php';
		  var pmeters = "tEmail=" + encodeURI( document.getElementById("email").value);

			HttPRequest.open('POST',url,true);

			HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			HttPRequest.setRequestHeader("Content-length", pmeters.length);
			HttPRequest.setRequestHeader("Connection", "close");
			HttPRequest.send(pmeters);
			
			
			HttPRequest.onreadystatechange = function()
			{

				if(HttPRequest.readyState == 3)  // Loading Request
				{
					document.getElementById("spanemail").innerHTML = "..";
				}

				if(HttPRequest.readyState == 4) // Return Request
				{
					if(HttPRequest.responseText == 'Y')
					{
						window.location = 'AjaxPHPRegister3.php';
					}
					else
					{
						document.getElementById("spanemail").innerHTML = HttPRequest.responseText;
					}
				}
				
			}

	   }
	</script>
</head>

    
<body>

<form id="register" name="register" method="post" action="<?php echo $_SERVER['PHP-SELF'];?>">
  <center>
    

<p><span class="logo">
  <input type="hidden" name="isSubmitted" value="1" />
  <img src="image/header.png" width="300" height="140" /></span></p>
<div>
<?php
  if(isset($_GET['msg'])){
	  $message = $_GET['msg'];
	  if($message == 1)
	  echo "<span>You have been registed</span>";
	  else if($message == 2)
	  echo "<span>You haven't been registed</span>";
}?>
<table width="900" border="0" cellpadding="2">
  <tr>
    <td colspan="4" bgcolor="#333333" scope="col"><font color="#FFFFFF">ข้อมูลการสมัคร</font></td>
    </tr>
  <tr>
    <td width="50">&nbsp;</td>
    <td width="173" style="text-align: left">Fullname</td>
    <td width="558"><label for="name"></label>
      <span id="chkname">
      <input type="text" name="name" id="name" />
      <span class="textfieldRequiredMsg">Your name is required.</span></span></td>
    <td width="93">&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td style="text-align: left">Surname</td>
    <td><label for="surname"></label>
      <span id="chksurname">
      <input type="text" name="surname" id="surname" />
      <span class="textfieldRequiredMsg">Your surname is required.</span></span></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td style="text-align: left">Email</td>
    <td><label for="email"></label>
      <span id="chkemail">
      <input type="text" name="email" id="email" onChange = "JavaScript:chkEmail()"/>
      <span class="textfieldRequiredMsg">Your email is required.</span><span class="textfieldInvalidFormatMsg">your email incorrect.</span></span><span id="spanemail"></span></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td style="text-align: left">Phone</td>
    <td><label for="phone"></label>
      <span id="chkphone">
      <input type="text" name="phone" id="phone" />
      <span class="textfieldRequiredMsg">Your phone number is required.</span><span class="textfieldInvalidFormatMsg">Your phone should be in Thailand.</span></span></td>
    <td> </td>
    </tr>
  <tr>
    <td colspan="4" bgcolor="#333333"><font color="#FFFFFF">ข้อมูลการใช้งาน</font></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>User</td>
    <td><label for="user"></label>
      <span id="chkuser">
      <input type="text" name="user" id="user" onChange = "JavaScript:doCallAjax()">
      <span class="textfieldRequiredMsg">Your username is required.</span></span>
      <span id="mySpan"></span>
	 </td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Password</td>
    <td><label for="pass"></label>
      <span id="chkpass">
      <input type="password" name="pass" id="pass2" />
      <span class="passwordRequiredMsg">Your password is required.</span><span class="passwordMinCharsMsg">Your password must morethan 6 litteral.</span><span class="passwordMaxCharsMsg">Your password must lessthan 10 litteral.</span><span class="passwordInvalidStrengthMsg">Your password must contain least 1 litteral</span></span></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Comfrim Password</td>
    <td><span id="spryconfirm1">
    <label for="pass"></label>
    <span id="chkconpass">
    <input type="password" name="comfirmpass" id="pass"  placeholder + "test" title = "test2"/>
    <span class="confirmRequiredMsg">You have to confirm your password.</span><span class="confirmInvalidMsg">Your password didn't be same.</span></span></span></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><span id="chkpolicy">
    <input type="checkbox" name="policy" id="policy" />I have been read and agreed policy.
    <input type="submit" name="submit" id="submit" value="Registed" />
    <br />
    <span class="checkboxRequiredMsg"> You have to read and agreed the policy.</span></span><span class="checkboxRequiredMsg">I have been read and agreed policy.</span>
    <label for="policy"><span class="checkboxRequiredMsg">I have been read and agreed policy</span>
  </label></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><span class="checkboxRequiredMsg">I have been read and agreed policy</span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</form>
</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("chkname", "none", {validateOn:["blur", "change"], hint:"Fullname"});
var sprytextfield2 = new Spry.Widget.ValidationTextField("chksurname", "none", {validateOn:["blur", "change"], hint:"Surname"});
var sprytextfield3 = new Spry.Widget.ValidationTextField("chkemail", "email", {validateOn:["blur", "change"], hint:"yourmail@mail.com"});
var sprytextfield4 = new Spry.Widget.ValidationTextField("chkphone", "phone_number", {format:"phone_custom", pattern:"000-000-0000", useCharacterMasking:true, validateOn:["blur", "change"], hint:"089-123-4567"});
var sprytextfield5 = new Spry.Widget.ValidationTextField("chkuser", "none", {validateOn:["blur", "change"], hint:"Username"});
var sprypassword1 = new Spry.Widget.ValidationPassword("chkpass", {minChars:6, maxChars:10, validateOn:["blur", "change"], minAlphaChars:1, minNumbers:1});
var spryconfirm2 = new Spry.Widget.ValidationConfirm("chkconpass", "pass2", {validateOn:["blur", "change"]});
var sprycheckbox1 = new Spry.Widget.ValidationCheckbox("chkpolicy", {validateOn:["blur", "change"]});
</script>
</body>
</html>
