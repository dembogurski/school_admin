<!-- 
    Report Template File (repos_general)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
<link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
<script type="text/javascript" src="include/jquery.js" > </script>

<link rel="stylesheet" href="templates/jquery-ui.css" />
<script src="include/jquery-1.8.2.js"></script>
<script src="include/jquery-ui.js"></script>

<treset_page>
    <div id="progreso" style="height: 36px;"></div>
    <div id="progressbar" style="height: 16px"></div>

    <script language="javascript">
      
        function progreso(){
           
            $.ajax({
                type: "POST",
                url: "include/Ajax.class.php",
                data: "action=get_progreso",
                async:true,
                dataType: "html",
                beforeSend: function(objeto){ 
                },
                complete: function(objeto, exito){
                    if(exito=="success"){   
                       var progress = $.trim( objeto.responseText);  
                       var mensaje = progress.split('|');
                       var valor = parseInt( mensaje[1] ); 
                       //alert(progress);
                       $( "#progressbar" ).progressbar({  value: valor }); 
                       if(mensaje[0] != "Progreso: Fin"){
                            $("#progreso").html( "<img src='images/loading.gif' <b>  "+mensaje[0]+" </b>"  );   
                        }else{
                            $("#progreso").html("");   
                            clearInterval(tiempo); 
                            $("#progreso").slideUp("slow");
                        }
                        
                    }
                }
            });   
            
        }
        $( "#progressbar" ).progressbar({  value: 10 });
        $("#progreso").html( "<img src='images/loading.gif'"  );  
   
        var tiempo = setInterval("progreso()",3000);
                
        function recalc(id){
           var tend = parseFloat( $("#tend_"+id).val() );
           var p3   = parseFloat( $("#p3_"+id).val() );
           $("#ve_"+id).val(tend * p3);
           
           var ve   = parseFloat($("#ve_"+id).val());
           
           var cp   = parseFloat($("#cp_"+id).val());
           if(cp > 0){
              $("#prev_"+id).val(cp - ve);
           }else{
              $("#prev_"+id).val(-ve);  
           }
        }
        
        function discr(fam,gru,tipo,color,cant_actual,fvpd,fvph,fp1d,fp1h,fp2d,fp2h,fp3d,fp3h,id){ 
                        
            var cla = $("#cla").val(); 
            var temp = $("#temp").val(); 
            var estruc = $("#estruc").val(); 
            
             $.ajax({
                type: "POST",
                url: "include/Ajax.class.php",
                data: "action=calc_prevision_discriminada&fam="+fam+"&gru="+gru+"&tipo="+tipo+"&cla="+cla+"&temp="+temp+"&estruc="+estruc+"&color="+color+"&cant_actual="+cant_actual+"&fvpd="+fvpd+"&fvph="+fvph+"&fp1d="+fp1d+"&fp1h="+fp1h+"&fp2d="+fp2d+"&fp2h="+fp2h+"&fp3d="+fp3d+"&fp3h="+fp3h+"",
                async:true,
                dataType: "html",
                beforeSend: function(objeto){ 
                   $("#discr_"+id).slideDown("fast");
                   $("#discr_"+id).html("<b>Procesando Favor espere...</b><img src='images/loading.gif'" ); 
                   $( "#progressbar" ).progressbar({  value: 10 });   
                   tiempo = setInterval("progreso()",3000);
                   $("#progreso").slideDown("slow"); 
                },
                complete: function(objeto, exito){
                    if(exito=="success"){  
                       $("#discr_"+id).html(objeto.responseText);   
                       clearInterval(tiempo); 
                       $("#progreso").slideUp("slow");
                    }
                }
            });          
        }
 
        
    </script>
    
    <style>
        .edit{
           border:0px; 
        }        
    </style>

    <!-- end:   general_header -->


<!-- begin: start_query0  -->

<input type="hidden" value="{cla}" id="cla">
<input type="hidden" value="{temp}" id="temp">
<input type="hidden" value="{estruc}" id="estruc">

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
            style="font-weight: bold;"><big>Reporte de Reposicion General</big></td>
            <td style="text-align: right;">
                <small><small>{user} - {time}</small></small>
            </td>
            </tr>
            <tr> <td  colspan="3">{tela}</td> </tr>
            </tbody>
    </table>
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
<tr>
    <th>FAM</th>
    <th>GRUPO</th>
    <th>TIPO</th>
    <th>COLOR</th>
    <th>CANT</th>
    <th>Vent. Prev.</th>
    <th>Cant. Proy.</th>
    <th>1&deg;P</th>
    <th>2&deg;P</th>
    <th>3&deg;P</th>
    <th title="Tendencia: 1P/2P">Tend.</th>
    <th title="Venta Estimada: Tendencia x 3P">Vent. Est.</th>
    <th title="Prevision: Stock Proyectado - Venta Estimada">Prevision</th>
</tr>
</thead>
<tfoot>
    <tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
<tr>
    <td class="item">{query0_FAM}</td>
    <td class="item">{query0_GRUPO}</td>
    <td class="item">{query0_TIPO}</td>
    <td class="item"> <a href="javascript:{discriminar}" style="text-decoration:none">{query0_COLOR}</a></td>
    <td class="num"><input class="edit" id="cp_{id}" type="text" value="{query0_CANT}" size="8"  readonly> </td>
    <td class="num">{query0_VP}</td>
    <td class="num">{cant_proy}</td>
    <td class="num">{p1}</td>
    <td class="num">{p2}</td>
    <td class="num"><input class="edit" id="p3_{id}" type="text" value="{p3}" size="8"  readonly></td>
    <td class="num" title="Tendencia: 1P/2P  Valor Celda: {tendencia}"> <input onchange=recalc("{id}") class="edit" id="tend_{id}" type="text" value="{tendencia}" size="5" maxlength="5"></td>
    <td class="num" title="Venta Estimada: Tendencia x 3P" ><input class="edit" id="ve_{id}" type="text" value="{ve}" size="6" maxlength="6" readonly> </td>
    <td class="num" align="right" title="Prevision: Stock Proyectado - Venta Estimada"><input class="edit" id="prev_{id}" type="text" value="{prevision}" size="8" maxlength="8" readonly> </td>
</tr>
<tr style="border-width: 0px"> <td colspan="3"  style="border-width: 0px" ></td> <td  style="border-width: 0px" colspan="10" id="discr_{id}"></td></tr>
<!-- end:    query0_data_row -->

<!-- begin: query0_total_row -->
<tr style="font-weight: bolder">
    <td colspan="4"></td> 
    <td>{z_cant}</td>
    <td>{z_vp}</td>
    <td>{z_st_proy}</td>
    <td>{z_p1}</td>
    <td>{z_p2}</td>
    <td>{z_p3}</td>
    <td>{z_tend}</td>
    <td>{z_ve}</td>
    <td>{z_prev}</td>
</tr>
<!-- end:    query0_total_row -->
 
<!-- begin: end_query0 -->
<tr>
    <td colspan="5"><b>{tiempo}</b></td> 
</tr> 
</tbody>
</table>

<!-- end:   end_query0 -->



