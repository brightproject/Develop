<?php 
  $hostname = "localhost";
  $path = "/puzzles/handler.php";
  $line = "";
  // ������������� ����������, ��� ��������
  // �������� � ��������� $hostname
  $fp = fsockopen($hostname, 80, $errno, $errstr, 30); 
  // ��������� ���������� ��������� ����������
  if (!$fp) echo "$errstr ($errno)<br />\n"; 
  else
  { 
    // ������ HTTP-�������
    $data = 
      "name=".urlencode("�����")."&pass=".urlencode("������")."\r\n\r\n";
    // ��������� HTTP-�������
    $headers = "POST $path HTTP/1.1\r\n"; 
    $headers .= "Host: $hostname\r\n"; 
    $headers .= "Content-type: application/x-www-form-urlencoded\r\n";
    $headers .= "Content-Length: ".strlen($data)."\r\n\r\n";
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
