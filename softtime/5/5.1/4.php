<?php
  // ������ ����� ���������� �������
  $curl = curl_init("http://www.php.net");
  // �������� ���������� ��������
  echo curl_exec($curl);
  // ��������� CURL-����������
  curl_close($curl);
?>
