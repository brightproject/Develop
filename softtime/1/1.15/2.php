<?php 
  // �������� ������ 
  $text = '����� [b]������[/b], ������ [b]�����';
  // �������������� ������ 
  $result = ""; 
  // ��������������� ���������� 
  $lastocc = 0; 
  $sndocc = 1; 
  while($sndocc) 
  { 
    // ������ ������� ��������� 
    $fstocc = strpos($text, "[b]", $lastocc); 
    // ���������� ������� ��������� 
    $sndocc = strpos($text, "[/b]", $fstocc); 
    if(($fstocc>0 && $sndocc>0 && $lastocc>0) ||
       ($fstocc >= 0 && $sndocc>0 && $lastocc == 0)) 
    { 
      // �������� �������� �� ���� [b] � ������ $result 
      $result .= substr($text, $lastocc, $fstocc - $lastocc); 
      // ������ �������� 
      $result .= "<b>".substr($text,
                              $fstocc + 3,
                              $sndocc - $fstocc - 3)."</b>"; 
      $lastocc = $sndocc + 4; 
    } 
    else 
    { 
      // ��������� ������� ������ 
      $result .= substr($text, $lastocc, strlen($text)-$lastocc); 
      // ������� �� ����� 
      break; 
    } 
  } 
  echo $result; 
?>
