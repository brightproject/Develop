<?php
  // ��������� ���������� ���������
  $count = file_get_contents("count.txt");
  // ����������� �������� �� �������
  $count = intval($count) + 1;
  // ��������� ����
  file_put_contents("count.txt", $count);

  // ��������� ������������ �����������
  // �� ������ ����� blue.jpg
  $img = imagecreatefromjpeg("blue.jpg");

  // ����� ������ ���� ��� ������
  $color = imagecolorallocate($img,0,0,0);

  // ��������� ����� �� �����������
  imagestring($img, 3, 27, 10, $count, $color);

  // ������� ����������� � ���� ��������
  header("Content-type: image/jpeg");
  imagejpeg($img);
?>