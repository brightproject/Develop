<?php
  // ������ ����������� 100�100 ��������
  $img = imagecreatetruecolor(100, 100);

  // ����������� ������� GET-��������� �
  // ������ �����
  $_GET['red']   = intval($_GET['red']);
  $_GET['green'] = intval($_GET['green']);
  $_GET['blue']  = intval($_GET['blue']);

  // ��������� ����
  $color = imagecolorallocate($img, 
                              $_GET['red'], 
                              $_GET['green'], 
                              $_GET['blue']);

  // ��������� ����������� ���������
  // ������
  imagefill($img, 0, 0, $color);

  header('Content-type: image/png'); 
  imagejpeg($img);
?> 