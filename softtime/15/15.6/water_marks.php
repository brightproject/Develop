<?php 
  // ��� �����
  $filename = "image.jpg"; 
  // ��������� ���� 
  $img = imagecreatefromjpeg($filename); 
  // ���������� ������� �����������
  list($width, $height) = getimagesize($filename); 
   
  // ��������� ���� 
  $color = imagecolorallocatealpha($img, 255, 255, 255, 80); 
 
  // ����� �� �������� ������ ���� � ������ ������
  imageline($img, 0, $height, $width, 0, $color);
  // ����� �� ������� ������ ���� � ������� ������
  imageline($img, 0, 0, $width, $height, $color);

  for($i = 1; $i < 5; $i++)
  {
    // ����� �� �������� ������ ���� � ������ ������
    imageline($img, -$i, $i, $width - $i, $height + $i, $color);
    imageline($img, $i, -$i, $width + $i, $height - $i, $color);

    // ����� �� ������� ������ ���� � ������� ������
    imageline($img, -$i, $height - $i, $width - $i, -$i, $color);
    imageline($img, $i, $height + $i, $width + $i, $i, $color);
  }

  // ������� ����������� � ������� 
  header('Content-type: image/jpeg'); 
  imagejpeg($img);       
?>
