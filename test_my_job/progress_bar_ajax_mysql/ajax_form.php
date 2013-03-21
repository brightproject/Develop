<?php
function ajaxForm(formID, resID){
$(formID).addEvent('submit', function(e) {
new Event(e).stop();          // блокируем сабмит
var log = $(resID);
log.empty();                  // очищаем слой для вывода результата
log.addClass('ajax-loading'); // присваиваем слою класс (вывод индикатора загрузки)
this.send({                   // отсылаем данные
update: resID,                // обновляем слой вывода результата
onComplete: function() {
log.removeClass('ajax-loading'); // удаляем индикатор загрузки
}
});
});
return false;
};
?>