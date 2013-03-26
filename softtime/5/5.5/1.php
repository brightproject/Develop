<?php 
  $fp = fsockopen("alpha.prao.psn.ru", 
                  13, 
                  $errno, 
                  $errstr,
                  5);
  if (!$fp) exit("ERROR: $errno - $errstr"); 
  else echo fread($fp, 26); 
  fclose($fp); 
?>
