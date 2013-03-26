<?php
  function get_content($hostname)
  { 
    // ������ ����� ���������� �������
    $curl = curl_init($hostname);

    // ������� ��������� � ���� ������
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    // �������� HTTP-��������� � ���������
    curl_setopt($curl, CURLOPT_HEADER, 1);
    // ��������� ���� HTTP-���������
    curl_setopt($curl, CURLOPT_NOBODY, 1);

    // �������� HTTP-���������
    $content = curl_exec($curl);
    // ��������� CURL-����������
    curl_close($curl);

    // ����������� ������ $content � ������
    return explode("\r\n", $content);
  }

  $hostname = "http://www.php.net";
  $out = get_content($hostname);

  echo "<pre>";
  print_r($out);
  echo "</pre>";
?>
