<?php
  function resizeimg($filename, $smallimage, $w, $h) 
  { 
    // 1. ��������� ���������� $w � $h
    // ��������� ����������� ������ �����������
    $ratio = $w / $h; 
    // ������� ������� ��������� ����������� 
    list($width, $height) = getimagesize($filename); 
    // ���� ������� ������, �� ��������������� �� ����� 
    if (($width < $w) && ($height < $h))
    {
      copy($filename, $smallimage);
      return true; 
    }
    // ������� ����������� ������ ��������� ����������� 
    $src_ratio = $width/ $height; 

    // ��������� ������� ����������� �����, ����� 
    // ��� ��������������� ����������� 
    // ��������� ��������� ����������� 
    if ($ratio < $src_ratio) $h = $w/$src_ratio; 
    else $w = $h*$src_ratio; 

    // 2. �������� ����������� ����� �����������
    // ������� ������ ����������� 
    // �������� $w x $h ��������
    $dest_img = imagecreatetruecolor($w, $h);   
    // ��������� ����, ������� ����� ������������ ������
    $src_img = imagecreatefromjpeg($filename);                       

    // ������������ �����������
    imagecopyresampled($dest_img, 
                       $src_img, 
                       0, 
                       0, 
                       0, 
                       0, 
                       $w, 
                       $h, 
                       $width, 
                       $height);
    // ��������� ����������� ����� � ���� 
    imagejpeg($dest_img, $smallimage);                       
    // ������ ������ �� ��������� ����������� 
    imagedestroy($dest_img); 
    imagedestroy($src_img); 
    return true;          
  }   
?>
