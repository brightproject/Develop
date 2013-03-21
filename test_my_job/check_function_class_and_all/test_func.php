<?

// Тестовый пример

// $TEXT - html-код страницы
// $PHP_SELF - $_SERVER["PHP_SELF"]
// $PERIOD_TO, $PERIOD_FROM - отрезок дат в формате unixtime

function choose_period($field_name='')
{
    global $TEXT, $PHP_SELF, $PERIOD_TO, $PERIOD_FROM;

    if (!isset($PERIOD_TO)) $PERIOD_TO=date("d.m.Y",time());
    if ($PERIOD_TO) {ereg("(.+)\.(.+)\.(.+)",$PERIOD_TO,$r); $PERIOD_TO=mktime(23,59,59,$r[2],$r[1],$r[3]);}
    
    if (!isset($PERIOD_FROM)) $PERIOD_FROM=date("d.m.Y", strtotime("-1 month +1day", $PERIOD_TO));
    if ($PERIOD_FROM) {ereg("(.+)\.(.+)\.(.+)",$PERIOD_FROM,$r); $PERIOD_FROM=mktime(0,0,0,$r[2],$r[1],$r[3]);}
    
    $TEXT.="<form action='$PHP_SELF'>".$GLOBALS['FORM']." &nbsp; &nbsp;
    c <input type=text name=PERIOD_FROM value='".($PERIOD_FROM?date("d.m.Y",$PERIOD_FROM):"")."' size=12 title='".date("d.m.Y H:i:s",$PERIOD_FROM)."'>
    по <input type=text name=PERIOD_TO value='".($PERIOD_TO?date("d.m.Y",$PERIOD_TO):"")."' size=12 title='".date("d.m.Y H:i:s",$PERIOD_TO)."'>
    <input class=b type=submit value='&gt;&gt;&gt;'></form>";
    
    if ($field_name)
    {
        if ($PERIOD_TO) $WHERE.=" and $field_name<=$PERIOD_TO ";
        if ($PERIOD_FROM) $WHERE.=" and $field_name>=$PERIOD_FROM ";
    }
    return eregi_replace("^ and "," where ",$WHERE);
}

?> 