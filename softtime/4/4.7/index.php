<?php
  // ”станавливаем соединение с базой данных
  require_once("config.php"); 

  // ‘ормируем запрос на извлечение первых
  // букв товарных позиций
  $query = "SELECT SUBSTRING(name,1,1) AS letter 
            FROM products 
            GROUP BY letter
            ORDER BY letter";
  $prd = mysql_query($query);
  if(!$prd) exit(mysql_error());
  // ≈сли имеетс€ хот€ бы одна запись,
  // то выводим ее
  if(mysql_num_rows($prd) > 0)
  {
    while($product = mysql_fetch_array($prd))
    {
      echo "<a href=$_SERVER[PHP_SELF]?letter=$product[letter]>
                                           $product[letter]</a>";
    }
  }

  // ≈сли передан параметр letter и он
  // состоит из одного символа - выводим
  // содержимое таблицы
  if(preg_match("|^[a-z]$|i", $_GET['letter']))
  {
    // ¬ыводим товарные позиции
    $query = "SELECT * FROM products 
              WHERE SUBSTRING(name,1,1) = '$_GET[letter]'
              ORDER BY price";
    $prd = mysql_query($query);
    if(!$prd) exit(mysql_error());
    // ≈сли в текущем каталоге имеетс€ хот€ бы
    // одна товарна€ позици€, то выводим ее
    if(mysql_num_rows($prd) > 0)
    {
      echo "<br><br><table border=1>
              <tr>
                <td>Ќазвание</td>
                <td>÷ена</td>
              </tr>";
      while($product = mysql_fetch_array($prd))
      {
        echo "<tr>
                <td>$product[name]</td>
                <td>$product[price]</td>
              </tr>";
      }
      echo "</table>";
    }
  }
?>
