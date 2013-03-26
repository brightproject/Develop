<form method=get> 
Введите десятичное число:
<input type=text name=dec size=5 value=<?= $_GET['dec'] ?>><br>
<input type=submit value="Преобразовать"> 
</form>
<?php
  if(!empty($_GET))
  {
    $binary = ""; 
    $dec = $_GET['dec']; 
    do 
    { 
      if($dec & 1) $binary = '1'.$binary; 
      else $binary = '0'.$binary; 
      $dec = $dec >> 1;
    } while($dec); 
    echo $binary."<br>"; 
  }
?>
