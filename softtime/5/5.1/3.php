<?php
  // ������ ����� ���������� �������
  $curl = curl_init("http://www.php.net");
  // ������������� ��������� ����������
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  // �������� ���������� ��������
  $content = curl_exec($curl);
  // ��������� CURL-����������
  curl_close($curl);

  echo $content;
?>
