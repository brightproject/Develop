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
  // � ����� ������������ �������� �����
  foreach($listemail as $email)
  {
    mail(trim($email), $theme, $body);
  }
?>
