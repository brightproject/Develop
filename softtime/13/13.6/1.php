<?php
  require_once("class.pager_file.php");

  // ��������� ������ ������������ ���������
  $obj = new pager_file("linux.words");

  // ������� ���������� ������� ��������
  $arr = $obj->get_page();
  for($i = 0; $i < count($arr); $i++)
  {
    echo "{$arr[$i]}<br>";
  }

  // ������� ������ �� ������ ��������
  echo $obj;
?>
