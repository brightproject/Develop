<?php 
  // ��������� ��������� �������
  $query = "����� �� Apache";
  // ��������� ��������
  $url = "http://sm.aport.ru/scripts/template.dll?That=std&r=".
         urlencode($query);

  // ��������� ���������� ��������
  $contents = file_get_contents($url); 
  // ���������� ���������
  $pattern = "|<li value[^<]*<[^<]*<a href=\"([^\"]*)[^>]*>|is";
  // ��������� ����� �� ����������� ���������
  preg_match_all($pattern, $contents, $out, PREG_PATTERN_ORDER); 
  // ������� ���������� ������
  for($i = 0; $i < count($out[1]); $i ++) 
  { 
    echo $out[1][$i]."<br>"; 
  } 
?>
