<!-- 
    Report Template File (liquidacion_all)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
       <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
       <script type="text/javascript" src="include/jquery.balloon.js"></script>
	<treset_page>
            
            
   <script language="javascript">
        function a(){
            $('selectors').balloon(options);
        }             
   </script>
            
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
                      style="font-weight: bold;"><big>Liquidaci&oacute;n de Sueldos</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
                <tr> <td>  <td style="height: 26px;text-align: center" ><b> Periodo Pago:&nbsp;&nbsp;{desde}<-->{hasta} &nbsp;&nbsp; Suc: &nbsp;{suc}</b></td> <td>  <td></tr>
	  </tbody>
	</table> 
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th>Nro</th>
        <th>Funcionario</th>
        <th>Fecha</th>
        <th>Suc</th>
        <th>Mes</th>
        <th>Ds Ttrab.</th>
        <th>Sueldo_C</th>
        <th>Hs Extras C</th>
        <th>Feriado C</th>
        <th>Preav. C</th>
        <th>Ind C</th>
        <th>Vac C</th>
        <th style="background-color: yellow" >Reposo</th>
        <th style="background-color: yellow" title="sueldo C + Extras + Feriado C - Reposo" >TOTAL_CONT</th>
        <th style="background-color: yellow" >I.P.S.</th>
        <th style="background-color: yellow" >Aporte_Pat</th>
        <th style="background-color: yellow" >Aporte_Obrero</th>
        <th>Descuento C</th>
        <th>Descuento R</th>
        <th>Recupero</th>
        <th style="background-color: yellow" >TOTAL_PAGAR_EMP</th>
        <th  >Desembolso</th>
        <th  >Sueldo Real</th>
        <th style="background-color: yellow" >DIFF_SALARIO</th>
        <th>Comision</th>
        <th>Aguinaldo</th>
        <th>Preaviso</th>
        <th>Indenm.</th>
        <th>Vacaciones</th>
        <th>Hs Extras R</th>
        <th  style="background-color: yellow" >TOTAL_PAGAR_2</th>
        <th>Asiento Sueldos</th>
        <th>Asiento Liq.</th>
       
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr>
            <td class="item" >{query0_Nro}</td>
            <td class="item" >{query0_Funcionario}</td>
            <td class="item" >{query0_Fecha}</td>
            <td class="itemc" >{query0_Suc}</td>
            <td class="itemc" >{query0_Mes}</td>
            <td class="itemc" >{query0_dt}</td>
            <td class="num" >{query0_Sueldo_C}</td>
            <td class="num" >{query0_extras_c}</td>
            <td class="num" >{query0_feriado_c}</td>
            <td class="num" >{query0_preaviso_c}</td>
            <td class="num" >{query0_Ind_c}</td>
            <td class="num" >{query0_Vac_c}</td>
            <td class="num" >{query0_reposo}</td>
            <td class="num" >{query0_TOTAL_CONT}</td>
            <td class="num" >{query0_IPS}</td>
            <td class="num" >{query0_Aporte_Pat}</td>
            <td class="num" >{query0_Aporte_Obrero}</td>
            <td class="num" >{query0_Descuento}</td>
            <td class="num" >{query0_DescuentoR}</td>
            <td class="num" >{query0_Recup}</td>
            <td class="num" >{query0_TOTAL_PAGAR_1}</td>
            <td class="num" >{desembolso}</td>
            <td class="num" >{query0_Sueldo_R}</td>
            <td class="num" >{query0_DIFF_SALARIO}</td>
            <td class="num" >{query0_Comision}</td>
            <td class="num" >{query0_Aguinaldo}</td>
            <td class="num" >{query0_Preaviso}</td>
            <td class="num" >{query0_Indenm}</td>
            <td class="num" >{query0_Vacaciones}</td>
            <td class="num" >{query0_Horas_ExtrasR}</td>
            <td class="num" >{query0_TOTAL_PAGAR_2}</td>
            <td class="num" >{asiento_sueldos}</td>
            <td class="num" >{asiento_liq}</td>
            
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
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
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
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align: right;"><b>{subtotal0_TOTAL_CONT}</b></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align: right;"><b>{subtotal0_TOTAL_PAGAR_1}</b></td>
             <td></td>
              <td></td>
            <td style="text-align: right;"><b>{subtotal0_DIFF_SALARIO}</b></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align: right;"><b>{subtotal0_TOTAL_PAGAR_2}</b></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->

