<?php
  // ������������� ���������� � FTP-��������
  require_once("config.php");

  // ������� ������ ������ �� FTP-�������
  echo get_ftp_size($link, "/");
?>
