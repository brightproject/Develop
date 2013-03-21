    <?
    /* Классы поддержки навигации в данных ( navigation_classes.php ) */

    /*
    * Класс постраничного вывода информации.
    * Конструктору передается информация для вывода.
    * @author : Barinov Roman
    * @version : no
    * @date created : 16.08.2007
    * @date modifyed : no
    */
    class page_navigation_printer {
    var $navig_len;
    var $url;
    /* конструктор класса */
    function page_navigation_printer ($in_navig,$selfurl) {
    $this->navig_len = $in_navig;
    $this->url = $selfurl;
    }
    /* печатаем единичную ссылку на страницу */
    function print_navigation_link ($page_number) {
    $a = $page_number+1;
    echo "<td><a href='".$this->url."?page=$page_number'>".$a."</a></td>";
    }
    /* печатаем навигационную полосу */
    function make_nagivation_panel () {
    echo "<table><tr>";
    for ($i=0;$i<$this->navig_len;$i++) {
    $this->print_navigation_link($i);
    }
    echo "</tr></table>";
    }
    }

    /*
    * Класс поддержки навигации информации по страницам.
    * Конструктору передается информация , он разбивает ее по страницам.
    * @author : Barinov Roman
    * @version : no
    * @date created : 16.08.2007
    * @date modifyed : no
    */
    class page_navigation_maker {
    var $in_array;
    var $page_len;
    var $page_counter;
    var $array_len;
    var $current_page_len;
    var $current_page_number;

    /* Конструктор класса */
    function page_navigation_maker ( $data_income, $step ) {
    $this->in_array = $data_income;
    $this->page_len = $step;
    $this->array_len = count($this->in_array);
    $this->page_counter = ceil($this->array_len / $this->page_len) ;
    }

    /* Получаем страницу длиной в $this->data_step , под номером $page_number */
    function get_page ( $page_number ) {
    $start_position = ($this->page_len * $page_number);
    $arr = array();
    for ($i=0;$i < $this->page_len;$i++) {
    if (isset($this->in_array[$i + $start_position])) $arr[] = $this->in_array[$i + $start_position];
    }
    $this->current_page_len = count($arr);
    $this->current_page_number = $page_number;
    return $arr;
    }

    /* Получаем количество страниц в списке */
    function get_pages_count() {
    return $this->page_counter;
    }

    /* Получаем количество Элементов списка */
    function get_all_count() {
    return $this->array_len;
    }

    /* Получаем количество элементов текущего листа */
    function get_current_length() {
    return $this->current_page_len;
    }

    function get_start_page_index() {
    return ($this->current_page_number) * $this->page_len;
    }
    }
?>