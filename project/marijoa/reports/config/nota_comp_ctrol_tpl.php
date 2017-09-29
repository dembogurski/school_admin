<!-- 
    Report Template File (nota_comp_ctrol)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->

<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">

<script type="text/javascript" src="include/jquery.js" > </script>
<link rel="stylesheet" type="text/css" href="templates/reports.css" />

<style>
    .texto{
        border-width: 0px;
        height:26px;
        font-size: 11px;
        text-align: right;
    }
    .itembold{

        font-size:11px;
        padding-left:3px;
        text-align:left;
        font-family: arial;
        font-weight: bolder;

    }
   .ab{
        border-style:solid;
        border-width: 0px 0px 1px 0px;
        margin: 3px;
        border-color: black; 
        
    }

</style>


<script  >
  function roundNumber(num, dec) {
	var result = Math.round(num*Math.pow(10,dec))/Math.pow(10,dec);
	return result;
  }
  function updateRow(id){
      var orig = $("#orig_"+id).val().replace(".","");
      var real = $("#real_"+id).val().replace(".","");
      
      var z_orig = 0;
      var z_real = 0;
     
      $('[id^=orig_]').each(function(){
           var valor = $(this).val().replace(".","");  
           z_orig += parseFloat(valor);                                 
      }); 
      $("#subt_orig").html(z_orig);
     
     
      $('[id^=real_]').each(function(){
           var real = $(this).val().replace(".","");  
           z_real += parseFloat(real);                                 
      }); 
      $("#subt_real").html(z_real);
      var med = $("#tipo_med_"+id).val();
      
      // Precio Prorateado
      var subtotal =   $("#subtotal_ref_"+id).html().replace(".","").replace(".","") ;
      var prorat =    roundNumber(subtotal / real,2).toString().replace(".",",") ;
       
      $("#prorat_"+id).html(prorat);
      
      $.ajax({
         type: "POST",
                    url: "include/Ajax.class.php",
                    data: "action=actualizar_nota_compra&id="+id+"&orig="+orig+"&real="+real+"&tipo_med="+med,
                    async:true,
                    dataType: "html",
                    beforeSend: function(objeto){
                      $("#msg").html("<small> Guardando... </small><img src='images/activity.gif' height='12px' width='60px'>");
                       
                    },
                    complete: function(objeto, exito){
                        if(exito=="success"){ 
                            $("#msg").html( objeto.responseText  );
                            setTimeout('$("#msg").html("")',8000);
                        }
                    }
                }
     )
     
     var subtotal_bruto = $("#subt_mts").text();  
     var subt_mts = parseFloat( subtotal_bruto.replace(".","")); 
     //alert(subt_mts);
     $("#diff").val( z_real - subt_mts);  
      
  }
  function setTipoMed(id){
    var tipo = $("#tipo_med_"+id).val();   
    if(tipo=="" || tipo=="Manual"){
      $("#tipo_med_"+id).val("Maquina");  $("#tipo_med_"+id).css("color","green");
    }else{
      $("#tipo_med_"+id).val("Manual");   $("#tipo_med_"+id).css("color","black"); 
    }
    updateRow(id);
  }
  
  function actualizarCab(nro){
     
     var sucia = $("#m_sucia_"+nro).val();
     var lavar = $('input[name=lavar]');
     var lavarValue = lavar.filter(':checked').val();
     
     var falla = $('input[name=fallada]');
     var fallaValue = falla.filter(':checked').val();
     
     var fallada = $("#m_fallada_"+nro).val();
     var fraccion_origen = $("#m_fraccionada_"+nro).val();
     
     var obs = $("#obs_"+nro).val();
     
      $.ajax({
         type: "POST",
                    url: "include/Ajax.class.php",
                    data: "action=actualizar_nota_cab&nro="+nro+"&sucia="+sucia+"&lavar="+lavarValue+"&fallada="+fallada+"&tipo_falla="+fallaValue+"&fraccion_origen="+fraccion_origen+"&obs="+obs,
                    async:true,
                    dataType: "html",
                    beforeSend: function(objeto){
                      $("#msg").html("<small> Guardando... </small><img src='images/activity.gif' height='12px' width='60px'>");
                       
                    },
                    complete: function(objeto, exito){
                        if(exito=="success"){ 
                            $("#msg").html( objeto.responseText  );
                             setTimeout('$("#msg").html("")',8000);
                        }
                    }
                }
     ) 
  }
  
</script>

<treset_page>
    <!-- end:   general_header -->


<!-- begin: start_query0 -->
    <table style="text-align: left; width: 100%;" border="1" cellpadding="0" cellspacing="0">
        <tbody>
        <thead>
            <tr> <td colspan="50"> 
                    <table style="text-align: left; width: 100%;" border="1"  cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td style="width: 184px;"> </td>
                                <td style="text-align: center;">
                                    <b>Marijoa Tejidos&nbsp;&nbsp;-&nbsp;&nbsp; Herramienta de Gesti&oacute;n y Log&iacute;stica</b></td>
                                <td style="text-align: right;">
                        <tpage><b>Pag: </b></tpage></td>
            </tr>
            <tr>
                <td>
                    <small><small>ycube plus RAD [1.2.31]</small></small>
                </td>
                <td style="text-align: center;font-weight: bold;height: 40px">
                    RECECPI&Oacute;N DE MERCADER&Iacute;AS Y CONTROL DE CALIDAD 
                </td>
                <td style="text-align: right;">
                    <small><small>{user} - {time}</small></small>
                </td>
            </tr>

            <tr>
                <td colspan="3" style="height:46px" > 
                    <table style="text-align: left; width: 100%;" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <th class="item">Fecha:&nbsp;{fecha}</th> <th class="item">INVOICE:&nbsp;{invoice}</th><th  class="item">Mar:&nbsp;{mar}</th></th><th  style="width:40%">&nbsp;</th>  
                        </tr>
                        <tr>
                            <th class="item">Tipo:&nbsp;{nac_int}</th> <th class="item">Moneda:&nbsp;{moneda}</th> <th  class="item">Cotizaci&oacute;n:&nbsp;{cotiz}</th><th>&nbsp; <span id="msg"></span> </th>  
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
    <th>N&deg;</th>

    <th>Nombre en Origen</th>
    <th>Fam</th>
    <th>Grupo</th>
    <th>Tipo</th>
    <th>Color</th>
    <th>Descripci&oacute;n</th>
    <th>Paq</th>
    <th>Unid</th>
    <th>Ancho</th>
    <th title="Cantidad Comprada en Cualquier Unidad">Cant.</th>
    <th title="Gramage" >Gram.</th>
    <th >Metros</th>
    <th  >Origen</th>
    <th  >Real (Mts)</th>
    <th>Precio Compra</th>
    <th>Precio Prorat.</th>
    <th  >SubTotal</th>
    <th  >SubTotal Gs.</th>

    <th>Tipo Med. Manual/Maquina</th>

</tr>
</thead>
<tfoot>
    <tr><td colspan="50"> </td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
<tr id="{query0_id}"  >
    <td class="item">{i}</td> 
    <td class="item">{query0_d_nom_orig}</td>
    <td class="item" >{query0_p_fam}</td>
    <td class="item" >{query0_p_grupo}</td>
    <td class="item" >{query0_p_tipo}</td>
    <td class="item" >{query0_p_color}</td>
    <td class="item" >{query0_descrip}</td>
    <td class="item" >{query0_paq}</td>
    <td class="item" >{query0_unid}</td>
    <td class="num" >{query0_ancho}</td>
    <td class="num" >{query0_cant}</td>
    <td class="num" >{query0_gramage}</td>
    <td class="num" >{query0_metros}</td>
    <td class="num" ><input id="orig_{query0_id}" onblur="updateRow({query0_id})" class="texto" type="text" size="6" value="{query0_origen}">  </td>
    <td class="num" ><input id="real_{query0_id}" onblur="updateRow({query0_id})" class="texto" type="text" size="6" value="{query0_realmts}"> </td>
    <td class="num" >{query0_p_compra}</td> 
     <td class="num" id="prorat_{query0_id}">{query0_precio_prorat}</td>
    <td class="num" >{query0_subtotal}</td>
    <td class="num" id="subtotal_ref_{query0_id}">{query0_subtotal_ref}</td> 
    <td class="item" title="Hacer Clic para Cambiar tipo de Medicion" style="text-align: center;"  >
        <input style="cursor:pointer;text-align: center;"  onclick="setTipoMed({query0_id})" id="tipo_med_{query0_id}" class="texto" readonly="true" type="text" size="8" value="{query0_tipo_med}">   
    </td>

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
    <td></td>
    <td></td><td></td>
</tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
<tr>
    <td colspan="3" class="item" > <b>&nbsp;Cant. Piezas: </b> &nbsp;{i}  </td>


    <td></td>
    <td></td>
    <td></td>

    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <th style="text-align: right;"><b><label id="subt_mts">{subtotal0_metros}</label> </b></th>
    <th style="text-align: right;"><b><label id="subt_orig">{subtotal0_origen}</label></b></th>
    <th style="text-align: right;"><b><label id="subt_real">{subtotal0_realmts}</label></b></th>
    <td></td>
    <td></td>
    <th style="text-align: right;"><b>{subtotal0_subtotal}</b></th>
    <th style="text-align: right;"><b>{subtotal0_subtotal_ref}</b></th>
    <td></td>
    <td></td>
    <td></td>
</tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->

</tbody>
</table>
<!-- end:   end_query0 -->

<!-- begin: control_calidad -->
<table border="0"  cellpadding="0" cellspacing="0" width="100%" >
    <tr> 
        <th style="text-align: left; height: 26px" colspan="4"   > &nbsp;<big>Control de Calidad</big></th> 
    </tr>
    <tr>
        <td style="text-align: left; height: 36px;width:160px" class="itembold" >Mercader&iacute;a Sucia (Mts)</td>
        <td> <input class="ab" style="text-align: center;" type="text" size="8" maxlength="10" id="m_sucia_{query0_d_nro}" value="{sucia}" onchange="actualizarCab({query0_d_nro})" > &nbsp;
        
            <b>Lavable </b><input type="radio" name="lavar" value="Lavable" onclick="actualizarCab({query0_d_nro})"> &nbsp;&nbsp;&nbsp;  
            <b>No Lavable</b> <input type="radio" name="lavar" value="No Lavable" onclick="actualizarCab({query0_d_nro})">
           
         </td>    
         <td style="width:40%">  
             <b>Diff. (Mts)</b> <input type="text" id="diff" class="ab" readonly="" size="10"  value="" >  
        </td>
    </tr>
    <tr> 
        <td style="text-align: left; height: 36px;width:160px" class="itembold" >Mercader&iacute;a Fallada (Mts)</td> 
        <td> <input class="ab" style="text-align: center;" type="text" size="8" maxlength="10" id="m_fallada_{query0_d_nro}" value="{falla}" onchange="actualizarCab({query0_d_nro})" > &nbsp;  
            <b>Totalmente </b><input type="radio" name="fallada" value="Totalmente" onclick="actualizarCab({query0_d_nro})"> &nbsp;&nbsp;&nbsp;  
            <b>Medianamente</b> <input type="radio" name="fallada" value="Medianamente" onclick="actualizarCab({query0_d_nro})">&nbsp;&nbsp;&nbsp;  
            <b>Parcialmente</b> <input type="radio" name="fallada" value="Parcialmente" onclick="actualizarCab({query0_d_nro})">
        </td>
    </tr>
    <tr>   
        <td style="text-align: left; height: 36px;width:160px" class="itembold" >Fraccionada en Origen (Mts)</td> 
        <td><input class="ab" value="{fracionada}" style="text-align: center;" type="text" size="8" maxlength="10" id="m_fraccionada_{query0_d_nro}"   onchange="actualizarCab({query0_d_nro})"> &nbsp;  </td>  
    </tr>
    <tr>   
        <td  style="text-align: left; height: 36px;vertical-align:top;" class="itembold" >Observaciones:</td> 
        <td colspan="2"> <textarea  style="width: 100%;height:auto"   cols="100"   id="obs_{query0_d_nro}" onchange="actualizarCab({query0_d_nro})" >{obs}</textarea> 
        </td>  
    </tr>
    <tr>   
        <td colspan="4" style="text-align: center; height: 66px; vertical-align: bottom " class="itembold" >
            Receptor de Medicion:&nbsp;______________________ &nbsp;&nbsp;&nbsp; Receptor:&nbsp;______________________ &nbsp;&nbsp;&nbsp;Jefe de Log&iacute;stica:&nbsp;______________________ &nbsp;&nbsp;&nbsp;Supervisor/a de Compras:&nbsp;______________________  
          
        </td>       
    </tr>
</table>
<!-- end:   control_calidad -->