<!-- 
    Report Template File (caJa_chica)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
	 
    <style>

    tr{
       font-size:13px;
       height:26px;
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
    </style>
	<treset_page>
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
		  <td style="width: 184px;"><b>SUC:</b>  {empr} &nbsp;<b>Caja N&deg;:&nbsp;</b>{sup_cj_ref_chi} </td>
		  <td style="text-align: center;">
			<b>RAD Plus</b></td>
		  <td style="text-align: right;">
			<tpage><b>Pag: </b></tpage></td>
		</tr>
		<tr>
		  <td>
			<small><small>ycube plus RAD [1.2.31]</small></small>
		  </td>
		  <td style="text-align: center;"><big
			style="font-weight: bold;"><big>Reporte de Caja Chica &nbsp;&nbsp; Ref. Caja: &nbsp;  {desde}&nbsp;&nbsp; ({sup_cj_tipo})</big></td>
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

        <th>USUARIO</th>
        <th>FECHA</th>
        <th>CONCEPTO</th> 
	<th>INFO_COMPL</th>
        <th>Tipo IVA</th>        
        <th style="text-align: center;">ENTRADA</th>
        <th style="text-align: center;">SALIDA</th>
        
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"> </td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <div class="block"><tr>

            <td align="center">{query0_USUARIO}</td>
             
            <td  align="center">{query0_FECHA}</td>
            <td>&nbsp;{query0_con_nombre}&nbsp;&nbsp;/&nbsp;&nbsp;{query0_subc_nombre}</td>
	    <td>&nbsp;{query0_INFO_COMPL}</td>
            <td align="center" >&nbsp;{query0_tipo_iva}</td>
            <td class="num" >{query0_ENTRADA}</td>
            <td class="num">{query0_SALIDA}</td>
             
        </div> </tr>
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
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td colspan="5" style="text-align:center"> <b>Total Excentas:&nbsp;</b>{excentas} &nbsp;&nbsp;  <b>Total Iva 5%:&nbsp;</b> {iva5} &nbsp;&nbsp; <b> Total Iva 10%:&nbsp;</b> {iva10} </td>
            <td style="text-align: right;"><b>{subtotal0_ENTRADA}&nbsp;</b></td>
            <td style="text-align: right;"><b>{subtotal0_SALIDA}&nbsp;</b></td>
        </tr>
        <tr> <td colspan="4">&nbsp;</td> <td colspan="2" align="right"><b>SALDO:&nbsp;&nbsp;&nbsp;{DIFF}&nbsp;</b> </td>   </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>

<br><br><br><br>
<div style="text-align: center;height: 70px;font-weight: bolder;font-size: 18px"> Recibido por: ________________________________  &nbsp; Fecha: &nbsp; ____/____/&nbsp;{year} </div> 


<!-- end:   end_query0 -->

