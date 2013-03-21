<!--Оператор case-->
<h2>Оператор case</h2><br />
<?php
$day = 4;
switch ($day)
{
 case 5:
 print("Пятый день делаем снеговика<br>");
 break;
 case 4:
 print("Четвертый день делаем стол<br>");
 break;
 case 3:
 print("Третий день делаем полку<br>");
 break;
 case 2:
 print("Второй день делаем забор<br>");
 break;
default: 
 print("Нет такого дня<br>");
 }
?>
<!--Оператор case-->
<br />
<br />
<!--Таблица с арифметическими операциями-->
<?php
$start_num = 1;
$end_num = 10;
?>
<html>
<head>
<title>Таблица умножения,деления,сложения</title>
</head>
<body>
<h2>Таблица деления</h2>
<table border="1">
<?php
  print ("<tr>");
  print ("<th> </th>");
  for ($count_1 = $start_num;
	   $count_1 <= $end_num;
       $count_1++)
   print ("<th>$count_1</th>");
  print ("</tr>");
  
  for ($count_1 = $start_num;
	   $count_1 <= $end_num;
       $count_1++)  
  {
	  print ("<tr><th>$count_1</th>");
	    for ($count_2 = $start_num;
	         $count_2 <= $end_num;
             $count_2++)
		{
		  $result = $count_1 / $count_2;
		  printf ("<td>%.3f</td>",$result);
		}
	print("</tr>\n");
  }
 ?>
</table>
</body>
</html>
<!--Таблица с арифметическими операциями-->
<br />
<br />
<!--Циклы while-->
<h2>Циклы while</h2><br />
<?php
$limit = 500;
$to_test = 2;
while (true)
 {
	 $testdiv = 2;
	 if ($to_test > $limit)
	  break;
 while (true)
  {
	  if ($testdiv > sqrt ($to_test))
	    {
			print "$to_test ";
			break;
		}
		//Проверка на деление $to_test на $testdiv
		if ($to_test % $testdiv == 0)
		break;
		$testdiv = $testdiv + 1;
  }
  $to_test = $to_test + 1;
 }
?>
<!--Циклы while-->
<br />
<br />
<!--Функции-->
<h2>Функции</h2><br />
<?php
function countdown_first ($num_arg)
 {
	 if ($num_arg > 0)
	   {
		   print ("Обратный отсчет(первая) от $num_arg<br>");
		   countdown_second($num_arg - 1);
	   }
 }
function countdown_second ($num_arg)
 {
	 if ($num_arg > 0)
	   {
		   print ("Обратный отсчет(вторая) от $num_arg<br>");
		   countdown_first($num_arg - 1);
	   }
 }
 
countdown_first(5);
?>
<!--Функции-->
<br />
<br />
<!--Строки-->
<h2>Строки</h2><br />
<?php
$alphabet_test = "abcdefghijklmnop";
print ("3: " . substr ($alphabet_test, 3) . "<br>");
print ("-3: " . substr ($alphabet_test, -3) . "<br>");
print ("3, 5: " . substr ($alphabet_test, 3, 5) . "<br>");
print ("3, -5: " . substr ($alphabet_test, 3, -5) . "<br>");
print ("-3, 5: " . substr ($alphabet_test, -3, 5) . "<br>");
?>
<br />
<br />
<?php
$original = "   More than meets the eye     ";
$chopped = chop($original);
$ltrimmed = ltrim($original);
$trimmed = trim($original);
print ("The original is '$original'<br>");
print ("It's lenght is " . strlen ($original) . "<br>");
print ("The chopped is '$chopped'<br>");
print ("It's lenght is " . strlen ($chopped) . "<br>");
print ("The ltrimmed is '$ltrimmed'<br>");
print ("It's lenght is " . strlen ($ltrimmed) . "<br>");
print ("The trimmed is '$trimmed'<br>");
print ("It's lenght is " . strlen ($trimmed) . "<br>");
?>
<br />
<br />
<?php
$first_edition = "Я живу в славном городе Иркутск, он на берегу байкала.";
$second_edition = str_replace ("Иркутск", "Тула", $first_edition);
$third_edition = str_replace ("на берегу байкала", "город-герой", $second_edition);
print ("$first_edition<br />");
print ("$second_edition<br />");
print ("$third_edition");
?>
<br />
<br />
<?php
print (substr_replace("ABCDEFG","*", 2, 3));
?>
<br />
<br />
<?php
print (str_repeat("Vladex", 3));
?>
<br />
<br />
<?php
$original = "VlAdEx - vErY KlEvER MaN";
$lower = strtolower ($original); 
print $lower;
?>
<br />
<br />
<?php
$original = "vladex - very klever man";
$big = strtoupper($original);
print $big;
?>
<br />
<br />
<?php
$original = "vladex - very klever man";
$propis = ucfirst($original);
print $propis;
?>
<br />
<br />
<?php
$original = "vladex - very klever man";
$vse = ucwords($original);
print $vse;
?>
<br />
<br />
<!--Строки-->
<!--Массивы-->
<h2>Массивы</h2><br />
<?php
$many_level_array = array('airplanes' =>
						    array('an-2' => 'antonov',
								  'tu-154' => 'tupolev',
								  'su-27' => 'sochoi'),
						   'helicopters' =>
						     array('mi-8' => 'mil',
								   'ka-52' => 'kamov',
								   'si-2' => 'sikorsky'),
						   'automobile' =>
						     array('lancer' => 'mitubishi',
								   'camry' => 'tayota',
								   'focus' => 'ford'));
$airplane_search = 'automobile';
$helicopter_search = 'focus';
echo "Конкатенация.<br />";
print("The $helicopter_search $airplane_search is  " . 
	  $many_level_array[$airplane_search][$helicopter_search]);
echo "<br />В php 4.1 и выше.<br />";
print("The $helicopter_search $airplane_search is {$many_level_array[$airplane_search][$helicopter_search]}<br />");
print("Размер массива - " . count($many_level_array[airplanes]));
?>
<br />
<br />
<?php
$array1 =array(4,8,16,32,64,128);
echo $array1[0];?>
<br />
<?php
$array2=array(6,"vlad","lena",array("a","b","c"));
echo $array2[3][1];?>
<br />
<?php
$array3 = array("first_name" => "vlad", "last_name" => "evdokimov");
echo $array3["first_name"] . " " . $array3["last_name"];?>
<br />
<?php
$array3["first_name"] = "vladex";
$array3 = array("first_name" => "vlad", "last_name" => "evdokimov");?>
<br />
<pre><?php print_r($array2);?></pre>
<br />
<br />
<?php $array1 = array(4,8,15,16,23,42);?>
Count: <?php echo count($array1);?><br />
Max value: <?php echo max($array1);?><br />
Min value: <?php echo min($array1);?><br />
<br />
Sort: <?php sort($array1) ; print_r($array1); ?><br />
Reverse Sort: <?php rsort($array1) ; print_r($array1); ?><br />
<br />
Implode: <?php echo $string1 = implode(" * ", $array1); ?><br />
Explode: <?php print_r(explode(" * ", $string1)); ?><br />
<br />
In array: <?php echo in_array(16,$array1); //возвращает T/F - не знаю что жто такое:)?>
<!--Массивы-->
<!--Алгебра--> 
<h2>Алгебра</h2><br />
<?php
$var=15;
?>
+=:<?php $var += 4; echo $var; ?><br />
-=:<?php $var -= 4; echo $var; ?><br />
*=:<?php $var *= 4; echo $var; ?><br />
/=:<?php $var /= 4; echo $var; ?><br />
Increment: <?php $var++; echo $var; ?><br />
Decrement: <?php $var--; echo $var; ?><br />
<!--Алгебра-->
<!--Числа с плавающей точкой - floats-->
<h2>Числа с плавающей точкой</h2><br />
<?php
$var = 3.14;
echo 4/3;
?><br />
Floating point:<?php echo $myFloat = 3.14; ?><br />
Round:<?php echo round($myFloat, 1); ?><br />
Ceiling:<?php echo ceil($myFloat); ?><br />
Floor:<?php echo floor($myFloat); ?><br />
<!--Числа с плавающей точкой - floats-->
<br />
<br />
<!--Булевы операции-->
<h2>Булевы операции</h2><br />
<?php
$bool1 = true;
$bool2 = false;
?>
true: <? echo $bool1;?><br />
false: <? echo $bool2;?><br />
<?php
$var1 = 3;
$var2 = "cat";
$var4 = NULL; //значение $var4 = 0;
?>
$var1 is set: <? echo isset($var1);?><br />
$var2 is set: <? echo isset($var2);?><br />
$var3 is set: <? echo isset($var3);?><br /><br />
<?php unset($var1); ?>
$var1 un set: <? echo isset($var1);?><br />
$var2 un set: <? echo isset($var2);?><br />
$var3 un set: <? echo isset($var3);?><br /><br />
$var1 empty: <?php echo empty($var1); ?><br />
$var4 empty: <?php echo empty($var4); ?>
<br />
<br />
<!--Булевы операции-->
<!--Определение типов переменных-->
<h2>Определение типов переменных</h2><br />
<?php
$var1 = 2.123;
$var2 = $var1 + 3;
echo $var2;
?>
<br />
<?php
echo "Тип переменной var1:"; echo gettype($var1); echo "<br />";
echo "Тип переменной var2:"; echo gettype($var2); echo "<br />";
settype($var2,"string"); //Полная запись
echo "Тип назначенной переменной var2:"; echo gettype($var2); echo "<br />";
$var3 = (int) $var1; // Короткая запись
echo "Тип назначенной переменной var3:"; echo gettype($var3); echo "<br />";
?>
<br />
<br />
is_array: <?php echo is_array($var1); ?><br />
is_bool:<?php echo is_bool($var1); ?><br />
is_float:<?php echo is_float($var1); ?><br />
is_int:<?php echo is_int($var1); ?><br />
is_null:<?php echo is_null($var1); ?><br />
is_numeric:<?php echo is_numeric($var1); ?><br />
is_string:<?php echo is_string($var1); ?><br />
<br />
<br />
<!--Определение типов переменных-->
<!--Константы-->
<h2>Константы</h2><br />
<?php
$max_width = 980;
define("MAX_WIDTH", 980);
echo MAX_WIDTH; echo "<br />";
/* MAX_WIDTH += 1;
echo MAX_WIDTH; echo "<br />"; Константа не может быть сложена с переменной */
$max_width += 1;
echo $max_width; echo "<br />";
?>
<br />
<br />
<!--Константы-->
<!--Логические конструкции-->
<h2>Логические конструкции</h2><br />
<?php
$a = 3;
$b = 5;
if ($a > $b) { //$a <= $b , $a == $b, $a != $b
echo "a is larger than b";
}
if ($a < $b) { 
echo "b is larger than a";
}
?>
<br />
<?php
$a = 30;
$b = 4;
if ($a > $b) {
    echo "a is larger than b";
} elseif ($a == $b) {
    echo "a equals b";
} else {
    echo "a is smaller than b";
	}
?>
<br />
<?php
$c = 20;
$d = 15;
if (($a < $b) && ($c < $d)) {
    echo "a is larger than b AND ";
    echo "c is larger than d";
	echo "<br />";
} 
if (($a < $b) || ($c < $d)) {
    echo "a is larger than b OR ";
    echo "c is larger than d";
    echo "<br />";	
}  else {
    echo "neither a is larger than b or c is larger d";
	}
?>
<br />
<?php
// unset($a); - с такой строкой мы отменим значение переменной и назначим ей значение 100
if (!isset($a)) {
  $a = 100;
  }
  echo $a;
?>
<br />
<?php
if (!is_int($a)) {
  settype($a, "string");
  }
  echo gettype($a);
?>
<br />
<br />
<!--Логические конструкции-->
<!--Константы-->
<h2>Константы</h2><br />
<?php

?>
<br />
<br />
<!--Константы-->
<!--Константы-->
<h2>Константы</h2><br />
<?php

?>
<br />
<br />
<!--Константы-->
<!--Информация о php-->
<h2>Информация о php</h2><br />
<?php phpinfo();?>
<!--Информация о php-->