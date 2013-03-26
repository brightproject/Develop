<?php
  function in_side($value, $fst, $snd, $thd)
  {
    return $value == $fst || $value == $snd || $value == $thd;
  }

  // Количество счастливых билетов
  $cnt = 0;
  // Количество симметричных билетов
  $sym = 0;

  for ($i=0; $i<1000000; $i++) 
  {
    $number = sprintf("%06d", $i);
    if($number[0] + $number[1] + $number[2] == 
       $number[3] + $number[4] + $number[5])
    {
      $cnt++;
      if(in_side($number[0], $number[3], $number[4], $number[5]) &&
         in_side($number[1], $number[3], $number[4], $number[5]) &&
         in_side($number[2], $number[3], $number[4], $number[5])) $sym++;
    }
  }
  // Выручка с рулона за счастливые несимметричные билеты
  $summ = ($cnt - $sym)*3;
  // Выручка с рулона за счастливые симметричные билеты
  $summ += $sym*10;
  // Выручка в месяц
  $summ /= 10;
  // Прибыль в месяц
  $summ -= 20000;

  echo "Прибыль в месяц: $summ";
?>
