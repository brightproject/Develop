<?php
  // ��������� ���������� �� ����� index.htm
  $content = file_get_contents("index.htm");

  // ������� HTML-����
  $content = strip_tags($content);

  // ���������� ���������
  $pattern = "|[ \f\t\v]+|s";

  // �������� ��������� ���������� ��������
  // �����, �� ���������� �������� �����
  echo preg_replace($pattern, " ", $content);
?>
