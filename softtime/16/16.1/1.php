<?php
  $x = 4; 
  $y = 5;

  echo "до:<br>";
  echo "x = $x<br>";
  echo "y = $y<br>";

  $x = $x + $y; 
  $y = $x - $y; 
  $x = $x - $y; 

  echo "после:<br>";
  echo "x = $x<br>";
  echo "y = $y<br>";
?>
