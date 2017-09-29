<!-- 
    Report Template File (hist_precios)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
       <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
       <script type="text/javascript" src="include/jquery.js" > </script> 
       
	<treset_page>
       
        <script lang="javascript">    
            
        function verImagenes(id){
              
            var img =  $("#img_"+id+"").attr("src");
            
            
            if(img == "images/left.png"){
              $("#img_"+id+"").attr("src","images/down.png");
              
              //$("#msg_"+id).slideDown("slow");
                $.ajax({
                    type: "POST",
                    async:true,
                    dataType: "html",
                    url: "include/Ajax.class.php",
                    data: "action=ver_imagenes_rebaja&nro="+id+"",
                    beforeSend: function(objeto){ 
                       $("#msg_"+id).html("<label class='loading_msg'> </label> <img src='images/working.gif' >"  );  
                    },
                    complete: function(objeto, exito){
                        if(exito=="success"){ 
                          $("#msg_"+id).html(objeto.responseText);  
                        }
                    } 
                });  
            }else{
              $("#img_"+id+"").attr("src","images/left.png"); 
              $("#msg_"+id).html("");  
              //$("#msg_"+id).fadeOut("slow");
            }         
            
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
		  <td style="text-align: center;"><big 	style="font-weight: bold;"><big>Historial de Modificacion de Precios</big></td>
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
        <th>N&deg;</th>
        <th>Fecha</th>
        <th>Usuario</th>
        <th>Codigo</th>
        <th>Sector</th>
        <th>Grupo</th>
        <th>Tipo</th>
        <th>Color</th>
        <th>P.Cant</th>
        <th>P.Valmin</th>
        <th>P.Compra</th>
        <th>Precio 1</th>
        <th>Precio 2</th>
        <th>Precio 3</th>
        <th>Precio 4</th>
        <th>Precio 5</th>
        <th>Falla</th>
        <th>Obs</th>
        <th>Vol.Actual/Orig</th>
        <th>%S/Orig</th>
        
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr>
             <td class="item" style="height: 30px">{query0_nro}&nbsp;  <a href=javascript:verImagenes("{query0_nro}")><img border="0" src="images/left.png" id="img_{query0_nro}" /> </a></td>
            <td class="item">{query0_fecha}</td>
            <td class="item">{query0_usuario}</td>
            <td class="item">{query0_codigo}</td>
            <td class="item">{query0_p_fam}</td>
            <td class="item">{query0_p_grupo}</td>
            <td class="item">{query0_p_tipo}</td>
            <td class="item">{query0_p_color}</td>
            <td class="itemc">{query0_p_cant}</td>
            <td class="itemc">{query0_p_valmin}</td>
            <td class="itemc">{query0_p_compra}</td>
            <td class="itemc">{query0_p1}</td>
            <td class="itemc">{query0_p2}</td>
            <td class="itemc">{query0_p3}</td>
            <td class="itemc">{query0_p4}</td>
            <td class="itemc">{query0_p5}</td>
            <td class="item">{query0_falla} / {query0_nombre_falla}</td>
            <td class="item">{query0_obs}</td>
            <td class="itemc">{query0_vol_actual} / {query0_volumen_orig}</td>
            <td class="itemc">{query0_porc}%</td>
            
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
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td colspan="18" id="msg_{query0_nro}"></td> 
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->

