<?php
  // ��������������� �������
  require_once("include.win_utf8.php");
  require_once("include.get_content.php");

  // ��������� ��������� �������
  $hostname = "www.google.ru";
  $button = "�����";
  $query = "����� �� ���������� ����������";
  $path = 
   "/search?hl=ru&q=".win_utf8($query)."&btnG=".win_utf8($button)."&lr=";

  // ������� ����������� �� ����� ���������� �������
  set_time_limit(0);
  // �������� �������, ������� ��������� ��������
  echo get_content($hostname, $path);
?>
