<!-- 
    Report Template File (inv_balanza)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
       <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
       <script src="include/jquery.js"></script>
	<treset_page>
 
            <script language="javascript">
                    var largo = 0; 
                    var gramos = 0;
                    var intentos = 0;  
                    var cant_calc = 0;
                    var gramajeRecalculado = 0;
					var objeto ='';
                    var PORCENTAJE = 2;
					var verifRef = 'metros';
                    
                    $(document).ready( function(){
                       $("#codigo").focus();   
                       largo = $("#largo_tara").val();
                       gramos = $("#taras option:selected").val();; 
                       
                       $("#codigo").keyup(function (e) {
                           if (e.keyCode == 13) { 
                               $("#leer").focus(); 
                           }
                           checkAll();
                       });                        
                    });
                    
                    function buscarDatos(){
						$("#insertar").attr("disabled",true);
						$(".ajustar").val("Ajustar");	
						$(".ajustar ").attr("disabled",true);						
						$("#metros").attr("readonly",true);
						$("#ancho").attr("readonly",true);
                       var codigo = $("#codigo").val();
                       $.ajax({
                            type: "POST",
                            url: "include/Ajax.class.php",
                            data: "action=get_datos_codigo_inventario&codigo="+codigo+"",
                            dataType: "json",
                            beforeSend: function(){
                               $("#suc").val("");
                               $("#descrip").val("");
                               $("#gramaje").val("");
                               $("#ancho").val("");
                               $("#metros").val("");
                               $("#kilos").val("");  
							   $("#kg_registrado").html("");
							   $("#aj_ent").html("");                               
                            },
                            success: function(respuesta, exito){
								objeto = respuesta;
                                if(exito=="success"){
                                    //$("#msg").html(objeto.responseText); 
									
									if(objeto.errorCode && objeto.errorCode==1){
										$("#msg").html("<label class=error >"+objeto.errorMsj+"</label>");
									}else{
										$("#suc").val(objeto.suc);
									    $("#descrip").val(objeto.descrip);
									    $("#gramaje").val(objeto.gramaje);
									    $("#ancho").val(objeto.ancho);
									    $("#metros").val(objeto.metros);
									    $("#kilos").val(objeto.kilos); 
										$("#kg_registrado").html(objeto.kg_registrado);
										$("#taras").val(objeto.tara);
										$("#aj_ent").text(objeto.aj_ent);
										if(objeto.aj_ent=='No'){
											$("#regramar").removeAttr("disabled");
											$(".kg_registrado").show();
											$("#aj_ent").css("color","red");
											verifRef = 'kilos';											
										}else{
											$("#regramar").attr("disabled",true);
											$(".kg_registrado").hide();
											$("#aj_ent").css("color","green");
											verifRef = 'metros';
										}
										$("#tipo_ref").html(verifRef);
										calcCantReal();
										if(objeto.errorCode&&objeto.errorCode==2){
											$("#leer").attr("disabled",true);  
											$("#kilaje_real").attr("disabled",true);  
											$("#largo").attr("disabled",true);
											$("#msg").html("<label class=error >"+objeto.errorMsj+"</label>"); 										
										}else {
											$("#leer").removeAttr("disabled");  
											$("#kilaje_real").removeAttr("disabled"); 
											$(".ajustar ").removeAttr("disabled");
										}
										var s = $("#suc").val(); 
										var su = $("#suc_usuario").html();  
										if(su != s && s != ''){
											$("#msg").html("<label class='error'>El codigo no se encuentra en esta sucursal!</label>");  
											$("#leer").attr("disabled",true);
											$(".ajustar ").attr("disabled",true);
										}else{
											checkAll();
										}										
									}
									
                                }
                              }
                           });
                       }
                    
                    function selectAll(){
                        $("#codigo").select();
                    }
                    function setTaras(){
                        var str = $("#taras").val(); 
                        var res = str.split("|");
                        largo = res[0]; 
                        gramos = res[1];
                        $("#largo_tara").val(largo);
                        $("#tara").val(gramos); 
                        calcCantReal();
                        checkAll();
                    }
                    function changeTara(){
                        var new_largo = $("#largo_tara").val();
                        var new_tara = (gramos * new_largo / largo).toFixed(1); 
                        $("#tara").val(new_tara); 
                        calcCantReal();
                        checkAll();
                    }
                    
                
                    
                    function leerDatosBalanza(){
                       $("#kilaje_real").val("- - - - - - - - -");
                       var conexion = $("#conexion").val();
                        
                         intentos++;     
                          var ip_domain = $("#ip").val();
                          $("#msg").html("Conectado con: "+ip_domain+"...    ");  
              
                            $.ajax({
                                url : "http://"+ip_domain+"/serial/Indicador_LR22.php",
                                dataType:"jsonp",
                                jsonp:"mycallback", 
                                success:function(data){
                                    var dato = parseFloat(data.peso).toFixed(3);
                                    var estado = data.estado;


                                    if(estado == "estable"){
                                        if(dato == ""){
                                           if(intentos < 5){
                                              leerDatosBalanza();
                                           }else{
                                              $("#msg").html("<label style='color:red;font-size:24px'>ERROR... </label>No se puede conectar con la balanza...");
                                              intentos = 0;
                                           }
                                        }else{
                                           $("#kilaje_real").val(dato);   
                                           $("#msg").html("<label style='color:green;font-size:24px;font-weight:bold'>Estable</label>");
                                           calcCantReal()
                                            //checkAll();
                                        }

                                    }else{
                                        $("#insertar").attr("disabled","true");  
                                        $("#msg").html("<label style='color:red;font-size:24px;font-weight:bold'>Inestable</label>");
                                    }
                                }    

                            });         
					                           
                    } 
                    
                    function calcCantReal(){
                       var metros = $("#metros").val();
                       var cant_min = metros - ((metros * PORCENTAJE) / 100);
                       var cant_max = metros + ((metros * PORCENTAJE) / 100);
                       
                       var kilosr = $("#kilaje_real").val();
                       var tara = $("#taras option:selected").val();
                       var gramaje = $("#gramaje").val();
                       var ancho = $("#ancho").val();
                       cant_calc = ((kilosr - (tara  / 1000 )) * 1000 )  /  (gramaje * ancho);
                       calcularGramaje();
                       if(metros != "" ){                           
                           $("#cantr").val( (cant_calc).toFixed(2) );
                           var cant_real = $("#cantr").val() ; 
                           $("#diff").val(  ( cant_real - metros   ).toFixed(2));
                           if(parseFloat($("#diff").val()) < 0 ){
                                  $("#diff").removeClass("info");
                                  $("#diff").addClass("error");                                  
                           }else{
                              $("#diff").removeClass("error");
                              $("#diff").addClass("info"); 
                           }
                       } 
                        checkAll()
                         
                    }
                    function checkAll(){						
                        $("#kilos").val(kgRecalc());
                        var codigo = parseInt($("#codigo").val());  
                        var s = $("#suc").val(); 
                        var su = $("#suc_usuario").html();  
                        if(isNaN(codigo)){ // Si no es Numero
                            $("#insertar").attr("disabled",true);  
							 
                            return;
                        }
					    if(isNaN(codigo)){ // Si no es Numero 
							$("#historial").attr("disabled",true);  
                        }else{
							$("#historial").removeAttr("disabled");  
							
						}                        
                        
                        // Primero me fijo en el Tipo si es por unidad solo hace falta el codigo y que coincidan las sucursales
                        var tipo = $("#tipo").val();
                        if( tipo == "Peso" ){
                            var kilos = $("#kilaje_real").val(); 
                            var g = $("#gramaje").val(); 
                            var diff = $("#diff").val(); 
                            if(su == s && s != '' && kilos != '' && g != '' && diff != 'Infinity' && diff != 'NaN'){// Realmente existe  
                                $("#insertar").removeAttr("disabled");  
								
                            }else{
                                 $("#insertar").attr("disabled",true);  
								  
                            } 
                        }else{ 
                             if(su == s && s != ''){// Realmente existe  
                                $("#insertar").removeAttr("disabled");  
								  
                             }else{
                                 $("#insertar").attr("disabled",true);  
								  
                             }
                        } 
						
                        var catVerif =  parseFloat($("#"+verifRef).val());
                        var cant_min =  parseFloat(catVerif - ((catVerif * PORCENTAJE) / 100));
                        var cant_max =  parseFloat( catVerif + ((catVerif * PORCENTAJE) / 100) );
                        if(verifRef=="metros"){
							cant_ref =cant_calc;
						}else{
							cant_ref =parseFloat($("#kilaje_real").val());
						}
						
						var cc = (cant_ref).toFixed(2);
                        
                        if( eval(cant_ref > 0)  ){                       
                            if( (cant_ref <= cant_min) || (cant_ref >= cant_max) ){
                                 $("#msg").html("<label style='color:red;font-size:24px'>Fuera de Rango de "+PORCENTAJE+"%  &nbsp;&nbsp;&nbsp; No se cumple la condicion   "+cant_min+"  < "+cc +" <  "+cant_max+"  </label>");
                                 //alert("Fuera de Rango: "+cant_min+" "+cant_ref+"  "+cant_max);
                                 $("#insertar").attr("disabled",true); 
                            }else{
                                
                                 $("#msg").html("<label style='color:green;font-size:24px;font-weight:bold'>Dentro del rango &nbsp;&nbsp;&nbsp;   "+cant_min+"  < "+cc +" <  "+cant_max+"</label>");
                                  $("#insertar").removeAttr("disabled");   

                            }  
                       }else{
					       $("#insertar").attr("disabled",true); 
						   $("#msg").html("<label style='color:red;font-size:24px'>Fuera de Rango de "+PORCENTAJE+"%  &nbsp;&nbsp;&nbsp; No se cumple la condicion   "+cant_min+"  < "+cc +" <  "+cant_max+"  </label>");
					   }
                        
                    }
                    function setTipo(){
                        var tipo = $("#tipo").val();
                        if( tipo == "Unidad" ){
                            $("#leer").attr("disabled",true);
                            $("#tara").attr("disabled",true);
                            $("#largo_tara").attr("disabled",true);
                            $("#taras").attr("disabled",true);
                            $("#kilaje_real").attr("disabled",true);
                        }else{
                             $("#leer").removeAttr("disabled");
                             $("#tara").removeAttr("disabled");
                             $("#largo_tara").removeAttr("disabled");
                             $("#taras").removeAttr("disabled");
                             $("#kilaje_real").removeAttr("disabled");
                        }
                        $("#codigo").focus(); 
                        checkAll();
                    }
                    function registrar(){
                        $("#insertar").attr("disabled",true);
						  
						 
                        var usuario = $("#usuario").val();
                                        
                        var tipo = $("#tipo").val();
                        var codigo = $("#codigo").val();
                        var suc = $("#suc").val();
                        var cant = $("#metros").val();
                        var kilos = $("#kilos").val();
                        var kilosr = $("#kilaje_real").val();
                        var tara = $("#taras option:selected").val();;
                        var gramaje = $("#gramaje").val();
                        var ancho = $("#ancho").val();                        
                        var cantr = $("#cantr").val();
                        var diff = $("#diff").val(); 
						var tipo_ref = $("#tipo_ref").text();
                        if(tipo == "Unidad"){
                            kilos = 0;
                            kilosr = 0;
                            tara = 0;
                            gramaje = 0;
                            ancho = 0;
                            diff = 0;
                        }
                        
                        $.ajax({
                            type: "POST",
                            url: "include/Ajax.class.php",
                            data: "action=registrar_pieza_inventariada&codigo="+codigo+"&usuario="+usuario+"&tipo="+tipo+"&suc="+suc+"&gramaje="+gramaje+"&ancho="+ancho+"&cant="+cant+"&kilos="+kilos+"&kilosr="+kilosr+"&tara="+tara+"&cantr="+cantr+"&diff="+diff+"&tipo_ref="+tipo_ref,
                            async:true,
                            dataType: "html",
                            timeout:8000,  
                            beforeSend: function(objeto){  
                                $("#msg").html("Registrando...  "); 
                            },
                            timeout:8000,  
                            complete: function(objeto, exito){
                                if(exito=="success"){
                                   $("#msg").html("Ok"); 
                                   var ultimos_registros = objeto.responseText; 
                                   $("#ultimos_registros").html(ultimos_registros); 
                                   $("#codigo").val("");
                                   $("#suc").val("");
                                   $("#metros").val("");
                                   $("#descrip").val("");
                                   $("#metros").val("");
                                   $("#kilos").val("");
                                   $("#kilaje_real").val(""); 
                                   $("#gramaje").val("");
                                   $("#ancho").val("");  
                                   $("#cantr").val("");
                                   $("#diff").val(""); 
                                   $("#codigo").focus();
                                } else{
                                     $("#msg").html("Problemas con la red. No se pudo conectar con el Servidor... "); 
                                     $("#insertar").removeAttr("disabled");
                                }
                            }
                        });
                       
                    }
					
					function ver_registros_inventario_codigo(){
					var codigo = $("#codigo").val();
					$.ajax({
                            type: "POST",
                            url: "include/Ajax.class.php",
                            data: "action=ver_registros_inventario_codigo&codigo="+codigo+"",
                            async:true,
                            dataType: "html",
                            timeout:8000,  
                            beforeSend: function(objeto){  
                                $("#msg").html("Registrando...  "); 
                            },
                            timeout:8000,  
                            complete: function(objeto, exito){
                                if(exito=="success"){
                                   $("#msg").html("Ok"); 
                                   var ultimos_registros = objeto.responseText; 
                                   $("#ultimos_registros").html(ultimos_registros);  
                                } else{
                                     $("#msg").html("Problemas con la red. No se pudo conectar con el Servidor... ");  
                                }
                            }
                        });
					
					}
					
                    function eliminar(codigo){
                        var c = confirm("Codigo "+codigo+" ¿Confirma que desea eliminar este registro?");
                        if(c){
                        $.ajax({
                            type: "POST",
                            url: "include/Ajax.class.php",
                            data: "action=eliminar_registro_inventario&codigo="+codigo,
                            async:true,
                            dataType: "html",
                            timeout:8000,  
                            beforeSend: function(objeto){  
                                $("#msg").html("Conectado para eliminar registro de "+codigo+"...    "); 
                            },
                           
                            complete: function(objeto, exito){
                                if(exito=="success"){
                                   $("#msg").html(objeto.responseText);  
                                   $("#tr_"+codigo).addClass("tachado");
                                   $("#img_"+codigo).html("Eliminado");
                                } else{
                                   $("#msg").html("Problemas con la Red, No se pudo conectar con el Servidor!");  
                                }
                            }
                        });
                        }
                    }
                    function getCookie(cname) {
                        var name = cname + "=";
                        var ca = document.cookie.split(';');
                         
                        for(var i=0; i < ca.length; i++) {
                            var c = $.trim(ca[i]);
                            if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
                        }
                        return "";
                    }
                    function setCoockie(){ 
                      var ip = $("#ip").val();
                      document.cookie="ip="+ip; 
                    }
                    $(document).ready(function() {  
                         var anterior = getCookie("ip"); 
                         if(anterior != ""){
                            $("#ip").val(anterior);
                         }
                    });
					
					//Ajusta Producto
					function ajustar(ref){
						var referencia = ref.attr("data-ref");						
						var cod = 0;
						var cant = 0;
						if(ref.val()==="Ajustar"){
							$("#"+referencia).removeAttr("readonly");							
							ref.val("Guardar");
							$("#"+referencia).select();
						}else{
							if((cod=parseInt($("#codigo").val()))&&(cant=parseFloat($("#"+referencia).val()))){
								var param = {
									usuario:$("#usuario").val(),
									action:"ajustar_producto",
									aj_ref:referencia,
									codigo:cod,
									cantidad:cant
								};
								$.post("include/Ajax.class.php",param,function(data){
									if(data.ok){
										calcularGramaje();
										alert(data.ok);
										ref.val("Ajustar");
										$("#"+referencia).attr("readonly",true);
										$("#regramar").removeAttr("disabled");
										
									}else{
										alert(data.error);
									}
									
								},"json");
								
							}else{
								alert("Datos incorrectos");
							}
						}	
						
					}
					function calcularGramaje(){
						var gramCalc = (eval(($("#kilaje_real").val()+'-'+($("#taras option:selected").val()/1000)))*1000)/eval($("#metros").val()+'*'+$("#ancho").val());
						$("#gramajeCalculado").text(gramCalc.toFixed(2));						
					}
					function regramar(){
						var msj = "Verificó que todos los datos son correctos?";
						var kg = $("#kilaje_real").val();
						if(kg==""||kg<=0){
							alert("Peso real no valido!");
						}else if(confirm(msj)){
							$("#gramaje").val($("#gramajeCalculado").text());
							$("#regramar").attr("disabled","disabled");
							calcCantReal();
						}
					}
					//Recalcula el Kilogramo
					function kgRecalc(){
						var gramaje = parseFloat($("#gramaje").val());
						var cantidad = parseFloat($("#metros").val());
						var ancho = parseFloat($("#ancho").val());
						kgCalc = (gramaje * cantidad * ancho)/1000
						return kgCalc.toFixed(3);
					}
			
			$(function(){
				var $loading = $('#loadingDiv').hide();
				$(document).ajaxStart(function () {
					$loading.show();
				  }).ajaxStop(function () {
					$loading.hide();
				  });
			});

           </script>   
           
           <style type="text/css">			  				 
               .info{
                   color:blue;
                   font-size: 20;
                   font-weight: bolder;
               } 
               .info_green{
                   color:blue;
                   font-size: 20;
                   font-weight: bolder;
               }
               .error{
                   font-size: 24px;
                   color:red;
                   font-weight: bolder;
               } 
               .tachado{text-decoration:line-through;}
			   input[readonly] {
				   background-color: lightgray;
				}
				.boton{
					margin: 1px 0px 4px; 
					padding: 3px 3px 5px; 					
				}
           </style>
<!-- end:   general_header -->


<!-- begin: start_query0 -->

<input type="hidden" id="usuario" value="{user}" /> 
<table style="text-align: left; width: 100%;" border="0" cellpadding="4" cellspacing="0">
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
			style="font-weight: bold;"><big>Inventario x Peso</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
 
</thead>
<tfoot>
	<tr><td colspan="50"></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr>
             <td style="font-weight: bolder;width: 10%;height: 32px" >Usuario:</td> 
			 <td style="width: 8%;border:solid lightgray 1px;text-align: center">{sup_usuario}</td> 
             <td style="font-weight: bolder;width: 10%">Su Sucursal:</td> 
			 <td id="suc_usuario" style="border:solid lightgray 1px;text-align: center;width: 10%">{sup___local}</td>
             <td style="width: 10%;text-align: center"></td>
             <td style="width: 50%">
                 <b>Conexion:</b><select id="conexion"> <option value="En Red">En Red</option> <option value="Internet">Internet</option> </select>  
                 <b>IP Balanza</b><input type="text" size="15"  id="ip"  style="border:solid lightgray 1px;text-align: center;" onchange="setCoockie()" value="{ip}">
             </td>
         </tr>
         <tr>
             <td style="font-weight: bolder;width: 10%;height: 32px" >Tipo:</td>
             <td>
                 <select id="tipo" onchange="setTipo()">
                     <option value="Peso">Peso</option>
                     <option value="Unidad">Unidad</option>
                 </select> 
             </td>
         </tr>
         <tr>
             <td style="font-weight: bolder;height: 46px">Codigo:</td> <td ><input type="text" id="codigo" onchange="buscarDatos()" onfocus="selectAll()" value="" size="10" style="font-size: 22px;font-weight: bolder;color:green;text-align: right"><img id="loadingDiv" src="images/working.gif" width="24" height="24" /></td>
             <td id="msg" colspan="5"></td>
         </tr>
         <tr>
             <td style="font-weight: bolder;width: 10%;height: 32px" >Suc/Desc.:</td>  <td colspan="5">  <input type="text" size="3" readonly id="suc" class="info" value="" style="text-align:center" title="Sucursal del Producto">&nbsp;
                     <input type="text" id="descrip" title="Sector - Grupo - Tipo - Color - Descripcion" readonly id="suc" class="info" value="" style="width:82%"> </td> 
         </tr>
         <tr>
             <td style="font-weight: bolder;width: 10%;height: 32px">Cant. Metros:</td> <td> <input type="text" size="8" readonly id="metros" class="info" style="text-align: right" value=""><input class="boton ajustar" type="button" value="Ajustar" data-ref="metros" onclick="ajustar($(this))" /></td> 
             <td style="font-weight: bolder;width: 10%;height: 32px">Ancho:</td> <td  colspan="2"> <input type="text" size="8" readonly id="ancho" class="info" style="text-align: right" value=""><input class="boton ajustar" type="button" value="Ajustar" data-ref="ancho" onclick="ajustar($(this))" /></td> 
         </tr>
         <tr>
             <td style="font-weight: bolder;width: 10%;height: 32px">Gramaje:</td> <td> <input type="text" size="8" readonly id="gramaje" class="info" style="text-align: right" value=""><input class="boton" id="regramar" type="button" value="<< regramar a" disabled="disabled" title="Gramaje calculdo diferente al registro" onclick="regramar()" /><span class="regramar" id="gramajeCalculado"></span></td> 
             <td style="font-weight: bolder;width: 10%;height: 32px">Kilaje Calc.:</td> <td> <input type="text" size="8" readonly id="kilos" class="info" style="text-align: right" value=""> </td>
			<td class="kg_registrado">Kg Rec: <span id="kg_registrado"></span></td>
         </tr>
         <tr>
             <td style="font-weight: bolder;width: 10%;height: 32px">Kilaje Real:</td> <td> <input type="text" size="8"  id="kilaje_real" class="info" style="text-align: right" value="" onchange="calcCantReal()"> </td> 
            <td colspan="3">  
				<input type="button" value="Leer datos" id="leer" style="font-weight:bolder" onclick="leerDatosBalanza()">
				Tipo de Verificaci&oacute;n: <span id="tipo_ref"></span>
			</td>			
         </tr>
         <tr>
            <td style="font-weight: bolder;width: 10%;height: 32px">Tara:</td> <td id="td_taras">{taras}</td> 
			<td  colspan="3">Ajuste en Entrada: <span id="aj_ent"></span></td>
			<!--
            <td style="font-weight: bolder;width: 10%;height: 32px">Largo:</td> <td> <input type="text" size="8"   id="largo_tara" class="info" style="text-align: right" value="{largo}" onvolumechange="changeTara()" onchange="changeTara()"> </td> 
            <td style="font-weight: bolder;width: 10%;height: 32px">Tara:</td> <td> <input type="text" size="8" readonly id="tara" class="info" style="text-align: right" value="{tara}">    </td> -->
         </tr>
         <tr>
          <td style="font-weight: bolder;width: 10%;height: 32px"><b>Cant Calc:</b></td> <td>     <input type="text" size="8" readonly id="cantr" class="info_green" style="text-align: right" value=""> 
          <td>  <b>Diff. Mts:</b> </td><td>  <input type="text" size="8" readonly id="diff" class="info" style="text-align: right" value=""> </td> 
         </tr>
         <tr>
		     <td> <input type="button" id="historial" value="Historial de Inventario" onclick="ver_registros_inventario_codigo()" disabled="disabled" style="font-size: 10px;font-weight: bolder" >   </td>
             <td colspan="3"></td>
             <td> <input type="button" id="insertar" value="Registrar" onclick="registrar()" disabled="disabled" style="font-size: 16px;font-weight: bolder" >   </td>
         </tr>
         
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr>
            <td colspan="6" id="ultimos_registros"></td>
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<div id="dato_directo" style="visibility: hidden"><div>
<!-- end:   end_query0 -->

