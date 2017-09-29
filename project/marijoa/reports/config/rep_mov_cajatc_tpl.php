<!-- 
    Report Template File (rep_mov_caja)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
	<treset_page>
     <style>

    tr{
       font-size:13px;
       height:22px;
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
    .no_display{
       display:none;
    }
    </style>
<!-- end:   general_header -->


<!-- begin: start_query0 -->
<table style="text-align: left; width: 99%;" border="1"cellpadding="0" cellspacing="0">
    <tbody>
    <thead>
<tr> <td colspan="50"> 
	<table style="text-align: left; width: 99%;" border="0"
	 cellpadding="0" cellspacing="2">
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
			style="font-weight: bold;"><big>Reporte de Movimientos de caja Base Tipo de Cambio de Mercado &nbsp;&nbsp;&nbsp;&nbsp;SUC.:{sup_empr}</big></td>
		  <td class="num">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
	  </tbody>
	</table> 
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>

        <th>FECHA</th>
        <th>EoS</th>
        <th>COMPLEMENTO</th>
        <th>MONEDA</th>
        <th>ENTRADA</th>
        <th>SALIDA</th>
        <th>COTIZ</th>
        <th style="text-align: center;">E_REF</th>
        <th style="text-align: center;">S_REF</th>
        <th style="background:lightgrey">COTIZM</th>
        <th style="text-align: center;background:lightgrey">E_REFM</th>
        <th style="text-align: center;background:lightgrey">S_REFM</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"> </td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <tr>
            
            <td style="text-align: center;">{query0_FECHA}</td>
            <td style="text-align: center;">{query0_EoS}</td>
            <td>&nbsp;{query0_COMPL}</td>
            <td style="text-align: center;">{query0_MONEDA}</td>
            <td class="num">{query0_ENTRADA}</td>
            <td class="num">{query0_SALIDA}</td>
            <td style="text-align: center;">{query0_COTIZ}</td>
            <td class="num">{query0_E_REF}</td>
            <td class="num">{query0_S_REF}</td>
            <td style="text-align: center;">{query0_COTIZM}</td>
            <td class="num">{query0_E_REFM}</td>
            <td class="num">{query0_S_REFM}</td>
         </tr>
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
            <td></td>
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
           
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="num"><b>{entrada}</b></td>
            <td class="num"><b>{salida}</b></td>
            <td></td>
            <td class="num"><b>{subtotal0_E_REF}</b></td>
            <td class="num"><b>{subtotal0_S_REF}</b></td>
            <td></td>
            <td class="num"><b>{subtotal0_E_REFM}</b></td>
            <td class="num"><b>{subtotal0_S_REFM}</b></td>
        </tr>
	<tr><td colspan='10'>.</td> </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td> 
             
           <td colspan='2' style="text-align: right;background-color:rgb({fondo},{fondo},{fondo})"><b> {es_moneda}      </b></td>
	   <td   style="text-align: right; "><b> {dif}   </b></td>
           <td colspan='2' style="text-align: right; background-color:rgb(200,200,200)"><b> E - REF - S - REF :  &nbsp;&nbsp;     </b></td>
	   <td   style="text-align: right; "><b>    {diferencia} </b></td>
           <td colspan='2' style="text-align: right; background-color:rgb(200,200,200)"><b> E - REFM - S - REFM :  &nbsp;&nbsp;     </b></td>
           <td   style="text-align: right; "><b>    {diferenciaM} </b></td>
</tr>	    

<tr>
    <td colspan="9"></td> <td colspan='2' style="text-align: right; background-color:rgb(200,200,200)"><b>Diff:&nbsp;&nbsp;</b></td> <td   style="text-align: right;color:red;"> {diff_diff} </td>
</tr>
	 
         
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<br><br>
<div align="center">  <b>Elaborado por:&nbsp; _______________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Verificado por:&nbsp; _______________ </b>     </div>
<!-- end:   end_query0 -->

