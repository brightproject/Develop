<?php
  // ƒней в году
  $year = 365.25;
  // ”быль дней из-за ученого совета
  $academic_council = -14*12;
  // ”величение срока жизни из-за рыбалки
  $fishing = 10*6;
  // ”быль или увеличение срока жизни в год
  $delta = $academic_council + $fishing;

  $total = 70*365.25;
  for($days = 30*365.25; $days <= 70*365.25; $days += $year)
  {
    $total += $delta;
    if($days > $total) break;
  }
  echo $total/$year;
?>
