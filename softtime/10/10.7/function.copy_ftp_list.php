<?php
  include "config.php";
  function copy_ftp_list($path_from, 
                         $path_to, 
                         $ftp_handle_to, 
                         $ftp_handle_from)
  {
    //
    $list_form = ftp_rawlist($ftp_handle_from, $path_from);
    foreach($list_form as $file)
    {
      // Разбиваем строку по пробельным символам
      list($acc,
           $bloks,
           $group,
           $user,
           $size, 
           $month, 
           $day, 
           $year, 
           $filename) = preg_split("/[\s]+/", $file);
      if($filename != "." && $filename != "..")
      {
        if($acc[0] == 'd') 
        {
          $next_dir_to = $path_to."/".$filename;
          $next_dir_to = preg_replace("|/+|","/",$next_dir_to);
          @ftp_mkdir($ftp_handle_to, $next_dir_to);
          ftp_chmod($ftp_handle_to, 
                    getchmod(substr($acc, 1)), 
                    $next_dir_to);
          // Копируем данные
          $next_dir_from = $path_from."/".$filename;
          $next_dir_from = preg_replace("|/+|","/",$next_dir_from);
          copy_ftp_list($next_dir_from, 
                        $next_dir_to, 
                        $ftp_handle_to, 
                        $ftp_handle_from);
        }
        else
        {
          $file_from = $path_from."/".$filename;
          $file_from = preg_replace("|/+|","/",$file_from);
          $mk_file_to = $path_to."/".$dirname."/".$filename;
          $mk_file_to = preg_replace("|/+|","/",$mk_file_to);
          echo str_repeat("|", $lev)."--Копирование файла
               <b>$mk_file_to</b>..."; 
          flush();
          if(ftp_get($ftp_handle_from,"tf.fl",$file_from,FTP_BINARY) && 
             ftp_put($ftp_handle_to,$mk_file_to,"tf.fl",FTP_BINARY) && 
             ftp_chmod($ftp_handle_to, 
                       getchmod(substr($acc, 1)), 
                       $mk_file_to) &&
             unlink("tf.fl"))
          {
            echo "OK<br>";
          }
          else
          {
            echo "ERROR<br>";
          }
        }
      }
    }
  }
  function getchmod($perm)
  {
    $chmod = 0;
    if($perm[0] == "r") $chmod = $chmod+0400;
    if($perm[1] == "w") $chmod = $chmod+0200;
    if($perm[2] == "x") $chmod = $chmod+0100;
    if($perm[3] == "r") $chmod = $chmod+0040;
    if($perm[4] == "w") $chmod = $chmod+0020;
    if($perm[5] == "x") $chmod = $chmod+0010;
    if($perm[6] == "r") $chmod = $chmod+0004;
    if($perm[7] == "w") $chmod = $chmod+0002;
    if($perm[8] == "x") $chmod = $chmod+0001;
    return $chmod;
  }
?>
