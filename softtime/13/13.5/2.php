<?php
  // ���������� ���������� ������
  require_once("class.cls.php");
  // ������������� ����������
  require_once("config.php");

  // ��������� ������ � ���������������, 
  // ������ 1, �� ������� object
  $query = "SELECT * FROM object WHERE id_object = 1";
  $obj = mysql_query($query);
  if(!$obj) exit("������ ���������� ������� �� �������");
  // ���� ������ ������������ - ������������ ��
  if(mysql_num_rows($obj))
  {
    $table = mysql_fetch_array($obj);
    // ��������������� ������
    $object = unserialize($table['object']);
    // ������� ���� �������
    echo "<pre>";
    print_r($object);
    echo "</pre>";
  }
?>
