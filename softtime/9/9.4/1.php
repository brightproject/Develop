<?php 
  // ��������� ��������� �������
  $button = "�����";
  $query = "����� �� MySQL";
  // ��������� ��������
  $url = "http://www.rambler.ru/srch?set=www&words=". 
          urlencode(convert_cyr_string($query,"w","k")).
          "&btnG=".urlencode(convert_cyr_string($button,"w","k"));

  // ��������� ���������� ��������
  $contents = file_get_contents($url); 
  // ���������� ���������
  $pattern = "|<li>[^>]+><a [^ ]+ [^ ]+ href=\"([^\"]+)\"[^>]+>|isU";
  // ��������� ����� �� ����������� ���������
  preg_match_all($pattern, $contents, $out, PREG_PATTERN_ORDER); 
  // ������� ���������� ������
  for($i = 0; $i < count($out[1]); $i ++) 
  { 
    echo $out[1][$i]."<br>"; 
  } 
?>
