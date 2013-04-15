<?php
   
 class Routing extends App { // Как вы видите, мы сразу наследуем класс Apps, который содержит нужные нам функции
     
   var $default = 'index'; // Функция, вызываемая по стандарту
   var $modules = array ('user','private','reg'); // Название роута для объекта, в нашем случае модули
   var $actions = array ('user_','private_','reg_'); // Действия
     
   function __construct ()
     {
         $this->routs = explode('/', $_SERVER['REQUEST_URI']);
		 // Массив Url
		 echo "<pre>";
		 print_r($this->routs);
		 echo "</pre>";
		 // Массив модулей
		 echo "<pre>";
		 print_r($this->modules);
		 echo "</pre>";
		  // Разделяем наш запрос
         if ($this->routs[4] == $this->modules[0]) { // Если передаётся нужный нам объект либо вообще ничего
         $this->action = $this->routs[5];
         $this->action = ($this->action == NULL OR !count($this->action)) ? $this->default : $this->action;
         $this->get_routs_user ();
         } elseif ($this->routs[4] == $this->modules[1]) { // Если передаётся нужный нам объект либо вообще ничего
         $this->action = $this->routs[5];
         $this->action = ($this->action == NULL OR !count($this->action)) ? $this->default : $this->action;
         $this->get_routs_private ();
         }
     }
             
   function get_routs_user () 
         {
    	 $action = $this->actions[0] . $this->action;	// Получаем название функции  
         if(method_exists($this, $action)) $this->$action(); // Если функция присутствует, то выполняем
         else die('Возникла ошибка, ваш запрос не верен!');                    
         }
   function get_routs_private () 
         {
    	 $action = $this->actions[1] . $this->action;	// Получаем название функции  
         if(method_exists($this, $action)) $this->$action(); // Если функция присутствует, то выполняем
         else die('Возникла ошибка, ваш запрос не верен!');                    
         }
     
   }
   
