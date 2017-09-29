<!-- 
    Report Template File (pedidos_prov)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
	<treset_page>
	 <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
	<script type="text/javascript" src="include/jquery.js" > </script>
    <script type="text/javascript" src="include/date.js" > </script>
    <script type="text/javascript" src="include/jquery.datePicker.js" > </script>
    <link rel="stylesheet" type="text/css" href="templates/datePicker.css" />
 
<style>
.fila{
 font-size:11px;
}
.tot{
 font-size:12px;
}

.diff{
  height:20px;
  text-align:right; 
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
    margin-top: 0px;
    margin-left: 25%;
    margin-right: 25%;  
 }
.no_urge{
	position: relative;
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
    margin-left: 25%;
    margin-right: 25%;
 }
 a.dp-choose-date {

	background: url(images/calendar.png) no-repeat;
}

           .anchorTitle {
                /* border radius */
                -moz-border-radius: 8px;
                -webkit-border-radius: 8px;
                border-radius: 8px;
                /* box shadow */
                -moz-box-shadow: 2px 2px 3px #e6e6e6;
                -webkit-box-shadow: 2px 2px 3px #e6e6e6;
                box-shadow: 2px 2px 3px #e6e6e6;
                /* other settings */
                background-color: #fff;
                border: solid 3px orange;
                color: #333;
                display: none;
                font-family: Helvetica, Arial, sans-serif;
                font-size: 12px;
                line-height: 1.3;
                max-width: 500px;
                padding: 5px 7px;
                position: absolute;
            }
            * html #anchorTitle {
                /* IE6 does not support max-width, so set a specific width instead */
                width: 300px;
            }

</style>


<script>
  $(document).ready(function() {

                $('body').append('<div id="anchorTitle" class="anchorTitle"></div>');

                $('a[title!=""]').each(function() {

                    var a = $(this);

                    a.hover(
                        function() {
                            showAnchorTitle(a, a.data('title'));
                        },
                        function() {
                            hideAnchorTitle();
                        }
                    )
                    .data('title', a.attr('title'))
                    .removeAttr('title');
                });

            

            });

            function showAnchorTitle(element, text) {

                var offset = element.offset();

                $('#anchorTitle')
                .css({
                    'top'  : (offset.top + element.outerHeight() + 4) + 'px',
                    'left' : offset.left + 'px'
                })
                .html(text)
                .show();

            }

            function hideAnchorTitle() {
                $('#anchorTitle').hide();
            }   
    
    function marcar_no_urge(id,obs,div, nro){  
        var obs = $(obs).val();
   	      $.ajax({
				type: "POST",
				url: "include/Ajax.class.php",
				data: "action=marcar_no_urge&obs="+obs+"&id="+id+"&nro="+nro,
			    async:true,
                dataType: "html",
				beforeSend: function(objeto){
                   $(div).html("<b><small> Desmarcando Urgente.. </small></b><br> &nbsp;&nbsp;&nbsp;<img src='images/activity.gif' height='12px' width='60px'>");
                },
	           complete: function(objeto, exito){
	              if(exito=="success"){ 
                      $(div).html( objeto.responseText  );
	              }
        	   }
			 }
		)
   }
       function agregar_obs(id,obs,div, nro){  
        var obs = $(obs).val();  
   	       $.ajax({
		type: "POST",
		url: "include/Ajax.class.php",
		data: "action=agregar_obs&obs="+obs+"&id="+id+"&nro="+nro,
		async:true,
                dataType: "html",
		beforeSend: function(objeto){
                   $(div).html("<b><small> Observacion agregada... </small></b><br> &nbsp;&nbsp;&nbsp;<img src='images/activity.gif' height='12px' width='60px'>");
                },
	        complete: function(objeto, exito){
	            if(exito=="success"){ 
                      $(div).html( objeto.responseText  );
	            }
        	}
			 }
		)
   } 
 function desmarcar(){
	$("input[type=checkbox][checked]").each( 
		      function() {  
		          $(this).removeAttr("checked");   
		      } 
    );    	
 }

function abrirPopup(obj){
     $("#message").html( obj );
	 $("#message").animate({ opacity:100 }, 2000);  
}
function no_urge(id, div){
	     $(div).slideToggle(500,function(){});
}
function cerrarPopup(){   
   $("#message").html('<img  onclick="cerrarPopup()" style="float:right;cursor:pointer;" src="images/12-em-cross.png" />');
   $("#message").animate({ opacity:0 }, "fast");    
}
function limpiar(){   
   $("#message").html('');	
   $("#message").animate({ opacity:0 }, "fast");    
}
function limpiarCampo(){
    if( $("#fecha_prev").val()=="AAAA-mm-dd"  ){
        $("#fecha_prev").val("");
    }
}
function verStockActual(nro_nota,codigo,urgente,id){ 
        if(codigo != "No.Def"){
                       
            $.ajax({
                type: "POST",
                url: "include/Ajax.class.php",
                data: "action=ver_stock_actual&codigo="+codigo+"&nro_nota="+nro_nota+"&urgente="+urgente+"",
                async:true,
                dataType: "html",
                beforeSend: function(objeto){
                    $("#data_"+codigo).html("<img src='images/activity.gif' height='9px' width='32px'>");
                },
                complete: function(objeto, exito){
                    if(exito=="success"){    
                        $("#data_"+codigo).html(objeto.responseText);
                    }  
                }
            })
        }else{
            $("#data_id_"+id).html("<br><div style='margin-left:50px;'>  Obs: <input type='text' id='obs_id_"+id+"' size='70'>  \n\
               <input style='font-weight:bolder;' type='button' onclick='inStockId("+id+")' value='Marcar como Disponible en Stock' > &nbsp; <input style='font-weight:bolder;' type='button' onclick='cancelarId("+id+")' value='Cancelar Pedido' > &nbsp; <input style='font-size:15px;font-weight:bolder' type='button' value='&#10548;' onclick=javascript:$('#data_id_"+id+"').html(''); ></div><br>");
        }
}


function inStock(nro_nota,codigo){
   var obs = $("#obs_"+codigo).val();
   if(obs == ""){
      var q = confirm("Desea cambiar el estado sin agregar ninguna observación?");
      if(!q){
        return;
      }    
   }  
   $.ajax({
                type: "POST",
                url: "include/Ajax.class.php",
                data: "action=marcar_pedido_como_disponible&codigo="+codigo+"&nro_nota="+nro_nota+"&obs="+obs+"",
                async:true,
                dataType: "html",
                beforeSend: function(objeto){
                    $("#data_"+codigo).html("<img src='images/activity.gif' height='9px' width='32px'>");
                },
                complete: function(objeto, exito){
                    if(exito=="success"){    
                        $("#data_"+codigo).html(objeto.responseText);
                        $("#estado_"+codigo).html("Disponible en Stock");
                        $("#estado_"+codigo).css("background","#5CACEE");
                    }  
                }
            }) 
}
function inStockId(id){
   var obs = $("#obs_id_"+id).val();
   if(obs == ""){
      var q = confirm("Desea cambiar el estado sin agregar ninguna observación?");
      if(!q){
        return;
      }    
   }  
   $.ajax({
                type: "POST",
                url: "include/Ajax.class.php",
                data: "action=marcar_pedido_como_disponible_x_id&id="+id+"&&obs="+obs+"",
                async:true,
                dataType: "html",
                beforeSend: function(objeto){
                    $("#data_id_"+id).html("<img src='images/activity.gif' height='9px' width='32px'>");
                },
                complete: function(objeto, exito){
                    if(exito=="success"){    
                        $("#data_id_"+id).html(objeto.responseText);
                        $(".estado_"+id).html("Disponible en Stock");
                        $(".estado_"+id).css("background","#5CACEE");
                    }  
                }
            }) 
}


function cancelar(nro_nota,codigo){
   var obs = $("#obs_"+codigo).val();
   if(obs == ""){
      var q = confirm("Desea cambiar el estado sin agregar ninguna observación?");
      if(!q){
        return;
      }    
   } 
   
    $.ajax({
                type: "POST",
                url: "include/Ajax.class.php",
                data: "action=marcar_pedido_como_cancelado&codigo="+codigo+"&nro_nota="+nro_nota+"&obs="+obs+"",
                async:true,
                dataType: "html",
                beforeSend: function(objeto){
                    $("#data_"+codigo).html("<img src='images/activity.gif' height='9px' width='32px'>");
                },
                complete: function(objeto, exito){
                    if(exito=="success"){    
                        $("#data_"+codigo).html(objeto.responseText);
                        $("#estado_"+codigo).html("Cancelado");
                        $("#estado_"+codigo).css("background","#8B7D7B");
                    }  
                }
            }) 
}  

function cancelarId(id){
   var obs = $("#obs_id_"+id).val();
   if(obs == ""){
      var q = confirm("Desea cambiar el estado sin agregar ninguna observación?");
      if(!q){
        return;
      }    
   } 
   
    $.ajax({
                type: "POST",
                url: "include/Ajax.class.php",
                data: "action=marcar_pedido_como_cancelado_x_id&id="+id+"&&obs="+obs+"",
                async:true,
                dataType: "html",
                beforeSend: function(objeto){
                     $("#data_id_"+id).html("<img src='images/activity.gif' height='9px' width='32px'>");
                },
                complete: function(objeto, exito){
                    if(exito=="success"){    
                        $("#data_id_"+id).html(objeto.responseText);
                        $(".estado_"+id).html("Cancelado");
                        $(".estado_"+id).css("background","#8B7D7B");
                    }  
                }
            }) 
} 

$(window).scroll(function(){
  	$('#message').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
});
$(function(){
   $('.date-pick').datePicker().val(new Date().asString()).trigger('change');
});

</script> 	
<!-- end:   general_header -->


<!-- begin: start_query0 -->
<table style="text-align: left; width: 99%;" border="1"cellpadding="0" cellspacing="0">
    <tbody>
    <thead>
<tr> <td colspan="50"> 
	<table style="text-align: left; width: 100%;" border="1"
	 cellpadding="0" cellspacing="0">
	  <tbody>
		<tr>
		  <td style="width: 184px;"> </td>
		  <td style="text-align: center;">
			<b>Marijoa</b></td>
		  <td style="text-align: right;">
			<tpage><b>Pag: </b></tpage></td>
		</tr>
		<tr>
		  <td>
			<small><small>ycube plus RAD [1.2.31]</small></small>
		  </td>
		  <td style="text-align: center;"><big
			style="font-weight: bold;"><big>Notas Pedidos a Proveedores</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
        <tr> <td></td><td><b>&nbsp; Pedidos urgentes en <input type="text" disabled size="8" style="border-style:solid; background: rgb(250, 250,210);font-size:14px;"> &nbsp;&nbsp;&nbsp;&nbsp;Periodo: &nbsp;&nbsp; {sup_desde} -- {sup_hasta} </b></td><td></td>  </tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
 <div id="message" class="message"  style="opacity:0;" onclick="cerrarPopup()">  <img  onclick="cerrarPopup()" style="float:right;cursor:pointer;" src="images/12-em-cross.png" />  </div>

    <tr style="font-weight:bolder;font-size:16px;">
        <th>NRO</th>
        <th>USUARIO</th>
        <th>FECHA</th>
	<th>CODIGO</th>
        <th>GRUPO</th>
        <th>TIPO</th>
        <th>COLOR</th>
        <th>CANT</th>
       
        <th>ESTADO</th>
       
        <th style="width:40px"><input type="checkbox" id="all">   </th>
        {add_code_cab}
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
       <tr {urge} >
            <td class="num">{query0_NRO}</td>
            <td class="item">{query0_USUARIO}</td>
            <td class="itemc">{FECHA}</td>
            <td class="itemc" ><a title="{title}" href=javascript:verStockActual({query0_NRO},"{query0_CODIGO}","{query0_URGE}",{query0_ID})>{query0_CODIGO}</a></td>
            <td class="item">{query0_GRUPO}</td>
            <td class="item">{query0_TIPO}</td>
            <td class="item">{query0_COLOR}</td>
            <td class="num">{query0_CANT}</td>
            
            <td  class="itemc estado_{query0_ID}"  id="estado_{query0_CODIGO}">{query0_ESTADO}</td>
             
            <td  class="item"><input name="itemSelect[]" type="checkbox" id="{query0_ID}" value="{query0_ID}">{no_urge}</td>
            {add_code} 
         </tr>
         <tr><td style="background: #E8E8E8;" colspan="10" id="data_{codigo_o_id}"></td></tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr>
            <td colspan="4"><b>Cantidad de Pedidos Pendientes {pendientes}</b></td> 
             
             
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: obs -->
        <tr>
            <td style="font-weight:bolder;font-size:14px;">     </td>
            <td colspan="9" style="font-size:14px;"><b>Obs:</b>{query0_OBS}</td> 
        </tr>
<!-- end:    obs -->
<!-- begin: query0_subtotal_row -->
        <tr>
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
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0  -->
   <tr style="background-color:#CCCC99;" >
             
            <td  height="36px" colspan="8" align="right"><b>Precio Compra:</b><input align="right" type="text" value="" id="precio" maxlength="14" size="10"> &nbsp;&nbsp;
            <b>Buscar: </b><input type="text" value="" id="busc" size="20"  onkeyup="buscarProveedor()">
            <b>Proveedor: </b><input type="text" value="" id="prov"  maxlength="60" size="36">
          
            <input type="text" class="date-pick" maxlength="10" size="10" id="fecha" value="{hoy}">
            <label style="font-weight:bolder;" title="Fecha prevista para recepcion!!!">Fecha Prevista</label>
            <input type="text" class="date-pick2" maxlength="10" size="10" id="fecha_prev" value="{previsto}" onfocus="limpiarCampo()">

            </td>
                         
            <td  id="msg" colspan="4"> </td>
   </tr>
   <tr  style="background-color:#CCCC99;"> <td align="center" colspan="8"><b>Precio Venta:</b><input align="right" type="text" value="" id="preciov" maxlength="14" size="10"> <b>Observacion:</b><input align="right" type="text" value="" id="obsd" maxlength="100" size="60"> &nbsp;
   <input type="button" onclick="update()" value="Marcar como Comprado">
   </td>
   <td colspan="4"></td>
   </tr>
    </tbody>
</table>
<!-- end:   end_query0 -->


<!-- begin: end_queryX  -->
   <tr style="background-color:#CCCC99;" > 
            <td  id="msg" colspan="4"> </td>
   </tr>
    </tbody>
</table>
<!-- end:   end_queryX -->

<!-- begin: script noeval -->
<script>
   function reload(){
   	  window.location.reload();
   }
   function buscarProveedor(){   
   	   var prov = $("#busc").val();
       if(prov.length > 2){ 
   	      $.ajax({
				type: "POST",
				url: "include/Ajax.class.php",
				data: "action=buscar_proveedor&prov="+prov,
			    async:true,
                dataType: "html",
				beforeSend: function(objeto){
                   $("#msg").html("<b> Buscando... </b>&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;  <img src='images/activity.gif' height='12px' width='60px'  >");
                },
	           complete: function(objeto, exito){
	              if(exito=="success"){    
	              	  $("#prov").val(objeto.responseText);
	                  $("#msg").html("");
	              }
        	   } 
			 }
		)
        }
   }
   function update(){
	var selectedItems = new Array();
	$("input[@name='itemSelect[]']:checked").each(function() {selectedItems.push($(this).val());});
		 
	var precio = $("#precio").val();
        var precio_venta = $("#preciov").val();
        var obs = $("#obsd").val();
	if(precio == ''){
		precio = 0;
	}
	var prov = $("#prov").val();
	var fecha = $("#fecha").val();
        var fecha_prev = $("#fecha_prev").val();
		
		if (selectedItems .length == 0){ 
		    alert("Por favor seleccione un Item para actualizar!!!");
		}else{ 
			
                $.ajax({
			type: "POST",
			url: "include/Ajax.class.php",
			data: "action=actualizar_pedido&precio="+precio+"&precio_venta="+precio_venta+"&fecha="+fecha+"&fecha_prev="+fecha_prev+"&prov="+prov+"&obs="+obs+"&items=" + selectedItems.join('|'),
                        async:true,
                        dataType: "html",
			beforeSend: function(objeto){
                        $("#msg").html("<b> Actualizando... </b>&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;  <img src='images/activity.gif' height='12px' width='60px'  >");
                },
	        complete: function(objeto, exito){
	            if(exito=="success"){  
	                $("#msg").html(""+ objeto.responseText+"&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;<input type='button' onclick='reload()' value='Recargar'> ");
                        desmarcar();
	            }
        	} 
		}
			
		) 
		}
   }
   function revisarUrgentes(){  
   	      $.ajax({
				type: "POST",
				url: "include/Ajax.class.php",
				data: "action=revisar_pedidos_urgentes",
			    async:true,
                dataType: "html",
				beforeSend: function(objeto){
                   $("#msg").html("<b> <small> Revisando pedidos Urgentes... </small></b><br> &nbsp;&nbsp;&nbsp;<img src='images/activity.gif' height='12px' width='60px'  >");
                },
	           complete: function(objeto, exito){
	              if(exito=="success"){
                      var cant = parseInt( objeto.responseText );
                    
                      if(cant){
		 	abrirPopup("Existen "+cant+" pedidos URGENTES!!!  &nbsp;&nbsp; Presione F5 para actualizar<br>  <img  onclick=cerrarPopup() style='float:right;cursor:pointer;' src='images/12-em-cross.png' />");
	              }
                         $("#msg").html("");
	              }
        	   }
		 }
		)
   }
   function agregar_codigo(id){
          var codigo = $("#_"+id).val();
          if(codigo.length > 0){
   	      $.ajax({
				type: "POST",
				url: "include/Ajax.class.php",
				data: "action=agregar_codigo&id="+id+"&codigo="+codigo,
			    async:true,
                dataType: "html",
				beforeSend: function(objeto){
                   $("#boton_"+id).fadeOut("fast");
                   $("#span_"+id).html("<img src='images/activity.gif' height='10' width='50'>");
                   $("#msg").html("<b> <small> Actualizando... </small></b><br> &nbsp;&nbsp;&nbsp;<img src='images/activity.gif' height='12px' width='60px'  >");
                },
	           complete: function(objeto, exito){
	              if(exito=="success"){
                      if(jQuery.trim(objeto.responseText) == "Ok"){ 
                          $("#span_"+id).html("<img src='images/ok.png'>");
                          $("#msg").html("");
                      }else{
                         alert("Opss!!! Que servidor tan malo!!! Se ha producido un error al actualizar el codigo!!! Intente mas tarde...");
                      }
	                  
	              }
        	   }
			 }
		)
        }else{
          alert("Favor ingrese un codigo para poder actualizar!!!");
        }
   }
</script>  
<!-- end:    script -->

<!-- begin: revisar_pend noeval -->
<script> setTimeout("revisarUrgentes()",900000); </script>
<br><br><br><br><br><br><br><br><br>
<!-- end:    revisar_pend -->
