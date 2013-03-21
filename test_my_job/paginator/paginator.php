<?php
    // * $records - всего записей
    // * $r_start - текуща€ страница
    // * $URL - адрес, заканчивающийс€ на "="
    // * $inpage - записей на страницу 
function LeftRight($records,$r_start,$URL,$inpage) {
    $str="";

    if ($records<=$inpage) return;
    if ($r_start!=0) {
        $str.="<a href=".$URL."0>&lt;&lt</a> ";
        $str.="<a href=$URL".($r_start-1).">&lt;</a> ";
        }
    else $str.="&lt;&lt &lt; ";

if ($records%$inpage==0) $add=0; else $add=1;
$ggg=(intval($records/$inpage)+$add);

if ($r_start<5) {$sstart=0;$send=10;}
if ($r_start>=5) {$sstart=$r_start-5;$send=$r_start+5;}
if ($r_start>($ggg-5)) {$sstart=$ggg-10;$send=$ggg;}

    if ($send*$inpage>$records) $send=$records/$inpage;
    if ($sstart<0) $sstart=0;

    if ($records%$inpage==0) $add=0; else $add=1;

    for ($i=$sstart;$i<$send;$i++) {
        if ($i==$r_start) $str.=" <B>".($i+1)."/".(intval($records/$inpage)+$add)."</B> | ";
        else $str.="<a href=$URL".($i)."><U><B>".($i+1)."</B></U></a> |  ";
        }

    if ($r_start+(1-$add)<intval($records/$inpage)) {
        $str.=" <a href=$URL".($r_start+1).">&gt;</a>";
        $str.=" <a href=$URL".(intval($records/$inpage)-(1-$add)).">&gt;&gt;</a>";
        }
    else $str.=" &gt; &gt;&gt";
    return($str);
    }

// ѕример вызова

print "<center>".LeftRight(567,2,"paginator.php?start=",20)."</center>";
//print "<center>".LeftRight(567,2,"index.htm?start=",20)."</center>";

?>
