<?php
  // ������ ���������� ����� archive.tar
  // � ���������� $content
  $content = file_get_contents("archive.tar");
  // ��������� ���� archive.tar.gz
  $zf = gzopen("archive.tar.gz", "w9");
  // ���������� ������ ����
  gzwrite($zf, $content);
  // ��������� ����
  gzclose($zf);
?>
