<?php
   
 class Routing extends Apps { // Как вы видите, мы сразу наследуем класс Apps, который содержит нужные нам функции
     
   var $main_action = 'index'; // Функция, вызываемая по стандарту
   var $funcs_prefix = 'rout_'; // Префикс к функциям
   var $modules = 'modules'; // Название роута для объекта, в нашем случае модули
     
   function __construct ()
     {
         $this->routs = explode('/', $_SERVER['REQUEST_URI']); // Разделяем наш запрос
         if ($this->routs[2] == $this->modules OR !count($this->routs[2])) { // Если передаётся нужный нам объект либо вообще ничего
         $this->action = $this->routs[3];
         $this->action = ($this->action == NULL OR !count($this->action)) ? $this->main_action : $this->action;
         $this->get_routs ();
         }
     }
             
   function get_routs () 
         {

    	 $action = $this->funcs_prefix . $this->action;	// Получаем название функции  
         if(method_exists($this, $action)) $this->$action(); // Если функция присутствует, то выполняем
         else die('Возникла ошибка, ваш запрос не верен!'); 

                     
         }
     
   }