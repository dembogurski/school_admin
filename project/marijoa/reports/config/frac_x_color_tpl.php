<!-- 
    Report Template File (frac_x_color)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
       <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
       <link rel="stylesheet" type="text/css" href="templates/jquery.autocomplete.css" />
  <script src="include/jquery.js"></script>
  
       <script type='text/javascript' src='include/jquery.autocomplete.js'></script>
      
   
 
       
 <style type="text/css">

    .message{
        position: absolute;
        top: 0;
        z-index: 10;
        background:#ffc;
        padding:5px;
        border:1px solid #CCCCCC;
        text-align:center;
        font-weight:bold;

        width: auto;
        height: auto;
        margin-top: 120px;
        margin-left: 20%;
        margin-right: 20%;  
    }
    .textarea{
        font-weight: bolder;
        font-size: 22;
    }
    
 table.imagetable {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	border-width: 1px;
	border-color: #999999;
	border-collapse: collapse;
}   
    
 table.imagetable th {
	background:#b5cfd2 url('images/table-images/cell-blue.jpg');
	border-width: 1px;
	padding: 4px;
	border-style: solid;
	border-color: #999999;
}
table.imagetable td {
	background:#dcddc0 url('images/table-images/cell-grey.jpg');
	border-width: 1px;
	padding: 2px;
	border-style: solid;
	border-color: #999999;
}   
</style>      
       


	<treset_page>
            
<script lang="javascript">    
     
        var mycodes = new Array();
        
        // Flotante
 
        function abrirPopup(obj){   
            $("#message").html( obj );
            $("#message").animate({ opacity:100 }, 2000);  
        }
   
        function cerrarPopup(){   
            //$("#message").html('<img  onclick="cerrarPopup()" style="float:right;cursor:pointer;" src="images/12-em-cross.png" />');
            $("#message").html('');
            $("#message").animate({ opacity:0 }, "fast");    
        }
        function limpiar(){   
            $("#message").html('');	
            $("#message").animate({ opacity:0 }, "fast");    
        }
 
        $(window).scroll(function(){
             $('#message').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
        });
            
        function verCodigosHijos(cod){
              
            var img =  $("#img_"+cod+"").attr("src");
             
            if(img == "images/left.png"){
              $("#img_"+cod+"").attr("src","images/down.png"); 
                $.ajax({
                    type: "POST",
                    async:true,
                    dataType: "html",
                    url: "include/Ajax.class.php",
                    data: "action=ver_codigos_hijos_agrupados&codigo="+cod+"",
                    beforeSend: function(objeto){ 
                       $("#msg_"+cod).html("<label class='loading_msg'> </label> <img src='images/working.gif' >"  );  
                    },
                    complete: function(objeto, exito){
                        if(exito=="success"){ 
                           $("#msg_"+cod).html(objeto.responseText);  
                        }
                    } 
                });  
            }else{
              $("#img_"+cod+"").attr("src","images/left.png"); 
              $("#msg_"+cod).html("");   
              
              var c = $("#cell_"+cod+"").css("background-color");
              // rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
              var rgb = c.replace(/^(rgb|rgba)\(/,'').replace(/\)$/,'').replace(/\s/g,'').split(',');
              
              
              
              
              var r = rgb[0];
              var g =rgb[1];
              var b =rgb[2];
              
              g=g-40;
              b=b-20;
              // $("#msg_"+cod).html(""+r+","+g+","+b+"");   
              // alert(r+"  "+g+"  "+b); // returns rgb(65, 136, 251)
              
              if(r == "transparent"){
                  $("#cell_"+cod+"").css("background","rgb("+255+","+128+","+64+")");
              }else{
                  $("#cell_"+cod+"").css("background","rgb("+r+","+g+","+b+")"); 
              } 
            }    
        }  
 
                function buscarColor(){
                    
                    var col = $("#buscar_color").val();
                    $.ajax({
                            type: "POST",
                            url: "include/Ajax.class.php",
                            data: "action=buscar_color&buscar="+col+"",
                            async:true,
                            dataType: "html",
                            beforeSend: function(objeto){
                                 $("#loading_color").html("<img src='images/working.gif'   width='18px' height='16px' >"); 
                            },
                            complete: function(objeto, exito){
                                if(exito=="success"){ 
                                   $("#loading_color").html("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
                                   var res = objeto.responseText.toString().split("|");
                                   $('#colores')
                                    .find('option')
                                    .remove()
                                    .end()
                                ;
                                $.each(res, function(key, value) {   
                                  $('#colores').append($('<option>', { value : key }) .text(value)); 
                                });
                                  
                                }
                                if($('#colores').val()=="" || $('#colores').val()=="Colores"){
                                    $("#boton_guardar").attr("disabled","true");
                                    $("#metrajes").attr("disabled","true");
                                }else{
                                    $("#boton_guardar").removeAttr("disabled");  
                                    $("#metrajes").removeAttr("disabled");  
                                }
                            }
                        }); 
                        
        }

        
        function fraccionar(codigo){
             
               $("#message").attr("onclick",""); 
                           $.ajax({
                            type: "POST",
                            url: "include/Ajax.class.php",
                            data: "action=ventana_frac_x_color&codigo="+codigo+"",
                            async:true,
                            dataType: "html",
                            beforeSend: function(objeto){
                              abrirPopup("<img src='images/loading.gif'   width='60px' >"); 
                            },
                            complete: function(objeto, exito){
                                if(exito=="success"){ 
                                   abrirPopup(objeto.responseText  );  
                                   $("#metrajes").keyup(function (e) {
                                        if (e.keyCode == 13) { 
                                            verificarNumeros();  
                                        }
                                   });
                                }
                            }
                        });
                 
            }   
            var errors = 0;
            
            function verificarNumeros(){
              var totalPadre = $("#cant").val();
              var metros =  $.trim($("#metrajes").val());
              var nros = metros.toString().split("\n");
              var errors = 0;
              var sumador = 0;
              
              
              for(var i = 0;i < nros.length; i++){
                  
                  var linea = nros[i].toString().split(",");
                  var metros =  linea[0];
                  var kilos =  linea[1]; 
                  var l= i + 1;
                  
                  if(isNaN(metros) || metros == "" || isNaN(kilos) || kilos == "" ){
                      $("#mensajes").fadeIn("slow");
                      $("#mensajes").html("&nbsp; <img src='images/dialog-warning.png'   width='28px' height='28px' > &nbsp;&nbsp; <b>  Error en la linea "+l+" el valor (   "+metros+","+kilos+"   )  debe contener numeros... </b>");
                      // alert("Error en la linea "+i+" el valor '"+linea[0]+"'");
                      errors++;
                  }else{
                      var nro = eval(linea[0]);
                      sumador+=nro; 
                  }
              } 
              var diff =  ($("#cant").val() - sumador).toFixed(2);
              $("#suma_actual").val(sumador);
               
              $("#restante").val(diff);
              
              var color =  $("#colores").val();
            
              if(errors > 0 || color == ""  ){   
                   $("#frac").attr("disabled","true");
              }else{ 
                 if(sumador >= totalPadre){
                  $("#mensajes").html("&nbsp; <img src='images/dialog-warning.png'   width='28px' height='28px' > <b>&nbsp;&nbsp; Suma de Fracciones = "+sumador+" supera la cantidad del codigo Padre "+totalPadre+", debe realizar algun ajuste</b>"); 
                  $("#mensajes").fadeIn("slow"); 
                }else{
                    $("#mensajes").html(""); 
                    $("#mensajes").fadeOut("slow"); 
                }
                $("#frac").removeAttr("disabled"); 
              }
               
            }
 
            
            function fraccionarLote(){
               var r = confirm("Confirme que desea fraccionar estos metrajes con este color!");
               var codigo =  $.trim($("#codigo").val());
               var color =  $.trim($("#colores").val());
               var usuario =  $.trim($("#user").val());
               
               if(r){
                  var lote =  $.trim($("#metrajes").val());
                        $.ajax({
                            type: "POST",
                            url: "include/Ajax.class.php",
                            data: "action=fraccionar_lote_x_color&codigo="+codigo+"&lote="+lote+"&color="+color+"&usuario="+usuario,
                            async:true,
                            dataType: "html",
                            beforeSend: function(objeto){
                                $("#frac").attr("disabled","true");
                               $("#loading_color").html("<label class='loading_msg'> </label> <img src='images/working.gif' >"  );  
                            },
                            complete: function(objeto, exito){
                                if(exito=="success"){ 
                                   $("#message").html(objeto.responseText );                                   
                                }
                            }
                        });
               }
            }
            function cancelar(){
              var metros =  $.trim($("#metrajes").val());
              if(metros == ""){
                  cerrarPopup(); 
              }else{
                var r = confirm("¿Realmente desea cancelar esta operacion?");
                if(r){
                    cerrarPopup();
                }
               }
            }
            
            function marcarDesmarcar(id){
                 var checked = $("#"+id).is(':checked'); 
                 
                 if(checked){
                    $('[id^=check_cod_]').each(function(){
                        $(this).attr("checked",true); 
                        var currentId = $(this).attr('id');
                        
                        var codigo = currentId.substring(10,30); 
                                                
                        $("#sp_"+codigo).html("No");
                        
                    });                  
                 }else{
                    $('[id^=check_cod_]').each(function(){ 
                       $(this).removeAttr("checked");  
                        var currentId = $(this).attr('id');
                        
                        var codigo = currentId.substring(10,30); 
                                                
                        $("#sp_"+codigo).html("Tr");
                    });                   
                 }
                 mostrarVentanaConfirmacion();
            }
            
            function marcarDesmarcarGrupo(codigo,hash){
                
                 var color = $("#color_"+hash).text();  
                 var checked = $("#check_cod_"+codigo+"-"+hash).is(':checked'); 
                 
                 var state = '';
                 if(checked){ 
                      state = 'No';
                 }else{ 
                      state = 'Tr';
                 }
                 $.ajax({
                            type: "POST",
                            url: "include/Ajax.class.php",
                            data: "action=cambiar_estado_trs_nos&codigo="+codigo+"&color="+color+"&estado="+state,
                            async:true,
                            dataType: "html",
                            beforeSend: function(objeto){ 
                                abrirPopup("<label class='loading_msg'>Procesando...   </label> <img src='images/working.gif' >"); 
                                $("#sp_"+hash).html("<img src='images/working.gif' >");  
                            },
                            complete: function(objeto, exito){
                                if(exito=="success"){   
                                    abrirPopup(objeto.responseText);
                                    $("#sp_"+hash).html(state); 
                                    setTimeout("cerrarPopup()",3000);
                                }
                            }
                        });   
                 
                 //mostrarVentanaConfirmacion();
            }
            
            function imprimirCodigosHijos(codigo,hash){
                 var color = $("#color_"+hash).text();  
                
                $.ajax({
                            type: "POST",
                            url: "include/Ajax.class.php",
                            data: "action=lista_codigos_hijos_x_color&codigo="+codigo+"&color="+color+"",
                            async:true,
                            dataType: "html",
                            beforeSend: function(objeto){ 
                                abrirPopup("<label class='loading_msg'>Procesando...   </label> <img src='images/working.gif' >");  
                            },
                            complete: function(objeto, exito){
                                if(exito=="success"){   
                                    var codigos = objeto.responseText;  //alert(codigos); 
                                    window.open("project/marijoa/reports/config/re_code39Lotes_prg_recib.php?codigos="+codigos+"","Codigos de Barras","width=350,height=500,scrollbars=yes");
                                    setTimeout("cerrarPopup()",1000);
                                }
                            }
                        });    
                 
                 
            }     
            
            function ayudaDescripcion(){ 
                 abrirPopup("<label class='loading_msg'> Ingrese el metraje total de cada Rollo, el peso total en Kilos y la descripcion si la hubiere los datos deben ir entre 'Comas' Ej.: </label> \n\
                <br>  40,12.5<br> 36.4,17,Con florcitas rojas<br> \n\
                 <input type='button' onclick='cerrarPopup()' value='Cerrar' >   ");  
            }
            
            function marcarDesmarcarPadre(id){
                 var checked = $("#"+id).is(':checked'); 
                 
                 if(checked){
                     var currentId = $("#"+id).attr('id');                        
                     var codigo = currentId.substring(12,30);  
                     $("#padre_"+codigo).html("No"); 
                     procesarEstadoCodigo(codigo,"No");
                 }else{
                    var currentId = $("#"+id).attr('id'); 
                    var codigo = currentId.substring(12,30); 
                    $("#padre_"+codigo).html("Tr"); 
                     procesarEstadoCodigo(codigo,"Tr");
                 }                
            }
            
            function procesarEstadoCodigo(codigo,estado){
                       $.ajax({
                            type: "POST",
                            url: "include/Ajax.class.php",
                            data: "action=cambiar_estado_codigo&codigo="+codigo+"&estado="+estado+"",
                            async:true,
                            dataType: "html",
                            beforeSend: function(objeto){ 
                                abrirPopup("<label class='loading_msg'>Procesando...         </label> <img src='images/working.gif' >");   
                            },
                            complete: function(objeto, exito){
                                if(exito=="success"){ 
                                   $("#message").html(objeto.responseText );   
                                   setTimeout("cerrarPopup()",3000);
                                }
                            }
                        });
            }
            
            
            
            function mostrarVentanaConfirmacion(){ 
                 abrirPopup(" <label class='label'>Confirme el cambio de estado aqui: </label>  <input type='button' onclick='cambiarEstadoHijos()' value='Confirmar' >  &nbsp; <input type='button' onclick='cerrarPopup()' value='Cancelar' >"); 
            }
            function guardarColorCodigoPadre(codigo){
                var color = $("#colores").val();
                     $.ajax({
                            type: "POST",
                            url: "include/Ajax.class.php",
                            data: "action=cambiar_color_codigo&codigo="+codigo+"&color="+color,
                            async:true,
                            dataType: "html",
                            beforeSend: function(objeto){ 
                                $("#loading_color").html("<label class='loading_msg'>Procesando... </label> <img src='images/working.gif' >");   
                            },
                            complete: function(objeto, exito){
                                if(exito=="success"){ 
                                  $("#loading_color").html("" );  
                                  $("#message").html(objeto.responseText+" &nbsp;&nbsp; <input type='button' onclick='cerrarPopup()' value='Cerrar' >" );  
                                  $("#color_cod_"+codigo).html(color);  
                                  $("#color_cod_"+codigo).css("color","green");  
                                    setTimeout("cerrarPopup()",6000);
                                }
                            }
                        });   
            }
            
            function cambiarColorPadre(codigo){
                var color = $("#color_cod_"+codigo).text(); 
                var html = '<table border="0" width="auto" cellpadding="0" cellspacing="0"> \n\
                              <tr> <td style="width:70%"> <label class="label" >Busque el color aqui:</label> <input type="text" id="buscar_color" onchange="buscarColor()" />  <span id="loading_color" style="width:24px"></span>\n\
                              <select id="colores"> >\n\
                                  <option value="">Colores</colores> \n\
			      </select>  &nbsp;&nbsp;</td><td>    <input type="button" onclick=guardarColorCodigoPadre("'+codigo+'") value="Guardar" id="boton_guardar" disabled>   &nbsp;&nbsp;   <input type="button" onclick="cerrarPopup()" value="Cancelar" >    \n\
                             </td> </tr>\n\
                </table>';     
              abrirPopup(html);  
            }
            
            function verCodigos(){
                var codigos = "";
                for(var i = 0;i < mycodes.length; i++){
                   codigos= codigos+""+mycodes[i]+"\n";
                }                
                $("#codigos_fraccionados").val(codigos); 
            }
            function verCodigosGlobal(){
                var html = "<label class='label'>Codigos generados en esta sesi&oacute;n</label><br>";
                
                var codigos = '';
                
                var flag = false;
                
                for(var i = 0;i < mycodes.length; i++){
                   html= html+""+mycodes[i]+"<br>";
                   codigos =  codigos+""+mycodes[i]+"|";
                   flag = true;
                }  
                
                if(!flag){
                  html=html+"<br>Ningun codigo generado en esta session!<br>"; 
                }               
                html=html+"<input type='button' onclick='cerrarPopup()' value='Cerrar' ><br>";
                abrirPopup(html);
                if(flag){
                  window.open("project/marijoa/reports/config/re_code39Lotes_prg_recib.php?codigos="+codigos+"","","width=300,height=400");
                }               
            }
            
            function ajustar(codigo){
                    var usuario =  $.trim($("#user").val()); 
                     
                    $.ajax({
                            type: "POST",
                            url: "include/Ajax.class.php",
                            data: "action=realizar_ajuste_en_entrada&codigo="+codigo+"&accion=no_ajustar&usuario"+usuario,
                            async:true,
                            dataType: "html",
                            beforeSend: function(objeto){ 
                               $("#msg_ajuste").html("<label class='loading_msg'>Verificando metraje... </label> <img src='images/activity.gif' width='40px' height='10px' >");   
                            },
                            complete: function(objeto, exito){
                                if(exito=="success"){ 
                                    
                                     var conf = confirm(objeto.responseText);
                                     if(conf){
                                        $.ajax({
                                            type: "POST",
                                            url: "include/Ajax.class.php",
                                            data: "action=realizar_ajuste_en_entrada&codigo="+codigo+"&accion=ajustar&usuario="+usuario,
                                            async:true,
                                            dataType: "html",
                                            beforeSend: function(objeto){ 
                                               $("#msg_ajuste").html("<label class='loading_msg'>Realizando Ajuste... </label> <img src='images/activity.gif' width='40px' height='10px' >");   
                                            },
                                            complete: function(objeto, exito){
                                                if(exito=="success"){ 
                                                    $("#msg_ajuste").html(objeto.responseText);  
                                                }
                                            }
                                        });   
                                     }    
                                     // $("#msg_ajuste").html("");   
                                    
                                }
                            }
                        });   
            }
            
            function hover(){
                $("#msg_ajuste").html("<b>Realizar un Ajuste de Entrada!</b>");     
            }
            function out(){
                $("#msg_ajuste").html("");   
            }
            
 
        </script>   
        
                
        <div id="message" class="message"  style="opacity:0;"   >   </div>
       
<!-- end:   general_header -->
 


<!-- begin: start_query0 -->
 <input type="hidden" id="user" value="{user}">
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
		  <td style="text-align: center;"><big
			style="font-weight: bold;"><big>Herramienta Dinamica para Fraccionamiento por Color  </big></td>
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
        <th>CODIGO</th>
        <th>FAMILIA</th>
        <th>GRUPO</th>
        <th>TIPO</th>
        <th>COLOR</th>
        <th>LISO</th>
        <th>DESCRIP</th>
        <th style="text-align: right;">CANT_COMPRA</th>
        <th style="text-align: right;">CANT</th>
        <th>ANCHO</th>
        <th>GRAMAJE</th>
        <th>FP</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr />  </td></tr>
                
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr>
             <td class="item" id="cell_{query0_CODIGO}">{query0_CODIGO}&nbsp;&nbsp;<a href=javascript:verCodigosHijos("{query0_CODIGO}")><img border="0" src="images/left.png" id="img_{query0_CODIGO}" title="Ver codigos Hijos" /> </a>&nbsp;&nbsp;&nbsp;&nbsp; <a style="text-decoration: none" href="javascript:verCodigosGlobal()">&equiv;</a></td>
            <td class="item">{query0_FAMILIA}</td>
            <td class="item">{query0_GRUPO}</td>
            <td class="item">{query0_TIPO}</td>
            <td class="itemc"><a href=javascript:cambiarColorPadre("{query0_CODIGO}")><img title="Cambiar Color" border="0" src="images/settings.png" height="15" width="15"></a> &nbsp;&nbsp;&nbsp;&nbsp;<span id="color_cod_{query0_CODIGO}">{query0_COLOR}</span> &nbsp;&nbsp;<a href=javascript:fraccionar("{query0_CODIGO}")><img title="Fraccionar" border="0" src="images/forward_enabled_hover.png" height="15" width="15"></a></td>
            <td class="item">{query0_LISO}</td>
            <td class="item">{query0_DESCRIP}</td>
            <td class="num">{query0_CANT_COMPRA}</td>
            <td class="num">{query0_CANT}</td>
            <td class="num">{query0_ANCHO}</td>
            <td class="num">{query0_GRAMAJE}</td>
            <td class="itemc" > <span id="padre_{query0_CODIGO}">{query0_FP}</span> &nbsp;  <input  type="checkbox" id="check_padre_{query0_CODIGO}" onclick=marcarDesmarcarPadre("check_padre_{query0_CODIGO}") {checked_unchequed} >     </td> 
         </tr>
         <tr>
             <td colspan="12" id="msg_{query0_CODIGO}"></td>
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
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align: right; font-size: 11px;padding-right: 2px"><b>{subtotal0_CANT_COMPRA}</b></td>
            <td style="text-align: right; font-size: 11px;padding-right: 2px"><b>{subtotal0_CANT}</b></td>
            <td></td>
            <td></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->

