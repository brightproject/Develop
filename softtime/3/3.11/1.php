<?php
  // ��� �����
  $filename = "text.txt";
  // �������� ���������� ����� count.txt
  // � ������ $lines
  $lines = file($filename);
  // ���������� ��������� ������ ������� $lines
  $index = rand(0, count($lines) - 1);
  // ������� ������ ����� $index
  echo $lines[$index];
?>
