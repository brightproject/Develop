<?php 
  $text = "���������������� - ��� ���������. ".
          "��� � ����� ��������� �� �����."; 
  $text = preg_replace_callback( 
          "|[�-�]{2,}|", 
          "replace_text", 
          $text); 
  echo $text; 
  function replace_text($matches) 
  { 
    return substr($matches[0],0,1).strtolower(substr($matches[0],1)); 
  } 
?>
