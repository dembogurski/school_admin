<!-- 
    Report Template File (porc_ventas_func)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
	<treset_page>
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
        border-right: 1px solid black;
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
<table style="text-align: left; width: 99%;" border="0"cellpadding="0" cellspacing="0">
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
			style="font-weight: bold;"><big>Porcentaje de Ventas de Funcionarios</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
        <tr> <td colspan="3" align="center"><b>Periodo: &nbsp;&nbsp;  {desde}<-->{hasta} &nbsp;&nbsp;&nbsp;&nbsp;Suc: {sup___local}</b></td>  </tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th>VENDEDOR</th>
        <th>NOMBRE</th>
        
       
        
        <th>NORMAL</th>
        <th>OFERTA</th>
        <th>TOTAL</th>
        <th>%OFERTA</th>
        <th>DESCUENTO</th> 
         <th>DEVOLUCIONES</th>
        <th>NETO</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <tr class="{tr}">
            <td>&nbsp;{query0_VENDEDOR}</td>
            <td>&nbsp;{query0_NOMBRE}</td>
            
           
           
            <td class="num">{TOTAL_11}</td>
            <td class="num">{OFERTA}</td>
            <td class="num">{TOTAL}</td>
            <td class="num">{PORC_OFERTA}&nbsp;%</td>
            <td class="num">{DESCUENTO}&nbsp;</td>
             <td class="num">{MONTO_DEVOLUCION}</td>
            <td class="num">{NETO}</td>
        </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr class="num" style="font-weight:bold;font-size:14px;">
            <td></td>
            <td></td>  <td class="tot">{Z_11}&nbsp;</td> <td class="tot">{Z_OFERTA}&nbsp;</td><td class="tot"  >{Z_CONTADO}&nbsp;</td><td class="tot">{Z_PORC}%&nbsp;&nbsp;</td><td class="tot">{Z_DESCUENTO}&nbsp;</td> <td class="tot">{Z_DEV}</td><td class="tot">{Z_NETO}</td> 
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td></td>
            <td></td> <td></td> <td></td> <td></td><td></td><td></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 noeval -->
    </tbody>
</table>

 
<!-- end:   end_query0 -->

