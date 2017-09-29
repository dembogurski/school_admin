<!-- 
    Report Template File (rep_stad_cortes)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->

 <style type="text/css">
    tr{
       font-size:13px;
       height:24px;
    }
    tr>td{
        padding-left:3px;
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
    .tot{
      text-align:right;
      padding-right:3px;
      font-size:15px;
      font-weight:bolder;
    }
    .zebra1{
        background:#E8E8E8;
    }
    .zebra0{
      background:white;
    }
</style>
	<treset_page>
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
			style="font-weight: bold;"><big>Estadistica de Cortes &nbsp;&nbsp;Suc.: {sup_rep_localidad} &nbsp;&nbsp;Categoria.: {sup_cli_cat}</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>

        <tr>
          <th colspan="3">
           Periodo: {desde}&nbsp;-&nbsp;{hasta}&nbsp;  &nbsp;&nbsp; Fam: {sup_p_fam} &nbsp;&nbsp;  Grupo: {sup_p_grupo} &nbsp;&nbsp;  Tipo:   {sup_p_tipo} &nbsp;&nbsp;  Color: {sup_p_color}
          </th>
        </tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th >CORTE</th>
        <th  >REPETICIONES</th>
       <th style="width:50%" ></th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr title="{query0_REPETICIONES} repeticiones de  {query0_CORTE} Mts.">
            <td class="num">{query0_CORTE}</td>
            <td class="num">{query0_REPETICIONES}</td>
         </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr>
            <td></td>
            <td></td>

        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td class="tot"><b>{subtotal0_CORTE}</b></td>
            <td class="tot"><b>{subtotal0_REPETICIONES}</b></td>
             
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->

<tr >
   <td colspan="3" align="center" >
      MEDIA:&nbsp;&nbsp; <b>{media}</b> &nbsp;&nbsp;&nbsp;&nbsp; MEDIANA:&nbsp;&nbsp;<b>{mediana}</b> &nbsp;&nbsp;&nbsp;&nbsp;MODA:&nbsp;&nbsp;<b>{moda}  </b>
   </td>
</tr>

<tr>
  <td colspan="3"><b>Breve explicaci&oacute;n</b></td>
</tr>
<tr>
  <td colspan="3"><b>Media: &nbsp;&nbsp;</b>Promedio Sumatoria dividido la cantidad</td>
</tr>
<tr>
  <td colspan="3"><b>Mediana: &nbsp;&nbsp;</b>El elemento que esta en el medio dentro de un grupo de datos ordenados</td>
</tr>
<tr>
  <td colspan="3"><b>Moda: &nbsp;&nbsp;</b>El elemento que mas se repite dentro de un grupo de datos</td>
</tr>

    </tbody>
</table>
<!-- end:   end_query0 -->




