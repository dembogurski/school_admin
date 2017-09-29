<!-- 
    Report Template File (rep_gastos)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
 
 <style type="text/css">
 .num{
   text-align:right;
   font-size:13px;
 }
 .dato{
    font-size:13px;
 }
  .head{
    font-size:13px;
    font-weight:bolder;
 }
 </style>

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
		  <td style="text-align: right;">
			<tpage><b>Pag: </b></tpage></td>
		</tr>
		<tr>
		  <td>
			<small><small>ycube plus RAD [1.2.31]</small></small>
		  </td>
		  <td style="text-align: center;"><big
			style="font-weight: bold;"><big>Reporte de Gastos</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
        <tr> <td colspan="3" align="center"><b>Fecha/Periodo:&nbsp;&nbsp;{desde}-{hasta} &nbsp;&nbsp; [{sup_local}]</b> </td> </tr>
	  </tbody>
	</table>
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr style="font-weight:bolder;">
        <th>CODIGO</th>
        <th>DESCRIPCION</th>
        <th>TIPO</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr  style="font-weight:bolder;">
            <td>&nbsp;&nbsp;{query0_CODIGO}</td>
            <td>&nbsp;{query0_DESCRIPCION}</td>
            <td>&nbsp;{query0_TIPO}</td>
         </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr>
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
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


<!-- begin: cab -->
        <tr>
            <td colspan="3">
   <table border="1" cellpadding="0" cellspacing="0" width="100%">

<!-- end:    cab -->

<!-- begin: sub_head -->

               <tr>
           <td class="head"  width="50px">&nbsp;ID</td>
            <td class="head"  width="50px">&nbsp;SUC</td>
           <td class="head"  width="50px">&nbsp;FECHA</td>
           <td class="head"  width="100px">&nbsp;DEPTO.</td>
           <td class="head"  width="50px">&nbsp;USUARIO</td>
           <td class="head"  width="150px">&nbsp;CONCEPTO</td>
           <td class="head" width="150px">&nbsp;COMPLEMENTO</td>
           <td class="head" width="80px" align="center">MONTO</td>
           </tr>
<!-- end:    sub_head -->

<!-- begin: body -->
       <tr>
           <td class="dato"  width="30px">&nbsp;{id}</td>
           <td class="dato"  width="30px">&nbsp;{suc}</td>
           <td class="dato"  width="50px">&nbsp;{fecha}</td>
           <td class="dato"  width="100px">&nbsp;{dep}</td>
           <td class="dato"  width="50px">&nbsp;{us}</td>
           <td class="dato"  width="150px">&nbsp;{con}</td>
           <td class="dato" width="150px">&nbsp;{compl}</td>
           <td class="num" width="80px">{monto}</td>
      </tr>
<!-- end:    body -->

<!-- begin: pie -->
      
  </table>
            </td>
        </tr>
<!-- end:    pie -->



<!-- begin: subtotal -->
        <tr>
            <td colspan="9" class="num" style="font-size:14px;" > <b>Total {query0_DESCRIPCION}&nbsp;&nbsp;&nbsp;{subtotal}&nbsp;</b></td>
        </tr>


<!-- end:    subtotal -->


<!-- begin: totales -->
        <tr>
            <td colspan="9" class="num" style="font-size:14px;" > <b> <big> TOTAL GASTOS:&nbsp;{TOTAL}&nbsp; </big>  </b></td>
        </tr>


<!-- end:    totales -->


<!-- begin: subtotal_x_concepto -->
        <tr>
          <td>&nbsp;&nbsp;{nombre_sub_cuenta}&nbsp;  </td>   <td colspan="8" class="num" style="font-size:14px;" ><b>  {subtotal_x_concepto}&nbsp;</b></td>
        </tr>
 
<!-- end:    subtotal_x_concepto -->

