<?php
  // ������������� ���������� � FTP-��������
  require_once("config.php");
  // ���������� �������� ����� �� FTP-������
  $ret = ftp_nb_put($link, "/path/file.zip", "C:\\file.zip", FTP_BINARY);
  // ���� ��������
  while ($ret == FTP_MOREDATA)
  {
    // ������� �����, ����� ������������
    // ����, ��� ������� ����
    echo ".";
    // ���������� ��������
    $ret = ftp_nb_continue($link);
  }
  if ($ret != FTP_FINISHED)
     exit ("<br>�� ����� �������� ����� ��������� ������...");
?>
