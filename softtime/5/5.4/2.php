<?php 
  // ������ ����� ���������� �������
  $curl = curl_init("http://localhost/puzzles/5/handler.php");

  // �������� ������ �������������� 
  // ������� POST
  curl_setopt($curl, CURLOPT_POST, 1);
  // ������ POST-������
  $data = "name=".urlencode("�����").
          "&pass=".urlencode("������")."\r\n\r\n";
  curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

  // ��������� ������
  curl_exec($curl);
  // ��������� CURL-����������
  curl_close($curl);
?>
