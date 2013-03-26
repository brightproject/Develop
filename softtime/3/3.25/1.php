<?php
  // ����������� ������� �������� ��������
  // � ������������ �������� �����������
  function size_dir($directory, $size = 0)
  {
    $dir = opendir($directory);
    while(($file = readdir($dir)))
    {
      // ���� ������� readdir() ������� ���� - ��������� ��� ������
      if(is_file("$directory/$file"))
      {
        $size += filesize("$directory/$file");
      }
      // ���� ������� readdir() ������� ������� � ��
      // �� ����� �������� ��� ������������� - ������������
      // ����������� ����� full_del_dir() ��� ����� ��������
      else if (is_dir("$directory/$file") &&
               $file != "." &&
               $file != "..")
      {
        size_dir("$directory/$file", $size);  
      }
   }
   closedir($dir);

   return $size;
  }

  // ������������ ����� �������� ��������
  echo size_dir(".");
?>
