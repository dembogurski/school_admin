<!-- 
    Report Template File (rep_frac)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
<link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
<script type="text/javascript" src="include/jquery.js" > </script>
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
                       $("#cod_"+codigo).html("<b>  Procesando...</b>  &nbsp;&nbsp;&nbsp;<img src='images/activity.gif' height='9px' width='26px'>"); 
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
<table style="text-align: left; width: 100%;" border="1" cellpadding="0" cellspacing="0">
    <tbody>
    <thead>
<tr> <td colspan="50"> 
	<table style="text-align: left; width: 99%;" border="0"
	 cellpadding="0" cellspacing="4">
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
                      style="font-weight: bold;"><big>Historial de Fracciones de {sup_cod_prod}&nbsp;&nbsp;&nbsp;<small>Ref. Compra  N&deg;:{referencia}</small></big></td>
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
        <th>Codigo</th> 
        <th>Grupo</th>
        <th>Tipo</th>
        <th>Comp</th>
        <th>Temp.</th>
        <th>Estruc.</th>
        <th>Color</th>
         <th>Descrip.</th>
        <th>Cant.Compra</th> 
        <th>Cant. Actual </th>
        <th>Fdp</th>
        <th>Suc</th>
        <th> </th> 
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"> </td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <tr>
            <td class="item" style="background:{fondo}" title="{ref}"><a href="javascript:verificarCodigoEnRemision({query0_CODIGO})">{query0_CODIGO}</a></td> 
            <td class="item">{query0_GRUPO}</td>
            <td class="item">{query0_TIPO}</td>
            <td class="item">{query0_COMP}</td>
            <td class="item">{query0_TEMP}</td>
            <td class="item">{query0_ESTRUCT}</td>
            <td class="item">{query0_COLOR}</td>
            <td class="item">{query0_DESCRIPCION}</td>
            <td class="num">{query0_CANT_COMPRA}</td> 
            <td class="num">{query0_CANTIDAD}</td>
            <td class="itemc" style="background: {estado}">{query0_FDP}</td>
            <td class="itemc">{query0_SUC}</td>
            <td class="itemc">{foto}</td>
        </tr>
        <tr><td colspan="11" id="cod_{query0_CODIGO}"></td></tr>
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
            <td class="num"><b>{total_suc}</b></td>
            <td></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->

