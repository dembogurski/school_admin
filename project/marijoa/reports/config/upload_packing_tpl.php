<!-- 
    Report Template File (precarga)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
       <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
       <script type="text/javascript" src="include/jquery.js" > </script> 
	<treset_page>
            <script>
                function check(){
                    var file = $("#xlfile").val();
                    var extension = file.substr( (file.lastIndexOf('.') +1) );
                    if(extension != 'xls'){
                        alert("Debe cargar un archivo con extension .xls \nSi esta trabajando con Microsoft Excel >= 2007 Guarde el Archivo como \nLibro de Excel 97-2003(*.xls) ");
                        $("#btnSubmit").attr('disabled', true);
                    }else{
                        $("#btnSubmit").removeAttr('disabled'); 
                    }
                }
                
                
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
			style="font-weight: bold;"><big>Packing List (Subir archivo Excel)</big></td>
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
            <td> <br> 
                <form action="upload_packing.php?ref={ref}" id="dataForm" name="dataForm" method="post" enctype="multipart/form-data">
                    <labe><b>&nbsp;Seleccione el archivo Excel:&nbsp;</b></label>
                    <input size="60" type="file" id="xlfile" name="xlfile" onchange="check()">
                    &nbsp;&nbsp;<input type="submit" value="Subir Packing List ({ref})" id="btnSubmit" name="btnSubmit" disabled>
                    
                    <input type="hidden" id="ref" name="ref" value="{ref}" > 
                    <input type="hidden" id="user" name="user" value="{user}" >
                </form> <br><br>
                <b>&nbsp;Si no tiene el formato del Packing List puede bajarlo haciendo clic <a href="http://192.168.2.254/plus/packing_lists/FormatoPackingV2.0.xls">aqui</a>  </b><br><br>
            </td>
         </tr>
          
<!-- end:    query0_data_row -->
 
 
<!-- begin: end_query0 -->

 
    </tbody>
</table>
<!-- end:   end_query0 -->

