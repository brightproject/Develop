<?php
  // ������������� ���������� � ����� ������
  require_once("config.php");

  // ���������, ������� �� �������� id_image
  // � �������� �� �� ����� ������, �����
  // ������������� SQL-��������
  if(!preg_match("|^[\d]+$|",$_GET['id_image']))
  {
    exit("������������ ������ URL-�������");
  }

  // ��������� ����������� ���� �� ���� ������
  $query = "SELECT * FROM image
            WHERE id_image = $_GET[id_image]";
  $img = mysql_query($query);
  if(!$img) exit(mysql_error());
  $image = mysql_fetch_array($img);

  // �������� ��������� �� �������� �����
  header("Content-type: image/*");
  // ���������� ���� ������������
  echo $image['content'];
?>
