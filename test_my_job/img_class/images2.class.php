<?php

class images 
{

	var $width = 0;
	var $height = 0;
	var $type = 0;
	var $size = 0;
	var $upload = 'upload/';
	var $quality = 100;
	var $image = NULL;
	
	/*
	* Функция загрузки
	*
	* 1 входящий параметр - имя файла 
	*/
	
	function load($file_name)
	{
		if(is_file($file_name))
		{
			list($width, $height, $type) = getimagesize($file_name);
			
			$this->width = $width;
			$this->height = $height;
			$this->size = filesize($file_name);
			
			switch($type){
				case 1: $this->image = imagecreatefromgif($file_name); break;
				case 2:	$this->image = imagecreatefromjpeg($file_name);	break;
				case 3:	$this->image = imagecreatefromstring(file_get_contents($file_name)); break;
				default: return false; break;
			}
			imagealphablending($this->image,true);
			imagesavealpha($this->image, true);
			$this->type = $type;
			return $this;
		}
	}
	
	/*
	* Функция обрезки картинки
	*
	* 4 параметра: сверху  справа снизу слева
	*/
	
	public function crop($t = 0,$r = 0,$b = 0,$l = 0)
	{
		$new_image = imagecreatetruecolor($this->width-($l+$r), $this->height-($t+$b));
		imagecopyresampled(
			$new_image, $this->image, 
			-$l, -$t, 0, 0, $this->width, 
			$this->height, $this->width,
			$this->height
		);			
		$this->width =  $this->width-($l+$r);
		$this->height = $this->height-($t+$b);
		$this->image = $new_image;
		return $this;
	}
	
	/*
	* Функция уменьшения по ширине
	* 
	* 1 параметр: ширина исходящей картинки
	*/
	
	function width($new_width = 2)
	{
		$new_width = ($new_width < 2)? 2 : $new_width;
		$new_height = $this->height / ($this->width / $new_width);
		$new_image = imagecreatetruecolor($new_width, $new_height);
	
		if(imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $new_width, round($new_height), $this->width, $this->height))
		{
			$this->width =  $new_width;
			$this->height = round($new_height);
			$this->image = $new_image;	
		}
		else imagedestroy($new_image);
		return $this;
	}
	
	/*
	* Функция уменьшения по высоте
	* 
	* 1 параметр: высота исходящей картинки
	*/
	
	function height($new_height = 2)
	{
		$new_height = ($new_height < 2)? 2 : $new_height;
		$new_width = $this->width / ($this->height / $new_height);		   
		$new_image = imagecreatetruecolor($new_width, $new_height);
		
		if( imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, round($new_width), $new_height, $this->width, $this->height))
		{
			$this->width =  round($new_width);
			$this->height = $new_height;
			$this->image = $new_image;
		}
		else imagedestroy($new_image);
		return $this;
	}
	 
	/*
	* Функция процентного изменения высоты и ширины
	* 
	* 1 параметр: процент изменения
	*/
	
	function percent($percent = 100)
	{
		$new_height = $this->height * ($percent / 100);
		$new_width = $this->width * ($percent / 100);					
		$new_image = imagecreatetruecolor($new_width, $new_height);
		
		if( imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, round($new_width), round($new_height), $this->width, $this->height))
		{
			$this->width =  round($new_width);
			$this->height = round($new_height);
			$this->image = $new_image;
		}
		else imagedestroy($new_image);
		return $this;
	}
	
	/*
	* Функция сохранения изображения с проверкой на сущевствование папки
	* 
	* 3 параметра:  имя сохрания, замена уже существующей, формат вывода
	*/
	
 	public function save($name, $format = '')
	{
		if($this->scan_dir())
		{
			switch($format)
			{
				case 'png': 
					imagepng($this->image, $this->upload.$name.'.'.$format); 
					break;
				case 'jpg': 
					imagejpeg($this->image, $this->upload.$name.'.'.$format, $this->quality ); 
					break;
				case 'gif': 
					imagegif($this->image, $this->upload.$name.'.'.$format); 
					break;
			}
		} 
	}
	
	/*
	* Функция проверки папки на запись
	* 
	* нет параметров
	*/
	
	function scan_dir()
	{
		$file = $this->upload;
		if(!file_exists($file)) return false;
		
		elseif(is_writable($file)) return true;
		else
		{
			@chmod($file, 0777);
			if(is_writable($file)) return true; 
			else
			{
				@chmod($file, 0755);
				if(is_writable($file)) return true;
				else return false;
			}
		}
	}
	
	/*
	* Функция поворота картинки
	* 
	* указывать в какую сторону поворачивать (left|right)
	*/
	
	function rotate($ygol = '')
	{
		if(preg_match('/l|left/si', $ygol)) $gs = 90;
		else $gs = -90;
		
		$new_image = imagecreatetruecolor($this->width, $this->height);
		$this->image = imagerotate($this->image, $gs, 1);			
		$this->width = imagesx($this->image);			 
		$this->height = imagesy($this->image);
		return $this;
	}
	
	/*
	* Функция наложения фильтров на фото
	* 
	* указывать в какую сторону поворачивать (left|right)
	*/
	
	public function filter($permission = 'no')
	{
		if(preg_match('/grey/si', $permission)) imagefilter($this->image, IMG_FILTER_GRAYSCALE);
		if(preg_match('/negativ/si', $permission)) imagefilter($this->image, IMG_FILTER_NEGATE);
		if(preg_match('/blur/si', $permission)) imagefilter($this->image, IMG_FILTER_GAUSSIAN_BLUR);
		if(preg_match('/sun/si', $permission)) 
		{
			preg_match('/sun\s*=\s*(\d+)/is', $permission, $lvl);
			imagefilter($this->image, IMG_FILTER_BRIGHTNESS, $lvl[1]);
		}
		if(preg_match('/contrast/si', $permission)) 
		{
			preg_match('/contrast\s*=\s*(\d+)/is',$permission, $lvl);
			imagefilter($this->image, IMG_FILTER_CONTRAST, $lvl[1]*(-1));
		}
		return $this;
	}
	
	/*
	* Очищаем память
	* 
	* без параметров
	*/
	
	function destroy()
	{
		unset($this);			
	}

}
?>