<?php
  // ��������� ������� �������
  $dir = opendir(".");
  // � ����� ������� ��� ����� � ��������
  while (($file = readdir($dir)) !== false)
  {
    // ���� ������� ������ �������� ������,
    // ������� ���
    if(is_file($file)) unlink($file);
  }
  // ��������� �������
  closedir($dir);
  echo "��� ���������� �������� ����������";
?>