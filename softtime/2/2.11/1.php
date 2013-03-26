<?php 
  $text = "AAAAAAAAAAaaaaaaaaaaaaaaaaaaaaaaaaaaaaAAAAAAAAAAAAAaaaaaaaaa";

  $text = preg_replace_callback( 
                  "|(\w{25,})|", 
                  "split_text", 
                  $text); 
  function split_text($matches) 
  { 
    return wordwrap($matches[1], 25, '<br>', 1); 
  } 

  echo $text;
?>
