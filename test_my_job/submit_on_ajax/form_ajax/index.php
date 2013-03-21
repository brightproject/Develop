<?php header("Content-Type: text/html; charset=utf-8"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Построение пользовательских интерфейсов на основе библиотеки jQuery</title>

<script type="text/javascript" src="js/jquery-1.2.6.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>
 
<style type="text/css">
* {
    margin:0;
    padding:0;
}

html, body {
    background-color:#FFF;
    font-family: "Trebuchet MS", Tahoma, Verdana, Arial, Helvetica, sans-serif;
    font-size: 10pt;
}
form {
  margin-left:25px;
}
input, textarea, select {
  display:block;
  width:250px;
  float:left;
  margin-left:10px;
  margin-bottom:10px;
  font-family: "Trebuchet MS", Tahoma, Verdana, Arial, Helvetica, sans-serif;
  font-size: 10pt;
}
optgroup, option {
  font-family: "Trebuchet MS", Tahoma, Verdana, Arial, Helvetica, sans-serif;
  font-size: 10pt;
}
label {
  display:block;
  text-align:right;
  float:left;
  width:105px;
  padding-right:5px;
}
br {
  clear:left;
}
.cb, .rb {
  width:1em;
}
.ms, .ta {
  height:100px;
}
#reset, #submit1 {
  width:87px;
  margin-left:20px;
  margin-top:10px;
}
#submit2 {
  width:87px;
  height:40px;
  margin-left:20px;
}
#output {
  background-color:#F0B80D;
  height:25px;
  overflow:hidden;
  padding:5px;
}
</style>
</head>
<body>
<!-- css и javascript-коды специально размещены непосредственно на странице. -->

<div id="output">AJAX-ответ от сервера заменит этот текст.</div>

<form id="myForm" action="form.php" method="post">
<input type="hidden" name="Hidden" value="hidden Value" /><br />
<label for="Name">Имя:</label>
<input name="Name" type="text" value="Моё имя" /><br />
<label for="Password">Пароль:</label>
<input name="Password" type="password" /><br />
<label for="Multiple">Мультиселект:</label>
<select class="ms" name="Multiple" multiple="multiple">
  <optgroup label="Группа 1">
    <option value="one" selected="selected">Первый элемент</option>
    <option value="two">Второй элемент</option>
    <option value="three">Третий элемент</option>
  </optgroup>
  <optgroup label="Группа 2">
    <option value="four">Четвертый элемент</option>
    <option value="five">Пятый элемент</option>
    <option value="six">Шестой элемент</option>
    <option value="seven">Седьмой элемент</option>
  </optgroup>
</select><br />
<label for="Single">Элемент select:</label>
<select name="Single">
  <option value="one" selected="selected">Первый элемент</option>
  <option value="two">Второй элемент</option>
  <option value="three">Третий элемент</option>
</select><br />
<label for="Single2">Элемент select 2:</label>
<select name="Single2">
  <optgroup label="Группа 1">
    <option value="A" selected="selected">Буква A</option>
    <option value="B">Буква B</option>
    <option value="C">Буква C</option>
  </optgroup>
  <optgroup label="Группа 2">
    <option value="D">Буква D</option>
    <option value="E">Буква E</option>
    <option value="F">Буква F</option>
    <option value="G">Буква G</option>
  </optgroup>
</select><br />
<label for="Check">Чекбоксы:</label>
<input class="cb" type="checkbox" name="Check" value="1" />
<input class="cb" type="checkbox" name="Check" value="2" />
<input class="cb" type="checkbox" name="Check" value="3" /><br />
<label for="Radio">Радиобаттоны:</label>
<input class="rb" type="radio" name="Radio" value="1" />
<input class="rb" type="radio" name="Radio" value="2" />
<input class="rb" type="radio" name="Radio" value="3" /><br />
<label for="Text">Просто текст:</label>
<textarea class="ta" name="Text" rows="2" cols="20">Это элемент textarea</textarea><br />
<input id="reset" type="reset" name="resetButton" value="Reset" />
<input id="submit1" type="submit" name="submitButton" value="Submit1" />
<input id="submit2" type="image" name="submitButton" value="Submit2" src="form.gif" />
</form>


<script type="text/javascript">
$(document).ready(function(){
// ---- Форма -----
  var options = { 
    // элемент, который будет обновлен по ответу сервера 
  	target: "#output",
    beforeSubmit: showRequest, // функция, вызываемая перед передачей 
    success: showResponse, // функция, вызываемая при получении ответа
    timeout: 3000 // тайм-аут
  };
  
  // привязываем событие submit к форме
  $('#myForm').submit(function() { 
    $(this).ajaxSubmit(options); 
    // !!! Важно !!! 
    // всегда возвращаем false, чтобы предупредить стандартные
    // действия браузера (переход на страницу form.php) 
    return false;
  }); 
// ---- Форма -----
});

// вызов перед передачей данных
function showRequest(formData, jqForm, options) { 
    // formData - массив; здесь используется $.param чтобы преобразовать его в строку для вывода в alert(),
    // (только в демонстрационных целях), но в самом плагине jQuery Form это совершается автоматически.
    var queryString = $.param(formData); 
    // jqForm это jQuery объект, содержащий элементы формы.
    // Для доступа к элементам формы используйте 
    // var formElement = jqForm[0]; 
    alert('Вот что мы передаем: \n\n' + queryString); 
    // здесь можно вернуть false чтобы запретить отправку формы; 
    // любое отличное от fals значение разрешит отправку формы.
    return true; 
} 
 
// вызов после получения ответа 
function showResponse(responseText, statusText)  { 
    // для обычного html ответа, первый аргумент - свойство responseText
    // объекта XMLHttpRequest
 
    // если применяется метод ajaxSubmit (или ajaxForm) с использованием опции dataType 
    // установленной в 'xml', первый аргумент - свойство responseXML
    // объекта XMLHttpRequest
 
    // если применяется метод ajaxSubmit (или ajaxForm) с использованием опции dataType
    // установленной в 'json', первый аргумент - объек json, возвращенный сервером.
 
    alert('Статус ответа сервера: ' + statusText + '\n\nТекст ответа сервера: \n' + responseText + 
        '\n\nЦелевой элемент div обновиться этим текстом.'); 
}
</script>
</body>
</html>