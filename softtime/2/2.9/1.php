<form method=post>
  Число <input size=60 type=text name=number
               value=<?= $_POST['number']; ?>><br>
  Цена <input size=60 type=text name=price 
              value=<?= $_POST['price']; ?>><br>
  <input type=submit value='Проверить'>
</form><br>
<?php
  // Обработчик HTML-формы
  if(isset($_POST['number']) && isset($_POST['price']))
  {
    if(!preg_match("|^[\d]*$|", $_POST['number']))
    {
      exit("Неверен формат числа товарных позиций");
    }
    if(!preg_match("|^[\d]*[\.,]?[\d]*$|", $_POST['price']))
    {
      exit("Неверен формат цены");
    }
    echo number_format($_POST['number']*$_POST['price'], 2, '.', ' ');
  }
?>
