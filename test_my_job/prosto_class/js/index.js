var oLogo, oCircle;

window.onload = function(){
	if(document.getElementById){
		oLogo = document.getElementById('logo');
		if(oLogo){
			oCircle = new Circle(oLogo);
			window.setInterval(onStep, 20);
			var aHrefs = oLogo.getElementsByTagName('a'), oHref;
			for(var i = 0, _i = aHrefs.length; i < _i; i++){ oHref = aHrefs[i];
				oHref.onmouseover = onOver;
				oHref.onmouseout = onOut;
			}			
		}
	}
}

function onStep(){ oCircle.doHighlight(); }
function onOver(){ oCircle.nTill = oCircle.nMax; }
function onOut(){ oCircle.nTill = 0; }

function Circle(oContainer){
	oContainer.oCircle = this;
	this.oCircle = addDiv(oContainer, 'circleTr');
	this.aPoints = this.addPoints(oContainer, 4),

	this.aRadiuses = [];
	for(var i = 0, _i = this.nMax; i <= _i; i++){
		this.aRadiuses.push((1 - cos(i * 180 / _i)) * 0.5);
	}
	this.doHighlight();
}
Circle.prototype = {
	nStep:1,
	nTill:0,
	nMax:10,
	addPoints:function(oContainer, nCount){
		var aReturn = [], oPoint, i;
		for(i = 0; i < nCount; i++){
			oPoint = addDiv(oContainer, 'point');
			oPoint.nAngle = Math.random() * 360;
			oPoint.nSpeed = (5 + Math.random() * 20) * (Math.random() < 0.5 ? 1 : -1);
			oPoint.nOrbit = 5 + Math.random() * 20;
			aReturn.push(oPoint);
		}
		return aReturn;
	},
	doHighlight:function(){
		var i, _i = this.aPoints.length, r, _r;
		var oPoint;
		if(this.nStep != this.nTill){
			this.nStep > this.nTill ? this.nStep-- : this.nStep++
			setOpacity(this.oCircle, this.aRadiuses[this.nStep]);
		}
		_r = this.aRadiuses[this.nStep] * 5;
		for(i = 0; i < _i; i++){ oPoint = this.aPoints[i];
			oPoint.nAngle += oPoint.nSpeed;
			r = 55.5 + _r * oPoint.nOrbit;
			oPoint.style.top = Math.round(60.5 + r * sin(oPoint.nAngle)) + 'px';
			oPoint.style.left = Math.round(60.5 + r * cos(oPoint.nAngle)) + 'px';
		}
	}
}

function addDiv(oParent, sClass){
	var oDiv = document.createElement('div');
	oDiv.className = sClass;
	oParent.appendChild(oDiv);
	return oDiv;	
}

function setOpacity(oObj, fOp){
	if(oObj.fOp != fOp){
		if(oObj.filters){
			if(oObj.filters.length == 1){
				oObj.filters[0].Opacity = fOp * 100;
			} else {
				oObj.style.filter = 'alpha(opacity=' + (fOp * 100) + ')';
			}
		} else {
			oObj.style.opacity = fOp;
			oObj.style.MozOpacity = fOp;
		}
		oObj.fOp = fOp;
	}
}

var aSin = [], aCos = [];
function prepareSinCos(){
	var i = 0, _i = 360, a;
	for(i = 0; i < _i; i++){
		a = i * 2 * Math.PI / _i;
		aSin.push(Math.sin(a));
		aCos.push(Math.cos(a));
	}
}
function normalizeAngle(nA){
	while(nA < 0){ nA += 360; }
	return Math.floor(nA) % 360;
}
function sin(nA){
	return aSin[normalizeAngle(nA)];
}
function cos(nA){
	return aCos[normalizeAngle(nA)];
}
prepareSinCos();
