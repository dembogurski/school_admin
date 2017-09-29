<!-- 
    Report Template File (rep_ventas_FGT)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
<link rel="stylesheet" type="text/css" href="templates/reports.css" />
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
		  <td style="width: 184px;"> </td>
		  <td style="text-align: center;">
			<b>Marijoa</b></td>
		  <td class="num">
			<tpage><b>Pag: </b></tpage></td>
		</tr>
		<tr>
		  <td>
			<small><small>ycube plus RAD [1.2.31]</small></small>
		  </td>
		  <td style="text-align: center;"><big
			style="font-weight: bold;"><big>Reporte de Ventas Sector Grupo Tipo</big></td>
		  <td class="num">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
                <tr><td></td> <td  style="height:36px" > &nbsp;&nbsp;<b>Periodo: </b> {desde} &rarr; {hasta} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <big> <b>Sector:&nbsp; </b>{sector} </big></td><td></td> </tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th>#</th> 
        <th>SECTOR</th>
        <th>GRUPO</th>
        <th>TIPO</th>
        <th>CANT</th>
        <th>VENTAS</th>
        <th>MARGEN</th>
        <th>COSTO</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <tr>
            <td class="item" > </td>
            <td class="item" >{query0_FAM}</td>
            <td class="item" >{query0_GRUPO}</td>
            <td class="item" >{query0_TIPO}</td>
            <td class="num">{query0_CANT}</td>
            <td class="num">{query0_SUBTOTAL}</td>
            <td class="num">{query0_MARGEN}</td>
            <td class="num">{query0_COSTO}</td>
         </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr>
            <td colspan="4" style="text-align: right"><big> <b>Sector:&nbsp; </b>{sector} &nbsp;&nbsp;</big></td> 
            <td class="num"><b>{total0_CANT}</b></td>
            <td class="num"><b>{total0_SUBTOTAL}</b></td>
            <td class="num"><b>{total0_MARGEN}</b></td>
            <td class="num"><b>{total0_COSTO}</b></td>
        </tr>
        
        
<!-- end:    query0_total_row -->

<!-- begin: query0_total_fam -->
    <tr style="background: {fondo_fam}">
        <td style="text-align: center;font-weight: bolder;background: {fondo_fam}">{cont_fam}</td> 
            <td colspan="3"><b>Total de Sector {familia}</b></td> 
            <td class="num"><b>{subtotal0_CANT_F}</b></td>
            <td class="num"><b>{subtotal0_SUBTOTAL_F}</b></td>
            <td class="num"><b>{subtotal0_MARGEN_F}</b></td>
            <td class="num"><b>{subtotal0_COSTO_F}</b></td>
        </tr>
        <tr><td></td> <td colspan="7" style="heigh:30px">&nbsp;</td> </tr>
        
<!-- end:    query0_total_fam -->

<!-- begin: query0_subtotal_row -->
<tr style="background:rgb(240,240,240) " >
            <td style="text-align: center;font-weight: bolder;"  ></td>
            <td colspan="2" >&nbsp;&nbsp;&nbsp; <i> <b> <small>  {leyenda} </small>  </b>  </i> &nbsp;&nbsp;&nbsp;   </td>
            <td >{cantidades}</td>
            <td class="num"><b>{subtotal0_CANT}</b></td>
            <td class="num"><b>{subtotal0_SUBTOTAL}</b></td>
            <td class="num"><b>{subtotal0_MARGEN}</b></td>
            <td class="num"><b>{subtotal0_COSTO}</b></td>
        </tr>
        
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->

