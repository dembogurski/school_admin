<!-- 
    Report Template File (ventas_anuladas)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
       <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
        <script type="text/javascript" src="include/jquery.js" > </script>
	<treset_page>
            
            <script lang="javascript">
                function eliminarFactura(nro) {
                   if (confirm('¿Esta Seguro que desea eliminar esta Factura?')) {
                      $("#cab_fact_"+nro).css("background","lightgray");  
                       $("#eliminar_"+nro).attr("disabled",true);
                        $("#abrir_"+nro).attr("disabled",true);
                       
                        $("#estado_"+nro).css("color","red");
                        $("#estado_"+nro).html("Eliminada");
                        $(".frac_"+nro).hide();
                        $.ajax({
				type: "POST",
				url: "include/Ajax.class.php",
				data: "action=eliminar_factura&nro_factura="+nro+"",
                                async:true,
                                dataType: "html",
                                beforeSend: function(objeto){
                                    $("#msg_"+nro).html("<b> <img src='images/activity.gif' height='12px' width='60px'>");
                                },
                                complete: function(objeto, exito){
                                if(exito=="success"){ 
                                      $("#msg_"+nro).html( objeto.responseText  );
                                }
        	          }
			 }
		       )
                   }  
                }
                
                function abrirFactura(nro){
                     if (confirm('¿Esta Seguro que desea Abrir esta Factura?')) {
                         
                       // $("#cab_fact_"+nro).css("background","lightgray");  
                        $("#eliminar_"+nro).attr("disabled",true);
                        $("#abrir_"+nro).attr("disabled",true);
                       
                        $("#estado_"+nro).css("color","green");
                        $("#estado_"+nro).html("Abierta");
                        $("#frac_"+nro).attr("disabled",true);
                        $(".frac_"+nro).hide();
                        
                        $.ajax({
				type: "POST",
				url: "include/Ajax.class.php",
				data: "action=abir_factura_actualizar&nro_factura="+nro+"",
                                async:true,
                                dataType: "html",
                                beforeSend: function(objeto){
                                    $("#msg_"+nro).html("<b> <img src='images/activity.gif' height='12px' width='60px'>");
                                },
                                complete: function(objeto, exito){
                                if(exito=="success"){ 
                                      $("#msg_"+nro).html( objeto.responseText  );
                                }
        	          }
			 }
		       )
            
                     }  
                }
                function fraccionar(codigo,factura){
                     if (confirm('¿Esta Seguro que desea Fraccionar este codigo?')) {
                       var cantidad =   $("#cant_"+codigo).text().replace(",","."); 
                       
                        $.ajax({
				type: "POST",
				url: "include/Ajax.class.php",
				data: "action=fraccionar_codigo&codigo="+codigo+"&cantidad="+cantidad,
                                async:true,
                                dataType: "html",
                                beforeSend: function(objeto){ 
                                    $("#frac_"+codigo).html("<img src='images/activity.gif' height='12px' width='60px'>");
                                },
                                complete: function(objeto, exito){
                                if(exito=="success"){ 
                                      $("#frac_"+codigo).html( objeto.responseText  );
                                       verificar(codigo,factura);
                                }
        	          }
			 }
		       )
                        
                     }
                }
                
                function verificar(codigo,factura){
                   $("#cell_estado_"+factura+"-"+codigo).html( "Verificado"  );  
                   $("#boton_frac_"+factura+"-"+codigo).attr("disabled",true); 
                   $("#boton_verif_"+factura+"-"+codigo).attr("disabled",true); 
                   
                   var no_verificados = 0;
                   var verificados = 0;
                   $('[id^=cell_estado_'+factura+']').each(function(){ 
                        var currentId = $(this).attr('id'); 
                        var valor = $("#"+currentId).text();
                        if(valor == ""){
                            no_verificados++;
                        }else{
                            verificados ++;
                        }                        
                   });
                   if(no_verificados > 0){
                       $("#eliminar_"+factura).attr("disabled",true); 
                   }else{
                       $("#eliminar_"+factura).removeAttr("disabled"); 
                   }
                    if(verificados > 0){ 
                      $("#abrir_"+factura).attr("disabled",true); 
                   }else{ 
                       $("#abrir_"+factura).removeAttr("disabled");
                   }
                }
            </script>    
<!-- end:   general_header -->


<!-- begin: start_query0 -->
<table style="text-align: left; width: 90%;" border="1" cellpadding="0" cellspacing="0">
    <tbody>
    <thead>
<tr> <td colspan="50"> 
	<table style="text-align: left; width: 100%;" border="1"
	 cellpadding="0" cellspacing="0">
	  <tbody>
		<tr>
		  <td style="width: 20%;height:40px;"> </td>
		  <td style="text-align: center;width: 60%;">
			<b>Marijoa</b></td>
		  <td style="text-align: right;">
			<tpage><b>Pag: </b></tpage></td>
		</tr>
		<tr>
		  <td  style="width: 20%;">
			<small><small>ycube plus RAD [1.2.31]</small></small>
		  </td>
		  <td style="text-align: center;"><big
			style="font-weight: bold;"><big>Ventas Anuladas</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
                <tr>
                    <td colspan="3" style="text-align: center">{sup_desde}-->{sup_hasta}&nbsp;&nbsp;Vendedor: &nbsp;{sup_vendedor}&nbsp;&nbsp;&nbsp;&nbsp;Sucursal:&nbsp;{sup___suc}</td>
                </tr>
	  </tbody>
	</table> 
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->

</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr> 
            <td class="item">{query0_CODIGO}</td>
            <td class="item">{query0_DESCRIP}</td>
            <td class="num" id="cant_{query0_CODIGO}">{query0_CANT}</td> 
            <td class="num">{query0_PRECIO}</td>
            <td class="num">{query0_SUBTOTAL}</td>
            <td style="text-align: center" id="frac_{query0_CODIGO}"  >
                <input type="button" class="frac_{query0_FACTURA}" value="Fraccionar" onclick=fraccionar({query0_CODIGO},{query0_FACTURA}) id="boton_frac_{query0_FACTURA}-{query0_CODIGO}" style="font-weight:bolder;font-size:9px">
                <input type="button" class="frac_{query0_FACTURA}" value="Verificado" onclick=verificar({query0_CODIGO},{query0_FACTURA})  id="boton_verif_{query0_FACTURA}-{query0_CODIGO}" style="font-weight:bolder;font-size:9px">
            </td>
            <td style="text-align: center;font-weight: bolder;color:green" id="cell_estado_{query0_FACTURA}-{query0_CODIGO}" ></td>
         </tr>
<!-- end:    query0_data_row -->


<!-- begin: cab -->
<tr>
    <td colspan="7" >
        <table id="cab_fact_{query0_FACTURA}" border="0" cellpadding="0" cellspacing="0" style="width: 100%;background-color: lightyellow;text-align: left"   >
            <tr>
                <th style="text-align: left"> Factura N&deg;:</th> <td>{query0_FACTURA}</td><th  style="text-align: left"> Vendedor:</th><td>{query0_VENDEDOR}</td> 
                <th  style="text-align: left"> Fecha:</th> <td>{query0_FECHA}</td>
                <td id="msg_{query0_FACTURA}" style="background: whitesmoke;width: 40%;text-align: center;vertical-align: bottom;padding:2px;color:green;font-weight: bold">
                    Debe verificar todos los cortes antes de eliminar la factura
                </td>
            </tr> 
 
            <tr>
               <th  style="text-align: left"> Cliente:</th><td>{query0_CLIENTE}</td>  <th  style="text-align: left"> CI/RUC: </th><td>{query0_CI_RUC}</td>
               <td></td>
               <td></td>
               <td rowspan="2" style="background: whitesmoke;width: 40%;text-align: center;vertical-align: bottom;padding:2px">  
                    <input type="button" id="eliminar_{query0_FACTURA}" value="Eliminar Definitivamente" onclick="eliminarFactura({query0_FACTURA})"  disabled   style="font-weight:bolder;font-size:9px">  
                    <input type="button" id="abrir_{query0_FACTURA}" value="Abrir Factura" onclick="abrirFactura({query0_FACTURA})"  style="font-weight:bolder;font-size:9px">
                </td>
            </tr> 
               
            <tr>
                <th  style="text-align: left"> Cat:</th><td>{query0_CAT}</td> <th  style="text-align: left"> Estado:</th> <td style="color:  black;font-weight: bolder" id="estado_{query0_FACTURA}">{query0_ESTADO}</td> 
            </tr>  
        </table>   
    </td>
    
    
     
         </tr>
 
     <tr>  
         <th colspan="7" style="background: lightgrey">Detalle</th> 
     </tr>           
     <tr>  
        <th>Codigo</th>
        <th>Descrip</th> 
        <th>Cantidad</th>
        <th>Precio</th>
        <th>Subtotal</th>
        <th>Fraccionar / Verificar</th>
        <th>Estado</th>
     </tr>        
<!-- end:    cab -->


<!-- begin: query0_total_row -->
   
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>             
            <td colspan="5" style="text-align: right;"><b>{subtotal0_SUBTOTAL}</b><th colspan="2">&nbsp</th></td>
        </tr>
        <tr><td colspan="7" style="height: 30px; border-style: solid 0px">&nbsp;</td></tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->

