<?php
  // ��������� ���� archive.tar
  $filename = "archive.tar";
  $fd = fopen($filename,"r");
  if(!$fd) exit("���������� ������� ���� archive.tar");
  $str = fread($fd,filesize($filename));
  fclose($fd);
  // ������������� ������ �� ������
  $arr = unserialize($str);
  // ������� �����
  foreach($arr as $file => $contents)
  {
    $fd = fopen($file, "w");
    if(!$fd) exit("���������� ������� ���� $file");
    fwrite($fd, $contents);
    fclose($fd);
  }
?>
