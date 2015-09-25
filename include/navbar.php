<?php
  $menu = array(
    'home'  => array('text'=>'Home',  'url'=>'?p=home'),
    'away'  => array('text'=>'Away',  'url'=>'?p=away'),
    'about' => array('text'=>'About', 'url'=>'?p=about'),
  );

  class CNavigation {
    public static function GenerateMenu($items, $class) {
      $html = "<nav class='$class'>\n";
      foreach($items as $key => $item) {
        $selected = (isset($_GET['p'])) && $_GET['p'] == $key ? 'selected' : null; 
        $html .= "<a href='{$item['url']}' class='{$selected}'>{$item['text']}</a>\n";
      }
      $html .= "</nav>\n";
      return $html;
    }
  };
  echo CNavigation::GenerateMenu($menu);
?>
