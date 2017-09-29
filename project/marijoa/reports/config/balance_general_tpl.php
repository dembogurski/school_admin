<!-- 
    Report Template File (balance_general)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
       <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
	<treset_page>
<!-- end:   general_header -->


<!-- begin: start_query0 -->
<table style="text-align: left; width: 99%;" border="0" cellpadding="2" cellspacing="0">
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
			style="font-weight: bold;"><big>Balance General</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
                <tr> <td colspan="3" style="text-align: center;font-weight: bolder">Balance a la fecha: {hasta}</td> </tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th>CODIGO</th>
        <th>CUENTA</th>
        <th>SALDO</th> 
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <tr style="font-weight: {estilo};background:{fondo}">
            <td class="item">{query0_CODIGO}</td>
            <td class="item">{query0_CUENTA}</td>
            <td class="num">{saldo}</td> 
         </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
 
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
     
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


<!-- begin: resultado_ejercicio -->
<table border="1" cellspacing="0" cellpadding="0" style="width:40%">
    
    <tr>
        <th style="text-align:center;font-size:18px" colspan="2">Resultado del Ejercicio</th>
    </tr> 
    <tr>
       <th style="text-align:left" >Total Activo</th> <td class="num" > {total_activo}</td>
    </tr>    
    <tr>
        <th style="text-align:left">Total Pasivo</th> <td class="num">{total_pasivo}</td>
    </tr>
    <tr>
        <th style="text-align:left">Patrimonio Neto</th> <td class="num">{total_p_neto}</td>
    </tr>
    <tr>
        <th style="text-align:left">Total Ingreso</th> <td class="num">{total_ingresos}</td>
    </tr>
    <tr>
        <th style="text-align:left">Total Egreso</th> <td class="num">{total_egresos}</td>
    </tr>
    <tr>
        <th style="text-align:left">Resultado del Ejercicio</th> <td class="num">{resultado}</td>
    </tr>
</table>
<!-- end:   resultado_ejercicio -->

