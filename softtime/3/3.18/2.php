<form method=get>
  <input type="text" name="str" value="<?= $_GET['str'] ?>"><br> 
  <input class=button type=submit value='�������'> 
</form>
<?php
  // ���������� �����
  if(!empty($_GET['str']))
  {
    $fd = fopen("linux.words", "r");

    $count_words = 0;
    $pattern = "|^".preg_quote($_GET['str'])."|i";
    while(!feof($fd))
    {
      $current = fgets($fd);
      if(preg_match($pattern, $current))
      {
        echo "$current<br>";
        $count_words++;
      }
    }
  
    fclose($fd);

    echo "���������� ��������� ���� - $count_words";
  }
?>
