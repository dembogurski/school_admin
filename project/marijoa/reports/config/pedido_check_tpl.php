<!-- 
    Report Template File (nota_pedido)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
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
          <img src="images/logo_marijoa.png"  
		  </td>
		  <td style="text-align: right;">
			<tpage><b>Pag: </b></tpage></td>
		</tr>
		<tr>
		  <td>
			<small><small>ycube plus RAD [1.2.31]</small></small>
		  </td>
		  <td style="text-align: center;"><big
			style="font-weight: bold;"><big>Verificacion de Estado de Piezas sobre Nota Pedido</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
		<tr>
		<td colspan="3" >
          <table border="1" cellpadding="2" cellspacing="2" width="100%" style="font-weight:bold;"> 
          <tr> 
             <td>N&deg; :&nbsp;&nbsp; {nro} </td><td> Origen:&nbsp;&nbsp; {origen}</td>  <td> Responsable:&nbsp;&nbsp; {usuario}</td>  
          </tr>
          <tr>
           <td>Fecha :&nbsp;&nbsp;  {fecha} </td><td> Destino:&nbsp;&nbsp; {destino}  </td>   <td>  &nbsp;&nbsp;  </td>  
          </tr>
          </table>
		 
		</td>		
		</tr>
		
	  </tbody>
	   
	</table> 
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        
         <th>CODIGO</th>
        <th>GRUPO</th>
        <th>TIPO</th>
        <th>COLOR</th>
        <th>DESCRIPCION</th>
        <th style="text-align: center;">CANTIDAD</th>
        <th style="text-align: center;">ESTADO</th>
        <th style="text-align: center;">URGENTE</th>
        <th style="text-align: center;">ALERTAS</th> 
 
    </tr>
</thead>
<tfoot>
	<tr>
	 <td colspan="50">
	   <p><b>Observaciones: </b> {obs}  </p>
	 </td>
	</tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <tr style=" background:{color};">
             
            <td>{query0_CODIGO}</td>
            <td>{query0_GRUPO}</td>
            <td>{query0_TIPO}</td>
            <td>{query0_COLOR}</td><td>{query0_DESCRIP}</td>
            <td style="text-align: right;">{query0_CANTIDAD}&nbsp;&nbsp;</td>
            <td align="center" >{query0_ESTADO}</td>
            <td align="center" >{query0_URGE}</td>
            <td style="width:150px; text-align: center;  "><label style="font-size:14px;font-weight:bolder;color:{color_alerta};">{alerta}</label>  </td>
             
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
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td><td></td>
            <td style="text-align: right;"><b>{subtotal0_CANTIDAD} &nbsp;&nbsp;</b></td>
            <td></td> <td></td>
            <td></td>
            <td></td>
             <td></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->

