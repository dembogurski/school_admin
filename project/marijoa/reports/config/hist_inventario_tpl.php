<!-- 
    Report Template File (hist_inventario)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
       <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
	<treset_page>
<!-- end:   general_header -->


<!-- begin: start_query0 -->
<table style="text-align: left; width: 99%;" border="1" cellpadding="0" cellspacing="0">
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
			style="font-weight: bold;"><big>Historial de Inventario</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th>Usuario</th>
        <th>Fecha</th>
        <th>Tipo</th>
        <th>Codigo</th>
        <th>Suc</th>
        <th>Gramaje</th>
        <th>Ancho</th>
        <th>Cant</th>
        <th>Kilos</th>
        <th>Tara</th>
        <th>Kilaje Real</th>
        <th>Cant Real</th>
        <th>Diff Mts.</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"> </td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr>
            <td class="item">{query0_usuario}</td>
            <td class="item">{query0_fecha}</td>
            <td class="item">{query0_tipo}</td>
            <td class="item">{query0_codigo}</td>
            <td class="itemc">{query0_suc}</td>
            <td class="num">{query0_gramaje}</td>
            <td class="num">{query0_ancho}</td>
            <td class="num">{query0_cant}</td>
            <td class="num">{query0_kilos}</td>
            <td class="num">{query0_tara}</td>
            <td class="num">{query0_kilosr}</td>
            <td class="num">{query0_cantr}</td>
            <td class="num">{query0_diff_mts}</td>
         </tr>
<!-- end:    query0_data_row -->




<!-- begin: query0_subtotal_row -->
        <tr>
            <td colspan="13" style="height: 40px">&nbsp;</td>
            
        </tr>
        
        
        <tr>
            <th colspan="8" style="text-align: cente"  >Historial de Remisiones</th>
        </tr>  
    <tr>
        <th>Nro</th>
        <th>Origen</th>
        <th>Destino</th>
        <th>Fecha</th>
        <th>Funcionaro</th>
        <th>Estado</th>
        <th>Receptor</th>
        <th>Fecha Cierre</th> 
    </tr>        
      
<!-- end:    query0_subtotal_row -->

<!-- begin: query0_total_row -->
        <tr>
            <td class="item">{nro}</td>
            <td class="item">{origen}</td>
            <td class="item">{destino}</td>
            <td class="item">{fecha}</td>
            <td class="item">{func}</td>
            <td class="item" style="background: {color}">{estado}</td>
            <td class="item">{receptor}</td>
            <td class="item">{cierre}</td> 
        </tr>
<!-- end:    query0_total_row -->

<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->

