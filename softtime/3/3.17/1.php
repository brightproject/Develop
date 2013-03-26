<form method=get>
  <input type="text" name="number" value="<?= $_GET['number'] ?>"><br> 
  <input class=button type=submit value='Вывести'> 
</form>
<?php
  // Обработчик формы
  if(!empty($_GET['number']))
  {
    $fd = fopen("linux.words", "r");

    $count_words = 0; 
    while(!feof($fd))
    {
      $current = fgets($fd);
      if(strlen($current) - 1 <= $_GET['number'])
      {
        echo "$current<br>";
        $count_words++;
      }
    }
  
    fclose($fd);

    echo "Количество найденных слов - $count_words";
  }
?>
