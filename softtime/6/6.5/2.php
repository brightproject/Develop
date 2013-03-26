<?php
  $hostname = "localhost";
  $path = "/test/1.php";

  // ������������� ����������, ��� ��������
  // �������� � ��������� $hostname
  $fp = fsockopen($hostname, 80, $errno, $errstr, 30); 
  // ��������� ���������� ��������� ����������
  if (!$fp) echo "$errstr ($errno)<br />\n"; 
  else
  { 
    // ��������� HTTP-��������� ��� ��������
    // ��� �������
    $headers = "GET $path HTTP/1.1\r\n"; 
    $headers .= "Host: $hostname\r\n"; 
    // ����������� cookie
    $headers .= "Cookie: name=cheops; admin=1;\r\n";
    $headers .= "Connection: Close\r\n\r\n"; 
    // ���������� HTTP-������ �������
    fwrite($fp, $headers); 
    // �������� �����
    while (!feof($fp))
    { 
      $line .= fgets($fp, 1024); 
    } 
    fclose($fp); 
  } 
  echo $line;
?>
