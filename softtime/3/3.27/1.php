<?php
  // ���� � ��������
  $path = "����_�_��������_����������/";
  // ��������� �������
  $dir = opendir($path);
  // ������ ���������� ��������
  while((($file = readdir($dir)) !== false))
  {
    // ���� ������� ������ �������� ������,
    // �������� ���� � ���� �� ��������� ������
    $filename[] = $path.$file;
  }
  // ��������� �������
  closedir($dir);

  // �������� ��������� ������ �� �������
  $index = rand(0, count($filename) - 1);
  // ������� ��������� ����
  echo "<img src=".$filename[$index].">";
?>
