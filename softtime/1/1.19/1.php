<form method=get> 
Введите число:
<input type=text name=number value=<?= $_GET['number'] ?>><br>
<input type=submit value="Преобразовать"> 
</form>
<?php
  if(!empty($_GET))
  {

  // Арабское число
  $number = $_GET['number'];
  // Строка для римского числа
  $roman = "";

  if($number > 2000 || $number < 1)
  {
    exit("Число должно принимать значение от 1 до 2000");
  }

  // Определяем обозначение 1, 10, 100 и 1000
  $one = array('I','X','C','M');
  // Определяем обозначение 5, 50 и 500
  $five = array('V','L','D');

  // Устанавливаем индекс для массивов $one[] и $five[]
  $index = 0;
  do
  {
    switch($number % 10)
    {
      case 1:
        $roman = $one[$index].$roman;
        break;
      case 2:
        $roman = $one[$index].$roman;
        $roman = $one[$index].$roman;
        break;
      case 3:
        $roman = $one[$index].$roman;
        $roman = $one[$index].$roman;
        $roman = $one[$index].$roman;
        break;
      case 4:
        $roman = $five[$index].$roman;
        $roman = $one[$index].$roman;
        break;
      case 5:
        $roman = $five[$index].$roman;
        break;
      case 6:
        $roman = $one[$index].$roman;
        $roman = $five[$index].$roman;
        break;
      case 7:
        $roman = $one[$index].$roman;
        $roman = $one[$index].$roman;
        $roman = $five[$index].$roman;
        break;
      case 8:
        $roman = $one[$index].$roman;
        $roman = $one[$index].$roman;
        $roman = $one[$index].$roman;
        $roman = $five[$index].$roman;
        break;
      case 9:
        $roman = $one[$index + 1].$roman; // Вместо I -> X
        $roman = $one[$index].$roman;
        break;
    }
    $number = $number / 10;
    $index++;
  }
  while($number);

  // Выводим результат
  echo $roman;
  }
?>
