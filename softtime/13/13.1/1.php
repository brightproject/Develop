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
?>
