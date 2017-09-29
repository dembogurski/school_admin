<!-- 
    Report Template File (docs_legales)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
       <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
       <script type="text/javascript" src="include/jquery.js" > </script>
	<treset_page>
            
            
<script language="javascript">
                
function setEstado(id){
   var enviado = $('#estado_'+id).is(':checked');
     if(enviado){
         cambiarEstadoDocumento(id,"Enviado");
         $( "#"+id ).children().css( "background-color", "#B0E2FF" );
     }else{
         cambiarEstadoDocumento(id,"No Enviado");
         $( "#"+id ).children().css( "background-color", "white" );
     }
} 

function setTipo(id){
  var orig = $('input[name="radio_'+id+'"]:checked').val();
  cambiarTipoDocumento(id,orig);
  /*if(orig == 'Original'){
       $( "#tipo_"+id ).css( "background-color", "green" );  
  }else{
      $( "#tipo_"+id ).css( "background-color", "#FFF68F" ); 
  }*/
}
function cambiarEstadoDocumento(id,estado){
            $.ajax({
                    type: "POST",
                    url: "include/Ajax.class.php",
                    data: "action=cambiar_estado_documento_legal&id="+id+"&estado="+estado+"",
                    async:true,
                    dataType: "html",
                    beforeSend: function(objeto){
                      $("#msg").html("<img src='images/activity.gif' height='12px' width='60px'>"); 
                    },
                    complete: function(objeto, exito){
                        if(exito=="success"){ 
                            $("#msg").html("<img src='images/ok.png'> ");
                        }
                    }
                });    
}
function cambiarTipoDocumento(id,tipo){
            $.ajax({
                    type: "POST",
                    url: "include/Ajax.class.php",
                    data: "action=cambiar_tipo_documento_legal&id="+id+"&tipo="+tipo+"",
                    async:true,
                    dataType: "html",
                    beforeSend: function(objeto){
                      $("#msg").html("<img src='images/activity.gif' height='12px' width='60px'>"); 
                    },
                    complete: function(objeto, exito){
                        if(exito=="success"){ 
                            $("#msg").html("<img src='images/ok.png'> ");
                        }
                    }
                });    
}
                
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
			style="font-weight: bold;"><big>Reporte de Documentos Legales &nbsp;&nbsp;&nbsp;({sup_emp})</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
                  
                  
		</tr>
                <tr> <td></td> 
                    <td colspan="1" style="text-align: center"><b>Periodo:&nbsp;&nbsp;</b>{desde}&nbsp; &lArr; &rArr; &nbsp;{hasta}</td>
                    <td id="msg" style="text-align: center"></td> 
                </tr>
                
	  </tbody>
	</table> 
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th>TIPO DOC</th>
        <th>N&deg;</th>
	<th>CONCEPTO</th>
        <th>PROVEEDOR</th>
        <th>FECHA</th>        
        <th>TIPO</th>       
        <th>COMPLEMENTO</th>
        <th>TIPO IVA</th>
        <th>VALOR</th>
        <th>COTIZ</th>
        <th>VALOR G$</th>
         <th>Orig/Copia</th>
        <th>Enviado</th>
        
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"> </td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr id="{id}" style="background: {color}">
            <td class="itemc">{query0_tipo_doc}</td>
            <td class="item" >{query0_nro_doc}</td>
	    <td class="item">{query0_concepto}</td>
            <td class="item">{query0_prov}</td>
            <td class="itemc">{query0_fecha}</td>           
            <td class="item">{query0_tipo}</td>            
            <td class="item">{query0_compl}</td>
            <td class="item">{query0_tipo_iva}</td>
            <td class="num">{query0_valor_mon}</td>
            <td class="num">{query0_cotiz}</td>
            <td class="num">{query0_valor}</td>
            <td class="num" id="tipo_{id}">
               <input type="radio" name="radio_{id}" value="Original" {original} onclick="setTipo({id})" > | <input type="radio" name="radio_{id}" value="Copia" {copia} onclick="setTipo({id})" >
            </td>
            <td class="itemc"> <input type="checkbox" id="estado_{id}"  {query0_estado} onclick="setEstado({id})" ></td>             
         </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            
            <td></td>
            
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align: right;font-size:13px"><b>{total0_valor_mon}</b></td>
            <td></td>
            <td style="text-align: right;font-size:13px;"><b>{total0_valor}</b></td>
             <td></td>
            <td></td>
        </tr>
<!-- end:    query0_total_row -->
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
            <td style="text-align: right;font-size:12px"><b>{subtotal0_valor_mon}</b></td>
            <td></td>
            <td style="text-align: right;font-size:12px"><b>{subtotal0_valor}</b></td>
            <td></td>
            <td></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<br><br><br><br>
<div style="text-align: center;height: 70px;font-weight: bolder;font-size: 18px"> Recibido por: ________________________________  &nbsp; Fecha: &nbsp; ____/____/&nbsp;{year} </div> 
              

<!-- end:   end_query0 -->

