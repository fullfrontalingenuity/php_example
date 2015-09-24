<?php
  if( $_GET["name"] || $_GET["age"] )
  {
    echo "Welcome ". $_GET['name']. "<br />";
    echo "You are ". $_GET['age']. " years old.";
    exit();
  }
?>
<html>
  <head>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <script src="script.js"></script>
  </head>
  <body>
    <form id='login' action='<?php $_PHP_SELF ?>' method='post' accept-charset='UTF-8'>
      <fieldset >
        <legend>Login</legend>
        <input type='hidden' name='submitted' id='submitted' value='1'/>
 
        <label for='username' >MySQL Username*:</label>
        <input type='text' name='username' id='username'  maxlength="50" />
 
        <label for='password' >Password*:</label>
        <input type='password' name='password' id='password' maxlength="50" />
 
        <input type='submit' name='Submit' value='Submit' />
 
      </fieldset>
    </form>
    <p>
    <?php
      phpinfo()
    ?>
    </p>
  </body>
</html>
