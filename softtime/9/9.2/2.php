<?php 
  // ��������� ��������
  $url = "http://www.yandex.ru/yandsearch?stype=www&nl=0&text=%D4%EE%F0%F3%EC+PHP";
  // ��������� ���������� ��������
  $contents = file_get_contents($url); 
  // ���������� ���������
  $pattern = 
     "|<li value[^<]*<[^<]*<A [^ ]* href=\"([^\"]+)\"[^>]*>(.+)</a>|isU";
  // ��������� ����� �� ����������� ���������
  preg_match_all($pattern, $contents, $out, PREG_PATTERN_ORDER); 
  // ������� ���������� ������
  for($i = 0; $i < count($out[1]); $i ++) 
  { 
    echo "<a href=".$out[1][$i].">".$out[2][$i]."</a><br>"; 
  } 
?>
