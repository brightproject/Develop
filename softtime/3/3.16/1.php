<?php 
  $fd = fopen("linux.words", "r");

  $current = fgets($fd);
  $min = $current;
  $max = $current;

  while(!feof($fd))
  {
    $current = fgets($fd);
    if(strlen($current) > strlen($max)) $max = $current;
    if(strlen($current) < strlen($min)) $min = $current;
  }

  fclose($fd);

  echo "Самое короткое слово в словаре - (".
        (strlen($min) - 1)." символов) $min<br>";
  echo "Самое длинное слово в словаре  - (".
        (strlen($max) - 1)." символов) $max<br>";
?>
