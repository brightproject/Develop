<?php
  // ��������������� �������
  require_once("include.win_utf8.php");
  require_once("include.get_content.php");
  // ��������� ��������� �������
  $hostname = "www.google.ru";
  $button = "�����";
  $query = "����� �� ���������� ����������";
  $path = "/search?hl=ru&q=".win_utf8($query).
          "&btnG=".win_utf8($button)."&lr=";

  // ������� ����������� �� ����� ���������� �������
  set_time_limit(0);
  // �������� �������, ������� ��������� ��������
  $contents = get_content($hostname, $path);

  // ���������� ���������
  $pattern = '|<p class=g><a href=\"([^\"]*)[^>]*>|is'; 

  // ��������� ����� �� ����������� ���������
  preg_match_all($pattern, $contents, $out, PREG_PATTERN_ORDER); 
  // ������� ���������� ������
  for($i = 0; $i < count($out[1]); $i ++) 
  { 
    echo $out[1][$i]."<br>"; 
  }
?>
