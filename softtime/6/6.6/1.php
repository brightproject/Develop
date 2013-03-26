<?php
  $hostname = "localhost";
  $path = "/test/index.php";

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
    $headers .= "Connection: Close\r\n\r\n"; 
    // ���������� HTTP-������ �������
    fwrite($fp, $headers); 
    // �������� �����
    while (!feof($fp))
    { 
      $line = fgets($fp, 1024); 
      // ���� ������ ���� 
      // Set-Cookie: PHPSESSID=6197e647566bdaa24da3ab42ae7604b2;
      // ������ ��� ������������� cookie
      preg_match("|Set-Cookie: PHPSESSID=([\d\w]+);|i",$line,$out);
      if(!empty($out[1]))
      {
        $SID = $out[1];
        break;
      }
    } 
    fclose($fp); 
  } 

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
    $data = "name=admin&pass=admin&session_id=$SID&\r\n\r\n";
    // ��������� HTTP-��������� ��� ��������
    // ��� �������
    $headers = "POST $path HTTP/1.1\r\n"; 
    $headers .= "Host: $hostname\r\n"; 
    $headers .= "Content-type: application/x-www-form-urlencoded\r\n";
    $headers .= "Content-Length: ".strlen($data)."\r\n";
    // ����������� cookie
    $headers .= "Cookie: PHPSESSID=$SID;\r\n";
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
