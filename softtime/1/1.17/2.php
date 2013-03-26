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

    do
    {
      if($_GET['power'] & 1) $result *= $_GET['number'];
      $_GET['number'] *= $_GET['number'];
      $_GET['power'] = $_GET['power'] >> 1;
    }
    while($_GET['power'] > 0);

    echo $result."<br>"; 
  }
?>
