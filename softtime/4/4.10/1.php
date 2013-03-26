<?php
  // Устанавливаем соединение с базой данных
  require_once("config.php");

  // Выводим товарные позиции
  $query = "SELECT * FROM products 
            ORDER BY name";
  $prd = mysql_query($query);
  if(!$prd) exit(mysql_error());
  // Если в текущем каталоге имеется хотя бы
  // одна товарная позиция, то выводим ее
  if(mysql_num_rows($prd) > 0)
  {
    echo "<form method=post>";
    echo "<table border=1>
            <tr>
              <td>&nbsp;</td>
              <td>Название</td>
              <td>Цена</td>
              <td>Оценка</td>
              <td>Количество</td>
            </tr>";
    $i = 0;
    while($product = mysql_fetch_array($prd))
    {
      echo "<tr>
              <td><input type=checkbox name=product[]
                         value=$product[id_product]></td>
              <td>$product[name]</td>
              <td>$product[price]</td>
              <td>$product[mark]</td>
              <td>$product[count]</td>
            </tr>";
      $i++;
    }
    echo "</table>";
    echo "</br><input type=submit name=send value=Удалить>";
    echo "</form>";
  }

  // Если суперглобальный массив $_POST не пуст,
  // производим обработку запроса
  if(!empty($_POST))
  {
    // Для удаления товарных позиций необходимо
    // сформировать запрос вида
    // DELETE FROM products WHERE id_product IN (4, 6, 8, ..., 20)
    // где цифры в скобках являются элементами
    // массива $_POST['product'][] 
    $temp = array();
    foreach($_POST['product'] as $id_product)
    {
      // Проверяем, является ли переменная $id_product числом
      if(preg_match("|^[\d]+$|",$id_product))
      {
        $temp[] = $id_product;
      }
    }
    // Формируем и выполняем запрос на удаление
    // нескольких позиций
    $query = "DELETE FROM products 
              WHERE id_product IN (".implode(",",$temp).")";
    if(mysql_query($query))
    {
      echo "<HTML><HEAD>
         <META HTTP-EQUIV='Refresh' CONTENT='0; URL=$_SERVER[PHP_SELF]'>
            </HEAD></HTML>";
    }
  }
?>
