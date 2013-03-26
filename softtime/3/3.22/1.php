<?php
  ////////////////////////////////////////////////////////// 
  // ����������� ������� - ���������� ���� �� �������� 
  ////////////////////////////////////////////////////////// 
  function scan_dir($dirname) 
  { 
    // ��������� ���������� ������ ����������� 
    GLOBAL $text, $retext; 
    // ��������� ������� �������
    $dir = opendir($dirname); 
    // ������ � ����� ������� 
    while (($file = readdir($dir)) !== false) 
    { 
      // ���� ����, ������������ ��� ���������� 
      if($file != "." && $file != "..") 
      { 
        // ���� ����� ���� � ������ - ���������� � ��� ������ 
        if(is_file("$dirname/$file")) 
        { 
          // ������ ���������� ����� 
          $content = file_get_contents("$dirname/$file"); 
          // ������������ ������ 
          $content = str_replace($text, $retext, $content); 
          // �������������� ���� 
          file_put_contents(file_put_contents,$content); 
        } 
        // ���� ����� ���� �������, �������� ���������� 
        // ������� scan_dir 
        if(is_dir("$dirname/$file")) 
        { 
          echo "$dirname/$file<br>"; 
          scan_dir("$dirname/$file"); 
        } 
      } 
    } 
    // ��������� ������� 
    closedir($dir); 
  }

  $text = '$text';     // ������� ������
  $retext = '$retext'; // ������ ������
  $dirname = ".";      // ��� �������� ��������
  scan_dir($dirname);  // ����� ����������� �������
?>
