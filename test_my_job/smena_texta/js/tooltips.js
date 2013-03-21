// отключение вывода сообщений об ошибках
window.onerror = null;

var tooltip_attr_name = "tooltip"; // наименование создаваемого tooltip'ого атрибута
var tooltip_blank_text = "(откроется в новом окне)"; // текст для ссылок с target="_blank"
var tooltip_newline_entity = "  "; // укажите пустую строку (""), если не хотите использовать в tooltip'ах многострочность; ежели хотите, то укажите тот символ или символы, которые будут заменяться на перевод строки

// функция вызывается при загрузке страницы
window.onload = function(e){
  // если браузер поддерживает DOM и создание элементов, то мы запускаем механизм создания tooltip'а
  if (document.createElement) tooltip.d();
}

// объект tooltip
tooltip = {
  // создание слоя, в котором будет находится текст подсказки (точнее, TextNode, содержащий текст)
  t: document.createElement("DIV"),

  // таймер
  c: null,

  // флаг, указывающий показана ли сейчас на экране подсказка
  g: false,

  // обработчик события onMouseMove
  m: function(e){
    // если подсказка была вызвана на экран
    if (tooltip.g){
      // важно! определяем канву, учитывая режим совместимости в IE 6
      oCanvas = document.getElementsByTagName(
      (document.compatMode && document.compatMode == "CSS1Compat") ? "HTML" : "BODY"
      )[0];
      // x-координата, где произошёл вызов подсказки
      x = window.event ? event.clientX + oCanvas.scrollLeft : e.pageX;
      // y-координата, где произошёл вызов подсказки
      y = window.event ? event.clientY + oCanvas.scrollTop : e.pageY;
      // вывод подсказки на экран (задание координат)
      tooltip.a(x, y);
    }
  },

  d: function(){
    // установка атрибута id со значением tooltip (который описан у нас в CSS)
    tooltip.t.setAttribute("id", "tooltip");
    // добавление к элементу body дочернего объекта tooltip
    document.body.appendChild(tooltip.t);
    /* далее мы считываем в массив все элементы, затем у тех,
    которые имеют HTML атрибуты title и alt задаём
    новый атрибут tooltip_attr_name (текст подсказки);
    мы также задаём обработчики событий onMouseOver и onMouseOut */
    a = (document.all) ? document.all : document.getElementsByTagName("*");
    aLength = a.length;
    for (var i = 0; i < aLength; i++){
      // bugfix! иначе Opera 7 + <embed> + tooltip = глюк (указал Bash)
      if (!a[i]) continue;
      tooltip_title = a[i].getAttribute("alt");
	  //tooltip_title = a[i].getAttribute("title");
      tooltip_alt = a[i].getAttribute("alt");
      tooltip_blank = a[i].getAttribute("target") && a[i].getAttribute("target") == "_blank" && tooltip_blank_text;
      if (tooltip_title || tooltip_blank){
        a[i].setAttribute(tooltip_attr_name, tooltip_blank ? (tooltip_title ? tooltip_title + " " + tooltip_blank_text : tooltip_blank_text) : tooltip_title);
        if (a[i].getAttribute(tooltip_attr_name)){
          a[i].removeAttribute("title");
          if (tooltip_alt && a[i].complete) a[i].removeAttribute("alt");
          tooltip.l(a[i], "mouseover", tooltip.s);
          tooltip.l(a[i], "mouseout", tooltip.h);
        }
      }else if (tooltip_alt && a[i].complete){
        a[i].setAttribute(tooltip_attr_name, tooltip_alt);
        if (a[i].getAttribute(tooltip_attr_name)){
          a[i].removeAttribute("alt");
          tooltip.l(a[i], "mouseover", tooltip.s);
          tooltip.l(a[i], "mouseout", tooltip.h);
        }
      }
      if (!a[i].getAttribute(tooltip_attr_name) && tooltip_blank){
        //
      }
    }
    // задаём для документа обработчик события onMouseMove
    document.onmousemove = tooltip.m;
    // прячем подсказку при скроллинге
    window.onscroll = tooltip.h;
    // bugfix! при появлении первого тултипа дергается вертикальный скролбар (указал spamcollector)
    tooltip.a(-99, -99);
  },

  // подготавливаем подсказку для вывода на экран
  s: function(e){
    // получаем объект, у которого будет показана подсказка
    d = (window.event) ? window.event.srcElement : e.currentTarget;
    // нелишняя проверка на наличее свойства tooltip_attr_name
    if (!d.getAttribute(tooltip_attr_name)) return;
    s = d.getAttribute(tooltip_attr_name);
    // если используются в tooltip'ах переводы строк
    if (tooltip_newline_entity){
      s = s.replace(/\&/g,"&amp;");
      s = s.replace(/\</g,"&lt;");
      s = s.replace(/\>/g,"&gt;");
      s = s.replace(/  /g, "<br />");
      tooltip.t.innerHTML = s;
    }else{
      // удаляем у слоя с подсказкой первый дочерний объект (TextNode с текстом), если он вдуг не удалился раньше
      if (tooltip.t.firstChild) tooltip.t.removeChild(tooltip.t.firstChild);
      /* добавляем к элементу t (слой) новый TextNode, содержащий текст,
      взятый из свойства tooltip_attr_name активного объекта */
      tooltip.t.appendChild(document.createTextNode(s));
    }
    // показываем подсказку с задержкой в 0,1 секунды
    tooltip.c = setTimeout("tooltip.t.style.visibility = 'visible';", 100);
    // устанавливаем флаг, сигнализирующий о том, что подсказка у нас на экране
    tooltip.g = true;
  },

  // удаляем подсказку с экрана
  h: function(e){
    // прячем подсказку
    tooltip.t.style.visibility = "hidden";
    // удаляем у слоя с подсказкой первый дочерний объект (TextNode с текстом)
    if (!tooltip_newline_entity && tooltip.t.firstChild) tooltip.t.removeChild(tooltip.t.firstChild);
    // убираем задержку
    clearTimeout(tooltip.c);
    // устанавливаем флаг
    tooltip.g = false;
    // с глаз долой…
    tooltip.a(-99, -99);
  },

  // делаем так, чтобы элементы с title и alt нужным образом реагировали на события onMouseOver и onMouseOut
  l: function(o, e, a){
    if (o.addEventListener) o.addEventListener(e, a, false); // было true (не работает в Opera 7)
    else if (o.attachEvent) o.attachEvent("on" + e, a);
      else return null;
  },

  // устанавливаем координаты всплывающей подсказки
  a: function(x, y){
    // важно! определяем канву, учитывая режим совместимости в IE 6
    oCanvas = document.getElementsByTagName(
    (document.compatMode && document.compatMode == "CSS1Compat") ? "HTML" : "BODY"
    )[0];

    w_width = window.innerWidth ? window.innerWidth + window.pageXOffset : oCanvas.clientWidth + oCanvas.scrollLeft;
    w_height = window.innerHeight ? window.innerHeight + window.pageYOffset : oCanvas.clientHeight + oCanvas.scrollTop;
    t_width = window.event ? tooltip.t.clientWidth : tooltip.t.offsetWidth;
    t_height = window.event ? tooltip.t.clientHeight : tooltip.t.offsetHeight;

    t_extra_width = 7; // padding + borderWidth;
    t_extra_height = 5; // padding + borderWidth;

    // x-координата
    tooltip.t.style.left = x + 8 + "px";
    // y-координата
    tooltip.t.style.top = y + 8 + "px";

    // bugfix! делаем так, чтобы подсказка не вылазила за границы окна
    while (x + t_width + t_extra_width > w_width){
      --x;
      tooltip.t.style.left = x + "px";
      t_width = window.event ? tooltip.t.clientWidth : tooltip.t.offsetWidth;
    }

    while (y + t_height + t_extra_height > w_height){
      --y;
      tooltip.t.style.top = y + "px";
      t_height = window.event ? tooltip.t.clientHeight : tooltip.t.offsetHeight;
    }
  }
}

