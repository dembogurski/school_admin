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
        var intentos = 0; 
        var gramaje = 0;
        var ancho = 0;
        var mts = 0;
        var mts_min = 0;
        var mts_max = 0;
        var limite_min_ajuste = 0;
        var limite_max_ajuste = 0;
        var tara = 0;
        var kg_desc = 0;
        var ajuste = 0;
        var bordado = 0;
        var PORCENTA_TOLERANCIA = 2 ;
        
                
        function scrollWindows(pixels) {
            $('html,body').animate({
                scrollTop: pixels
            }, 250);
        } 
        function cerrarPopup(){           
            $("#message").animate({ opacity:0 }, "slow");
			$("#message").css("z-index","-1")
        }
        function limpiar(){   
            //$("#message").html('');	
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
			$("#message").css("z-index","10")
            $("#message").animate({ opacity:100 }, 1000);
			
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
        function updateTara(){
			$("#tara_val").html(eval($("#tara option:selected").val())+" gramos.");
        }
    function buscarCodigo(){
	   var trustedUsers = /^(alfredo|aliciac|normab|jack|Developer|RocioL){1}$/gi;
	   $($("#tara option").get(0)).attr("selected","selected");
	   updateTara();
           var codigo = $("#codigo").val(); 
           if ($("#tr_"+codigo).length) {                
               
                gramaje = $("#tr_"+codigo).attr("data-gramaje");
                ancho = $("#tr_"+codigo).attr("data-ancho");
                mts = parseFloat($("#tr_"+codigo).attr("data-mts"));
                ajuste = $("#tr_"+codigo).attr("data-ajuste");
                kg_desc = parseFloat($("#tr_"+codigo).attr("data-kg")).toFixed(2);
                bordado = $("#tr_"+codigo).attr("data-bordada"); 
                
                mts_min = ((mts - ( mts * PORCENTA_TOLERANCIA / 100))).toFixed(2);
                mts_max = ((mts + ( mts * PORCENTA_TOLERANCIA / 100))).toFixed(2);
                limite_min_ajuste = ((mts - ( mts * 99 / 100))).toFixed(2);
                limite_max_ajuste = ((mts + ( mts * 99 / 100))).toFixed(2);
                
                var mostrar = "table";
                if(ajuste == "1"){
                   $(".descarga").fadeOut();
                }else{
                    $("#kg_desc").val(kg_desc);
                    $(".descarga").fadeIn();
                    $("#tara").val("0");
                    $(".tara").fadeOut();
                     mostrar = "none;";
                }
                
                
				$("#boton_kg").removeAttr('disabled');
                var descrip = $("#desc_"+codigo).html();
			  
                var edP = /(rectangular){1,3}.*(navidenho|estampado){1,3}/gi;//Patrones que permiten edicion
                if(edP.exec(descrip) != null || trustedUsers.exec($.trim($("#user").text())) != null){
                        $("#kg").removeAttr("readonly");
                        setTimeout('$("#guardar").removeAttr("disabled");',100);
                        flagKg = true;
                }else{
                        $("#kg").attr("readonly","readonly");
                        $("#guardar").attr("disabled","true");
                        flagKg = false;
                }
			  
                $(".found").removeClass();
                $("#tr_"+codigo).removeClass("complete");
                $("#tr_"+codigo).addClass("found");
				var cabecera = "<table style='display:"+mostrar+"'>";
				var cuerpo = "<tr><td>Mts:&nbsp;<input type='text' readonly='readonly' value='"+mts+"' id='cant_actual' size='6' style='font-size:16px;text-align:center;'></td>"+
				"<td>Gram:&nbsp;<input type='text' readonly='readonly' value='"+gramaje+"' size='6' style='font-size:16px;text-align:center'></td>"+
				"<td>Ancho:&nbsp;<input type='text' readonly='readonly' value='"+ancho+"' size='6' style='font-size:16px;text-align:center'></td>"+
				"<td>Mts.Calc.:&nbsp;<input type='text' id='mts_calc' readonly='readonly' value='' size='6' style='font-size:16px;text-align:center'></td></tr>";
				var pie = "<tr><td colspan='4'><label style='color:blue;font-size:22px;'>"+descrip+"</label><div id='msg2'></div></td></tr></table>";
                $("#msg").html(cabecera+cuerpo+pie);
				$("#verif").show();
                var p = $("#tr_"+codigo );
                var position = p.position();
                var windowHeight = $(window).height(); 
                scrollWindows(position.top - ( windowHeight / 2)); 
               
           }else if(codigo == ""){
                $("#msg").html("<label style='font-size:18px;color:red'>...</label>    ");
           } else {
                $("#msg").html("<label style='font-size:18px;color:red'>Codigo no encontrado en esta remision...</label> <img src='images/error.png' width='18px' height='18px'> ");
				$("#verif").hide();
				$("#boton_kg").attr('disabled','disabled');
				$("#guardar").attr('disabled','disabled');
           } 
        }
 
        function leerDatosBalanza(){
             intentos++;     
             var ip_domain = $("#ip").val();
             $("#msg2").html("<img src='images/working.gif' width='24' height='24' > &nbsp;&nbsp;Conectado con: "+ip_domain+"...    ");  
             $("#kg").val("- - - - - - - - -");
                    $.ajax({
                        url : "http://"+ip_domain+"/serial/Indicador_LR22.php",
                        dataType:"jsonp",
                        jsonp:"mycallback", 
                        success:function(data){
                            var dato = parseFloat(data.peso).toFixed(3);
                            var estado = data.estado;
                            tara = $("#tara").val();
                            
                            if(estado == "estable"){
                                if(dato == ""){
                                   if(intentos < 5){
                                       leerDatosBalanza();
                                   }else{
                                      $("#msg2").html("<label style='color:red;font-size:24px'>ERROR... </label>No se puede conectar con la balanza...");
                                      intentos = 0;
                                   }
                                }else{
                                    if(ajuste == "1"){  
                                        
                                        $("#kg").val(dato);
                                        dato = dato - (tara / 1000);
                                        
                                        var mts_calc = ((dato * 1000) /(gramaje * ancho));
                                        $("#mts_calc").val( (mts_calc).toFixed(2) );
                                        // Si difiere del 2% Error no dejar guardar
                                          //habilitarGuardar(dato);
                                        if(mts_calc < mts_min){   
                                            desabilitarGuardar();
                                            var diff = (mts_calc - mts ).toFixed(2);       
                                            var mts2dec = (mts_calc).toFixed(2);
                                            if( mts_calc  < limite_min_ajuste ){
                                                $("#msg2").html("<label style='color:black;font-size:22px'>Leido...</label> <label style='color:green;font-size:22px'>Estable&nbsp;</label> <label style='color:red;font-size:22px'>Fuera de Rango. Atencion! Gramaje o Ancho Incorrecto verifique y Corrija 1.</label>");                                 
                                            }else{
                                                $("#msg2").html("<label style='color:black;font-size:22px'>Leido...</label> <label style='color:green;font-size:22px'>Estable&nbsp;</label> <label style='color:red;font-size:22px'>Fuera de Rango (2%) : "+diff+"</label>&nbsp;&nbsp;<input type='button' value='Ajustar a "+mts2dec+" Mts' style='font-size:18px' onclick='ajustar()' disabled>");                                    
                                            }

                                        }else if(mts_calc > mts_max){
                                            desabilitarGuardar(); 
                                            var diff = (mts_calc - mts ).toFixed(2);
                                            var mts2dec = (mts_calc).toFixed(2);
                                            if(mts_calc > limite_max_ajuste    ){
                                                 $("#msg2").html("<label style='color:black;font-size:22px'>Leido...</label> <label style='color:green;font-size:22px'>Estable&nbsp;</label> <label style='color:red;font-size:22px'>Fuera de Rango. Atencion! Gramaje o Ancho Incorrecto verifique y Corrija 2</label>");
                                            } else{  
                                                 $("#msg2").html("<label style='color:black;font-size:22px'>Leido...</label> <label style='color:green;font-size:22px'>Estable&nbsp;</label> <label style='color:red;font-size:22px'>Fuera de Rango (2%) : "+diff+"</label>&nbsp;&nbsp;<input type='button' value='Ajustar a "+mts2dec+" Mts' style='font-size:18px' onclick='ajustar()' disabled>"); 
                                            }     

                                        }else{ // Dentro del Rango                                      
                                            habilitarGuardar(dato);
                                            $("#msg2").html("<label style='color:black;font-size:22px'>Leido...</label> <label style='color:green;font-size:22px'>Estable&nbsp;</label>"); 
                                        }
                                    }else{
                                        $("#kg").val( dato );
                                        var kg_min = parseFloat(kg_desc - (( kg_desc * PORCENTA_TOLERANCIA) / 100) ).toFixed(3);                                         
                                        var kg_max = parseFloat(kg_desc) + (( parseFloat(kg_desc) * PORCENTA_TOLERANCIA) / 100);  
                                        var diff = (dato - kg_desc ).toFixed(2);
                                        tara = $("#tara").val();
                                                                                
                                        //console.log(kg_min+"  "+kg_max);
                                        
                                        var mts_calc = ((dato * 1000) /(gramaje * ancho)).toFixed(2);
                                        $("#mts_calc").val(mts_calc);
                                         
                                        if(gramaje != "1.00" && kg_desc > 0 /** && bordado != "1" */){   // Si gramaje = 1 = Piedras patas de sofa etc no se grama y si kilaje de descarga = 0 quiere decir que fue fraccionado ahi y no fue descargado                                     
                                            if(parseFloat(dato) < parseFloat(kg_min)){ 
                                                desabilitarGuardar();                                                                                          
                                                $("#msg2").html("<label style='color:black;font-size:22px'>Leido...</label> <label style='color:green;font-size:22px'>Estable&nbsp;</label> <label style='color:red;font-size:22px'>Kilaje Fuera de Rango del 2% Sobre Descarga ("+kg_desc+" Kg) : Dif.: "+diff+" Kg</label>"); 
                                            }else if(parseFloat(dato) > parseFloat(kg_max)){  
                                                desabilitarGuardar();                                              
                                                $("#msg2").html("<label style='color:black;font-size:22px'>Leido...</label> <label style='color:green;font-size:22px'>Estable&nbsp;</label> <label style='color:red;font-size:22px'>Kilaje Fuera de Rango del 2% Sobre Descarga ("+kg_desc+" Kg) : Dif.: +"+diff+" Kg</label>");                                            
                                            }else{
                                               habilitarGuardar(dato);
                                               $("#msg2").html("<label style='color:black;font-size:22px'>Leido...</label> <label style='color:green;font-size:22px'>Estable&nbsp;</label>"); 
                                            }                  
                                        }else{
                                           $("#msg2").html("<label style='color:black;font-size:22px'>Leido...</label> <label style='color:green;font-size:22px'>Estable&nbsp;</label>"); 
                                           habilitarGuardar(dato);
                                        }
                                    }
                                  intentos = 0; 		  
                                } 
                                
                            }else{
                              $("#guardar").attr("disabled","true");  
                              $("#msg2").html("Leido...        <label style='color:red;font-size:24px'>Inestable</label>");
                            }
                        }
                    });                
       }  
       function ajustar(){
          var codigo = $("#codigo").val(); 
          var operador = $("#operador").val();
          var cant_actual = $("#cant_actual").val();
          var mts_calc = $("#mts_calc").val();
          var ajustar = 0;
          var signo = "+";
          var rem_nro = $("#nro_remito").val(); 
          
          if(cant_actual > mts_calc){
             ajustar =   (cant_actual -  mts_calc).toFixed(2);
             signo = "-";
          }else{
             ajustar =   (mts_calc -  cant_actual).toFixed(2);
             signo = "+";
          }  
          
          $.ajax({
                type: "POST",
                url: "include/Ajax.class.php",
                data: {"action":"ajuste_x_remision","operador":operador,"codigo":codigo,signo:signo,cant_actual:cant_actual,mts_calc:mts_calc,ajuste:ajustar,rem_nro:rem_nro}, 
                async:true,
                dataType: "html",
                beforeSend: function(){
                    $("#msg2").html("<img src='img/loading.gif' width='22px' height='22px' >");                      
                }, 
                complete: function(objeto, exito) {
                   if (exito == "success") {                          
                       var result = $.trim(objeto.responseText);                       
                       if(result == "Ok"){
                           $("#cant_"+codigo).html(mts_calc);  
                           $("#msg2").html("<img src='images/ok.png'>");
                           guardar();
                       }else{
                           $("#msg2").html(result);
                           alert(result); 
                            
                       }    
                   }
                },
                error: function() {
                   $("#msg2").html("Ocurrio un error en la comunicacion con el Servidor...");
                }
            });
                  
          
       }
       function habilitarGuardar(dato){
           if(dato > 0){
              $("#guardar").removeAttr("disabled");
              $("#guardar").focus();
           }      
       }
       function desabilitarGuardar(){
           $("#guardar").attr("disabled","true");  
       }
       function guardar(){
           var codigo = $("#codigo").val(); 
           var mts_calc = parseFloat( $("#mts_calc").val() ).toFixed(2);
                 
           
           if(isNaN(codigo)  || codigo == ""){
               alert("El codigo '"+codigo+"'  no parece ser un Número. Por Favor verifique y vuelva a intentarlo...");
              return;
           }    
           var kg = $("#kg").val();  
           if(isNaN(kg) || kg == ""){
               alert("El Kg '"+kg+"'  no parece ser un Número. Por Favor verifique y vuelva a intentarlo...");
           }else if(kg > 150 && !flagKg){
               alert("El Kg '"+kg+"'  no debería ser mayor a 150 Kg. Por Favor verifique y vuelva a intentarlo...");   
           }else{  
               
                var nro_remito = $("#nro_remito").val();
                if(codigo > 0){
                 $.ajax({
                         type: "POST",
                         url: "include/Ajax.class.php",
                         data: "action=guardar_kg_en_remito&codigo="+codigo+"&kg="+kg+"&nro_remito="+nro_remito+"&mts_calc="+mts_calc+"&tara="+tara+"&ajuste="+ajuste,
                         async:true,
                         dataType: "html",
                         beforeSend: function(objeto){                 
                             $("#msg").html("<b><label style='font-size:18px;color:green'>Procesando...</label> <img src='images/search2.gif'></b> "); 
                             $("#kg_"+codigo).html(kg);
                             $("#estado_"+codigo).html("<img src='images/search2.gif'>");                        
                         },
                         complete: function(objeto, exito){
                             if(exito=="success"){                          
                                 $("#msg").html( objeto.responseText+"...   Ultimo codigo guardado "+codigo  );  
                                 $("#estado_"+codigo).html("<img src='images/ok.png'>"); 
                                 $(".found").removeClass();
                                 $("#tr_"+codigo).addClass("complete");
                                 $("#codigo").val("");
                                 $("#codigo").focus();
                                 $("#kg").val("");           
                             }
                         }
                    }); 
                }
           }
        }
        function finalizar(){
            window.location.reload();
        } 
        function actualidadCantidades(nro_remito){
            $.ajax({
                type: "POST",
                url: "include/Ajax.class.php",
                data: {"action":"actualizarCantidadesEnRemito","nro_remito":nro_remito}, 
                async:true,
                dataType: "html",
                beforeSend: function(){
                   // $("#msg").html("<img src='img/loading.gif' width='22px' height='22px' >");                      
                }, 
                complete: function(objeto, exito) {
                    if (exito == "success") {       
                        if( $.trim(objeto.responseText)=="Ok"){
                            window.location.reload();            
                        }else{
                            alert("Ocurrio un Error al intentar actualizar las cantidades Presione F5 e Intente Nuevamente si el Problema Persiste intente corregir manualmente o llame al encargado de Sistemas.");   
                        }   
                    }
                    },
                    error: function() {
                        $("#msg").html("Ocurrio un error en la comunicacion con el Servidor...");
                    }
                }); 
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
        height: auto;
        margin-top: 100px;
        margin-left: 10%;
        margin-right: 10%;  
		min-width:540px;
    }
	table {
		 style: boder: solid black 1px;
		 width: 100%;
	}
	#msg{
		width:100%;
	}
	#msg table tr td input[type="text"]{
		padding:0;
	}
    .titulo {
        font-size: 24px;
		text-align:	center;
    }
	.subTitulo {
		font-size: 18px;
		text-align: center;
	}
	.contenido {
		text-align: center;
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
	.component{
		float: left;
		min-width: 477px;
	}
</style>       
<!-- end:   general_header -->

<!-- begin: msg -->
<div id="message" class="message"  style="opacity:0;">
	<img  onclick="cerrarPopup()" style="float:right;cursor:pointer;" src="images/12-em-cross.png" />
	<b>&nbsp;&nbsp;IP de la Computadora que tiene conectada la Balanza:&nbsp;</b><input type="text" size="15"  id="ip"  style="border:solid lightgray 1px;text-align: center;" onchange="setCoockie()" value=""><br><br>
	<table id="formulario">
		<tr>
			<td colspan="5" class="titulo"><label>Ingrese el Codigo y el Kilaje del Rollo</label></td>
		</tr>
		<tr>			
			<td colspan="5"><span class="tara subTitulo">Tara: <span id="tara_val"></span> </br>
			<span colspan="2" class="contenido"><select id="tara" onchange="updateTara()" class="tara" style="font-size:22px" >{taras}</select></span></td>
		</tr>
		<tr>
			<td class="subTitulo"><img style="display:none" id="verif" src="images/ok.png">&nbsp;C&oacute;digo:&nbsp;<input class="texto" type="text" maxlength="20" size="10"  id="codigo" value="" onblur="buscarCodigo()" /></td>
			<td class="subTitulo"><input type="button" value="Capturar Kg."  onclick="leerDatosBalanza()" style="font-size:20px"  id="boton_kg" disabled="disabled" >:&nbsp;<input class="texto" style="text-align:center" readonly type="text" maxlength="20" size="8"  id="kg"  value="" ></td>			
			<td class="descarga subTitulo" style="display:none">Kg Desc:&nbsp;<input class="descarga texto"   style="text-align:center;display:none" readonly type="text"  size="8"  id="kg_desc"  value="" ></td>
		</tr>		
		<tr>
			<td colspan="5" style="text-align:center"><input type="button" value="Guardar" onclick="guardar()" style="font-size:20px;width:100%"  id="guardar" disabled ></td>
		</tr>
		<tr>
			<td colspan="5"><div id="msg"></div></td>
		</tr>
	</table>
</div> 
<!-- end: msg -->



<!-- begin: start_query0 -->
<input type="hidden" value="{nro_remito}" id="nro_remito" />
<input type="hidden" value="{user}" id="operador" />

<table style="text-align: left; width: 100%;" border="1" cellpadding="0" cellspacing="0">
    
 <!-- Header-->     
 <tr> 
 
   <td colspan="2" >
	   <table border="0"   cellpadding="0" cellspacing="0" width="100%" >	
		   <tr>      
			  <td height="90%"  align="center" colspan="3" >  <font face="Arial" style="bold" size="23">  Marijoa  </font>  </td>			 
		   </tr>
		   <tr>
           
                       <td colspan="2">
		       <hr>
			   <table border="0" cellpadding="2" cellspacing="0" width="100%" >		  
		 		<tr>
		       <tr>
		         <td ><b> Origen: </b> {sup_rem_dir_origen} &nbsp;  &nbsp; &nbsp;<b>  Destino: </b> {sup_rem_dir_destino}   </td>
		       </tr>
		 		
                       <td> <b> Responsable: </b> {sup_rem_func_nombre}  &nbsp;&nbsp;&nbsp;&nbsp; <input type="button" onclick="openPopup()" value="Puntear y Pesar" > </td>
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
		  <td colspan="3"><b>Estado </b> {sup_rem_estado}  </td>
		</tr>
                
                
			
	</table>

 </td>


</tr>
<!-- end:  header  start_query0 -->

<!-- begin: header0 -->
	<tr>
	 <td align="center" colspan="5">    <b> Detalle </b>  </td>
	</tr>
    <tr>
        <th align="center">C&Oacute;DIGO</th>
        <th align="center">DESCRIPCION</th>
        <th width="10%" align="center">CANT. Mts</th>
		<th width="10%" align="center">Kg. Enviado</th>  
		<th width="10%" align="center">ENVIADO</th>   
    </tr>
  
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <tr  id="tr_{query0_CODIGO_PRODUCTO}" {fondo} data-gramaje="{query0_GRAMAJE}" data-ancho="{query0_ANCHO}" data-mts="{query0_CANTIDAD}" data-kg="{query0_KG}" data-ajuste="{ajustes}" data-bordada="{bordada}" >
            <td class="item" style="text-align: center;width:12%;height:22px"   >{query0_CODIGO_PRODUCTO}   </td>
            <td class="item" id="desc_{query0_CODIGO_PRODUCTO}">{query0_DESCRIPCION}</td>
            <td class="num" style="text-align: center;width: 10%" id="cant_{query0_CODIGO_PRODUCTO}">{query0_CANTIDAD}</td> 
            <td class="item" style="text-align: center;width: 10%" id="kg_{query0_CODIGO_PRODUCTO}">{query0_KGE}</td>
	    <td class="item" style="text-align: center;width: 4%" id="estado_{query0_CODIGO_PRODUCTO}">{query0_ENVIADO}</td>
        </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
   	<tr>
           <td colspan="5"> <b>Cantidad de Items: <big>{cant}~~~&nbsp;&nbsp;Items Punteados {punteados}</big>~~~~~ </b> </td>            	 
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
            	   <td style="text-align: center;"> <small><small>{user} - {time}</small></small>	<small><small>ycube plus RAD [1.2.9]</small></small>		  </td> 
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

