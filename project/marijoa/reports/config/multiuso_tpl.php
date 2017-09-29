<!-- 
    Report Template File (multiuso)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
       <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
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
			style="font-weight: bold;"><big>Reporte Multi Uso</big></td>
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
         
        <th title="{query0_p_ref}">Codigo</th>
        <th>Suc</th>
        <th>Sector</th>
        <th>Grupo</th>
        <th>Tipo</th>
        <th>Color</th>
        <th>Estructura</th>
        <th>Cant</th>
        <th>Gram</th>
        <th>Kg</th>
        <th>Tara</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr>
            
            <td class="item">{codigo}</td>
            <td class="itemc">&nbsp;{suc}&nbsp;</td>
            <td class="item">{fam}</td>
            <td class="item">{grupo}</td>
            <td class="item">{tipo}</td>
            <td class="item">{color}</td>
            <td class="item">{estruc}</td>
            <td class="num">{cant}</td>
            <td class="num">{gram}</td>
            <td class="num">{kg}</td>
            <td class="num">{tara}</td>
            
         </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td colspan="7"><b>Total: {filas}</b></td> 
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->
