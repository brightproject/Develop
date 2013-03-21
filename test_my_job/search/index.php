

    <!--///--- Форма ввода поисковой фразы ---///////////////////////////////
    <form action="search.php" method="POST">
    <input name="keyword" size=18>
    <input type="submit" name="send" value="Найти">
    </form>
	-->
	
	    <form action="index.php" method="POST">
    <input name="keyword" size=18>
    <input type="submit" name="send" value="Найти">
    </form>
<?php
//--- Функции, которые разделяют строку на ключевые слова и формируют запрос ---////////
    //--- Отредактируйте название столбцов таблицы (or text like), в которых вы хотите производить поиск ---//
	// function keywords_text($words)
		 // {
		        // $keywords = split(' ', $words);
		    // $num_keywords = count($keywords);
		    // for ($i=0; $i<$num_keywords; $i++)
		    // {
		      // if ($i)
		      // {
		        // $keywords_string .= "or text like '%".$keywords[$i]."%' ";
		      // }
		      // else
		      // {
		        // $keywords_string = "text like '%".$keywords[$i]."%' ";
		      // }
		    // }
            // return $keywords_string;
		  // }


	function text($words)
		 {
		        $text = split(' ', $words);
		    $num_keywords = count($text);
		    for ($i=0; $i<$num_keywords; $i++)
		    {
		      if ($i)
		      {
		        $keywords_string .= "or text like '%".$text[$i]."%' ";
		      }
		      else
		      {
		        $keywords_string = "text like '%".$text[$i]."%' ";
		      }
		    }
            return $keywords_string;
		  }	  


  //--- Получаем строку запроса из формы, обрабатываем и с применением выше написанных функция, получаем массив ключевых слов ---/////
      if(isset($_POST['send']))
  {
    $words = trim($_POST['text']);
    $words = strip_tags($words);
    $words = str_replace("'", "", $words);
    $words = str_replace('"', "", $words);
    $words = str_replace("-", "", $words);
    $words = str_replace(",", "", $words);
	$words=htmlspecialchars(mysql_escape_string($words));


    if (($words) == "")
		{
		echo 'Не указаны ключевые слова';
		}
          else
        {
			    $var = text($words);
               /*   echo $var. $var2. $var3. $var4. $var5; */
			         if(($var))
            {
             //--- Данные для соедининия с базой данных ---/////////////////////
            //--- Если устанавливаете на локальном компьютере, оставьте по умолчанию ---/////
                    $hostname = "localhost"; //--- Имя хоста (обычно localhost)
					$dbusername = "root"; //--- Имя пользователя
					$dbpassword = "";   //--- Пароль для соединения с базой
					$dbname = "testing";  //--- Название базы данных
					$dbcon = @mysql_connect($hostname,$dbusername,$dbpassword);
					  if (!$dbcon) exit("<p>Cервер MySQL не доступен!</p>");
					  if (!@mysql_select_db($dbname,$dbcon)) exit("<p>Hе доступна база данных</p>");

                    $sql = "SELECT * FROM test_search WHERE ".$var."";
					$result = mysql_query($sql);
					$num_rows = mysql_num_rows($result);
					if ($num_rows <= 0)
				{
				  echo 'По Вашему запросу ничего не найдено,<br />попробуйте по другому сформулировать ключевые слова.';
				}
				   else
			    {
			      echo 'По вашему запросу найдено '.$num_rows.' строк';

                  while(list($id,$text) = mysql_fetch_array($result))

                   echo '<table width="700" height="20" align="center" border="0" cellpadding="3" cellspacing="0">
                            <!--DWLayoutTable-->
                            <tr>
                           <td id="w" width="700" height="20" valign="middle"><a href="'.$title.'.php" title="'.$m_key.'">'.$m_key.'</a></td>
                            </tr></table>';
                }
            }
        }

    }
?>

