<!-- 
    Report Template File (rep_prod_prov)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
     <script type="text/javascript" src="include/jquery.js" > </script>
	<treset_page>
         <link rel="stylesheet" type="text/css" href="templates/reports.css" />    
         
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
<table style="text-align: left; width: 100%;" border="1"cellpadding="0" cellspacing="0">
    <tbody>
    <thead>
<tr> <td colspan="50"> 
	<table style="text-align: left; width: 99%;" border="0"
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
			style="font-weight: bold;"><big>Reporte de Productos (Prov-Cod-Suc-ETC.)</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
	  </tbody>
	</table> 
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        
        <th>PROVEEDOR</th>
        <th>CODIGO</th>
        <th>SUC</th>
        <th>FAM</th>
        <th>GRUPO</th>
        <th>TIPO</th>
        <th>COMP</th>
        <th>TEMP</th>
        <th>ESTRUCT</th>
        <th>CLASIF</th>
        <th>COLOR</th>
        <th>DESCRIP</th>
        <th>UBIC</th>
        <th>CANT</th>
        <th>ANCHO</th>
        <th title="Precio de Costo">Ref.</th>
        <th>PRECIO_1</th>
        <th>IMG</th>
        <th>Remision/Pedido</th>
         
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"> </td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr>
          
            <td class="item">{query0_NOMBRE_PROV}</td>
            <td class="item">{query0_CODIGO}</td>
            <td class="item">{query0_SUC}</td>
            <td class="item">{query0_FAM}</td>
            <td class="item">{query0_GRUPO}</td>
            <td class="item">{query0_TIPO}</td>
            <td class="item">{query0_COMP}</td>
            <td class="item">{query0_TEMP}</td>
            <td class="item">{query0_ESTRUCT}</td>
            <td class="item">{query0_CLASIF}</td>
            <td class="item">{query0_COLOR}</td>
            <td class="item">{query0_DESCRIP}</td>
            <td class="itemc" title="Entrada o Salida   Estante-Fila-Columna">{ubic}</td>
            <td class="num">{query0_CANT}</td>
            <td class="num">{query0_ANCHO}</td>
            
            <td class="num">{query0_PREC_COSTO}</td>
            <td class="num">{query0_PRECIO_1}</td>
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
            <td></td>
             <td></td>
            <td></td>
            <td></td>
             <td></td>
            <td><B>TOTAL: </B> </td>
            <td><B>{TOTAL}<B></td>
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
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->

