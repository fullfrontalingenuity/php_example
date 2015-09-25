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
  $background = "#ffffff;"
  switch ($branchname) {
    case "devtest":
      $background = "#bcbf77";
      break;
    case "staging":
      $background = "#ffffff";
      break;
    case "prod":
      $background = "#aaaaaa";
      break;
    default:
      $background = "#ffffff";
      echo "unexpected branch: ";
  }
  echo "<div style='clear: both; width: 100%; font-size: 14px; font-family: Helvetica; color: #30121d; background: ", $background, "; padding: 20px; text-align: center;'>";
  echo "<span style='color:#fff; font-weight: bold; text-transform: uppercase;'>";
  echo $branchname;
  echo "</span>";
  echo "</div>";
} 
?>
