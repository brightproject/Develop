<?php 
  // ������������� ���������� � ����� ������
  include "config.php";
  // ��� ����� � SQL-������������ 
  $filename = "catalog.sql"; 
  // ��������� ��� � ������ � ����� 
  $fp = fopen($filename, "r"); 
  $contents = fread($fp,filesize($filename)); 
  fclose($fp); 
  // ��������� ���������� ����� �� ����� � ������� 
  $quer = preg_split("#;[\s]*\r\n)#is", $contents); 
  // ��������� SQL-������� 
  foreach($quer as $query) 
  { 
    if(!mysql_query($query)) exit(mysql_error()); 
  } 
?>
