<?php
  // �������� �������� �� 0 �� 100
  $rows = array(80, 75, 54, 32, 20);

  // ������ �����������
  $width = 200;
  // ������ �����������
  $height = 200;
  // ������ ������ �������
  $row_width = 30;
  // ������ ��������� ����� ���������
  $row_interval = 5;

  // �������� ������ �����������
  $img =  imagecreatetruecolor ($width, $height);

  // �������� ����������� ����� ������
  $white = imagecolorallocate($img, 255, 255, 255); 
  imagefill($img, 0, 0, $white);


  for($i = 0, $y1 = $height, $x1 = 0; $i < count($rows); $i++)
  {
    // ��������� ��������� ���� ��� ������� �� �������
    $color = imagecolorallocate($img, 
                    rand(0, 255), rand(0, 255), rand(0, 255)); 

    // ������������ ������ �������
    $y2 = $y1 - $rows[$i]*$height/100;
    // ����������� ������ ���������� �������
    $x2 = $x1 + $row_width;

    // ������������ �������
    imagefilledrectangle($img, $x1, $y1, $x2, $y2, $color);

    // ����� ��������� ������ �������� � $row_interval ��������
    $x1 = $x2 + $row_interval;
  }

  // ������� ����������� � �������, � ������� GIF
  header ("Content-type: image/gif"); 	
  imagegif($img);
?>