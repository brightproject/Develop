<?php
// Функция отправки сообщения: открывает сокет, ведет диалог с сервером,
// записывает данные, закрывает сокет
function send($server, $to, $from, $subject="",$msg, $headers="") 
{ 
   // Формируем поля заголовка 
  $headers="To: $to\nFrom: $from\nSubject: $subject\nX-Mailer: My 
             Mailer\n$headers";
  // Соединяемся с сервером по порту 25, при этом переменная $fp 
  // содержит дескриптор соединения 
  $fp = fsockopen($server, 25, &$errno, &$errstr, 30);
  if (!$fp) die("Server $server. Connection failed: $errno, $errstr");
  // Если соединение прошло успешно, производим запись данных в сокет,
  // т.е. открываем наш SMTP-сеанс с удаленным сервером $server
  fputs($fp,"HELO $server\n"); // здороваемся с сервером
  // Посылаем поле from
  fputs($fp,"MAIL FROM: $from\n"); 
  // Посылаем поле To
  fputs($fp,"RCPT TO: $to\n");
  // Посылаем поле Data
  fputs($fp,"DATA\n");
  // Посылаем сообщение, которое содержится в переменной $msg 
  fputs($fp,"$msg\r\n.\r\n");
  // Посылаем заголовки
  fputs($fp,$this->headers);
  if (strlen($headers))
    fputs($fp,"$headers\n");
  // Завершаем SMTP-сеанс
  fputs($fp,"\n.\nQUIT\n");
  // Завершаем соединение
  fclose($fp); 
  } 
}
// Отправка сообщения    
send('mx2.yandex.ru', // почтовый ретранслятор, к примеру, сервера yandex
     'mail@yandex.ru', // кому
     'mail@softtime.ru',  // от кого
     'Hello!',  // тема
     'Привет!'); // сообщение  
?>
