<!-- 
    Report Template File (stock_agrupado)

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
			style="font-weight: bold;"><big>Stock Agrupado x Sucursal</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
                
                <tr>
                  <td><b> </b> </td>   
                  <td style="height: 40px"><b>Sector Grupo Tipo y Color: <i>{sup_p_fam}-{sup_p_grupo}-{sup_p_tipo}-{sup_p_color}</i></b> </td>
                </tr>
                <tr>
                  <td><b> </b> </td>   
                  <td style="height: 40px"><b>Piezas con cantidad > a:&nbsp;&nbsp;{sup_rep_cantidad} &nbsp;&nbsp;&nbsp;&nbsp;Fin de Pieza {sup_fdp}</b> </td>
                </tr>
                
	  </tbody>
	</table> 
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->

</thead>
    </tbody>
</table>
<br>
<table style="text-align: left; width: 40%;" border="1"       cellpadding="0" cellspacing="0">
    <tr>
        <th>SUC</th>
        <th style="text-align: center;">CANT PIEZAS</th>
        <th style="text-align: center;">CANT METROS</th>
    </tr>


<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr>
            <td class="itemc"  >{query0_SUC}</td>
            <td class="num">{query0_CANT}</td>
            <td class="num">{query0_METROS}</td>
         </tr>
<!-- end:    query0_data_row -->
 
<!-- begin: query0_subtotal_row -->
        <tr>
            <td></td>
            <td style="text-align: right;font-size: 14"><b>{subtotal0_CANT}</b></td>
            <td style="text-align: right;font-size: 14"><b>{subtotal0_METROS}</b></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
</table>
<!-- end:   end_query0 -->

