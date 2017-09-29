<!-- 
    Report Template File (est_carga_prod)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
    <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
	<treset_page>
          <style>

    tr{
       font-size:13px;

    }
    th{
       font-size:13px;
       font-weight:bolder;
       text-align:center;
    }
    .num{
      text-align:right;
      padding-right:3px;
    }
    .even{
       background-color:lightgray;
    }
    .odd{
       background-color:white;
    }
    </style>
<!-- end:   general_header -->


<!-- begin: start_query0 -->
<table style="text-align: left; width: 80%;" border="1"cellpadding="0" cellspacing="0">
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
			style="font-weight: bold;"><big>Estadistica de Carga de Productos&nbsp;&nbsp;Usuario:&nbsp;{sup___user}</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
        <tr> <td colspan="3" align="center"><b>Periodo: &nbsp;&nbsp;  {desde}<-->{hasta} </b></td>  </tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th>IMP-EXP</th>
        <th>FECHA</th>
        <th>USUARIO</th>
        <th>CODIGO</th>
        <th>PADRE</th>
        <th style="text-align: right;">CANT_COMPRA</th>
        <th>COSTO</th>
        <th>REC</th>
        <th>G. ADMIN</th>
        <th>COSTO TOTAL</th>
       
        
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <tr>
            <td>&nbsp;{query0_IMP_EXP}</td>
             <td>&nbsp;{query0_FECHA}</td>
            <td>&nbsp;{query0_USUARIO}</td>
            <td>&nbsp;{query0_CODIGO}</td>
            <td>&nbsp;{query0_PADRE}</td>
            <td style="text-align: right;">&nbsp;{query0_CANT_COMPRA}&nbsp;</td>
            <td class="num">{query0_COSTO}</td> 
            <td class="num">{query0_REC}</td>
            <td class="num">{query0_G_ADMIN}</td>
            <td class="num">{query0_TOTAL_COSTO}</td>
            
        </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr>
            <td></td><td></td>
            <td></td>
            <td></td>
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td></td><td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align: right;"><b>{subtotal0_CANT_COMPRA}</b></td>
            <td style="text-align: right;"><b>{z_costo}</b></td>
            <td></td>
            <td style="text-align: right;"><b>{z_gadmin}</b></td>
            <td style="text-align: right;"><b>{z_total_costo}</b></td>
        </tr>
        <tr> <th align="left" style="font-size:15px;" colspan="11">Padres:&nbsp;{i}&nbsp;&nbsp;Hijos:&nbsp;{j}&nbsp;&nbsp; TOTAL:&nbsp;{k} &nbsp;piezas  &nbsp;&nbsp; Sumatoria Mts. Padres:&nbsp;  {zi} <br>Sumatoria Mts. Hijos:&nbsp;  {zj} &nbsp;&nbsp;Lisos:{z_lisos}&nbsp;&nbsp;Estampados:{z_estamp}   </th> </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->

