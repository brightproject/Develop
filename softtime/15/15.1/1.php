<?php
  // ��������� ������������ �����������
  // �� ������ ����� blue.jpg
  $img = imagecreatefromjpeg("blue.jpg");
  // ������� ����������� � ���� ��������
  header("Content-type: image/jpeg");
  imagejpeg($img);
?>
