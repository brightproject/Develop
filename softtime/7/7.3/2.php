<?php
  // ������ ����� ���������� �������
  $curl = curl_init("http://localhost/test/handler.php");

  // �������� ������ �������������� 
  // ������� POST
  curl_setopt($curl, CURLOPT_POST, 1);
  // ������ POST-������
  $data = "name=admin&pass=admin&\r\n\r\n";
  curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
  // ������������� �������
  curl_setopt($curl, CURLOPT_REFERER, 
              "http://localhost/test/index.php");

  // ��������� ������
  curl_exec($curl);
  // ��������� CURL-����������
  curl_close($curl);
?>
