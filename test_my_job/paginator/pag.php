<?php
	
	// ������ �������������

include_once ('navigation_classes.php');

$a = array(5,6,324,2,4,6,7,8,3,6,34,42,764,132,47,7645,14,65,76,13,54,13,654,3);
echo "������� �����: ";
$i = 0;
while ($i < count($a)) {
echo $a[$i]." ";
$i++;
}
echo "<br>";
echo "������������ �����. ���-�� ������� : ";
$navig_maker = new page_navigation_maker($a,7);
$page_counter = $navig_maker->get_pages_count();
echo $page_counter;
$navig_panel = new page_navigation_printer($page_counter,$_SERVER['PHP_SELF']);
$navig_panel->make_nagivation_panel();
echo "<br>";
if (isset($_GET['page'])) {
echo "<table border=1><tr><td>����� ������</td><td>��������</td></tr>";
$page_array = $navig_maker->get_page($_GET['page']);
$i = 0;
$pp = $navig_maker->get_start_page_index();
while ($i < $navig_maker->get_current_length()) {
$pp++;
echo "<tr><td>".$pp."</td><td>".$page_array[$i]."</td></tr>";
$i++;
}
echo "</table>";
}
$navig_panel->make_nagivation_panel();	
    ?>
