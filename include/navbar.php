<?php

  require_once("./include/membersite_config.php");

  function modifyNavbar($items) {
    $ref = isset($_GET['p']) && isset($items[$_GET['p']]) ? $_GET['p'] : null;
    if($ref) {
      $items[$ref]['class'] .= 'selected'; 
    }
    return $items;
  }

  if($fgmembersite->CheckLogin()) {
    $menu = array(
      'callback' => 'modifyNavbar',
      'items' => array(
        'home'  => array('text'=>'Home',  'url'=>'/?p=home', 'class'=>null),
        'test' => array('text'=>'Test', 'url'=>'/access-controlled.php?p=test', 'class'=>null),
        'logout' => array('text'=>'Logout', 'url'=>'/logout.php?p=logout', 'class'=>null),
      ),
    );    
  } else {
    $menu = array(
      'callback' => 'modifyNavbar',
      'items' => array(
        'home'  => array('text'=>'Home',  'url'=>'/?p=home', 'class'=>null),
        'register'  => array('text'=>'Register',  'url'=>'/register.php?p=register', 'class'=>null),
        'confirm' => array('text'=>'Confirm', 'url'=>'/confirmreg.php?p=confirm', 'class'=>null),
        'login' => array('text'=>'Login', 'url'=>'/login.php?p=login', 'class'=>null),
      ),
    );
  }

  class CNavigation {
    public static function GenerateMenu($menu, $class) {
      if(isset($menu['callback'])) {
        $items = call_user_func($menu['callback'], $menu['items']);
      }
      $html = "<nav class='$class'>\n";
      foreach($items as $item) {
        $html .= "<a href='{$item['url']}' class='{$item['class']}'>{$item['text']}</a>\n";
      }
      $html .= "</nav>\n";
      return $html;
   }    
  };
  echo "<nav class='navbar'>";
  echo CNavigation::GenerateMenu($menu, $class);
  echo "</nav>";
?>
