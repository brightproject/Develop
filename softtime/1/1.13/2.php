<?php
  function my_long2ip($long)
  {
    for($i = 0; $i < 4; $i++)
    {
      $arr[$i] = $long % 256;
      $long = $long /256;
    }
    // ��������� ������ �� ������ � �������� �������
    krsort($arr);
    return implode(".", $arr);
  }
?>
