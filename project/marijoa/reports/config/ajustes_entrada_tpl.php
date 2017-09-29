<!-- 
    Report Template File (ajustes_entrada)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
<link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
<script type="text/javascript" src="include/jquery.js" > </script>
<treset_page>
    <style type="text/css">
		.number {
			padding-right: 4px;
			text-align: right;
		}
		.left {
			padding-left: 4px;
			text-align: left;
		}
		.center {
			text-align: center;
		}
		.texto {
			width: 100%;
			border: solid gray 0px;
			text-align: right;
		}
		.texto_hijos {
			width: 100%;
			border: solid gray 0px;
			text-align: right;
			font-size: 11px
		}
		.popup {
			position: absolute;
			top: 0;
			z-index: 10;
			background: #ffc;
			padding: 5px;
			border: 1px solid #CCCCCC;
			text-align: center;
			font-weight: bold;
			width: 50%;
			height: auto;
			margin-top: 40px;
			margin-left: 25%;
			margin-right: 25%;
		}
    </style>    
   
    <script language="javascript">
        var codigo = 0; 
        var ajustado = false;
        var intentos = 0; 
        var ajustes = 0;
        
        var frac_code = '<div style="height: 60px;vertical-align: middle;background:#EEDD82"> <br>&nbsp;&nbsp;<label>Ingrese el metraje a fraccionar: </label>   \n\
        <input type="text" class="number" id="new_cant" size="6" onkeyup="checkNumber()"> \n\
        <input  type="button" value="Fraccionar" id="boton_fraccionar" onclick="fraccionar()" disabled>  <span id="msg"></span></div>'; 
    
        var supervisor = '<div style="height: 60px;vertical-align: middle;background:#EEDD82"> \n\
        \n\ <div style="text-align:right;cursor:pointer"><img src="images/12-em-cross.png" onclick=cerrarPopup()></div>\n\
        <br>&nbsp;&nbsp;<label>Usuario: </label>   \n\
        <input type="text" id="supervisor" size="12"> <label>Contrase&ntilde;a: </label> <input type="password" id="password" size="12"> \n\
        <input  type="button" value="Aceptar" id="accept" onclick="checkSupervisorPassword()" >  <br><span id="msgs"></span></div>'; 
    
        function abrirPopup(){   
            $("#popup").html( supervisor ); 
            $("#popup").slideDown("fast"); 
        }
        function cerrarPopup(){     
             $("#popup").slideUp("fast");
        }
        function checkSupervisorPassword(){
             
        var supervisor = $("#supervisor").val(); 
        var passw = $("#password").val(); 
            
            $.ajax({
                    type: "POST",
                    url: "include/Ajax.class.php",
                    data: "action=verificar_usuario&supervisor="+supervisor+"&passw="+passw,
                    async:true,
                    dataType: "html",
                    beforeSend: function(objeto){ 
                        $("#msgs").html("<img src='images/activity.gif' height='12px' width='60px'>");
                    },
                    complete: function(objeto, exito){
                        if(exito=="success"){                            
                            // 0  No existe Usuario o su contrase�a es incorrecta
                            // 1  Trustee correcto
                            // 2  Trustee incorrecto no tiene permisos suficientes 
                            var numero =  $.trim(objeto.responseText  );
                             
                            if(numero == "0" ){
                                alert("Su nombre de usuario o contrase�a son incorrectos...");
                            }else if(numero == "1"){
                                                              
                                //$("#usuario").val(supervisor);
                                cerrarPopup();
                                guardarAjustes();
                                ajustes++; 
                            }else{
                                alert("No tiene suficientes permisos para realizar esta accion...");
                            }
                        }
                    }
                });
                
                
        }  
        
        
        function checkNumber(){
           var cantidad =  $('#new_cant').val();
           if(!isNaN(cantidad)){// Es numero
               $("#boton_fraccionar").removeAttr("disabled");
           }else{
               $("#boton_fraccionar").attr("disabled",true);
           }
           var metros = parseFloat(  $("#metros_"+codigo).html(),2);
           
           if(metros <= cantidad || cantidad <= 0){
                $("#msg").html("Cantidad Insuficiente...");
                $("#boton_fraccionar").attr("disabled",true);
           }else{
               $("#msg").html("");
               $("#boton_fraccionar").removeAttr("disabled");
           }
           
           
        } 
        function abrirOpciones(id){ 
            $('[id^=frac_]').each(function(){
                var thisid = $(this).attr('id');  
                var checked = $('#'+thisid).is(':checked');  
                if(checked){
                     var id_ =   thisid.substring(5,18);
                     if(id != id_){ // Cerrar todos los otros
                        $('#sub_td_'+id_).html("");
                        $('#sub_td_'+id_).fadeOut("fast");
                        $(this).removeAttr("checked");
                     }

                }                            
            });            
            
            
            codigo = id; 
            var state = $('#frac_'+id).is(':checked');
            if(state){
                $('#sub_td_'+id).html(frac_code);
                $('#sub_td_'+id).fadeIn("fast");
                setTimeout("$('#new_cant').focus()",500);
          
            }else{
                $('#sub_td_'+id).html("");
                $('#sub_td_'+id).fadeOut("fast");
            }
        } 
   
        function fraccionar(){
            
            var cantidad = $('#new_cant').val(); 
                        
            $.ajax({
                type: "POST",
                url: "include/Ajax.class.php",
                data: "action=fraccionar_codigo&codigo="+codigo+"&cantidad="+cantidad,
                async:true,
                dataType: "html",
                beforeSend: function(objeto){ 
                    $("#msg").html("<img src='images/activity.gif' height='12px' width='60px'>");
                },
                complete: function(objeto, exito){
                    if(exito=="success"){ 
                          alert( objeto.responseText  ); 
                          window.location.reload();
                    }
                }
            }
        )       
        }   
      function setAnchoTara(codigo){
          var ancho = $("#ancho_"+codigo).val();  
 
          var tara = $("#tara_"+codigo).val();  
      
          var flag = false;
          if(ancho > 3.5 || ancho < 0.20){
              $("#message").html("<label>Cuidado.! Ancho fuera de rango...</label>");
              flag = true;
          }
          if(tara > 10000){
              $("#message").html("<label>Cuidado.! Tara fuera de rango...</label>");
              flag = true;
          }
          
          
          if(!flag){
              
          $('[id^=ancho_]').each(function(){ 
                $(this).val(ancho);
          }); 
          $('[id^=tara_]').each(function(){ 
                $(this).val(tara);
          });    
          
            $('[id^=cod_]').each(function(){ 
                var thisid = $(this).attr('id');  
                var codigox =   thisid.substring(4,20);  
                $.ajax({
                        type: "POST",
                        url: "include/Ajax.class.php",
                        data: "action=actualizar_tara_ancho&codigo="+codigox+"&tara="+tara+"&ancho="+ancho,
                        async:true,
                        dataType: "html",
                        beforeSend: function(objeto){
                            $("#msg_"+codigox).html("<img src='images/search2.gif' >"); 
                        },
                        complete: function(objeto, exito){
                            if(exito=="success"){
                                $("#msg_"+codigox).html("<img src='images/ok.png'>"); 
                            }
                        }
                });  

            });
            // Calcula el Gramaje
            setAjuste(codigo);
            $("#message").html("");
         }
     }
     
     // Calcula el Gramaje
     function setAjuste(codigo){
         var cant_real = $("#cant_real_"+codigo).val();  
         var metros = parseFloat(  $("#metros_"+codigo).html(),2); 
         var diff = cant_real - metros
         $("#ajuste_calculado_"+codigo).val(diff);  
         
         var total  = parseFloat($("#total").html()  ,2);
         var tolerancia = (total  * 10) / 100; 
         
         
         var ajuste = getAjustes();//parseFloat( $("#ajuste_calculado_"+codigo).val(),2);
         
         var total_metros = total + ajuste;    
         var kg = $("#kg").val();
         var tara = $("#tara_"+codigo).val() / 1000;  
         
         var ancho = $("#ancho_"+codigo).val();  
         //var gramaje = ( ((kg - tara) * 1000) / (total_metros * ancho)).toFixed(2);
         var gramaje = ((kg - tara) * 1000) / (total_metros * ancho)
         var gramaje_inicial =  parseFloat($("#gramaje_inicial" ).val(),2); 
         
         var gm_up = gramaje_inicial + (gramaje_inicial * 5 / 100);
         var gm_down = gramaje_inicial - (gramaje_inicial * 5 / 100);
         
         if((gramaje < gm_down || gramaje > gm_up) && gramaje_inicial > 1 ){ // Si es uno entonces no fueron sacadas las muestras
             $("#err_gramaje").html("ATENCION! Gramaje   "+(gramaje).toFixed(2)+"   fuera de tolerancia sobre Gramaje Inicial.  "+(gm_down).toFixed(2)+"  <big> &#8596;</big>    "+(gm_up).toFixed(2)); 
         }else{
             $("#err_gramaje").html("");           
         }
         $('[id^=gramaje_]').each(function(){ 
                $(this).html((gramaje).toFixed(2));
         });  
         if(diff != 0  && cant_real != ""){
             var total_real = 0;
             $('[id^=cant_real_]').each(function(){ 
               var cant = parseFloat($(this).val());
               total_real  = total_real + cant;
             });  
             
             var tol_baja = total - tolerancia;
             var tol_alta = total  + tolerancia;
             var msg_total_real =  parseFloat(total_real,2).toFixed(2);
             //$("#message").html("  Total: "+total+"  &nbsp;&nbsp; Tolerancia "+tolerancia+"     &nbsp;&nbsp;  &nbsp;&nbsp;   &nbsp;&nbsp; tol_baja  " +tol_baja+"  <  Real:   "+total_real+"  > tol_alta  "+tol_alta );
                
             if( (total_real < tol_baja  )  ||  (total_real > tol_alta )  ){
                 $("#message").html("<label style='font-weight:bolder;font-size:14px'>Corte sobre tolerancia...  &nbsp;&nbsp;&nbsp;&nbsp;Cantidad Real:   "+msg_total_real+" &nbsp; metros&nbsp;&nbsp;&nbsp;Rango aceptable &nbsp;&nbsp;&nbsp;&nbsp;" +tol_baja+"<big> &#8596;</big> "+tol_alta +"</label>");
                
                 $("#boton_ajustar").attr("disabled",true); 
                 $("#ajuste_supervisor").removeAttr("disabled");
                  
             }else{
                 $("#message").html("");
                 $("#boton_ajustar").removeAttr("disabled");
                 $("#ajuste_supervisor").attr("disabled",true);  
             }
             
             
         }else{
             $("#boton_ajustar").attr("disabled",true); 
         }
     }
     
     function setAjusteHijo(codigo){
         var cant_real = $("#cant_real_"+codigo).val();  
         var metros = parseFloat(  $("#metros_"+codigo).html(),2); 
         var diff = (   cant_real - metros).toFixed(2);
         $("#ajuste_calculado_"+codigo).val(diff);  
         
         var total  = parseFloat(  $("#total").html()  ,2); 
         var tolerancia = (total  * 10) / 100; 
         
         
         var ajuste = parseFloat( $("#ajuste_calculado_"+codigo).val(),2);
         
         var total_metros = total + ajuste;
         var kg = $("#kg").val();
         var tara = $("#tara_"+codigo).val() / 1000;  
         
         var ancho = $("#ancho_"+codigo).val();  
         var gramaje = ( ((kg - tara ) * 1000 ) / (total_metros * ancho)).toFixed(2);
         
         $('[id^=gramaje_]').each(function(){ 
                $(this).html(gramaje);
         });  
         if(diff != 0  && cant_real != ""){  
            $("#boton_ajuste_"+codigo).removeAttr("disabled");   
         }else{
            $("#boton_ajuste_"+codigo).attr("disabled",true);  
         }
     }
     //sumatoria de Ajustes
     function getAjustes(){
     	var sumatoriaAjustes = 0;
     	$("[id^=ajuste_calculado_]").each(
     		function(){
     			sumatoriaAjustes += parseFloat($(this).val());
     		}
     	);
     	return sumatoriaAjustes;
     }
     function guardarAjustes(){
         
         // Verificar si todos los Anchos y las Taras son iguales
         var anchores = [];
         var taras = [];

         $('[id^=ancho_]').each(function(){ 
              var ancho =  $(this).val(); anchores.push(ancho);
         }); 
         $('[id^=tara_]').each(function(){ 
              var tara = $(this).val(); taras.push(tara);
         });   
         
         var anchores_long = anchores.unique().length;
         if(anchores_long > 1){
             alert("Anchos incorrectos... Favor corregir...");
             return;
         }  
         var taras_long = taras.unique().length;
         if(taras_long > 1){
             alert("Taras incorrectas... Favor corregir...");
             return;
         }
         
         
         if(!ajustado){
         ajustado = true;
         $("#boton_ajustar").attr("disabled",true);  
         
         $("#msg").html("<label style='font-weight:bolder;font-color:blue'>Favor espere... </label><img src='images/search2.gif' >");
          
         var usuario = $("#usuario").val();
          $('[id^=cod_]').each(function(){ 
               var thisid = $(this).attr('id');  
               var codigox =  thisid.substring(4,20);
               var gramaje = $("#gramaje_"+codigox).html();  
               var ajuste = $("#ajuste_calculado_"+codigox).val();
               var cant_ini = $("#metros_"+codigox).html(); 
               var cant_final = $("#cant_real_"+codigox).val();
                
                $.ajax({
                    type: "POST",
                    url: "include/Ajax.class.php",
                    data: "action=guardar_ajuste_inicial&codigo="+codigox+"&usuario="+usuario+"&gramaje="+gramaje+"&cant_ini="+cant_ini+"&ajuste="+ajuste+"&cant_final="+cant_final,
                    async:false,
                    dataType: "html",
                    beforeSend: function(objeto){
                        $("#msg_"+codigox).html("<img src='images/search2.gif' >");  
                    },
                    complete: function(objeto, exito){
                        if(exito=="success"){
                           var result =$.trim(objeto.responseText); 
                           if(result == "Ok"){
                               $("#msg_"+codigox).html("<img src='images/ok.png'>"); 
                               $("#estado_"+codigox).html("No");  ajustes++;
                               var piezas = $("#cant_piezas").val();
                               if(ajustes >= piezas ){
                                  var rollo = $(".padre").html();
                                  //recalcularCosto(rollo); 
                               }
                           }else{
                              $("#msg_"+codigox).html("<img src='images/12-em-cross.png'>");  ajustes = 0;
                           } 
                        }
                    }
              });   
          });          
          // Detectar el padre y recalcular el costo
          
          }else{
             alert("Este codigo ya ha sido ajustado...");
          }  
           
     }
     function recalcularCosto(codigo_rollo){
        $.ajax({
                    type: "POST",
                    url: "include/Ajax.class.php",
                    data: "action=recalcular_costo&codigo_rollo="+codigo_rollo+"",
                    async:true,
                    dataType: "html",
                    beforeSend: function(objeto){
                        $("#msg").html("<label style='font-weight:bolder;font-color:blue'>Favor espere. Recalculando costos... </label><img src='images/search2.gif' >");
                        $("#cerrar").attr("disabled",true);
                    },
                    complete: function(objeto, exito){
                        if(exito=="success"){
                           var result =$.trim(objeto.responseText);  
                           if(result == "Ok"){
                               $("#msg").html("Puede cerrar.   <img src='images/ok.png'>");
                           }else{
                              $("#msg").html("<img src='images/12-em-cross.png'>");  
                           } 
                            $("#cerrar").removeAttr("disabled");
                        }
                    }
              });   
                        
     }
     function ajusteIndividual(codigo){
            $("#boton_ajuste_"+codigo).attr("disabled",true);   
            $("#cant_real_"+codigo).attr("disabled",true);   
            var usuario = $("#usuario").val();
            var gramaje = $("#gramaje_"+codigo).html();  
            var ajuste = $("#ajuste_calculado_"+codigo).val();
            var cant_ini = $("#metros_"+codigo).html(); 
            var cant_final = $("#cant_real_"+codigo).val();
            
            $.ajax({
                    type: "POST",
                    url: "include/Ajax.class.php",
                    data: "action=guardar_ajuste_inicial&codigo="+codigo+"&usuario="+usuario+"&gramaje="+gramaje+"&cant_ini="+cant_ini+"&ajuste="+ajuste+"&cant_final="+cant_final,
                    async:true,
                    dataType: "html",
                    beforeSend: function(objeto){
                        $("#msg_"+codigo).html("<img src='images/search2.gif' >"); 
                    },
                    complete: function(objeto, exito){
                        if(exito=="success"){
                           var result =$.trim(objeto.responseText); 
                           if(result == "Ok"){
                               $("#msg_"+codigo).html("<img src='images/ok.png'>"); 
                               $("#estado_"+codigo).html("No"); 
                           }else{
                              $("#msg_"+codigo).html("<img src='images/12-em-cross.png'>");  
                           } 
                        }
                    }
              });          
     }
     
    function imprimir(codigo){ 
      var usuario = $("#usuario").val(); 
      window.open("project/marijoa/reports/config/re_code39Lotes_prg_recib.php?codigos="+codigo+"&usuario="+usuario+"&print=yes","Codigos de Barras","width=350,height=500,scrollbars=yes");
    }   
    Array.prototype.unique = function() {
        var a = [], l = this.length;
        for(var i=0; i<l; i++) {
        for(var j=i+1; j<l; j++)
                if (this[i] === this[j]) j = ++i;
        a.push(this[i]);
        }
        return a;
    };
    function corteExacto(){
        var checked = $('#corte_exacto').is(':checked');  
        if(checked){
             $("#boton_ajustar").removeAttr("disabled");
        }else{
           $("#boton_ajustar").attr("disabled",true);  
        }
    }
    function resaltarCant(obj){
        $(obj).select();
        $(obj).parent().prev().prev().prev().prev().prev().css("border","solid red 2px");
    }   
    function uncolorCant(obj){
        $(obj).parent().prev().prev().prev().prev().prev().css("border","solid gray 1px");
    }  
    function cerrar(){
        if(ajustes > 0 ){
           window.opener.location.reload();
           window.close();  
           
        }else{
            var sure = confirm("Esta seguro de que desea cerrar sin realizar ningun ajuste?");
            if(sure){
              window.close();  
            } 
        } 
    }
    
         function leerDatosBalanza(){
             intentos++;          
             //var ip_domain = $("#ip").val();
             var ip_domain = "localhost";
             $("#msg").html("<img src='images/working.gif' width='24' height='24' > &nbsp;&nbsp;Conectado con: "+ip_domain+"...    "+intentos);  
             
                    $.ajax({
                        url : "http://"+ip_domain+"/serial/Indicador_LR22.php",
                        dataType:"jsonp",
                        jsonp:"mycallback", 
                    
                        success:function(data){
                            var dato = data.peso;
                            var estado = data.estado; 
                            $('[id^=tara_]').each(function(){ 
                                    $(this).val(dato * 1000);  
                             });
                            if(estado == "estable"){
                                if(dato == ""){
                                    if(intentos < 5){
                                       leerDatosBalanza();
                                    }else{
                                      $("#msg").html("<label style='color:red;font-size:18px'>ERROR... </label>No se puede conectar con la balanza...");
                                      intentos = 0;
                                    }
                                }else{
                                  $("#msg").html("Leido...     <label style='color:green;font-size:18px'>Estable</label>");
                                  intentos = 0;

                                    $('[id^=cod_]').each(function(){ 
                                        var thisid = $(this).attr('id');  
                                        var codigox =   thisid.substring(4,20);  
                                        setAnchoTara(codigox);
                                    }); 
                                } 
                              
                            }else{
                            
                              $("#msg").html("Leido...        <label style='color:red;font-size:24px'>Inestable</label>");
                            }
                        }
                    });                
       }   
function leerDatosMetrador(port){
             intentos++;          
             //var ip_domain = $("#ip").val();
             var ip_domain = "192.168.2.222";
             $("#msg").html("<img src='images/working.gif' width='24' height='24' > &nbsp;&nbsp;Conectado con: "+ip_domain+"...    "+intentos);  
             
                    $.ajax({
                        url : "http://"+ip_domain+"/serial/CP20.php?port="+port,
                        dataType:"jsonp",
                        jsonp:"mycallback", 
                    
                        success:function(data){
                            var metros = data.metros;
                             
                            var total = data.total; 
                            if(metros > 0){
                               $("#msg").html("Leido...        <label style='color:green;font-size:24px'>"+metros+"</label>");
                            }else{ 
                              $("#msg").html("Leido...        <label style='color:red;font-size:24px'>0.00</label>");
                            }
                        }
                    });                
       }            
       
    
    $(window).scroll(function(){
             $('#popup').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});
    });
    </script>    
<!-- end:   general_header -->


<!-- begin: start_query0 -->
    <div id="popup" class="popup"  style="display:none;"  >     </div>
    <input type="hidden" id="kg" value="{kg}">
    <input type="hidden" id="usuario" value="{user}">
    
    <input type="hidden" id="rollo" value="{sup_f_cod}">
    <input type="hidden" id="cant_piezas" value="{cant_piezas}">
    
    
    <table style="text-align: left; width: 99%;" border="1" cellpadding="0" cellspacing="0">
        <tbody>
        <thead>
            <tr> <td colspan="50"> 
                    <table style="text-align: left; width: 100%;" border="0"  cellpadding="0" cellspacing="0">
                        <tbody>

                            <tr>
                                <td  style="width: 20%;height: 60px">
                                    <small><small>ycube plus RAD [1.2.31]</small></small>
                                </td>
                                <td style="text-align: center;width: 60%"><big   style="font-weight: bold;"><big>Ajustes de Entrada </big></td>
                            <td style="text-align: right;width: 20%">
                                <small><small><label style="font-size:18px;font-weight: bolder;color:green;border: 1px solid black;padding: 3px">{user}</label> - {time}</small></small>
                            </td>
                            </tr>

                            </tbody>
                    </table> 
                </td></tr>

            <tr><td colspan="10" style="padding: 4px;font-weight: bolder;font-size:28px;height: 70px">Codigo : {sup_f_cod}  
              <br>
              <label style="font-weight:bolder;font-size:18px;">Kilos</label> <input style="font-size:18px;border:solid gray 1px;height:28px;width: 100px;text-align: center" type="text" value="{kg}" readonly > &nbsp;
              <label style="font-weight:bolder;font-size:18px;">Gramaje Muestra</label> <input style="font-size:18px;border:solid gray 1px;height:28px;width: 100px;text-align: center" type="text" id="gramaje_inicial" value="{gramaje}" readonly >&nbsp;
              <label style="font-weight:bolder;font-size:18px;">Ancho</label> <input style="font-size:18px;border:solid gray 1px;height:28px;width: 100px;text-align: center" type="text" value="{ancho}" readonly >&nbsp;
              <label style="font-weight:bolder;font-size:18px;">Cant. Inicial</label> <input style="font-size:18px;border:solid gray 1px;height:28px;width: 100px;text-align: center" type="text" value="{cant_ini}" readonly >
              
              <br>
              <input style="font-weight:bolder;font-size:15px;border:solid gray 1px;height:28px;width: 80%;text-align: left;color:green;margin: 4px;padding: 4px" type="text" value="{descrip}" readonly > 
              <label style="font-weight:bolder;font-size:14px;">Metraje exacto</label><input type="checkbox" id="corte_exacto" onclick="corteExacto()">    
              
            </td></tr>

            <!-- end:   start_query0 -->

            <!-- begin: header0 -->
            <tr>
                <th>Codigo</th>
                <th style="vertical-align: middle;text-align: right">Metros&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span> <img src="images/left_down.png"> </span></th>                
                <th>FP/TR/NO</th>
                <th>Ancho (Mts.)</th>
                <th>Tara (Grs.)</th>
                <th>Gramaje</th> 
                <th>Metraje Real</th>
                <th>Ajuste</th>
                <th>&nbsp;</th>
                <th>Msg</th>
            </tr>
        </thead>
        <tfoot>
            <tr><td colspan="50"> </td></tr>
        </tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <tr>
            <td class="left {padre}"  style="background:{fondo}" id="cod_{query0_codigo}">{query0_codigo}</td>
            <td class="number" id="metros_{query0_codigo}">{query0_Metros}</td>
          <!--  <td class="center" style="width:2%"><input type="checkbox" onclick="abrirOpciones({query0_codigo})" id="frac_{query0_codigo}"></td>  -->
            <td class="center" id="estado_{query0_codigo}">{query0_Estado}</td>
            <td class="number"><input type="text" class="texto" value="{query0_Ancho}" size="5" id="ancho_{query0_codigo}" onchange="setAnchoTara({query0_codigo})"></td> 
            <td class="number"><input type="text" class="texto" value="{query0_Tara}" size="5" id="tara_{query0_codigo}" onchange="setAnchoTara({query0_codigo})"></td>
            <td class="number" id="gramaje_{query0_codigo}"  style="background:#E8E8E8" >{query0_Gramaje}</td> 
            <td class="number"><input type="text" class="texto" value="{query0_Metros}" size="5"  onfocus="resaltarCant(this)" onblur="uncolorCant(this)" id="cant_real_{query0_codigo}"  {onkeyup}></td>
            <td class="number"><input type="text" class="texto" value="0" size="5" id="ajuste_calculado_{query0_codigo}" style="background:#E8E8E8" readonly></td>
            <td class="center">{boton_ajustar}</td>
            <td style="text-align:center" id="msg_{query0_codigo}">&nbsp;</td>
        </tr>
        <tr>
            <td style="display:none" colspan="10" id="sub_td_{query0_codigo}"></td>
        </tr>
<!-- end:    query0_data_row -->


<!-- begin: hijos -->
        <tr>
            <td  style="background:lightblue;text-align:right;font-size:11px" ><a id="cod_{query0_codigo}"  href="javascript:imprimir({query0_codigo})" style="text-decoration: none" >{query0_codigo}</a></td>
            <td class="num" id="metros_{query0_codigo}">{query0_Metros}</td> 
            <td class="itemc" id="estado_{query0_codigo}">{query0_Estado}</td>
            <td class="num" ><input type="text" class="texto_hijos" value="{query0_Ancho}" size="5" id="ancho_{query0_codigo}" readonly></td> 
            <td class="num"  ><input type="text" class="texto_hijos" value="{query0_Tara}" size="5" id="tara_{query0_codigo}" readonly></td>
            <td class="num" id="gramaje_{query0_codigo}">{query0_Gramaje}</td>  
            <td><input type="text" class="texto" value="{query0_Metros}"   onblur=""  id="cant_real_{query0_codigo}" size="5" readonly></td>
            <td><input type="text" class="texto" value="0" size="5" id="ajuste_calculado_{query0_codigo}" readonly></td>
            <td></td>
            <td style="text-align:center" id="msg_{query0_codigo}">&nbsp;</td>
        </tr>
<!-- end:    hijos -->

<!-- begin: vacio -->
        <tr>
            <td colspan="10" style="height:26px">&nbsp;</td>  
        </tr>
<!-- end:    vacio -->


<!-- begin: query0_subtotal_row -->
        <tr>
            <td style="font-weight:bolder;font-size:15px;padding:4px;text-align:center">Ventas:</td>
            <td style="font-weight:bolder;font-size:15px;padding:4px;text-align:right" >{ventas}</td>
            <td></td>
            <td></td>
            <td style="text-align:center;border:0px"><input type="button" value=" Tara " onclick="leerDatosBalanza()"></td>
            <td></td>
            <td colspan="4">
                <input type="button" value=" M1 " onclick=leerDatosMetrador("ttyS1")>&nbsp;
                <input type="button" value=" M2 " onclick=leerDatosMetrador("ttyS2")>&nbsp;
                <input type="button" value=" M3 " onclick=leerDatosMetrador("ttyS3")>&nbsp;
                <input type="button" value=" M4 " onclick=leerDatosMetrador("ttyS4")>&nbsp;
            </td>
        </tr>
        <tr>
            <td style="font-weight:bolder;font-size:15px;padding:4px;text-align:center">Total:</td>
            <td style="font-weight:bolder;font-size:15px;padding:4px;text-align:right" id="total">{total}</td>
            <td></td>
            
            <td colspan="4" style="border: 0px" id="msg"></td>
            
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
        </tbody>
    </table>
    <br>
    <div style="text-align:center;font-weight:bolder;font-size:15px;color:red" id="message"></div>
    
    <div style="text-align:center;font-weight:bolder;font-size:18px;color:red" id="err_gramaje"></div>
    <br>
    <div style="text-align:center">
        <input  type="button" value="Actualizar"   onclick="window.location.reload()"  > 
        <input  type="button" value="  Cerrar  " id="cerrar"  onclick="cerrar()"  >
        <input  type="button" value="Ajustar como Supervisor" id="ajuste_supervisor"   onclick="abrirPopup()" disabled  >
    </div>
<!-- end:   end_query0 -->


<!-- begin: warning -->
<div style="-moz-border-radius: 3px 3px 3px 3px;border:solid red 1px;font-size: 20px">
    <img src="images/dialog-warning.png">  &nbsp;&nbsp;   Debe guardar el Kilaje antes de continuar...
        </div>
<!-- end:    warning -->

<!-- begin: warning_kg -->
<div style="-moz-border-radius: 3px 3px 3px 3px;border:solid red 1px;font-size: 20px">
    <img src="images/dialog-warning.png">  &nbsp;&nbsp;   Kilaje de descarga {kg_desc} muy diferente al Kilaje actual {p_kg}... Establecer peso antes de continuar...
        </div>
<!-- end:    warning_kg -->