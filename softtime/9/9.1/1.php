<?php
  // ��������� �������� � ���������� �����
  $content = file_get_contents("http://www.softtime.ru/");
  // ��������� ���������� �������� � �����
  $fd = fopen("url.txt","w");
  fwrite($fd,$content);
  fclose($fd);
?>
