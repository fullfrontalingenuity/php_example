<?php
require_once("./include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
  <title>php_example</title>
  <link rel="STYLESHEET" type="text/css" href="style/fg_membersite.css">
</head>
<body>
<?php
  include './include/header.php';
?>
<div id='fg_membersite_content'>
<h2>Test MySQL</h2>
Use root MySQL password to start a test of MySQL using php.
</div>

<?php

// Validate minimal LAMP functionality
// 2014-10-27  Ron Compos

//phpinfo();
$dbserver   = "localhost";
$dbuser     = "root";
$dbpw       = "";

$db         = "test";
$table      = "pet";

echo "<h1>Linux Apache MySQL PHP (LAMP) Validation</h1>";
echo "<b>Logged in as:</b> " . $fgmembersite->UserFullName() . "<br>";
echo "<b>Current Time:</b> " . date('Y-m-d H:i:s') . "<br>";
echo "<b>Linux:</b> " . php_uname() . "<br>";
echo "<b>Apache</b> : " . apache_get_version() . "<br>";
echo "<b>MySQL</b> : " . mysql_get_server_info() . "<br>";
echo "<b>PHP</b> : " . phpversion() . "<br>";
echo "<br>";

if (isset($_POST["password"])){ 

$user= $_POST["user"];
if($user){
   $dbuser = $user;
   echo "<b>MySQL user</b>: $dbuser<br>";
} else {
   echo "<b>MySQL user</b>: $dbuser<br>";
}

$password = $_POST["password"];
if($password){
   $dbpw = $password;
   echo "<b>User-input MySQL password</b><br>";
} else {
   echo "<b>Default MySQL password</b><br>";
}

//echo "<b>MySQL pw:</b> $dbpw<br>";

echo "<b>Connect to database server:</b> " . $dbserver . "<br>";
$link = mysql_connect($dbserver, $dbuser, $dbpw) 
   or die('<b>Could not connect:</b> ' . mysql_error() . '<br>');
echo "<b>Connected successfully</b><br>";

$r0 = mysql_select_db( $db );
if (!$r0) {
    echo "<b>Cannot select database</b><br>";
    echo "<b>Database test must exist!</b><br>";
    trigger_error(mysql_error(), E_USER_ERROR); 
} else {
    echo "<b>Database selected:</b> " . $db . "<br>";
}
echo "<br>";

echo "<b>Create table " . $table . "</b><br>";
mysql_query("CREATE TABLE IF NOT EXISTS " . $table . "(Name VARCHAR(20), Handler VARCHAR(20), Species VARCHAR(20), Gender CHAR(1), Bday DATE, Food VARCHAR(20));") 
   or die(mysql_error());  

// Describe table.
$query = "DESCRIBE " . $table;
$res= mysql_query($query) or die('<b>Query failed:</b> ' . mysql_error() . '<br>');
if($res) {
   echo "<table border=1>\n";
   for($i = 0; $i < mysql_num_fields($res); $i++) {
      print '<th>' . mysql_field_name($res, $i) . '</th>';
   }
   while ($line = mysql_fetch_array($res, MYSQL_ASSOC)) {
       echo "\t<tr>\n";
       foreach ($line as $col_value) {
           echo "\t\t<td>$col_value</td>\n";
       }
       echo "\t</tr>\n";
   }
   echo "</table>\n";
}

echo "<br>";
// Populate table with sample data values.
echo "<b>Insert values.</b><br>";
mysql_query("INSERT INTO " . $table . " VALUES ('Oscar','Connie','cat','f','1999-03-30','sparrow');")
   or die(mysql_error());  
mysql_query("INSERT INTO " . $table . " VALUES ('Missy','SueEllen','giraffe','f','1993-02-04','capncrunch');")
   or die(mysql_error());  
mysql_query("INSERT INTO " . $table . " VALUES ('Orson','Deidre','hippopotamus','m','1994-03-17','birds');")
   or die(mysql_error());  
mysql_query("INSERT INTO " . $table . " VALUES ('Bear','Jenn','dog','m','2002-06-26','berries');")
   or die(mysql_error());  
mysql_query("INSERT INTO " . $table . " VALUES ('Stella','Calvin','monkey','f','2006-06-03','bananas');")
   or die(mysql_error());  
mysql_query("INSERT INTO " . $table . " VALUES ('Calvin','RCompos','dog','m','2004-01-10','greenchili');")
   or die(mysql_error());  

// Print formatted output from query.
echo "<b>select * from pet</b><br>";
$res = mysql_query("select * from " . $table . ";")
   or die(mysql_error());  
if($res) {
   echo "<table border=1>\n";
   for($i = 0; $i < mysql_num_fields($res); $i++) {
      print '<th>' . mysql_field_name($res, $i) . '</th>';
   }
   while ($line = mysql_fetch_array($res, MYSQL_ASSOC)) {
       echo "\t<tr>\n";
       foreach ($line as $col_value) {
           echo "\t\t<td>$col_value</td>\n";
       }
       echo "\t</tr>\n";
   }
   echo "</table>\n";
}

echo "<b>Drop table " . $table . "</b><br>";
mysql_query("DROP TABLE " . $table . ";")
   or die(mysql_error());  

mysql_close($link);

echo "<h3>Successful PHP and MySQL validation!</h3><br>";

}else{

  echo "<form action=\"", $_SERVER['PHP_SELF'],"?p=test"\" method=\"post\">";
  echo "<p>";
  echo "root MySQL password: <input type=\"password\" name=\"password\"><br></p>";
  echo "<input type=\"submit\">";
  echo "</form>";

}

?>

</body>
</html>
