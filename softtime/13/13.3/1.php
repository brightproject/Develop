<?php
  // ���������� ���������� ������
  require_once("class.shop.php");
  
  // ������� ������ ������
  $obj = new shop();
  // ������� ���� �������� ������� �����������
  // � ��������� ������ id_user = 1
  $obj->buy(1, 3);
?>
