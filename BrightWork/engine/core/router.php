<?php
   
 class Routing extends Apps { // Как вы видите, мы сразу наследуем класс Apps, который содержит нужные нам функции
     
   var $main_action = 'index'; // Функция, вызываемая по стандарту
   var $funcs_prefix = 'rout_'; // Префикс к функциям
   var $modules = 'modules'; // Название роута для объекта, в нашем случае модули
     
   function __construct ()
     {
         $this->routs = explode('/', $_SERVER['REQUEST_URI']);
		 echo "<pre>";
		 print_r($this->routs);
		 echo "</pre>";
		 // Разделяем наш запрос
         if ($this->routs[4] == $this->modules OR !count($this->routs[4])) { // Если передаётся нужный нам объект либо вообще ничего
         $this->action = $this->routs[5];
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
   
   // "ловим" строку запроса, превращаем её в масив
$routeArray = explode('/', $_SERVER['REQUEST_URI']);
// удаляем пустые элементы массива (элементы образованные начальным и конечным слэшами URI)
// тут можно было обойтить array_shift и array_pop - но мне способ с foreach кажется более "универсальным"
$route = array();
foreach ($routeArray as $value) {
	if (!empty($value)) {
		$route[] = trim($value);
	}

}
// echo $routeArray[1];
// echo $routeArray[2];
// echo $routeArray[3];
// echo $routeArray[4];
// вводим в адресную строку всякий бред, смотрим что нам показывают
echo "<pre>";
print_r($route);
echo "</pre>";