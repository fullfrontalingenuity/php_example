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
  $version = file_get_contents('./include/version.txt');
echo $homepage;
  switch ($branchname) {
    case 'devtest':
      $background = "#bcbf77";
      break;
    case 'staging':
      $background = "#685aff";
      break;
    case 'prod':
      $background = "#b20000";
      break;
    default:
      $branchname = "unexpected branch: " .$branchname;
      $background = "#ffffff";
      break;
  }
  echo "<div style='clear: both; display block; font-size: 14px; font-family: Helvetica; color: #30121d; background: ", $background, "; padding: 20px; text-align: center;'>";
  echo "<span style='color:#fff; font-weight: bold; text-transform: uppercase;'>", $branchname, "</span>", " ", "<span style='color:#fff; font-weight: bold; text-transform: lowercase;'>", "(", $version, ")", "</span>";
  echo "</div>";
}
?>
