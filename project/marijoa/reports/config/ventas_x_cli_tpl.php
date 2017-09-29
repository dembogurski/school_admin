<!-- 
    Report Template File (ventas_x_cli)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
     <script type="text/javascript" src="include/jquery.js" > </script>
      <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
	<treset_page>
            
    <script>
      function verDetalle(factura){
                    
            $.ajax({
                    type: "POST",
                    async:true,
                    dataType: "html",
                    url: "include/Ajax.class.php",
                    data: "action=ver_detalle_venta&fact_nro="+factura+"",
                    beforeSend: function(objeto){ 
                       $("#fact_"+factura).html("<label class='loading_msg'> </label> <img src='images/working.gif' >"  );  
                    },
                    complete: function(objeto, exito){
                        if(exito=="success"){ 
                          $("#fact_"+factura).html(objeto.responseText);  
                        }
                    } 
                });           
      }                
    </script>     
     <style>
/*
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
    tr > td{
      padding-left:3px;
    }
    .no_display{
       display:none;
    } */
    </style>
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
			style="font-weight: bold;"><big>Ventas de Cliente</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th>FACT_NRO</th>
        <th>FECHA</th>
        <th>SUC</th>
        <th>CI_RUC</th>
        <th>CLIENTE</th>
        <th>CAT</th>
        <th>VENDEDOR</th>
        <th style="text-align: right;">TOTAL</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <tr>
            <td class="itemc"><a href="javascript:verDetalle({query0_FACT_NRO})">{query0_FACT_NRO}</a></td>
            <td class="itemc">{query0_FECHA}</td>
            <td class="itemc">{query0_SUC}</td>
            <td class="itemc">{query0_CI_RUC}</td>
            <td class="item">{query0_CLIENTE}</td>
            <td class="itemc" >{query0_CAT}</td>
            <td class="item">{query0_VENDEDOR}</td>
            <td class="num">{query0_TOTAL}</td>
         </tr>
         <tr><td  colspan="8" id="fact_{query0_FACT_NRO}" style="height:2px;"></td></tr>
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
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td colspan="7"><b>Cantidad de Facturas: &nbsp;&nbsp;{i} </b> </td>

            <td style="text-align: right;"><b>{subtotal0_TOTAL}</b></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->

