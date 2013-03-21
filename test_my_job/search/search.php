function like($str, $to = 'theme')
{
    if($str == '') return false;
    else 
    {
        $str = str_replace('  ', ' ',$str);
        $arrayword = preg_split(' ', $str);
        $count = count($arrayword);
        if($count > 1) 
            foreach($arrayword as $key)
            {
                if(strlen($key) > 3) $key = substr($key,0,-1);
                if($key != '' and $key != ' ')
                {
                    if(substr($key,0,1) != '-') $q .= $to.' LIKE "%'.$key.'%" AND ';
                    else $q .= $to.' NOT LIKE "%'.substr($key,1).'%" AND ';
                }            
                $q = substr($q, 0, -4);
            } 
        else 
        {
            if(strlen($str) > 3) $str = substr($str,0,-1);
            $q = $to.' like "%'.$str.'%"';    
        }
    }
    return $q;
}


ёзать так

            $query  .= 'SELECT*
                         FROM где
                         WHERE ';                                
            $query .= like($qsearch['query'], 'mtext').' or '.like($qsearch['query'], 'header');

            $sql = $db->query($query);