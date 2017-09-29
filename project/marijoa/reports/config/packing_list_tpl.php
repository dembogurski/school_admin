<!-- 
    Report Template File (packing_list)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
 <script type="text/javascript" src="include/jquery1.2.6.js" > </script>
-->

<!-- begin: general_header noeval -->
       <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
       <script type="text/javascript" src="include/jquery.js" > </script>
       
       <script type='text/javascript' src='include/jquery.autocomplete.js'></script> 
       <link rel="stylesheet" type="text/css" href="templates/jquery.autocomplete.css" />
 
        

	<treset_page>
<style type="text/css">
    .design{
        background-color: activeborder;
    }        
    .minititle{
        font-size: 11px;
        font-weight: bold;
    }
    .mar_bag{
        font-size:11px;
        padding-left:3px;
        text-align:center;
    }
    .mar_bag_painted{
        font-size:11px;
        padding-left:3px;
        text-align:center;
        background: #228B22;
    }
    .texto{
        width: 100%;
        border:solid 0px white; 
        font-size:11px;
    }
    .color{
        width: 100%;
        border:solid 0px white; 
        font-size:11px;
    }   
     .numero{
        width: 100%;
        border:solid 0px white; 
        font-size:11px;
        text-align: right;
    }   
    
   .message{
        position: absolute;
        top: 0;
        z-index: 10;
        background:#ffc;
        padding:5px;
        border:1px solid #CCCCCC;
        text-align:center;
        font-weight:bold;
        width: 50%;
        height: auto;
        margin-top: 40px;
        margin-left: 25%;
        margin-right: 25%;  
    }
    
    .div_repeat{
        position: absolute;
        top: 150px;
        z-index: 10;
        background:#ffc;
        padding:5px;
        border:1px solid #CCCCCC;
        text-align:center;
        font-weight:bold;
        width: 5%;
        height: auto;
        margin-top: 250px;
        margin-left: 94%;
        margin-right: 0%;  
    }   
     .headers{
        position: absolute;
        top: 0;
        z-index: 10;
        padding:0px;
        border:1px solid activeborder;
        text-align:center;
        font-weight:bold; 
        width: 98.7%;
        height: auto;
        margin-top: 1px;
        margin-left: 0%;
        margin-right: 0px;  
    }
 
   .obs{
        position: absolute;
        top: 0;
        z-index: 10;
        background:#ffc;
        padding:5px;
        border:1px solid #CCCCCC;
        text-align:center;
        font-weight:bold;

        width: 50%;
        height: auto;
        margin-top: 0px;
        margin-left: 48%;
        margin-right: 2%;  
    }    
    .complete{
        background-color: #B0E2FF;
    }
    .tmp_obs{
        background-color: #B0E2FF;
    }
    .mas{
        cursor:pointer; 
    }
        
</style>         

 
<script language="javascript"> 
    /**
     * Este array contendra todos los datos para la busqueda
     * Formato: 
     * 
     * di=> mar bag  each_quty color_desc
     */
    var data = new Array();
    
    var flag = false;
    
    var colores = ['blanco'];    
    
    var enterInterval;
    
    var actual_id = 0;
    

    
    var buscador = ' <label>Ej.: Bulto  Each  o   Bulto  Color Desc.   o  Each Color Desc    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>  <br>  \n\
    <input type="text" placeholder="Buscar" size="40" id="buscador"  onkeyup="working()"   style="border: 1px solid gray; padding-left:2px" >   <input type="button"  onclick="buscar()"  value="Buscar"  id="buscar" >  <span id="msg"></span> &nbsp;&nbsp;&nbsp;ESC (Salir)';
    
    var headers = '<table border="1" cellpadding="0" cellspacing="0" style="width:100%;background:white;padding-right:1px">  <tr>  <th class="design" style="width: 12%">Design/Descrip</th><th class="design" style="width: 10%">Mar</th><th class="design" style="width: 5%">Bulto</th><th class="design" style="width: 5%">Precio</th><th class="design" style="width: 10%">Color Desc.</th><th class="design" style="width: 5%">Each Quty</th><th class="design" style="width: 5%">Unit</th><th class="design" style="width: 5%">Codigo</th><th style="width: 13%">Color</th><th style="width: 5%">Qty.Ticket</th><th style="width: 5%">Kg Real</th><th style="width: 3%">Ancho</th><th style="width: 3%">Gramaje</th><th style="width:4%"> <img src="images/printer2.png"></th><th style="width: 3%">N&deg; Foto</th><th style="width: 2%">Obs</th><th style="width: 2%">&nbsp;</th></tr></table>';
           
    var add_code = ' <label>Ingrese el codigo a Clonar&nbsp;</label>   \n\
    <input type="text"   size="12" id="clonar"   style="border: 1px solid gray; padding-left:2px" >    <input type="button"  onclick="buscarCodigo()"  value="Buscar"  id="search_code" >  <br>  <span id="msg"></span>   ';
        
     
           
    function scrollWindows(pixels) {
        $('html,body').animate({
        scrollTop: pixels
        }, 250);
    }  
    function pressEnter(){
        $("#msg").html("<label style='color:black;font-size:12px;font-weight:bolder'>Presione Enter...</label>");      
    }
    function working(){
         var lon = $("#buscador").val().length;
         if(lon > 5){
            $("#msg").html("<img src='images/search2.gif' width='20px' height='20xp'>");   
            //enterInterval = setTimeout("pressEnter()",1500);
         }else{
            $("#msg").html("");      
         } 
    }
    function chekKey(e){             
         if (!e) var e = window.event; 
         if (e){
          if (e.keyCode) { 
                code = e.keyCode; 
            } else if (e.which) { 
                code = e.which; 
            }
                
            if(code == 114){
               e.preventDefault();
               if( flag ){
                  flag = false; 
                  cerrarPopup();
                  $("#loading").html("&nbsp;Presione F3 para buscar...");   
               }else{
                  flag= true; 
                  abrirPopup(buscador );
                  $("#loading").html("");   
                  
               } 
            } 
            
            // F5
            var keycode;
        
            if (window.event)
                keycode = window.event.keyCode;
            else if (e)
                keycode = e.which;
            
            

            // Mozilla firefox
            if ($.browser.mozilla) {
                if (keycode == 116 ||(e.ctrlKey && keycode == 82)) {
                    if (e.preventDefault)
                    {
                        e.preventDefault();
                        e.stopPropagation();
                        abrirPopup('Use el Icono Recargar para <img src="images/reload.png" border="0"  style="margin-bottom: 1px"> la pagina..., Presione ESQ para cerrar este mensaje...');
                        //alert();
                    }
                }
                
                if (keycode == 27){
                    cerrarPopup();
                }
            } 
            
         }   
   } 
         function buscar(){
            var texto = $("#buscador").val();
            
            var elem = texto.split(" ");
            var mar = elem[0];
            var bag = elem[1];
            var longitud = mar.length;
              
            // Sacar todas las Clases
            $( ".mar_bag_painted" ).removeClass("mar_bag_painted");
            
            var found= false;
            var cant = 0;
            
            var firstId = 0;
            
            for (var id in data){
               var cadena = data[id];
               if(cadena != undefined){
                    var nmar = cadena.indexOf(mar); 
                    var nbag = cadena.indexOf(bag,nmar + longitud);

                    if(bag != undefined){  // Buscar por mas de un criterio
                            if(nmar > 0 && nbag > 0){
                                found = true; cant++;
                                if(cant == 1){  firstId = id } // Guardar el Primer ID para poner el Cursor
                                $( "#mar_"+id ).addClass("mar_bag_painted");
                                $( "#bag_"+id ).addClass("mar_bag_painted"); 
                                $( "#precio_"+id ).addClass("mar_bag_painted"); 
                                $( "#color_desc_"+id ).addClass("mar_bag_painted"); 
                                $( "#each_"+id ).addClass("mar_bag_painted"); 
                                $( "#unit_"+id ).addClass("mar_bag_painted"); 
                                $( "#codigo_"+id ).addClass("mar_bag_painted");  
                            }
                    }else{
                        if(nmar > 0){
                                found = true; cant++;
                                if(cant == 1){  firstId = id }   // Guardar el Primer ID para poner el Cursor
                                $( "#mar_"+id ).addClass("mar_bag_painted");
                        }
                    }
               }
            }
            if(found){
                $("#msg").html("("+cant+")<img src='images/ok.png'> " );
                var p = $(".mar_bag_painted" );
                var position = p.position();
                 
                // var windowWidth = $(window).width(); //retrieve current window width
                 var windowHeight = $(window).height(); //retrieve current window height
                //var documentWidth = $(document).width(); //retrieve current document width
                //var documentHeight = $(document).height(); //retrieve current document height
                //var vScrollPosition = $(document).scrollTop(); //retrieve the document scroll ToP position
                
                //alert("WW: "+windowHeight+" WH "+windowHeight+"    Scroll  "+vScrollPosition);
                scrollWindows(position.top - ( windowHeight / 2));
                
                $("#color_"+firstId).focus();
                
            }else{
                $("#msg").html("("+cant+") <img src='images/12-em-cross.png'>" );
            }
              
              
         }
         
        
        function foco(){
            $("#buscador").focus();
            $("#buscador").select();
            
            // Enter
            $("#buscador").keyup(function (e) {  
                if (e.keyCode == 13) { 
                   clearTimeout(enterInterval);
                   enterInterval = null;
                   buscar();
                }
                
            });
        }
        // Flotante
 
        function abrirPopup(obj){   
            $("#message").html( obj ); 
            $("#message").slideDown("fast");
            setTimeout("foco()",500); 
        }
        function showHeaders(id){
            $("#headers").html( headers ); 
            
        }
   
        function cerrarPopup(){     
             $("#message").slideUp("fast");
        }
        function limpiar(){   
            $("#message").html('');	
            $("#message").animate({ opacity:0 }, "fast");    
        }        
        function setObs(id){
            actual_id = id;
            
            $(".tmp_obs").removeClass("tmp_obs");
            
             
            var p = $("#tr_"+id );
            
            var h = $("#tr_"+id ).height();
            var tr = p.position();
            
            $.ajax({
            type: "POST",
            url: "include/Ajax.class.php",
            data: "action=get_packing_obs&id="+id+"",
            async:true,
            dataType: "html",
            beforeSend: function(objeto){
                $("#obs_"+id).html("<img src='images/search2.gif'  >"); 
                $("#obs_"+id).addClass("tmp_obs");
            },
            complete: function(objeto, exito){
                if(exito=="success"){
                   $("#obs_"+id).html("<img src='images/down.png' >");  
                   $("#obs").slideDown("slow");  
                        
                   $("#observ").val( $.trim( objeto.responseText )); 
                   $('#obs').animate({top: tr.top + h +1+"px" },{queue: false, duration: 150});
				   
                }
            }
          }); 
             
        } 
        
        function saveObs(){
           var obs = $("#observ").val();
            var id = actual_id;
            $.ajax({
            type: "POST",
            url: "include/Ajax.class.php",
            data: "action=save_packing_obs&id="+id+"&obs="+obs,
            async:true,
            dataType: "html",
            beforeSend: function(objeto){
                $("#obs_"+id).html("<img src='images/search2.gif'  >"); 
            },
            complete: function(objeto, exito){
                if(exito=="success"){
                   $("#obs_"+id).html("<img src='images/next.png'  >");  
                }
            }
        }); 
           cancelObs();
        }
        function cancelObs(){
           $("#obs").slideUp("slow");  
           $(".tmp_obs").html("...");
        }
        
        $(window).scroll(function(){
             $('#message').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});
             
             $('#div_repeat').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});
             
             var vScrollPosition = $(document).scrollTop();
         
             if(vScrollPosition > 300){
                  $("#headers").slideDown("fast"); 
                  $('#headers').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350}); 
             }else{
                  $("#headers").slideUp("slow"); 
             }
              
        });   
         document.onkeydown = chekKey;
       // window.onkeyup = chekKey;
       
     function autocompletar(id){           
         $("#"+id).autocomplete(colores);  
     }  
     function changeBackground(){
         $( "#general" ).css("background","white");
     }
       
    $(document).ready(function() {          
        $.ajax({
            type: "POST",
            url: "include/Ajax.class.php",
            data: "action=lista_colores",
            async:true,
            dataType: "html",
            beforeSend: function(objeto){
                $("#loading").html("<label>&nbsp;Cargando colores... </label> <img src='images/search2.gif'  >"); 
            },
            complete: function(objeto, exito){
                if(exito=="success"){
                    colores = eval(objeto.responseText); 
                    $("#loading").html("&nbsp;Presione F3 para buscar...");   
                    $("#headers").html( headers ); 
                    //$('.date-pick').datePicker().val(new Date().asString()).trigger('change');
                     
                    $( ".color" ).autocomplete(colores);
                    setTimeout("changeBackground()",3000);
                }
            }
        });  
        
        $( ".mas" ).mouseover(function() {
            $("#loading").html("Agregar Codigo..."); 
        });
        $( ".mas" ).mouseout(function() {
            $("#loading").html("Presione F3 para buscar..."); 
        });
        
       validarFechaHora("fecha_desc");
       validarFechaHora("fecha_fin");
   
     }); 
 function validarFechaHora(id){
    var value =  $.trim( $("#"+id).val())+":00";
    
    // capture all the parts
    var matches = value.match(/^(\d{2}).(\d{2}).(\d{4}).(\d{2}).(\d{2}).(\d{2})$/);
    //alt:
    // value.match(/^(\d{2}).(\d{2}).(\d{4}).(\d{2}).(\d{2}).(\d{2})$/);
    // also matches 22/05/2013 11:23:22 and 22a0592013,11@23a22
    if (matches === null) {
            $("#"+id).val("dd-mm-YYYY hh:mm");  $("#"+id).css("border","solid red 1px");
    } else{
        // now lets check the date sanity
        var year = parseInt(matches[3], 10);
        var month = parseInt(matches[2], 10) - 1; // months are 0-11
        var day = parseInt(matches[1], 10);
        var hour = parseInt(matches[4], 10);
        var minute = parseInt(matches[5], 10);
        var second = parseInt(matches[6], 10);
        var date = new Date(year, month, day, hour, minute, second);
        if (date.getFullYear() !== year
          || date.getMonth() != month
          || date.getDate() !== day
          || date.getHours() !== hour
          || date.getMinutes() !== minute
          || date.getSeconds() !== second
        ) {
            $("#"+id).val("dd-mm-YYYY hh:mm");  $("#"+id).css("border","solid red 1px");
        } else {
           $("#"+id).css("border","solid gray 1px");
        }

    }
 }
 
  function setBackground(id){
        $("#tr_"+id).find("input").each(function() {
           $(this).addClass("complete");
        });
        var h = 0;
        $("#tr_"+id).find("td").each(function() {
           if(h>0){ $(this).addClass("complete");}  h++;
        });  
  }
  //By JACK
  //
  
  function checkValue(obj,intentos){
  	var objeto = $(obj);
	var m_id = obj.id.split("_")[2];
  	var value = objeto.val();
  	var intentos = intentos || 0;
  	var loader = null;
	
  	if(value === 'c'){
  		loader = setInterval(function(){objeto.css("color","green");objeto.css("background-color","rgb("+Math.floor((Math.random() * 227) + 100)+",0,0)")}, 200);
  		intentos++;
	        $.ajax({
	            url : "http://localhost/serial/Indicador_LR22.php",
	            dataType:"jsonp",
	            jsonp:"mycallback", 	        
	            success:function(data){
	            	clearInterval(loader);
	            	objeto.css("background-color","");
	                var peso = data.peso;
	                var estado = data.estado;
	                if(estado == "estable"){
	                    if(peso == ""){
	                        if(intentos < 5){
	                        	checkValue(obj,intentos);
	                        }else{
	                        	objeto.css("color","red");
	                        	objeto.val("error");
	                        	intentos = 0;
	                        }
	                    }else{
	                      objeto.css("color","black");	                      
	                      objeto.val(peso);
	                      intentos = 0;
						  checkComplete(m_id,false);
	                    }	                 
	                }else{
	                	if(peso === "-1000"||peso === -1000)alert("Hubo un error al intentar leer los datos de la balanza");
	                  	objeto.css("color","red");
	                  	objeto.val(peso);
	                  	objeto.select();
	                }
	            }
	        });
  	}else{
  		objeto.css("color","black");
  		objeto.val(value);
  	}
  }

  function checkComplete(id, repeat){       
       if("Cerrado" == $("#estado").val()){
            alert("Packing Cerrado, no se guardar�n los cambios...");
       }else{         
      
       var color = $("#color_"+id).val();
       var quty =  $("#quty_ticket_"+id).val();
       var p_kg = $("#p_kg_"+id).val();
       var p_ancho = $("#p_ancho_"+id).val();
       var p_gram = $("#p_gram_"+id).val();
       var foto = $.trim($( "#foto_"+id).val());
       var codigo = $("#codigo_"+id+" > a").html();
       var unit = $( "#unit_"+id ).html();
       
       if(p_kg > 500){           
           if (!confirm("El Kilaje ingresado es muy alto, desea continuar esta transaccion?")) {
                return;
           }
       }
       if(quty > 1100){
           
           if (!confirm("La cantidad del Ticket es muy alta, desea continuar esta transaccion?")) {
                return;
           }
       }
       if(p_ancho > 4){           
           if (!confirm("El Ancho es muy alto, desea continuar esta transaccion?")) {
                return;
           }
       }       
       $("#each_"+id).css("border","1px solid gray");
	   
       if (color.length > 0  && quty > 0 && p_kg > 0 && p_ancho > 0 && p_gram > 0 && color.length != ""  && quty != "" && p_kg != "" && p_ancho != "" && p_gram != ""){  
            // Ya esta completo ya saco del Arreglo despues de Guardar
            for(var key in data) {
                if(key == id){
                   data[key] = undefined;
                } 
            }
            // Ajax Call
            $.ajax({
                type: "POST",
                url: "include/Ajax.class.php",
                data: "action=actualizar_packing&id="+id+"&codigo="+codigo+"&p_color="+color+"&p_quty="+quty+"&p_kg="+p_kg+"&p_ancho="+p_ancho+"&p_gram="+p_gram+"&p_foto="+foto+"&unit="+unit,
                async:true,
                dataType: "html",
                timeout:8000,                
                error:function(){ 
                    $("#msg_"+id).html("<img src='images/next.png'   >");  
                },
                beforeSend: function(objeto){
                     $("#msg_"+id).html("<img src='images/search2.gif' height='16px' width='16px'  >"); 
                },
                complete: function(objeto, exito){
                    if(exito=="success"){  
                        $("#msg_"+id).html("<img src='images/ok.png' height='16px' width='16px'  >");
                        setBackground(id);  
                    }
                }
            });
            
            // Poner todos los colores iguales que tiene la misma Color Description
            if(repeat){                 
                if( $('#autofill_colors').is(':checked')){ 
                    var mar = $("#mar_"+id).html();
                    var color_desc = $.trim( $("#color_desc_"+id).html() );

                    /*
                    * Reemplaza todos los espacios por _ con la expresion regular / /g
                    * Mod by JACK 22/01/2015
                    */
                    var marc = (mar+"_"+color_desc).replace(/\s/g,"_");
                    
                    
                    //Modifique cantida by JACK
					var count = 0;
                    if($("[class ='"+marc+"'] input[id^='color_']").each(function(){if($(this).val().length>0){count++;}if(count>2){return true;}})){
                        
                        if(confirm("Desea Sobrescribir los valores existentes?")){                            
                        
                            $("tr[class='"+marc+"'] input[id^='color_']").val(color);
                            
							$("tr[class='"+marc+"'] input[id^='p_ancho_']").val(p_ancho);
							$("tr[class='"+marc+"'] input[id^='p_gram_']").val(p_gram);
							if(foto != ""){$("tr[class='"+marc+"'] input[id^='foto_']").val(foto);}
                        }else{
							$("tr[class='"+marc+"'] input[id^='color_']").each(function(){if($.trim($(this).val())==""){$(this).val(color);}});
							$("tr[class='"+marc+"'] input[id^='p_ancho_']").each(function(){if($.trim($(this).val())==""||"0.00"){$(this).val(p_ancho);}});
							$("tr[class='"+marc+"'] input[id^='p_gram_']").each(function(){if($.trim($(this).val())==""||"0.00"){$(this).val(p_gram);}});
							
							if(foto != ""){
								$("tr[class='"+marc+"'] input[id^='foto_']").each(function(){if($.trim($(this).val())==""){$(this).val(foto);}});
							}
						}
                    }else{
						$("tr[class='"+marc+"'] input[id^='color_']").val(color);
						$("tr[class='"+marc+"'] input[id^='p_ancho_']").val(p_ancho);
						$("tr[class='"+marc+"'] input[id^='p_gram_']").val(p_gram);
						if(foto != ""){$("tr[class='"+marc+"'] input[id^='foto_']").val(foto);}						
                    }

                }
           }
            
        }
        
       }
        
     } 
	 
     function saveCab(){
         
        var fecha = $("#fecha_desc").val();
        var transp = $("#transp").val();
        var supervisor = $("#supervisor").val(); 
        var integrantes = $("#integrantes").val();
        var observacion = $("#observacion").val();
        var estado = $("#estado").val();
        var ref = $("#ref").val();
        var fecha_fin = $("#fecha_fin").val();
        
         var deposito = $("#depositos").val(); 
        
        //alert(fecha+" "+transp+" "+supervisor+" "+integrantes+" "+observacion+" "+estado );
        $.ajax({
                type: "POST",
                url: "include/Ajax.class.php",
                data: "action=update_packing_cab&ref="+ref+"&fecha="+fecha+"&transp="+transp+"&supervisor="+supervisor+"&integrantes="+integrantes+"&obs="+observacion+"&estado="+estado+"&fecha_fin="+fecha_fin+"&deposito="+deposito,
                async:true,
                dataType: "html",
                timeout:8000,                
                error:function(){ 
                    $("#msg_"+id).html("<img src='images/next.png'   >");  
                },
                beforeSend: function(objeto){
                     $("#msg_cab").html("<img src='images/search2.gif' height='16px' width='16px'  >"); 
                },
                complete: function(objeto, exito){
                    if(exito=="success"){ 
                        $("#msg_cab").html("<img src='images/ok.png' height='16px' width='16px'  >");  
                        if(estado=="Cerrado"){
                            $("#msg_cab").html("ATENCION! Estando Cerrado al recargar ya no se podra editar...");  
                        }
                    }
                }
            }); 
             
     }
   
    function addCode(){
       abrirPopup(add_code );       
       setTimeout('$("#clonar").focus();',1000);
    }
    function buscarCodigo(){
        var codigo = $("#clonar").val()
        var ref = $("#ref").val();
        $.ajax({
                type: "POST",
                url: "include/Ajax.class.php",
                data: "action=buscar_codigo_en_packing&codigo="+codigo+"&ref="+ref,
                async:true,
                dataType: "html",
                timeout:8000,                
                error:function(){ 
                    $("#msg").html("<img src='images/next.png'   >");  
                },
                beforeSend: function(objeto){
                     $("#msg").html("<img src='images/search2.gif' height='22px' width='22px'  >"); 
                },
                complete: function(objeto, exito){
                    if(exito=="success"){ 
                        var code = $.trim(objeto.responseText);
                        if(code == "false"){
                            alert("El codigo no se encuentra en el Packing, favor ingrese un codigo Valido.");
                        }else{
                            abrirPopup(objeto.responseText);  
                        } 
                    }
                }
            });        
        
    }   
    function addToPacking(){
       var codigo = $("#codigo_padre").val()
       var ref = $("#ref").val();
       var des = $("#new_design").val();
       var mar = $("#new_mar").val();
       var bag = $("#new_bag").val();
       var color_desc = $("#new_color").val();
       var unit = $("#new_unit").val();
       var metros = $("#new_mts").val();
       if(des == "" || mar =="" || bag ==""  || unit =="" || metros ==""  || color_desc == ""){
           alert("Debe rellnar todos los datos...");
       }else{
            $.ajax({
                type: "POST",
                url: "include/Ajax.class.php",
                data: "action=agregar_fila_packing&codigo="+codigo+"&ref="+ref+"&des="+des+"&mar="+mar+"&bag="+bag+"&unit="+unit+"&metros="+metros+"&color_desc="+color_desc,
                async:true,
                dataType: "html",
                timeout:8000,                
                error:function(){ 
                    $("#msg").html("<img src='images/next.png'   >");  
                },
                beforeSend: function(objeto){
                     $("#msg").html("<img src='images/search2.gif' height='22px' width='22px'  >"); 
                },
                complete: function(objeto, exito){
                    if(exito=="success"){ 
                        abrirPopup(objeto.responseText); 
                    }
                }
            });   
       } 
    }
    
    function buscarImagen(codigo){
        $.ajax({
                type: "POST",
                url: "include/Ajax.class.php",
                data: "action=cheackear_imagen_packing&codigo="+codigo,
                async:true,
                dataType: "html",
            
                beforeSend: function(objeto){
                     $("[name=msg_"+codigo+"]").html("<img src='images/search2.gif' height='22px' width='22px'   >");  
                },
                complete: function(objeto, exito){
                    if(exito=="success"){ 
                         $("[name=msg_"+codigo+"]").html("<img src='images/ok.png' >");
                         
                         var result = $.trim(objeto.responseText);
                         if(result == "No"){
                             $("#spanfoto_"+codigo+"").html('<img src="images/camera_capture_photo.png"  style="cursor:pointer" title="Sacar foto" onclick="foto('+codigo+')">');
                             $("[name=foto_"+codigo+"]").val("");
                         }else{
                            $("[name=foto_"+codigo+"]").val(objeto.responseText);
                            $("#spanfoto_"+codigo+"").html('<img src="images/image.png" style="cursor:pointer" title="Ver foto" onclick="verFoto('+codigo+')">');
                         }     
                        
                    }
                }
            });   
    }    
    function resaltar(id){
        $("#each_"+id).css("border","2px solid red");
        $("#quty_ticket_"+id).select();
    }
    function recargar(url){
       var des = $("#color_descrip").val();
       var mar = $("#mar").val();
       var lim = $("#c_limite").val();
       var comp = false;
       if( $('#completos').is(':checked') ){ 
           comp = true;
       } 
       window.location.href = url+"&mar="+mar+"&color_desc="+des+"&c_limite="+lim+"&completos="+comp; 
    }
    
    function imprimir(codigo){ 
        var usuario = $("#usuario").val(); 
        window.open("project/marijoa/reports/config/re_code39Lotes_prg_recib.php?codigos="+codigo+"&usuario="+usuario+"&print=yes","Codigos de Barras","width=350,height=500,scrollbars=yes");
        $('[name=codigo_'+codigo+']').css("background","#FF8C00");
        $('[name=print_'+codigo+']').attr("disabled","true"); 
        buscarImagen(codigo);
    }
    function foto(codigo,id){
      var fill = false;  
      if( $('#autofill_colors').is(':checked')){ 
        fill = true;
      }    
      var popup =  window.open("imagen_producto_tpl.php?codigo="+codigo+"&id="+id+"&fill="+fill,"Captura de Imagen","width=1020,height=760,scrollbars=yes");  
  
    } 
    
   function verFoto(codigo){
            var p = $("#spanfoto_"+codigo );
            
            var h = $("#spanfoto_"+codigo ).height();
            var tr = p.position();
            
            $.ajax({
            type: "POST",
            url: "include/Ajax.class.php",
            data: "action=get_code_image&codigo="+codigo+"",
            async:true,
            dataType: "html",
            beforeSend: function(objeto){
                $("#foto").html("<img src='images/search2.gif' height='22px' width='22px'   >"); 
                $("#foto").css("width","20%"); 
                $("#foto").css("margin-left","51%");
                 
                $("#foto").slideDown("slow");  
                $('#foto').animate({top: tr.top + h +"px" },{queue: false, duration: 150});
            },
            complete: function(objeto, exito){
                if(exito=="success"){
                   $("#foto").html('<img src="prod_images/'+objeto.responseText+'" height="160px" width="214px" >');  
                   $("#foto").click(function(){
                       $("#foto").slideUp("fast");
                   });
                }
            }
          });
   }
   
   function check_uncheck(check){
       if( $('#'+check).is(':checked')){ 
          $('#auto_completar').attr("checked",true);  $('#autofill_colors').attr("checked",true); 
          
       }else{
          $('#auto_completar').removeAttr("checked",true);  $('#autofill_colors').removeAttr("checked",true); 
       }
   }
   
   function dividirPieza(metros){
      var cantp = $("#cant_clone").val();       
      $("#div_piezas").html( (metros-cantp).toFixed(2));
   }
   function clonarUI(codigo){
       var metros =  parseFloat($("td[name='codigo_"+codigo+"']").prev().prev().html());
       var code = '<label>Medida Inicial: '+metros+' metros.</label><br/>\n\
                     Extraer: <input type="text" size="4" value="0" id="cant_clone" onkeyup="dividirPieza('+metros+')"> \n\
                     <label>metros.<br/></label>Restantes en el Padre: <span id="div_piezas">'+metros+'.</span> metros.\n\
        <br><br><input type="button" value="Dividir esta Pieza" onclick="dividir('+codigo+')" > ';
       
       abrirPopup(code);
      //alert(codigo);    
   }       
   function dividir(codigo){
       var cant = $("#cant_clone").val();   
       var ref = $("#ref").val();
        $.ajax({
            type: "POST",
            url: "include/Ajax.class.php",
            data: "action=dividir_codigo_packing&codigo="+codigo+"&ref="+ref+"&cantidad="+cant,
            async:true,
            dataType: "html",
            beforeSend: function(objeto){
                $("#message").html("Procesando...");   
            },
            complete: function(objeto, exito){
                if(exito=="success"){
                   $("#message").html(objeto.responseText);   
                }
            }
          });      
       
   } 
   
</script>    
 
<div id="message" class="message"  style="display:none;"  >     </div>

<div id="div_repeat" class="div_repeat">Auto:<input type="checkbox" id="auto_completar" checked onclick=check_uncheck("auto_completar") >     </div>

<div id="headers" class="headers"  style="display:none;"  ></div>
<div id="obs" class="obs"  style="display:none;text-align: center">
     <label style="font-weight:bolder">Agregar Observaci&oacute;n</label><br>
     <textarea cols="70" rows="4" id="observ"></textarea><br>
     <input type="button" id="save_obs" value="Guardar" onclick="saveObs()" style="font-size:11px;font-weight: bolder">
     <input type="button" id="cancel" onclick="cancelObs()"  value="Cancelar" style="font-size:11px;font-weight: bolder">
     
</div>
<div id="foto" class="obs"></div>

<title>Your new title here</title>
<!-- end:   general_header -->


<!-- begin: start_query0 -->
<input type="hidden" id="usuario" value="{user}">
<input type="hidden" id="ref" value="{ref}">

<table id="general" style="text-align: left; width: 100%;background:#B5B5B5" border="1" cellpadding="0" cellspacing="0" onkeyup="chekKey(event.KeyCode);" >
    <tbody>
    <thead>
<tr> <td colspan="50"> 
	<table style="text-align: left; width: 100%;" border="1"
	 cellpadding="0" cellspacing="0">
	  <tbody>
		<tr>
                    <td style="width: 20%;height:40px;"> <span id="loading" style="color:green"><label>&nbsp;Cargando espere... </label> <img src="images/search2.gif"  ></span>   </td>
		  <td style="text-align: center;width: 60%;">
			<b>Marijoa</b></td>
		  <td style="text-align: right;">
			<tpage><b>Pag: </b></tpage></td>
		</tr>
		<tr>
		  <td  style="width: 20%;">
			<small><small>ycube plus RAD [1.2.31]</small></small>
		  </td>
		  <td style="text-align: center;">
                      <big style="font-weight: bold;"><big>Packing List</big>
                    
                          <div style="text-align: center">
                              <b>Ref:</b> {ref}  <b> &nbsp;&nbsp;&nbsp; Invoice: </b> {invoice} 
                          </div>    
                  </td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
                <tr><td colspan="3">
                        <table cellpadding="2" cellspacing="2" border="0" style="width:100%;">
                            <tr> <td style="width:15%"><label>Fecha-Hora de Inicio:</label></td><td><input type="text"  maxlength="30" size="24" id="fecha_desc" onchange="saveCab()" {state} value="{fecha_desc}" onblur="validarFechaHora(this.id)">
                                    <label>Fecha-Hora de Fin:</label><input type="text" {state}  maxlength="30" size="24" id="fecha_fin" onchange="saveCab()" value="{fecha_fin}" onblur="validarFechaHora(this.id)" >
                                    <label>Deposito de Descarga</label>{depositos}
                                </td> 
                            <td style="width:15%"><label>Transportadora:</label></td><td><input type="text" id="transp" onchange="saveCab()" {state} value="{transp}" style="width:100%"></td> </tr>
                           <tr> 
                               <td><label>Integrantes:</label></td><td><input type="text" id="integrantes" onchange="saveCab()" {state} value="{integ}" style="width:100%"></td>
                               <td><label>Supervisor:</label></td><td><input type="text" id="supervisor" onchange="saveCab()" {state} value="{superv}" style="width:100%"></td> 
                           </tr>
                           <tr> 
                               <td><label>Observacion:</label></td><td><input type="text" id="observacion" onchange="saveCab()" {state} value="{observacion}" style="width:100%"></td>
                               <td><label>Estado:</label></td>
                               <td>
                                   {estado} 
                                   
                                   <span id="msg_cab"></span>
                               </td> 
                           </tr>
                        </table> 
                    </td> </tr>
                <tr><td colspan="3" style="height:38px;padding-bottom: 4px">
                        <div style="margin-top: 6px;margin-bottom: 6px;font-weight:bolder;font-size:13px;padding: 4px;text-align: center">
                        <label  >Autorellenar Color, Ancho y Gramaje de Mares  con similar Color Description:</label> <input type="checkbox" id="autofill_colors" checked onclick=check_uncheck("autofill_colors") >  <br>
                        
                         Aplique de Filtros: &nbsp; &nbsp;&nbsp;   Mar <input type="text" value="{mar}" size="16" id="mar"> &nbsp;&nbsp; &nbsp;Color Desc.<input type="text" value="{color_descrip}" size="8" id="color_descrip">
                        &nbsp; &nbsp;Limite de Registros:<input style="text-align:right" type="text" value="{limite}" size="6" id="c_limite">&nbsp; &nbsp; Mostrar solo registros incompletos&nbsp; &nbsp; <input type="checkbox" id="completos" {estado_completos} > 
                        </div> 
                        <div style="text-align:center;float: left;width: 70%"> 
                            <a href="{ant}" target="_blank" title="Anterior"><img src="images/arrow-left.png" border="0" style="margin-bottom: 1px"><a> 
                                    &nbsp; &nbsp; &nbsp; &nbsp;   <a title="Recargar" href=javascript:recargar("{actual}")><img src="images/reload.png" border="0"  style="margin-bottom: 1px"><a>
                                            &nbsp; &nbsp; &nbsp; &nbsp;   <a title="Siguiente" href="{sig}" target="_blank"><img src="images/arrow-right.png" border="0"  style="margin-bottom: 1px"><a>  
                                                </div>  <div style="width:20%;float: right">Mostrando   {inicio} &#8594; {fin} registros</div>            
                </td> </tr>
                                
	  </tbody>
	</table>
</td></tr>
 
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr id="cabecera">
        <th class="design" style="width: 15%">Design/Descrip</th>
        <th class="design" style="width: 10%">Mar</th>
        <th class="design" style="width: 5%">Bag/Bulto</th>
        <th class="design" style="width: 5%">Precio</th>
        <th class="design" style="width: 10%">Color Desc.</th>
        <th class="design" style="width: 5%">Each Quty</th>
        <th class="design" style="width: 5%">Unit</th>
        <th class="design" style="width: 5%">Codigo</th>
        <th style="width: 13%">Color</th>
        <th style="width: 5%">Quty Ticket</th>
        <th style="width: 5%">Kg Real</th>
        <th style="width: 4%">Ancho</th>
        <th style="width: 3%">Gramaje</th>
        <th style="width:2%"> <img src="images/printer2.png"></th>
        <th style="width: 4%;" >N&deg; Foto</th>
        <th style="width: 1%">Obs</th>
        <th style="width: 2%">&nbsp;</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
    <tr id="tr_{id}" class="{class_mar_color}" >
            <td class="item" id="{id}">{query0_p_design}</td>
            <td class="mar_bag {complete}" id="mar_{id}">{query0_p_mar}</td>
            <td class="mar_bag {complete}" id="bag_{id}">{query0_p_bag}</td>
            <td class="num {complete}" id="precio_{id}">{query0_p_precio}</td>
            <td class="item {complete}" id="color_desc_{id}" name="color_desc_{query0_p_mar}" >{query0_p_color_desc}</td>
            <td class="num {complete}" id="each_{id}" id="each_{id}">{query0_p_each_quty}</td>
            <td class="itemc {complete}" id="unit_{id}">{query0_p_unit}</td>
            <td class="item {complete}" id="codigo_{id}" name="codigo_{query0_p_cod}"><a href="javascript:imprimir({query0_p_cod})" style="text-decoration: none"  >{query0_p_cod}</a>&nbsp;<span id="spanfoto_{query0_p_cod}">{sp_foto}&nbsp;<span><img src="images/equal.png" id="clonar_{query0_p_cod}" title="Dividir esta Pieza" style="cursor:pointer" onclick="clonarUI({query0_p_cod})"></span></td>
            <td class="item  {complete}"> <input id="color_{id}"   {state} onblur="checkComplete({id},true)"  type="text" class="color {complete}" value="{query0_p_color}"> </td>
            <td class="num  {complete}">  <input id="quty_ticket_{id}" onfocus="resaltar({id})"   class="numero  {complete}" {state}   onchange="showHeaders(this.id)" type="text" onblur="checkComplete({id},false)" value="{query0_p_qty_ticket}"></td>
            <td class="num {complete}">  <input id="p_kg_{id}" onfocus="this.select();" class="numero  {complete}" onkeyup="checkValue(this);" onchange="checkComplete({id},false)" {state}  type="text" value="{query0_p_kg_real}"> </td>
            <td class="num {complete}">  <input id="p_ancho_{id}" onfocus="this.select();" class="numero  {complete}"  {state} type="text" onchange="checkComplete({id},true)" value="{query0_p_ancho}"> </td>
            <td class="num {complete}">  <input id="p_gram_{id}" onfocus="this.select();" class="numero  {complete}"  {state}  type="text" onchange="checkComplete({id},true)" value="{query0_p_gram}"> </td>
            <td class="itemc"> <input name="print_{query0_p_cod}" type="button" value="{print_value}" onclick="javascript:imprimir({query0_p_cod})" style="font-size:10px" {print_state}>  </td>
            <td class="itemc {complete}"><input style="cursor:pointer" id="foto_{id}" name="foto_{query0_p_cod}" onfocus="this.select();" class="texto  {complete}"  {state}  type="text" onclick="javascript:foto({query0_p_cod},{id})" onchange="checkComplete({id},true)" value="{query0_p_foto}"> </td>
            <td class="itemc {complete}" style="cursor:pointer" onclick="setObs({id})" id="obs_{id}">...</td>
            <td class="itemc {complete}" id="msg_{id}" name="msg_{query0_p_cod}" onclick="checkComplete({id},false)" style="cursor:pointer" title="Click Para Guardar">{msg}</td>
         </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr>
            <td   style="font-size:14px" ><b>&nbsp;&nbsp;Total: {cant_rec}/{cant}</b></td>
            <td></td> 
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td></td>
            <td style="text-align: center" title="Agregar una Fila"> <img  class="mas" onclick="addCode()" src="images/add.png" widht="12px" height="12px"></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align: right;font-size: 12px;padding-right: 2px"><b>{subtotal0_p_each_quty}</b></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align: right;font-size: 12px;padding-right: 2px"><b>{subtotal0_p_qty_ticket}</b></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->

