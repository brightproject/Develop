<?php
  // Устанавливаем неограниченное время выполнения скрипта
  set_time_limit(0);

  // Читаем пароли из файла password
  $pass = file("password");
  foreach($pass as $password)
  {
    // Замеряем время, затраченное на подбор пароля
    $begin = time();
    echo decrypt_md5(trim($password));
    $end = time();
    echo "  (на подбор затрачено ".($end - $begin)." секунд) <br>";
  }

  // Функция посимвольного перебора пароля
  // $pass - расшифровываемый пароль
  // $answer - текущий ответ, при первом вызове - пустая строка
  function decrypt_md5($pass)
  {
    // Переносим содержимое словаря в массив
    $dict = file("linux.words");
    // В цикле подбираем пароль
    foreach($dict as $word)
    {
      if(md5(trim(strtolower($word))) == $pass) return strtolower($word);
    }
  }
?>
