<!-- 
    Report Template File (meta_x_antigued)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
       <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
	<treset_page>
<!-- end:   general_header -->


<!-- begin: start_query0 -->
<table style="text-align: left; width: 80%;" border="1" cellpadding="0" cellspacing="0">
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
                      style="font-weight: bold;"><big>Calculo de Metas por Antig&uuml;edad</big></td>
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
        <th>CODIGO</th>
        <th>NOMBRE</th>
        <th>FECHA_CONT</th>
        <th>ANTIG&Uuml;EDAD</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr>
            <td class="item" style="font-size: 16px">{query0_CODIGO}</td>
            <td class="item" style="font-size: 16px">{query0_NOMBRE}</td>
            <td class="item" style="font-size: 16px">{query0_FECHA_CONT}</td>
            <td class="num" style="font-size: 16px">{query0_ANTIGUEDAD}</td>
         </tr>
<!-- end:    query0_data_row -->

<!-- begin: cath -->
<tr> <td colspan="4" style="height: 36px">&nbsp;</td> </tr>
    <tr>
        <th>CATEGORIA</th>
        <th>RANGO</th>
        <th>META</th>
        <th>SUELDO BASE</th>
    </tr>
 
<!-- end:    cath -->

<!-- begin: cat -->
 
        <tr>
            <td class="item" style="font-size: 16px">{categ}</td>
            <td class="item" style="font-size: 16px;text-align: center" >{rango}</td>
            <td class="num" style="font-size: 16px">{meta}</td>
            <td class="num" style="font-size: 16px">{sb}</td>
        </tr>
<!-- end:    cat -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
<!-- end:    query0_subtotal_row -->


<!-- begin: not_found -->
         <tr>
             <td class="item" colspan="4" style="font-size: 16px">Antiguedad no corresponde a ninguna categoria</td>
            
         </tr>
<!-- end:    not_found -->

<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->

