<?php
  // ������ ����� ���������� �������
  $curl = curl_init("http://localhost/test/handler.php");

  // ������������� �������
  $useragent = "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1";
  curl_setopt($curl, CURLOPT_USERAGENT, $useragent);

  // ��������� ������
  curl_exec($curl);
  // ��������� CURL-����������
  curl_close($curl);
?>
