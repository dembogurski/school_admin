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
	
	<table width="95%" border="1" cellspacing="0" cellpadding="3" style="font-family:verdana;">  
	  <tr>
   	    <td align="center"   >   <img src="images/logo_marijoa.png" width="300px" height="100px" >   </td> 
   	    
   	    <td   >
   	      <table style="font-size:16px;padding: 8px">
   	        <tr>
                    <td><b>Confecci&oacute;n  N&deg;: </b> {sup_fact_nro}<br><b>Tipo Confecci&oacute;n:</b> {sup_tipo_conf}</td>   	         
                  
   	       </tr>
   	        
   	       <tr>
   	        <td> <b>Fecha:</b> {sup_fact_fecha} </td>   	
   	       </tr>
  	       </table>
  	    </td>  
  	    
 	  </tr>
 	  <!-- Datos de la Empresa -->
 	  <tr style="font-size:{x2};"> 
 	  
		 	    <td> <b>Dir.:</b> {sup_fact_emp_dir}    </td> 
                            <td align="center" rowspan="4">
                                <label>   <b>(No valido como comprobante de Legal)</b>   </label><br>
                                
 	    </td> 
	  </tr>		  
	  <tr style="font-size:{x2};">
		 	   <td> <b>RUC:</b>   {sup_fact_ruc}      <b>Tel:</b> {sup_fact_emp_tel}    </td> 
		 	 

 	   </tr>
 	  
 	  <tr style="font-size:{x2};">
 	    <td style="font-size:{x2};"><b>Confeccionista: </b> {sup_fact_nom_cli} - <b> C.I. N&deg;  o RUC:</b> {sup_fact_cli_ci} </td> 		   
 	        
 	  </tr>
 	  <tr> <td style="font-size:{x2};"><b>Operador: </b> {sup_func_nombre}  </td> </tr>
 
 	</table>	 
	
</td></tr>

<!-- by Douglas   start Detalle de Factura  -->

<table width="95%" border="1" cellpadding="3" cellspacing="0" style="font-family:verdana;" >

<!-- end:   start_query0 -->

<!-- begin: header0 -->
<tr><td align="center" colspan="6" style="font-size:{x2};"><b><label >Detalle de Confecci&oacute;n</label> <b> </td> </tr>
    <tr style="font-size:{x1};">
        <th align="center">Interno </th>
        <th align="center">Usuario</th> 
        <th align="center">C&oacute;digo</th> 
        <th>Descripci&oacute;n</th>
        <th>Precio</th>
        <th>Cantidad</th>
        <th style="text-align: right;">Subtotal</th>
        <th style="text-align: right;">Medida</th>
        <th style="text-align: right;">Estimacion</th>
    </tr>


<!-- end:   header0 -->


<!-- begin: query0_data_row -->
        <tr style="font-size:{x0};">
            <td align="center">{query0_Interno}</td>
             <td align="center">{usuario}</td>
            <td align="center">{query0_Cod_Producto}</td>
            <td>{query0_Descripcion}</td>
            <td align="right">{query0_Precio}</td>
            <td align="center">{query0_Cantidad}</td>
            <td style="text-align: right;">{query0_Subtotal}</td>
            <td style="text-align: right;">{medida}</td>
            <td style="text-align: right;">{cant_estimada} </td>
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
        <tr style="font-size:{x2};"> 
                    
            <td colspan="4" rowspan="2" align="center"><br><small> <small> ycube plus RAD [1.2.9]      -  {user} - {time} </small> </small>  <br>          </td>
          
            <td style="text-align: center"><b>TOTALES</b></td> <td  style="text-align: right">{subtotal0_Cantidad}</td>     <td style="text-align: right" >  <b>{subtotal0_Subtotal}</b> </td><td></td><td style="text-align: right">{subtotal0_Estimacion}</td>  
          
        </tr>
        
</table>        
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    
</table>

  <script>    self.print();   </script>  

<!-- end:   end_query0 -->
 
