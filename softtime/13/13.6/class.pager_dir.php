<?php
  // Подключаем базовый класс
  require_once("class.pager.php");

  class pager_dir extends pager
  {
    // Имя каталога
    protected $dirname;
    // Количество позиций на странице
    private $pnumber;
    // Количество ссылок слева и справа
    // от текущей страницы
    private $page_link;
    // Параметры
    private $parameters;
    // Конструктор
    public function __construct($dirname, 
                                $pnumber = 10, 
                                $page_link = 3, 
                                $parameters = "")
    {
      // Удаляем последний символ /, если он имеется
      $this->dirname    = trim($dirname, "/");
      $this->pnumber    = $pnumber;
      $this->page_link  = $page_link;
      $this->parameters = $parameters;
    }
    public function get_total()
    {
      $countline = 0;
      // Открываем каталог
      if(($dir = opendir($this->dirname)) !== false)
      {
        while(($file = readdir($dir)) !== false)
        {
          // Если текущая позиция является файлом,
          // подсчитываем ее
          if(is_file($this->dirname."/".$file)) $countline++;
        }
        // Закрываем каталог
        closedir($dir);
      }
      return $countline;
    }
    public function get_pnumber()
    {
      // Количество позиций на странице
      return $this->pnumber;
    }
    public function get_page_link()
    {
      // Количество ссылок слева и справа
      // от текущей страницы
      return $this->page_link;
    }
    public function get_parameters()
    {
      // Дополнительные параметры, которые
      // необходимо передать по ссылке
      return $this->parameters;
    }
    // Возвращает массив строк файла по 
    // номеру страницы $index
    public function get_page()
    {
      // Текущая страница
      $page = $_GET['page'];
      if(empty($page)) $page = 1;
      // Количество записей в файле
      $total = $this->get_total();
      // Вычисляем количество страниц в системе
      $number = (int)($total/$this->get_pnumber());
      if((float)($total/$this->get_pnumber()) - $number != 0) $number++;
      // Проверяем, попадает ли запрашиваемый номер 
      // страницы в интервал от 1 до get_total()
      if($page <= 0 || $page > $number) return 0;
      // Извлекаем позиции текущей страницы
      $arr = array();
      // Номер, начиная с которого следует
      // выбирать строки файла
      $first = ($page - 1)*$this->get_pnumber();
      // Открываем каталог
      if(($dir = opendir($this->dirname))  === false) return 0;
      $i = -1;
      while(($file = readdir($dir)) !== false)
      {
        // Если текущая позиция является файлом
        if(is_file($this->dirname."/".$file))
        {
          // Увеличиваем счетчик
          $i++;
          // Пока не достигнут номер $first,
          // досрочно заканчиваем итерацию
          if($i < $first) continue;
          // Если достигнут конец выборки,
          // досрочно покидаем цикл
          if($i > $first + $this->get_pnumber() - 1) break;
          // Помещаем пути к файлам в массив,
          // который будет возвращен методом
          $arr[] = $this->dirname."/".$file;
        }
      }
      // Закрываем каталог
      closedir($dir);

      return $arr;
    }
  }
?>
