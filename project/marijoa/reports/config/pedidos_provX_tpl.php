<!-- 
    Report Template File (pedidos_prov)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
	<treset_page>
	<link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
         
	<script type="text/javascript" src="include/jquery.js" > </script> 
       
<style>
.fila{
 font-size:11px;
}
.tot{
 font-size:12px;
}

.diff{
  height:20px;
  text-align:right; 
}

.message{
    position: absolute;
    top: 0;
    z-index: 10;
    background:lightyellow;
    padding:5px;
    border-width:  1px  1px  1px  1px;  
    -moz-border-radius: 0pt 0pt 9pt 9pt; 
    border-style: solid;
    border-color: orange;
    text-align:center;
    font-weight:bold;
    width: 50%;
    height: 110px;
    margin-top: 0px;
    margin-left: 35%;
    margin-right: 15%;  
 }
 .linea{
    border-width:  0px  0px  2px  0px;    
    border-style: solid;
    border-color: orange;
    background:lightyellow;
 } 
</style>


<script>
 
 var obs_seg = [];
 
 var current_id = 0;
 
 function limpiar(){  
	$("input[type=checkbox][checked]").each( 
        function() {  
	       $(this).removeAttr("checked");   
        } 
    );    	
 }
 
 function abrirPopup(id){ 
    current_id = id; 
    var p = $("#estado_"+id );
    var h = $("#estado_"+id ).height();
    var pos = p.position();  
	
	var obs = obs_seg["x"+id]; 
	
	
    
    var est = $("#estado_"+current_id).html(); 
    if(est == "Comprado"){
        $("#radio_comprado").attr("checked","true");
    }else if(est == "En Transito"){
        $("#radio_transito").attr("checked","true");
    }else if(est == "En Deposito"){
        $("#radio_deposito").attr("checked","true");   
    }else{        
        $("#radio_despachado").attr("checked","true");   
    }
    $("#message").animate({ opacity:100 }, 50); 
    $("#message").slideDown("fast");  
    $('#message').animate({top: pos.top + h +2 +"px" },{queue: false, duration: 250}); 
    $("#obs_seg").val(obs);
}
   
function cerrarPopup(){    
    $("#message").slideUp("fast");
}
function agregarObserVacion(){
      var obs_seg = $("#obs_seg").val(); 
	  if(obs_seg == ""){
	     alert("Debe agregar al menos una Observacion...");
	  }else{

        if ($("input[name='slider']:checked").val() == 'Comprado'){
              cambiarEstadoDetalle("Comprado");
        }else if ($("input[name='slider']:checked").val() == 'En Transito'){
             cambiarEstadoDetalle("En Transito");
        }else if ($("input[name='slider']:checked").val() == 'En Deposito'){
               cambiarEstadoDetalle("En Deposito");
        }else{ // Despachado
              var codigo = $("#_"+current_id).val();
              if(codigo == ""){
                  alert("Debe agregar un codigo para poder marcar como Despachado...");
              }else{
                  cambiarEstadoDetalle("Despachado");
              }
        }
		cerrarPopup();
   }		
}
 
   function cambiarEstadoDetalle(estado){   
   	      var obs_seg = $("#obs_seg").val(); 
   	      $.ajax({
                    type: "POST",
                    url: "include/Ajax.class.php",
                    data: "action=cambiar_estado_detalle_pedido&id="+current_id+"&estado="+estado+"&obs_seg="+obs_seg,
                    async:true,
                    dataType: "html",
                    beforeSend: function(objeto){
                        $("#msg").html("<b> <img src='images/activity.gif' height='10px' width='40px'  >");
                    },
	           complete: function(objeto, exito){
	              if(exito=="success"){    
	              	  $("#estado_"+current_id).html(estado);
                          $("#estado_"+current_id).css("background","orange");              
	                  $("#msg").html("");
	              }
        	   } 
	     })   	  
   } 
 $(document).ready(function(){
   $("input[name='slider']").change(function() {
         
        if ($("input[name='slider']:checked").val() == 'Comprado'){
              cambiarEstadoDetalle("Comprado");
        }else if ($("input[name='slider']:checked").val() == 'En Transito'){
             cambiarEstadoDetalle("En Transito");
        }else if ($("input[name='slider']:checked").val() == 'En Deposito'){
               cambiarEstadoDetalle("En Deposito");
        }else{ // Despachado
              var codigo = $("#_"+current_id).val();
              if(codigo == ""){
                  alert("Debe agregar un codigo para poder marcar como Despachado...");
              }else{
                  cambiarEstadoDetalle("Despachado");
              }
        }
   });
 });
 
 $(window).scroll(function(){
      //$('#message').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
 });	
</script> 	
<!-- end:   general_header -->


<!-- begin: start_query0 -->
<table style="text-align: left; width: 99%;" border="1"cellpadding="0" cellspacing="0">
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
			style="font-weight: bold;"><big>Notas Pedidos a Proveedores</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
        <tr> <td></td><td><b>&nbsp; Pedidos urgentes en<input type="text" disabled size="8" style="border-style:solid; background: rgb(250, 250, 210);font-size:14px;"> &nbsp;&nbsp;&nbsp;&nbsp;Periodo: &nbsp;&nbsp; {sup_desde} -- {sup_hasta}</b></td><td></td>  </tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
 <div id="message" class="message"  style="opacity:0;"  >  <img  onclick="cerrarPopup()" style="float:right;cursor:pointer;" src="images/12-em-cross.png" /> 
     
     <div style="text-align:center" >
         <label style="color:green"><b>Agregue la Observacion y despues cambie el estado</b></label>
         <div style="text-align:center;height: 36px"><b>Obs:</b><input type="text" size="70" maxlength="1024" id="obs_seg"> <input type="button" value="Guardar" onclick="agregarObserVacion()"></div>
         <div>
         <label style="margin-right:25px;margin-left:25px">Comprado</label><label style="margin-right:25px;margin-left:25px">En Transito</label>  <label style="margin-right:25px;margin-left:25px">En Deposito</label>  <label style="margin-right:25px;margin-left:25px">Despachado</label></div> 
         <input   type="radio" id="radio_comprado" name="slider" value="Comprado"><input type="text" size="14"  class="linea"   style="height:10px;">
         <input   type="radio" id="radio_transito" name="slider" value="En Transito"><input type="text" size="14" class="linea" style="height:10px;">
         <input   type="radio" id="radio_deposito" name="slider" value="En Deposito"><input type="text" size="14" class="linea" style="height:10px;">
         <input   type="radio" id="radio_despachado" name="slider" value="Despachado"> 
     </div>
    
     <div id="msg"></div>
 </div>

    <tr style="font-weight:bolder;font-size:16px;">
        <th>NRO</th>
        <th>USUARIO</th>
        <th>CODIGO</th>
        <th>GRUPO</th>
        <th>TIPO</th>
        <th>COLOR</th>
        <th>CANT</th>
        <th>PRECIO VENTA</th>
        <th>ESTADO</th>
        <th>PROV</th>
	 <th>PREVISTO</th>        
        {add_code_cab}
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
       <tr {urge} >
           <td class="itemc" >{query0_NRO}</td>
            <td  class="itemc">{query0_USUARIO}</td>
             <td class="itemc" >{query0_CODIGO}</td>
            <td  class="item">{query0_GRUPO}</td>
            <td class="item"  >{query0_TIPO}</td>
            <td  class="itemc">{query0_COLOR}</td>
            <td class="num">{query0_CANT}</td>
            <td class="num">{query0_PRECIO}</td>
            <td class="itemc" id="estado_{query0_ID}" onclick="cambiarEstado({query0_ID})" onmouseover=this.bgColor="orange" onmouseout=this.bgColor="white"  style="cursor:pointer" >{query0_ESTADO}</td>
            <td class="item">{query0_PROV}</td>
            <td  class="itemc" >{query0_PREV}</td> 
            {add_code}
         </tr>
     {query0_OBSD}
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
			 
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: obs -->
        <tr>
            <td style="font-weight:bolder;font-size:14px;">     </td>
            <td colspan="9" style="font-size:14px;"><b>Obs:</b>{query0_OBS}</td>
 
        </tr>
<!-- end:    obs -->
<!-- begin: query0_subtotal_row -->
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
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0  -->
 
    </tbody>
</table>
<!-- end:   end_query0 -->


<!-- begin: end_queryX  -->
   <tr style="background-color:#CCCC99;" > 
             
   </tr>
    </tbody>
</table>
<!-- end:   end_queryX -->

<!-- begin: script noeval -->
<script>
   function reload(){
   	  window.location.reload();
   }

 
   function setVisible(id){
     var codigo = $("#_"+id).val();
     if(codigo.length > 0){
         $("#span_"+id).fadeIn("slow");
     }else{
         $("#span_"+id).fadeOut("fast");
     }
   }
   function cambiarEstado(id){
     var estado =  $("#estado_"+id).html();   
     if(estado == "Comprado" || estado == 'En Transito' || estado == 'En Deposito' || estado == 'Despachado'){
         abrirPopup(id);
     }      
   }   
   function agregar_codigo(id){
          var codigo = $("#_"+id).val();
          var html = $("#span_"+id).html();
          
          if(codigo.length > 0){
   	      $.ajax({
		type: "POST",
		url: "include/Ajax.class.php",
		data: "action=agregar_codigo&id="+id+"&codigo="+codigo,
		async:true,
                dataType: "html",
		   beforeSend: function(objeto){
                   $("#boton_"+id).fadeOut("fast");
                   $("#span_"+id).html("<img src='images/activity.gif' height='10' width='50'>"); 
                },
	        complete: function(objeto, exito){
	            if(exito=="success"){
                      if(jQuery.trim(objeto.responseText) == "Ok"){ 
                          $("#span_"+id).html("<img src='images/ok.png'>");      
                          //$("#estado_"+id).html("<b>Despachado</b>");
                          $("#estado_"+id).css("background","orange");                          
                          $("#_"+id).attr("disabled","true");
                      }else{
                         alert(objeto.responseText);
                         $("#span_"+id).html(html);
                      }   
	            }
        	   }
		 }
		)
        }else{
          alert("Favor ingrese un codigo para poder actualizar!!!");
        }
   }
</script>  
<!-- end:    script -->

<!-- begin: revisar_pend noeval -->
<script>   </script>
<!-- end:    revisar_pend -->
