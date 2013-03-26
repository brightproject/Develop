<form method=get> 
Введите двоичное число:
<input type=text name=bin size=5 value=<?= $_GET['bin'] ?>><br>
<input type=submit value="Преобразовать"> 
</form>
<?php
  if(!empty($_GET))
  {
    $bin = $_GET['bin']; 
    $dec = ""; 
    $multiplier = 1;

    for($i = strlen($bin); $i; $i--, $multiplier *= 2)
    {
      if($bin[$i - 1] == '1') $dec += $multiplier;
      else if($bin[$i - 1] != '0') exit("Неверный формат");
    }
    echo $dec."<br>"; 
  }
?>
