<form method=get> 
Введите строку:
<input type=text name=input value='<?= $_GET['input'] ?>'><br>
<input type=submit value="Преобразовать"> 
</form>
<?php
  if(!empty($_GET))
  {
    $input = $_GET['input'];
    for($i = 0; $i < strlen($input); $i++)
    {
      echo chr(ord($input[$i]) & 223);
    }
  }
?>
