function fixInputSizes() {
 	var iT = document.getElementsByTagName('input');
	for(i=0; i<iT.length;i++){
		if(iT[i].className == 'text'){
			iT[i].style.width = iT[i].value.length*6+38+'px'; 
		}
	}
 }
function checkLength(o) { 
		o.style.width = o.value.length*6+38+'px'; 
}
function changeClass(id, action) {
       if (action=="hide") {
            $(id).className = "text";
            save(id);
       } else {
       	
       	    $('status').innerHTML ='';
            $(id).className = "input";
			$(id).readOnly = false;
       }
}

function SelectProduct()
	{
		var product_ID = $F('products');
		var url = 'include/brains.php';
		var pars = 'pID=' + product_ID;
		//alert("call made");
		
var myAjax = new Ajax.Request( url, { method: 'get', parameters: pars, onComplete: showResponse });

	}
	
	function cue_edit(id)
	{
		var product_ID = id;
		alert(id);
		//var y = $F('lstYears');
		var url = 'include/brains.php';
		var pars = 'pID=' + product_ID; // + '&year=' + y;
		alert("call made");
		
		var myAjax = new Ajax.Request( url, { method: 'get', parameters: pars, onComplete: showResponse });

	}
	
	

	function showResponse(originalRequest)
	{
		//put returned XML in the textarea
		//$('result').value = originalRequest.responseText;
		var rXML = originalRequest.responseXML;
		
		var pIDs = rXML.getElementsByTagName('pID').item(0);
		var pID = pIDs.firstChild.data;
		var values = rXML.getElementsByTagName('value').item(0);
		var value = values.firstChild.data;
		
		var pidField = '<input type = "hidden" id="pID" value="'+pID+'"></input>';
		var textField = '<input type = "text" id="name" size="30" value="'+value+'"></input">';
		var save = '<br><a href="javascript:save(ddiv);">Save</a>';
		
		//alert(pID);
		//alert(value);
		
	    //pID = rXML.GetElementById("pID");
		$(pID).innerHTML = pidField+textField+save;
		//alert(originalRequest.responseText);
	}

	function save(id){

	var new_content	=  $F(id);
	var success	= function(t){ 
		//alert('update succeeded'); 
		$('ddiv').innerHTML = t.responseText + 'supposed to be here'; 
	}
	var failure	= function(t){ alert('update failed'); }
	//this is setup for localhost. make sure and change this for your installation. 
	//note:  if you put http://www.domainname.com and call the page http://domainname.com
	//this will not work
  	var url = 'include/brains.php';
	var pars = 'edit=go&content='+new_content+'&product_id='+id;

	//$('ddiv').innerHTML = 'updating....';
	//alert(url);
	var myAjax = new Ajax.Request(
			url, 
			{
				method: 'get', 
				parameters: pars, 
				onComplete: update_page
			}	);
	}
	
	function update_page(originalRequest) {
	
	var rXML = originalRequest.responseXML;
	var pIDs = rXML.getElementsByTagName('pID').item(0);
	var pID = pIDs.firstChild.data;
	//alert('i have ' + pID + ' to update');
	var values = rXML.getElementsByTagName('value').item(0);
	var value = values.firstChild.data;
	//alert('i have ' + value + 'as a return value');
	
	$(pID).innerHTML = value;	
	$('status').innerHTML = 'update complete';
		
	}

	function select() { 
		
		$('select').innerHTML = 'load menu';
		
	}
	