<?php 
  $filename = basename($_GET['down']);
  header("Content-Disposition: attachment; filename=$filename"); 
  header("Content-type: application/octet-stream"); 
  header("Content-length: ".filesize($_GET['down']));
  echo file_get_contents($_GET['down']);
?> 
