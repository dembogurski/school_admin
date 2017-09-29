<!-- 
    Report Template File (fact_compra)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header -->
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
		  <td style="width: 15%;"> * </td>
		  <td style="text-align: center;">
			<b><big>Marijoa - Factura de Compra (Padres)</big></b></td>
		  <td style="text-align: right;">
			<tpage><b>Pag: </b></tpage></td>
		</tr>
		<tr>
		  <td style="width: 15%;">
			<small><small>ycube plus RAD [1.2.31]</small></small>
		  </td>
		  <td style="text-align: center;;width:70%">
		  
		  
		  <table border="0" cellpadding="2" cellspacing="0" width="90%" style="font-size:11;font-weight:bold;font-family: Garamound ">
             <tr> <td>REF :</td> <td>{ref}</td> <td>INTERNO :</td> <td>{interno}</td>    </tr>
		     <tr> <td>SUC :</td> <td>{empr}</td> <td>MONEDA :</td> <td>{moneda}</td>   </tr> 
		     <tr> <td>FECHA :</td> <td>{fecha}</td>   <td>COTIZ</td> <td>{cambio}</td>  </tr>
             <tr> <td>FECHA FACT :</td> <td>{fechafac}</td>   <td>NAC. INTR. :</td> <td>{nac_int}</td>    </tr>
		     <tr> <td>PROVEEDOR :</td> <td>{n_prov}</td>  <td>TIPO :</td> <td>{tipo}</td>    </tr> 
		     <tr> <td>FACTURA :</td> <td>{factura}</td>   <td>ESTADO :</td> <td>{estado}</td>   </tr> 
		  </table>
 	          
                      <table border="0" cellpadding="2" cellspacing="0" width="100%" style="font-size:11;font-weight:bold;">
                          <tr> <th colspan="6" style="text-align: center; background: beige">Detalle de Gastos</th> </tr>
                          <tr> <td>Valor Total: </td>      <td> {c_valor_total} </td>        <td>Valor Factura Legal: </td>        <td> {c_valor_factl} </td>   <td>Confec. Combustible: </td>        <td> {c_conf_comb} </td>      </tr>
                          <tr> <td>Flete Internacional Maritimo:   </td>      <td>{c_fi}</td>        <td>I.V.A.:  </td>        <td>{c_iva}</td>            <td>Confec. Mant. Vehic.: </td>        <td> {c_mant_vehic} </tr>
                          <tr> <td>Flete Internacional Fluvial:   </td>      <td>{c_fif}</td>        <td>Seguro:  </td>        <td>{c_seg}</td>           <td>Confec. Sueldos: </td>        <td> {c_conf_sueldos}</tr>
                          <tr> <td>Flete Internacional Terrestre:   </td>      <td>{c_fit}</td>        <td>Comision sobre Remesas:  </td>        <td>{c_comis_rem}</td> <td>Confec. Fraccionamientos: </td>        <td> {c_conf_frac}        </tr>
                          <tr> <td>Flete Nacional Terrestre:   </td>      <td>{c_fn}</td>        <td>Despacho de Importacion:  </td>        <td>{c_di}</td> <td>Costo x Confecci&oacute;n: </td>   <td>{c_conf_cost}</td>      </tr>
                          <tr> <td>Cargos Portuarios en Origen:   </td>      <td>{c_cp}</td>        <td>Viatico Transportadora:  </td>        <td>{c_viatico}</td>         </tr>
                          <tr> <td>Manipuleo de CNTR:   </td>      <td>{c_manip}</td>        <td>Comision Forwarder:   </td>        <td>{c_comis_forw}</td>         </tr>
                          <tr> <td>Multas en Aduanas:   </td>      <td>{c_multas}</td>        <td>Otros gastos:  </td>        <td>{c_otros}</td> <td>% Recargo Total:   </td> <td>{sup_c_sobre_costo}</td>      </tr>
                      </table>   
		   
		  
		  </td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr style="font-size:12;">
        <th>CODIGO</th>
        <th>FAMILIA</th>
        <th>GRUPO</th>
        <th>TIPO</th>
        
        <th>COLOR</th>
         
        <th style="text-align: right;">PRECIO_COMPRA</th>
        <th style="text-align: right;">CANT.COMPRA</th>
        <th style="text-align: right;">SUBTOTAL</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50">
	<b>{desc}</b> <br> 
	 {obs}
	</td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <div class="block"><tr style="font-size:11;">
            <td>{query0_CODIGO}</td>
            <td>{query0_FAMILIA}</td>
            <td>{query0_GRUPO}</td>
            <td>{query0_TIPO}</td>
           
            <td>{query0_COLOR}</td>
             
            <td style="text-align: right;">{query0_PRECIO_COMPRA}</td>
            <td style="text-align: right;">{query0_CANTIDAD}</td>
            <td style="text-align: right;">{query0_SUBTOTAL}</td>
        </div> </tr>
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
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            
            
            <td style="text-align: right;"><b>{subtotal0_PRECIO_COMPRA}</b></td>
            <td style="text-align: right;"><b>{subtotal0_CANTIDAD}</b></td>
            <td style="text-align: right;"><b>{subtotal0_SUBTOTAL}</b></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->

