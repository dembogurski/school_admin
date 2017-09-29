<!-- 
    Report Template File (pol_abast_rep)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
       <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
       <link rel="stylesheet" type="text/css" href="templates/jquery-ui.css" /> 
         <script type="text/javascript" src="include/jquery-1.4.3.min.js" > </script>   
         
         <script type="text/javascript" src="include/jquery-ui.js" > </script>   
 
       
       <style>
            .anchorTitle {
                /* border radius */
                -moz-border-radius: 0px 0px 8px 8px;
                -webkit-border-radius: 8px;
                border-radius: 8px;
                /* box shadow */
                -moz-box-shadow: 2px 2px 3px #e6e6e6;
                -webkit-box-shadow: 2px 2px 3px #e6e6e6;
                box-shadow: 2px 2px 3px #e6e6e6;
                /* other settings */
                background-color: #fff;
                border: solid 2px orange;
                border-top: solid 1px #BDBDBD;
                color: #333;
                display: none;
                font-family: Helvetica, Arial, sans-serif;
                font-size: 13px;
                min-height: 67px;
                line-height: 1.3;
                max-width: 384px;
                padding: 4px;
                margin: -4px 0px 0px 10;
                position: absolute;
            }
            * html #anchorTitle {
                /* IE6 does not support max-width, so set a specific width instead */
                width: 500px;
            }
            .obs{
                 position: absolute;
                 top: 0;
                 z-index: 10;
                 background:#ffc;
                 padding:5px;
                 border:1px solid #CCCCCC;
                 text-align:center;
                 font-weight:bold; 
                 height: auto;
                 margin-top: 0px;
               
             }            
 
            .deposito :hover{
                background-color: orange;
            }
.message{
        position: absolute;
        top: 0;
        z-index: 10;
        background:#ffc;
        padding:5px;
        border:solid orange 1px;
        text-align:center;
        font-weight:bold;
        width: 60%;
        height: auto;
        margin-top: 120px;
        margin-left: 25%;
        margin-right: 25%;  
    }   
 fieldset{
	margin:7px;
	border: 0;
	color: black;
	font-size: 0.9em;
	display: inline;
}
.marco{	
  margin-top: 25px; 
}
.marco_img {	
  background: #BDBDBD;	
  text-align: center;	
  font-size: 11px;	
  float: left;	
  height: 210px;	
  margin: 18px 10px 0 0;	
  padding: 4px 0 4px 0;	
  width: 140px;
  cursor: pointer;
}
.miniaturas {	
	height: 128px;	
	width: 128px;	
	padding: 3px;	
	background: #808080;
	-webkit-transition-property: height, width; /* Safari */
	-webkit-transition-duration: 0.3s; /* Safari */
	transition-property: height, width;
	transition-duration: 0.3s;
}
.micro_img {	
  background: #BDBDBD;	
  text-align: center;	
  font-size: 8px;	
  float: left;	
  height: 56px;	
  margin: 1px;	
  padding: 1px 0 2px 0;	
  width: 50px;
}
.miniaturas:hover {
	height: 131px;	
	width: 131px;	
	padding: 0px;	
	cursor: pointer;	
	background: #808080;
}
.img_title{
    border-radius: 8px;
    -moz-border-radius: 0px 8px 8px 8px;
    background-color: #fff;
    border: solid 3px lightblue; 
    color: #333;
    display: none; 
    position: absolute;
    font-family: Helvetica, Arial, sans-serif;
    padding: 5px 7px;
}            
       </style>       
       <treset_page>
       <script language="javascript">
       var lista = new Array();
       var current_element = '';
           
        $(document).ready(function(){
            $('body').append('<div id="anchorTitle" class="anchorTitle"  ></div>');
            $('td[title!=""]').each(function() {

                      var a = $(this);

                      a.hover(
                          function() {
                              hideAnchorTitle();
                              showAnchorTitle(a, a.data('title'));
                              a.css("background-color","orange");
                              a.css("cursor","pointer");
                          },
                          function() {
                              //hideAnchorTitle();
                              a.css("background-color","white");
                          }
                      )
                      .data('title', a.attr('title'))
                      .removeAttr('title');
                  }); 
            });   

            function showAnchorTitle(element, text) {

                var offset = element.offset();

                $('#anchorTitle')
                .css({
                    'top'  : (offset.top + element.outerHeight() + 4) + 'px',
                    'left' : offset.left + 'px'
                })
                .html(text)
                .show();

            }

            function hideAnchorTitle() {
                $('#anchorTitle').hide();
            }  
            function cerraImg(){
                $("#foto").slideUp("fast")
            }
            function verFoto(codigo){ 
                     var p = $("#spanfoto_"+codigo ); 
                     var h = $("#spanfoto_"+codigo ).height();
                     var tr = p.position();

                     $.ajax({
                     type: "POST",
                     url: "include/Ajax.class.php",
                     data: "action=get_code_image&codigo="+codigo+"",
                     async:true,
                     dataType: "html",
                     beforeSend: function(objeto){
                         $("#foto").html("<img src='images/search2.gif' height='22px' width='22px'   >"); 
                         //$("#foto").css("width","20%"); 
                         $("#foto").css("margin-left","50%");

                         $("#foto").slideDown("slow");  
                         $('#foto').animate({top: tr.top + 304 +"px",left: tr.left - 160+ "px" },{queue: false, duration: 150});
                     },
                     complete: function(objeto, exito){
                         if(exito=="success"){
                            $("#foto").html('<div style="text-align:center;width:314px;height:20px">   <div style="text-align:left;float:left;width:90%"><b>&nbsp;Codigo: </b>'+codigo+'</div>  <div style="width:10%;float:right"><img style="cursor:pointer"  src="images/12-em-cross.png" onclick="cerraImg()"></div>  </div> <div>    <img src="prod_images/'+objeto.responseText+'" height="260px" width="314px" ></div>');  
                            $("#foto").click(function(){
                                $("#foto").slideUp("fast");
                            });
                         }
                     }
                   });
            } 
            
    function checkTipo(procesado){
       var tipo = $("input[name='radio_tipo']:checked").val();
       if(tipo == 'Minorista'){
          $("#urge").attr("checked",true);     
       }    
        //var urgente = $("input[name='radio_urge']:checked").val();
    }    
    function addToCart(codigo,metros, sucd,path,procesado,ignorar){ 
        var usuario = $("#usuario").val(); 
        var suco = $("#suc").val(); 
        
        if(suco == sucd){
            alert("Esta tratando de pedir una pieza que se encuentra en su propia Sucursal!"); 
            return;
        }
        var check_pr = '';
        if(sucd =='PR'){
             check_pr = 'checked';  
        }    
        var limitacion = ""; 
         
        if(procesado < 1){
            limitacion = "<label style='background:orange;padding:8px;margin-botom:10px;'> <img src='images/dialog-warning.png' height='46px' width='46px'> Solo esta permitido pedido Mayorista o Minorista Urgente! </label>";  
        }        
        var pedidos_encontrados = 0;
        
            
        if( (jQuery.inArray( codigo, lista ) > -1) && ignorar ){
           alert("Este codigo ya ha sido agregado al carrito!"); 
        }else{    
          
           $("#td_img_"+codigo).html("<img src='images/working.gif' >");
           var html = $(current_element).attr("title"); 
           $(current_element).attr("title",html);
           
           var cab = '<img  onclick="cerrarPopup()" style="float:right;cursor:pointer;" src="images/12-em-cross.png" />';
           var leyenda = "El codigo "+codigo+" se agregará al Pedido Nº:  ";
           var pedidos = "";
           $('.pedido').each(function(){ 
                var nro_pedido =  $(this).attr("id").substring(7,30);
                var destino = $.trim($("#destino_"+nro_pedido).html());
                if(destino == sucd){
                   pedidos_encontrados++; 
                   pedidos+=" <label>"+nro_pedido+"</label><input type='radio' value="+nro_pedido+" name='radio_nro_pedido' checked>  destino: ("+ sucd +")";
                } 
           });  
           if(pedidos_encontrados > 0){
               
               if(pedidos_encontrados > 1){   leyenda = "Elija el Nº de pedido en el cual desea insertar el codigo: "+codigo+"  ";   }
               leyenda = cab+"<br>"+leyenda;
               pedidos+="<br><br><label>Cantidad en Stock :</label><input type='text' id='stock' value='"+metros+"' style='text-align:right' readonly size='8'><label>&nbsp;Cantidad a Pedir:</label><input type='text' id='metros_pedir' value='"+metros+"' style='text-align:right'   size='8'> <span id='msg'></span>  \n\
               <br><br><label>Tipo de Pedido:&nbsp;&nbsp;&nbsp;&nbsp; Minorista</label><input type='radio' value='No' id='minorista' name='radio_tipo' onclick='checkTipo("+procesado+")' checked>&nbsp;&nbsp;\n\
                          <label>Mayorista</label><input type='radio' value='Si' id='mayorista' name='radio_tipo' onclick='checkTipo("+procesado+")'> &nbsp;<label>Agregar al Carrito del Proveedor</label> <input type='checkbox' id='proveedor' "+check_pr+">  ";
               pedidos+="<br><br><label>¿Es un pedido Urgente?&nbsp;&nbsp;&nbsp;&nbsp;  No</label><input type='radio' value='No' name='radio_urge' onclick='checkTipo("+procesado+")' checked>&nbsp;&nbsp;\n\
                         <label>Si</label><input type='radio' id='urge' value='Si' name='radio_urge' onclick='checkTipo("+procesado+")'>";   
               pedidos+="<br><br><input type='button' id='boton_agregar' value='Agregar al Carrito' onclick='agregarAlCarrito("+codigo+","+metros+")'> ";
               
               leyenda+=pedidos;
                
               var img_leyenda = "<div style='text-align:center'>"+limitacion+"</div><div style='float:left;text-align:center;width:15%' > \n\
                                    <div class='marco_img' style='width:124px; height:144;font-size:15px' id='div_imagen_"+codigo+"'><img src="+path+" id='imagen_"+codigo+"' width='114' height='120' style='border:solid gray 2px;margin:2px;font-size:12px'>"+codigo+"</div>\n\
                                  </div><div style='float:right;width:85%'>"+leyenda+"</div>";               
               abrirPopup(img_leyenda); 
               $('#proveedor').click(function() {
                  if ($(this).is(':checked')) {
                     $("#msg").html("<label>Preparando carrito del proveedor...</label> <img src='images/working.gif' >"); 
                     addToCart(codigo,metros, 'PR',path,procesado,ignorar); 
                  }
               });   
               checkTipo(procesado); 
           }else{
              $("#carrito").append(   $('<table  cellpadding="0" cellspacing="0" border="1" style="width: 100%;background:#E0EEEE ">').load("include/Ajax.class.php",{usuario:usuario, suco:suco, sucd:sucd, action:"generar_pedido_img"},function(){
                  addToCart(codigo,metros,sucd,path,procesado,false);
                    //$("<div><img src="+path+" width='48' height='48'>"+codigo+"</div>").appendTo("#detalle_remito_46623");
              }));
           }
           
        }
    }
    
    function agregarAlCarrito(codigo,stock){
         var nro_pedido = $("input[name='radio_nro_pedido']:checked").val();
         var mayorista = $("input[name='radio_tipo']:checked").val();
         var urgente = $("input[name='radio_urge']:checked").val();
         var metros = $("#metros_pedir").val();
         
         if(metros > stock &&  !$('#proveedor').is(':checked')  ){
            alert("Esta haciendo un pedido mayor a la disponibilidad de esta pieza = a: "+stock); 
            return;
         }
         lista.push(codigo);
         $("#boton_agregar").attr("disabled",true);
         $("#div_imagen_"+codigo).effect('scale', {scale:'content',percent:50}, 1);
         $("#imagen_"+codigo).css({'width' : '48px' , 'height' : '48px','border':'0px'});
        

        $.ajax({
            type: "POST",
            url: "include/Ajax.class.php",
            data: "action=pedido_det_ins&nro_pedido="+nro_pedido+"&codigo="+codigo+"&cant="+metros+"&urge="+urgente+"&mayorista="+mayorista,
            async:true,
            dataType: "html",
            beforeSend: function(objeto){
                $("#msg").html("<label>Agregando al carrito...</label> <img src='images/working.gif' >"); 
            },
            complete: function(objeto, exito){
                  if(exito=="success"){        
                      $("#msg").html("<label>Codigo agregado al carrito...</label> <img src='images/ok.png' >"); 
                      var img = $("#div_imagen_"+codigo).html();
                      
                      $("#detalle_remito_"+nro_pedido).append("<div class='micro_img'>"+img+"</div>");
                      $("#div_imagen_"+codigo).html("<img src='images/ok.png'>");
                      //$("#div_imagen_"+codigo).animateTo('appendTo', "#detalle_remito_"+nro_pedido);
                       $("#imagen_"+codigo).css({'width' : '48px' , 'height' : '48px','border':'0px'});
                      $("#td_img_"+codigo).html("<img src='images/ok.png'>");
                      setTimeout("cerrarPopup()",2500);
                  }
                }
            });
        
    }
    function enviarPedido(nro_pedido){
        
        var detalle = $("#detalle_remito_"+nro_pedido).children().length;
        //$("#detalle_remito_"+nro_pedido).children().length
        
        if(detalle > 0){
         $.ajax({
            type: "POST",
            url: "include/Ajax.class.php",
            data: "action=enviar_pedido&nro_pedido="+nro_pedido+"",
            async:true,
            dataType: "html",
            beforeSend: function(objeto){
                $("#detalle_remito_"+nro_pedido).html("<label>Enviendo pedido...</label> <img src='images/working.gif' >"); 
            },
            complete: function(objeto, exito){
                  if(exito=="success"){        
                       $("#pedido_"+nro_pedido).parent().parent().children().fadeOut("slow");          
                  }
                }
            });    
         
        }else{   
             alert("Debe cargar al menos un producto para poder enviar su pedido!"); 
        }
    }    
        function abrirPopup(obj){   
            $("#message").html( obj );
            $("#message").animate({ opacity:100 }, 2000);  
        }
   
        function cerrarPopup(){   
            $("#message").html('<img  onclick="cerrarPopup()" style="float:right;cursor:pointer;" src="images/12-em-cross.png" />');
            $("#message").animate({ opacity:0 }, "fast");    
        }
          
        $(window).scroll(function(){
             $('#message').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
        });      
      </script>    
<!-- end:   general_header -->


<!-- begin: start_query0 -->
<div id="message" class="message"  style="opacity:0;" >  <img  onclick="cerrarPopup()" style="float:right;cursor:pointer;" src="images/12-em-cross.png" />  </div>
<input type="hidden" id="usuario" value="{user}">
<input type="hidden" id="suc" value="{suc}">

<div id="foto" class="obs"></div>
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
			style="font-weight: bold;"><big>Reporte de Abastecimiento</big></td>
		  <td style="text-align: center;">
                        <fieldset style="border:solid gray 1px"><legend>Leyendas</legend>
                            <img src="images/bien.png"   title="Procesado por Produccion"> &nbsp;&nbsp;  <img src="images/nopic.png" width="24px" height="26px" title="No Procesado por Produccion"> &nbsp;&nbsp; <img src="images/carrito0.png" title="En nota de Pedido"> &nbsp;&nbsp; <img src="images/truck.png" title="En  nota de remision">
                       </fieldset>                         
		  </td>
		</tr>
                
                <tr> <th></th><th style="text-align: center"><b>Temporada:</b>{sup_temporada}&nbsp; &nbsp; &nbsp; Suc.: {sup___suc}</th>
                    <th>
                       <small><small>{user} - {time}</small></small>
                    </th>
                </tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th>Sector</th>
        <th>Grupo</th>
        <th>Tipo</th>
        <th>Color</th>
        <th>Cant.Min</th>
        <th>Stock Actual</th>
        <th>Stock Almacenado</th>
         
        <th style="width:26%" rowspan="18">Pedidos</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr>
            <td class="item">{query0_sector}</td>
            <td class="item">{query0_grupo}</td>
            <td class="item">{query0_tipo}</td>
            <td class="item">{query0_color}</td>
            <td class="num">{query0_cant_min}</td>
            <td class="num">{query0_stock_actual}</td>
            <td class="num deposito"  title="{stock_dep}"  >{query0_stock_deps}</td> 
            {remitos}
         </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr>
            <td colspan="2"><b>Cant.:</b>{cant}/{cant_all}&nbsp;&nbsp;<b>Abastecido:</b>{abasto}</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->



<!-- begin: remisiones_cab -->
<div id="contenedor_de_remitos">
<table style="width:100%">
   <tr> 
       <td style="width:100%;text-align: center"> 
          <img src="images/shopping_cart.png" > 
          <div id="carrito" style="min-height: 300px;height: auto" >
<!-- end:    remisiones_cab -->

<!-- begin: remisiones_data -->
 
<!-- end:    remisiones_data -->

<!-- begin: remisiones_foot noeval-->
            </div>
       </td>
       </tr>
  </table>  
 </div>   

<script>
 var html = $("#contenedor_de_remitos").html();
 $("#remitos").html(html);
  $("#contenedor_de_remitos").html("");
</script>
<!-- end:    remisiones_foot -->


<!-- begin: rtable -->
<table cellpadding="0" cellspacing="0" border="1" style="width: 100%;background:#E0EEEE ">
    <tr style="background: whitesmoke"> <th>Nro</th> <th>Fecha</th> <th>Usuario</th> <th>Destino</th> </tr>
    <tr> <td class="itemc pedido" id="pedido_{nro}">{nro}</td> <td class="itemc">{fecha}</td> <td class="itemc">{usuario}</td> <td class="itemc" id="destino_{nro}">{destino}</td> </tr>
    <tr><td colspan="4" style="min-height: 40px" id="detalle_remito_{nro}" > 
    
<!-- end:    rtable -->

<!-- begin: table_data -->

<div class="micro_img"><img src="{d_src}" width="48" height="48">{d_cod}</div>

<!-- end:    table_data -->

<!-- begin: rtableend -->
        </td></tr>
    <tr><td colspan="4" style="text-align: center"> <input type="button" value="Enviar Pedido" id="boton_enviar" onclick="enviarPedido({nro})" style="font-size: 10px "> </td></tr>
</table>
<br>
<!-- end:    rtableend -->