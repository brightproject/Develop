<?php
  // ������������� ���������� � ����� ������
  include "config.php";
  // ������� ��� ������ ������
  $query = "DELETE FROM mailerlist 
            WHERE putdate > NOW() - INTERVAL 5 MINUTE";
  if(!mysql_query($query)) exit(mysql_error());
  // ���������, �� ��������� �� ������������ ������
  // �� ��������� 5 �����
  $query = "SELECT COUNT(*) FROM mailerlist
            WHERE ip = INET_ATON($_SERVER[REMOTE_ADDR])";
  $cnt = mysql_query($query);
  if(!$cnt) exit(mysql_error());
  $total = mysql_result($cnt,0);
  if($total > 0) exit("����������� �������� ���� ������
                       ������ ��� � 5 �����. ����������
                       ��������������� �������� �����");
  // ���������� ������, ���� ��� ������� ����������,
  // �������� � ���� ������ IP-����� ���������� � �����
  // ��� ��������� � ��������� �������.
  if(mail($mail, $theme, $body))
  {
    $query = "INSERT INTO mailerlist 
              VALUES(INET_ATON($_SERVER[REMOTE_ADDR]), NOW())";
    if(!mysql_query($query)) exit(mysql_error());
  }
  else
  {
    exit("� ���������, ������ �� ���� ����������");
  }
?>
