<!-- 
    Report Template File (nota_remision)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
<link rel="stylesheet" type="text/css" href="templates/reports.css" />
        <script type="text/javascript" src="include/jquery.js" > </script>
	<treset_page>
            
 
            
<script language="javascript">  
  function serverTime(server_time){
    var serverTime = server_time;
    var localTime = +Date.now();
    var timeDiff = serverTime - localTime;
    setInterval(function () {
        var date = (new Date(+Date.now() + timeDiff));
        var _fecha = date.getDate();        
        var _mes = date.getMonth()+1; 
        var _hora = date.getHours();
        var _minuto = date.getMinutes();
        var _segundo = date.getSeconds();
                
        var fecha = (_fecha<10)?'0'+_fecha:_fecha;        
        var mes = (_mes<10)?'0'+_mes:_mes;
        var hora = (_hora<10)?'0'+_hora:_hora;
        var minuto = (_minuto<10)?'0'+_minuto:_minuto;
        var segundo = (_segundo<10)?'0'+_segundo:_segundo;
         
       $("#hora_servidor").html(fecha+'/'+mes+'/'+date.getFullYear()+' '+hora+':'+minuto+':'+segundo);
    }, 1000);
  } 
		$(function(){
			$(".filas").hover(function(){
				$("#info").html("Cod:"+$(this).children(0).html()+': '+$(this).attr('data-info'));
				$("#info").css("display","block");
			});
			$(".filas").mouseout(function(){				
				$("#info").css("display","none");
			});
		});
        function cerrarPopup(){   
            $("#message").html('<img  onclick="cerrarPopup()" style="float:right;cursor:pointer;" src="images/12-em-cross.png" />');
            $("#message").animate({ display:"none" }, "slow");    
        }
        function limpiar(){   
            $("#message").html('');	
            $("#message").animate({ display:"none"  }, "fast");    
        }
 
        $(window).scroll(function(){
            $('#message').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
        });            
        function aparecerRemp(id){
            $("#"+id).css("display","block");
        } 
        function desaparecerRemp(id){
           $("#"+id).css("display","none");
        }
        function remplazarCodigo(codigo){
          
          var nro_remito = $("#nro_remito").val();
          var remplazo = $("#cod_remp").val();
          if(remplazo==""){
              alert("Tal vez sea una mejor idea ingresar un codigo para el reemplazo!!!");
          }else{
                $.ajax({
                    type: "POST",
                    url: "include/Ajax.class.php",
                    data: "action=reemplazar_codigo_en_remito&codigo="+codigo+"&remplazo="+remplazo+"&nro_remito="+nro_remito,
                    async:true,
                    dataType: "html",
                    beforeSend: function(objeto){                 
                        $("#respuesta").html("<b><small> Procesando... </small></b>  &nbsp;&nbsp;&nbsp;<img src='images/activity.gif' height='9px' width='90px'>"); 
                    },
                    complete: function(objeto, exito){
                        if(exito=="success"){                          
                            $("#respuesta").html( objeto.responseText  );  
                        }
                    }
                    }); 
          }
                    
          
        }
               
        function reemplazar(id){
            
            var descrip = $("#desc_"+id).html();
            
            var html= '<img  onclick="cerrarPopup()" style="float:right;cursor:pointer;" src="images/12-em-cross.png" />\n\
            <label> Estas por reemplazar el codigo '+id+' con descripcion  '+descrip+' </label> \n\
            <br>Por el codigo:  \n\
            <input type="text" maxlength="20" size="12"  id="cod_remp" value="" />  <input type="button" value="Reemplazar" onclick="remplazarCodigo('+id+')" \n\
            <br><br><div id="respuesta"></div>';         
                    
            $("#message").html( html );
            $("#message").animate({ display:"block"  }, 2000);    
                     
        }
        
        function finalizar(){
            window.location.reload();
        }
              
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

        width: 80%;
        height: 180px;
        margin-top: 180px;
        margin-left: 10%;
        margin-right: 10%;  
    }
	#info{
		position:fixed;
		bottom:0px;
		left:0px;
		background-color:lightyellow;
		padding:7px;
		width:100%;
	}
	tr.filas:hover{
		background-color:lightblue;
                cursor:pointer;
	}
	.ex *{
		background-color:white;	
	}	
		
	.ex:after{
		border-bottom:1px dotted black;
		content:"";
		height:12px;
		line-height:0pt;
		vertical-align:2px;
		position:absolute;
		width:100%;
		display:block;
		margin-top:-18;
	}
	@media print {
		*{				
			padding:0;
			margin:0;			
		}		
		table. table table{			
			empty-cells: show;
			border-collapse: collapse;
			border:0px !important;
		}
		th{
			font-size:10px;
			margin:0;
			padding:0;
		}			
		td:not([class="ex"]){				
			text-transform:lowercase;
			height:8px;
			overflow:hidden;				
			white-space:nowrap;
			padding-left: 1px;
			width:auto;
		}		
		.cap{border:0px;margin:0;}
		b,i,big,.cap *{
			text-transform:capitalize;
		}
		small span{
			text-transform:uppercase;
			padding-left: 5px;
		}
		.np{
			display:none;
		}							
		body {
			border: 1px solid black;
			margin-bottom: 1cm;
		}
		div#info{
			display:none;
		}
	}
</style>       
         
<div id="message" class="message"  style="display:none;"    >   </div> 

<!-- end:   general_header -->


<!-- begin: start_query0 -->
<input type="hidden" value="{nro_remito}" id="nro_remito" />
<table style="text-align: left; width: 99%;" class="main" border="1" cellpadding="0" cellspacing="0">
    
 <!-- Header-->     
 <tr> 
 
   <td colspan="4" >
	   <table border="0" class="cap" cellpadding="0" cellspacing="0" width="100%" >	
		   <tr>      
			  <td height="90%"  align="center" colspan="5" >  <label style="font-weight: bold;font-family: arial;font-size: 28px" >  Marijoa  </label>  </td>			 
		   </tr>
		   <tr>
           
                       <td colspan="2">
		       <hr>
			   <table class="cap" border="0" cellpadding="2" cellspacing="0" width="100%" >		  
		 		<tr>
		       <tr>
		         <td ><b> Origen: </b> {sup_rem_dir_origen} &nbsp;  &nbsp; &nbsp;<b>  Destino: </b> {sup_rem_dir_destino}   </td>
		       </tr>
                       <tr>	
                       <td> <b> Chofer: </b>   
                           <small> Jos&eacute; Freitas </small>&#9723; ___________
                           <small> Marcos Troche </small>&#9723; ___________                                                     
		      </tr>		             			        
                      <tr>
                          <td>
                               <small> Rafael Gim&eacute;nez </small>&#9723; ___________
                               <small>Otro:___________ </small>&#9723; ___________
                       </td>
                          </td>
                      </tr>
		    </table>
			   
		  </td>
		  </tr>      
	       	   
	   </table>
 	</td>
 
 	
 	
 <td colspan="3">
	<table class="cap" align="center"  border="0"  cellpadding="0" cellspacing="4" width="100%"  >	
		<tr>	   
		   <td colspan="3"> <big> <big> <big>   Nota de Remisi&oacute;n  </big>  </big> </big>    </td>	 
		</tr>
		<tr>	   
		   <td colspan="3"><small>Fecha/hora del Servidor: <span id="hora_servidor"> </span></small></td>	 
		</tr>	
		<tr>
		  <td colspan="3"><b>N&deg; </b> {sup_rem_nro}  </td>
		</tr>
		<tr>
                    <td colspan="3"><b>Fecha: </b> {fecha_aper} &nbsp;&nbsp;&nbsp;<b>Fecha Cierre:</b> {fecha_cierre} </td>
		</tr>
        <tr>
		  <td colspan="3"><b>Estado </b> {sup_rem_estado}  </td>
		</tr> 
		<tr>
		  <td colspan="3"><small>Transportado por: {sup_rem_env_emp}, Cod:{sup_rem_env_cod}</small></td>
		</tr> 
			
	</table>

 </td>


</tr>
<!-- end:  header  start_query0 -->

<!-- begin: header0 -->
	<tr>
	   <td align="center" colspan="7">  <label > <b> Detalle </b> </label> </td>
	</tr>
    <tr>
        <th align="center">C&Oacute;DIGO</th>
        <th align="center">DESCRIPCION</th>
        <th width="10%" align="center">CANT. Mts</th>
	<th width="10%" align="center">Kg. Enviado</th>  
        <th width="10%" align="center">Kg. Recibido</th>
	<th width="10%" align="center">ENVIADO</th>   
        <th width="10%" align="center">RECIBIDO</th>   
    </tr>
  
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <tr class="filas"  id="tr_{query0_CODIGO_PRODUCTO}" data-info="{data_info}" >
            <td class="item" style="text-align: left;width:12%;height:22px"   >{query0_CODIGO_PRODUCTO}   </td>
            <td class="item" id="desc_{query0_CODIGO_PRODUCTO}">{query0_DESCRIPCION}</td>
            <td class="num" style="text-align: center;width: 10%">{query0_CANTIDAD}</td> 
            <td class="item" style="text-align: center;width: 10%" id="kg_{query0_CODIGO_PRODUCTO}">{query0_KGE}</td>
            <td class="item" style="text-align: center;width: 10%" id="kgr_{query0_CODIGO_PRODUCTO}">{query0_KGR}</td>            
			<td class="item" style="text-align: center;width: 4%" id="estado_{query0_CODIGO_PRODUCTO}">{query0_ENVIADO}</td>
            <td class="item" style="text-align: center;width: 4%" id="estador_{query0_CODIGO_PRODUCTO}">{query0_RECIBIDO}</td>
        </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
   	<tr>
           <td colspan="7"> <b>Cantidad de Items: <big>&nbsp;&nbsp;&nbsp;{cant} </big>~~~~~ </b> </td>            	 
        </tr> 
        <tr>
            <td  colspan="7">
                <table border="0" style="width:99%;background: #fff; ">

            	 <tr><br>
				 
            	   <td class="ex"><span><b>Total recibido: </b> {sup_rem_total_recib}</span></td>
            	 </tr>
            	 <tr>
                     <td  class="ex"><span><b>Observaciones:</b>&nbsp;&nbsp;&nbsp{remps}&nbsp; {sup_rem_obs}</span></td>        	 
            	 </tr> 
             	 <tr>
            	   <td class="ex">.</td>            	 
            	 </tr>   
            	 <tr>
            	   <td style="text-align: center;"> <small><small>{user} - {time}</small></small>	<small><small>ycube plus <span>RAD</span> [1.2.9]</small></small>		  </td> 
            	 </tr>
            	  
            	</table>
            
            </td>
             
            <td></td>
            <td></td>
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>            
            <td></td>
            <td></td>
            <td></td>
        </tr>

      <!--  -->
      <!-- <td> 	  </td> -->
<!-- begin: end_query0 -->



</table>
<script>
  
var fecha_hora = {server_time}; 
serverTime(fecha_hora);

  self.print();
</script>
<!-- end:   end_query0 -->

<!-- begin: info -->

<div id="info" style="display:none"> </div>

<!-- end:   info -->

