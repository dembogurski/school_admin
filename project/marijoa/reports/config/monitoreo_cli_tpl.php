<!-- 
    Report Template File (monitoreo_cli)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
       <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
       <script type="text/javascript" src="include/jquery.js" > </script>
        <treset_page>
            
        <script language="javascript">   
            
            var ced = null;
            function cambiarCategoria( ci ){
               ced = ci;
               abrirPopup(ci)
            }   
                
        function guardar(){          
          var cat = $("#categoria").val();
          var prom = $("#prom").val();
		  var tipo = $("#tipo").val();
          var user = $("#user").val();
           
          if(cat > 0 && cat < 6 ){
            $.ajax({
             type: "POST",
             url: "include/Ajax.class.php",
             data: "action=cambiar_categoria_cliente&cat="+cat+"&ci="+ced+"&prom="+prom+"&user="+user+"&tipo="+tipo,
             async:true,
             dataType: "html",
             beforeSend: function(objeto){                 
                $("#message").html("<b><small> Actualizando... </small></b>  &nbsp;&nbsp;&nbsp;<img src='images/activity.gif' height='9px' width='32px'>");
             },
             complete: function(objeto, exito){
                 if(exito=="success"){                          
                     $("#message").html( objeto.responseText  ); 
                     cerrarPopup();
                     //alert(objeto.responseText);
                     var ruc = ced.replace("*","");
                     $("#"+ruc).css("background","orange");
                 }
             }
            })    
              
          }else{
             alert("NOO te la puedo!!!  :)");
          }
        }
        function aum(){
          var cat =  parseInt( $("#categoria").val() ) + 1;     
          $("#categoria").val(cat);          
        }
        function dism(){
          var cat =  parseInt( $("#categoria").val() ) - 1;     
          $("#categoria").val(cat);          
        }
        function abrirPopup(obj){   
            var html = '<input type="button" onclick="dism()" value="<" >\n\
        <input type="text" value="1" size="3" id="categoria" style="text-align:center;" > \n\
<input type="button" onclick="aum()" value=">" >\n\
            <img  onclick="cerrarPopup()" style="float:right;cursor:pointer;" src="images/12-em-cross.png" />\n\
			<select id="tipo">          \n\
"<option value=\"Nuevo\">Nuevo</option>"\n\
"<option value=\"P_3-A\">P_3-A</option>"\n\
"<option value=\"Preferencial\">Preferencial</option>"\n\
"<option value=\"Confeccionista\">Confeccionista</option>"\n\
"<option value=\"Tienda\">Tienda</option>"\n\
"<option value=\"Funcionario\">Funcionario</option>"\n\
</select> \n\
<select id="prom">          \n\
"<option value=\"N_X\">N_X</option>"\n\
"<option value=\"P_3-A\">P_3-A</option>"\n\
"<option value=\"C_0-10\">C_0-10</option>"\n\
"<option value=\"C_10-29\">C_10-29</option>"\n\
"<option value=\"T_10-29\">T_10-29</option>"\n\
"<option value=\"C_30-99\">C_30-99</option>"\n\
"<option value=\"T_30-99\">T_30-99</option>"\n\
"<option value=\"C_100-X\">C_100-X</option>"\n\
"<option value=\"T_100-X\">T_100-X</option>"\n\
"<option value=\"X\">X</option>"\n\
</select>   \n\
\n\
<input type="button" onclick="guardar()" value="Guardar">';
            $("#message").html( html );
            $("#message").animate({ opacity:100 }, 2000);  
        }
   
        function cerrarPopup(){   
            $("#message").html('<img  onclick="cerrarPopup()" style="float:right;cursor:pointer;" src="images/12-em-cross.png" />');
            $("#message").animate({ opacity:0 }, "slow");    
        }
        function limpiar(){   
            $("#message").html('');	
            $("#message").animate({ opacity:0 }, "fast");    
        }
 
        $(window).scroll(function(){
             $('#message').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
        });
        
        
        </script>
        
        
     
    <style type="text/css">

    .message{
        position: absolute;
        top: 0;
        z-index: 10;
        background:#ffc;
        padding:5px;
        border:1px solid #CCCCCC;
        text-align:center;
        font-weight:bold;

        width: 20%;
        height: 10%;
        margin-top: 180px;
        margin-left: 40%;
        margin-right: 40%;  
    }
</style>       
         
<div id="message" class="message"  style="opacity:0;"   >   
    
  
     
</div>

<!-- end:   general_header -->


<!-- begin: start_query0  -->
  <input type="hidden" id="user" value="{user}"   >   

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
			style="font-weight: bold;"><big>Monitoreo de Clientes</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
                 <tr> <td style="height:40px" colspan="3" align="center"> <b>Periodo:&nbsp;</b>{desde}&nbsp; - &nbsp;{hasta} &nbsp;&nbsp; 
                         <b>Meses&nbsp;</b>{meses}&nbsp;&nbsp;&nbsp;<b>A&ntilde;os</b> &nbsp;{anios}
                         &nbsp;&nbsp;<b>Suc:&nbsp;</b>{sup_suc} &nbsp;&nbsp; <b>Cat:&nbsp;</b>{sup_cli_cat} <b>&nbsp;&nbsp;Promedio: &nbsp;</b>{sup_prom} </td>  </tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th>MES</th>
        <th>CLIENTE</th>
        <th>CI</th> 
        <th style="text-align: right;">MTS</th> 
        <th style="text-align: right;">CANT</th>
        <th>&nbsp;</th> 
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr>
            <td class="item">{query0_MES}</td>
            <td class="item" >{query0_CLIENTE}</td>
            <td class="item">{query0_CI}</td> 
            <td class="num">{query0_MTS}</td>
            <td class="num" title="Cantidad de cortes">{query0_CANT}</td>
            <td class="num" style="text-align: center" title="Cat {cat}:  {query0_MTS}/({min}-{max})" >{range}</td>
            
         </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr>
            <td></td> 
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td style="height:36px">&nbsp;</td>
             
            <td style="vertical-align: top" >{subtotal0_VECES} &nbsp;&nbsp;&nbsp; {prom_metraje}  </td>
            <td style="vertical-align: top" align="center" id="{ruc}"> <a href=javascript:cambiarCategoria("{query0_CI}")>Editar</a> </td>
            <td style="text-align: right;vertical-align: top"><b>{subtotal0_MTS}</b></td>
            
            <td style="text-align: right;vertical-align: top" title="Cantidad de Veces que Compro"><b>{subtotal0_CANT}</b></td>
             
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->

