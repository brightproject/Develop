<?php
  // ����� FTP-�������
  $ftp_server = "ftp.server.ru";
  // ������������
  $ftp_user = "user";
  // ������
  $ftp_password = "password";
  // ������������� ����� ���������� ������� 120 �
  set_time_limit(120);
  // �������� ���������� ���������� � FTP-�������� 
  $link = ftp_connect($ftp_server); 
  if(!$link) exit("� ���������, �� ������� ���������� 
                   ���������� � FTP-�������� $ftp_server");
  // ������������ ����������� �� �������
  $login = ftp_login($link, $ftp_user, $ftp_password);
  //$login = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
  if(!$login) exit("� ���������, �� ������� ������������������ ��
            �������. ��������� ��������������� ������.");
?>
