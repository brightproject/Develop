<?php
class mySQL {
        
        private $hostDB = 'localhost';
        private $userDB = 'root';
        private $passDB = '';
        private $baseDB = 'test';
        
        var $recordArray = array();
        var $recordString;
        var $myQueryResult;
        
        function __construct() {
             mysql_connect($this->hostDB, $this->userDB, $this->passDB);
            mysql_select_db($this->baseDB);  
        } 
        
        function query($s) {
            $this->myQueryResult = mysql_query($s);
        }

        function fetchArray() {
              if ($this->recordArray = mysql_fetch_array($this->myQueryResult)) {
                   $result = true;
              } else {
                   $result = false;
              }
              return $result;
        }

    }
    
    $myDB = new mySQL;
    
    $myDB->query('SELECT * FROM `test`');
    while ($myDB->fetchArray()) {
        print($myDB->recordArray[test]);
    }
?>