<!-- 
    Report Template File (busc_prod)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
	<treset_page>
            
 <script language="javascript"> 
            
        function verImagen(url){
             window.open(url,"Imagen de Producto","width=640,height=480,scrollbars=yes");
        } 
          
          function verificarCodigoEnRemision(codigo){ 
          
                $.ajax({
                    type: "POST",
                    url: "include/Ajax.class.php",
                    data: "action=verificar_codigo_en_remision&codigo="+codigo+"",
                    async:true,
                    dataType: "html",
                    beforeSend: function(objeto){
                       $("#cod_"+codigo).html("<b>Procesando...</b>  &nbsp;&nbsp;&nbsp;<img src='images/activity.gif' height='9px' width='26px'>"); 
                    },
                    complete: function(objeto, exito){
                      if(exito=="success"){ 
                        $("#cod_"+codigo).html( objeto.responseText  ); 
                      }
                    }
               })               
          }
   </script>           
<!-- end:   general_header -->


<!-- begin: start_query0 -->
<table style="text-align: left; width: 99%;" border="1"cellpadding="0" cellspacing="0">
    <tbody>
    <thead>
<tr> <td colspan="50"> 
	<table style="text-align: left; width: 100%;" border="0"
	 cellpadding="0" cellspacing="0">
	  <tbody>
		<tr>
		  <td style="width: 184px;" width="33%"> </td>
		  <td style="text-align: center;">
			<b>Marijoa</b></td>
		  <td style="text-align: right;">
			<tpage><b>Pag: </b></tpage></td>
		</tr>
		<tr>
		  <td width="33%">
			<small><small>ycube plus RAD [1.2.31]</small></small>
		  </td>
		  <td style="text-align: center;"><big
			style="font-weight: bold;"><big>Filtrado de Productos</big></td>
		  <td style="text-align: right;" width="33%">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
		<tr><td colspan="3" style="text-align: center;"><b>  (No se mostraran mas de 30 resultados)</b> </td></tr>
	  </tbody>
	</table><hr />
	
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th style="text-align: center;">CODIGO</th>
        <th style="text-align: center;">FAMILIA</th>
        <th style="text-align: center;">GRUPO</th>
        <th style="text-align: center;">TIPO</th>
        <th style="text-align: center;">COLOR</th>
        <th style="text-align: center;">DESCRIPCION</th>
        <th style="text-align: center;">CANT</th>
        <th style="text-align: center;">SUC</th>
		<th style="text-align: center;">PRECIO_1</th>
                <th>IMG</th>
        <th>Remision/Pedido</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <tr>
            <td style="font-size: 11;">{query0_CODIGO}</td>
            <td style="font-size: 11;">{query0_FAMILIA}</td>
            <td style="font-size: 11;">{query0_GRUPO}</td>
            <td style="font-size: 11;">{query0_TIPO}</td>
            <td style="font-size: 11;">{query0_COLOR}</td>
            <td style="font-size: 11;">{query0_DESCRIPCION}</td>
            <td style="font-size: 11;" align="right">{query0_CANT}</td>
            <td style="font-size: 11;" align="center">{query0_SUC}</td>
			<td style="font-size: 11;" align="center">{query0_PRECIO_1}</td>
                        <td class="itemc">{foto}</td>
            <td class="itemc">{rem_ped}</td>
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
            <td></td> <td></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->

