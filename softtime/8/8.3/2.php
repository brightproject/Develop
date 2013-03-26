<?php
  // Устанавливаем неограниченное время выполнения скрипта
  set_time_limit(0);

  // Читаем пароли из файла password
  $temp = file("password");
  // Замеряем время, затраченное на подбор пароля
  $begin = time();
  $i = 0;
  foreach($temp as $password)
  {
    $pass['pass'][$i] = trim($password);
    $pass['answer'][$i] = "";
    $i++;
  }
  decrypt_md5("");
  $end = time();
  echo "на подбор затрачено ".($end - $begin)." секунд<br>";
  foreach($pass['answer'] as $password)
  {
    echo $password."<br>";
  }

  // Функция посимвольного перебора пароля
  // $pass - расшифровываемый пароль
  // $answer - текущий ответ, при первом вызове - пустая строка
  function decrypt_md5($answer)
  {
    global $pass;
    $arr = array('a','b','c','d','e','f',
                 'g','h','i','j','k','l',
                 'm','n','o','p','q','r','s',
                 't','u','v','w','x','y','z');
    // Будем считать, что пароль не превышает
    // 4 символов
    $max_number = 3;
    if(strlen($answer) > $max_number) return;
    // Если все пароли обнаружены - выходим
    // из рекурсивного спуска
    $ret = true;
    for($i = 0; $i < count($pass['pass']); $i++)
    {
      if(empty($pass['answer'][$i]))
      {
        $ret = false;
        break;
      }
    }
    if($ret) return;

    for($j = 0; $j < count($arr); $j++)
    {
      $temp = $answer.$arr[$j];
      // Проверяем, не найден ли какой-нибудь пароль
      for($i = 0; $i < count($pass['pass']); $i++)
      {
        if(md5($temp) == $pass['pass'][$i])
        {
          $pass['answer'][$i] = $temp;
        }
      }
      // Рекурсивно вызываем функцию для увеличения
      // длины подбираемого пароля
      decrypt_md5($temp);
    }
  }
?>
