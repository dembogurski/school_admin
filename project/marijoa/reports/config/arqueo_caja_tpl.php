<!-- 
    Report Template File (arqueo_caja)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
    <script type="text/javascript" src="include/jquery.js" > </script>
    <script type="text/javascript">
        var flag = 0;
        var perc = 0;
        function verDetalle(){
         var arr = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9 , 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36];

         if(flag==0){
             flag = 1;
             jQuery.each(arr, function() {
               $('#set_visible_'+this).fadeIn("slow");
             });
             $('#mas0').html("(-)");
         }else{
             flag = 0;
             jQuery.each(arr, function() {
               $('#set_visible_'+this).fadeOut("slow");
             });
             $('#mas0').html("(+)");
         }
         
        }

        function porcentajes(){
          if(perc==0){
            perc = 1;
            $('#percent').fadeIn("slow");
            $('#mas').html("-");
         }else{
            perc = 0;
            $('#percent').fadeOut("slow");
             $('#mas').html("+");
         }
        }
        
    </script>
	<treset_page>
    <style>

    tr{
       font-size:13px;
       height:26px;
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
<table style="text-align: left; width: 100%;border-width:thin" border="1" cellpadding="0" cellspacing="0" >
    <thead>
<tr> <td colspan="50"> 
	<table style="text-align: left; width: 100%;" border="1"  
	 cellpadding="0" cellspacing="0">
	  <tbody>
		<tr>
		  <td style="width:20%;">&nbsp;</td>
		  <td style="text-align: center; width:60%;"> 	<b>Marijoa</b>    </td>
          <td style="text-align: right;width: 20%;">  <tpage><b>Pag: </b></tpage>    </td>
        </tr>
		<tr>
		  <td>
			<small><small>ycube plus RAD [1.2.31]</small></small>
		  </td>
		  <td style="text-align: center;" ><big 	style="font-weight: bold;"> Arqueo de Caja</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
        <tr> <td colspan="3" align="center"><b>Fecha/Periodo:&nbsp;&nbsp;{desde}-{hasta} &nbsp;&nbsp;&nbsp;   Suc: &nbsp;&nbsp;{sup_empr}</b> </td> </tr>
	  </tbody>
	</table>
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr> <th rowspan="3">Vendedor</th>   <th rowspan="3" style="background:#CCFFCC;"  >V.Contado</th> <th colspan="7" style="background:#FFCC66;">Ventas Credito</th> <th style="background:#CCFFFF;" colspan="2">Cobranzas</th>  <th rowspan="3">Devoluciones</th>  <th rowspan="3" style="background:#330033;color:white;">Totales x Vendedor</th> </td>   </tr>

      <!--  <th  rowspan="2"  >F.CREDITO</th>  -->
        <th  rowspan="2"  >T.Credito</th>
        <th  rowspan="2"  >T.Debito</th>
        <th  rowspan="2"  >Convenio</th>
        <th  rowspan="2" > CR.Efectivo </th> <th colspan="2"> Cheques </th> <th rowspan="2"  >Cuotas</th>
        <th rowspan="2"  >Cuotas Efectivo</th>
        <th rowspan="2"  >Cuotas Convenios</th>
     <tr>
         
        <th  >Al Dia</th>
        <th  >Diferido</th>
        
     </tr>
</thead>
<tbody>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr>

            <td>&nbsp;{query0_NOMBRE}</td>
            <td class="num">{contado}</td>
           <!--  <td class="num">{credito}</td> -->
            <td class="num">{T_CREDITO}</td>
            <td class="num">{T_DEBITO}</td>
            <td class="num">{CONVENIO}</td>
            <td class="num">{EFECTIVO}</td>
            <td class="num">{CHEQUES}</td>
            <td class="num">{CHEQUES_DIF}</td>
            <td class="num">{CUOTAS}</td>
            <td class="num">{CUOTAS_EFECTIVO}</td>
            <td class="num">{CUOTAS_CONVENIO}</td>
            <td class="num" title="{titulo_devolucion}">{MONTO_DEVOLUCION}</td>
            <td class="num">{Z_VENDEDOR}</td>
         </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr  class="num" style="font-weight:bolder;">
            <td></td>
            <td style="padding-right:3px;">{Z_CONTADO}</td>
           <!--  <td>{Z_CREDITO}</td> -->
            <td style="padding-right:3px;">{ZT_CREDITO}</td>
            <td style="padding-right:3px;">{ZT_DEBITO}</td>
            <td style="padding-right:3px;">{Z_CONVENIO}</td>
            <td style="padding-right:3px;">{Z_EFECTIVO}</td>
            <td style="padding-right:3px;">{Z_CHQ_AL_DIA}</td>
            <td style="padding-right:3px;">{Z_CHQ_DIFF}</td>
            <td style="padding-right:3px;">{Z_CUOTAS}</td>
            <td style="padding-right:3px;">{Z_CUOTAS_EFECTIVO}</td>
            <td style="padding-right:3px;">{Z_CUOTAS_CONVENIO}</td>
            <td style="padding-right:3px;">{Z_MONTO_DEVOLUCION}</td>
            <td style="padding-right:3px;">{TOTAL_VENTAS}</td>
        </tr>
        <tr> <td colspan="11"></td> </tr>
        <tr class="num" style="font-weight:bolder;">
         <td></td> <td colspan="2" style="background:lightgray;" align="center">Total Ventas:&nbsp;&nbsp; {TOTAL_VENTAS} </td> <td></td><td></td> <td></td><td></td> <td></td><td></td> <td></td><td></td>
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
     <!--   <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr> -->
<!-- end:    query0_subtotal_row -->



<!-- begin: totales -->
<tr colspan="2"> <td>
<table border="1" cellpadding="2" cellspacing="0" style="margin:4px; padding:2px;">
    <tr><th colspan="2" style="background:#330033;color:white;" >RESUMEN</th> </tr>
    <tr> <td><b>Efectivo del Dia</b></td> <td class="num">{total_efectivo}</td> </tr>
    <tr> <td><img alt="" src="images/gs.png" width="22px" height="16px"> <b>G$</b></td> <td class="num">{zgs}</td> </tr>
    <tr> <td><img alt="" src="images/rs.png" width="22px" height="16px"> <b>R$</b></td> <td class="num">{zrs}</td> </tr>
    <tr> <td><img alt="" src="images/us.png" width="22px" height="16px"> <b>U$</b></td> <td class="num">{zus}</td> </tr>
    <tr> <td><img alt="" src="images/ps.png" width="22px" height="16px"> <b>P$</b></td> <td class="num">{zps}</td> </tr>

    <tr> <td><b>Tarjeta Cr&eacute;dito</b></td> <td class="num">{ZT_CREDITO}</td> </tr>
    <tr> <td><b>Tarjeta D&eacute;bito</b></td> <td class="num">{ZT_DEBITO}</td> </tr>
</table>
</td><td colspan="12">
<!-- end:   totales -->
<!-- begin: cobros_cheques -->

<table align="left" cellspacing="2" cellpadding="0" border="1" >
    <tr><th colspan="2" style="background:#CCFFFF" > Cobros en Cheques </th> <th rowspan="2" style="background:#FFFFCC">  Salida x Devolucion  </th > </tr>
    <tr><th style="background:#CCFFFF" >Al Dia</th><th style="background:#CCFFFF">Diferido</th> </tr>
    <tr  class="num"><td>{CHQ_AL_DIA}</td> <td>{CHQ_DIFF}</td> <td>{DEVOLUCION} </td> </tr>
</table>

<!-- end:   cobros_cheques -->
<!-- begin: cab_cheques_x_ventas -->
 <table border="1" cellpadding="0"  cellspacing="0" style="width:100%">

  <tr> <th colspan="7" align="center" style="background:#cccc99;"> Cheques Registrados por Ventas </th> </tr>
  <tr> <th>Cliente</th><th>Banco</th><th>Cuenta</th> <th>N&deg;</th><th>Valor</th> <th>Fecha Emis</th> <th>Fecha Pago</th> </tr>
<!-- end:   cab_cheques_x_ventas -->

<!-- begin: cheques_x_ventas_data -->
 <tr>
   <td>&nbsp;{cliente}&nbsp;</td>
   <td>&nbsp;{banco}&nbsp;</td>
   <td>&nbsp;{cuenta}&nbsp;</td>
   <td>&nbsp;{nro}&nbsp;</td>
   <td class="num">&nbsp;{valor}&nbsp;</td>
   <td align="center" >&nbsp;{fecha_emis}&nbsp;</td>
   <td align="center" >&nbsp;{fecha_pago}&nbsp;</td>
 </tr>
<!-- end:   cheques_x_ventas_data -->


<!-- begin: pie_cheques_x_ventas1 -->
<!-- </table> -->
<!-- end:   pie_cheques_x_ventas1 -->

<!-- begin: pie_cheques_x_ventas2 -->
<table cellspacing="0" cellpadding="0" border="1" style="width:100%">
<tr><th colspan="7" align="center" style="background:#FFFFCC;">Registro de Perdidas y Ganancias&nbsp;&nbsp;&nbsp;<a id="mas0" style="text-decoration:none" href="javascript:verDetalle()">(+)</a></th> </tr>
<tr class="no_display" id="set_visible_0" name="set_visible"><th>Obs</th><th>Entrada</th><th>Salida</th><th>Moneda</th><th>Cotiz</th><th>E_Ref</th><th>S_Ref</th></tr>
<!-- end:   pie_cheques_x_ventas2 -->

<!-- begin: diferencias_x_perdida --> 
 
 <tr class="no_display" id="set_visible_{id}" name="set_visible"> <td>{obs}</td>  <td class="num">{ent}</td> <td class="num">{sal}</td>  <td align="center">{moneda}</td> <td align="center">{cotiz}</td> <td class="num">{E_REF}</td> <td class="num">{S_REF}</td>  </tr>

<!-- end:   diferencias_x_perdida -->


<!-- begin: diferencias_x_totales -->
 <tr> <td colspan="5" align="center" ><b> Diferencia de Ajustes &nbsp;<label style="color:{color_ajuste};"> {diff_ajustes}</label> </b> </td> <td class="num"><b>Ent.: &nbsp;{tot_ent}</b></td> <td class="num"><b>Sal.:&nbsp;{tot_sal}</b></td> </tr>
</table>
<!-- end:   diferencias_x_totales -->


<!-- begin: intereses_cab --> 
<table cellspacing="0" cellpadding="0" border="1"  style="width:100%">
<tr><th colspan="7" align="center" style="background:#FFFFCC;">Intereses Ganados&nbsp;&nbsp;&nbsp;<a id="mas0" style="text-decoration:none" href="javascript:verDetalle()">(+)</a></th> </tr>
<tr   class="no_display" id="set_visible_20" name="set_visible"><th>Obs</th><th>Entrada</th><th>Salida</th><th>Moneda</th><th>Cotiz</th><th>E_Ref</th><th>S_Ref</th></tr> 
<!-- end:   intereses_cab -->

<!-- begin: intereses_data -->
   <tr   class="no_display" id="set_visible_{id}" name="set_visible"> <td>{obs}</td>  <td class="num">{ent}</td> <td class="num">{sal}</td>  <td align="center">{moneda}</td> <td align="center">{cotiz}</td> <td class="num">{E_REF}</td> <td class="num">{S_REF}</td>  </tr>

<!-- end:   intereses_data -->

<!-- begin: intereses_total -->
 <tr> <td colspan="5" align="center"   </td> <td class="num"><b>Total.:&nbsp;{tot_int}</b> </td> <td class="num">0</td> </tr>
</table>
<!-- end:   intereses_total -->
<!-- begin: retiro_sena_reservas -->
<table cellspacing="0" cellpadding="0" border="1" style="width: 100%;">
<tr> <th colspan="8" align="center" style="background:#b3b3e6; height:28px;" > Retiros con Se&ntilde;as de Reserva </th> </tr>
  <tr><th>Factura</th><th>RUC</th><th>Cliente</th><th>Fecha</th><th>Suc</th><th>Total</th><th>Descrip</th><th>Reserva</th></tr>
<!-- end:   retiro_sena_reservas -->


<!-- begin: retiro_sena_reservas_det -->
 <tr>
   <td>{rsr_fact}</td>
   <td>{rsr_RUC}</td>
   <td>{rsr_cli}</td>
   <td>{rsr_fecha}</td>
   <td>{rsr_suc}</td>
   <td class="num">{rsr_total}</td>
   <td align="center" >{rsr_descrip}</td>
   <td align="center" >{rsr_reserva}</td>
 </tr>
<!-- end:   retiro_sena_reservas_det -->
<!-- begin: retiro_sena_reservas_pie -->
        </table>
<!-- end:   retiro_sena_reservas_pie -->

<!-- begin: intereses_pie -->
       <!-- </table> -->
<!-- end:   intereses_pie -->


<!-- begin: pie_cheques_x_ventas3 -->
</td></tr>
<!-- end:   pie_cheques_x_ventas3 -->

<!-- begin: cab_cheques_cobrados -->
<tr> <th colspan="7" align="center" style="background:#FFCC99; height:28px;" > Cheques Registrados por Cobro de Cuotas </th> </tr>
  <tr> <th>Cliente</th><th>Banco</th><th>Cuenta</th> <th>N&deg;</th><th>Valor</th> <th>Fecha Emis</th> <th>Fecha Pago</th> </tr>
<!-- end:   cab_cheques_cobrados -->


<!-- begin: cheques_x_ventas_totales -->
 <tr>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td class="num">&nbsp;<b>{valor_total}&nbsp;</b></td>
   <td align="center" ></td>
   <td align="center" ></td>
 </tr>
<!-- end:   cheques_x_ventas_totales -->
<!-- begin: end_query0 -->
	</tr>
    </tbody>
	<tfoot>
	<tr><td colspan="16"> 
	<div > &nbsp;&nbsp;&nbsp; <a id="mas" style="text-decoration:none;font-size:12px;" href="javascript:porcentajes()">+</a>
	<label class="no_display" id="percent"> &nbsp;&nbsp;&nbsp;&nbsp;<b> Marijoa: </b>{marijoa}  &nbsp;&nbsp;&nbsp;&nbsp; <b>Particular:</b> {comercial} </label>
	</div>
	</td></tr><tr><td colspan="16"> 
	<div align="left"> <br><br>&nbsp;&nbsp;&nbsp;&nbsp;
	<b>Obs.:______________________________________________________________________________________________
	</br></br>&nbsp;&nbsp;&nbsp;&nbsp;___________________________________________________________________________________________________
	</br></br>&nbsp;&nbsp;&nbsp;&nbsp;___________________________________________________________________________________________________
	</b>
	</div></br></br>
<div align="left" style="height:30px;">&nbsp;&nbsp;&nbsp;&nbsp;  <b>Elaborado por:&nbsp; _______________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Verificado por:&nbsp; _______________ </div>
</td></tr>
</tfoot>
</table>
<!-- end:   end_query0 -->
