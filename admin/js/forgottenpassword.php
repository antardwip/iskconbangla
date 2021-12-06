<?php
require_once("/homepages/19/d393793232/htdocs/mayapur/slpw/slloginform.php");
$groupswithaccess="PUBLIC";
$loginpage=$slpagename;
$logoutpage=$slpagename;
$loginredirect=0;
require_once("/homepages/19/d393793232/htdocs/mayapur/slpw/sitelokpw.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Live on MayapurTV</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" href="js/scrollbar/jquery.mCustomScrollbar.css">
   <!-- <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
  
           <!--=======================login scripts=========================-->
<style type="text/css">

.slcbfield_invisible{
  display: none;
}
#lost-password-content{
box-sizing:border-box;
position : absolute;
width: 300px;
height: 300px;

padding: 10px;
  border: 5px solid red;
}
div#slform_10{
position: absolute;
 box-sizing:border-box;
    -webkit-box-sizing:border-box;
    -moz-box-sizing:border-box;
/*display:none;*/
width:240px;
height: 140px;
  background-color: white;
 /* border: none;
  padding: 0;
  margin: 0;
  width: 100%;
  max-width: 200px;*/
}

/* Text fields */
div.sltextfield_10 {
  margin-bottom: 15px;
}

div#slform_10 div.sltextfield_10 label {
  display: block;
  color: #1A305E; 
  font: normal normal normal 16px Arial, Helvetica, sans-serif;
  margin: 0 0 2px 0;
  padding:0;
}

div#slform_10 div.sltextfield_10 input[type="text"], input[type="email"], input[type="password"] {
  border: solid #378EE5 1px;
  background-image: none;
  background-repeat: no-repeat;
  background-color:#FFFFFF;
  font: normal normal normal 14px Arial, Helvetica, sans-serif;
  color: #1A305E;
  margin: 0;
  width:100%;
  -moz-border-radius: 5px;
  -khtml-border-radius: 5px;
  border-radius: 5px;	
  padding: 0.3em;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

/* Checkbox fields */
div.slcbfield_10 {
  margin-bottom: 15px;
}

div#slform_10 div.slcbfield_10 label {  
  display: inline;
  color: #1A305E; 
  font: normal normal normal 16px Arial, Helvetica, sans-serif;
  vertical-align: middle;
  margin: 0;
  padding:0;
}

div#slform_10 div.slcbfield_10 input[type="checkbox"] {
  margin-left: 0;
  background-image: none;
  background-repeat: no-repeat;
  color: #1A305E;
  font: normal normal normal 16px Arial, Helvetica, sans-serif;
  vertical-align: middle;
  margin: 0;
  padding: 0;
}

/* Captcha fields */
div.slcaptchafield_10 {
  margin-bottom: 15px;
}

div#slform_10 div.slcaptchafield_10 input[type="text"]{
  border: solid #378EE5 1px;
  background-image: none;
  background-repeat: no-repeat;
  background-color:#FFFFFF;
  font: normal normal normal 14px Arial, Helvetica, sans-serif;
  color: #1A305E;
  width: 4em;
  margin: 0;
  padding: 0.3em;
  -moz-border-radius: 5px;
  -khtml-border-radius: 5px;
  border-radius: 5px;
  max-width: 200px;
}

div#slform_10 div.slcaptchafield_10 label {
  display: block;  
  color: #1A305E; 
  font: normal normal normal 16px Arial, Helvetica, sans-serif;
  margin: 0 0 2px 0;
  padding:0;
}

div#slform_10 div.slcaptchafield_10 img{
  vertical-align: top;
  height: 30px;
}

div#slform_10 div.slformmsg_10 {
  padding: 0;
  margin: 0 0 10px 0;
  text-align: left;
  color: #FF0000;
  font:  12px Arial, Helvetica, sans-serif;  
}

a#slforgot_10{
  color: #1A305E;
  font: normal normal normal 14px Arial, Helvetica, sans-serif;
  text-align: left;
  vertical-align: middle;
  padding: 0;
  margin: 0;
}

p#slsignup_10{
  text-align: left;
  padding: 0;
  margin: 15px 0 0 0;
}

p#slsignup_10 a{
  color: #000000;
  font: normal normal normal 12px Arial, Helvetica, sans-serif;
  text-align: left;
}

/* Button from http://www.bestcssbuttongenerator.com */
div#slform_10 #myButton_10 {
  background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #1A305E), color-stop(1, #378EE5));
  background:-moz-linear-gradient(top, #1A305E 5%, #378EE5 100%);
  background:-webkit-linear-gradient(top, #1A305E 5%, #378EE5 100%);
  background:-o-linear-gradient(top, #1A305E 5%, #378EE5 100%);
  background:-ms-linear-gradient(top, #1A305E 5%, #378EE5 100%);
  background:linear-gradient(to bottom, #1A305E 5%, #378EE5 100%);
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#1A305E', endColorstr='#378EE5',GradientType=0);
  background-color:#1A305E;
  -moz-border-radius: 10px;
  -webkit-border-radius: 10px;
  border-radius: 10px;
  display:inline-block;
  cursor:pointer;
  color: #FFFFFF;
  font: normal normal bold 14px Arial, Helvetica, sans-serif;
  padding: 6px 24px;
  margin: 0;
  text-decoration:none;
  border: solid #FFFFFF 0px;
  margin: 0 5px 5px 0;
}
div#slform_10 #myButton_10:hover {
  background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #378EE5), color-stop(1, #1A305E));
  background:-moz-linear-gradient(top, #378EE5 5%, #1A305E 100%);
  background:-webkit-linear-gradient(top, #378EE5 5%, #1A305E 100%);
  background:-o-linear-gradient(top, #378EE5 5%, #1A305E 100%);
  background:-ms-linear-gradient(top, #378EE5 5%, #1A305E 100%);
  background:linear-gradient(to bottom, #378EE5 5%, #1A305E 100%);
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#378EE5', endColorstr='#1A305E',GradientType=0);
  background-color:#378EE5;
}
div#slform_10 #myButton_10:active {
  position:relative;
  top:1px;
}
/* End of button */

</style>
<!--[if lt IE 9]>
<style type="text/css">
div#slform_10 {
  width: 200px;
}
</style>

<![endif]-->

<!--[if lte IE 7]>
<style type="text/css">
div#slform_10 div.sltextfield_10 input[type="text"], input[type="email"], input[type="password"] {
  width: 95%;
}

div#slform_10 #myButton_10 {
  padding: 0px 0px;
}
</style>
<![endif]-->




<script type="text/javascript">
function login(){
globalslname = '<?php echo $slusername ;?>';
globalslpass = '<?php echo $slpassword ;?>';
globalslemail = '<?php echo $slemail ;?>';
globalslcustom1 = '<?php echo $slcustom1 ;?>';
globalslcustom2 = '<?php echo $slcustom2;?>';
writeme();
}
function slvalidateform_10()
{
  var loginmessage=document.getElementById('slformmsg_10')
  loginmessage.innerHTML=''
  var username=document.getElementById('slfieldinput_10_username')	
  if (sltrim_10(username.value)=="")
  {
    loginmessage.innerHTML='Please enter your username'	
    username.focus()
    return(false)
  }
  var password=document.getElementById('slfieldinput_10_password')	
  if (sltrim_10(password.value)=="")
  {
    loginmessage.innerHTML='Please enter your password'	
    password.focus()
    return(false)
  }
  var captcha=document.getElementById('slfieldinput_10_captcha')	
  if (sltrim_10(captcha.value)=="")
  {
    loginmessage.innerHTML='Please enter the displayed CAPTCHA code'	
    captcha.focus()
    return(false)
  }
  return(true);
}
function forgotpw_10()
{
  var loginmessage=document.getElementById('slformmsg_10')
  loginmessage.innerHTML=''
  var username=document.getElementById('slfieldinput_10_username')	
  if (sltrim_10(username.value)=="")
  {
     loginmessage.innerHTML='Please enter your username or email address and the display CAPTCHA code'
    username.focus()
    return(false)
  }
  var captcha=document.getElementById('slfieldinput_10_captcha')	
  if (sltrim_10(captcha.value)=="")
  {
    loginmessage.innerHTML='Please enter the displayed CAPTCHA code'	
    captcha.focus()
    return(false)
  }
  var forgotpassword=document.getElementById('forgotpassword_10')	
  forgotpassword.value="forgotten-it"
  var form=document.getElementById('siteloklogin_10')	  
  form.submit() 
  return(true)
}

function sltrim_10(x)
{
    return x.replace(/^\s+|\s+$/gm,'');
}
</script>
<?php
if (function_exists('slcaptchahead'))
  echo slcaptchahead();
?>

<!--===================end of login scripts=======================--></head>
<body>


				<div id="lost-password-content">
   <h3>LOST PASSWORD RECOVERY</h3>
Enter your e-mail
	<br>Complete the captcha
	<br>Click forgotten
<br><br>

<?php if ($slpublicaccess) { ?>
<div id="slform_10">
<form action="<?php echo $startpage; ?>" method="post" id="siteloklogin_10" onSubmit="return slvalidateform_10()">
 <!--<form id="form1" name="form1" method="post">-->
<input type="hidden" id="loginformused_10" name="loginformused" value="1">
<input type="hidden" id="forgotpassword_10" name="forgotpassword" value="">
<div id="slformmsg_10" class="slformmsg_10"><?php if ($msg!="") echo $msg; ?></div>

<div class="sltextfield_10">
<label for="slfieldinput_10_username">Your e-mail</label>
<input type="text" name="username" id="slfieldinput_10_username" autocorrect="off" autocapitalize="off" maxlength="50" value="<?php print $slcookieusername; ?>">
</div>

<div class="slcbfield_invisible">
<label for="slfieldinput_10_password">Password</label>
<input type="password" name="password" id="slfieldinput_10_password" maxlength="50" value="<?php print $slcookiepassword; ?>">
</div>

<div class="slcbfield_invisible">
<input type="checkbox" name="remember" id="slfieldinput_10_remember" value="1">
<label for="slfieldinput_10_remember">Remember me</label>
</div>

<div class="slcaptchafield_10">
<label for="slfieldinput_10_captcha">Captcha
</label><?php
if (function_exists('slshowcaptcha'))
{
echo slshowcaptcha();
}
else
{
?>

<input type="text" name="turing" id="slfieldinput_10_captcha" placeholder="captcha" maxlength="5">
&nbsp;<img src="<?php echo $SitelokLocationURLPath; ?>turingimage.php" height="30" title="Captcha" alt="Captcha">
<?php
}
?>
</div>

<input class="slcbfield_invisible" type="submit" value="Login" title="Login"><a id="slforgot_10" href="javascript: void forgotpw_10()" title="Forgot your password? Enter username or email &amp; click link">Forgotten?</a>
</form>
</div>
<?php } // Hide ?>

</div>
</body>
</html>
