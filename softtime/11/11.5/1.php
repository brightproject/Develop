<?php
// ������� �������� ���������: ��������� �����, ����� ������ � ��������,
// ���������� ������, ��������� �����
function send($server, $to, $from, $subject="",$msg, $headers="") 
{ 
   // ��������� ���� ��������� 
  $headers="To: $to\nFrom: $from\nSubject: $subject\nX-Mailer: My 
             Mailer\n$headers";
  // ����������� � �������� �� ����� 25, ��� ���� ���������� $fp 
  // �������� ���������� ���������� 
  $fp = fsockopen($server, 25, &$errno, &$errstr, 30);
  if (!$fp) die("Server $server. Connection failed: $errno, $errstr");
  // ���� ���������� ������ �������, ���������� ������ ������ � �����,
  // �.�. ��������� ��� SMTP-����� � ��������� �������� $server
  fputs($fp,"HELO $server\n"); // ����������� � ��������
  // �������� ���� from
  fputs($fp,"MAIL FROM: $from\n"); 
  // �������� ���� To
  fputs($fp,"RCPT TO: $to\n");
  // �������� ���� Data
  fputs($fp,"DATA\n");
  // �������� ���������, ������� ���������� � ���������� $msg 
  fputs($fp,"$msg\r\n.\r\n");
  // �������� ���������
  fputs($fp,$this->headers);
  if (strlen($headers))
    fputs($fp,"$headers\n");
  // ��������� SMTP-�����
  fputs($fp,"\n.\nQUIT\n");
  // ��������� ����������
  fclose($fp); 
  } 
}
// �������� ���������    
send('mx2.yandex.ru', // �������� ������������, � �������, ������� yandex
     'mail@yandex.ru', // ����
     'mail@softtime.ru',  // �� ����
     'Hello!',  // ����
     '������!'); // ���������  
?>
