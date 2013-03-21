var a=0;
var b=0;
var all_price=0;
var f_flag="left";
var f_count=0;
var taimer=0;
var f_left=0;



function Left(prefix,idDiv,minus){
var p=prefix;
if(document.getElementById("tuda"+prefix).style.visibility!="hidden"){
if(flag[p]==true){
//alert(parseInt(scroll_p[prefix])+4);
//alert(portfolio_count[prefix]);
if(parseInt(scroll_p[prefix])+4>=portfolio_count[prefix])
{
flag[p]=false;
JsHttpRequest.query(
       'portfolio_load.php',
       {'portfolio':portfolio_count[prefix],
        'prefix':prefix,
        'position':scroll_p[prefix]},
       function(result, errors){
       if(result['re']!=0){
       scroll_p[prefix]=result["scroll_p"];
       portfolio_count[prefix]=parseInt(result["re"]);
       document.getElementById(idDiv).innerHTML=document.getElementById(idDiv).innerHTML+result["html"];
       clearInterval(r[prefix]);
       l[prefix]=setInterval('Left_go('+idDiv+','+prefix+','+minus+')',1);
       position[prefix]=0;
        } else
        {
        scroll_p[prefix]=result["scroll_p"];
        if(first_element[prefix]<portfolio_count[prefix]-minus){
        clearInterval(r[prefix]);
        l[prefix]=setInterval('Left_go('+idDiv+','+prefix+','+minus+')',1);
        position[prefix]=0;
        }
        }
           },
            false  // do not disable caching
        );
}
 else
{
   var currentTime = new Date();
var seconds = currentTime.getTime();
JsHttpRequest.query(
       'portfolio_left.php',
       {'portfolio':seconds,
        'prefix':prefix,
        'position':scroll_p[prefix]},
       function(result, errors){
           //alert(result["scroll_p"]);
           scroll_p[prefix]=result["scroll_p"];
           if(first_element[prefix]<portfolio_count[prefix]-minus){
         clearInterval(r[prefix]);
         l[prefix]=setInterval('Left_go('+idDiv+','+prefix+','+minus+')',1);
         position[prefix]=0;
         }
          },
            false  // do not disable caching
        );
}

 }
}}

function Left_go(idDiv,prefix,minus){
znak=30;
if(first_element[prefix]<portfolio_count[prefix]-minus){
if(position[prefix]+30>=(250+250)){
 q=position[prefix];
 znak=Math.abs((250*2)-q);
}

for(i=1;i<=portfolio_count[prefix];i++){
document.getElementById("w"+prefix+i).style.left=parseInt(document.getElementById("w"+prefix+i).style.left)-znak;
document.getElementById("wn"+prefix+i).style.left=parseInt(document.getElementById("wn"+prefix+i).style.left)-znak;
document.getElementById("wd"+prefix+i).style.left=parseInt(document.getElementById("wd"+prefix+i).style.left)-znak;
document.getElementById("wn"+prefix+i).style.visibility="hidden";
document.getElementById("wd"+prefix+i).style.visibility="hidden";
}
position[prefix]=position[prefix]+znak;
if(position[prefix]>=(250+250)){
 clearInterval(l[prefix]);
 l[prefix]=0;
for(i=1;i<=portfolio_count[prefix];i++){
document.getElementById("wn"+prefix+i).style.visibility="visible";
document.getElementById("wd"+prefix+i).style.visibility="visible";
 }
first_element[prefix]=first_element[prefix]+minus;
if(first_element[prefix]+4<all_rec[prefix]) document.getElementById("tuda"+prefix).style.visibility="visible"; else
document.getElementById("tuda"+prefix).style.visibility="hidden";
if(first_element[prefix]>1) document.getElementById("suda"+prefix).style.visibility="visible"; else
document.getElementById("suda"+prefix).style.visibility="hidden";
flag[prefix]=true;
}
}
}

function Right(prefix,idDiv,minus){
if(document.getElementById("suda"+prefix).style.visibility!="hidden"){
if(flag[prefix]==true){
flag[prefix]=false;
//alert(scroll_p[prefix]);
var currentTime = new Date();
var seconds = currentTime.getTime();
JsHttpRequest.query(
       'portfolio_load2.php',
       {'portfolio':seconds,
        'prefix':prefix,
        'position':scroll_p[prefix]},
       function(result, errors){
           //alert(result["scroll_p"]);
           scroll_p[prefix]=result["scroll_p"];
           clearInterval(l[prefix]);
           r[prefix]=setInterval('Right_go('+idDiv+','+prefix+','+minus+')',1);
           position[prefix]=0;
           },
            false  // do not disable caching
        );
}
}
}

function Right_go(idDiv,prefix,minus){
znak=30;
if(first_element[prefix]>1){
if(position[prefix]+30>=(250+250)){
 q=position[prefix];
 znak=Math.abs((250*2)-q);
}
for(i=1;i<=portfolio_count[prefix];i++){
document.getElementById("w"+prefix+i).style.left=parseInt(document.getElementById("w"+prefix+i).style.left)+znak;
document.getElementById("wn"+prefix+i).style.left=parseInt(document.getElementById("wn"+prefix+i).style.left)+znak;
document.getElementById("wd"+prefix+i).style.left=parseInt(document.getElementById("wd"+prefix+i).style.left)+znak;
document.getElementById("wn"+prefix+i).style.visibility="hidden";
document.getElementById("wd"+prefix+i).style.visibility="hidden";
}
position[prefix]=position[prefix]+znak;
if(position[prefix]>=(250+250)){
 clearInterval(r[prefix]);
 r[prefix]=0;
for(i=1;i<=portfolio_count[prefix];i++){
document.getElementById("wn"+prefix+i).style.visibility="visible";
document.getElementById("wd"+prefix+i).style.visibility="visible";
 }
first_element[prefix]=first_element[prefix] - minus;
if(first_element[prefix]<portfolio_count[prefix]-minus) document.getElementById("tuda"+prefix).style.visibility="visible"; else
document.getElementById("tuda"+prefix).style.visibility="hidden";
if(first_element[prefix]>1) document.getElementById("suda"+prefix).style.visibility="visible"; else
document.getElementById("suda"+prefix).style.visibility="hidden";
flag[prefix]=true;
}
}
}


  function scrollTop(s)
{
  var b=a+s;
  document.getElementById('dock').scrollTop=b;
  a=b;

  if(b>=document.getElementById('dock').scrollHeight) {
  clearInterval(t);
  goBottom();
    }

}

  function scrollBottom(s)
{
  var b=a-s;
  document.getElementById('dock').scrollTop=b;
  a=b;
  if(a<=0) {
  clearInterval(t);
  goLeft();
    }

}


function goLeft()
{
t=setInterval('scrollTop(2);',50);
}

function goBottom()
{
t=setInterval('scrollBottom(2);',50);
}


function preloadImages() {
      img1=newImage("/img/smile.png");
	  img2=newImage("/img/smilet.png");
}

function newImage(path) {
      var image = new Image();
      image.src = path;
      return image;
}

function Update_smile_status(value){
JsHttpRequest.query(
		   'smile.php',
           {'value':value},
            function(result, errors){

			},
            true  // do not disable caching
        );
   }


function Smile_speak(text){
if(smile_status=="On"){
 clearInterval(b);
 document.getElementById("smile_img").src=img2.src;
 document.getElementById("smile_bazar").innerHTML=text.getAttribute("smile");
 document.getElementById("hint").style.visibility="visible";
}
}

function Smile_pizdec(){
if(smile_status=="On"){
b=setInterval('Smile_pizdecc()',500);
}
}

function Smile_pizdecc(){
 clearInterval(b);
 document.getElementById("smile_img").src=img1.src;
 document.getElementById("hint").style.visibility="hidden";
}

function Smile_init(){
if(smile_status=='On'){
  document.getElementById("smile_on").style.visibility="visible";
  document.getElementById("smile_off").style.visibility="hidden";
  document.getElementById("smile_img").src=img1.src;
}
else
{
  document.getElementById("smile_on").style.visibility="hidden";
  document.getElementById("smile_off").style.visibility="visible";
}
}

function Smile_OnOff()
{
bazar_time=0;
if(smile_status=='Off'){
  document.getElementById("smile_on").style.visibility="visible";
  document.getElementById("smile_off").style.visibility="hidden";
  document.getElementById("smile_img").src=img2.src;
  document.getElementById("smile_bazar").innerHTML="Ой! Мона уже говорить чет да?";
  smile_status="On";
  bazar_time=setInterval('Hidden_hint()',2000);
  document.getElementById("hint").style.visibility="visible";
  Update_smile_status(smile_status);
 }
else
{
  document.getElementById("smile_on").style.visibility="hidden";
  document.getElementById("smile_off").style.visibility="visible";
  smile_status="Off";
  Update_smile_status(smile_status);
  clearInterval(bazar_time);
}
}

function Hidden_hint(){
 document.getElementById("hint").style.visibility="hidden";
   document.getElementById("smile_img").src=img1.src;
 clearInterval(bazar_time);
}

function Show_div(){
document.getElementById("glass").style.visibility="visible";
}

function Next_opros(id){
var currentTime = new Date();
var seconds = currentTime.getTime();
JsHttpRequest.query(
		   'opros.php',
           {'id':id,
           'proyob':seconds},
            function(result, errors){
             if(result["re"]==true){
             document.getElementById("glass").innerHTML=result["html"];
             crir.init();
             }

            },
            false  // do not disable caching
        );
   }

function Opros_Go(id,count){
var v=0;
for(i=1;i<=count;i++)
{
if(document.getElementById("radio"+i).checked==true) v=document.getElementById("radio"+i).value;
}
if(v==0) return;
JsHttpRequest.query(
		   'opros_go.php',
           {'id':id,
            'v':v },
            function(result, errors){
             if(result["re"]==true){
             document.getElementById("glass").innerHTML=result["html"];
             }
			},
            false  // do not disable caching
        );
   }


function Show_hide_radio(show,r,num,pr){
if(num!=0) obj=document.getElementsByName(r)[num];
else
obj=r;
if(obj.checked==true){
 document.getElementById(show).style.display="block";
 for (var j=0; j<document.getElementById(show).childNodes.length; j++)
 {
   if(document.getElementById(show).childNodes[j].nodeType==1){
   element_price=parseInt(document.getElementById(show).childNodes[j].getAttribute("price"))
   element=document.getElementById(show).childNodes[j];
   if(element_price>=0) element.style.visibility="visible";
 }
 }

 } else {
 document.getElementById(show).style.display="none";
 for (var j=0; j<document.getElementById(show).childNodes.length; j++)
 {
   if(document.getElementById(show).childNodes[j].nodeType==1){
   element_price=parseInt(document.getElementById(show).childNodes[j].getAttribute("price"))
   element=document.getElementById(show).childNodes[j];
      if(element_price>=0) element.style.visibility="hidden";
   }
 }
 }
 Update_price();
}

function Show_hide_form(show,obj){
 if(obj.checked==true){
 document.getElementById(show).style.display="block";
 for (var j=0; j<document.getElementById(show).childNodes.length; j++)
 {
   if(document.getElementById(show).childNodes[j].nodeType==1){
   element_price=parseInt(document.getElementById(show).childNodes[j].getAttribute("price"))
   element=document.getElementById(show).childNodes[j];
   if(element.childNodes.length>0 && element_price>=0){
   Show_hide_radio(element.id,element,0,1);
   }
   if(element_price>=0)  element.style.visibility="visible";

 }
 }
 if(document.getElementById(show).id=="k_div") zakaz.magazine.disabled=true;
 if(document.getElementById(show).id=="m_div") zakaz.katalog.disabled=true;
 }
 else
 {
 document.getElementById(show).style.display="none";

 for (var j=0; j<document.getElementById(show).childNodes.length; j++)
 {
   if(document.getElementById(show).childNodes[j].nodeType==1){
   element_price=parseInt(document.getElementById(show).childNodes[j].getAttribute("price"))
   element=document.getElementById(show).childNodes[j];
   if(element.childNodes.length>0 && element_price>=0){
   document.getElementById(show).childNodes[j-3].checked=false;
    Show_hide_radio(element.id,element,0,1);
   }
   if(element_price>=0)  element.style.visibility="hidden";
 }
 }
  if(document.getElementById(show).id=="k_div") zakaz.magazine.disabled=false;
  if(document.getElementById(show).id=="m_div") zakaz.katalog.disabled=false;
}
 Update_price();
}

function Update_price(){
if(step==1){
 all_price=0;
 for(i=0;i<document.zakaz.length;i++){
 obj=document.zakaz.elements[i];
 if(obj.checked==true && obj.style.visibility=="visible"){
  all_price=all_price+parseInt(obj.getAttribute("price"));
 }
 }
 document.getElementById("summa").innerHTML="Цена: "+all_price+" грн.";
}
}


function act(){
if(act_mas[1]!=false  && act_mas[3]!=false && act_mas[2]!=false)
  f2.b1.disabled=false;
 else
  f2.b1.disabled=true;
}


function Check_form(obj,img,type){
 if(img=='1'){
 var reg=/.{5,30}/;
 var result=reg.test(obj.value);
 if(result==true) {
    document.getElementById(img).src=img77.src;
    document.getElementById(img).style.visibility="visible";
    act_mas[img]=true;
    Smile_pizdec();
    act();
   } else
   {
    document.getElementById(img).src=img66.src;
    document.getElementById(img).style.visibility="visible";
    obj.setAttribute("smile"," - Вы забыли или забили на Имя. Поле не можит быть пустым  !!!");
    Smile_speak(obj);
    act_mas[img]=false;
    act();
   }
 }


 if(img=='3'){
 var reg=/.*[\.]*.+@.+(\..+)+/;
 var result=reg.test(obj.value);
 if(result==true) {
    document.getElementById(img).src=img77.src;
    document.getElementById(img).style.visibility="visible";
    Smile_pizdec();
    act_mas[img]=true;
    act();
   } else
   {
    document.getElementById(img).src=img66.src;
    document.getElementById(img).style.visibility="visible";
     obj.setAttribute("smile"," - Вы забыли или забили на Email. Поле не можит быть пустым  !!!");
    Smile_speak(obj);
    act_mas[img]=false;
    act();
   }
 }
  if(img=='2'){
 var reg=/[0-9]{5,}/;
 var result=reg.test(obj.value);
 if(result==true) {
    document.getElementById(img).src=img77.src;
    document.getElementById(img).style.visibility="visible";
    Smile_pizdec();
    act_mas[img]=true;
    act();
   } else
   {
    document.getElementById(img).src=img66.src;
    document.getElementById(img).style.visibility="visible";
     obj.setAttribute("smile"," - Вы забыли или забили на телефон. Поле не можит быть пустым  !!!");
    Smile_speak(obj);
    act_mas[img]=false;
    act();
   }
 }
}

function Send_zakaz(){
f2.config.disabled=false;
f2.submit();
}

function Send_compute(){
if(step==1){
if(zakaz.design.checked==true || zakaz.katalog.checked==true || zakaz.magazine.checked==true || zakaz.press_center.checked==true || zakaz.gallery.checked==true || zakaz.popizdet.checked==true )
 {
 text="";
 for(i=0;i<document.zakaz.length;i++){
 obj=document.zakaz.elements[i];
 if(obj.checked==true && obj.style.visibility=="visible"){
  text=text+obj.value+"|";
 }
 }
 f2.zak.value=text;
 f2.price.value="Цена: "+all_price+" грн.";
 f2.submit();
 }
  else
  document.body.scrollTop=0;
}
 f2.zak.value=document.getElementById("info").innerHTML;
 f2.submit();
}

function Avto(){
obj=document.getElementById("z_explorer");
if(obj.style.display=="block") return; else
 {
   var w=Math.floor((screen.width/2)-(276/2));
   var h=Math.floor((screen.height/2)-(104/2));
   obj.style.top=h;
   obj.style.left=w;
 obj.style.display="block";
 document.getElementById("overlay").style.visibility="visible";
 document.getElementById("overlay").style.height =parseInt(document.body.scrollHeight);
 }
}

function Scroll(){
obj=document.getElementById("z_explorer");
if(obj.style.display=="block" &&  navigator.appName=='Microsoft Internet Explorer'){
 obj.style.top=Math.floor((screen.height/2)-(104/2))+parseInt(document.body.scrollTop);
}
}

function Close_div(){
  obj=document.getElementById("z_explorer");
  if(obj.style.display=="block"){
   obj.style.display="none";
   obj=document.getElementById("Error_enter");
   obj.style.visibility="hidden";
  document.getElementById("overlay").style.visibility="hidden";
  }
}

function Enter(){
obj=document.getElementById("Error_enter");
if(obj.style.visibility!="visible")
 obj.style.visibility="visible";
else
 obj.style.visibility="hidden";
}

function forIE6(){
obj=document.getElementById("main_enter");
obj.href="JavaScript:Avto()";
}

function getClientHeight(){
return document.compatMode=='CSS1Compat' && !window.opera?document.documentElement.clientHeight:document.body.clientHeight;
}

function Animate_go(obj){
clearInterval(taimer);
f_img=document.getElementById(obj);
taimer=setInterval('Animate('+f_img.id+')',30);
}

function Animate(obj){
p_obj=parseInt(f_left);
if(f_count==10){
 clearInterval(taimer);
 f_count=0;
}
if(p_obj==6){
 f_flag='left';
 f_count=f_count+1;
}
if(p_obj==-6){
 f_flag='right';
 f_count=f_count+1;
}
if(f_flag=='left')
 obj.style.left=(p_obj-2);
if(f_flag=='right')
 obj.style.left=(p_obj+2);
 f_left=obj.style.left;
}

function Animate_stop(obj){
 document.getElementById(obj).style.left="0 px";
 clearInterval(taimer);
  f_count=0;
}
