<?php
  // ��������� ����������� ������ 
  // �� cookie
  $filename = unserialize(stripcslashes($_COOKIE['filename']));
  // ������� ���������� �������
  echo "<pre>";
  print_r($filename);
  echo "</pre>";
?>
