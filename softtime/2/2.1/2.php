<?php
  // ��������� ���������� �� ����� index.htm
  $content = file_get_contents("index.htm");
  // ������������ �������� ����� � ����� ������ � ���� ��������
  echo strip_tags($content);
?>
