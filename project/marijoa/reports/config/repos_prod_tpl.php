<!-- 
    Report Template File (repos_prod)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
   <script type="text/javascript" src="include/jquery.js" > </script>
   <link rel="stylesheet" type="text/css" href="templates/reports.css" />
	<treset_page>
            
        <script language="javascript">
            
          var flag  = 0;
          
          function setFlag(){
              flag = 0;
          }
          
          function verCodigos(suc,fam,grupo,tipo,color,temp,clasif,estruc,id,font){
                // alert("cods_id"+id); 
                $.ajax({
                    type: "POST",
                    url: "include/Ajax.class.php",
                    data: "action=buscar_codigos&suc="+suc+"&fam="+fam+"&grupo="+grupo+"&tipo="+tipo+"&color="+color+"&temp="+temp+"&clasif="+clasif+"&estruc="+estruc+"&font="+font+"&id="+id+"",
                    async:true,
                    dataType: "html",
                    beforeSend: function(objeto){
                       $("#cods_"+id).html("<b><small> Buscando codigos con estas caracteristicas</small></b>  &nbsp;&nbsp;&nbsp;<img src='images/activity.gif' height='9px' width='26px'>");
                    },
                    complete: function(objeto, exito){
                      if(exito=="success"){ 
                        $("#cods_"+id).html( objeto.responseText  ); 
                      }
                    }
               })               
          }
           function verCodigosDepositos(fam,grupo,tipo,color,temp,clasif,estruc,id,font){
                // alert("cods_id"+id); 
                $.ajax({
                    type: "POST",
                    url: "include/Ajax.class.php",
                    data: "action=buscar_codigos_depositos&fam="+fam+"&grupo="+grupo+"&tipo="+tipo+"&color="+color+"&temp="+temp+"&clasif="+clasif+"&estruc="+estruc+"&font="+font+"&id="+id+"",
                    async:true,
                    dataType: "html",
                    beforeSend: function(objeto){
                       $("#cods_"+id).html("<b><small> Buscando codigos en los depositos</small></b>  &nbsp;&nbsp;&nbsp;<img src='images/activity.gif' height='9px' width='26px'>");
                    },
                    complete: function(objeto, exito){
                      if(exito=="success"){ 
                        $("#cods_"+id).html( objeto.responseText  ); 
                      }
                    }
               })               
          }     
          function calcularPrev(suc,pp_de,pp_h,sp_de,sp_h,tp_d,tp_h,fam,grupo,tipo,color,temp,clasif,estruc,id,font,prev_actual_suc){ 
           
           if(flag == 0){
                flag = 1;
                setTimeout("setFlag()",8000);
              
              
            $("#"+id).slideDown("fast");  	
            $("#"+id).html("<b><small> Calculando previciones de las sucursales...</small></b>  &nbsp;&nbsp;&nbsp;<img src='images/working.gif' height='26px' width='26px'>");
            var img =  $("#img_"+id+"").attr("src"); 
            if(img == "images/left.png"){ 
               $("#img_"+id+"").attr("src","images/down.png");
                   $.ajax({
                                type: "POST",
                                url: "include/Ajax.class.php",
                                data: "action=calcular_prevision_sucursales&suc="+suc+"&pp_de="+pp_de+"&pp_h="+pp_h+"&sp_de="+sp_de+"&sp_h="+sp_h+"&tp_d="+tp_d+"&tp_h="+tp_h+"&fam="+fam+"&grupo="+grupo+"&tipo="+tipo+"&color="+color+"&temp="+temp+"&clasif="+clasif+"&estruc="+estruc+"&font="+font+"&prev_actual_suc="+prev_actual_suc+"&id="+id+"",
                                async:true,
                                dataType: "html",
                                beforeSend: function(objeto){
                                  
                                  $("#"+id).html("<b><small> Calculando previciones de las sucursales...</small></b>  &nbsp;&nbsp;&nbsp;<img src='images/working.gif' height='26px' width='26px'>");
                                },
                                complete: function(objeto, exito){
                                    if(exito=="success"){ 
                                        $("#"+id).html( objeto.responseText  );
                                        flag  = 0;    
                                    }
                                }
                            })    
            }else{
               $("#img_"+id+"").attr("src","images/left.png");
               $("#"+id).html("");
               $("#"+id).slideUp("slow"); 
               $("#cods_"+id).slideUp("slow");  
               setFlag();               
            }   
            }else{
               alert("Espere a que termine las demas previciones para no colapsar el Servidor!!!"); 
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
			style="font-weight: bold;"><big>Reporte para Reposicion de Productos Suc.: &nbsp; {sup_rep_localidad}</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
                
                <tr style="text-align: center;font-weight: bolder;font-style: italic;"> <td>Mes Previcion  :{mes_prev} <td>1er Periodo:{per}</td> <td>2do. Periodo :{sdo}</td>  </td> </tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th>FAMILIA</th>
        <th>GRUPO</th>
        <th>TIPO</th>
        <th>COLOR</th>        
        <th>STOCK</th>
        <th>1P</th>
        <th>2P</th>
        <th>3P</th>
        <th>TENDENCIA</th>
        <th>VENTA ESTIMADA</th>
        <th>PREV</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <tr>
            <td class="item" style="font-size: {tam_fuente};" >{query0_FAMILIA}</td>
            <td class="item" style="font-size: {tam_fuente};" >{query0_GRUPO}</td>
            <td class="item" style="font-size: {tam_fuente};" >{query0_TIPO}</td>
            <td class="item" style="font-size: {tam_fuente};" >{query0_COLOR}</td>            
            <td class="num" style="font-size: {tam_fuente};" title="STOCK">{query0_STOCK}</td>
            <td class="num" style="font-size: {tam_fuente};" title="1er Perido {pp}" >{query0_CANT}</td>
            <td class="num" style="font-size: {tam_fuente};" title="2do Perido {sp}" >{query0_CANT2}</td>
            <td class="num" style="font-size: {tam_fuente};" title="3er Perido">{query0_CANT3}</td>
            <td class="num" style="font-size: {tam_fuente};" title="Tendencia = 1P / 2P">{query0_TEND}</td>
            <td class="num" style="font-size: {tam_fuente};" title="Venta Estimada = Tendencia x 3P" >{query0_VE}</td>
            <td class="num" title="Prevision = STOCK - VE " style="color:{color};cursor:{cursor};font-size: {tam_fuente};"  {prev_sucs} >  {query0_PREV}&nbsp;   <img src="images/{image}" width="16px" height="16px"> {img_up_down} </td>
        </tr>
        {previcion_sucursales}  
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

<!-- begin: tiempo -->
        <tr>
            <td  colspan="11"><b>{tiempo}</b></td> 
        </tr>
<!-- end:    tiempo -->

<!-- begin: query0_subtotal_row -->
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="num" ><b>{subtotal0_CANT}</b></td>
            <td class="num" ><b>{subtotal0_STOCK}</b></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->

