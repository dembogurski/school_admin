<!-- 
    Report Template File (alta_clientes_fecha)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->

 <script type="text/javascript" src="include/jquery.js" > </script> 
  <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 

	<treset_page>

    <style>
    .zebra0{
      background:white;
      font-size:13px;
       height:26px;
    }
    .zebra1{
      background:lightgray;
      font-size:13px;
       height:24px;
    }

    </style>
    
    <script lang="javascript">
        
        function verSimilares(id,ruc){
            
            var cliente = $("#cli_"+id).text();
            var img =  $("#img_"+id+"").attr("src");
            
            
            if(img == "images/left.png"){
              $("#img_"+id+"").attr("src","images/down.png");
              
              //$("#msg_"+id).slideDown("slow");
                $.ajax({
                    type: "POST",
                    async:true,
                    dataType: "html",
                    url: "include/Ajax.class.php",
                    data: "action=clientes_similares&ruc="+ruc+"&cliente="+cliente+"&id="+id,
                    beforeSend: function(objeto){ 
                       $("#msg_"+id).html("<label class='loading_msg'> </label> <img src='images/working.gif' >"  );  
                    },
                    complete: function(objeto, exito){
                        if(exito=="success"){ 
                          $("#msg_"+id).html(objeto.responseText);  
                          $("#ruc_"+id+"").css("background","#FFC125"); 
                        }
                    } 
                });  
            }else{
              $("#img_"+id+"").attr("src","images/left.png"); 
              $("#msg_"+id).html("");  
              $("#msg_"+id).fadeOut("slow");
            } 
             
           
 
            
        } 
        
    
    </script>
<!-- end:   general_header -->


<!-- begin: start_query0 -->
<table style="text-align: left; width: 99%;" border="0" cellpadding="0" cellspacing="0">
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
			style="font-weight: bold;"><big>Reporte de Altas de Clientes</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
        <tr> <th colspan="3" align="center"><b> <i> Periodo: &nbsp; {desde} - {hasta} </i> </b> </th> </tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th>CI/RUC</th>
        <th>CLIENTE</th>
        <th>CATEGORIA</th> 
        <th>FECHA_ALTA</th>
        <th>SUC</th>
        <th>TEL</th>
	<th>DIR</th>
        <th>VENDEDOR</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr class="{zebra}">            
            <td id="ruc_{id}">&nbsp;{query0_CI_RUC} &nbsp;&nbsp;<a href=javascript:verSimilares("{id}","{query0_CI_RUC}")><img border="0" src="images/left.png" id="img_{id}" /> </a>   </td>
            <td id="cli_{id}">{query0_CLIENTE}</td>
            <td align="center">&nbsp;{query0_CATEGORIA}</td>
            <td>&nbsp;{query0_FECHA_ALTA}</td>
            <td>&nbsp;{query0_SUC}</td>
            <td>&nbsp;{query0_TEL}</td>
	    <td>&nbsp;{query0_DIR}</td>
            <td>&nbsp;{query0_VENDEDOR}</td>
         </tr>
         <tr><td colspan="8"  ><span id="msg_{id}"></span> </td></tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr>
            <td><b> <i>Cantidad de clientes registrados &nbsp; {i} </i>  </b></td>
            <td></td>
            <td></td>
            <td></td><td></td>
            <td></td>
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td><td></td>
            <td></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->

