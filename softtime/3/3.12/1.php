<?php
  // ���� ������ � �������� 7
  $index = 7;
  // ��� �����
  $filename = "text.txt";
  // ��������� ���� ��� ������
  $fd = fopen($filename, "r");
  // ������ ���������� �����
  $bufer = fread($fd, filesize($filename));
  // ��������� ����
  fclose($fd);
  // ������� ������ � �������� $index
  $bufer = preg_replace("|$index ([^\n]*)|",
                        "$index ���������������� �� C/C++",
                        $bufer);
  // ��������� ��������� � �����
  $fd = fopen($filename, "w");
  fwrite($fd, $bufer);
  fclose($fd);
?>
