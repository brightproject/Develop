<?php  

class MySqlDB {
	
        //private  $link;
        
        function connect($server='', $username='', $password='', $new_link=true, $client_flags=0)
        {
            $this->link = mysql_connect($server, $username, $password, $new_link, $client_flags);
        }
    
        function errno()
        {
            return mysql_errno($this->link);
        }

        function error()
        {
            return mysql_error($this->link);
        }

        function escape_string($string)
        {
            return mysql_real_escape_string($string);
        }
         

        function query($query)
        {
             return mysql_query($query, $this->link); 
            
        }
        
        function fetch_array($result, $array_type = MYSQL_BOTH)
        {
            return mysql_fetch_array($result, $array_type);
        }

        function fetch_row($result)
        {
            return mysql_fetch_row($result);
        }
        
        function fetch_assoc($result)
        {
            return mysql_fetch_assoc($result);
        }
        
        function fetch_object($result)
        {
            return mysql_fetch_object($result);
        }
        
        function num_rows($result)
        {
            return mysql_num_rows($result);
        }
        
        function close()
        {
            return mysql_close($this->link);
        }  
        
    }


	?>