<!-- 
    Report Template File (faltantes)

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
			style="font-weight: bold;"><big>Reporte de Productos Faltantes</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
                <tr> <td colspan="3"> <b>Producto: <i>{sup_p_fam} -> {sup_p_grupo} -> {sup_p_tipo} -> {sup_p_color}</i> </b>   
                        &nbsp;&nbsp;&nbsp;  <b >Periodo:  {desde}<-->{hasta} </b> </td></tr>
	  </tbody>
	</table> 
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th>FACTURA</th>
        <th>TURNO</th>
        <th>USUARIO</th>
        <th>FECHA</th>
        <th>SUC</th>
        <th>FAMILIA</th>
        <th>GRUPO</th>
        <th>TIPO</th>
        <th>COLOR</th>
        <th style="text-align: right;">CANT</th>
        <th>OBS</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr>
            <td class="item">{query0_FACTURA}</td>
            <td class="item">{query0_TURNO}</td>
            <td class="item">{query0_USUARIO}</td>
            <td class="item">{query0_FECHA}</td>
            <td class="item">{query0_SUC}</td>
            <td class="item">{query0_FAMILIA}</td>
            <td class="item">{query0_GRUPO}</td>
            <td class="item">{query0_TIPO}</td>
            <td class="item">{query0_COLOR}</td>
            <td class="num">{query0_CANT}</td>
            <td class="item">{query0_OBS}</td>
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
            <td style="text-align: right;"><b>{subtotal0_CANT}</b></td>
            <td></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->

