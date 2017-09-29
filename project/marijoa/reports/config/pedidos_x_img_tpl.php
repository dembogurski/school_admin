<!-- 
    Report Template File (pedidos_x_img)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
       <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
       <link rel="stylesheet" type="text/css" href="templates/jquery-ui.css" /> 
         <script type="text/javascript" src="include/jquery-1.4.3.min.js" > </script>   
         
         <script type="text/javascript" src="include/jquery-ui.js" > </script>   
    	  
        
       
       
       <!-- Fancy Box-->

        <!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="include/jquery.fancybox-1.3.2.js"></script>
	<link rel="stylesheet" type="text/css" href="templates/jquery.fancybox-1.3.2.css" media="screen" />
        
       
	<treset_page>
<style type="text/css">
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
	margin:2px;
	border: 1px solid gray;
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
 .anchorTitle {
                /* border radius */
                -moz-border-radius: 0px 8px 8px 0px;
                -webkit-border-radius: 8px;
                border-radius: 8px;
                /* box shadow */
                -moz-box-shadow: 2px 2px 3px #e6e6e6;
                -webkit-box-shadow: 2px 2px 3px #e6e6e6;
                box-shadow: 2px 2px 3px #e6e6e6;
                /* other settings */
                background-color: #fff;
                border: solid 3px orange;
                border-left: solid 3px #BDBDBD;
                color: #333;
                display: none;
                font-family: Helvetica, Arial, sans-serif;
                font-size: 13px;
                min-height: 67px;
                line-height: 1.3;
                max-width: 200px;
                padding: 5px 7px;
                position: absolute;
            }
            * html #anchorTitle {
                /* IE6 does not support max-width, so set a specific width instead */
                width: 500px;
            }    
      //#draggable { width: 100px; height: 100px; padding: 0.5em; float: left; margin: 10px 10px 10px 0;border:solid black 1px }
      #carrito {
          width: 100%; 
          height: 100%;
          padding: 0; 
          float: right;
          border:solid black 1px
      }     

      .carrito img:hover { 
         border:1px solid gray;
         cursor:pointer;
      }    
 
</style>    

<script> 
    var x = 0;
    var current_element = '';
    var lista = new Array();
function ready(){ 
        $("a[rel=example_group]").fancybox({
		'transitionIn'		: 'none',
		'transitionOut'		: 'none',
		'titlePosition' 	: 'outside',
		'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
                    return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
			}
		}); 
                $(".fancybox").css("text-decoration","none").css("color","lightgray");  
                
                $(".marco_img").mouseenter(function(){
                    var codigo = $(this).attr("id"); 
                    hover(codigo);
                }).mouseleave(function(){ 
                    var codigo = $(this).attr("id"); 
                    out(codigo); 
                }); 
                $("#contenedor_imagenes").mouseleave(function(){
                    out("todos"); 
                }); 
                
                // Titles de ayuda
                

                $('img[title!=""]').each(function() {

                    var a = $(this);

                    a.hover(
                        function() {
                            showAnchorTitle(a, a.data('title'));
                        },
                        function() {
                            hideAnchorTitle();
                        }
                    )
                    .data('title', a.attr('title'))
                    .removeAttr('title');
                });                
   }            
  
    function loading(){ 
        $("#loader").attr("style","visibility:hidden");
    }
    function buscarGrupo(){
        $("#loader").attr("style","visibility:visible");
        var sector = $("#sector option:selected").val();		
        $("#grupo").load("include/Ajax.class.php",{action:"obtener_grupo_o_tipo_x_sector",dato:sector,campo:"p_grupo"},function(){  checkSelect;loading(); });
    }
    function buscarTipo(){
        $("#loader").attr("style","visibility:visible");
        var grupo = $("#grupo option:selected").val();		
        $("#tipo").load("include/Ajax.class.php",{action:"obtener_grupo_o_tipo_x_sector",dato:grupo,campo:"p_tipo"},function(){checkSelect; loading();});
    } 
    function buscarColores(){
        $("#loader").attr("style","visibility:visible");
        var sector = $("#sector option:selected").val();	
        var grupo = $("#grupo option:selected").val();	
        var tipo = $("#tipo option:selected").val();	
        $("#colores").load("include/Ajax.class.php",{action:"obtener_colores_x_grupo_o_tipo_x_sector",sector:sector,grupo:grupo,tipo:tipo},function(){checkSelect; loading();});
    }
	function buscarSucursales(){
		$("#loader").attr("style","visibility:visible");
        var sector = $("#sector option:selected").val();	
        var grupo = $("#grupo option:selected").val();	
        var tipo = $("#tipo option:selected").val();	
		var color = $("#colores option:selected").val();	
        $("#sucursales").load("include/Ajax.class.php",{action:"obtener_suc_x_colores_x_grupo_o_tipo_x_sector",sector:sector,grupo:grupo,tipo:tipo,color:color},function(){checkSelect; loading();});
	}
    var checkSelect = function(){
            var a = $("#sector option:selected").index();
            var b = $("#grupo option:selected").index();
            var c = $("#tipo option:selected").index();
            //alert("a: "+a+" b: "+b+" c: "+c);
            if((a==0||b==0||c==0)){
                    $("#obtener_datos").attr("disabled",true);
            }else{
                    $("#obtener_datos").attr("disabled",false);
                    buscarColores();
            }
    };    
    function go(){
        $("#loader").attr("style","visibility:visible");
	var sector = $("#sector option:selected").val();
	var grupo = $("#grupo option:selected").val();
	var tipo = $("#tipo option:selected").val();
    var color = $("#colores option:selected").val();
	var sucursal = $("#sucursales option:selected").val();
	var fp = $('input[name=fdp]:radio:checked').val();
        //hideAnchorTitle();
           
	$("#imagenes").load("include/Ajax.class.php",{sector:sector, grupo:grupo, tipo:tipo,color:color,suc:sucursal, fp:fp, action:"obtener_lista_imagenes"},function(){
            ready();
	    $("#loader").attr("style","visibility:hidden");
        }); 
       
    }
    function zoom(img, descrip){
        var option ="titlebar=off, toolbar=off, location=off, directories=off, status=off, menubar=off, scrollbars=yes, resizable=yes, width=720, height=640 ";
        var g  = window.open("","_blank",option);
        g.document.write("<img src='"+img+"' ><br><p>"+descrip+"</p>");
    }
    function hover(codigo){
        var offset = $("#"+codigo).offset();
        $('#add_'+codigo).css({
                    'top'  : (offset.top + 136 ) + 'px',
                    'left' : offset.left +140+ 'px'
                }).fadeIn("fast");
         out(codigo);        
    }
    function out(codigo){
      $('.marco_img').each(function(){ 
          var cod = $(this).attr("id");
          
          if(codigo == cod){
              //console.log("cod"+cod+"  "+codigo); 
          }else{
             $('#add_'+cod).fadeOut("fast");    
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
         $("#div_imagen_"+codigo).effect('scale', {scale:'content',percent:50}, 1000);
         

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
                      $("#div_imagen_"+codigo).animateTo('appendTo', "#detalle_remito_"+nro_pedido);
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
                $("#detalle_remito_"+nro_pedido).html("<label>Enviendo pedido...</label> <img src='images/working.gif' />"); 
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

            function showAnchorTitle(element, text) {

                var offset = element.offset();

                $('#anchorTitle')
                .css({
                    'top'  : (offset.top + element.outerHeight() + 4) + 'px',
                    'left' : offset.left +10+ 'px'
                })
                .html(text)
                .show();

            }

            function hideAnchorTitle() {
                $('#anchorTitle').hide();
            }      
            $.fn.animateTo = function(appendTo, destination, duration, easing, complete) {
              if(appendTo !== 'appendTo'     &&
                 appendTo !== 'prependTo'    &&
                 appendTo !== 'insertBefore' &&
                 appendTo !== 'insertAfter') return this;
              var target = this.clone(true).css('visibility','hidden')[appendTo](destination);
              this.css({
                'position' : 'relative',
                'top'      : '0px',
                'left'     : '0px'
              }).animate({
                'top'  : (target.offset().top - this.offset().top)+'px',
                'left' : (target.offset().left - this.offset().left)+'px'
              }, duration, easing, function() {
                target.replaceWith($(this));
                $(this).css({
                  'position' : 'static',
                  'top'      : '',
                  'left'     : ''
                });
                if($.isFunction(complete)) complete.call(this);
              });
            }
    
        function abrirPopup(obj){   
            $("#message").html( obj );
            $("#message").show(2000);  
        }
   
        function cerrarPopup(){   
            $("#message").html('<img  onclick="cerrarPopup()" style="float:right;cursor:pointer;" src="images/12-em-cross.png" />');
            $("#message").hide();
        }
          
        $(window).scroll(function(){
             $('#message').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
        });  
         
     $(document).ready(function() {  
        $('body').append('<div id="anchorTitle" class="img_title"></div>');
     }); 
</script>    
<!-- end:   general_header -->



<!-- begin: start_query0 -->
<div id="message" class="message"  style="display:none" >  <img  onclick="cerrarPopup()" style="float:right;cursor:pointer;" src="images/12-em-cross.png" />  </div>
<input type="hidden" id="usuario" value="{user}">
<input type="hidden" id="suc" value="{suc}">


<div id="dialog" title="Basic dialog"></div> 


<table style="text-align: left; width: 99%; background-color: beige;" border="1" cellpadding="0" cellspacing="0">
    <tbody>
    <thead>
<tr> <td colspan="50"> 
	<table style="text-align: left; width: 100%;background: #CAE1FF" border="0"
	 cellpadding="0" cellspacing="0">
	  <tbody>
		<tr >
		  <td style="width: 20%;height:40px;">*</td>
                  <td style="text-align: center;width: 60%;" rowspan="2"> <img src="images/galeria.png" >  </td>
		  <td style="text-align: right;">
			<tpage><b>Pag: </b></tpage></td>
		</tr>
		<tr>
		  <td  style="width: 20%;">
			<small><small>ycube plus RAD [1.2.31]</small></small>
		  </td>
		  
		  <td style="text-align: right;height:46px">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
	  </tbody>
	</table> 
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <!--
        <th>Sector</th>
        <th>Grupo</th>
        <th>Tipo</th>
    </tr> -->
</thead>
<tfoot>
	<tr><td colspan="50"> </td></tr>
</tfoot>
<!-- end:   header0 -->

 

<!-- begin: query0_data_row -->
         <tr>
             <td style="width: 100%;text-align: center;padding: 6px 2px 4px 2px" colspan="2">
                  
                <fieldset><legend>Sector</legend><select id="sector" style="min-width:140px" onchange="buscarGrupo()">
                  <option selected>---Seleccione Uno---</option>      
                  {sector_options}
                </select>
                </fieldset>
                <fieldset><legend>Grupo</legend>
                    <select id="grupo" onchange="buscarTipo()" style="min-width:180px">   </select> </fieldset> 
                 <fieldset><legend>Tipo</legend> <select id="tipo" onchange="checkSelect()" style="min-width:180px" ></select>  </fieldset>
                 <fieldset><legend>Color</legend> <select id="colores" onchange="buscarSucursales()" style="min-width:180px" ></select>  </fieldset>
                 <fieldset><legend>Suc</legend> <select id="sucursales" ></select>  </fieldset>
                 <fieldset><legend>Incluir FP</legend>
                      <label>No</label><input type="radio" name="fdp" value="No" checked>
                      <label>Si</label><input type="radio" name="fdp" value="Si"  >
                </fieldset>
                 <fieldset><legend>Consulta</legend><input id="obtener_datos" onclick="go()" disabled style="z-index:100" type="button" value="   Go!  "/></fieldset>
                <fieldset > 
                   <img id="loader" height="28px" width="28px" src="images/loader.gif" style="visibility: hidden" />
                </fieldset>
                 <fieldset style="border:solid gray 1px"><legend>Leyendas</legend>
                     <img src="images/big_ok.png" width="26px" height="26px" title="Procesado por Produccion"> &nbsp;&nbsp;  <img src="images/nopic.png" width="24px" height="26px" title="No Procesado por Produccion"> &nbsp;&nbsp; <img src="images/carrito0.png" title="En nota de Pedido"> &nbsp;&nbsp; <img src="images/truck.png" title="En  nota de remision">
                </fieldset>
                
                 
            </td>
         </tr>
<!-- end:    query0_data_row -->

 


<!-- begin: remisiones_cab -->
   <tr>
       <td style="height: 100px;vertical-align: top" id="contenedor_imagenes" >
           <div id="imagenes" style="padding-left: 8px;width:100%" ></div>     
       </td>
       <td style="width:20%"> 
          <img src="images/shopping_cart.png" > 
          <div id="carrito" style="min-height: 300px;height: auto" >
<!-- end:    remisiones_cab -->

<!-- begin: remisiones_data -->
 
<!-- end:    remisiones_data -->

<!-- begin: remisiones_foot -->
            </div>
       </td>
       </tr>
<!-- end:    remisiones_foot -->


<!-- begin: query0_subtotal_row -->
        
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
 

    </tbody>
</table>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<!-- end:   end_query0 -->

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