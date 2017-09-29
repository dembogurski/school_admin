<!-- 
    Report Template File (adjuntar_imagen)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
       <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
      
        <link rel="stylesheet" href="file_upload/css/bootstrap.min.css">
        <link rel="stylesheet" href="file_upload/css/styles.css">
        
        <script src="file_upload/js/jquery.min.js"></script>
        <script src="file_upload/js/jquery.ui.widget.js"></script>
        <script src="file_upload/js/jquery.iframe-transport.js"></script>
        <script src="file_upload/js/jquery.fileupload.js"></script>
        
        <!-- JavaScript used to call the fileupload widget to upload files -->
        <script>
            // When the server is ready...
           
          // $("#actualizar").fadeOut();
           
           function actualizar(nro){
               
                // alert(nro);
                $.ajax({
                    type: "POST",
                    async:true,
                    dataType: "html",
                    url: "include/Ajax.class.php",
                    data: "action=get_images&nro="+nro+"",
                    beforeSend: function(objeto){ 
                       $("#images").html("<label class='loading_msg'> </label> <img src='images/working.gif' >"  );  
                    },
                    complete: function(objeto, exito){
                        if(exito=="success"){ 
                          $("#images").html(objeto.responseText);                           
                        }
                    } 
                });  
           }
           
           function cerrar(){
             window.close();
           }
           
           
            $(function () {
                'use strict';

                // Define the url to send the image data to
                var nro = $("#nro").val(); 
				
                var url = 'file_upload/files.php';

                // Call the fileupload widget and set some parameters
                $('#fileupload').fileupload({
                    formData: {'nro_transaccion': nro},
                    url: url,
                    dataType: 'json',
                    multipart: true,
                    maxFileSize: 2048, // 2 MB
                    previewMaxWidth: 100,
                    previewMaxHeight: 100,
                    previewCrop: true,
                    done: function (e, data) {
                        // Add each uploaded file name to the #files list
                        $.each(data.result.files, function (index, file) {
                          // $('<li/>').text(file.name).appendTo('#files');  
                          actualizar(nro);
                        });
                        
                    },
                    progressall: function (e, data) {
                        // Update the progress bar while files are being uploaded
                        var progress = parseInt(data.loaded / data.total * 100, 10);
                        $('#progress .bar').css( 'width', progress + '%' );
                        
                         if(progress==100){ 
                            $("#actualizar").css("opacity","100");
                         }
                           
                    }
                });
            });

        </script>
  
       <treset_page>
<!-- end:   general_header -->


<!-- begin: start_query0 -->

<input type="hidden" id="nro" value="{nro}" />
    
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
			style="font-weight: bold;"><big>Adjuntar Imagenes</big></td>
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
        <th>Modificaci&oacute;n N&deg;: {nro}</th>
    </tr>
</thead>

<!-- end:   header0 -->

<!-- begin: query0_data_row  -->
         <tr>
            <td>
                  
                <div class="container">  
                <!-- Button to select & upload files -->
                <span class="btn btn-success fileinput-button">
                    <span>Selecionar imagenes...</span> 
                    <!-- The file input field used as target for the file upload widget -->
                    <input id="fileupload" type="file" name="files[]" multiple>  
                </span>  &nbsp; <span class="label" style="background: white;color: red">(Tama&ntilde;o m&aacute;ximo de imagenes 2Mb)</span>


                <!-- The global progress bar -->
                <p>Progreso de subida...</p>
                <div id="progress" class="progress progress-success progress-striped">
                    <div class="bar"></div> 
                </div>



                <!-- The list of files uploaded -->
                <p>Imagenes adjuntadas:</p>
                <ul id="files" onchange="actualizar({nro})"></ul>

 <input type="button" id="actualizar" value="Actualizar" onclick="actualizar({nro})" style="opacity:100"  >
 
 <div style="padding: 10px; margin: 10px" id="images" > </div>

</div> 
            </td>
         </tr>
<!-- end:    query0_data_row -->

<!-- begin: end_query0 -->
<tfoot>
	<tr><td colspan="50" align="center"> <input type="button" id="cerrar" value="Cerrar" onclick="cerrar()"   ><hr />  </td></tr>
</tfoot>
    </tbody>
</table>

<div style="margin-left: 100px;margin-right:100px;">

    <div style="float: left; background: orange;width: {t1}%;height:45px;text-align:center;font-weight:bolder;vertical-align: middle;border-style: dashed;">Tejido Sano</div>

    <div style="float: right;background: gray;  width: {t2}%;height:45px;text-align:center;font-weight:bolder;vertical-align: middle;border-style: dashed;">Tejido Da&ntilde;ado </div> 

</div>
<!-- end:   end_query0 -->

