<?php
  // �������� �������� �� 0 �� 100
  $rows = array(80, 75, 54, 32, 20);
  // ��������� �������� ������� $rows
  // ����� �������, ����� �� ����� 
  // ���������� 360 ��������
  $summ = array_sum($rows);
  for($i = 0; $i < count($rows); $i++)
  {
    $rows[$i] = $rows[$i]*360/$summ;
  }

  // ������� ������ �����������, 
  // �������� 201x201 ��������
  $img =  imagecreatetruecolor(201, 201);

  // ����������� ������ ����� �� �����������
  $white = imagecolorallocate($img, 255, 255, 255); 
  imagefill($img, 0, 0, $white);

  // ���������� $cy � $cy ���������� 
  // ����� �������� ���������
  $cx = $cy = 100;
  // ���������� $w � $h ���������� 
  // ������ � ������ ���������
  $w = $h = 200;

  $start = 0;
  foreach ($rows as $value)
  {
    // ��������� ��������� ���� ��� 
    // ������� �������
    $color = imagecolorallocate($img, 
                                rand(0, 255), 
                                rand(0, 255), 
                                rand(0, 255)); 
    // ���������� �������� ���� �������
    $angle_sector = $start + $value;
    // ������������ ������
    imagefilledarc($img, $cx, $cy, $w, $h, $start, $angle_sector, 
                   $color, "IMG_ARC_PIE || IMG_ARC_EDGED");
    // ����������� �������� ���������� ���� �������
    $start += $value;
  }
  // ����� ����������� � ���� ��������
  header ("Content-type: image/gif"); 	
  imagegif($img);                      
?>
