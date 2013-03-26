<?php 
  // Исходная строка 
  $text = 'Очень [b]жирный[/b], жирный [b]текст';
  // Результирующая строка 
  $result = ""; 
  // Вспомогательные переменные 
  $lastocc = 0; 
  $sndocc = 1; 
  while($sndocc) 
  { 
    // Начало жирного фрагмента 
    $fstocc = strpos($text, "[b]", $lastocc); 
    // Завершение жирного фрагмента 
    $sndocc = strpos($text, "[/b]", $fstocc); 
    if(($fstocc>0 && $sndocc>0 && $lastocc>0) ||
       ($fstocc >= 0 && $sndocc>0 && $lastocc == 0)) 
    { 
      // Помещаем фрагмент до тега [b] в строку $result 
      $result .= substr($text, $lastocc, $fstocc - $lastocc); 
      // Жирный фрагмент 
      $result .= "<b>".substr($text,
                              $fstocc + 3,
                              $sndocc - $fstocc - 3)."</b>"; 
      $lastocc = $sndocc + 4; 
    } 
    else 
    { 
      // Подбираем остатки строки 
      $result .= substr($text, $lastocc, strlen($text)-$lastocc); 
      // Выходим из цикла 
      break; 
    } 
  } 
  echo $result; 
?>
