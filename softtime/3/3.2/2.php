<?php 
  $bufer = ""; 
  for($i=0; $i<100000; ++$i) 
  { 
    // ���������� ��� �����
    $filename = "site.tm".$i; 
    // ���� ����� ���� ����������,
    // ��������� ��� ���������� � $bufer
    if(file_exists($filename)) 
    { 
      $fp = fopen($filename,"r"); 
      $bufer .= fread($fp,filesize($filename)); 
      fclose($fp); 
    } 
    else 
    { 
      // ���� ���� � ����� ������ �� 
      // ���������� - ������� �� ����� 
      break; 
    } 
    // ��������� � ���������� $bufer 
    // ����� �������� � �������� ���� 
    $fp = fopen("site_final.rar","w"); 
    fwrite($fp, $bufer); 
    fclose($fp); 
  } 
?>
