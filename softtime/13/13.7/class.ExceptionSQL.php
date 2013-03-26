<?php
  // Устанавливаем соединение с базой данных
  require_once("config.php");

  class ExceptionSQL extends Exception
  {
    // Первичный ключ записи в таблице exception,
    // соответствующей текущей исключительной ситуации
    protected $id_exception;
    // Конструктор класса, инициализирующий
    // члены $message и $code - оба параметра
    // реализованы как необязательные
    public function __construct($message = null, $code = 0)
    {
      // Вызываем конструктор базового класса
      parent::__construct($message, $code);

      // Экранируем спецсимволы и приводим
      // числовые значения к целому типу
      $message = mysql_real_escape_string($this->message);
      $file    = mysql_real_escape_string($this->file);
      $trace   = mysql_real_escape_string($this->getTraceAsString());
      $code    = intval($this->code);
      $line    = intval($this->line);

      // Формируем и выполняем SQL-запрос на добавление
      // информации об исключительной ситуации в базу данных
      $query = "INSERT INTO exception 
                VALUES (NULL, 
                       '$message',
                        $code,
                       '$file',
                        $line,
                       '$trace',
                        NOW())";
      @mysql_query($query);

      // Извлекаем значение первичного ключа id_exception,
      // назначенного новой записи по механизму AUTO_INCREMENT
      $this->id_exception = mysql_insert_id();
    }

    // Возвращаем значение первичного ключа в таблице exception 
    public function getID()
    {
      return $this->id_exception;
    }
  }
?>
