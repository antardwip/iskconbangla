<?php

ob_start();


$host="db608819081.db.1and1.com";        // Database host
$db_name="db608819081";          // Database name
$username="dbo608819081";         // Database username
$password="lordjslogin";     // Database user password
$tbl_name="sitelok"; // Table name 


// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// Define $myusername and $mypassword 
$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword']; 

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT * FROM $tbl_name WHERE Username='$myusername' and Passphrase='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
session_register("myusername");
session_register("mypassword"); 

// header("location:login_success.php");

$row=mysql_fetch_assoc($result);
echo "{\"result\": \"OK\",\n";
echo "\"Username\": \"".$row['Username']."\",\n";
echo "\"Name\": \"".$row['Name']."\",\n";
echo "\"Usergroups\": \"".$row['Usergroups']."\",\n";
echo "\"Custom1\": \"".$row['Custom1']."\"}\n";

}
else {
echo "{\"result\": \"Wrong Username or Password\"}";
}

ob_end_flush();
?>