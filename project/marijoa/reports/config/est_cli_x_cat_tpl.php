<!-- 
    Report Template File (est_cli_x_cat)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
	<treset_page>
    <style>

    tr{
       font-size:13px;
       height:26px;
    }
    th{
       font-size:14px;
       font-weight:bolder;
       text-align:left;
    }
    .num{
      text-align:right;
      padding-right:3px;
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
			style="font-weight: bold;"><big>Reporte de Estructura de Clientes x Categoria</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
        <tr> <td colspan="3" align="center"><b>Fecha/Periodo:&nbsp;&nbsp;{desde}&nbsp;&nbsp;<->&nbsp;&nbsp;{hasta}   </b> </td> </tr>
        <tr> <td colspan="3" align="left"><b><big>  &nbsp;&nbsp; FAMILIA: {sup_fam}</big> </b> </td> </tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th colspan="6">&nbsp;SUC &nbsp;/&nbsp; NOMBRE</th> <th style="width:40% "> </th>

    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr style="background:#FFFFCC;">
            <th style="width:140px" colspan="1" >&nbsp;{query0_SUC} &nbsp;&nbsp; {query0_NOMBRE}</th>
            <th  colspan="2" style="text-align:center;width:120px;background:#CCCC99;"> F&Iacute;SICO </th>
            <th  colspan="2" style="text-align:center;width:120px;background:#FFFFCC;"> JUR&Iacute;DICO </th>
        </tr>
<!-- end:    query0_data_row -->
 
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->

<!-- begin: categoria -->
     <tr style="font-size:14px;">
      <th style="width:60px" ><b>&nbsp;Categoria {cat}</b></th>  <th style="text-align:center;width:60px" ><b>&nbsp;VALOR G$</b></th>   <th style="text-align:center;width:60px" ><b>&nbsp;CLIENTES</b></th><th style="text-align:center;width:60px" ><b>&nbsp;VALOR G$</b></th>   <th style="text-align:center;width:60px" ><b>&nbsp;CLIENTES</b></th>
     </tr>
<!-- end:   categoria -->

<!-- begin: categoria_data -->
     <tr>
      <td>&nbsp;&nbsp;{rango}</td>   <td class="num">{total}</td>   <td  class="num">{cant_cli}&nbsp;</td> <td class="num">{total_jur}</td>   <td  class="num">{cant_cli_jur}&nbsp;</td>
     </tr>
<!-- end:   categoria_data -->
<!-- begin: categoria_total -->
     <tr>
      <td><b>&nbsp; TOTAL </b> </td>   <th class="num">{z_total}</th>   <th class="num">{z_cant_cli}&nbsp;</th>   <th class="num">{z_total_jur}</th>   <th class="num">{z_cant_cli_jur}&nbsp;</th>
     </tr>
<!-- end:   categoria_total -->


<!-- begin: titulo_resumen -->
<tr>
   <th colspan="5" style="background:lightgray; color:black;" align="center">Resumen por Categoria</th>
</tr>
<!-- end:   titulo_resumen -->

<!-- begin: cat -->
<tr>
 <th  style="background:#660000; color:white;"> &nbsp;CATEGORIA &nbsp; {cat}</th> <th>&nbsp;F&Iacute;SICO</th> <th>&nbsp;Cant CLIENTES</th><th>&nbsp;JUR&Iacute;DICO</th><th>&nbsp;Cant CLIENTES</th>
</tr>
<!-- end:   cat -->

<!-- begin: totales_rango_x_cat -->
<tr>
 <td>&nbsp;&nbsp;{range}</td><td class="num">{sumatoria_cat}</td><td class="num">{cant_cli_fis}</td> <td class="num">{sumatoria_cat_jur}</td><td class="num">{cant_jur_cli}</td>
</tr>
<!-- end:   totales_rango_x_cat -->




