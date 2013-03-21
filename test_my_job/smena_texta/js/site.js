// Кнопки сверху на главной
function v_knop_1() { document.getElementById('f_knop_1').style.color = '#ba1422'; }
function h_knop_1() { document.getElementById('f_knop_1').style.color = ''; }
function v_knop_2() { document.getElementById('f_knop_2').style.color = '#ba1422'; }
function h_knop_2() { document.getElementById('f_knop_2').style.color = ''; }

// Таблицы цен
function viewTable (n) {
 document.getElementById('more_'+n).style.display = 'none';
 document.getElementById('full_'+n).style.display = 'inline'; }
function hideTable (n) {
 document.getElementById('full_'+n).style.display = 'none';
 document.getElementById('more_'+n).style.display = 'inline'; }

// Анимация Контактов и Спецпредложений
var time = 20;
$(document).ready(function() { Timeout(); } );
function Timeout() {
	if (16 == time) { cont_t(); setTimeout("cont2_t()", 500); }
	if (12 == time) { super_t(); setTimeout("super2_t()", 500); }
	if (8 == time) { cont2_t(); setTimeout("cont_t()", 500); }
	if (4 == time) { super2_t(); setTimeout("super_t()", 500); time = 20; setTimeout("Timeout()", 0); }
	else { time -= 1; setTimeout("Timeout()", 1000); }
}
function super_t() { $("#super").toggle("slow"); }
function super2_t() { $("#super2").toggle("slow"); }
function cont_t() { $("#cont").slideToggle("slow"); }
function cont2_t() { $("#cont2").slideToggle("slow"); }

// Запуск анимации в разделе номера
function foto_kamen () {
$(document).ready(function() {  Timeout2(); setTimeout("Timeout3()", 1000);  setTimeout("Timeout4()", 500);  setTimeout("Timeout5()", 1500); } );
}
function foto_lomon () {
$(document).ready(function() {  Timeout6(); setTimeout("Timeout7()", 1000);  setTimeout("Timeout8()", 500);  setTimeout("Timeout9()", 1500);} );
}

// Анимация Фотографий в разделе номера - Стандартный номер на Каменноостровском
var time2 = 9;
function Timeout2() {
	if (6 == time2) { foto_ks1(); setTimeout("foto_ks4()", 900); }
	if (3 == time2) { foto_ks3(); setTimeout("foto_ks2()", 900); time2 = 9; setTimeout("Timeout2()", 0);  }
	else { time2 -= 1; setTimeout("Timeout2()", 2000); }
}
function foto_ks1() { $("#foto_acom_ks1").fadeOut(800);  }
function foto_ks2() { $("#foto_acom_ks1").fadeIn(800);  }
function foto_ks3() { $("#foto_acom_ks2").fadeOut(800);  }
function foto_ks4() { $("#foto_acom_ks2").fadeIn(800);  }

// Анимация Фотографий в разделе номера - Классический номер на Каменноостровском
var time3 = 12;
function Timeout3() {
	if (9 == time3) { foto_kc1(); setTimeout("foto_kc4()", 900); }
	if (6 == time3) { foto_kc3(); setTimeout("foto_kc6()", 900); }
	if (3 == time3) { foto_kc5(); setTimeout("foto_kc2()", 900); time3 = 12; setTimeout("Timeout3()", 0);  }
	else { time3 -= 1; setTimeout("Timeout3()", 2000); }
}
function foto_kc1() { $("#foto_acom_kc1").fadeOut(800);  }
function foto_kc2() { $("#foto_acom_kc1").fadeIn(800);  }
function foto_kc3() { $("#foto_acom_kc2").fadeOut(800);  }
function foto_kc4() { $("#foto_acom_kc2").fadeIn(800);  }
function foto_kc5() { $("#foto_acom_kc3").fadeOut(800);  }
function foto_kc6() { $("#foto_acom_kc3").fadeIn(800);  }

// Анимация Фотографий в разделе номера - Улучшенный номер на Каменноостровском
var time4 = 9;
function Timeout4() {
	if (6 == time4) { foto_ksu1(); setTimeout("foto_ksu4()", 900); }
	if (3 == time4) { foto_ksu3(); setTimeout("foto_ksu2()", 900); time4 = 9; setTimeout("Timeout4()", 0);  }
	else { time4 -= 1; setTimeout("Timeout4()", 2000); }
}
function foto_ksu1() { $("#foto_acom_ksu1").fadeOut(800);  }
function foto_ksu2() { $("#foto_acom_ksu1").fadeIn(800);  }
function foto_ksu3() { $("#foto_acom_ksu2").fadeOut(800);  }
function foto_ksu4() { $("#foto_acom_ksu2").fadeIn(800);  }

// Анимация Фотографий в разделе номера - Делюкс номер на Каменноостровском
var time5 = 15;
function Timeout5() {
	if (12 == time5) { foto_kd1(); setTimeout("foto_kd4()", 900); }
	if (9 == time5) { foto_kd3(); setTimeout("foto_kd6()", 900); }
	if (6 == time5) { foto_kd5(); setTimeout("foto_kd8()", 900); }
	if (3 == time5) { foto_kd7(); setTimeout("foto_kd2()", 900); time5 = 15; setTimeout("Timeout5()", 0);  }
	else { time5 -= 1; setTimeout("Timeout5()", 2000); }
}
function foto_kd1() { $("#foto_acom_kd1").fadeOut(800);  }
function foto_kd2() { $("#foto_acom_kd1").fadeIn(800);  }
function foto_kd3() { $("#foto_acom_kd2").fadeOut(800);  }
function foto_kd4() { $("#foto_acom_kd2").fadeIn(800);  }
function foto_kd5() { $("#foto_acom_kd3").fadeOut(800);  }
function foto_kd6() { $("#foto_acom_kd3").fadeIn(800);  }
function foto_kd7() { $("#foto_acom_kd4").fadeOut(800);  }
function foto_kd8() { $("#foto_acom_kd4").fadeIn(800);  }

// Анимация Фотографий в разделе номера - Стандартный номер на Ломоносова
var time6 = 9;
function Timeout6() {
	if (6 == time6) { foto_ls1(); setTimeout("foto_ls4()", 900); }
	if (3 == time6) { foto_ls3(); setTimeout("foto_ls2()", 900); time6 = 9; setTimeout("Timeout6()", 0);  }
	else { time6 -= 1; setTimeout("Timeout6()", 2000); }
}
function foto_ls1() { $("#foto_acom_ls1").fadeOut(800);  }
function foto_ls2() { $("#foto_acom_ls1").fadeIn(800);  }
function foto_ls3() { $("#foto_acom_ls2").fadeOut(800);  }
function foto_ls4() { $("#foto_acom_ls2").fadeIn(800);  }

// Анимация Фотографий в разделе номера - Класический номер на Ломоносова
var time7 = 9;
function Timeout7() {
	if (6 == time7) { foto_lc1(); setTimeout("foto_lc4()", 900); }
	if (3 == time7) { foto_lc3(); setTimeout("foto_lc2()", 900); time7 = 9; setTimeout("Timeout7()", 0);  }
	else { time7 -= 1; setTimeout("Timeout7()", 2000); }
}
function foto_lc1() { $("#foto_acom_lc1").fadeOut(800);  }
function foto_lc2() { $("#foto_acom_lc1").fadeIn(800);  }
function foto_lc3() { $("#foto_acom_lc2").fadeOut(800);  }
function foto_lc4() { $("#foto_acom_lc2").fadeIn(800);  }

// Анимация Фотографий в разделе номера - Улучшенный номер на Ломоносова
var time8 = 12;
function Timeout8() {
	if (9 == time8) { foto_lsu1(); setTimeout("foto_lsu4()", 900); }
	if (6 == time8) { foto_lsu3(); setTimeout("foto_lsu6()", 900); }
	if (3 == time8) { foto_lsu5(); setTimeout("foto_lsu2()", 900); time8 = 12; setTimeout("Timeout8()", 0);  }
	else { time8 -= 1; setTimeout("Timeout8()", 2000); }
}
function foto_lsu1() { $("#foto_acom_lsu1").fadeOut(800);  }
function foto_lsu2() { $("#foto_acom_lsu1").fadeIn(800);  }
function foto_lsu3() { $("#foto_acom_lsu2").fadeOut(800);  }
function foto_lsu4() { $("#foto_acom_lsu2").fadeIn(800);  }
function foto_lsu5() { $("#foto_acom_lsu3").fadeOut(800);  }
function foto_lsu6() { $("#foto_acom_lsu3").fadeIn(800);  }

// Анимация Фотографий в разделе номера - Делюкс номер на Ломоносова
var time9 = 12;
function Timeout9() {
	if (9 == time9) { foto_ld1(); setTimeout("foto_ld4()", 900); }
	if (6 == time9) { foto_ld3(); setTimeout("foto_ld6()", 900); }
	if (3 == time9) { foto_ld5(); setTimeout("foto_ld2()", 900); time9 = 12; setTimeout("Timeout9()", 0);  }
	else { time9 -= 1; setTimeout("Timeout9()", 2000); }
}
function foto_ld1() { $("#foto_acom_ld1").fadeOut(800);  }
function foto_ld2() { $("#foto_acom_ld1").fadeIn(800);  }
function foto_ld3() { $("#foto_acom_ld2").fadeOut(800);  }
function foto_ld4() { $("#foto_acom_ld2").fadeIn(800);  }
function foto_ld5() { $("#foto_acom_ld3").fadeOut(800);  }
function foto_ld6() { $("#foto_acom_ld3").fadeIn(800);  }