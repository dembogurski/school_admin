<!-- 
    Report Template File (asiento_preview)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
        <link rel="stylesheet" type="text/css" href="templates/reports.css" />
	<treset_page>
            
<style>

    .cabecera{
        border-width: 1px 0px 1px 1px;
         border-style: solid;
    } 
    .cabecera2{
       border-width: 1px 1px 1px 1px;
         border-style: solid;
    }
    
    .der{
      border-width: 0px 1px 0px 1px;
      text-align: center;
      font-size: 14px;    
      border-style: solid;
      padding-right: 4px;
      padding-left: 4px; 
    } 
    .izq{
      border-width: 0px 0px 0px 1px;
      text-align: left;
      font-size: 14px;    
      border-style: solid;
      padding-left: 4px; 
      padding-right: 4px; 
    } 
                
</style>    
<!-- end:   general_header -->


<!-- begin: start_query0 -->
<table style="text-align: left; width: 99%;" border="0" cellpadding="0" cellspacing="0">
    <tbody>
    <thead>
<tr> <td colspan="50"> 
	<table style="text-align: left; width: 100%;" border="1"
	 cellpadding="0" cellspacing="0">
	  <tbody>
		<tr>
                    <td style="width: 20%;padding-left: 4px"><b>Suc:</b> {sup_suc} </td>
		  <td style="text-align: center;width: 60%;">
			<b>Marijoa Tejidos</b></td>
		  <td style="text-align: right;width: 20%;">
			<tpage><b>Pag: </b></tpage></td>
		</tr>
		<tr>
		  <td style="padding-left: 4px">
			<small><small>ycube plus RAD [1.2.31]</small></small>
		  </td>
		  <td style="text-align: center;"><big
                      style="font-weight: bold;"><big>Libro Diario</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
                <tr> <td colspan="3" align="center"><b>Periodo: <i> &nbsp;{desde}&nbsp; &hArr; &nbsp;{hasta} </i></b></td> </tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th class="cabecera" style="width:40px" >NRO</th>
        <th class="cabecera" >FECHA</th>
        <th class="cabecera" >REF</th>
        <th class="cabecera" >DESCRIPCION</th>
        <th class="cabecera" >DEBE</th>
        <th class="cabecera2" >HABER</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
<tr style="background:{fondo}">
            <td class="izq" style="text-align: center">{query0_NRO}</td>
            <td class="izq">{query0_FECHA}</td>
            <td class="izq">{query0_REF}</td>
            <td class="izq">{query0_DESCRIPCION}</td>
            <td class="izq" style="text-align:right">{query0_DEBE}</td>
            <td class="der" style="text-align:right">{query0_HABER}</td>
        </tr>
<!-- end:    query0_data_row -->

<!-- begin: obs -->
        <tr style="background:{fondo}">
            <td class="izq" style="text-align: center;height: 52px">&nbsp;</td>
            <td class="izq">&nbsp;</td>
            <td class="izq">&nbsp;</td>
            <td class="izq">{query0_OBS}&nbsp;</td>
            <td class="izq" style="text-align:right">&nbsp;</td>
            <td class="der" style="text-align:right">&nbsp;</td>
        </tr>
<!-- end:    obs -->

<!-- begin: query0_total_row -->
        <tr>
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
            <td class="izq">&nbsp;</td>
            <td class="izq">&nbsp;</td>
            <td class="izq">&nbsp;</td>
            <td class="izq">&nbsp;</td>
            <td class="izq" style="text-align: right;font-size: 14px"><b><u>{subtotal0_DEBE}</u></b></td>
            <td class="der" style="text-align: right; right;font-size: 14px"><b><u>{subtotal0_HABER}</u></b></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->

