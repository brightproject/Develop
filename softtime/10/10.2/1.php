<?php
  // ������������� ���������� � FTP-��������
  require_once("config.php");
  // �������� ��� ����� ��������� ��������
  $file_list = ftp_rawlist($link, "/");
  // ������� ������ $file_list
  foreach($file_list as $line) echo $line."<br>";
?>
