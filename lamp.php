<html>
<body>

<?php
echo "<h1>Linux Apache MySQL PHP (LAMP) Validation</h1>";
echo "<b>Current Time:</b> " . date('Y-m-d H:i:s') . "<br>";
echo "<b>Linux:</b> " . php_uname() . "<br>";
echo "<b>Apache</b> : " . apache_get_version() . "<br>";
echo "<b>MySQL</b> : " . mysql_get_server_info() . "<br>";
echo "<b>PHP</b> : " . phpversion() . "<br>";
echo "<br>";
?>

<h3>MySQL logon credentials</h3>

<form action="lamp_validate.php" method="post">
<p>
User: <input type="text" name="user"><br>
Password: <input type="text" name="password"><br></p>
<input type="submit">
</form>

</body>
</html>

