function move_layer(obj) {
	obj = document.getElementById(obj);
	if (obj.state == 'open') obj.state = 'opening';
	if (obj.state == 'closed') obj.state = 'closing';

	left = Number(obj.style.left.replace(/px/, ''));

	if (obj.state == 'opening') {
		if (left > 90 - 839) {
			delta = parseInt((839 - 90 + left) / 10 + 1);
			obj.style.left = (left - delta) + "px";
		} else {
			clearInterval(obj.intID);
			obj.style.left = '-749px';
			obj.state = 'closed';
		}
	} else
	if (obj.state == 'closing') {
		if (left < 0) {
			delta = parseInt(-left / 10 + 1);
			obj.style.left = (left + delta) + "px";
		} else {
			clearInterval(obj.intID);
			obj.style.left = '0px';
			obj.state = 'open';
		}
	}

}

function manage_layers(obj) {
	if (((obj == nintex) || (obj == portals)) && (obj.state == 'open')) {
		if (workflow.state == 'open') workflow.intID = setInterval("move_layer('" + workflow.id + "')", 20);
		if ((obj == nintex) && (portals.state == 'open')) portals.intID = setInterval("move_layer('" + portals.id + "')", 20);
	} else
	if (((obj == workflow) || (obj == portals)) && (obj.state == 'closed')) {
		if (portals.state == 'closed') portals.intID = setInterval("move_layer('" + portals.id + "')", 20);
		if (obj == workflow) workflow.intID = setInterval("move_layer('" + workflow.id + "')", 20);
	}
}

function getElementPosition(elem) {
	var w = elem.offsetWidth;
	var h = elem.offsetHeight;
	var l = 0;
	var t = 0;
	while (elem) {
		l += elem.offsetLeft;
		t += elem.offsetTop;
		elem = elem.offsetParent;
	}
	return {"left": l, "top": t, "width": w, "height": h};
}

function show_submenu(obj) {
	submenu = obj.id.substr(0, 3) == 'sub' ? obj : document.getElementById('sub' + obj.id);
	if (submenu) {
		if (submenu.style.display == 'block') {
			clearTimeout(submenu.hide_timer);
		} else {
			menu = getElementPosition(obj);
			submenu.style.left = menu.left;
			submenu.style.top = menu.top + menu.height + 'px';
			submenu.style.display = 'block';
			submenu.hide_timer = 0;
		}
	}
}

function hide_submenu_timer(objid) {
	obj = document.getElementById(objid);
	obj.style.display = 'none';
}

function hide_submenu(obj) {
	submenu = obj.id.substr(0, 3) == 'sub' ? obj : document.getElementById('sub' + obj.id);
	if (submenu) {
		submenu.hide_timer = setTimeout("hide_submenu_timer('" + submenu.id + "')", 10);
	}
}
