<?php
  // ���������� ��������������� �����
  require_once("function.copy_ftp_list.php");

  // ������ ����������
  $ftp_handle_to = ftp_connect("XXX.XXX.XXX.XXX");
  if (!$ftp_handle_to)
  {
    exit(" ������ ���������� c FTP-�������� ����������");
  }

  // ������-��������
  $ftp_handle_from = ftp_connect("XXX.XXX.XXX.XXX");
  if (!$ftp_handle_from)
  {
    exit(" ������ ���������� c FTP-�������� ����������");
  }

  // �������� ����� � ������ ������� �� ������
  copy_ftp_list("/", "/", $ftp_handle_to, $ftp_handle_from);
?>
