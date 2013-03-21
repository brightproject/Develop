<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<title>Пять примеров CSS меню</title>

<script type="text/javascript" src="dropdowntabfiles/dropdowntabs.js"></script>
<!-- CSS для первого примера -->
<link rel="stylesheet" type="text/css" href="dropdowntabfiles/ddcolortabs.css" />
<!-- CSS для второго примера -->
<link rel="stylesheet" type="text/css" href="dropdowntabfiles/bluetabs.css" />
<!-- CSS для третьего примера -->
<link rel="stylesheet" type="text/css" href="dropdowntabfiles/slidingdoors.css" />
<!-- CSS для четвертого примера -->
<link rel="stylesheet" type="text/css" href="dropdowntabfiles/glowtabs.css" />
<!-- CSS для пятого примера -->

<link rel="stylesheet" type="text/css" href="dropdowntabfiles/halfmoontabs.css" />
<script type="text/javascript" src="sliding_buttons/mootools.js"></script>
<script type="text/javascript">
window.addEvent('domready', function(){
	$$('#menu a').each(function(el) {    
		var fx = new Fx.Morph(el,{duration:700,transition:Fx.Transitions.Bounce.easeOut,link:'cancel'});  
		el.addEvents({  
			'mouseenter': function() {fx.start({'padding-top':30, 'background-color':'#000'});},
			'mouseleave': function() {fx.start({'padding-top':0, 'background-color':'#F04F31'});}
		});  
	});   
});
</script>
<style type="text/css">
*{margin:2;padding:0}
body{font-family:Arial, Helvetica, sans-serif}
#menu{position:relative;width:100%;height:30px;z-index:100;border-bottom:solid 3px #000;background:#F04F31;margin-bottom:10px}
	#menu ul{list-style:none;font-size:0.85em;position:absolute;left:0;top:0}
		#menu li{float:left}
			#menu li a{display:block;text-decoration:none;float:left;height:30px;line-height:30px;padding:0 20px;background:#F04F31;color:#fff}
#content{clear:both;margin:0 10px;background:#ccc;height:100px;text-align:center;line-height:90px;font-weight:bold}
 </style>
<body>
<h1 style="background: #ffff99; text-align: center; color: #000; border: 1px solid #ff9900; padding: 5px; font-size: 12px; font-weight: bold;">Текст в рамке в цвете</h1>
<style>
h2 {font: bold 11pt tahoma;  color: #393939; }
</style>
<h2>1) Пример 1</h2>
<div id="colortab" class="ddcolortabs">
<ul>
<li><a href="" title="Главная"><span>Главная</span></a></li>
<li><a href="" title="Архив"><span>Архив</span></a></li>
<li><a href="" title="CSS" rel="dropmenu1_a"><span>CSS</span></a></li>
<li><a href="" title="PHP" rel="dropmenu2_a"><span>PHP</span></a></li>
<li><a href="" title="Контакты"><span>Контакты</span></a></li>

</ul>
</div>

<div class="ddcolortabsline">&nbsp;</div>
<!--подменю для первого модуля -->
<div id="dropmenu1_a" class="dropmenudiv_a">
<a href="">Пункт 1</a>
<a href="">Пункт 2</a>
<a href="">Пункт 3</a>
</div>
<!--подменю для второго модуля -->
<div id="dropmenu2_a" class="dropmenudiv_a" style="width: 150px;">
<a href="">Функции</a>

<a href="">Примеры</a>
<a href="">Статьи</a>
</div>

<script type="text/javascript">
//Синтаксис: tabdropdown.init("menu_id", [integer OR "auto"])
tabdropdown.init("colortab", 3)
</script>






<h2>2) Пример 2</h2>
<div id="bluemenu" class="bluetabs">

<ul>
<li><a href="">Главная</a></li>
<li><a href="">Архив</a></li>
<li><a href="" rel="dropmenu1_b">CSS</a></li>
<li><a href="" rel="dropmenu2_b">PHP</a></li>
<li><a href="">Контакты</a></li>
</ul>
</div>

<!--подменю для первого модуля -->
<div id="dropmenu1_b" class="dropmenudiv_b">
<a href="">Пункт 1</a>

<a href="">Пункт 2</a>
<a href="">Пункт 3</a>
</div>
<!--подменю для второго модуля -->
<div id="dropmenu2_b" class="dropmenudiv_b" style="width: 150px;">
<a href="">Функции</a>
<a href="">Примеры</a>
<a href="">Статьи</a>
</div>

<script type="text/javascript">
//Синтаксис: tabdropdown.init("menu_id", [integer OR "auto"])
tabdropdown.init("bluemenu")
</script>





<h2>3) Пример 3</h2>
<div id="slidemenu" class="slidetabsmenu">
<ul>
<li><a href="" title="Главная"><span>Главная</span></a></li>
<li><a href="" title="Архив"><span>Архив</span></a></li>
<li><a href="" title="CSS" rel="dropmenu1_c"><span>CSS</span></a></li>
<li><a href="" title="PHP" rel="dropmenu2_c"><span>PHP</span></a></li>

<li><a href="" title="Контакты"><span>Контакты</span></a></li>
</ul>
</div>
<br style="clear: left;" />
<br class="IEonlybr" />

<!--подменю для первого модуля -->
<div id="dropmenu1_c" class="dropmenudiv_c">
<a href="">Пункт 1</a>
<a href="">Пункт 2</a>
<a href="">Пункт 3</a>
</div>
<!--подменю для второго модуля -->

<div id="dropmenu2_c" class="dropmenudiv_c" style="width: 150px;">
<a href="">Функции</a>
<a href="">Примеры</a>
<a href="">Статьи</a>
</div>

<script type="text/javascript">
//Синтаксис: tabdropdown.init("menu_id", [integer OR "auto"])
tabdropdown.init("slidemenu")
</script>





<h2>4) Пример 4</h2>

<div id="glowmenu" class="glowingtabs">
<ul>
<li><a href="" title="Главная"><span>Главная</span></a></li>
<li><a href="" title="Архив"><span>Архив</span></a></li>
<li><a href="" title="CSS" rel="dropmenu1_d"><span>CSS</span></a></li>
<li><a href="" title="PHP" rel="dropmenu2_d"><span>PHP</span></a></li>
<li><a href="" title="Контакты"><span>Контакты</span></a></li>
</ul>
</div>
<br style="clear: left;" />
<br class="IEonlybr" />

<!--подменю для первого модуля -->
<div id="dropmenu1_d" class="dropmenudiv_d">
<a href="">Пункт 1</a>
<a href="">Пункт 2</a>
<a href="">Пункт 3</a>
</div>
<!--подменю для второго модуля -->
<div id="dropmenu2_d" class="dropmenudiv_d" style="width: 150px;">
<a href="">Функции</a>
<a href="">Примеры</a>
<a href="">Статьи</a>

</div>

<script type="text/javascript">
//Синтаксис: tabdropdown.init("menu_id", [integer OR "auto"])
tabdropdown.init("glowmenu", "auto")
</script>







<h2>5) Пример 5</h2>
<div id="moonmenu" class="halfmoon">
<ul>
<li><a href="">Главная</a></li>

<li><a href="">Архив</a></li>
<li><a href="" rel="dropmenu1_e">CSS</a></li>
<li><a href="" rel="dropmenu2_e">PHP</a></li>
<li><a href="">Контакты</a></li>
</ul>
</div>

<br style="clear: left;" />
<!--подменю для первого модуля -->
<div id="dropmenu1_e" class="dropmenudiv_e">
<a href="">Пункт 1</a>
<a href="">Пункт 2</a>

<a href="">Пункт 3</a>
</div>
<!--подменю для второго модуля -->
<div id="dropmenu2_e" class="dropmenudiv_e" style="width: 150px;">
<a href="">Функции</a>
<a href="">Примеры</a>
<a href="">Статьи</a>
</div>

<script type="text/javascript">
//Синтаксис: tabdropdown.init("menu_id", [integer OR "auto"])
tabdropdown.init("moonmenu", 3)
</script>

	<div id="menu">
		<ul>
			<li><a href="" title="">Главная</a></li>
			<li><a href="" title="">О нас</a></li>
			<li><a href="" title="">Портфолио</a></li>
			<li><a href="" title="">Контакты</a></li>
		</ul>
	</div>
	<div id="content">Содержимое</div>
</body>
</html>