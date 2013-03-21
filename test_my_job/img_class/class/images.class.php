<?php
 /**********************************
  made by: Tatarinov Denis
  version: 2.10v-nws
  date relize: 18.09.2009
  email: denikin91@rambler.ru
 ***********************************/ 
 
 class images {
  protected $time = 0;
  protected $name_file = '';
  #начальные размеры изображения
  protected $old_width = NULL;
  protected $old_height = NULL;
  #конечные размеры изображения
  protected $width = NULL;
  protected $height = NULL;
  protected $image = false;
  #качество и тип изображения
  protected $quality = 100;
  protected $type = false; 
  protected $new_type = false;
  #максимальный размер (ширины или длинны) и папка для загрузки
  protected $maax = 3000;
  protected $dir_upload = 'upload/';
  #начальный и конечный размер файла (в битах)
  protected $size_img = NULL;
  protected $new_size_img = NULL;
  #to text
  protected $table = '';
  #ошибка
  var $error = ''; 
  var $error_file = '';
  var $error_lng = array(
   'no_file' => "Файла не существует <br>",
   'old_file' => "Файл уже существует <br />",
   'more_size' => "Размер картинки слишком большой <br />",
   'no_type' => "Неизвесный формат <br />",
   'error_dir' => "Папки не существует или закрыта назапись <br />"
 );
  
  #получаем данные о картинке...
  public function info($parametr)
  {
  switch($parametr)
  {
   case 'new_width': return(round($this->width,2)); break;
   case 'new_height': return(round($this->height,2)); break;  
   case 'old_width': return(round($this->old_width,2)); break;
   case 'old_height': return(round($this->old_height,2)); break;  
   case 'type': return($this->type_img); break;  
   case 'new_type': return($this->new_type); break;  
   case 'size': return(round($this->size_img/1024,3)); break;  
   case 'new_size': return(round($this->new_size_img/1024,3)); break;  
   case 'time': return(round($this->time,2)); break;  
   case 'name': return($this->name_file); break;  
   case 'totext': return($this->table); break;  
   default: return 'Fuck!!! не тот параметр! Смотри что пишешь в коде!!!!!'; break;
  }
  }
  
  #Установить новую директорию загрузки
  public function new_dir($dir)
  {
  $this->dir_upload = $dir;
  }
  public function max($max)
  {
  $this->maax = $max;
  }
  #Открываем картинку и получаем параметры, в связи с ними создаем формы
  public function load($file_name)
  {
  $this->name_file = $file_name;
  $time_before = $this->get_time();
  if(is_file($file_name))
  {
   list($width, $height, $type) = getimagesize($file_name);
   if($width>$this->maax or $height>$this->maax) $this->error = $this->error_lng['more_size'];
   else
   {
    $this->width = $width;
    $this->height = $height;   
    $this->old_width = $width;   
    $this->old_height = $height;
    $this->size_img = filesize($file_name);
    
    switch($type)
    {
    case 1:
     if($tmp_image = imagecreatefromgif($file_name)){
      $this->type = $type;     
      $this->type_img = 'gif';
      $this->image = $tmp_image;
      imagealphablending($this->image,true);
      imagesavealpha($this->image, true);
     }
    break;
    case 2:
     if($tmp_image = imagecreatefromjpeg($file_name)){     
      $this->type = $type;
      $this->type_img = 'jpeg';
      $this->image = $tmp_image;
     }
    break;
    case 3:
     if($tmp_image = imagecreatefromstring(file_get_contents($file_name))){
      $this->type = $type;
      $this->type_img = 'png';
      $this->image = $tmp_image;
      imagealphablending($this->image,true);
      imagesavealpha($this->image, true);
     }
    break;
    default: $this->error = $this->error_lng['no_type']; break;
    }
   }
  }
  else $this->error = $this->error_lng['no_file'];
  $this->time += $this->get_time() - $time_before;
  }
  
  #to text
  public function totext($sing='#')
  {
  $time_before = $this->get_time();
  if(!$this->error) 
  {
   for($i=0; $i < $this->width; $i++)
   {
   for ($h = 0; $h < $this->height; $h++)
   {
    $rgb = imagecolorsforindex($this->image, imagecolorat($this->image, $i, $h));
    $row[$i][$h] = dechex($rgb['red']).dechex($rgb['green']).dechex($rgb['blue']);
   }
   }
   
   $this->table = "<table bgcolor='#000000' border=0 cellpadding=0 cellspacing=0 class='image'>"
   for($i=0; $i < $this->height; $i++)
   {
   $this->table .= "<tr>";
   for($h=0;$h < $this->width; $h++) $this->table .= "<td><font color=".$row[$h][$i].">".$sing."</font></td>"  
   $this->table .= "</tr>";
   }
   $this->table .= "</table>";
  }
  $this->time += $this->get_time() - $time_before;
  }
  
  #проверка на запись в папку
  protected function scan_dir()
  {
  $file = $this->dir_upload;
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
  
  #обрезка картинки
  public function crop($t = 0,$r = 0,$b = 0,$l = 0)
  {
  $time_before = $this->get_time();
  if(!$this->error) 
  {
   $new_image = imagecreatetruecolor($this->width-($l+$r), $this->height-($t+$b));
   imagecopyresampled($new_image, $this->image, -$l, -$t, 0, 0, $this->width, $this->height, $this->width, $this->height);  
    $this->width = $this->width-($l+$r);
    $this->height = $this->height-($t+$b);
    $this->image = $new_image;
  }
  $this->time += $this->get_time() - $time_before;
  }
  
  #фото-фильтры
  public function filter($permission = 'no')
  {
  $time_before = $this->get_time();
  if(!$this->error) 
  {
   if(ereg("grey",$permission)) imagefilter($this->image, IMG_FILTER_GRAYSCALE);
   if(ereg("negativ",$permission)) imagefilter($this->image, IMG_FILTER_NEGATE);
   if(ereg("sun",$permission)) 
   {
    preg_match('/suns*=s*(d+)/is', $permission, $lvl);
    imagefilter($this->image, IMG_FILTER_BRIGHTNESS, $lvl[1]);
   }
   if(ereg("contrast",$permission)) 
   {
    preg_match('/contrasts*=s*(d+)/is',$permission, $lvl);
    imagefilter($this->image, IMG_FILTER_CONTRAST, $lvl[1]*(-1));
   }
   if(ereg("shadow",$permission)) 
   {
    preg_match('/shadows*=s*(d+),s*(d+)?/is',$permission, $lvl);
    if(!$lvl)$this->shadow();
    else $this->shadow($lvl[1], $lvl[2]);
   }
   if(ereg("blur",$permission)) imagefilter($this->image, IMG_FILTER_GAUSSIAN_BLUR);
  }
  $this->time += $this->get_time() - $time_before;
  }
  
  #тень
  protected function shadow($width = 4, $deep = 7)
  {
  $iw = $this->width + 4*$width;
  $ih = $this->height + 4*$width;
  $img = imagecreatetruecolor($iw, $ih);
  
  $deep = 255-$deep*12;
  $shadow = imagecolorallocate($img, $deep, $deep, $deep); 
  
  $bg = imagecolorallocate($img, 255, 255, 255); 
  imagefilledrectangle($img,0,0,$iw,$ih,$bg);
  imagefilledrectangle($img, 1+$width, 1+$width, $iw-1-$width, $ih-1-$width, $shadow);
  
  $matrix = array (array(1,1,1),array(1,1,1),array(1,1,1));
  for ($i=0; $i < $width*2; $i++, imageconvolution($img, $matrix, 9, 0)); 
  
  imagecopyresampled($img, $this->image, 2*$width,2*$width,0,0,$this->width,$this->height,$this->width,$this->height);
  $this->image = $img;  
  }
  
  #скругление углов
  public function corner($radius = 30, $rate = 5){
  $time_before = $this->get_time();
  if(!$this->error) 
  {
   if($this->type_img == 'png')
   {
    
    imagealphablending($this->image, false);
    imagesavealpha($this->image, true);
    
    $rs_radius = $radius * $rate;   
    $corner = imagecreatetruecolor($rs_radius * 2, $rs_radius * 2);
    imagealphablending($corner, false);
    
    $trans = imagecolorallocatealpha($corner, 255, 255, 255 ,127);
    imagefill($corner, 0, 0, $trans);
    
    $positions = array(
    array(0, 0, 0, 0),
    array($rs_radius, 0, $this->width - $radius, 0),
    array($rs_radius, $rs_radius, $this->width - $radius, $this->height - $radius),
    array(0, $rs_radius, 0, $this->height - $radius),
    );
    
    foreach ($positions as $pos) imagecopyresampled($corner, $this->image, $pos[0], $pos[1], $pos[2], $pos[3], $rs_radius, $rs_radius, $radius, $radius);
    
    $i = -$rs_radius;
    $y2 = -$i;
    
    for (; $i <= $y2; $i++) 
    {
    $y = $i;
    $x = sqrt($rs_radius*$rs_radius - $y* $y);
    $y += $rs_radius;
    $x += $rs_radius;
    imageline($corner, $x, $y, $rs_radius * 2, $y, $trans);
    imageline($corner, 0, $y, $rs_radius * 2 - $x, $y, $trans);
    }
    
    foreach ($positions as $i => $pos) imagecopyresampled($this->image, $corner, $pos[2], $pos[3], $pos[0], $pos[1], $radius, $radius, $rs_radius, $rs_radius);
   }
  }
  $this->time += $this->get_time() - $time_before;
  }
  
  #поворот картинки
  public function rotate($ygol)
  {
  $time_before = $this->get_time();
  if(!$this->error) 
  {
   switch($ygol)
   {
    case 'l':
    case 'left': $gs = 90; break;
    case 'r':
    case 'right': $gs = -90; break;
    default: $gs = -90; break;
   }
   $new_image = imagecreatetruecolor($this->width,$this->height);
   $this->image = imagerotate($this->image, $gs,1);  
   $this->width = imagesx($this->image);  
   $this->height = imagesy($this->image);
  }
  $this->time += $this->get_time() - $time_before;
  }
  
  #общая функция
  public function re($size, $ge = 'none')
  {
  $time_before = $this->get_time();
  if(!$this->error) 
  {
   $size = ($size>$this->maax)? $this->maax : $size;
   if(ereg("width|w|W", $ge)) $this->width($size);  
   if(ereg("height|h|H", $ge)) $this->height($size);  
   if(ereg("%", $size)) 
   {
    $size = substr($size,0,-1);
    $size = ($size<0)? 1 : $size;
    $size = ($size>100)? 100 : $size;
    $this->percent($size);
   }
  }
  $this->time += $this->get_time() - $time_before;
  }
  
  #установление собственной ширины картинки
  protected function width($new_width = 2)
  {
  $time_before = $this->get_time();
  if(!$this->error) 
  {
   $new_width = ($new_width<2)? 2 : $new_width;
   $ratio = $this->width / $new_width;  
   $new_height = $this->height / $ratio;
   $new_image = imagecreatetruecolor($new_width, $new_height);
   
   if(imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, round($new_width), round($new_height), $this->width, $this->height))
   {
   $this->width = round($new_width);
   $this->height = round($new_height);   
   $this->image = $new_image;   
   }
   else imagedestroy($new_image);
  }
  $this->time += $this->get_time() - $time_before;
  }
  
  #установление собственной высоты картинки
  protected function height($new_height = 2)
  {
  $time_before = $this->get_time();
  if(!$this->error) 
  {
   $new_height = ($new_height<2)? 2 : $new_height;
   $ratio = $this->height / $new_height;  
   $new_width = $this->width / $ratio;  
   $new_image = imagecreatetruecolor($new_width, $new_height);
   
   if( imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, round($new_width), round($new_height), $this->width, $this->height))
   {
   $this->width = round($new_width);
   $this->height = round($new_height);
   $this->image = $new_image;
   }
   else imagedestroy($new_image);
  }
  $this->time += $this->get_time() - $time_before;
  }
  
  #Процентное уменьшение или увеличение
  protected function percent($percent = 100)
  {
  $time_before = $this->get_time();
  if(!$this->error) 
  {
   $new_height = $this->height * ($percent/100);
   $new_width = $this->width * ($percent/100);    
   $new_image = imagecreatetruecolor($new_width, $new_height);
   
   if( imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, round($new_width), round($new_height), $this->width, $this->height))
   {
   $this->width = round($new_width);
   $this->height = round($new_height);
   $this->image = $new_image;
   }
   else imagedestroy($new_image);
  }
  $this->time += $this->get_time() - $time_before;
  }
  
  #функция установления качества изображения
  public function quality($quality = 75)
  {
  $time_before = $this->get_time();
  if(!$this->error) 
  {
   $quality = round($quality);
   $quality = ($quality<0)? 1 : $quality;  
   $quality = ($quality>100)? 100 : $quality;
   $this->quality = $quality;
  }
  $this->time += $this->get_time() - $time_before;
  }
 
  #функция вывода изображения
  public function save($name, $replace = 'none', $format = '')
  {
  $time_before = $this->get_time();
  if(!$this->error) 
  {
   if($this->scan_dir())
   {
    if(!$format) 
    {
    $format = $this->type_img;
    $this->new_type = $this->type_img;
    } else $this->new_type = $format;
    
    if(!is_file($this->dir_upload.$name.'.'.$format) or $replace == 'yes')
    {
    switch($format)
    {
     case 'png': imagepng($this->image, $this->dir_upload.$name.'.'.$format); break;
     case 'jpg':case'jpeg': imagejpeg($this->image, $this->dir_upload.$name.'.'.$format, $this->quality );break;
     case 'gif': imagegif($this->image, $this->dir_upload.$name.'.'.$format); break;
    }
    $new_image = $this->dir_upload.$name.'.'.$format;   
    $this->new_size_img = filesize($new_image);
    }
    else $this->error_file = $this->error_lng['old_file'];
   }
   else $this->error_file = $this->error_lng['error_dir'];
  }
  $this->time += $this->get_time() - $time_before;
  }
  
  #функции времени
  protected function get_time()
  {
  list($seconds, $microSeconds) = explode(' ', microtime());
  return ((float)$seconds + (float)$microSeconds);
  } 
  
  #очистка памяти
  public function destroy()
  {
  if(!$this->error) 
  {
   if($this->image) imagedestroy($this->image);
   $this->old_height = NULL;  
   $this->old_width = NULL;
   $this->height = NULL;
   $this->width = NULL;
   $this->type = false;
   $this->size_img = NULL;
   $this->new_size_img = NULL;
   $this->time = 0;
  }
  }
 }
 ?> 