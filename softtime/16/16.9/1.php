<?php
  function unloading($volume, $grab, $turn, $minute)
  {
    return $volume/$grab*$turn/360*2*$minute;
  }
?>
