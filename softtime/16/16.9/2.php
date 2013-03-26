<?php
  function unloading($volume, $grab, $turn, $minute)
  {
    return $volume/$grab*$turn/360*2*$minute;
  }

  $minI = unloading(2000, 1.5, 120, 1);
  $minII = unloading(2000, 3.5, 120, 2);
  $minIII = unloading(2000, 8.5, 120, 5);

  echo "<pre>";
  echo "I       : ".round($minI)."\n";
  echo "II      : ".round($minII)."\n";
  echo "III     : ".round($minIII)."\n";

  $minI = unloading(2000, 1.5, 240, 1);
  $minII = unloading(2000, 3.5, 240, 2);
  $minIII = unloading(2000, 8.5, 240, 5);

  echo "I-I     : ".round($minI/2)."\n";
  echo "I-II    : ".round(($minI + $minII)/2)."\n";
  echo "I-III   : ".round(($minI + $minIII)/2)."\n";
  echo "II-II   : ".round($minII/2)."\n";
  echo "II-III  : ".round(($minII + $minIII)/2)."\n";
  echo "III-III : ".round($minIII/2)."\n";
  echo "</pre>";
?>
