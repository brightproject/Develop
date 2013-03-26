<?php
  $text = 'Очень [b]жирный[/b], жирный [b]текст';
  $text = str_replace("[b]","<b>",$text);
  $text = str_replace("[/b]","</b>",$text);
  echo $text;
?>
