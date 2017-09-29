<!-- 
    Report Template File (cheq_terceros)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
	<treset_page>
<link rel="stylesheet" type="text/css" href="templates/reports.css" /> 

  
<!-- end:   general_header -->


<!-- begin: start_query0 -->
<table style="text-align: left; width: 99%;" border="1"cellpadding="0" cellspacing="0">
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
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
 <tr>
        <th>REF</th>
        <th>BANCO</th>
        <th>CUENTA</th>
        <th>NRO</th>
        
        <th >VALOR</th>
        <th >MON</th>
        <th>COTIZ</th>
        <th >VALOR_GS</th>
        
        <th>NOMBRE_DE</th>
         <th>FECHA_INS</th>
        <th>FECHA_EMIS</th>
        <th>FECHA_PAG</th>


        <th>DOCS</th>
        <th>ESTADO</th>
        <th>R. ADM</th>
        <th>R. GER</th>
        
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
<tr>
            <td class="item">{query0_REF}</td>
            <td class="item">{query0_BANCO}</td>
            <td class="item">{query0_CUENTA}</td>
            <td class="item">{query0_NRO}</td>
            
            <td class="num">{query0_VALOR}</td>
            <td class="item" >{query0_MON}</td>
            <td class="num">{query0_COTIZ}</td>
            <td class="num">{query0_VALOR_GS}</td>
            
            <td class="item">{query0_NOMBRE_DE}</td>
            <td  class="item" style="text-align: center;"  >{query0_FECHA_INS}</td>
            <td  class="item" style="text-align: center;"  >{query0_FECHA_EMIS}</td>
            <td  class="item" style="text-align: center;"  >{query0_FECHA_PAG}</td>
            <td>{query0_DOCS}</td>
            <td class="item" style="border-style:solid;border-color:{color};">{query0_ESTADO}</td>
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
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->

