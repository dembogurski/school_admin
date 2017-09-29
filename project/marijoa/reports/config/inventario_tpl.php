<!-- 
    Report Template File (inventario)

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
                      style="font-weight: bold;"><big>Reporte de Inventario  &nbsp;&nbsp;&nbsp;Suc: &nbsp; {sup_suc_} &nbsp;&nbsp;&nbsp;Filtro: {sup_tipo}</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
<tr >
        <th>COD. Sistema</th>
        <th>CANT</th>
        <th>C. CIF</th>
        <th>C. FOB</th>
        <th>FAM</th>
        <th>GRUPO</th>
        <th>TIPO</th>
        <th>COLOR</th>
        
        <th>COD. PUNTEO</th>
        <th>SUC. PUNTEO</th>
        <th>SUC. SIS</th>
        <th>HITS</th>
        <th>USUARIO</th>
        <th>FECHA/HORA</th>
        <th>DUPLICADO</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr title="{producto}">
            <td class="item">{query0_p_cod}</td> 
            <td class="num">{query0_p_cant}</td>
            <td class="num">{query0_p_compra}</td>
            <td class="num">{query0_fob}</td>
            <td class="item">{query0_p_fam}</td>
            <td class="item">{query0_p_grupo}</td>
            <td class="item">{query0_p_tipo}</td>
            <td class="item">{query0_p_color}</td>
            
            <td class="item">{query0_codigo}</td>
            <td class="item" style="text-align: center" > {query0_suc_punteo} </td>
            <td class="item" style="text-align: center;background-color: {color}; " >{query0_suc_s}</td>
            <td class="item" style="text-align: center">{query0_hits}</td>
            <td class="item" style="text-align: center">{query0_usuario}</td>
            <td class="item">{query0_fecha_hora}</td>
            <td class="item" style="text-align: center">{query0_duplicado}</td>
         </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr>
            
            <th>Cant.: &nbsp;&nbsp; {cant} &nbsp;/&nbsp;{total}</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <th>{duplicados}</th>
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
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->

