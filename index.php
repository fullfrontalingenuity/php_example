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
  </head>
  <body>
    <form action="<?php $_PHP_SELF ?>" method="GET">
 Name: <input type="text" name="name" />
 Age: <input type="text" name="age" />
      <input type="submit" />
    </form>
    <form class="login">
      <fieldset>
        <legend class="legend">Login</legend>
          <div class="input">
            <input type="email" placeholder="Email" required />
            <span><i class="fa fa-envelope-o"></i></span>
          </div>

          <div class="input">
            <input type="password" placeholder="Password" required />
            <span><i class="fa fa-lock"></i></span>
          </div>

          <button type="submit" class="submit"><i class="fa fa-long-arrow-right"></i></button>

      </fieldset>
      <div class="feedback">
login successful <br />
redirecting...
      </div>
    </form>
  </body>
</html>
<?php
phpinfo()
?>
