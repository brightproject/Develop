<?php
  // ������������� ���������� � ����� ������
  require_once("config.php");
  // ���������� ����� ������������ ���������
  require_once("class.pager_mysql.php");

  // ��������� ������ ������������ ���������
  $obj = new pager_mysql("position",
                         "",
                         "ORDER BY name");

  // ������� ���������� ������� ��������
  $arr = $obj->get_page();
  for($i = 0; $i < count($arr); $i++)
  {
    echo "<a href=position.php?id={$arr[$i][id_postion]}>".
         "{$arr[$i][name]}</a><br>";
  }

  // ������� ������ �� ������ ��������
  echo $obj;
?>
