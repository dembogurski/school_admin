<!-- 
    Report Template File (movs_de_cuenta)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
<link rel="stylesheet" type="text/css" href="templates/reports.css" />
	<treset_page>
     <style>
/*
    tr{
       font-size:14px; 
    }
    tr>td{
        padding-left:3px;
        padding-right:3px;
    }
    th{
       font-size:13px;
       font-weight:bolder;
       text-align:center;
    }
    .num{
      text-align:right;
      padding-right:3px;
    } */

    </style>
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
			style="font-weight: bold;font-size: 14px"><big>Movimientos de Cuenta Bancaria</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>

                <tr> <td colspan="3" align="center" style="font-size: 13px"><b>Fecha/Periodo:&nbsp;&nbsp;{desde}&nbsp;&nbsp;-&nbsp;&nbsp;{hasta}  &nbsp;&nbsp;&nbsp;&nbsp; Cuenta:  {sup_chq_cta}  </b> </td> </tr>
	  </tbody>
	</table>
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th style="text-align: center;">FECHA</th>
        <th> COMPLEMENTO</th>
        <th> DOC</th>
        <th style="text-align: right;">S_ANTERIOR </th>
        <th style="text-align: right;">ENTRADA </th>
        <th style="text-align: right;">SALIDA </th>
        <th style="text-align: right;">SALDO_ACTUAL </th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
       <tr>
            <td class="item"> {query0_FECHA}</td>
            <td class="item"> {query0_COMPLEMENTO}</td>
	    <td class="item"> {query0_DOC}</td>
            <td class="num">{query0_S_ANTERIOR} </td>
            <td class="num">{query0_ENTRADA} </td>
            <td class="num">{query0_SALIDA} </td>
            <td class="num">{query0_SALDO_ACTUAL} </td>
          </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr>
            <td></td><td></td>
            <td></td>
            <td></td>
            <td style="text-align: right;font-size: 13px"><b>&Sigma;&nbsp;&nbsp;{total0_ENTRADA}&nbsp; </b></td>
            <td style="text-align: right;font-size: 13px"><b>&Sigma;&nbsp;&nbsp;{total0_SALIDA}&nbsp; </b></td>
            <td style="text-align: right;font-size: 13px"><b>{total0_SALDO_ACTUAL}&nbsp; </b></td>
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td></td><td></td>
            <td></td>
            <td></td>
            <td style="text-align: right;font-size: 13px"><b>{subtotal0_ENTRADA}&nbsp; </b></td>
            <td style="text-align: right;font-size: 13px"><b>{subtotal0_SALIDA}&nbsp; </b></td>
            <td style="text-align: right;font-size: 13px"><b>{subtotal0_SALDO_ACTUAL}&nbsp; </b></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->

