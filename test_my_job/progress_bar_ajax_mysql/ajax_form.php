<?php
function ajaxForm(formID, resID){
$(formID).addEvent('submit', function(e) {
new Event(e).stop();          // ��������� ������
var log = $(resID);
log.empty();                  // ������� ���� ��� ������ ����������
log.addClass('ajax-loading'); // ����������� ���� ����� (����� ���������� ��������)
this.send({                   // �������� ������
update: resID,                // ��������� ���� ������ ����������
onComplete: function() {
log.removeClass('ajax-loading'); // ������� ��������� ��������
}
});
});
return false;
};
?>