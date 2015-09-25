<?php
/****************************
 *
 * @filename: gitbranch.php
 *
 ****************************/

function GitBranch()
{
  $stringfromfile = file('.git/HEAD', FILE_USE_INCLUDE_PATH);
  $firstLine = $stringfromfile[0]; //get the string from the array
  $explodedstring = explode("/", $firstLine, 3); //seperate out by the "/" in the string
  $branchname = $explodedstring[2]; //get the one that is always the branch name
  $branchname = str_replace(array("\r", "\n"), '', $branchname);
  switch ($branchname) {
    case 'devtest':
      $background = "#bcbf77";
      break;
    case 'staging':
      $background = "#685aff";
      break;
    case 'prod':
      $background = "#ffff5a";
      break;
    default:
      $branchname = "unexpected branch detected: " .$branchname;
      $background = "#ff625a";
      break;
  }
  echo "<div style='clear: both; width: 100%; font-size: 14px; font-family: Helvetica; color: #30121d; background: ", $background, "; padding: 20px; text-align: center;'>";
  echo "<span style='color:#fff; font-weight: bold; text-transform: uppercase;'>", $branchname, "</span>";
  echo "</div>";
} 
?>
