<?php
$file = "upload/test.jpg";
if($fp = fopen($file,"rb", 0))
{
   $picture = fread($fp,filesize($file));
   fclose($fp);
   // base64 encode the binary data, then break it
   // into chunks according to RFC 2045 semantics
   $base64 = chunk_split(base64_encode($picture));
   $tag = '<img src="data:image/jpg;base64,' . $base64 . '" />';
   echo $tag;
}
?>