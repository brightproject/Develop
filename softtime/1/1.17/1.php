<form method=get> 
Введите число:
<input type=text name=number size=5 value=<?= $_GET['number'] ?>><br>
Введите степень:
<input type=text name=power size=5 value=<?= $_GET['power'] ?>><br>
<input type=submit value="Подсчитать"> 
</form>
<?php
  if(!empty($_GET))
  {
    $result = 1;
    for($i = 0; $i < $_GET['power']; $i++)
    {
      $result *= $_GET['number'];
    }

    echo $result."<br>"; 
  }
?>
