/**
 * реализация функций
 *
 *
 */
 var H7F = {};

 H7F.Ajax = function () {
 
     this.object_Ajax();
 
 }
 H7F.Ajax.prototype = {
     init: {
 
         obj:null
     },
     object_Ajax: function(){
         if (window.XMLHttpRequest)
         {
             try
             {
                 this.init.obj= new XMLHttpRequest();
             }
             catch (e){}
         }
         else if (window.ActiveXObject)
         {
             try
             {
                 this.init.obj =ActiveXObject('Msxml2.XMLHTTP');
             } catch (e){}
             try
             {
                 this.init.obj =ActiveXObject('Microsoft.XMLHTTP');
             }
             catch (e){}
         }
         return null;
     },
     send_Data:function(script,processing_function,data,transport){
         var s=this.init.obj;
         var data = JSON.stringify(data);
 
 
 
         // Метод POST
         this.init.obj.open("POST", script, true);
 
         this.init.obj.onreadystatechange = function()
         {
             if (s.readyState == 4){
                 //H7F.data=JSON.parse(H7F.Ajax.obj.responseText);
                 //console.log(H7F.data["contents"][0]["productID"]);
                 processing_function(JSON.parse(s.responseText));
             }
 
 
         }
 
 
         // Установка заголовков
         if(transport==0){this.init.obj.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');}
         if(transport==1){this.init.obj.setRequestHeader('Content-Type', 'text/plain');}
 
 
 
         // Отправка данных
         this.init.obj.send(data);
 
     }
 
 
 },
 
 H7F.Ajax1 = function () {
 
     this.object_Ajax();
 
 }
 
 H7F.Ajax1.prototype = {
         init: {
 
             obj:null
         },
         object_Ajax: function(){
             if (window.XMLHttpRequest)
             {
                 try
                 {
                     this.init.obj= new XMLHttpRequest();
                 }
                 catch (e){}
             }
             else if (window.ActiveXObject)
             {
                 try
                 {
                     this.init.obj =ActiveXObject('Msxml2.XMLHTTP');
                 } catch (e){}
                 try
                 {
                     this.init.obj =ActiveXObject('Microsoft.XMLHTTP');
                 }
                 catch (e){}
             }
             return null;
         },
         send_Data:function(script,processing_function,data,transport){
             var s=this.init.obj;
             var data = JSON.stringify(data);
 
 
 
             // Метод POST
             this.init.obj.open("POST", script, true);
 
             this.init.obj.onreadystatechange = function()
             {
                 if (s.readyState == 4){
                     //H7F.data=JSON.parse(H7F.Ajax.obj.responseText);
                     //console.log(H7F.data["contents"][0]["productID"]);
                     processing_function(JSON.parse(s.responseText));
                 }
 
 
             }
 
 
             // Установка заголовков
             if(transport==0){this.init.obj.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');}
             if(transport==1){this.init.obj.setRequestHeader('Content-Type', 'text/plain');}
 
 
 
             // Отправка данных
             this.init.obj.send(data);
 
         },
 
         abort:function(){
 
             this.init.obj.abort();
         }
     },
 
 
 H7F.create_script = function (url) {
 
  var e = document.createElement("script");
 
     e.src = url;
     e.defer="true";
     e.type="text/javascript";
 
     document.getElementsByTagName("head")[0].appendChild(e);
 
 },
 
 
 
 /*
     obj = {
         "id": "",
         "className": "",
         "name":""
     }
 */
 H7F.create_div = function (obj){
     var elem = document.createElement('div');
     if(obj.id!=undefined){elem.id=obj.id};
     if(obj.className!=undefined){elem.className=obj.className};
     return elem
 },
 
 /*
  obj = {
     "id": "",
     "src": "",
     "title": 50,
     "width":70,
     "height":44,
     "title":"kjj",
     }
 */
 H7F.create_image = function (obj){
     var elem= document.createElement('img');
     if(obj.className!=undefined){elem.className=obj.className};
     if(obj.id!=undefined){elem.id=obj.id};
     if(obj.src!=undefined){elem.src=obj.src};
     if(obj.width!=undefined){elem.width=obj.width};
     if(obj.height!=undefined){elem.height=obj.height};
     if(obj.title!=undefined){elem.title=obj.title};
     return elem
 },
 
 //------
 H7F.Create_div_blok = function(obj,obj1,obj2){
     var div =H7F.create_div(obj);
     div.appendChild(H7F.create_image(obj1));
     div.appendChild(H7F.create_image(obj2));
     return div;
 
 },
 
 /*
 elems[0].style.float = 'left';
 elems[0].style.margin = '0px 5px 10px 5px';
 elems[0].style.overflow = 'hidden';
 elems[0].style.position = 'relative';
 elems[0].style.width= '250px';
 elems[0].style.height= '200px';*/
 
 H7F.Сss_changes= function(obj,elems){
 
 
     elems.style.float = obj.float;
     elems.style.margin = obj.margin;
     elems.style.overflow = obj.overflow;
     elems.style.position = obj.position;
     elems.style.width= obj.width;
     elems.style.height=obj.height;
 },
 H7F.difference= function(a,b){
     if(a>b){return -(a-b)};
     if(a<b){return (b-a)};
     if(a==b){return false};
 }
 