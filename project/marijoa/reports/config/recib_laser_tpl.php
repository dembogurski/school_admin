<!-- 
    Report Template File (recib_laser)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
       <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
       <script src="include/jquery.js"></script>
	<treset_page>
<script language="javascript">
       var codigos_hijos = new Array();
       $( document ).ready(function() {
           $("#codigo").focus();
            $("#codigo").keypress(function(e) {
              if(e.which == 13) {
               info();
              }
            });
       }); 
       
  function info(){
       getCodeInfo();
       getCodigosHijos();
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
             }
            }
         });
  }
  function getCodigosHijos(){
   var codigo = $("#codigo").val();
   $.ajax({
         type: "POST",
         url: "include/Ajax.class.php",
         data: "action=get_codigos_hijos&codigo="+codigo+"",
         async:true,
         dataType: "html",
         beforeSend: function(objeto){
             codigos_hijos = new Array();
             $("#hijos").html("<img src='images/working.gif'  >"); 
         },
         complete: function(objeto, exito){
             if(exito=="success"){
                  $("#hijos").html(objeto.responseText ); 
             }
            }
         });
  }
  function imprimir(){
     var padre = $("#codigo").val();
	 var usuario = $("#usuario").val();
     //alert(codigos_hijos);
      var codigos = ""+padre+"";
      for(var i = 0;i < codigos_hijos.length;i++){
          codigos=codigos+"|"+codigos_hijos[i];
      }
      //alert(codigos);
      window.open("project/marijoa/reports/config/re_code39Lotes_prg_recib.php?codigos="+codigos+"&usuario="+usuario+"","Codigos de Barras","width=350,height=500,scrollbars=yes");
  }
  
</script>            
<!-- end:   general_header -->


<!-- begin: start_query0 -->

<input type="hidden" id="usuario" value="{user}" >

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
			style="font-weight: bold;"><big>Recepcion C/Laser e Impresion de Codigos</big></td>
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
       
        <label style="text-align: left; font-size: 22;padding-left: 8px">Codigo:</label>
        <input type="text" size="12" onfocus="this.select()"  id="codigo" onchange="info()" style="text-align: right;color:green;font-size: 22" tabindex="0">
        <br>
        <br>
        <span style="text-align: left; font-size: 18;padding-left: 8px" id="descrip"></span>
    </td> 
    
</tr>
<!-- end:    query0_data_row -->
 
 
<!-- begin: end_query0 -->
    </tbody>
</table>

<div id="hijos" style="padding: 10px;font-size: 14px">
    
</div>
<!-- end:   end_query0 -->

