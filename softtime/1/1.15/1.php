<?php
  $text = '����� [b]������[/b], ������ [b]�����';
  $text = str_replace("[b]","<b>",$text);
  $text = str_replace("[/b]","</b>",$text);
  echo $text;
?>
