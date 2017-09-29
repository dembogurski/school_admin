<!-- 
    Report Template File (fact_cont)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
    <script type="text/javascript" src="include/jquery.js" > </script>
    
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

        width: 60%;
        height: auto;
        margin-top: 180px;
        margin-left: 20%;
        margin-right: 20%;  
    }
</style>
    
    <script>
      var nro_factura = 0;
    </script>
	<treset_page>

    <style>
    
    .sub{
       border-style: groove;
       border-width: 0px 0px 0px 0px;
        font-size:9px;
        font-family: serif;
     }
        
        
    .marco{
       border:solid 0px;
    }
    .curve{
        -moz-border-radius: 9px 9px 9px 9px;
         border:solid 1px;
         border-color: black black black black;
    }
    .curveb{
        -moz-border-radius: 9px 9px 9px 9px;
         border:solid 1px;
         border-color: gray black black black;
    }
    label{
        font-size:9px;
        font-family: serif;
    }

    .cab_det{
        font-size:9px;
        font-family:sans-serif;
    }
    .der_ab{
        border-style:solid;
        border-width: 0px 1px 1px 0px;      
    }
    .der{
        border-style:solid;
        border-width: 0px 1px 0px 0px;
    }
    .ab{
        border-style:solid;
        border-width: 0px 0px 1px 0px;
    }
    .item_num{
      text-align:right;
      padding-right:2px;
      font-size:9px;
      border-style:solid;
     border-width: 0px 1px 0px 0px;
    }
    .item{
      text-align:left;
      padding-left:3px;
      font-size:9px;
      border-style:solid;
      border-width: 0px 1px 0px 0px;
    }
    .subtotal{
        border-style:solid;
        border-width: 1px 1px 1px 0px;
        height:26px
    }

    </style>
    
    <script language="javascript">
 
        function anularFactura(nro){
            var motivo = prompt("Ingrese el motivo por el cual desea anular la Factura");
             
            if(motivo != "" && motivo != null){
                $.ajax({
                    type: "POST",
                    url: "include/Ajax.class.php",
                    data: "action=anular_factura&motivo="+motivo+"&nro_factura="+nro+"",
                    async:true,
                    dataType: "html",
                    beforeSend: function(objeto){
                      $("#anular").html("<b><small> Anulando Factura</small></b><br> &nbsp;&nbsp;&nbsp;<img src='images/activity.gif' height='12px' width='60px'>");
                       
                    },
                    complete: function(objeto, exito){
                        if(exito=="success"){ 
                            $("#anular").html( objeto.responseText  );
                        }
                    }
                }
            )
           }else{
              alert("Debe especificar un motivo para Anular la Factura"); 
           }    
            
        }
        
        function habilitarFactura(nro){
           var suc = $("#suc").val();  
           
           $.ajax({
                    type: "POST",
                    url: "include/Ajax.class.php",
                    data: "action=habilitar_factura&nro_factura="+nro+"&suc="+suc+"",
                    async:true,
                    dataType: "html",
                    beforeSend: function(objeto){
                      $("#habilitar").html("<b><small> Habilitando Factura...</small></b><br> &nbsp;&nbsp;&nbsp;<img src='images/activity.gif' height='12px' width='60px'>");
                      
                    },
                    complete: function(objeto, exito){
                        if(exito=="success"){ 
                            $("#habilitar").html( objeto.responseText  );
                        }
                    }
                }
            )
        }        
        function cerrar(){
           self:close();
        }
        function igualarNombres(){
           var nombre = $("#primer_nombre").val();		   
           $("#segundo_nombre").val(nombre);
            var ci = $("#primer_ci").val();
           $("#segundo_ci").val(ci);
        }
		function igualarFechas(){
           var nombre = $("#1ra_fecha").val();		   
           $("#2da_fecha").val(nombre);            
        }
        
        // Flotante
 
        function abrirPopup(obj){   
            $("#message").html( obj );
            $("#message").animate({ opacity:100 }, 2000);  
        }
   
        function cerrarPopup(){   
            $("#message").html('<img  onclick="cerrarPopup()" style="float:right;cursor:pointer;" src="images/12-em-cross.png" />');
            $("#message").animate({ opacity:0 }, "fast");    
        }
        function limpiar(){   
            $("#message").html('');	
            $("#message").animate({ opacity:0 }, "fast");    
        }
 
        $(window).scroll(function(){
             $('#message').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
        });
        
        function chekKey(e){             
         if (!e) var e = window.event; 
            if (e.keyCode) { 
                code = e.keyCode; 
            } else if (e.which) { 
                code = e.which; 
            }
            if(code == 121){
               var suc = $("#suc").val(); 
               $("#message").attr("onclick","");
                $.ajax({
                            type: "POST",
                            url: "include/Ajax.class.php",
                            data: "action=configuracion_impresion&suc="+suc+"",
                            async:true,
                            dataType: "html",
                            beforeSend: function(objeto){
                              abrirPopup("<img src='images/activity.gif' height='12px' width='60px'>");
                            },
                            complete: function(objeto, exito){
                                if(exito=="success"){ 
                                  abrirPopup(objeto.responseText  );
                                }
                            }
                        }
                    )
                 
            }   
         } 
        function edit(){
			if($(".ruc_cli").val() == "80005190-4"){
				$(".r_social").removeAttr("readonly");
			}		
         }
         function changeConfig(){
           var top = $("#top").val();
           var left = $("#left").val();
           var right = $("#right").val();
           var bottom = $("#bottom").val();
           $("#marco").css("margin-top",top);
           $("#marco").css("margin-left",left);
           $("#marco").css("margin-right",right);
           $("#marco").css("margin-bottom",bottom); 
         }
         function guardarParametros(){
           var top = $("#top").val();
           var left = $("#left").val();
           var right = $("#right").val();
           var bottom = $("#bottom").val();
           var suc = $("#suc").val();
           $.ajax({
					type: "POST",
					url: "include/Ajax.class.php",
					data: "action=guardar_parametros&suc="+suc+"&top="+top+"&left="+left+"&right="+right+"&bottom="+bottom,
					async:true,
					dataType: "html",
					beforeSend: function(objeto){
					  abrirPopup("<img src='images/activity.gif' height='12px' width='60px'>");
					},
					complete: function(objeto, exito){
						if(exito=="success"){ 
						   
						   alert(objeto.responseText );
						   //alert("Configuracion Guardada... Presione Control P para Imprimir...");
						   cerrarPopup();  
						}
					}
				}
			)
         }
        
       window.onkeyup = chekKey;
    </script>   
    
        
    <div id="message" class="message"  style="opacity:0;" onclick="cerrarPopup()" >  <img  onclick="cerrarPopup()" style="float:right;cursor:pointer;" src="images/12-em-cross.png" />  </div>

<!-- end:   general_header -->


<!-- begin: start_marco -->
<input type="hidden" id="suc" value="{suc}" >
<div id="marco" class="marco" style="margin: {margenes};" >
<!-- end:   start_marco -->

<!-- begin: start_header -->
<table style="width:100%;" border="0" cellpadding="2" cellspacing="2" >

<tr>
   <td class="curve"  style="width:60%;height:118px" style="display:none" >    </td> <td class="curve"  style="display:none">    </td>
</tr>

</table>
<!-- end:   start_header -->


<!-- begin: query0_data_row -->
<table  width="100%"  border="0" cellpadding="2" cellspacing="0" onkeyup="chekKey(event.KeyCode);" >
        <tr>
            <td class="curve" >
               <table border="0" border="0" cellpadding="0" cellspacing="0" width="100%">
                 <tr>
                   <td style="width:60%"><label class="label">NOMBRE O RAZ&Oacute;N SOCIAL:</label>&nbsp;
                   <input id="{id_nombre_cliente}" onclick="edit()" onkeyup="igualarNombres()" {read_only} class="sub r_social" type="text" size="60" value="{query0_CLIENTE}" /> </td>
                   <td><label>VENDEDOR:</label><label>&nbsp;{vendedor}</label></td>

                 </tr>
                 <tr><td><label>RUC N&deg; o C.I. N&deg;:</label> &nbsp; 
                  <input id="{id_ci}" readonly="readonly" onkeyup="igualarNombres()" class="ruc_cli sub" type="text" size="30" value="{query0_CI}" /> </td>         
                 </td> <td><label> &nbsp;{ref}&nbsp; </label>  </td>  </tr>
                 <tr><td><input id="{id_fecha}" type="text" onkeyup="igualarFechas()" readonly="readonly" class="sub" size="40" value="FECHA:&nbsp;{dia_hoy}&nbsp;de&nbsp;{este_mes}&nbsp;de&nbsp;{este_anio}"> </td> <td><label>CONDICI&Oacute;N DE VENTA:</label>&nbsp;
                   <label>CONTADO       </label><label style="border:solid 1px;">&nbsp;{contado}&nbsp;</label>&nbsp;&nbsp;

                   <label>CR&Eacute;DITO&nbsp;</label><label style="border:solid 1px;">&nbsp;{credito}&nbsp;</label>

                   </td>    </tr>
               </table>
            </td>
        </tr>
       <!-- <tr>
            <td>{query0_NRO}</td>
            <td>{query0_SUC}</td>
            <td>{query0_DIR}</td>
            <td>{query0_CIUDAD}</td>
        </tr>-->
</table>

<!-- end:    query0_data_row -->


<!-- begin: cabecera_detalle -->
<table  width="100%"  border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td class="curveb">
               <table  width="100%"  border="0" cellpadding="0" cellspacing="0">
                 <tr class="cab_det" style="text-align:center" >
                     <td style="width:50px;height:18px" class="der_ab">C&Oacute;DIGO</td>
                     <td style="width:40px;" class="der_ab">CANT.</td>
                     <td class="der_ab">DESCRIPCI&Oacute;N</td>
                     <td style="width:60px;" class="der_ab">PRECIO UNI</td>
                     <td style="width:50px;" class="der_ab">EXENTAS</td>
                     <td style="width:50px;" class="der_ab">5%</td>
                     <td style="width:60px;" class="ab">10%</td>
                 </tr>
<!-- end:   cabecera_detalle -->


<!-- begin: detalle -->

        <tr>
           <td class="item"  >&nbsp; {codigo} </td>
           <td class="item_num"  > {cantidad} </td>
           <td class="item"  > {descrip} </td>
           <td class="item_num"  > {precio} </td>
           <td class="item_num"  > {exentas} </td>
           <td class="item_num"  > {cinco_porc} </td>
           <td class="item_num" style="border:0px" > {diez_porc} </td>
        </tr>

<!-- end:   detalle -->

<!-- begin: detalle_vacio -->

        <tr>
           <td class="item"      style="text-align:center"  > / </td>
           <td class="item_num"  style="text-align:center" > / </td>
           <td class="item"      style="text-align:center" > / </td>
           <td class="item_num"  style="text-align:center" > / </td>
           <td class="item_num"  style="text-align:center" > / </td>
           <td class="item_num"  style="text-align:center" > / </td>
           <td class="item_num"  style="border:0px;text-align:center"  > / </td>
        </tr>

<!-- end:   detalle_vacio -->

<!-- begin: pie_detalle -->
               <tr>
                <td align="center" class="subtotal" ><label>SUBTOTAL</label></td>
                <td colspan="3" class="subtotal">&nbsp;</td>
                
                <td class="item_num" style="border-style:solid;border-width: 1px 1px 1px 0px;">{total_exenta}</td>
                <td class="item_num" style="border-style:solid;border-width: 1px 1px 1px 0px;">&nbsp;</td>
                <td class="item_num" style="border-style:solid;border-width: 1px 0px 1px 0px;">{total}</td>
               </tr>
               <tr>
               <td colspan="5" style="height:40px;border-style:solid;border-width: 0px 0px 1px 0px;"><label>&nbsp;<b>TOTAL A PAGAR Gs.: </b>&nbsp;{total_letras}~~~~....................................</label> </td>
                <td align="center" colspan="2" style="border-style:solid;border-width: 0px 0px 1px 0px;"  >
                  <label style="float:right ;margin:4px; font-weight:bolder;-moz-border-radius: 3px 3px 3px 3px; width: 7em; font-size: .7em; line-height: 2;border-style:solid;border-width: 1px 1px 1px 1px;"  >&nbsp;&nbsp;{total_pagar}&nbsp;Gs.&nbsp;&nbsp;&nbsp;</label> &nbsp;&nbsp;</td>
                </tr>
               <tr>
                <td colspan="2"  style="height:26px; padding-left:2px"> 
                    <label>TASA DEL IVA:&nbsp;(5%)</label> 
                </td>
                <td align="left" ><label>&nbsp;~~~~~~~~</label> &nbsp;&nbsp;&nbsp;&nbsp;
                    <label style="width:230px;text-align:center;">(10%)&nbsp;&nbsp;{iva_10}&nbsp;&nbsp;~~~~</label>   &nbsp;&nbsp;&nbsp;&nbsp; 
                     <label>TOTAL IVA:&nbsp;{iva_10}&nbsp;~~~~</label>  </td>
                    <td colspan="4" style="text-align:center;vertical-align:bottom; " ><label style="">Firma ...............................</label></td>
               </tr>
               </table>
            </td>
        </tr>
</table>
<!-- end:   pie_detalle -->

<!-- begin: medio -->
<div  style="height:{medio}" > &nbsp; </div> 
<!-- end:   medio -->


<!-- begin: end_marco -->
</div>
<!-- end:   end_marco -->

 




<!-- begin: error -->
 <div class="curve" style="font-weight:bolder;font-size:18px" align="center">{error}</div>
<!-- end:   error -->




<!-- begin: printer_popup -->
<script> self:print();  </script>  
<!-- end:   printer_popup -->


<!-- begin: anular -->
<br><br> 
<div class="curve" style="font-weight:bolder;font-size:18px" align="center">
    <br>
    
    <span id="anular">  <input type="button" value="Anular la Factura Nro: {nro_factura}" onclick=anularFactura("{nro_factura}")>  </span>
    <br>
    <br>
</div>
<!-- end:   opciones -->


<!-- begin: habilitar -->
<br><br> 
<div class="curve" style="font-weight:bolder;font-size:18px" align="center">
    <br>
     
    <span id="habilitar">  <input type="button" value="Ocurrio un error y la Factura  Nro: {nro_factura} a&uacute;n no ha sido Impresa, Vover a Habilitar esta Factura!!!" onclick=habilitarFactura("{nro_factura}") >   </span>   
    <br>
    <br>
</div>
<!-- end:   opciones -->