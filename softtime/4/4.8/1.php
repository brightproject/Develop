<?php
  // Проверяем параметры, переданные скрипту
  $order = "name";
  if($_GET['order'] == 'name')  $order = "name";
  if($_GET['order'] == 'price') $order = "price";
  if($_GET['order']  == 'mark')  $order = "mark";
  if($_GET['order'] == 'count') $order = "count";
  if($_GET['add']   == 'desc')
  {
    $desc = "DESC";
    $add  = "";
  }
  else
  {
    $desc = "";
    $add  = "desc";
  }
  // Устанавливаем соединение с базой данных
  require_once("config.php");

  // Выводим товарные позиции
  $query = "SELECT * FROM products 
            ORDER BY $order $desc";
  $prd = mysql_query($query);
  if(!$prd) exit(mysql_error());
  // Если в текущем каталоге имеется хотя бы
  // одна товарная позиция, то выводим ее
  if(mysql_num_rows($prd) > 0)
  {
    echo "<table border=1>
            <tr>
  <td><a href=$_SERVER[PHP_SELF]?order=name&add=$add>Название</a></td>
  <td><a href=$_SERVER[PHP_SELF]?order=price&add=$add>Цена</a></td>
  <td><a href=$_SERVER[PHP_SELF]?order=mark&add=$add>Оценка</a></td>
  <td><a href=$_SERVER[PHP_SELF]?order=count&add=$add>Количество</a></td>
            </tr>";
    while($product = mysql_fetch_array($prd))
    {
      echo "<tr>
              <td>$product[name]</td>
              <td>$product[price]</td>
              <td>$product[mark]</td>
              <td>$product[count]</td>
            </tr>";
    }
    echo "</table>";
  }
?>
