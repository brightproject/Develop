
функция для получения информации о пользователе

function info() 
{
      $nameScript = str_replace( '/', '', $_SERVER['SCRIPT_NAME']);
      $script = str_replace( '.php', '', $nameScript);
      
      $host = $_SERVER['HTTP_HOST'];
      
      $browser_list = 'msie firefox konqueror safari netscape navigator opera mosaic lynx amaya omniweb chrome avant camino flock aol mozilla gecko';
      $user_browser = strtolower($_SERVER['HTTP_USER_AGENT']);
      $this_version = $this_browser = '';
      
      $browser_limit = strlen($user_browser);
      $list_list = explode(' ', $browser_list);
      $a_browser = false;
      foreach ($list_list as $row)
      {
         $row = ($a_browser !== false) ? $a_browser : $row;
         $n = stristr($user_browser, $row);
         if (!$n || !empty($this_browser)) continue;
       
         $this_browser = $row;
         $j = strpos($user_browser, $row) + strlen($row) + 1;
         for (; $j <= $browser_limit; $j++)
         {
            $s = trim(substr($user_browser, $j, 1));
            $this_version .= $s;
            if ($s === '') break;
         }
      }
       
      $this_platform = '';
      if (strpos($user_browser, 'linux'))
         $this_platform = 'linux';
      elseif (strpos($user_browser, 'macintosh') || strpos($user_browser, 'mac platform x'))
         $this_platform = 'mac';
      else if (strpos($user_browser, 'windows') || strpos($user_browser, 'win32'))
         $this_platform = 'windows';

      return array(
         "browser" => $this_browser,
         "version" => $this_version,
         "platform"  => $this_platform,
         "useragent" => $user_browser
      );
      
} 

использование

$user_info = info(); 
print_r($user_info); 