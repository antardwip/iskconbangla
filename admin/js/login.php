<?php
require_once("../slpw/slloginform.php");
$groupswithaccess="PUBLIC";
$loginpage=$slpagename;
$logoutpage=$slpagename;
$loginredirect=2;
require_once("../slpw/sitelokpw.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>Page with login</title>
<?php sl_loginformhead(5,false); ?>
</head>
<body>
This page can be seen by anyone who visits.
<br>
<br>
<?php if ($slpublicaccess) { ?>
<?php sl_loginformbody(5,false,$msg); ?>
<?php } // Hide ?>
<p>This text can be seen by all visitors</p>
<?php if (!$slpublicaccess) { ?>
<p>This part can only be seen by logged in members.</p>
<p>You are logged in as <?php echo $slusername; ?></p>
<p>click here to <a href="<?php siteloklogout()?>">Logout</a></p>
<?php } ?>
</body>
</html>
