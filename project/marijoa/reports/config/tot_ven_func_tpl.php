<!-- 
    Report Template File (tot_ven_func)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
	<treset_page  >
    
        <style>

    tr{
       font-size:13px; 
    }
    th{
       font-size:13px;
       font-weight:bolder;
       text-align:center;
       border-width: 1px;
       border-style: solid;
    }
    .num{
      text-align:right;
      padding-right:3px; 
    }
    .tot{
        border-right: 1px solid black;
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
<table style="text-align: left; width: 99%;" border="1" cellpadding="0" cellspacing="0">
    <tbody>
    <thead>
<tr> <td colspan="30">
	<table style="text-align: left; width: 100%;" border="1" cellpadding="0" cellspacing="0">
	  <tbody>
		<tr>
		  <td style="width:20%;">&nbsp;</td>
		  <td style="text-align: center; width:60%;"> 	<b>Marijoa</b>    </td>
          <td style="text-align: right;width: 20%;">  <tpage><b>Pag: </b></tpage>     </td>
        </tr>
		<tr>
		  <td style="width:20%;">
			<small><small>ycube plus RAD [1.2.31]</small></small>
		  </td>
		  <td style="text-align: center;width:60%; "><big style="font-weight: bold;"><big>Reporte de Ventas de Funcionarios  </big> </td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
		<tr> <td align="center" colspan="3"> <b>SUCURSAL: {sup_empr}  &nbsp;&nbsp;  PERIODO: </b> {data_ini}<->{data_fin}  </td> </tr>
	  </tbody>
	</table> 
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th>FUNCIONARIO</th> <th  align="center" >TOTAL</th> <th>DEVOLUCIONES</th> <th>NETO</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr>
            <td>{query0_FUNCIONARIO}</td> <td  align="right" class="num" > {total} &nbsp;&nbsp;</td><td   align="right"  class="num" >{MONTO_DEVOLUCION}&nbsp;&nbsp;</td><td   align="right"  class="num" >{NETO}&nbsp;&nbsp;</td>
         </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr style="font-weight:bolder;">
		   <td> <b> TOTALES: </b> </td> <td  align="right" >  {Z_TOTAL}  &nbsp;&nbsp;</td> <td   align="right" >{Z_DEV}&nbsp;&nbsp;</td> <td   align="right" >{Z_NETO}&nbsp;&nbsp;</td>
           
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
             <td></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->

