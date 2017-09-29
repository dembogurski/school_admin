<!-- 
    Report Template File (nota_remision)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
<link rel="stylesheet" type="text/css" href="templates/reports.css" />
        <script type="text/javascript" src="include/jquery.js" > </script>
	<treset_page>
            
 
            
<script language="javascript">  
	var flagKg = false;
        var PORCENTAJE = 2;  // 2%
        var intentos = 0;
        var gramaje = 0;
        var ancho = 0;
        var mts = 0;
        var mts_min = 0;
        var mts_max = 0;
        var limite_min_ajuste = 0;
        var limite_max_ajuste = 0;
        var ajuste = 0;
        var tara = 0;
        var kg_env = 0;
        var mts_calc = 0;
        var PORCENTA_TOLERANCIA = 2; 
        
        function scrollWindows(pixels) {
            $('html,body').animate({
                scrollTop: pixels
            }, 250);
        } 
        function cerrarPopup(){   
            $("#message").html('<img  onclick="cerrarPopup()" style="float:right;cursor:pointer;" src="images/12-em-cross.png" />');
            $("#message").animate({ opacity:0 }, "slow");     $("#message").css("height","0px");
        }
        function limpiar(){   
            $("#message").html('');	
            $("#message").animate({ opacity:0 }, "fast");    
        }
 
        $(window).scroll(function(){
            $('#message').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
        });            
        function aparecerRemp(id){
            $("#"+id).css("display","block");
        } 
        function desaparecerRemp(id){
           $("#"+id).css("display","none");
        }
        function getCookie(cname) {
            var name = cname + "=";
            var ca = document.cookie.split(';');
               
            for(var i=0; i < ca.length; i++) {
                       var c = $.trim(ca[i]);
                if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
            }
            return "";
        }
        function setCoockie(){ 
               var ip = $("#ip").val();
               document.cookie="ip="+ip; 
        }
        
               
        function openPopup(){
             
                 
            
            var html= '<img  onclick="cerrarPopup()" style="float:right;cursor:pointer;" src="images/12-em-cross.png" />\n\
            <b>&nbsp;&nbsp;IP de la Computadora que tiene conectada la Balanza:&nbsp;</b><input type="text" size="15"  id="ip"  style="border:solid lightgray 1px;text-align: center;" onchange="setCoockie()" value=""><br>\n\
            <label>Ingrese el Codigo y el Kilaje del Rollo</label> <br><br>\n\
            <label> Codigo:  </label> \n\ <input class="texto" type="text" maxlength="20" size="12"  id="codigo" value="" onblur="buscarCodigo()" /> \n\
            <label class="kilogramos" style="display:none"> Kg Env:  </label> <input class="kilogramos texto"   style="text-align:center;display:none" readonly type="text"  size="8"  id="kg_env"  value="" >    \n\
            <input type="button" value="Capturar Kg."  onclick="leerDatosBalanza()" style="font-size:20px"  id="boton_kg" disabled="disabled" >\n\
            <label> Kg:  </label> \n\     <input class="texto" style="text-align:center" type="text" maxlength="20" size="8" readonly  id="kg" value="" /> \n\
            <input type="button" value="Guardar" onclick="guardar()" style="font-size:20px"  id="guardar" disabled="disabled" > \n\
            <br><br><div id="msg"></div>';         
                    
            $("#message").html( html );
            $("#message").animate({ opacity:100 }, 1000);   
            $("#message").css("height","250px");
            
            setTimeout(' $("#codigo").focus();',1000);
            $("#codigo").select(); 
            $("#codigo").keyup(function (e) {
               if (e.keyCode == 13) { 
                   $("#kg").focus();   $("#kg").select();                      
               }
            });
            $("#kg").keyup(function (e) {
               if (e.keyCode == 13) { 
                   $("#boton_kg").focus();                   
               }
            });
            var anterior = getCookie("ip"); 
            if(anterior != ""){   
                 $("#ip").val(anterior);
            }else{
                 $("#ip").val( $("#ip_").val() );    
            }         
        }
        
        function buscarCodigo(){
	   var trustedUsers = /^(alfredo|aliciac|normab|jack|Developer|RocioL){1}$/gi;
           var codigo = $("#codigo").val(); 
           if ($("#tr_"+codigo).length) { 
               
                gramaje = $("#tr_"+codigo).attr("data-gramaje");
                ancho = $("#tr_"+codigo).attr("data-ancho");
                mts = parseFloat($("#tr_"+codigo).attr("data-mts"));
                mts_min = ((mts - ( mts * PORCENTA_TOLERANCIA / 100))).toFixed(2);
                mts_max = ((mts + ( mts * PORCENTA_TOLERANCIA / 100))).toFixed(2);
                limite_min_ajuste = ((mts - ( mts * 30 / 100))).toFixed(2);
                limite_max_ajuste = ((mts + ( mts * 30 / 100))).toFixed(2);
                ajuste =  $("#tr_"+codigo).attr("data-ajuste");
                tara =  $("#tr_"+codigo).attr("data-tara");
                kg_env =  $("#tr_"+codigo).attr("data-kg");
                if(tara == null){
                  tara = 0;    
                }    
                var mostrar = "inline";
                if(ajuste == "1"){
                    $(".kilogramos").fadeOut();                   
                }else{
                    $("#kg_env").val(kg_env);
                    $(".kilogramos").fadeIn();
                    $("#tara").val("0");
                     mostrar = "none;";
                }
               
		$("#boton_kg").removeAttr('disabled');
                var descrip = $("#desc_"+codigo).html();
			  
                var edP = /(rectangular){1,3}.*(navidenho|estampado){1,3}/gi;//Patrones que permiten edicion
                if(edP.exec(descrip) != null || trustedUsers.exec($.trim($("#user").text())) != null){
                        $("#kg").removeAttr("readonly");
                        //setTimeout('$("#guardar").removeAttr("disabled");',100);
                        flagKg = true;
                }else{
                        $("#kg").attr("readonly","readonly");
                        //$("#guardar").attr("disabled","true");
                        flagKg = false;
                }
			  
                $(".found").removeClass();
                $("#tr_"+codigo).removeClass("complete");
                $("#tr_"+codigo).addClass("found");
                $("#msg").html("<label style='color:black;display:"+mostrar+"'>Mts.:</label> \n\
                <input type='text' readonly='readonly' value='"+mts+"' id='cant_actual' size='6' style='font-size:18px;text-align:center;display:"+mostrar+"'>   \n\
                <label style='color_black;display:"+mostrar+"'>Gramaje:</label> <input type='text' readonly='readonly' value='"+gramaje+"' size='6' style='font-size:18px;text-align:center;display:"+mostrar+"'> \n\
                <label style='color_black;display:"+mostrar+"'>Ancho:</label> <input type='text' readonly='readonly' value='"+ancho+"' size='6' style='font-size:18px;text-align:center;display:"+mostrar+"'> \n\
                <label style='color_black;display:"+mostrar+"'>Mts Calc:</label> <input type='text' id='mts_calc' readonly='readonly' value='' size='6' style='font-size:18px;text-align:center;display:"+mostrar+"'> \n\
                <img src='images/ok.png'> <br><br> <label style='color:blue;font-size:22px;'>"+descrip+"</label>\n\
                <div id='msg2'></div>");
                    
                var p = $("#tr_"+codigo );
                var position = p.position();
                var windowHeight = $(window).height(); 
                scrollWindows(position.top - ( windowHeight / 2)); 
               
           }else if(codigo == ""){
             $("#msg").html("<label style='font-size:18px;color:red'>...</label>    ");
           } else {
              $("#msg").html("<label style='font-size:18px;color:red'>Codigo no encontrado en esta remision...</label> <img src='images/error.png' width='18px' height='18px'> ");
			  $("#boton_kg").attr('disabled','disabled');
			  //$("#guardar").attr('disabled','disabled');
           } 
        }
        
        function leerDatosBalanza(){
             intentos++;          
             var ip_domain = $("#ip").val();
             $("#msg2").html("<img src='images/working.gif' width='24' height='24' > &nbsp;&nbsp;Conectado con: "+ip_domain+"...    "+intentos);  
             $("#kg").val("- - - - - - - - -");
                    $.ajax({
                        url : "http://"+ip_domain+"/serial/Indicador_LR22.php",
                        dataType:"jsonp",
                        jsonp:"mycallback", 
                    
                        success:function(data){
                            var dato = data.peso;
                            var estado = data.estado;
                            $("#kg").val(dato);
                            $("#guardar").attr("disabled",true);
                            if(estado == "estable"){
                                if(dato == ""){
                                    if(intentos < 5){
                                       leerDatosBalanza();
                                    }else{
                                      $("#msg2").html("<label style='color:red;font-size:24px'>ERROR... </label>No se puede conectar con la balanza...");
                                      intentos = 0;
                                    }
                                     
                                }else{
                                    var mts_calc = ((dato * 1000) /(gramaje * ancho));
                                    if(ajuste == "1"){
                                        mts_calc = ((  (dato -(tara / 1000)) * 1000) / (gramaje * ancho));  
                                    }    
                                    
                                    
                                    $("#mts_calc").val( (mts_calc).toFixed(2) );
                                    
                                    
                                    // Si tiene o no Ajuste
                                    if(ajuste == "1"){
                                        var diff = (mts_calc - mts ).toFixed(2);           

                                        if(mts_calc < mts_min){
                                           $("#msg2").html("Leido...     <label style='color:green;font-size:24px'>Estable</label> <label style='color:red;font-size:24px'>("+diff+") Fuera de Rango (Medir y Ajustar) 1 </label"); 

                                        }else if(mts_calc > mts_max){
                                           $("#msg2").html("Leido...     <label style='color:green;font-size:24px'>Estable</label> <label style='color:red;font-size:24px'>("+diff+") Fuera de Rango (Medir y Ajustar) 2</label");                                                                                                                    
                                        }else{                                        
                                           $("#msg2").html("Leido...     <label style='color:green;font-size:24px'>Estable</label> Ok");
                                        }
                                        intentos = 0;
                                        $("#guardar").removeAttr("disabled");
                                   }else{ // Si no tiene ajute comparo los Kgs de Envio contra el de Recepcion
                                        var kg_min = parseFloat(kg_env - (( kg_env * PORCENTA_TOLERANCIA) / 100) ).toFixed(3);                                         
                                        var kg_max = parseFloat(kg_env) + (( parseFloat(kg_env) * PORCENTA_TOLERANCIA) / 100);   
                                        var diff = (dato - kg_env ).toFixed(2);
                                        
                                        if(parseFloat(dato) < kg_min){
                                            $("#msg2").html("Leido...     <label style='color:green;font-size:24px'>Estable</label> <label style='color:red;font-size:24px'>Fuera de Rango sobre Kg de Envio: "+kg_env+" kg  Dif.: "+diff+" kg </label");                                                                                                                       
                                        }else if(parseFloat(dato) > kg_max){
                                            $("#msg2").html("Leido...     <label style='color:green;font-size:24px'>Estable</label> <label style='color:red;font-size:24px'>Fuera de Rango sobre Kg de Envio: "+kg_env+" kg  Dif.:+"+diff+" kg </label");                                                                                                                       
                                        }else{
                                            $("#msg2").html("Leido...     <label style='color:green;font-size:24px'>Estable</label> Ok");
                                        }
                                   }    
                                } 
                                if(dato > 0){
                                  $("#guardar").removeAttr("disabled");
                                  $("#guardar").focus();
                                } 
                            }else{
                              $("#guardar").attr("disabled","true");  
                              $("#msg2").html("Leido...        <label style='color:red;font-size:24px'>Inestable</label>");
                            }
                        }
                    });                
       }  
       
       
       function guardar(){
           var codigo = $("#codigo").val(); 
           var destino = $("#destino").val(); 
            
		   var mts_calc = parseFloat( $("#mts_calc").val() ).toFixed(2);
		   
           if(isNaN(codigo) || codigo == ""){
               alert("El codigo '"+codigo+"'  no parece ser un Número. Por Favor verifique y vuelva a intentarlo...");
              return;
           }    
           var kg = $("#kg").val(); 
              
           
           if(isNaN(kg) || kg == ""){
               alert("El Kg '"+kg+"'  no parece ser un Número. Por Favor verifique y vuelva a intentarlo...");
           }else if(kg > 100 && !flagKg){
               alert("El Kg '"+kg+"'  no debería ser mayor a 150 Kg. Por Favor verifique y vuelva a intentarlo...");   
           }else{  
               
                var nro_remito = $("#nro_remito").val();
                if(codigo > 0){
                 $.ajax({
                         type: "POST",
                         url: "include/Ajax.class.php",
                         data: "action=guardar_kg_en_remito_recibir&codigo="+codigo+"&kg="+kg+"&nro_remito="+nro_remito+"&destino="+destino+"&mts_calc="+mts_calc,
                         async:true,
                         dataType: "html",
                         beforeSend: function(objeto){                 
                             $("#msg").html("<b><label style='font-size:18px;color:green'>Procesando...</label> <img src='images/search2.gif'></b> "); 
                             $("#kgr_"+codigo).html(kg);
                             $("#estador_"+codigo).html("<img src='images/search2.gif'>");                        
                         },
                         complete: function(objeto, exito){
                             if(exito=="success"){                          
                                 $("#msg").html( objeto.responseText+"...   Ultimo codigo guardado "+codigo  );  
                                  
                                 $(".found").removeClass();
                                 $("#tr_"+codigo).addClass("complete");
                                 $("#codigo").val("");
                                 $("#codigo").focus();
                                 $("#kg").val("");      
                                  
                                 var kge = parseFloat(   $("#kg_"+codigo).text().replace(",","."));  
                                 var kg10 = (kge * PORCENTAJE) / 100;
         
                                 var alerta = "";
                                 if( ( kg  < (kge - kg10 ) ) || (  kg > (kge + kg10 )    )){
                                    alerta = "&nbsp;<img src='images/dialog-warning.png' height='18' width='18' title='Margen de error sobrepasa el 10%'>";
                                 }   
                                 $("#estador_"+codigo).html("<img src='images/ok.png'>"+alerta);
                             }
                         }
                    }); 
                }
           }
        }
        function finalizar(){
            window.location.reload();
        }
       
       $(document).ready(function(){
          openPopup();
       });
                                                
                        
              
    </script>  
            
    <style type="text/css">

    .message{
        position: absolute;
        top: 0;
        z-index: 10;
        background:#ffc;
        padding:5px;
        border:1px solid #CCCCCC;
        text-align:center;
        font-weight:bold;
        width: 80%;
        height: 1px;
        margin-top: 100px;
        margin-left: 10%;
        margin-right: 10%;  
    }
    label{
        font-size: 24px;
    }
    .texto{
        font-size: 26px;
        font-weight: bolder;
        color:green;
    }
    .found{
        background-color: orange;
    }
    .complete{
        background-color: lightblue;
    }
</style>       
         
<div id="message" class="message"  style="opacity:0;"    >   </div> 

<!-- end:   general_header -->


<!-- begin: start_query0 -->
<input type="hidden" value="{nro_remito}" id="nro_remito" />
<input type="hidden" value="{destino}" id="destino" />
<table style="text-align: left; width: 100%;" border="1" cellpadding="0" cellspacing="0">
    
 <!-- Header-->     
 <tr> 
 
   <td colspan="4" >
	   <table border="0"   cellpadding="0" cellspacing="0" width="100%" >	
		   <tr>      
			  <td height="90%"  align="center" colspan="3" >  <font face="Arial" style="bold" size="23">  Marijoa  </font>  </td>			 
		   </tr>
		   <tr>
           
                       <td colspan="4">
		       <hr>
			   <table border="0" cellpadding="2" cellspacing="0" width="100%" >		  
		 		<tr>
		       <tr>
		         <td ><b> Origen: </b> {sup_rem_dir_origen} &nbsp;  &nbsp; &nbsp;<b>  Destino: </b> {sup_rem_dir_destino}   </td>
		       </tr>
		 		
                       <td> <b> Responsable: </b> {sup_rem_func_nombre}    </td>
			   </tr>		             			       
			   </table>
			   
		  </td>
		  </tr>      
	       	   
	   </table>
 	</td>
 
 	
 	
 <td colspan="3">
	<table align="center"  border="0"  cellpadding="0" cellspacing="4" width="100%"  >	
		<tr>	   
		   <td colspan="3"> <big> <big> <big>   Nota de Remisi&oacute;n  </big>  </big> </big>    </td>	
		   
		</tr>	
		<tr>
		  <td colspan="3"><b>N&deg; </b> {sup_rem_nro}  </td>
		</tr>
		<tr>
                    <td colspan="3"><b>Fecha: </b> {fecha_aper} &nbsp;&nbsp;&nbsp;<b>Fecha Cierre:</b> {fecha_cierre} </td>
		</tr>
                <tr>
		  <td colspan="3"><b>Estado </b> {sup_rem_estado} &nbsp;&nbsp;&nbsp;&nbsp; <input type="button" onclick="openPopup()" id="recibir" value="Recibir" ></td>
		</tr>
                  
	</table>

 </td>


</tr>
<!-- end:  header  start_query0 -->

<!-- begin: header0 -->
	<tr>
	 <td align="center" colspan="7">    <b> Detalle </b>  </td>
	</tr>
    <tr>
        <th align="center">C&Oacute;DIGO</th>
        <th align="center">DESCRIPCION</th>
        <th width="10%" align="center">CANT. Mts</th>
	<th width="10%" align="center">Kg. Enviado</th>  
        <th width="10%" align="center">Kg. Recibido</th>
	<th width="10%" align="center">ENVIADO</th>   
        <th width="10%" align="center">RECIBIDO</th>   
    </tr>
  
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <tr  id="tr_{query0_CODIGO_PRODUCTO}" {fondo} data-gramaje="{query0_GRAMAJE}" data-ancho="{query0_ANCHO}" data-mts="{query0_CANTIDAD}" data-kg="{query0_KG}" data-tara="{query0_TARA}" data-ajuste="{query0_AJUSTE}">
            <td class="item" style="text-align: center;width:12%;height:22px"   >{query0_CODIGO_PRODUCTO}   </td>
            <td class="item" id="desc_{query0_CODIGO_PRODUCTO}">{query0_DESCRIPCION}</td>
            <td class="num" style="text-align: center;width: 10%">{query0_CANTIDAD}</td> 
            <td class="item" style="text-align: center;width: 10%" id="kg_{query0_CODIGO_PRODUCTO}">{query0_KGE}</td>
            <td class="item" style="text-align: center;width: 10%" id="kgr_{query0_CODIGO_PRODUCTO}">{query0_KGR}</td>
            
	    <td class="item" style="text-align: center;width: 4%" id="estado_{query0_CODIGO_PRODUCTO}">{query0_ENVIADO}</td>
            <td class="item" style="text-align: center;width: 4%" id="estador_{query0_CODIGO_PRODUCTO}">{query0_RECIBIDO}</td>
        </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
   	<tr>
           <td colspan="5"> <b>Cantidad de Items: <big>{cant}~~~&nbsp;&nbsp;Items Recibidos {punteados}</big>~~~~~ </b> </td>            	 
        </tr> 
        <tr>
            <td  colspan="5">
                <table border="0" style="width:100%">

            	
            	 <tr>
                     <td > <b>Observaciones:</b>{remps}&nbsp; {sup_rem_obs}.....................................................................................................................................................................................................  </td>            	 
            	 </tr> 
             	 <tr>
            	   <td >................................................................................................................................................................................................................................  </td>            	 
            	 </tr>   
            	 <tr>
            	   <td style="text-align: center;"> <small><small><span id="user">{user}</span> - {time}</small></small>	<small><small>ycube plus RAD [1.2.9]</small></small>		  </td> 
            	 </tr>
            	  
            	</table>
            
            </td>
             
            <td></td>
            <td></td>
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>            
            <td></td>
            <td></td>
            <td></td>
        </tr>

      <!--  -->
      <!-- <td> 	  </td> -->
<!-- begin: end_query0 -->



</table>
 <div id="dato_directo" style="visibility: hidden"><div>
         <input type="hidden" id="ip_" value="{ip_}">        
<!-- end:   end_query0 -->

