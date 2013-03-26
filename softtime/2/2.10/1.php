<?php 
  $text = "ÏÐÎÃÐÀÌÌÈÐÎÂÀÍÈÅ - ýòî ÈÑÊÓÑÑÒÂÎ. ".
          "Åìó è ÆÈÇÍÜ ïîñâÿòèòü íå æàëêî."; 
  $text = preg_replace_callback( 
          "|[À-ß]{2,}|", 
          "replace_text", 
          $text); 
  echo $text; 
  function replace_text($matches) 
  { 
    return substr($matches[0],0,1).strtolower(substr($matches[0],1)); 
  } 
?>
