<?php
  // ��������� ���������� �� ����� index.htm
  $content = file_get_contents("index.htm");

  // ������� HTML-����
  $content = strip_tags($content);

  // ���������� ���������
  $pattern = "|[\s]+|s";

  // �������� ��������� ���������� ��������
  // �����
  echo preg_replace($pattern, " ", $content);
?>
