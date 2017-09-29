<!-- 
    Report Template File (ajuste_salida)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
       <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
       <style>
	   @media print{
		   .resumen{
			   display:none;
		   }
	   }
	   </style>
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
			style="font-weight: bold;"><big>Reporte de Ajustes en Salida</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
                
                <tr> <td><b>Usuario:</b>{sup_usuario}</td> <td><b>Operaci&oacute;n: </b>{sup_oper}  &nbsp; &nbsp; Periodo:&nbsp;&nbsp;{desde}<-->{hasta}&nbsp;&nbsp;&nbsp;<b>Suc:&nbsp;{sup_suc_}&nbsp;&nbsp;{tol}</b> </td> </tr>
	  </tbody>
	</table> 
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
	    <th>#</th>
        <th>CODIGO</th>
        <th>FECHA</th>
        <!--<th>HORA</th>-->
        <th>CANT. V.</th>
        <!--<th>C_INI</th>-->
        <th>AJUSTE</th>
        <th>C_FINAL</th>
        <th>FP</th>
	<th>+-</th>
        <th>MOTIVO</th>
        <th>VALOR</th>
        <th>VENDEDOR</th>
        <th>VERIFICADOR</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"> </td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr style="font-size:12px"   >
		    <td class="itemc" style="height:22px;font-size:12px">{i}</td>
            <td class="item" style="height:22px;font-size:12px">{query0_CODIGO}</td>
            <td class="item"  style="font-size:12px"  >{query0_FECHA}</td>
            <!--<td class="item">{query0_HORA}</td> -->
            <td class="item"  style="font-size:12px"  >{query0_CANT_V}</td>             
            <!--<td class="num">{query0_C_INI}</td>-->
            <td class="num"  style="font-size:12px"  >{query0_AJUSTE}</td>
            <td class="num"  style="font-size:12px"  >{query0_C_FINAL}</td> 
            <td class="item"  style="font-size:12px"  >{query0_FDP}</td>
			<td class="itemc"  style="font-size:12px"  >{signo}</td>
            <td class="item"  style="font-size:12px"  >{query0_MOTIVO}</td>
            <td class="num"  style="font-size:12px"  >{monto}</td>
            <td class="item"  style="font-size:12px"  >{vendedor}</td>
            <td class="item"  style="font-size:12px"  >{query0_VERIF}</td>
         </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row_header -->
        <tr class="resumen">
			<td></td>            
            <td {style} colspan="6">Resumen</td>
		    <td></td>
            <td></td>
            <td></td>
            <td></td><td></td>
            <td></td>
        </tr>
<!-- end:    query0_total_row_header -->
<!-- begin: query0_total_row -->
        <tr class="resumen">
			<td></td>            
            <td {style} colspan="4">{vend}</td>
            <td {style} colspan="2">{vend_total}</td>            
	        
		    <td></td>
            <td></td>
            <td></td>
            <td></td><td></td>
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
            <td class="num" style="font-size: 14px"><b>{total_monto} </b></td>
            <td></td><td></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<br><br><br><br>
<div style="text-align: center;height:100px">
    <labe style="font-weight: bolder">Verificado por:___________________________</labe>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <labe style="font-weight: bolder">Elaborado por:___________________________</labe>
</div>
<!-- end:   end_query0 -->

