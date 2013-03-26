<?php
  // Определение классов
  class fst
  {
    function get_name()
    {
      return __CLASS__;
    }
  }
  class snd
  {
    function get_name()
    {
      return __CLASS__;
    }
  }
  class thd
  {
    function get_name()
    {
      return __CLASS__;
    }
  }
  // Создание массива случайных
  // объектов
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
  // Определение имен классов объектов
  for($i = 0; $i < 10; $i++)
  {
    echo $arr[$i]->get_name()."<br>";
  }
?>
