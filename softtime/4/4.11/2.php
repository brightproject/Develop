<?php
  // ������������� ���������� � ����� ������
  require_once("config.php");

  // ���������, ������� �� �������� id_mp3
  // � �������� �� �� ����� ������, �����
  // ������������� SQL-��������
  if(!preg_match("|^[\d]+$|",$_GET['id_mp3']))
  {
    exit("������������ ������ URL-�������");
  }

  // ��������� MP3-���� �� ���� ������
  $query = "SELECT * FROM mp3 
            WHERE id_mp3 = $_GET[id_mp3]";
  $mp3 = mysql_query($query);
  if(!$mp3) exit(mysql_error());
  $file = mysql_fetch_array($mp3);

  // ������������ ��� ������������ �����
  header("Content-Disposition: attachment; filename=$file[name]"); 
  // �������� ��������� �� �������� �����
  header("Content-type: application/octet-stream");
  // ���������� ���� ������������
  echo $file['content'];
?>
