<form method=get>
  <input type="text" name="str" value="<?= $_GET['str'] ?>"><br> 
  <input class=button type=submit value='Вывести'> 
</form>
<?php
  // Обработчик формы
  if(!empty($_GET['str']))
  {
    $fd = fopen("linux.words", "r");

    $number = strlen($_GET['str']); 
    $count_words = 0;
    while(!feof($fd))
    {
      $current = fgets($fd);
      if(substr($current, 0, $number) == $_GET['str'])
      {
        echo "$current<br>";
        $count_words++;
      }
    }
  
    fclose($fd);

    echo "Количество найденных слов - $count_words";
  }
?>
