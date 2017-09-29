<!-- 
    Report Template File (fracc_x_fgt)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
       <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
       <script src="include/jquery.js"></script>
	<treset_page>
            

<script language="javascript">

function getGrupos(){
    var fam = $("input:radio[name=familias]:checked").val();
    var ref = $("#ref").val(); 
    
    $.ajax({
         type: "POST",
         url: "include/Ajax.class.php",
         data: "action=obtener_grupos_de_referencia&ref="+ref+"&familia="+fam+"",
         async:true,
         dataType: "html",
         beforeSend: function(objeto){
             $("#panel_grupos").html("<label>Procesando... </label> <img src='images/working.gif'  >"); 
         },
         complete: function(objeto, exito){
             if(exito=="success"){
                  $("#panel_grupos").html(objeto.responseText ); 
             }
            }
         });
}

function getTipos(){
    var fam = $("input:radio[name=familias]:checked").val();
    var gru = $("input:radio[name=grupos]:checked").val();
    var ref = $("#ref").val(); 
    
    $.ajax({
         type: "POST",
         url: "include/Ajax.class.php",
         data: "action=obtener_tipos_de_referencia&ref="+ref+"&familia="+fam+"&grupo="+gru,
         async:true,
         dataType: "html",
         beforeSend: function(objeto){
             $("#panel_tipos").html("<label>Procesando... </label> <img src='images/working.gif'  >"); 
         },
         complete: function(objeto, exito){
             if(exito=="success"){
                  $("#panel_tipos").html(objeto.responseText ); 
             }
            }
         });
}

function getCortes(){
    var fam = $("input:radio[name=familias]:checked").val();
    var gru = $("input:radio[name=grupos]:checked").val();
    var tipo = $("input:radio[name=tipos]:checked").val();
    var padre_o_hijos = $("input[name='padre_hijo']:checked" ).val();
    var ref = $("#ref").val(); 
    
    var codigo_exacto = $("#codigo_exacto").val(); 
    
    $.ajax({
         type: "POST",
         url: "include/Ajax.class.php",
         data: "action=obtener_cortes&familia="+fam+"&grupo="+gru+"&tipo="+tipo+"&ref="+ref+"&padre_o_hijos="+padre_o_hijos+"&codigo_exacto="+codigo_exacto,
         async:true,
         dataType: "html",
         beforeSend: function(objeto){
             $("#panel_cortes").html("<label>Procesando... </label> <img src='images/working.gif'  >"); 
         },
         complete: function(objeto, exito){
             if(exito=="success"){
                  $("#panel_cortes").html(objeto.responseText );  
             }
            }
      });
}

function checkValues(cant,codigo){
  var cortes = $("#txt_"+codigo).val();
  var array = cortes.split(",");
  var suma = 0;
  var NaN = false;
 
  for(var i = 0;i < array.length;i++){
      
      if ( isNaN( array[i] || array[i] == "") ){ 
          NaN = true;
      }else{
          suma = suma + parseFloat(array[i]);
      }
  } 
    
  if( isNaN(suma) ){
      $("#txt_"+codigo).css("border-color","red"); 
      $("#check_"+codigo).removeAttr("checked"); 
  }else{ 
      if( (suma > cant) || NaN){  
          $("#txt_"+codigo).css("border-color","red"); 
          $("#check_"+codigo).removeAttr("checked"); 
      }else{
            
          $("#txt_"+codigo).css("border-color","gray"); 
          $("#check_"+codigo).attr("checked",true); 
      }    
  } 
  sumar(cant,codigo);
}

function sumar(cant,codigo){
  var cortes = $("#txt_"+codigo).val();
  var array = cortes.split(",");
  var suma = 0;
  var NaN = false;
  var diff = 0;
  
  for(var i = 0;i < array.length;i++){
      
      if ( isNaN( array[i] || array[i] == "") ){ 
          NaN = true;
      }else{
          suma = suma + parseFloat(array[i]);
      }
  } 
    
  if( !isNaN(suma) ){ 
      diff = cant - suma;
      if(diff >= 0){
          $("#suma_"+codigo).html("<label style='color:green'>&Sigma;: "+suma+"  ("+diff+") </label>");
      }else{
          $("#suma_"+codigo).html("<label style='color:red'>&Sigma;: "+suma+"  ("+diff+") </label>");
          $("#check_"+codigo).removeAttr("checked");
      } 
  }else{
      $("#suma_"+codigo).html("NaN");
      $("#check_"+codigo).removeAttr("checked");
  }   
}
function limpiar(codigo){
    var mantener = $("#mantener").is(':checked');   
    if(!mantener){
       $("#suma_"+codigo).html("");
    }   
}   

function destildar(){
    $('[id^=check_]').each(function(){
                var thisid = $(this).attr('id');  
                var checked = $('#'+thisid).is(':checked'); 
                if(checked){
                    $('#'+thisid).attr("checked",false);
                }
    });         
}


function fraccionar(){
            var usuario = $('#user').val();
            var mostrar = $("input[name='ver_codigos']:checked" ).val();
            alert(usuario);
            
            $('[id^=check_]').each(function(){
                var thisid = $(this).attr('id');  
                var checked = $('#'+thisid).is(':checked'); 
                if(checked){
                    var codigo =   thisid.substring(6,18);  
                    var cortes =  $("#txt_"+codigo).val(); 
                    var array = cortes.split(",");
                    var suma = 0;
                    for(var i = 0;i < array.length-1;i++){
                       suma = suma + parseFloat(array[i]);   
                    }
                    
                    $.ajax({
                        type: "POST",
                        url: "include/Ajax.class.php",
                        data: "action=fraccionar_rollo&codigo="+codigo+"&cortes="+cortes+"&usuario="+usuario+"",
                        async:true,
                        dataType: "html",
                        beforeSend: function(objeto){
                            $("#suma_"+codigo).html("<img src='images/activity.gif' width='30' height='11' >");
                        },
                        complete: function(objeto, exito){
                            if(exito=="success"){
                                if(mostrar == "Si"){
                                   $("#suma_"+codigo).html(objeto.responseText );  
                                }else{
                                   $("#suma_"+codigo).html("Ok");  
                                } 
                                
                                var cant_ant = $("#cant_"+codigo).val();
                                $("#cant_"+codigo).val(cant_ant - suma); 
                                $("#check_"+codigo).removeAttr("checked"); 
                            }
                        }
                    });                   
                    
                }                               
            });
             $("#boton_fraccionar").attr("disabled",true); 
            
}
</script>
            
<!-- end:   general_header -->



<!-- begin: start_query0 -->
<input type="hidden" id="ref" value="{ref}">
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
			style="font-weight: bold;"><big>Fraccionar x Sector Grupo y Tipo</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
                <tr>
                    <td colspan="3" id="msg"></td>
                </tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th>SECTOR</th><th>GRUPO</th><th>TIPOS</th><th>CODIGOS,METRAJE Y CORTES</th>
    </tr>
   
</thead>
<tfoot>
	<tr><td colspan="50"> </td></tr>
</tfoot>
  <tr>
      <td style="width: 16%;vertical-align: top">
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         
<input type="radio"  value="{query0_FAMILIA}" name="familias" onclick="getGrupos()"><label  class="item">{query0_FAMILIA}</label><br>
         
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->

        <tr>
            <td></td>
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
</td>
<td id="panel_grupos" style="vertical-align: top;width: 16%"></td> 
<td id="panel_tipos"  style="vertical-align: top;width: 20%">
</td> <td id="panel_cortes" style="vertical-align: top;">
     
     
</td> 
 </tr>
        <tr>
            <td></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->

