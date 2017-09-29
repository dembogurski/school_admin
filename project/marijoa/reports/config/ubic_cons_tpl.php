<!-- 
    Report Template File (ubic_cons)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
       <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
       <script src="include/jquery.min.js"></script>
       
       <script>
        
       var lista = new Array(); 
       $(document).ready( function(){
		$("#cons_id").focus();
       		$("#cons_id").select();
	 
       		$("#cons_id").keyup(function(e) {
			  if ( e.keyCode == 13 ) {
			    consultar();
			  }
			 });
			document.onkeydown = checkKeycode
		   function checkKeycode(e) {
		       var keycode;
		       
		       if (window.event)
		           keycode = window.event.keyCode;
		       else if (e)
		           keycode = e.which;
		
		       // Mozilla firefox
		       if ($.browser.mozilla) {
		           if (keycode == 116 ||(e.ctrlKey && keycode == 82)) {
		               if (e.preventDefault)
		               {
		                   e.preventDefault();
		                   e.stopPropagation();
		                     alert("Actualizar esta desabilitado...");
		               }
		           }
		       } 
		     
		   }		
       });
       
       function getDescription(codigo){
        $.ajax({
            type: "POST",
            url: "include/Ajax.class.php",
            data: "action=buscar_datos_codigo&codigo="+codigo+"",
            async:true,
            dataType: "html",
            beforeSend: function(objeto){
                $("#msg").html("<label>Buscando datos</label> <img src='images/working.gif' >"); 
            },
            complete: function(objeto, exito){
                  if(exito=="success"){ 
                      if($.trim(objeto.responseText) != "Error"){
                         $("#msg").html("<img src='images/dialog-warning.png' width='36' height='36' > Producto agregado a la lista de No Encontrados"); 
                         $("#not_found").append(objeto.responseText); 
                      }else{
                          $("#msg").html("<img src='images/error.png' >El codigo: "+codigo +" aparentemente no existe o ha sido borrado.");    
                      }    
                  }
                }
            });  
       }
       	function consultar(){  
       		    		
       		var codigo = parseInt(myTrim($("#cons_id").attr("value")));       		
       		var targetId = (isNaN(codigo))?false:("#"+codigo);
       		
       		if(!targetId){
       			//alert("El Codigo debe ser solo numerico");
       		}else{     		
	       	     $(targetId).parent().css("background-color","lightBlue");
	       	     $(".log").html($("#desc_"+$("#cons_id").attr("value")).text());
	       	     $(".check_"+codigo).html("<img src='images/ok.png'/>").addClass("checked");
       		}
                
                var contenido = $("#"+codigo).html();
                                
                var punteados =   $(".checked").length ; 
       		$(".punteados").html(punteados);
       		
       		$("#cons_id").focus();
       		$("#cons_id").select();
                if(contenido ==  null){
                      
                   if(  jQuery.inArray( codigo, lista ) == -1 ) { 
                      lista.push(codigo); 
                      getDescription(codigo);                     
                   }     
                }else{
                  $("#msg").html("");
                }
       	}
       	function myTrim(x) {
	    return x.replace(/^\s+|\s+$/gm,'');
	}
        function imprimir(){
           var w =  window.open("","No encontrados","toolbar=no,menubar=yes, scrollbars=yes, resizable=yes, top=500, left=500, width=800, height=400");
           //var w =  window.open();
           var html = $("#container").html();
            w.document.body.innerHTML= html;
          // w.document.write("<p>Jajaja</p>");  
        }
       </script>
       <style>
       	.search{
       		padding:17px;
       		width: 97%;
       		height: 60px;
       		text-align: center;
       	}
       	table td{
       		font-size: 12px;
       	}
       	.log{
       		margin-top: 7px;
                color:green;
                font-size: 15px
       	}
       	checked{
       		color: lightBlue;
       	}
       	.msg{
            font-size: 14px
        }
       </style>
	<treset_page>
<!-- end:   general_header -->


<!-- begin: start_query0 -->
<table style="text-align: left; width: 99%;"   border="1" cellpadding="0" cellspacing="0">
    <tbody>
    <thead>
<tr> <td colspan="50"> 
	<table style="text-align: left; width: 100%;" border="1"
	 cellpadding="0" cellspacing="0">
	  <tbody>
		<tr style="background: lightBlue">
		  <td style="width: 20%;height:40px;"> </td>
		  <td style="text-align: center;width: 60%;font-size: 40px">
			<b>MARIJOA</b></td>
		  <td style="text-align: right;">
			<tpage><b>Pag: </b></tpage></td>
		</tr>
		<tr>
		  <td  style="width: 20%;">
			<small><small>ycube plus RAD [1.2.31]</small></small>
		  </td>
		  <td style="text-align: center;"><big
			style="font-weight: bold;"><big>Reporte de Ubicaci&oacute;n de Productos</big><br />
			Deposito: {sup_suc} Estante: {sup_estante} Fila: {sup_fila} Columna: {sup_col}
		  </td>
			
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
		<tr>
			<td colspan="3" style="height: 3em;">
				<div class="search">
                                    <input id="cons_id" name="id" type="text" /><input type="button" value="Consultar" onclick="consultar()" /> &nbsp; &nbsp;<span style="font-weight:bolder;font-size: 18"> Punteados:</span> 
                                    <span class="punteados" style="font-weight:bolder;font-size: 18">
                                        
                                    </span> <span id="msg" class="msg"></span>
				    <div class="log"></div>
				</div>
			</td>
		</tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
    	<th>Verif.</th>
        <th>Codigo</th>
        <th>Usuario</th>
        <th>Fecha</th>
        <th>Descripci&oacute;n</th>
        <th>Suc</th>
        <th>Oper</th>
        <th>Estante</th>
        <th>Fila</th>
        <th>Col</th>
        <th>Estado</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"> </td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr style="text-align: center">
         	<td class="check_{query0_Codigo}">&nbsp;</td>
            <td style="text-align: right" id="{query0_Codigo}">{query0_Codigo}</td>
            <td style="text-align: left">{query0_Usuario}</td>
            <td>{query0_Fecha}</td>
            <td id="desc_{query0_Codigo}" style="text-align: left">{query0_descrip}</td>
            <td>{query0_suc}</td>
            <td>{query0_Oper}</td>
            <td>{query0_Estante}</td>
            <td>{query0_Fila}</td>
            <td>{query0_Col}</td>
            <td>{query0_Estado}</td>
         </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr>
            <td colspan="2"><b>Cant. Piezas:&nbsp;{i}</b></td>
            
            
            <td colspan="2"><b>Punteados </b>  <span class="punteados"></span> </td>
            <td></td>
            <td></td>
            <td></td>
            <td colspan="2" style="text-align: center"><input type="button" value="Imprimir no encontrados" onclick="imprimir()"></td>
            
            <td></td>
            <td></td>
        </tr>

<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->

<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>

<div id="container">
<table style="text-align: left; width: 99%;" id="not_found" border="1" cellpadding="0" cellspacing="0">
        <tr>
            <th colspan="7" style="background: lightgray">Productos que no fuguran en este cudrante. Deposito: {sup_suc} Estante: {sup_estante} Fila: {sup_fila} Columna: {sup_col}</th>             
        </tr>   
        <tr><th>Codigo</th> <th>Sector</th> <th>Grupo</th> <th>Tipo</th> <th>Color</th> <th>Cant</th>  <th>Suc</th></tr>   
</table>
</div>
<!-- end:   end_query0 -->

