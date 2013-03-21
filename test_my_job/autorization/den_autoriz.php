    if($postpage['act'] == 'login')
    {
        if($event->check($postpage['email'], 'email'))
        {
            $sql = $db->query("SELECT password FROM ".perfix."_users WHERE email='".$postpage['email']."'");
            if( $db->num_rows($sql) == 1) 
            {
                $row = $db->get_row($sql);
                if( $row['password'] == perfixUserLogin($postpage['password']) )
                {
                    setcookie('box_email', $postpage['email'], $config['cookis'],'/');
                    setcookie('box_password', perfixUserLogin($postpage['password']), $config['cookis'],'/');
                    setcookie('box_guest', '');
                    echo $_SERVER['HTTP_REFERER'];
                } else die('1');
            } else die('1');
        } else die('1');
    }
