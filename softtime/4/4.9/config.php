<?php
  // ������� ����� MySQL-������� 
  $dblocation = "localhost";
  // ��� ���� ������
  $dbname = "puzzles";
  // ������������
  $dbuser = "root";
  // ��� ������
  $dbpasswd = "";
  // ������������� ���������� � ����� ������
  $dbcnx = mysql_connect($dblocation,$dbuser,$dbpasswd);
  if (!$dbcnx)
  {
    exit ("� ���������, ���������� ������ MySQL : ".mysql_error());
  }
  // �������� ���� ������
  if (!@mysql_select_db($dbname,$dbcnx))
  {
    exit("� ���������, ���������� ���� ������ : ".mysql_error());
  }

  // ������������� ��������� ����������
  @mysql_query("SET NAMES cp1251");
?>
