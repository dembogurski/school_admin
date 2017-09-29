<!-- 
    Report Template File (factura_cliente)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header -->
	<treset_page>
<!-- end:   general_header -->


<!-- begin: start_query0  <table style="text-align: left; width: 99%;" border="0"cellpadding="0" cellspacing="0"> -->
  <!--  <tbody> -->
    <!--
<tr> <td colspan="50"> 
<!--	<table  style="text-align: left; width: 99%;" border="0"
	 cellpadding="0" cellspacing="2">
	   
		<tr>
		  <td style="width: 184px;"> </td>
		  <td style="text-align: center;">
		  <td style="text-align: right;">			
		</tr>
		<tr>
		  <td>
			  ycube plus RAD [1.2.9]     
		  </td>

		  <td style="text-align: right;">
			  {user} - {time}    
		  </td>
		</tr>
	  </tbody>
	</table> -->
	
	<table width="300px" border="0" cellspacing="0" cellpadding="2" style="font-family:verdana;">  
	  <tr>   <td align="center" style="font-size:15px; " > <b>MARIJOA TEJIDOS </b>      </td>  </tr>
	  <tr>   <td style="font-size:{x0};" > N&deg;    {sup_fact_nro} &nbsp;&nbsp;&nbsp; Fecha:  {sup_fact_fecha}  &nbsp;&nbsp;  ({sup_fact_localidad})   </td>  </tr>  
 	  <tr >  <td style="font-size:{x0};" > Cliente:   {sup_fact_nom_cli} -  C.I./RUC: {sup_fact_cli_ci} </td> </tr>	
 	  
      <td align="center" style="font-size:{x0};" > <label>   <b>(No valido como comprobante de venta)</b>   </label> </td>     
 	  </tr> 
 	</table>	 
	  
<!-- by Douglas   start Detalle de Factura  -->

<table width="300px" border="0" cellspacing="0" cellpadding="2" style="font-family:verdana;">  

<!-- end:   start_query0 -->

<!-- begin: header0 -->
 <!--<tr style="font-size:{x0};">  <td colspan="5" align="center">Detalle   </td>  </tr>


	<tr><td align="center" colspan="6" style="font-size:{x2};"><b><label >Detalle de Presupuesto </label> <b> </td> </tr>
    <tr style="font-size:{x1};">
        <th align="center">N&deg; </th>
        <th align="center">C&oacute;digo</th> 
        <th>Descripci&oacute;n</th>
        <th>Precio</th>
        <th>Cantidad Mts.</th>
        <th style="text-align: right;">Subtotal</th>
    </tr> -->


<!-- end:   header0 -->


<!-- begin: query0_data_row -->
      
         <tr style="font-size:{x0};">  <td align="left">{query0_Nro} </td>  <td style="font-size:{x0};" colspan="4">{query0_Descripcion}</td>  </tr>
         <tr>   <td>&nbsp;</td><td style="font-size:{x0};" > {query0_Cod_Producto} </td> <td style="font-size:{x0};" align="right">{query0_Precio}</td>
            <td style="font-size:{x0};" align="center">{query0_Cantidad}</td>
            <td style="font-size:{x0};" align="right">{query0_Subtotal}</td>
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
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr style="font-size:{x0};"> 
                    
           <td colspan="3"  rowspan="2" align="center"  style="font-size:8px;" >     ycube plus RAD [1.3.1] - {user} - {time}      </td>
          
           <td align="right" colspan="2"><b>TOTAL G$ </b> &nbsp; <b>{subtotal0_Subtotal}</b> </td>
          
        </tr>
           <tr style="font-size:{x0};">  <td align="right" colspan="2"><b>{cod_moneda}</b> &nbsp;&nbsp;&nbsp; &nbsp; <b>{otra_moneda}</b>  </td>  
        </tr>        
        <tr> <td colspan="5" style="font-size:{x0};" align="center"> {frase} </td> </tr>
</table>        
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    
</table>

 <!-- <script>    self.print();   </script>  -->
 
 
 <form name="ticket" action="http://localhost/ticket.php" method="POST">
    <input type="hidden" name="content" value="{content}" >
    
    <input type="submit" value="Imprimir">
 </form>
 
  <script> document.ticket.submit();  </script> 

<!-- end:   end_query0 -->



 
