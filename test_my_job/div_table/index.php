<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" /> 
<title>Test by Den</title> 
</head> 
<style type="text/css">    
body, html {       
padding:0;       
margin:0;    
}    
.block {       
float:left;       
width:200px;      
border:solid 1px #CCC;       
margin:2px;    
}    
.line {       
width:100%;       
float:left;       
height:20px;       
background:#CCC;       
margin: 5px 0;    
} 
</style> 
<body> 
<div align="center">  
<div style="width:830px"> 
<?php    $all_tovar = 17; // количество элементов в базе и на странице    
$block = NULL; // переменная для всего кода    
$count_line = 4; // сколько блоков отделять        
for($i = 1; $i < $all_tovar; $i++)    {       
$block .= '<div class="block">блок #'.$i.'</div>';       
if($i % $count_line == 0) // если текущий i делится нацело на количество желементов в строке добавляем линию       
{          
$block .= '<div class="line"></div>';       
}    
}    
echo $block; ?>  
</div> 
</div>
</body>
</html>