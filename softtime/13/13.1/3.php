<?php
  // ����������� �������
  class fst {}
  class snd {}
  class thd {}
  // �������� ������� ���������
  // ��������
  for($i = 0; $i < 10; $i++)
  {
    switch(rand(1,3))
    {
      case 1:
        $arr[] = new fst();
        break;
      case 2:
        $arr[] = new snd();
        break;
      case 3:
        $arr[] = new thd();
        break;
    }
  }

  // ����������� ���� ������� ��������
  for($i = 0; $i < 10; $i++)
  {
    if($arr[$i] instanceof fst) echo "fst<br>";
    if($arr[$i] instanceof snd) echo "snd<br>";
    if($arr[$i] instanceof thd) echo "thd<br>";
  }
?>
