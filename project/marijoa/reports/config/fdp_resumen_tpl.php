<!-- 
    Report Template File (fdp_resumen)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval --> 
       <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
	   <script type="text/javascript" src="include/jquery.js" > </script> 	
	   <style>
		td.s_calc:hover{
			background-color:lightBlue;
			cursor:pointer;
		}	
		#loadingDiv{
			position: fixed;
			top: 0;
			left: 0;
			height: 100%;
			width: 100%;
			z-index: 1;
			background:rgba(0,0,0,0.5);
		}
		.info{
			padding-top: 21px;
			padding-left: 15px;
			padding-right: 10px;
			height: 90%;
		}
		.info table tr td{
			border: solid 1px black;
		}
		#loadingDiv img{
			margin: 100px 45%;
		} 
		#infoContent {
			position: fixed;
			top: 2px;
			right: 2px;
			background-color: lightCyan;	
			overflow-y: scroll;
			max-height:90%;
		}
		.clicked{
			background-color: lightblue;
		}
		#totalRegistros{
			background-color:lightBlue;
			left:23px;
			padding:2px 10px;
			position:absolute;
			top:18px;
			-webkit-border-radius: 5px;
			-moz-border-radius: 5px;
			border-radius: 5px;
		}
	   </style>
	   <script language="javascript" > 
			function getInfo(cod){
				$("*").removeClass("clicked");
				$("#tr_"+cod).addClass("clicked");
				var data = {
					"action":"get_product_history",
					"codigo": cod
				}
				$.post("include/Ajax.class.php",data,function (respuesta, exito) {
						if (exito === "success") {					
							$(".info").html(respuesta);	
							$(".infoContent").css("display","block");
							if($("#infoContent").css("display")=="none"){
								$("#infoContent").css("display","block");
								$("#ocultar").val("Ocultar");
							}
						}
					},'html');				
			}
			function ocultar(){
				if($("#infoContent").css("display")=="none"){
					$("#infoContent").css("display","block");
					$("#ocultar").val("Ocultar");
				}else{
					$("#infoContent").css("display","none");
					$("#ocultar").val("Mostrar");
				}
				
			}	
			$(function(){
				var $loading = $('#loadingDiv').hide();
				$(document).ajaxStart(function () {
					$loading.show();
				  }).ajaxStop(function () {
					$loading.hide();
				  });
			});
	   </script> 
	<treset_page>
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
			style="font-weight: bold;"><big>Reporte de Finalizaciones de Piezas Resumido</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
                <tr>
                    <th colspan="3">Periodo: {desde}<-->{hasta} &nbsp;&nbsp;&nbsp; Suc: {sup_suc_}  &nbsp;&nbsp;&nbsp;Remisiones >=  {sup_fecha_rem}</th>
                </tr>
	  </tbody>
	</table> 
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th>Codigo</th>		
        <th>Grupo</th>
        <th>Tipo</th>
		<th>Usuario</th>
        <th>Fecha</th>
        <th>Ult. Remision</th>
        <th>Cant. Recibida</th>
        <th>Tolerancia</th> 
        <th>S.Final</th>       
        <th>S.Final Calc</th>       
        <th>Exceso</th>
        <th>Costo</th>
        <th>Descuento</th>
        <th>Desc.SiOrig.(Deps) </th>
        <th>Aj.PosVenta (+)</th>
        <th>Aj.PosVenta (-)</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr id="tr_{query0_CODIGO}">
            <td class="item cod">{query0_CODIGO}</td>
			<td class="item">{query0_GRUPO}</td>
			<td class="item">{query0_TIPO}</td>
			<td class="item">{query0_USUARIO}</td>
            <td class="item">{query0_FECHA}</td>
            <td class="item" {estilo}>{urem}</td>
            <td class="num">{cant_recib}</td>
            <!--   <td class="num">{ventas}</td>            
            <td class="num">{ajustes}</td>    -->        
            
            <td class="num">{tolerancia}</td>
            <td class="num">{query0_STOCK}</td>
            <td class="num s_calc" id="{query0_CODIGO}" onclick="getInfo(this.id)">{saldo_final_calculado}</td>
            <td class="num" title="{exceso_title}">{exceso}</td>
            <td class="num">{costo}</td>
            <td class="num">{descuento}</td>
            <td class="num">{desc00}</td>
            <td class="num" title="Positivos">{pos}</td>
            <td class="num" title="Negativos">{neg}</td>
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
            <td></td>
			
            <td style="font-weight: bolder;font-size: 14px;text-align: right;padding-right: 3px">{total_descuento}</td>
			<td></td> 
            <td style="font-weight: bolder;font-size: 14px;text-align: right;padding-right: 3px">{total_descuento00}</td> 
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
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<div id="loadingDiv"><img src="./prod_images/loader.gif"/></div>
<div id="infoContent"><input id="ocultar" type="button" value="Ocultar" onclick="ocultar()" /><div class="info"> </div></div>
<div id="totalRegistros">Total de Registros: {total_registros}</div>
<!-- end:   end_query0 -->

