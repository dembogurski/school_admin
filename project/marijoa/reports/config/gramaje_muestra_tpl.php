<!-- 
    Report Template File (recib_laser)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
<script src="include/jquery.js"></script>
-->

<!-- begin: general_header noeval -->
       <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
       
       
       
       <script language="javascript" src="include/jquery.min.js"> </script>
       <script language="javascript" src="include/swfobject.js">  </script>
       <script language="javascript" src="include/scriptcam.js">  </script>
                
       
	<treset_page>

            
        <script language="javascript">
          
        var last_code = '';
            
        $( document ).ready(function() {

           
		// Camera
			$("#webcam").scriptcam({
				showMicrophoneErrors:false,
				onError:onError,
				cornerRadius:8,
				width: 640,
				height: 480,
				cornerColor:'e3e5e2',
				onWebcamReady:onWebcamReady,
						//uploadImage:'images/upload.gif',
				onPictureAsBase64:base64_tofield_and_image,
				onError: oopsError
			}); 
             
            $("#codigo").focus();
            $("#codigo").keypress(function(e) {
              if(e.which == 13) {
                info();
              }
            });
            $("#gramaje_muestra").keypress(function(e) {
              if(e.which == 13) {
                $("#gramar").focus();
              }
            });
            $("#codigo").change(function(e) {
              if( $("#codigo").val() == "" || $("#gramaje_muestra").val() == "" )  {
                 $("#gramar").attr("disabled",true);
              }else{
                  $("#gramar").removeAttr("disabled");
              }
            });
             $("#gramaje_muestra").change(function(e) {
              if( $("#codigo").val() == "" || $("#gramaje_muestra").val() == "" )  {
                 $("#gramar").attr("disabled",true);
              }else{
                  $("#gramar").removeAttr("disabled");
              }
            });
            
       }); 
        function base64_tofield() {
            $('#formfield').val($.scriptcam.getFrameAsBase64());
        };
	function base64_toimage() {
           $('#base64').val($.scriptcam.getFrameAsBase64());
	   $('#image').attr("src","data:image/png;base64,"+$.scriptcam.getFrameAsBase64());
           $('#guardar').removeAttr("disabled");
	};
	function base64_tofield_and_image(b64) {
		$('#base64').val(b64);
                $('#image').attr("src","data:image/png;base64,"+b64);
	};
	function changeCamera() {
		$.scriptcam.changeCamera($('#cameraNames').val());
	}
	function onError(errorId,errorMsg) { 
	      $( "#capturar" ).attr( "disabled", true );
	      alert(errorMsg);
	}			
	function onWebcamReady(cameraNames,camera,microphoneNames,microphone,volume) { 
                $.each(cameraNames, function(index, text) {
                    $('#cameraNames').append( $('<option style="font-size:12px;"></option>').val(index).html(text) )
                }); 
		$('#cameraNames').val(camera);
        }
        function oopsError(errorId,errorMsg) {
           alert(errorId+" "+errorMsg);
           if(errorId == 3){
               $("#msg_img").html("<label style='color:red;font-size:18px;font-weight:bolder'>&nbsp;&nbsp;No se ha encontrado ninguna camara...</label>");
           }else{
               $("#msg_img").html("<label style='color:red;font-size:18px;font-weight:bolder'>&nbsp;&nbsp;"+errorMsg+"...</label>");
           }
        }

       
       
  function info(){
       getCodeInfo(); 
  }
  function getCodeInfo(){
    var codigo = $("#codigo").val();
    
    $.ajax({
         type: "POST",
         url: "include/Ajax.class.php",
         data: "action=get_code_info&codigo="+codigo+"",
         async:true,
         dataType: "html",
         beforeSend: function(objeto){
             $("#descrip").html("<label>Buscando... </label> <img src='images/working.gif'  >"); 
         },
         complete: function(objeto, exito){
             if(exito=="success"){
                  $("#descrip").html(objeto.responseText ); 
                  
                  if(jQuery.trim(objeto.responseText) == "Codigo No Existe!!!"){
                      $("#gramar").attr("disabled",true);
                      $("#codigo").focus();
                       $("#codigo").select();
                        $("#similares").html("");  
                  }else{
                      $("#gramaje_muestra").focus();
                      cantProductosSimilares();
                  }
                  
             }
            }
         });
  }
  function cantProductosSimilares(){
     var codigo = $("#codigo").val();
    $.ajax({
         type: "POST",
         url: "include/Ajax.class.php",
         data: "action=cant_productos_similares&codigo="+codigo+"",
         async:true,
         dataType: "html",
         beforeSend: function(objeto){
             $("#similares").html("<label>Buscando productos similares de la misma compra... </label> <img src='images/working.gif' >"); 
         },
         complete: function(objeto, exito){
             if(exito=="success"){
                  $("#similares").html(objeto.responseText );  
             }
            }
         });
  }
  
  function gramar(){
     var codigo = $("#codigo").val();
     var gramaje = $("#gramaje_muestra").val();
     if(isNaN(codigo) || isNaN(gramaje)){
         alert("Solo debe Ingresar Numeros!")
     }else{
        $.ajax({
         type: "POST",
         url: "include/Ajax.class.php",
         data: "action=gramar_productos_similares&codigo="+codigo+"&gramaje="+gramaje,
         async:true,
         dataType: "html",
         timeout:6000,
         beforeSend: function(objeto){
             $("#msg").html("<label>Aplicando gramaje de muestra... </label> <img src='images/working.gif' >"); 
         },
         complete: function(objeto, exito){
             if(exito=="success"){
               
                if( jQuery.trim(objeto.responseText) == "Ok"){
                    $("#similares").html("");  
                    $("#descrip").html("");  
                    $("#msg").html("Ok Productos Gramados con exito!");  
                    $("#codigo").focus();
                    $("#codigo").select();
                    $("#gramaje_muestra").val("");
                    $("#gramar").attr("disabled",true);
                }else{
                   $("#smg").html("Ocurrion un error de comunicacion con el Servidor! Mensaje:"+objeto.responseText);   
                }
                 
             }
            }
         });
     }
  }
   function guardarImagen(){
     //var base64  = $.scriptcam.getFrameAsBase64();
     var base64  = $("#base64").val();
   
     var base64img = encodeURIComponent(base64)
     var codigo = $("#codigo").val();
     var descrip = jQuery.trim($("#descrip").html());
     
    var replicar = $("input[name='replicar']:checked").val();
	
     if(codigo == '' || descrip == 'Codigo No Existe!!!'){
        alert("Debe ingresar un Codigo valido para poder asociar la imagen!");    
        $("#codigo").focus();
     }else{
     
        $.ajax({
            type: "POST",
            url: "include/Ajax.class.php",
            data: "action=guardar_imagen_base64&base64img="+base64img+"&codigo="+codigo+"&replicar="+replicar,
            async:true,
            dataType: "html",
            beforeSend: function(objeto){
                $("#msg_img").html("<label>&nbsp;&nbsp;&nbsp;Guardando imagen... </label> <img src='images/working.gif' >"); 
            },
            complete: function(objeto, exito){
                if(exito=="success"){
                   
                   var nombre = jQuery.trim(objeto.responseText);
                   
                   if(last_code != codigo){ // Si el codigo es distinto que el anterior
                        
                        $("#msg_img").html("&nbsp;&nbsp;&nbsp;Ok imagen guardada..."+nombre );   
                        last_code = codigo;
                        $('#ultimas').find('tr').each(function(){
                            $(this).prepend('<td ><img src="prod_images/'+nombre+'" width="80px" height="60px"></td>').fadeIn('slow');
                        }); 
                        $('#ultimas tr').find('th:last, td:last').fadeOut("slow");
                        $('#ultimas tr').find('th:last, td:last').remove(); 
                   } else{
                        
                       $('#ultimas tr').find('th:first, td:first').remove();   
                       $('#ultimas').find('tr').each(function(){
                            $(this).prepend('<td ><img id="temporal" src="" width="80px" height="60px"></td>').fadeIn('slow'); 
                       }); 
                       $("#temporal").attr("src","data:image/png;base64,"+base64);
                       $("#msg_img").html("&nbsp;&nbsp;&nbsp;Ok imagen rempazada..." +nombre);   
                   }
                }
                }
            });
       }  
         
  } 
  
    
  
</script>    

<style type="text/css">
    button{
        font-weight: bolder;
        font-size: 15px;
        color:black;
    }
</style>

<!-- end:   general_header -->


<!-- begin: start_query0 -->

<input type="hidden" id="usuario" value="{user}" >
<input type="hidden" id="base64" value="" >


<table style="text-align: left; width: 99%;" border="1" cellpadding="0" cellspacing="0">
    <tbody>
    <thead>
<tr> <td colspan="50" > 
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
			style="font-weight: bold;"><big>Gramaje de Muestra y Captura de Imagen</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
	  </tbody>
	</table> 
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
     
</thead>
 
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
<tr>
    <td style="height:120px">
       
        <label style="text-align: left; font-size: 18;padding-left: 8px">Codigo:</label>
        <input type="text" size="10" onfocus="this.select()"  id="codigo" onchange="info()" style="text-align: right;color:green;font-size: 18" tabindex="1">
        <label style="text-align: left; font-size: 18;padding-left: 8px">Gramaje de Muestra:</label>
        <input type="text" size="8"  id="gramaje_muestra"  style="text-align: right;color:green;font-size: 18" tabindex="1">
        &nbsp;&nbsp;
        <input type="button" id="gramar"  value="Aplicar Gramaje" onclick="gramar()" disabled  style="font-weight: bolder;font-size: 15"> <span style="text-align: center;color: green; font-size: 16;padding-left: 8px" id="msg"></span>
        <br>
        <br>
        <span style="text-align: left; font-size: 16;padding-left: 8px" id="descrip"></span><br>
        <span style="text-align: left; font-size: 16;padding-left: 8px" id="similares"></span>
    </td> 
    
</tr>
<!-- end:    query0_data_row -->
 
 
<!-- begin: end_query0 -->
    </tbody>
</table>
<div style="height:4px"></div>
         <div style="width:640px;float:left;border:solid gray 2px" >
	         
		 <div style="margin:5px;">
		       <img src="images/webcam.jpg" style="vertical-align:text-top"/>
		       <select id="cameraNames" size="1" onChange="changeCamera()" style="width:245px;font-size:12px;height:22px;"></select> 
		 </div>
                 <div id="webcam" > </div> 
	</div> 
	
	
&nbsp;<span style="bolder: solid gray 2px;padding: 4px"> <img src="images/no-image.png" id="image" border="0" alt="" style="width:320px;height:240px;border:solid gray 1px;"/> </span>    <br>

&nbsp;&nbsp;&nbsp; <input type="button" id="capturar" onclick="base64_toimage()" value="Capturar Imagen"> 
<br><br>
&nbsp;&nbsp;&nbsp;
<input id="si" type="radio" name="replicar" value="Si" checked><label for="si">Tomar padre y Replicar en los Hijos</label><br> 
&nbsp;&nbsp;&nbsp;
<input id="no" type="radio" name="replicar" value="No"><label for="no">No Replicar, aplicar solo a este codigo</label><br>
<br>&nbsp;&nbsp;&nbsp;
<input type="button"  id="guardar" onclick="guardarImagen()" disabled value="Guardar Imagen"> 
 

<div >
    &nbsp;&nbsp;&nbsp;
    <table id="ultimas" border="0" cellspacing="3" cellpadding="3" style="margin-left:10px;border:1px goldenrod solid;-moz-border-radius: 3 3 3 3" >
        <tr>
            <td style="width: 80px;height:60px;"> </td>
            <td style="width: 80px;height:60px;"> </td>
            <td style="width: 80px;height:60px;"> </td>
            <td style="width: 80px;height:60px;"> </td>
        </tr>
    </table>
</div>

&nbsp;&nbsp;&nbsp;<div id="msg_img" style="height:36px"></div>  
<!-- end:   end_query0 -->


