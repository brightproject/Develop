<?php 
  // ��� ����� 
  $filename = "site.rar"; 
  // ��������� ���� �� ����� �� 10 000 ����
  $piece = 10000; 
  // ��������� �������� ���� ��� ������ 
  $fp = fopen($filename, "r"); 
  // ������ ���������� ����� � ����� 
  $bufer = fread($fp, filesize($filename)); 
  // ��������� ���� 
  fclose($fp); 
  // ������������ ���������� ������, �� ������� ���������� ������� ���� 
  $count = (int)filesize($filename)/$piece; 
  if((float)(filesize($filename)/$piece) - $count != 0) $count++; 
  // � ����� ��������� ���������� ����� � ���������� 
  // $bufer �� ����� 
  for($i=0; $i<$count; ++$i) 
  { 
    $part = substr($bufer,$i*$piece,$piece); 
    // ��������� ������� ����� � ��������� ����� 
    $fp = fopen("site.tm".$i,"w"); 
    fwrite($fp,$part); 
    fclose($fp); 
  } 
?>
