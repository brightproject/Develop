<?php
  ///////////////////////////////////////////////////////////////////
  // ���� �������� �������� �����
  ///////////////////////////////////////////////////////////////////
  // ������� ����
  $now_date = date("d/m/Y");
  // ���� ����� �����
  $last_date = date("d/m/Y", time() - 3600*24*30);
  // ��������� URL
  $url = "http://www.cbr.ru/scripts/XML_dynamic.asp?date_req1=".
         $last_date."&date_req2=".$now_date."&VAL_NM_RQ=R01235";
  // �������� ���������� XML-�����
  $contents = file_get_contents($url);
  // ��������� ����� �����
  $pattern = "|<Value>([^<]+)<|i";
  preg_match_all($pattern, $contents, $out);
  foreach($out[1] as $order)
  {
    $order = str_replace(",",".",$order);
    $sectors[] = ($order - 28)*100;
  }

  ///////////////////////////////////////////////////////////////////
  // ���� �������� ���������
  ///////////////////////////////////////////////////////////////////
  // �������� ������� ����������� �������� 200 �� 200 ��������
  $img =  imagecreatetruecolor (200, 200);
  // ���� ����������� �� ������� - ���������� ������� ���������������
  if (!$img) exit();
  // ����������� ������ ����� �� �����������
  $white = imagecolorallocate($img, 255, 255, 255); 
  // ������� ����������� ����� ������
  imagefill($img, 1, 1, $white);
  // ����������� ����� ���� ���������
  $color = imagecolorallocate($img, 240, 240, 240); 
  // ���������� $cy � $cy ���������� ����� ���������
  $cx = $cy = 100;
  // ������ ������ �������
  $w = 5;
  // ������ ���������� �������� ���������
  // �������� ��������� ������������� �� �������� ������ ����
  $y1 = 200;
  // ������������ ������ ����������� �� ������
  $max_y = 200;
  // ���������� x, � ������� �������� ���������� ���������
  $x1 = 0;
  foreach ($sectors as $value)
  {
    // ������������ ����� ��� ������� �������
    $color = imagecolorallocate($img, 0, 0, 0); 
    // ������������ ������ �������. ������� ��������� � �������
    $y2 = $y1 - $value*$max_y/100;
    // ����������� ������ ���������� ��������������
    $x2 = $x1 + $w;
    // ��������� ��������������
    imagefilledrectangle($img, $x1, $y1, $x2, $y2, $color);
    // ���������� ����� ���������
    $x1 = $x2 + 5;
  }
  // ������� ����������� � ������� � ������� GIF
  header ("Content-type: image/png");   
  imagepng($img);                      
?>
