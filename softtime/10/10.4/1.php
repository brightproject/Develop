<?php
  // ������������� ���������� � FTP-��������
  require_once("config.php");
  // ������������� ����� ������� � ��������
  ftp_chmod($link, 0755, "logs");
  // ������������� ����� ������� � �����
  ftp_chmod($link, 0644, "/path/file.zip");
?>
