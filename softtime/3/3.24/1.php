<?php
  // ����������� ������� �������� ��������
  // � ������������ �������� �����������
  function full_del_dir($directory)
  {
    $dir = opendir($directory);
    while(($file = readdir($dir)))
    {
      // ���� ������� readdir() ������� ���� - ������� ���
      if(is_file("$directory/$file")) unlink("$directory/$file");
      // ���� ������� readdir() ������� ������� � ��
      // �� ����� �������� ��� ������������� - ������������
      // ����������� ����� full_del_dir() ��� ����� ��������
      else if (is_dir("$directory/$file") &&
               $file != "." &&
               $file != "..")
      {
        full_del_dir("$directory/$file");  
      }
   }
   closedir($dir);
   rmdir($directory);
   echo("������� ������� ������");
  }
  
  // ������� ������� temp
  full_del_dir("temp");
?> 
