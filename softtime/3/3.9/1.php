<?php
echo getlinecount($_GET['name']);

function getlinecount($filename)
{
  // ���������, ���������� �� ����
  if(!file_exists($filename)) return "���� �� ����������";
  // ��������� ���������� ������� �� ��������� ������
  // ��� ������ ������� file(), ������� ���������� ������,
  // ������ ������� �������� �������� ������ �����
  $filearr = file($filename);
  // ���������� ���������� ����� � �����
  return count($filearr);
}
?>
