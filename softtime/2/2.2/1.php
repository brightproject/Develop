<?php
  // ��������� ���������� �� ����� index.htm
  $content = file_get_contents("index.htm");

  // ���������� ���������
  $search = "|<img[^>]+>|si";
  // ������
  $replace = "";

  // ������������ �������� ����� � ����� ������ � ���� ��������
  echo preg_replace($search, $replace, $content);
?>
