<!-- 
    Report Template File (calc_comis_vent)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
       <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
       <script type="text/javascript" src="include/jquery.js" > </script>
	<treset_page>
<!-- end:   general_header -->


<!-- begin: start_query0 -->
<table style="text-align: left; width: 100%;" border="1" cellpadding="0" cellspacing="0">
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
			style="font-weight: bold;"><big>Calculo de Comisiones por Ventas</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
                <tr><th colspan="3"><big> Periodo: {desde}&#9668;=&#9658;{hasta} </big> </th> </tr>
	  </tbody>
	</table> 
</td></tr>
<tr>
    <td id="cabecera" colspan="3"></td>
</tr>
<!-- end:   start_query0 -->

<!-- begin: header0 --> 
    
</thead>
<tfoot>
	<tr><td colspan="50"> </td></tr>
</tfoot>
 
<!-- end:   header0 -->

<!-- begin: query0_data_row -->

<table border="1" cellpadding="0" cellspacing="0" width="100%" id="cab_general">
         <tr>
           <td class="item" style="font-size:14px;height: 26px" ><b>CODIGO:</b> </td><td>{query0_CODIGO} </td>
           <td class="item" style="font-size:14px"><b>NOMBRE:</b></td>  <td>{query0_NOMBRE}</td>
           <td class="item" style="font-size:14px;height: 26px"><b>C.I.:</b></td><td>{query0_CI}</td>
           <td class="item" style="font-size:14px"><b>FECHA_CONT:</b></td><td>{query0_FECHA_CONT}</td>  
         </tr>
         <tr>
            <td class="item" style="font-size:14px"><b>CATEGORIA:</b></td><td>{sup_func_cat}</td>  
            <td class="item" style="font-size:14px"><b>RANGO:</b></td><td>{rango}</td>  
            <td class="item" style="font-size:14px" title="Ponderacion sobre ventas normales"><b>PONDERACION:</b></td><td>{ponderacion}%</td>  
            <td class="item" style="font-size:14px"><b>Meta P/ Normales:</b></td><td>{valor_a_lograr_normales}</td>  
         </tr>
         <tr>
            <td class="item" style="font-size:14px;height: 26px"><b>META:</b></td><td>{meta}</td>
            <td class="item" style="font-size:14px"><b>SUELDO FIJO:</b></td><td>{sueldo_base}</td>  
            <td class="item" style="font-size:14px"><b>VARIABLE:</b></td><td>{sueldo_base}</td>  
            <td class="item" style="font-size:14px"><b>Meta P/ Ofertas:</b></td><td>{valor_a_lograr_ofertas}</td>  
         </tr>
</table>        
<!-- end:    query0_data_row -->
 
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->

<!-- begin: ventash -->
<br>
<table border="1" cellpadding="0" cellspacing="0" width="100%">
    <tr style="background: lightyellow"> <th>CAT</th><th>OFERTAS</th><th>NORMALES</th> <th>DEV.OFERTAS</th><th>DEV.NORM</th> <th>AGRUP.OFERTAS</th><th>AGRUP.NORMALES</th><th>TOTALES</th> </tr>   
<!-- end:   ventash -->

<!-- begin: ventasdata -->
        <tr>
            <td class="item" style="text-align: center;height: 26px">{cat}</td>
            <td class="num">{ofertas}</td>
            <td class="num">{normales}</td> 
            <td class="num">{dev_ofertas}</td>
            <td class="num">{dev_normales}</td> 
            {agrupado_x_cat} 
        </tr>
<!-- end:   ventasdata -->

<!-- begin: ventastot -->
        <tr>
            <td class="item" style="height: 26px;font-weight: bold;font-size: 13px" >Totales</td>
            <td class="num" style="font-weight: bold;font-size: 13px">{total_ofertas}</td>
            <td class="num" style="font-weight: bold;font-size: 13px">{total_normales}</td> 
            <td class="num" style="font-weight: bold;font-size: 13px">{total_dev_ofertas}</td> 
            <td class="num" style="font-weight: bold;font-size: 13px">{total_dev_normales}</td> 
            <td class="num" style="font-weight: bold;font-size: 13px;background: lightgray">{total_ofertas_menos_dev}</td> 
            <td class="num" style="font-weight: bold;font-size: 13px;background: lightgray">{total_normales_menos_dev}</td> 
            <td class="num" style="font-weight: bold;font-size: 13px;background: lightgray">{total_totales}</td> 
            
        </tr>
    <!--    <tr>
           <td class="item" style="height: 26px;font-weight: bold;font-size: 13px" >Devoluciones</td>
            <td class="num" style="font-weight: bold;font-size: 13px">{dev_ofertas}</td>
            <td class="num" style="font-weight: bold;font-size: 13px">{dev_normales}</td>  
        </tr>
        <tr>
           <td class="item" style="height: 26px;font-weight: bold;font-size: 13px" >Neto</td>
            <td class="num" style="font-weight: bold;font-size: 13px">{total_ofertas_dev}</td>
            <td class="num" style="font-weight: bold;font-size: 13px">{total_normales_dev}</td>  
        </tr>
 
         <tr>
            <td class="item" style="height: 26px;font-weight: bold;font-size: 13px; background: lightgray" colspan="2" >Total Neto Ofertas + Normales</td>
            <td class="num" style="font-weight: bold;font-size: 13px; background: lightgray">{total_neto}</td>  
        </tr>   -->     
<!-- end:   ventastot -->

<!-- begin: ventasf -->
</table>
<!-- end:   ventasf -->

<!-- begin: tabla_conversionh -->
<br>

<table border="1" cellpadding="0" cellspacing="0" width="55%">
    <tr><th style="background: lightgray" colspan="3" >CUADRO DE CONVERSION</th> </tr>
    <tr style="background: lightyellow"> <th>CAT</th><th>META</th><th>Coef. Conv</th> </tr>    
 
<!-- end:   tabla_conversionh -->


<!-- begin: tabla_conversiondata -->
     <tr>
            <td class="item" style="height: 26px;font-weight: bold;font-size: 13px" >{cc_cat}</td>
            <td class="num" style="font-weight: bold;font-size: 13px">{meta_ref}</td>
            <td class="num" style="font-weight: bold;font-size: 13px">{valor_ref}</td> 
     </tr>
<!-- end:   tabla_conversiondata -->

<!-- begin: tabla_conversiof -->
</table>
<!-- end:   tabla_conversiof -->



<!-- begin: tabla_metas_conv -->
<br>

<table border="1" cellpadding="0" cellspacing="0" width="70%">
    <tr><th style="background: lightgray" colspan="5" >VALORES CONVERTIDOS EN BASE A LOS COEFICIENTES</th> </tr>
    <tr style="background: lightyellow"> <th>CAT</th><th>Coef. Conv</th> <th>OFERTAS</th><th>NORMALES</th> <th>TOTALES</th></tr>    
 
<!-- end:   tabla_metas_conv -->


<!-- begin: tabla_metas_convdata -->
     <tr>
            <td class="item" style="height: 26px;font-weight: bold;font-size: 13px" >{calc_cat}</td>
            <td class="num" style="font-weight: bold;font-size: 13px">{calc_coef}</td>
            <td class="num" style="font-weight: bold;font-size: 13px">{z_ofertas}</td> 
            <td class="num" style="font-weight: bold;font-size: 13px">{z_normales}</td> 
            <td class="num" style="font-weight: bold;font-size: 13px">{z_total}</td> 
     </tr>
<!-- end:   tabla_metas_convdata -->



<!-- begin: tabla_metas_convdatat -->
     <tr>
            <td colspan="2" style="height:40px"><b>Totales</b></td>             
            <td class="num" style="font-weight: bold;font-size: 13px">{z_ofertas_calc}</td> 
            <td class="num" style="font-weight: bold;font-size: 13px">{z_normales_calc}</td> 
            <td class="num" style="font-weight: bold;font-size: 13px;background: lightgray">{z_total_normal_y_oferta_calc}</td> 
     </tr>
     <tr>
            <td colspan="2"  ><b>Logros en % S/Metas</b></td>             
            <td class="num" style="font-weight: bold;font-size: 13px">{logros_ofertas_calc}%</td> 
            <td class="num" style="font-weight: bold;font-size: 13px">{logros_normales_calc}%</td>  
            <td class="num" style="font-weight: bold;font-size: 13px">{porc_logrado}%</td> 
     </tr> 
      <tr>
         <td colspan="2" ><b>Premios a Cobrar</b></td>             
         <td class="num" style="font-weight: bold;font-size: 13px">{premio_ofertas}</td> 
         <td class="num" style="font-weight: bold;font-size: 13px">{premio_normales}</td> 
         <td class="num" style="font-weight: bold;font-size: 13px">{total_premio_ofertas_normales}</td>
     </tr>     
      <tr>
         <td colspan="3" ><b>Total a Cobrar Sueldo Fijo + Variable.</b></td>             
         
         <td class="num" style="font-weight: bold;font-size: 13px">{premio_total}</td> 
     </tr>       
<!-- end:   tabla_metas_convdatat -->


<!-- begin: tabla_metas_convf -->
</table>

<!-- end:   tabla_metas_convf -->


<!-- begin: error -->
<div>
<img src="images/dialog-warning.png" width="100" height="100" border="0">
<big><b>&nbsp;&nbsp;&nbsp;{msg}</b></big>
<img src="images/sin_resultado.jpg" width="40" height="40" border="0">

</div>
<!-- end:   error -->
