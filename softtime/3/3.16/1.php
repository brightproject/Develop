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

  echo "����� �������� ����� � ������� - (".
        (strlen($min) - 1)." ��������) $min<br>";
  echo "����� ������� ����� � �������  - (".
        (strlen($max) - 1)." ��������) $max<br>";
?>
