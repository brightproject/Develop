<?php
  $hostname = "localhost";
  $path = "/test/handler.php";
  $line = "";

  // �������� ������� POST ��� ������������ (admin),
  // ��� ������ (admin), ������� ���� session_id ($SID)
  // � ���������� �������� cookie PHPSESSID
  // ������������� ����������, ��� ��������
  // �������� � ��������� $hostname
  $fp = fsockopen($hostname, 80, $errno, $errstr, 30); 
  // ��������� ���������� ��������� ����������
  if (!$fp) echo "$errstr ($errno)<br />\n"; 
  else
  { 
    // ������ POST-�������
    $data = "name=admin&pass=admin&\r\n\r\n";
    // ��������� HTTP-��������� ��� ��������
    // ��� �������
    $headers = "POST $path HTTP/1.1\r\n"; 
    $headers .= "Host: $hostname\r\n"; 
    $headers .= "Content-type: application/x-www-form-urlencoded\r\n";
    $headers .= "Content-Length: ".strlen($data)."\r\n";
    // ����������� �������
    $headers .= "Referer: http://localhost/test/index.php\r\n";
    $headers .= "Connection: Close\r\n\r\n"; 
    // ���������� HTTP-������ �������
    fwrite($fp, $headers.$data); 
    // �������� �����
    while (!feof($fp))
    { 
      $line .= fgets($fp, 1024); 
    } 
    fclose($fp); 
  } 
  echo $line;
?>
