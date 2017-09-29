<!-- 
    Report Template File (pedidos_urg_suc)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->


<!-- begin: general_header noeval -->
<script type="text/javascript" src="include/jquery.js" > </script>


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

        width: 60%;
        height: auto;
        margin-top: 0px;
        margin-left: 0%;
        margin-right: 2%;  
    }
</style>


<treset_page>


    <script language="javascript" >
        function ocultar(codigo){
            $("#ventas_"+codigo).fadeOut(3000);  
            $("#"+codigo).css("background","#ffcc33");  
        }
        function verOpciones(fecha,codigo,cantidad,suc,nro_nota){ 
            $("#op_"+codigo).slideToggle(function(){ });  
     
        }
        function checkCode(codigo){ 
            var cod = $("#rem_"+codigo).val();
             
            if(cod.length > 0){
                $("#add_code_"+codigo).attr("disabled",false);  
            }else{
                $("#add_code_"+codigo).attr("disabled",true); 
            }
        }
        function remplazar(codigo,nro_nota){
            
            var remplazo  = $("#cod_rem_"+codigo).val();   
             
          
            $.ajax({
                type: "POST",
                url: "include/Ajax.class.php",
                data: "action=remplazar_codigo&remplazo="+remplazo+"&codigo="+codigo+"&nro_nota="+nro_nota+"",
                async:true,
                dataType: "html",
                beforeSend: function(objeto){
                    $("#cod_rem_"+codigo).val("");
                },
                complete: function(objeto, exito){
                    if(exito=="success"){  
                   
                        $("#cod_rem_"+codigo).val( objeto.responseText  );
                        $("#estado_codigo_"+codigo).html( "En Proceso"  ); 
                        $("#estado_codigo_"+codigo).css("background","#999900");
                        verificarCaracteristicas(codigo,remplazo,nro_nota)
                        verificarEstadoDeNota(nro_nota);
                    
                    }
                }
            });
            
        }
        function verificarCaracteristicas(codigo,remplazo,nro_nota){
            $.ajax({
                type: "POST",
                url: "include/Ajax.class.php",
                data: "action=verificar_caracteristicas&remplazo="+remplazo+"&codigo="+codigo+"&nro_nota="+nro_nota+"",
                async:true,
                dataType: "html",
                beforeSend: function(objeto){ 
                },
                complete: function(objeto, exito){
                    if(exito=="success"){   
                        $("#descrip_"+codigo).css("color",objeto.responseText);
                    }
                }
            })  
        }
        
        function verificarEstadoDeNota(nro_nota){  
            $.ajax({
                type: "POST",
                url: "include/Ajax.class.php",
                data: "action=verificar_estado_nota_pedido&nro_nota="+nro_nota+"",
                async:true,
                dataType: "html",
                beforeSend: function(objeto){
                 /*
                    $("#tabla").find("#estado_nota_"+nro_nota).each(function(){
                        $(this).html("<img src='images/loading.gif' height='10px' width='10px'>"); 
                    }); */
                },
                complete: function(objeto, exito){  
                    if(exito=="success"){ 
                        var color = "#99ff00";  
                   
                        if(objeto.responseText.toString().indexOf("Cerrada") > 0 ){
                            color = "#99ff00";   
                        }else{ 
                            color = "#ffff99";  
                        }  
                       /* $("#tabla").find("#estado_nota_"+nro_nota).each(function(){
                            $(this).html( objeto.responseText  );
                            $(this).css("background",color);  
                        });  */
                    
                    }
                }
            })
        }
        
        function cambiarEstadoCodigo(codigo,nro_nota,est ){    
            var estado = 'Enviado';
            if(est == "0"){
                estado = 'En Proceso';
            }else if(est == "1"){
                estado = 'Enviado'; 
            }else if(est == "3"){
                estado = 'Suspendido';   
            } else{
                estado = 'Pendiente';   
            }
 
             
            $.ajax({
                type: "POST",
                url: "include/Ajax.class.php",
                data: "action=cambiar_estado&codigo="+codigo+"&nro_nota="+nro_nota+"&estado="+estado+"",
                async:true,
                dataType: "html",
                beforeSend: function(objeto){
                    $("#estado_codigo_"+codigo).html("<img src='images/activity.gif' height='9px' width='32px'>");
                },
                complete: function(objeto, exito){
                    if(exito=="success"){  
                        $("#estado_codigo_"+codigo).html( objeto.responseText  );  
                        if(est == "1"){
                            $("#estado_codigo_"+codigo).css("background","#99ff00");  
                        }else if(est == "3"){
                            $("#estado_codigo_"+codigo).css("background","red");  
                        }else{
                            $("#estado_codigo_"+codigo).css("background","#999900");  
                        } 
                        verificarEstadoDeNota(nro_nota);
                    }
                }
            })
            
        }
        function generarRemito(origen,destino,codigo,user,nro_nota){ 
            $.ajax({
                type: "POST",
                url: "include/Ajax.class.php",
                data: "action=generar_remito&codigo="+codigo+"&origen="+origen+"&destino="+destino+"&usuario="+user+"&nro_nota="+nro_nota+"",
                async:true,
                dataType: "html",
                beforeSend: function(objeto){
                    $("#remitos_abiertos_"+codigo).html("<img src='images/activity.gif' height='9px' width='32px'>");
                },
                complete: function(objeto, exito){
                    if(exito=="success"){                 
                        $("#remitos_abiertos_"+codigo).html(objeto.responseText);
                    }  
                }
            })
        } 
        function verRemitosAbiertos(origen,destino,codigo, user,nro_nota){ 
            $.ajax({
                type: "POST",
                url: "include/Ajax.class.php",
                data: "action=ver_remitos_abiertos&codigo="+codigo+"&origen="+origen+"&destino="+destino+"&usuario="+user+"&nro_nota="+nro_nota+"",
                async:true,
                dataType: "html",
                beforeSend: function(objeto){
                    $("#remitos_abiertos_"+codigo).html("<img src='images/activity.gif' height='9px' width='32px'>");
                },
                complete: function(objeto, exito){
                    if(exito=="success"){    
                        $("#remitos_abiertos_"+codigo).html(objeto.responseText);
                    }  
                }
            })  
        }
        function verRemitosAbiertosMultiple(origen,destino,codigo, user,nro_nota){ 
            $.ajax({
                type: "POST",
                url: "include/Ajax.class.php",
                data: "action=ver_remitos_abiertos_multiple&codigo="+codigo+"&origen="+origen+"&destino="+destino+"&usuario="+user+"&nro_nota="+nro_nota+"",
                async:true,
                dataType: "html",
                beforeSend: function(objeto){
                    $("#remitos_abiertos_"+codigo).html("<img src='images/activity.gif' height='9px' width='32px'>");
                },
                complete: function(objeto, exito){
                    if(exito=="success"){    
                        $("#remitos_abiertos_"+codigo).html(objeto.responseText);
                    }  
                }
            })  
        }
        function insertarEnRemitoMultiple(nro_remito,origen,destino){
              
            $('[id^=check_]').each(function(){
                var thisid = $(this).attr('id');  
                var checked = $('#'+thisid).is(':checked'); 
                if(checked){
                    var codigo =   thisid.substring(6,18);  
                    var cantidad =  $("#cant_"+codigo).html(); 
                    insertarEnRemito(nro_remito,codigo,origen,destino,cantidad);   
                }                               
            }); 
        }
        
        function insertarEnRemito(nro_remito,codigo,origen,destino,cantidad){
            var code = codigo;   
            var c  = $("#cod_rem_"+codigo).val();  
            if(c != ""){
                code = c; 
            }else{
                code = codigo;  
            } 
         
            $.ajax({
                type: "POST",
                url: "include/Ajax.class.php",
                data: "action=insertar_en_remito&codigo="+code+"&nro_remito="+nro_remito+"&origen="+origen+"&destino="+destino+"&cantidad="+cantidad,
                async:true,
                dataType: "html",
                beforeSend: function(objeto){ 
                    $("#insbutton_"+nro_remito).attr("disabled",true);
                    $("#msg_"+codigo).html("<img src='images/activity.gif' height='9px' width='32px'>");
                },
                complete: function(objeto, exito){
                    if(exito=="success"){    
                        if(  $.trim( objeto.responseText)  == "true"){
                           $("#msg_"+codigo).html("Ok");
                           //var val = $("#cant_"+nro_remito).html();
                           $("#cant_"+nro_remito).html("<img src='images/star.png' height='16px' width='16px'>");
                     
                           //Marcar como en Proceso
                     
                           document.getElementById("boton_enviado_"+codigo).click(); 
                        }else{
                            alert("Codigo "+codigo+" no pudo ser insertado en el remito Nro: "+nro_remito);
                        } 
                    }  
                }
            })  
        }
        
        function finalizarRemito(nro_remito,nro_nota){
            $.ajax({
                type: "POST",
                url: "include/Ajax.class.php",
                data: "action=finalizar_remito&nro_remito="+nro_remito+"&nro_nota="+nro_nota+"",
                async:true,
                dataType: "html",
                beforeSend: function(objeto){ 
                  
                    // $("#msg_"+codigo).html("<img src='images/activity.gif' height='9px' width='32px'>");
                },
                complete: function(objeto, exito){
                    if(exito=="success"){    
                        alert("Ok!!!");
                        document.getElementById("ab_"+nro_nota).click();
                     
                        verificarEstadoDeNota(nro_nota); 
                    }  
                }
            })  
        }
        function contenidoRemito(nro_remito){
            $.ajax({
                type: "POST",
                url: "include/Ajax.class.php",
                data: "action=contenido_remito&nro_remito="+nro_remito+"",
                async:true,
                dataType: "html",
                beforeSend: function(objeto){  
                    abrirPopup("<img src='images/activity.gif' height='9px' width='32px'>");
                },
                complete: function(objeto, exito){
                    if(exito=="success"){  
                        abrirPopup(objeto.responseText)
                    }  
                }
            })  
        }
       function historialTranslados(codigo){
            var code = codigo;   
            var c  = $("#cod_rem_"+codigo).val();  
            if(c != ""){
                code = c; 
            }else{
                code = codigo;  
            }
       
            $.ajax({
                type: "POST",
                url: "include/Ajax.class.php",
                data: "action=historial_translados&codigo="+code+"",
                async:true,
                dataType: "html",
                beforeSend: function(objeto){  
                    abrirPopup("<img src='images/activity.gif' height='9px' width='32px'>");
                },
                complete: function(objeto, exito){
                    if(exito=="success"){  
                        abrirPopup(objeto.responseText)
                    }  
                }
            })  
        }
        
        function cerrarRemito(nro_remito,nro_nota){ 
             
            if(confirm("Confirme que desea Finalizar el remito Nº "+nro_remito+" ?")) {
                finalizarRemito(nro_remito,nro_nota);
            } else {
                alert("Ok, ya se que no deseas finalizar este remito...");
            }
            
        }
         
        function setIcon(codigo,nro_nota){
            var checked = $("#check_"+codigo).is(':checked'); 
          
            if(checked){
                $("#icon_check_"+codigo).html('<img src="images/ok.png" border="0">');
                cambiarEstadoCodigo(codigo,nro_nota,0 );
            }else{
                $("#icon_check_"+codigo).html('');
                cambiarEstadoCodigo(codigo,nro_nota,4 );
            } 
           
           
           
        }
        function puntear(){
            $("#fila_punteo").slideToggle(function(){});   
        }
        
        // Flotante
 
        function abrirPopup(obj){   
            $("#message").html( obj );
            $("#message").animate({ opacity:100 }, 2000);  
        }
   
        function cerrarPopup(){   
            $("#message").html('<img  onclick="cerrarPopup()" style="float:right;cursor:pointer;" src="images/12-em-cross.png" />');
            $("#message").animate({ opacity:0 }, "fast");    
        }
        function limpiar(){   
            $("#message").html('');	
            $("#message").animate({ opacity:0 }, "fast");    
        }
           /**
        $(window).scroll(function(){
             $('#message').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
        });	  */
        
    </script>



    <style>

        .message{
          opacity: 0;
          max-height: 98%;
          position: fixed;
          top: 5px;
          left: 5px;
          overflow: scroll;
        }
        tr{
            font-size:12px;
        }
        tr>td{
            padding-left:3px;
            padding-right:3px;
        }
        th{
            font-size:13px;
            font-weight:bolder;
            text-align:center;
        }
        .num{
            text-align:right;
            padding-right:3px;
        }
        .urge{
            background: orange;
        }
        .pr{
            background: #339900;
        }

        .abierta{
            background: lightgray;
        }
        .cerrada{
            background: #ccff66;
        }
        .pendiente{

        }
        .deposito{
            background: #ffff99;
        }
        .en_proceso{
            background:  #FFFF99;
        }
        .textfield{
            font-weight: bold;
            text-align: right;
            height: 22px;
        } 
        label{
            font-weight: bold;
            text-align: right;
            height: 24px;
        }
        .button{
            font-weight: bold; 
            height: 22px;
            font-size: 10px;
        }
        .insertbutton{
            height: 22px;
            font-size: 10px;
        }
        .arrow{
          text-align: right;
        }		
		@media print{
			*{				
				padding:0;
				margin:0;
			}
			table{
				width:100%;
				empty-cells: show;
				border-collapse: collapse;
			}
			th{
				font-size:10px;
			}
			td,tr{
				border:1px solid black;
			}	
			td{				
				text-transform:lowercase;
				height:8px;
				//overflow:hidden;				
				//white-space:nowrap;
				padding-left: 1px;
			}
			b,i,big{
				text-transform:capitalize;
			}
			small span{
				text-transform:uppercase;
				padding-left: 5px;
			}
			.np{
				display:none;
			}							
			body {
				margin-bottom: 1cm;
			}			          
		}
    </style>
    <!-- end:   general_header -->

<!-- begin: start_query0 -->

    <div id="message" class="message"  onclick="cerrarPopup()">  <img  onclick="cerrarPopup()" style="float:right;cursor:pointer;" src="images/12-em-cross.png" />  </div>
 <table style="text-align: left; width: 100%;" border="1" cellpadding="0" cellspacing="0"> 
		<thead>
			<tr>
				<td style="width: 184px;"> </td>
				<td style="text-align: center;">
					<b>Marijoa</b></td>
				<td style="text-align: right;">
			<tpage><b>Pag: </b></tpage></td>
            </tr>
            <tr>
                <td>
                    <small><small>ycube plus <span>RAD</span> [1.2.31]</small></small>
                </td>
                <td style="text-align: center;"><big
            style="font-weight: bold;"><big>Pedidos Pendientes Urgentes / Reposicion</big></td>
            <td style="text-align: right;">
                <b> {user} - {time} </b>
            </td>
            </tr>
            <tr> <td colspan="2" align="center">
					<span  class="np" >Estado de los Codigos
                    <input type="text" size="10" class="pr" value="Proveedor" style="text-align:center">
                    <input type="text" size="10" class="urge" value="Urgente" style="text-align:center">  
                    <input type="text" size="10"   value="Pendiente" style="text-align:center">
                    <input type="text" size="10" class="" value="Enviado" style="text-align:center; background: #99FF00;">
                    <input type="text" size="10" class="en_proceso" value="En Proceso" style="text-align:center; background: #999900">
                    <input type="text" size="10" class="" value="Suspendido" style="text-align:center;background: red"> &nbsp; 
					</span>
					<b>Tipo Filtro</b> <i>{mayorista}</i>
					
                </td>

                <td> 
				<b>Pedidos desde:   {sup_origen}  &nbsp; <big> <big>  <big>   &rarr;   </big>  </big> </big>  &nbsp; {sup_destino} &nbsp; &nbsp; &nbsp; <i>(Douglas)</i>&#8482; </b> 
				</td>
				</tr>    
		</thead>
    </table>

    <table style="text-align: left; width: 100%;" border="1"cellpadding="0" cellspacing="0" id="tabla">       
        <thead>
           
<!-- end:   start_query0 -->

<!-- begin: header0 -->
<tr>
	<th>Nº</th>
    <th class="np" >NRO</th>
    <th>DE &#8680; A </th> 
    <th>FECHA</th>
    <th class="np" >USURIO</th>
    <th class="np" ><img src="images/ok.png" border="0"></th>
    <th>CODIGO</th>
    <th>REMP</th>
    <th>GRUPO &nbsp;-&nbsp; TIPO &nbsp;-&nbsp; COLOR  &nbsp;-&nbsp; DESCRIPCION</th>
    <th style="text-align: right;">CANT</th>
    <th>URGE</th> 
	<!-- <th>EST.NOTA</th> -->
	<th class="np">EST.COD</th>
    <th title="Estante:Fila:Columna" >UBIC</th>
</tr>
</thead>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
 <tbody>
<tr></tr> 
<tr class="pendiente">
	<td>{fila_numero}</td>
    <td class="np">{query0_NRO}</td>
    <td style="text-align: center" >{query0_ORIGEN}<label > &#8680; </label>  {query0_DESTINO}</td>
    <td>{query0_FECHA}</td>
    <td class="np">{query0_USURIO}</td>
    <td class="np"><input type="checkbox" id="check_{query0_CODIGO}" value="{query0_CODIGO}" unchecked  onchange="setIcon({query0_CODIGO},{query0_NRO})" ><span id="icon_check_{query0_CODIGO}"></span>  </td>
    <td id="{query0_CODIGO}" name="codigo_{query0_CODIGO}" align="center" ><a style="text-decoration:none" href=javascript:verOpciones("{fecha_inv}","{query0_CODIGO}","{query0_CANTIDAD}","{suc}") >{query0_CODIGO}</a> </td>
    <td align="center" width="90px"><input type="text" id="cod_rem_{query0_CODIGO}"  value="{query0_REM}" class="textfield"  size="8" onchange=remplazar("{query0_CODIGO}","{query0_NRO}")    ></td>
    <td id="descrip_{query0_CODIGO}"><div class="block">{query0_GRUPO}&nbsp;-&nbsp;{query0_TIPO}&nbsp;-&nbsp;{query0_COLOR}&nbsp;-&nbsp;{query0_DESCRIP}</div></td>
    <td style="text-align: center; padding: 0 1px;" id="cant_{query0_CODIGO}">{query0_CANTIDAD}</td>
    <td class="{urge}" style="text-align: center;">{query0_URGE}</td>
   <!-- <td  align="center" id="estado_nota_{query0_NRO}" >{query0_ESTADO}</td>  -->
    <td class="np"  align="center" id="estado_codigo_{query0_CODIGO}" {color_codigo} >{query0_ESTADO_CODIGO}</td>
    <td  title="Estante:Fila:Columna" >{ubic}</td>
</tr>
<tr class="eject">{query0_OBS}</tr> 
<!-- end:    query0_data_row -->
<!-- begin: opciones -->
<tr  class="np" >
    <td  colspan="12" >
        <div id="op_{codigo}" style="display:none;padding: 2px;margin:1px; ">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" >
                <tr><td id="remitos_abiertos_{codigo}" style="width:25%;text-align: center;"  > </td> 
                    <td>
                        <input id="ab_{query0_NRO}"  class="button" type="button" value="Ver Remitos Abiertos"   onclick=verRemitosAbiertos("{query0_DESTINO}","{query0_ORIGEN}",{codigo},"{user}","{query0_NRO}") > 

                        <input class="button" type="button" value="Pendiente"  onclick=cambiarEstadoCodigo({codigo},{query0_NRO},2) >
                        <input class="button" type="button" value="Suspendido"  onclick=cambiarEstadoCodigo({codigo},{query0_NRO},3) >
                        <input class="button" type="button" value="En Proceso"  onclick=cambiarEstadoCodigo({codigo},{query0_NRO},0) id="botton_en_proc_{codigo}"  > 
                        <input class="button" type="button" value="Enviado"  onclick=cambiarEstadoCodigo({codigo},{query0_NRO},1) id="boton_enviado_{codigo}">
                        <input class="button" type="button" value="Historial de Translados"  onclick=historialTranslados({codigo}) >


                    </td>  
                </tr>   
            </table>
        </div>
    </td>
</tr>
<!-- end:    opciones -->

<!-- begin: query0_total_row -->
<tr class="eject">
	<td class="np"></td>
    <td class="np"></td>
    <td class="np"></td>
    <td class="np"></td>
    <td class="np"></td>
    <td></td>
    <td></td><td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>    
</tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
</tbody>
<tfoot>
<tr class="eject">
    <td colspan="3"><b>Cant.:  {i}</b></td> 
    <td class="np"> <input type="checkbox" id="puntear" onchange="puntear()"  > </td>
    <td></td>
    <td></td>
    <td></td>
    <td class="np"></td>
    <td style="text-align: right;"><b>{subtotal0_CANTIDAD}</b></td>
    <td class="np"></td><td class="np"></td><td class="np"></td>
</tr>
</tfoot>

<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
</table>

<div id="fila_punteo" >

    <table class="np" border="0" cellspacing="0" width="100%" >
        <td   style="height:60px;width: 40%" >&nbsp;</td>
        <!--  <td colspan="4"><label class="label">Puntear con el Lector de Codigos</label>
            <input type="checkbox" id="lector" onchange="cambiarLector()"  >
            <input type="text" size="10" maxlength="12" value="" id="punteo_laser" onchange="punteoLaser()" > 
            
        </td> -->
        <td>
            <input id="ab_{query0_NRO}"  class="button" type="button" value="Ver Remitos Abiertos"   onclick=verRemitosAbiertosMultiple("{query0_DESTINO}","{query0_ORIGEN}","multiple","{user}","{query0_NRO}") >

        </td>
        <td id="remitos_abiertos_multiple"></td>

    </table> 
    <br><br><br>

    <div align="center">-------------------------------&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-------------------------------</div>
   <div align="center"><b>GESTOR DE PEDIDOS</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>PREPARADOR DEL PEDIDO</b></div>

</div>
<!-- end:   end_query0 -->

