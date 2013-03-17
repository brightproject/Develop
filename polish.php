<?php
$expr = '3 4 5 * + 7 + 4 6 - /';
 
echo calc($expr);
 
function calc($str)
{
        $stack = array();
 
        $token = strtok($str, ' ');
 
        while ($token !== false)
        {
                if (in_array($token, array('*', '/', '+', '-')))
                {
                        if (count($stack) < 2)
                                throw new Exception("Недостаточно данных в стеке для операции '$token'");
                        $b = array_pop($stack);
                        $a = array_pop($stack);
                        switch ($token)
                        {
                                case '*': $res = $a*$b; break;
                                case '/': $res = $a/$b; break;
                                case '+': $res = $a+$b; break;
                                case '-': $res = $a-$b; break;
                        }
                        array_push($stack, $res);
                } elseif (is_numeric($token))
                {
                                array_push($stack, $token);
                } else
                {
                        throw new Exception("Недопустимый символ в выражении: $token");
                }
 
                $token = strtok(' ');
        }
        if (count($stack) > 1)
                throw new Exception("Количество операторов не соответствует количеству операндов");
        return array_pop($stack);
}
?>