<?php
  function get_code($hostname,$path)
  {
    $fp = fsockopen($hostname, 80, $errno, $errstr, 5); 
    // ��������� ���������� ��������� ����������
    if (!$fp) echo "$errstr ($errno)<br />\n"; 
    else
    { 
      // ��������� HTTP-������ ��� ��������
      // ��� �������
      $headers = "GET $path HTTP/1.1\r\n"; 
      $headers .= "Host: $hostname\r\n"; 
      $headers .= "Connection: Close\r\n\r\n"; 
      // ���������� HTTP-������ �������
      fwrite($fp, $headers); 
      $line = fgets($fp, 1024); 
      fclose($fp); 
      return $line;
    } 
    return "none";
  }
	
  echo "<pre>";
  $hostname = "www.php.net";
  $path = "/";
  echo get_code($hostname, $path);
  $path = "/wet.php";
  echo get_code($hostname, $path);
  echo "</pre>";
?>
