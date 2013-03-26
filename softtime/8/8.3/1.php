<?php
  // Устанавливаем неограниченное время выполнения скрипта
  set_time_limit(0);

  //Читаем пароли из файла password
  $pass = file("password");
  foreach($pass as $password)
  {
    // Замеряем время, затраченное на подбор пароля
    $begin = time();
    echo decrypt_md5(trim($password),"");
    $end = time();
    echo "  (на подбор затрачено ".($end - $begin)." секунд) <br>";
  }

  // Функция посимвольного перебора пароля
  // $pass - расшифровываемый пароль
  // $answer - текущий ответ, при первом вызове - пустая строка
  function decrypt_md5($pass, $answer)
  {
    $arr = array('a','b','c','d','e','f',
                 'g','h','i','j','k','l',
                 'm','n','o','p','q','r','s',
                 't','u','v','w','x','y','z');
    // Будем считать, что пароль не превышает
    // 4 символов
    $max_number = 3;
    if(strlen($answer) > $max_number) return;

    for($j = 0; $j < count($arr); $j++)
    {
      $temp = $answer.$arr[$j];
      if(md5($temp) == $pass) return $temp;
      // Рекурсивно вызываем функцию для увеличения
      // длины подбираемого пароля
      $result = decrypt_md5($pass, $temp);
      // Если функция возвращает непустую строку,
      // следовательно, найден ответ и дальше искать
      // не следует
      if(strlen($result) > 0) return $result;
    }
  }
?>
