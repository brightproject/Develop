<?php 
  // ��������� ���������� ����� 
  $filename = '���_�����'; 
  // �������� ���������� ����� � ���������� $content
  $content = file_get_contents($filename); 
  // ��������� ���� 
  preg_match('|([\d]{4}:[\d]{2}:[\d]{2} [\d]{2}:[\d]{2}:[\d]{2})|i',
             $content, 
             $out); 
  echo $out[0]; 
?>
