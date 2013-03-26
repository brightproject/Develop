<?php 
  // ������� ��������� HTTP-���������� 
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
      // ��������� HTTP-������ ��� ��������
      // ��� �������
      $headers = "HEAD $path HTTP/1.1\r\n"; 
      $headers .= "Host: $hostname\r\n"; 
      $headers .= "Connection: Close\r\n\r\n"; 
      // ���������� HTTP-������ �������
      fwrite($fp, $headers); 
      // �������� �����
      while (!feof($fp))
      { 
        $out[] = fgets($fp, 1024); 
      } 
      fclose($fp); 
    } 
    return $out; 
  }
  $hostname = "www.php.net";
  $path = "/";
  // ������������� ������� ����� ������
  // ������� - ���� ��� �������� �� ����� ���������,
  // ��� �� ����� ����������
  set_time_limit(180);
  // �������� �������
  $out = get_content($hostname, $path);
  // ������� ���������� �������
  echo "<pre>";
  print_r($out);
  echo "</pre>";
?>
