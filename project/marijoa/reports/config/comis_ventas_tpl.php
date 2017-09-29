<!-- 
    Report Template File (comis_ventas)

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
                      style="font-weight: bold;"><big>Calculo de Comision por Ventas</big> <br><b>Periodo:</b> {desde} <big>&#8596;</big> {hasta}  &nbsp;&nbsp;Suc:&nbsp;{sup_empr}</td>
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
        <th>Vendedor</th>
        <th>Cat</th>
        <th>Sector</th>
        <th>Grupo</th>
        <th>Tipo</th>
        <th>PrecioC</th>
        <th>Suc</th>
        <th >Unidades</th>
        <th >Valor Comis.</th>
        <th >Subtotal</th>
        
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr>
             <td class="item">{query0_Vendedor}</td>
            <td class="item">{query0_Cat}</td>
            <td class="item">{query0_p_fam}</td>
            <td class="item">{query0_p_grupo}</td>
            <td class="item">{query0_p_tipo}</td>
            <td class="num">{query0_P1}</td>
            <td  class="itemc">{query0_Suc}</td>
            <td  class="itemc">{query0_Unidades}</td>
            <td  class="num">{mult}</td>
            <td  class="num">{subtotal}</td>
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
            <td style="text-align: center;"><b>{total0_Unidades}</b></td>
            <td></td>
            <td style="text-align: center;"><b>{total}</b></td>
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
            <td style="text-align: center;"><b>{subtotal0_Unidades}</b></td>
            <td></td>
            <td style="text-align: right;"><b>{total_subtotal}</b></td> 
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->

