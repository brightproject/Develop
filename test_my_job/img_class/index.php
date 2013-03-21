<html>
<body >
<?php
	define('MAIN_DIR',dirname(__FILE__));
	include_once MAIN_DIR.('/images2.class.php');
	$img = new images; //включаем класс

	$img->load('images/vista_1.jpg')
		->crop(10, 10, 10, 10)
		->width(100)
		->rotate()
		->filter('blur, sun = 15')
		->height(400)
		->percent(50)
		->save('vista', 'jpg');
		
	echo 'width: '.$img->width.'<br />';
	echo 'heigth: '.$img->height.'<br />';
	
	echo '<img src="upload/vista.jpg" width="'.$img->width.'" height="'.$img->height.'">';
?>
</body>
</html>