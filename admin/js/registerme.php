<?php require_once("/homepages/19/d393793232/htdocs/mayapur/slpw/sitelokregister.php"); ?>



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
  
           <!--=======================register scripts=========================-->
<style type="text/css">
#register-content{
box-sizing:border-box;
position : absolute;
width: 300px;
height: 540px;
padding: 10px;
  border: 5px solid red;
}
<style type="text/css">

div#slform_3{
  border: none;
  padding: 0;
  margin: 0;
  width: 100%;
  max-width: 300px;
}

div#slform_3 label em{
  color: #FF0000;
  margin: 0 0 0 2px;
  padding:0;
  vertical-align: top;
}

/* Text fields */
div.sltextfield_3 {
}

div#slform_3 div.sltextfield_3 label {
  display: block;
  margin: 0 0 2px 0;
  padding:0;
}

div#slform_3 div.sltextfield_3 input[type="text"], input[type="email"], input[type="password"] {
  margin: 0 0 0 0px;
	width:100%;
  box-sizing: border-box;
}

/* Radio fields */
div.slradiofield_3 {
}

div#slform_3 div.slradiofield_3 label {  
  display: inline;
	vertical-align: middle;
	margin: 0;
	padding: 0;
	
}

div#slform_3 div.slradiofield_3 input[type="radio"] {
	margin: 0;
	padding: 0;
	vertical-align: middle;
}

/* Checkbox fields */
div.slcbfield_3 {
}

div#slform_3 div.slcbfield_3 label {  
  display: inline;
	vertical-align: middle;
	margin: 0;
	padding:0;
}

div#slform_3 div.slcbfield_3 input[type="checkbox"] {
	margin-left: 0;
	vertical-align: middle;
	margin: 0;
	padding: 0;
}

/* Select fields */
div.slselectfield_3 {
}

div#slform_3 div.slselectfield_3 label {
  display: block;  
  margin: 0 0 2px 0;
  padding: 0;	
}

div#slform_3 div.slselectfield_3 select {
	margin: 0;
  box-sizing: border-box;
}

/* Simple label_3 fields */
div.sllabelfield {
}

div#slform_3 div.sllabelfield_3 label {
  display: block;
  margin: 0 0 2px 0;
  padding: 0;	
}

/* Captcha fields */
div.slcaptchafield_3 {
}

div#slform_3 div.slcaptchafield_3 input[type="text"]{
	margin: 0;
  max-width: 300px;
}

div#slform_3 div.slcaptchafield_3 label {
  display: block;  
  margin: 0 0 2px 0;
  padding:0;
}

div#slform_3 div.slcaptchafield_3 img{
  vertical-align: top;
  height: 30px;
}

/* File fields */
div.slfilefield_3 {
  margin: 0;
  padding:0;
}

div#slform_3 div.slfilefield_3 label {
  display: block;  
  margin: 0 0 2px 0;
  padding: 0;	
}

div#slform_3 div.slfilefield_3 input[type="file"] {
	margin: 0;
	padding: 2px;
	width: 100%;
  box-sizing: border-box;
}

/* Textarea fields */
div.sltextareafield_3 {
}

div#slform_3 div.sltextareafield_3 label {
  display: block;
  margin: 0 0 2px 0;
  padding:0;
}

div#slform_3 div.sltextareafield_3 textarea{
  margin: 0 0 0 0px;
	width:100%;
	height: 4em;
	resize: none;
  box-sizing: border-box;
}

div#slform_3 div.slmsg_3 {  
  padding: 0;
  margin: 0;
  text-align: left;
  color: #FF0000;
	font: normal normal normal 12px Arial, Helvetica, sans-serif;
}

div#slform_3 div.slformmsg_3 {
  padding: 0;
  margin: 0 0 10px 0;
  text-align: left;
  color: #FF0000;
	font: normal normal bold 14px Arial, Helvetica, sans-serif;  
}

div#slform_3 #myButton_3 {
}
div#slform_3 #myButton_3:hover {
}
div#slform_3 #myButton_3:active {
}

/* Field specific styles */

#slfielddiv_3_0{
  width: 100%;
  margin-bottom: 20px;
  padding:0;
  max-width: 300px;
}

#slfielddiv_3_1{
  width: 100%;
  margin-bottom: 20px;
  padding:0;
  max-width: 300px;
}

#slfielddiv_3_2{
  width: 100%;
  margin-bottom: 20px;
  padding:0;
  max-width: 300px;
}

#slfielddiv_3_3{
  width: 100%;
  margin-bottom: 20px;
  padding:0;
  max-width: 300px;
}

#slfielddiv_3_4{
  width: 100%;
  margin-bottom: 20px;
  padding:0;
  max-width: 300px;
}
</style>
<!--[if lt IE 9]>
<style type="text/css">
div#slform_3 {
  width: 300px;
}
</style>

<![endif]-->

<!--[if lte IE 7]>
<style type="text/css">
div#slform_3 div.sltextfield_3 input[type="text"], input[type="email"], input[type="password"] {
  width: 95%;
}
div#slform_3 div.sltextareafield_3 textarea{
  width: 95%;
}

div#slform_3 #myButton_3 {
	padding: 0px 0px;
}
</style>
<![endif]-->



<script type="text/javascript">
function slvalidateform_3()
{
  var errorfound=false
  document.getElementById('slformmsg_3').innerHTML=''
  document.getElementById('slformmsg_3').style['display']="none"
  // Validate name
  document.getElementById('slmsg_3_0').innerHTML=''
  document.getElementById('slmsg_3_0').style['display']="none"
  var value=document.getElementById('slfieldinput_3_0').value
  value=sltrim_3(value)
  if (value=='')
  {
    document.getElementById('slmsg_3_0').innerHTML='Please enter your full name'
    document.getElementById('slmsg_3_0').style['display']="block"  
    if (!errorfound)
      document.getElementById('slfieldinput_3_0').focus()
    errorfound=true
  }


  // Validate email
  document.getElementById('slmsg_3_1').innerHTML=''
  document.getElementById('slmsg_3_1').style['display']="none"  
  var email=document.getElementById('slfieldinput_3_1').value
  email=sltrim_3(email)
  if ((email=='') || (!slvalidateemail_3(email)))
  {
    document.getElementById('slmsg_3_1').innerHTML='Please enter your email'
    document.getElementById('slmsg_3_1').style['display']="block"  
    if (!errorfound)
      document.getElementById('slfieldinput_3_1').focus()
    errorfound=true
  }
  // Validate custom1
  document.getElementById('slmsg_3_2').innerHTML=''
  document.getElementById('slmsg_3_2').style['display']="none"
  var value=document.getElementById('slfieldinput_3_2').value
  value=sltrim_3(value)
  if (value=='')
  {
    document.getElementById('slmsg_3_2').innerHTML='This field is required'
    document.getElementById('slmsg_3_2').style['display']="block"  
    if (!errorfound)
      document.getElementById('slfieldinput_3_2').focus()
    errorfound=true
  }


  // Validate password
  document.getElementById('slmsg_3_3').innerHTML=''
  document.getElementById('slmsg_3_3').style['display']="none"  
  var password=document.getElementById('slfieldinput_3_3').value
  password=sltrim_3(password)
  if (password=='')
  {
    document.getElementById('slmsg_3_3').innerHTML='This field is required'
    document.getElementById('slmsg_3_3').style['display']="block"  
    if (!errorfound)
      document.getElementById('slfieldinput_3_3').focus()
    errorfound=true
  }
  // Validate captcha
  document.getElementById('slmsg_3_4').innerHTML=''
  document.getElementById('slmsg_3_4').style['display']="none"
  var value=document.getElementById('slfieldinput_3_4').value
  value=sltrim_3(value)
  if (value=='')
  {
    document.getElementById('slmsg_3_4').innerHTML='Please enter the letters shown'
    document.getElementById('slmsg_3_4').style['display']="block"  
    if (!errorfound)
      document.getElementById('slfieldinput_3_4').focus()
    errorfound=true
  }


  if (errorfound)
  {
    document.getElementById('slformmsg_3').innerHTML='Please correct the errors below'
    document.getElementById('slformmsg_3').style['display']="block"    
    return(false)
  }
  document.getElementById('slformmsg_3').innerHTML=''
  document.getElementById('slformmsg_3').style['display']="none"    
  return(true)
}

function slvalidateemail_3(email)
{
  var ck_email = /^([\w-\'!#$%&amp;\*]+(?:\.[\w-\'!#$%&amp;\*]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,9}(?:\.[a-z]{2})?)$/i
  if (!ck_email.test(email))
    return(false)
  return(true)  
}

function sltrim_3(x)
{
    return x.replace(/^\s+|\s+$/gm,'');
}

function slseeifchecked_3(name,idprefix)
{
  var checked=false
  var controls=document.getElementsByName(name)
  for (i=0;i&lt;controls.length;i++)
  {
    // if not from this form then ignore
    if (controls[i].id.indexOf(idprefix)==-1)
      continue
    if (controls[i].checked)
    {
      checked=true
      break
    } 
  }
  // Also check for field[] if necessary
  if(!checked)
  {
    var controls=document.getElementsByName(name+'[]')
    for (i=0;i&lt;controls.length;i++)
    {
      // if not from this form then ignore
      if (controls[i].id.indexOf(idprefix)==-1)
        continue
      if (controls[i].checked)
      {
        checked=true
        break
      } 
    }  
  }
  return(checked)
}
&lt;/script>
&lt;?php
if (function_exists('slcaptchahead'))
  echo slcaptchahead();
?>
<script type="text/javascript">
function slvalidateform_3()
{
  var errorfound=false
  document.getElementById('slformmsg_3').innerHTML=''
  document.getElementById('slformmsg_3').style['display']="none"
  // Validate name
  document.getElementById('slmsg_3_0').innerHTML=''
  document.getElementById('slmsg_3_0').style['display']="none"
  var value=document.getElementById('slfieldinput_3_0').value
  value=sltrim_3(value)
  if (value=='')
  {
    document.getElementById('slmsg_3_0').innerHTML='Please enter your full name'
    document.getElementById('slmsg_3_0').style['display']="block"  
    if (!errorfound)
      document.getElementById('slfieldinput_3_0').focus()
    errorfound=true
  }


  // Validate email
  document.getElementById('slmsg_3_1').innerHTML=''
  document.getElementById('slmsg_3_1').style['display']="none"  
  var email=document.getElementById('slfieldinput_3_1').value
  email=sltrim_3(email)
  if ((email=='') || (!slvalidateemail_3(email)))
  {
    document.getElementById('slmsg_3_1').innerHTML='Please enter your email'
    document.getElementById('slmsg_3_1').style['display']="block"  
    if (!errorfound)
      document.getElementById('slfieldinput_3_1').focus()
    errorfound=true
  }
  // Validate custom1
  document.getElementById('slmsg_3_2').innerHTML=''
  document.getElementById('slmsg_3_2').style['display']="none"
  var value=document.getElementById('slfieldinput_3_2').value
  value=sltrim_3(value)
  if (value=='')
  {
    document.getElementById('slmsg_3_2').innerHTML='This field is required'
    document.getElementById('slmsg_3_2').style['display']="block"  
    if (!errorfound)
      document.getElementById('slfieldinput_3_2').focus()
    errorfound=true
  }


  // Validate password
  document.getElementById('slmsg_3_3').innerHTML=''
  document.getElementById('slmsg_3_3').style['display']="none"  
  var password=document.getElementById('slfieldinput_3_3').value
  password=sltrim_3(password)
  if (password=='')
  {
    document.getElementById('slmsg_3_3').innerHTML='This field is required'
    document.getElementById('slmsg_3_3').style['display']="block"  
    if (!errorfound)
      document.getElementById('slfieldinput_3_3').focus()
    errorfound=true
  }
  // Validate captcha
  document.getElementById('slmsg_3_4').innerHTML=''
  document.getElementById('slmsg_3_4').style['display']="none"
  var value=document.getElementById('slfieldinput_3_4').value
  value=sltrim_3(value)
  if (value=='')
  {
    document.getElementById('slmsg_3_4').innerHTML='Please enter the letters shown'
    document.getElementById('slmsg_3_4').style['display']="block"  
    if (!errorfound)
      document.getElementById('slfieldinput_3_4').focus()
    errorfound=true
  }


  if (errorfound)
  {
    document.getElementById('slformmsg_3').innerHTML='Please correct the errors below'
    document.getElementById('slformmsg_3').style['display']="block"    
    return(false)
  }
  document.getElementById('slformmsg_3').innerHTML=''
  document.getElementById('slformmsg_3').style['display']="none"    
  return(true)
}

function slvalidateemail_3(email)
{
  var ck_email = /^([\w-\'!#$%&\*]+(?:\.[\w-\'!#$%&\*]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,9}(?:\.[a-z]{2})?)$/i
  if (!ck_email.test(email))
    return(false)
  return(true)  
}

function sltrim_3(x)
{
    return x.replace(/^\s+|\s+$/gm,'');
}

function slseeifchecked_3(name,idprefix)
{
  var checked=false
  var controls=document.getElementsByName(name)
  for (i=0;i<controls.length;i++)
  {
    // if not from this form then ignore
    if (controls[i].id.indexOf(idprefix)==-1)
      continue
    if (controls[i].checked)
    {
      checked=true
      break
    } 
  }
  // Also check for field[] if necessary
  if(!checked)
  {
    var controls=document.getElementsByName(name+'[]')
    for (i=0;i<controls.length;i++)
    {
      // if not from this form then ignore
      if (controls[i].id.indexOf(idprefix)==-1)
        continue
      if (controls[i].checked)
      {
        checked=true
        break
      } 
    }  
  }
  return(checked)
}
</script>
<?php
if (function_exists('slcaptchahead'))
  echo slcaptchahead();
?>
<!--===================end of register scripts=======================-->
</head>
<body>


				<div id="register-content">
   <h3>REGISTER FOR MEMBERSHIP</h3>
Participate in ISKCON devotee chat
	<br>Get the online newsletter
	<br>Keep up to date with broadcasts
<br><em>(if you do no want the newsletter, it has an unsubscribe link )
<br><br>

<div id="slform_3">
<form action="" method="post" onSubmit="return slvalidateform_3()"><?php registeruser("CLIENT","0","/members/registerthanks.php","newuser.htm","newuseradmin.htm","Yes","NYYYYNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN"); ?>
<div id="slformmsg_3" class="slformmsg_3"><?php if ($registermsg!="") echo $registermsg; ?></div>

<div id="slfielddiv_3_0" class="sltextfield_3">
<label for="slfieldinput_3_0">Full name<em>*</em>
</label>
<input type="text" name="regname" id="slfieldinput_3_0" maxlength="50" value="<?php echo $regname; ?>">
<div id="slmsg_3_0" class ="slmsg_3"></div>
</div>

<div id="slfielddiv_3_1" class="sltextfield_3">
<label for="slfieldinput_3_1">Email<em>*</em>
</label>
<input type="email" name="regemail" id="slfieldinput_3_1" maxlength="50" value="<?php echo $regemail; ?>">
<div id="slmsg_3_1" class ="slmsg_3"></div>
</div>

<div id="slfielddiv_3_2" class="sltextfield_3">
<label for="slfieldinput_3_2">What temple do you attend?<em>*</em>
</label>
<input type="text" name="custom1" id="slfieldinput_3_2" maxlength="255" value="<?php echo $custom1; ?>">
<div id="slmsg_3_2" class ="slmsg_3"></div>
</div>

<div id="slfielddiv_3_3" class="sltextfield_3">
<label for="slfieldinput_3_3">password<em>*</em>
</label>
<input type="text" name="regpassword" id="slfieldinput_3_3" placeholder="password required" maxlength="255" value="<?php echo $regpassword; ?>">
<div id="slmsg_3_3" class ="slmsg_3"></div>
</div>

<div id="slfielddiv_3_4" class="slcaptchafield_3">
<label for="slfieldinput_3_4">Captcha<em>*</em>
</label>
<?php
if (function_exists('slshowcaptcha'))
{
echo slshowcaptcha();
}
else
{
?>
<input type="text" name="turing" id="slfieldinput_3_4" placeholder="" maxlength="5">
&nbsp;<img src="<?php echo $SitelokLocationURLPath; ?>turingimage.php" height="30" title="" alt="">
<?php
}
?>
<div id="slmsg_3_4" class ="slmsg_3"></div>
</div>

<input id="myButton_3" type="submit" value="Register" title="Register">
</form>
</div>
</div>
</body>
</html>
