<?php
  // �������� ���������� ��������� ��������
  $fd = fopen("http://www.softtime.ru/", "r");
  if(!$fd) exit("������������� �������� �� �������");
  $content = "";
  // ������ ����������� ����� � ���������� $content
  while (!feof ($fd))
  {
    $content .= fgets($fd, 1024);
  }
  // ������� �������� ��������� �����
  fclose ($fd);   

  // ��������� ���������� �������� � �����
  $fd = fopen("url.txt", "w");
  fwrite($fd, $content);
  fclose($fd);
?>
