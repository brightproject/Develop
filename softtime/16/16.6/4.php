<?php
  // ������ ���������� ����� archive.tar.gz
  // � ������ $arr, ������ ������� ��������
  // ������������� ����� ������ ��������� �����
  // archive.tar
  $arr = gzfile("archive.tar.gz");
  // ��������� ��������� ���������� $content
  // � ���� archive.tar
  $fd = fopen("archive.tar","w");
  fwrite($fd, implode("",$arr));
  fclose($fd);
?>
