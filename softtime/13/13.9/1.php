<?php
  // ��������� ������ ����������� ����������
  $arr = get_loaded_extensions();
  // ������� ������ ���������� � �����
  foreach($arr as $extension)
  {
     // ������� ��������� ����������
     $obj = new ReflectionExtension($extension);
     // ������� ��� ���������� � ��� ������
     echo $extension." - ". $obj->getVersion()."<br>";
  }
?>
