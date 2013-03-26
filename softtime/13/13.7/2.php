<?php
  // Подключаем реализацию класса
  require_once("class.ExceptionSQL.php");

  try
  {
    if(rand(0,1)) throw new ExceptionSQL("Случайное исключение");
  }
  catch(ExceptionSQL $exp)
  {
    // Получаем первичный ключ таблицы exception,
    // соответствующий исключению
    $id_exception = $exp->getID();
    // Извлекаем информацию об исключительной
    // ситуации
    $query = "SELECT * FROM exception 
              WHERE id_exception = $id_exception";
    $ext = mysql_query($query);
    if(!$ext) exit("Ошибка извлечения исключения");
    $exception = mysql_fetch_array($ext);
    echo "<table border=1 cellpadding=5>";
    echo "<tr>
           <td>Сообщение:</td>
           <td>$exception[message]</td>
          </tr>";
    echo "<tr>
           <td>Код:</td>
           <td>$exception[code]</td>
          </tr>";
    echo "<tr>
           <td>Файл:</td>
           <td>$exception[file]</td>
          </tr>";
    echo "<tr>
           <td>Строка:</td>
           <td>$exception[line]</td>
          </tr>";
    echo "<tr>
           <td>Стек:</td>
           <td><pre>{$exception[trace]}</pre></td>
          </tr>";
    echo "<tr>
           <td>Время:</td>
           <td>$exception[putdate]</td>
          </tr>";
  }
?>
