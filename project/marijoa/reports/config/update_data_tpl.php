<!-- 
    Report Template File (update_data)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
       <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
       <script src="include/jquery.js"></script>
       
 <link rel="stylesheet" href="templates/jquery-ui.css" />
<script src="include/jquery-1.8.2.js"></script>
<script src="include/jquery-ui.js"></script>

	<treset_page>
            
<script language="javascript">
       var tiempo = null;
       function checkValues(cant,codigo){
                var codigos = jQuery.trim($("#codigos").val());
                var array = codigos.split("\n") ;
                
                for(var fila = 0;fila < array.length;fila++){
                    //var disenio = array[i].replace(new RegExp("'", 'g'),"").replace(new RegExp('"', 'g'),"").replace(new RegExp('&', 'g'),"").replace(new RegExp('#', 'g'),"");;
                    
                    var limpiar = array[fila].replace(new RegExp("'", 'g'),"").replace(new RegExp('"', 'g'),"").replace(new RegExp('&', 'g'),"").replace(new RegExp('#', 'g'),""); 
              
                    var linea = limpiar.split(",");  
                    
                    var codigo = linea[0];
                    var mts = linea[1];
                    var kg = linea[2];
                    var ancho = linea[3];
                    var color = linea[4];
                    
                    var dato6 = linea[5];
                      var f = fila+1;
                    if(dato6 != undefined){ 
                       $("#procesar").attr("disabled",true);  
                       alert("Error en la Fila "+f+" favor corregir antes de continuar...");
                       return;
                    }else if ( isNaN( codigo) || isNaN( mts  ) || isNaN( kg  ) || isNaN( ancho  ) ){ 
                       $("#procesar").attr("disabled",true); 
                       alert("Error en la Fila "+f+" uno de los datos no es un numero. Favor corregir antes de continuar...");
                       return;
                    }else{
                        $("#procesar").removeAttr("disabled");  
                    }
                    //alert("Codigo: "+codigo+"  mts"+mts+"  kg "+kg+"  ancho "+ancho+"  "+color + " dato6  "+dato6); 
                }
 
 
               
       }   
       function procesar(){
           var c = confirm("Confirme que desea procesar estos datos?");
           if(c){
               var lote = jQuery.trim($("#codigos").val()).replace(new RegExp("'", 'g'),"").replace(new RegExp('"', 'g'),"").replace(new RegExp('&', 'g'),"").replace(new RegExp('#', 'g'),"");
               
               $("#procesar").attr("disabled",true);    
               $("#reload").attr("disabled",true);              
               $("#cerrar").attr("disabled",true);              
               
               $.ajax({
                type: "POST",
                url: "include/Ajax.class.php",
                data: "action=actualizar_datos_productos_x_lotes&lote="+lote+"",
                async:true,
                dataType: "html",
                beforeSend: function(objeto){
                    $("#msg").html("<label>Enviando lote para ser procesado... Favor Espere... </label> <img src='images/working.gif' >"); 
                    $( "#progressbar" ).progressbar({  value: 10 });
                     
                    tiempo = setInterval("progreso()",1500);      
                },
                complete: function(objeto, exito){
                    if(exito=="success"){
                        $("#msg").html(objeto.responseText );  
                    }
                    }
           });
           }
       }
         function progreso(){
            //var tiempo = setInterval("progreso()",3000);      
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
                      
                       $( "#progressbar" ).progressbar({  value: valor }); 
                       if(mensaje[0] != "Progreso: Fin"){
                           
                            $("#msg").html("<label>Procesando...<b> "+mensaje[0]+"  &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; ="+valor+"% </b>  &nbsp; &nbsp;&nbsp;  </label> <img src='images/working.gif' >"); 
                        }else{ 
                            //$("#progreso").html("");  
                            tiempo = setInterval("progreso()",30000000000);    
                            clearInterval(tiempo);  
                            //$("#progreso").slideUp("slow");
                            $("#msg").html( " <b> Ok, datos actualizados con exito... </b>"  );   
                            $("#reload").removeAttr("disabled");  
                            $("#cerrar").removeAttr("disabled");  
                        }
                        
                    }
                }
            });   
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
		  <td style="text-align: center;"><big
			style="font-weight: bold;"><big>Actualiza Datos de Productos</big></td>
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
        <th style="text-align: center">Herramienta para Actualizar Metros, Kg, Ancho y Color de Productos por Lote.</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"> </td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr>
            <td>
                <table  style="width: 100%" cellpadding="4" cellspacing="4" >
                    <tr>    
                        <td style="width:60%"><label style="font-weight: bolder;font-size: 12px">Codigo,Metros,Kg,Ancho,Color</label><br>
                            <textarea id="codigos" onchange="checkValues()" rows="18" cols="60"></textarea>    
                        </td>
                        <td>
                            <input type="button" value="Procesar" id="procesar" onclick="procesar()" disabled> 
                            <input type="button" value="Cerrar" id="cerrar" onclick="self.close()" >
                            <input type="button" value="Recargar" id="reload" onclick="self.location.reload()" > <br><br>
                            <span id="msg"></span>
                                <div id="progreso" style="height: 36px;"></div>
                                <div id="progressbar" style="height: 16px"></div>
                                
                                
                        </td>
                   </tr>
                </table>
            </td>
         </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr>
            <td></td>
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
<!-- end:   end_query0 -->

