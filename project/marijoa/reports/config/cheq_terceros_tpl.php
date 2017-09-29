<!-- 
    Report Template File (cheq_terceros)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
<link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
	<treset_page>
 
<!-- end:   general_header -->


<!-- begin: start_query0 -->
<table style="text-align: left; width: 99%;border-collapse:collapse;border-width: 1px;"  cellpadding="0" cellspacing="0">
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
			style="font-weight: bold;"><big>Reporte de Cheques de Terceros  &nbsp;&nbsp;Suc.:&nbsp;{sup_empr}</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
                <tr><td colspan="3" style="text-align: center">Filtrado por fecha de: {sup_tipo_fecha}&nbsp;&nbsp;&nbsp;{sup_desde}<->{sup_hasta}</td></tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
<table style="text-align: left; width: 99%;border-collapse: collapse; border-width: 1px;border-color: #999999;" border="1"  cellpadding="0" cellspacing="0">
    <tr style="font-size: 10px">
        <th>Ref</th>
        <th>Suc</th>
        <th>Banco</th>
        <th>Cuenta</th>
        <th>N&deg;</th>
        
        <th >Valor</th>
        <th >$</th>
        <th>Cot</th>
        <th >Valor Gs</th>
        
        <th>Titular</th>
         <th>Fecha_Reg</th>
        <th>Fecha_Emis</th>
        <th>Fecha_Pag</th> 
        <th>Tipo</th> 
        
        <th>Forma_Cob</th>
        <th>Fecha_Dep</th> 
        <th>Fecha_Acred</th> 
        <th>Banco Dep</th>
        <th>Cuenta Dep</th>
        <th>Estado</th>
        <th>R. Adm</th>
        <th>R. Ger</th>
        
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
       <tr>
            <td class="item">{query0_REF}</td>
            <td class="item">{query0_SUC}</td>
            <td class="item">{query0_BANCO}</td>
            <td class="item">{query0_CUENTA}</td>
            <td class="item">{query0_NRO}</td>
            
            <td class="num">{query0_VALOR}</td>
            <td class="item" >{query0_MON}</td>
            <td class="num">{query0_COTIZ}</td>
            <td class="num">{query0_VALOR_GS}</td>
            
            <td class="item" title="{query0_DOCS}">{query0_NOMBRE_DE}</td>
            <td  class="item" style="text-align: center;"  >{query0_FECHA_INS}</td>
            <td  class="item" style="text-align: center;"  >{query0_FECHA_EMIS}</td>
            <td  class="item" style="text-align: center;"  >{query0_FECHA_PAG}</td>
            <td  class="item" style="text-align: center;"  >{query0_TIPO}</td>
            <td  class="item" style="text-align: center;"  >{query0_FORMA}</td>
            <td  class="item" style="text-align: center;"  >{query0_FECHA_DEP}</td>
            <td  class="item" style="text-align: center;"  >{query0_FECHA_ACREED}</td>
            <td class="item">{query0_BANCO_DEP}</td>
            <td class="item">{query0_CUENTA_DEP}</td>
            <td class="item">{query0_ESTADO}</td>
            <td class="item">{query0_ADMIN}</td>
            <td class="item">{query0_GERENCIA}</td>
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
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align: right;"><b>{subtotal0_VALOR}</b></td>
            <td></td>
            <td></td>
            <td style="text-align: right;"><b>{subtotal0_VALOR_GS}</b></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
		</table>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->

