<?php
  require_once("class.pager_dir.php");

  // ��������� ������ ������������ ���������
  $obj = new pager_dir("photo", 3);

  // ������� ���������� ������� ��������
  $arr = $obj->get_page();
  for($i = 0; $i < count($arr); $i++)
  {
    echo "<img src={$arr[$i]}>&nbsp;&nbsp;&nbsp;";
  }
  echo "<br>";

  // ������� ������ �� ������ ��������
  echo $obj;
?>
