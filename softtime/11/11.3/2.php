<?php
  // ���� ������
  $theme = "���� ������";
  // ���������� ������
  $body = "���� ������";
  // ��� ����� � e-mail ��������
  $filename = "mail.txt";
  // ������ ���������� ����� � ������ $listemail
  // ��� ������ ������� file()
  $listemail = file($filename);
  // � ����� ��������� �������� ���������
  $header = "";
  foreach($listemail as $email)
  {
    $header .= "Bcc: ".trim($email)."\r\n";
  }
  $header .= "\r\n";
  mail(trim($listemail[0]), $theme, $body, $header);
?>
