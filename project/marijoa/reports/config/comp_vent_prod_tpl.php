<!-- 
    Report Template File (comp_vent_prod)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
<link rel="stylesheet" type="text/css" href="templates/reports.css" />
 <script type="text/javascript" src="include/jquery.js" > </script>
	<treset_page>
        
        <script>
          function verClientes(id, fam, grupo, tipo, clasif, temp, estruc, desde, hasta, suc, cat, desde2, hasta2 ){ 
             
            $("#id_"+id).html("<b><small> Buscando clientes... </small></b>  &nbsp;&nbsp;&nbsp;<img src='images/activity.gif' height='9px' width='32px'>");
             
             
           $.ajax({
             type: "POST",
             url: "include/Ajax.class.php",
             data: "action=ver_clientes_de_un_periodo&fam="+fam+"&grupo="+grupo+"&tipo="+tipo+"&clasif="+clasif+"&temp="+temp+"&estruc="+estruc+"&desde="+desde+"&hasta="+hasta+"&suc="+suc+"&cat="+cat+"&desde2="+desde2+"&hasta2="+hasta2,
             async:true,
             dataType: "html",
             beforeSend: function(objeto){                 
                $("#id_"+id).html("<b><small> Buscando clientes... </small></b>  &nbsp;&nbsp;&nbsp;<img src='images/activity.gif' height='9px' width='32px'>");
             },
             complete: function(objeto, exito){
                 if(exito=="success"){                          
                       $("#id_"+id).html( objeto.responseText  );                    
                 }
             }
            })         
          }                
        </script> 
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
			style="font-weight: bold;"><big>Reporte Comparativo de Ventas por Producto</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
                <tr> <td style="height:40px" colspan="3" align="center"> <b>Periodo 1:&nbsp;</b>{desde}&nbsp; - &nbsp; {hasta} &nbsp;&nbsp;&nbsp; <b>Periodo 2:&nbsp;</b> {desde2}&nbsp;-&nbsp;{hasta2}
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Suc:&nbsp;</b>{sup_rep_localidad} &nbsp;&nbsp; <b>Cat:&nbsp;</b>{sup_cli_cat} </td>  </tr>
                
                <tr><td colspan="3"><b>&nbsp;Producto:</b> <em><small> &nbsp; {sup_p_fam}&rarr;{sup_p_grupo}&rarr;{sup_guia_tipo}&rarr;{sup_p_clasif}&rarr;{sup_p_temp}&rarr;{sup_p_estruc} </small></em>&nbsp;&nbsp;&nbsp;<b> Cliente: </b><em> <small>{sup_nom_cli}</small>  </em></td> </tr>
	  </tbody>
	</table> 
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th>CAT</th>
        <th>FAM</th>
        <th>GRUPO</th>
        <th>TIPO</th>
        <th>CANT P1</th>
        <th>VALOR P1</th>
        <th>CANT P2</th>
        <th>VALOR P2</th>
        <th>CANT P2-P1</th>
        <th>VALOR P2-P1</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
          <tr>
            <td class="item" style="text-align: center">{query0_CAT}</td>
            <td class="item">{query0_FAM}</td>
            <td class="item">{query0_GRUPO}</td>
            <td class="item" ><a style="text-decoration:none"  href="{href}" >{query0_TIPO} </a> </td>
            <td class="num">{query0_CANT}</td>
            <td class="num">{query0_VALOR}</td>
            <td class="num">{query0_CANT1} &nbsp;  </td>
            <td class="num">{query0_VALOR1}&nbsp;  </td>            
            <td class="num">{CA_CB}<img src="images/{fluct_cant}" border="0"></td>
            <td class="num">{VA_VB}<img src="images/{fluct_val}"  border="0"></td>
          </tr>
          <tr> <td ></td> <td style="" colspan="10" id="id_{id}"></td></tr>
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
            <td class="num"><b>{Z_DIFF_CANT}&nbsp;  &nbsp;  &nbsp;  </b></td>
            <td class="num"><b>{Z_DIFF_VAL}&nbsp;  &nbsp;  &nbsp;  </b></td>
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
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->

