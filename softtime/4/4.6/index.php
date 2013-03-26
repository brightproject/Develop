<?php
  // Количество позиций на странице
  $pnumber = 3;

  // Устанавливаем соединение с базой данных
  require_once("config.php"); 

  // Формируем запрос на извлечение списка
  // каталогов 
  $query = "SELECT * FROM catalogs";
  $cat = mysql_query($query);
  if(!$cat) exit(mysql_error());
  while($catalog = mysql_fetch_array($cat))
  {
    // Выводим ссылку на каталог
    echo "<a href=$_SERVER[PHP_SELF]?id_catalog=$catalog[id_catalog]>$catalog[name]</a><br>";
  }
  echo "<a href=$_SERVER[PHP_SELF]?id_catalog=0>Все товарные 
                                                позиции</a><br><br>";

  // Если передан параметр id_catalog, следовательно,
  // необходимо выводить информацию по товарным позициям
  if(preg_match("|^[\d]+$|i",$_GET['id_catalog']))
  {
    // Проверяем, передан ли номер текущей страницы
    if(isset($_GET['page'])) $page = $_GET['page'];
    else $page = 1;

    // Начальная позиция
    $start = (($page - 1)*$pnumber + 1);

    if($_GET[id_catalog] != 0) 
         $where = "WHERE id_catalog = $_GET[id_catalog]";
    else $where = "";
    // Формируем запрос на извлечение товарных
    // позиций текущего каталога
    $query = "SELECT * FROM products 
              $where
              ORDER BY price
              LIMIT $start, $pnumber";
    $prd = mysql_query($query);
    if(!$prd) exit(mysql_error());
    // Если в текущем каталоге имеется хотя бы
    // одна товарная позиция, то выводим ее
    if(mysql_num_rows($prd) > 0)
    {
      echo "<table border=1>
              <tr>
                <td>Название</td>
                <td>Цена</td>
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

    // Количество страниц
    $query = "SELECT COUNT(*) FROM products $where";
    $tot = mysql_query($query);
    if(!$tot) exit(mysql_error());
    $total = mysql_result($tot,0);
    $number = (int)($total/$pnumber);
    if((float)($total/$pnumber) - $number != 0) $number++;

    // Постраничная навигация
    for($i = 1; $i <= $number; $i++)
    {
      if($i != $number)
      {
        if($page == $i)
        {
          echo "[".(($i - 1)*$pnumber + 1)."-".$i*$pnumber."]&nbsp;";
        }
        else
        {
          echo "<a href=$_SERVER[PHP_SELF]?id_catalog=".
                        $_GET['id_catalog']."&page=".$i.">[".
                        (($i - 1)*$pnumber + 1)."-".
                        $i*$pnumber."]</a>&nbsp;";
        }
      }
      else
      {
        if($page == $i)
        {
          echo "[".(($i - 1)*$pnumber + 1)."-".($total - 1)."]&nbsp;";
        }
        else
        {
          echo "<a href=$_SERVER[PHP_SELF]?id_catalog=".
                        $_GET['id_catalog']."&page=".$i.">[".
                        (($i - 1)*$pnumber + 1)."-".
                        ($total - 1)."]</a>&nbsp;";
        }
      }
    }
  }
?>
