<?php
  // �������, ����������� �������� ��� ������ �������
  function get_content($hostname, $path)
  { 
    $line = "";
    // ������������� ����������, ��� ��������
    // �������� � ��������� $hostname
    $fp = fsockopen($hostname, 80, $errno, $errstr, 30); 
    // ��������� ���������� ��������� ����������
    if (!$fp) echo "$errstr ($errno)<br />\n"; 
    else
    { 
      // ��������� HTTP-��������� ��� ��������
      // ���������
      $headers = "GET $path HTTP/1.1\r\n"; 
      $headers .= "Host: $hostname\r\n"; 
      // ����������� ���������������� �����, ����������
      // ��� ������������ Windows XP
      $headers .= "User-Agent: Mozilla/4.0 ".
                  "(compatible; MSIE 6.0; Windows NT 5.1\r\n"; 
      // ����������� �������, ������� �������, ��� �� ��������
      // �������� ������ "�����"
      $headers .= "Referer: http://".$hostname.$path."\r\n"; 
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
    return $line; 
  }
?>