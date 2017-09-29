<!-- 
    Report Template File (pedido_internac)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
       <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
       <script type="text/javascript" src="include/jquery.js"></script>
	<treset_page>
            
<style type="text/css">
    .texto{
        width: 100%;
        border:solid 0px white; 
        font-size:11px;
        text-align: right
    } 
 .anchorTitle {
                /* border radius */
                -moz-border-radius: 0px 8px 0px 8px;
                -webkit-border-radius: 8px;
                border-radius: 0px 8px 0px 8px;
                /* box shadow */
                -moz-box-shadow: 2px 2px 3px #e6e6e6;
                -webkit-box-shadow: 2px 2px 3px #e6e6e6;
                box-shadow: 2px 2px 3px #e6e6e6;
                /* other settings */
                background-color: #fff;
                border: solid 3px orange;
                color: #333;
                display: none;
                font-family: Helvetica, Arial, sans-serif;
                font-size: 12px;
                line-height: 1.3;
                max-width: 500px;
                padding: 5px 7px;
                position: absolute;
                margin-top: -3px;
            }
            * html #anchorTitle {
                /* IE6 does not support max-width, so set a specific width instead */
                width: 300px;
            }

</style>   
                
</style>            

<script language="javascript">
    function recargar(url){ 
       // var lim = $("#c_limite").val(); 
       window.location.href = url+"&c_limite="+50+""; 
    }
$(document).ready(function() {

                $('body').append('<div id="anchorTitle" class="anchorTitle"></div>');

                $('[title!=""]').each(function() {

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
               
    
    function setPond(id,id_pond_md5_ruc,name,md5_fgtc){ 
                 
         var pond = $("input[name='"+name+"']").val();
         
         if(pond < 0 || pond > 1  ){
             alert("Debe ingresar un valor entre 0 y 1");
             return;
         }
         
         // Establece la Ponderacion para este Cliente y Multiplica por la Cantidad para Calcular la Nueva Cantidad Ponderada
         $('[id^='+id_pond_md5_ruc+']').each(function(){ 
              var cant = $(this).parent().prev().children().val();  // $(this).parent().prev().css("background","lightblue"); 
              
              $(this).val(pond); 
              var cant_pond = (cant * pond).toFixed(2);;
              
              $(this).parent().next().children().val(cant_pond); // Cant Ponderada
              
              var precio = $(this).parent().next().next().next().children().val();
              
              /*      
              if(precio > 0){
                  $(this).parent().next().next().next().children().css("border","solid red 1px");
              }else{
                  $(this).parent().next().next().next().children().css("border","solid white 1px");
              } 
              */ 
              if(pond > 0 && precio > 0){   // Si ponderacion y precio > 0
                  guardar(id,pond,cant_pond,precio);
              }else{
                 //console.log("Debe establecer el Precio");
              } 
        }); 
        // 
        
          // Recorrer todas las sumas Ponderadas 
         
         
        
         $('[id^=subtotal_total_cant_pond_]').each(function(){ 
             var cp = parseFloat($(this).val());   
             var clase = this.id.substring(25, 100); 
             sumarCantPond(clase,this);
         }); 
         
        
        
        
    }
    function sumarCantPond(clase,id_subtotal){
        var suma_ponderada = 0;
        
        $('.cant_pond_'+clase).each(function(){ 
             var cp = parseFloat($(this).val());   
             suma_ponderada += cp; 
        });
        $(id_subtotal).val(suma_ponderada);
        
    }
    
    function setPrecio(name, md5_sgt){ 
        var precio =  $("input[name='"+name+"']").val(); 
        $('[id^='+md5_sgt+']').each(function(){
           // Pongo el precio a todos los del mismo Sector Grupo y Tipo 
           $(this).val(precio);   
        });
        var id =  name.substring(3,20);
        
        var pond = $("input[name='"+name+"']").parent().prev().prev().prev().children().val();
        var cant_pond = $("input[name='"+name+"']").parent().prev().prev().children().val();
         
        guardar(id,pond,cant_pond,precio);
    }
    
 function guardar(id,pond,cant_pond,precio){
     $.ajax({
                type: "POST",
                url: "include/Ajax.class.php",
                data: "action=actualizar_detalle_pedido&id="+id+"&pond="+pond+"&cant_pond="+cant_pond+"&precio="+precio,
                async:true,
                dataType: "html",
                beforeSend: function(objeto){ 
                    $("#msg_"+id).html("<img src='images/activity.gif'>");    //alert(id+" "+pond+" "+cant_pond+" "+precio);
                },
                complete: function(objeto, exito){ 
                    if(exito=="success"){ 
                        $("#msg_"+id).html("<img src='images/ok.png'>" ); 
                    }
                }
            }
        )        
 } 
 function checkCf(obj){
    var cant_final = parseFloat($(obj).val()); 
    if(cant_final == 0){
      calcularValor(obj);
    }    
 }
 function calcularValor(obj){
     var cant_final = parseFloat($(obj).val()); 
     var precio = $(obj).parent().next().children().val();
     if(precio < 0.01 && cant_final > 0){
        alert("Debe especificar el Precio Estimado...");    
     }    
     $(obj).parent().next().next().children().val(  (precio * cant_final).toFixed(2));
     
     var stock =  parseFloat($(obj).parent().prev().prev().prev().prev().prev().children("input").val());
    
     var cant_pond = parseFloat($(obj).parent().prev().children("input").val().replace(".",""));  
     
     /*
     var diff_pedido_stock = cant_final + stock;  
     
         
     var diff =  ( diff_pedido_stock -  cant_pond ).toFixed(2)  ; 
     $(obj).parent().prev().prev().prev().prev().children("input").val( diff );
          
     
     if(diff < 0   ){
         $(obj).parent().prev().prev().prev().prev().children("input").css("border","solid red 1px");
     }else{
         $(obj).parent().prev().prev().prev().prev().children("input").css("border","solid black 1px");
     }*/
     
     // Guardar el Resumen del Pedido
    var nro_pedido = $("#nro_pedido").val();
    
    var sector = $(obj).parent().prev().prev().children(".sector").val();
    var grupo = $(obj).parent().prev().prev().children(".grupo").val();
    var tipo = $(obj).parent().prev().prev().children(".tipo").val();
    var color = $(obj).parent().prev().prev().children(".color").val();
     
    
     
    $.ajax({
                type: "POST",
                url: "include/Ajax.class.php",
                data: "action=actualizar_resumen_pedido&nro_pedido="+nro_pedido+"&cant_final="+cant_final+"&precio_est="+precio+"&sector="+sector+"&grupo="+grupo+"&tipo="+tipo+"&color="+color,
                async:true,
                dataType: "html",
                beforeSend: function(objeto){ 
                   $(obj).parent().next().next().next().html("<img src='images/activity.gif'>");    //alert(id+" "+pond+" "+cant_pond+" "+precio);
                },
                complete: function(objeto, exito){ 
                    if(exito=="success"){ 
                        $(obj).parent().next().next().next().html("<img src='images/ok.png'>");
                    }
                }
            }
        )  
     
         
 }


</script>
<!-- end:   general_header -->


<!-- begin: start_query0 -->

<input type="hidden" id="nro_pedido" value="{nro_pedido_int}">

<table style="text-align: left; width: 99%;" border="1" cellpadding="0" cellspacing="0">
    <tbody>
    <thead>
<tr> <td colspan="50"> 
	<table style="text-align: left; width: 100%;" border="1"
	 cellpadding="0" cellspacing="0">
	  <tbody>
		<tr>
                    <td style="width: 20%;height:40px;">&nbsp;N&deg;:{sup_nro_pedido_int}</td>
		  <td style="text-align: center;width: 60%;">
			<b>Marijoa</b></td>
		  <td style="text-align: right;">
			<tpage><b>Pag: </b></tpage></td>
		</tr>
		<tr>
		  <td  style="width: 20%;">
			<small><small>&nbsp;ycube plus RAD [1.2.31]&nbsp;</small></small>
		  </td>
		  <td style="text-align: center;"><big
			style="font-weight: bold;"><big>Nota de Pedido de Compra Internacional</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}&nbsp;</small></small>
		  </td>
		</tr>
                  <tr>
                    <td colspan="3">
                    <div style="text-align: center"> 
                            <a href="{ant}" target="_blank" title="Anterior"><img src="images/arrow-left.png" border="0" style="margin-bottom: 1px"><a> 
                                    &nbsp; &nbsp; &nbsp; &nbsp;   <a title="Recargar" href=javascript:recargar("{actual}")><img src="images/reload.png" border="0"  style="margin-bottom: 1px"><a>
                                            &nbsp; &nbsp; &nbsp; &nbsp;   <a title="Siguiente" href="{sig}" target="_blank"><img src="images/arrow-right.png" border="0"  style="margin-bottom: 1px"><a>  
                    </div> 
                        <div style="text-align: center">Mostrando   {inicio} &#8594; {fin} registros</div>                
                    </td>
                  </tr>
	  </tbody>
	</table>
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
<tr  > 
        <th>Usuario</th>
        <th>Suc</th>
        <th>RUC</th>
        <th>Cliente</th>
        <th>Sector</th>
        <th>Grupo</th>
        <th>Tipo</th>
        <th>Color</th>
        <th>Cant. Ped. </th>
        <th>Pond.</th>
        <th>Cant. Pond.</th>
        <th>Cant. Final</th>
        <th>PrecioEst</th>
        <th>Valor</th>
        <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->
  
     <!-- <td>{query0_id}</td>   -->
  
  
<!-- begin: query0_data_row -->
         <tr id="tr_{query0_id}" >  
            <td class="item" {estilo}>{query0_Usuario}</td>
            <td class="itemc" {estilo}>{query0_Suc}</td>
            <td class="item" {estilo}>{query0_RUC}</td>
            <td class="item" title="{obs}" {cli} > {query0_Cliente}</td>
            <td class="item" {estilo}>{query0_Sector}</td>
            <td class="item" {estilo}>{query0_Grupo}</td>
            <td class="item" {estilo}>{query0_Tipo}</td>
            <td class="item" {estilo}>{query0_Color}</td>
            <td class="num"><input type="text" class="texto" size="6" title="{obs}" value="{query0_Cant}" readonly id="cant_{md5_ruc}"  >  </td>
            <td class="num"><input type="text" class="texto" size="6" value="{query0_Ponderacion}" style="background: #F5F5DC;" name="pond_{query0_id}" id="pond_{md5_ruc}" onchange=setPond("{query0_id}",this.id,"pond_{query0_id}","{md5_sgtc}")></td>
            <td class="num"><input type="text" class="texto cant_pond_{md5_sgtc}"  size="6" value="{query0_Cant_Pond}" readonly    ></td> 
            <td class="num"></td> 
            <td class="num"> <input type="text" class="texto" size="10" style="background: #F5F5DC;" name="pe_{query0_id}" id="pe_{md5_sgt}" onchange=setPrecio("pe_{query0_id}","pe_{md5_sgt}") value="{query0_PrecioEst}"> </td>
            <td class="num"></td>
            <td id="msg_{query0_id}"></td>
         </tr>
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
            <td class="num" style="font-size: 14;font-weight: bold">{total_cant}</td>            
            <td></td>
            <td class="num" style="font-size: 14;font-weight: bold" id="total_cant_pond">{total_cant_pond}</td>  
            <td></td>
            <td class="num" style="font-size: 14;font-weight: bold" id="total_valor">{total_valor_estimado}</td>  
            <td></td>
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td></td> 
            <td></td> 
            <td></td>
            <td></td>
            <td></td>
            <td colspan="2"><b>Stock Actual:</b> {piezas} <b>Piezas </b>&nbsp; <input type="text" value="{stock_actual}" size="7" style="border: solid 1px black;text-align: center " readonly > Mts.    </td>            
            <td>{diff_label}<input type="text" value="{diff_sgtc}" size="7" style="{diff_style};text-align: center " readonly  title="(Cant. Pedida) - Stock" ></td>
            <td style="text-align: right;padding-right: 2px"><b>{subtotal_total_cant}</b></td>
            <td><input type="hidden" value="{query0_Sector}" class="sector">  <input type="hidden" value="{query0_Grupo}" class="grupo"> <input type="hidden" value="{query0_Tipo}" class="tipo"> <input type="hidden" value="{query0_Color}" class="color"> </td>
            <td style="text-align: right;padding-right: 2px"><input type="text" class="texto" size="6" style="font-weight: bolder;font-size: 14" value="{subtotal_total_cant_pond}"  id="subtotal_total_cant_pond_{md5_sgtc}" readonly >  </td>
            <td><input type="text" class="texto" size="6" style="font-weight: bolder;font-size: 14;background: #F5F5DC;padding-right: 2px;"  value="{cant_final_color}" onchange="calcularValor(this)" onblur="checkCf(this)"   id="cant_final_{md5_sgtc}" ></td>
            <td><input type="text" class="texto" size="10" style="font-weight: bolder;font-size: 14;padding-right: 2px" readonly  name="pe_{query0_id}" id="pe_{md5_sgt}" onchange="calcularValor(this)" value="{query0_PrecioEst}"></td>
            <td><input type="text" class="texto" size="10"  value="{valor_color}" style="font-weight: bolder;font-size: 14;padding-right: 2px;" readonly id="valor_{md5_sgtc}" > </td> 
            <td></td>
        </tr>
        <tr><td colspan="15" style="border: solid white 0px;height: 20px"></td> </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<div style="text-align: center"> 
                            <a href="{ant}" target="_blank" title="Anterior"><img src="images/arrow-left.png" border="0" style="margin-bottom: 1px"><a> 
                                    &nbsp; &nbsp; &nbsp; &nbsp;   <a title="Recargar" href=javascript:recargar("{actual}")><img src="images/reload.png" border="0"  style="margin-bottom: 1px"><a>
                                    &nbsp; &nbsp; &nbsp; &nbsp;   <a title="Siguiente" href="{sig}" target="_blank"><img src="images/arrow-right.png" border="0"  style="margin-bottom: 1px"><a>  
                    </div>
<!-- end:   end_query0 -->

