<!-- 
    Report Template File (pedidos_urg_suc)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->


<!-- begin: general_header noeval -->
 <script type="text/javascript" src="include/jquery.js" > </script>
	<treset_page>


    <script language="javascript" >
        function ocultar(codigo){
          $("#ventas_"+codigo).fadeOut(3000);  
          $("#"+codigo).css("background","#ffcc33");  
        }
        function verVentasDeCodigo(fecha,codigo,cantidad,suc){  
         $.ajax({
             type: "POST",
             url: "include/Ajax.class.php",
             data: "action=buscar_ventas_de_codigo&fecha="+fecha+"&codigo="+codigo+"&cantidad="+cantidad+"&suc="+suc+"",
             async:true,
             dataType: "html",
             beforeSend: function(objeto){
                 $("#ventas_"+codigo).html("<b><small> Buscando ventas del codigo... </small></b>  &nbsp;&nbsp;&nbsp;<img src='images/activity.gif' height='9px' width='32px'>");
             },
             complete: function(objeto, exito){
                 if(exito=="success"){                    
                    if( objeto.responseText == false){
                      $("#ventas_"+codigo).html( "<b>No se vendio nada 0% :(   </b><img src='images/sin_resultado.jpg' height='36px' width='36px'>" );  
                      setTimeout("ocultar("+codigo+")", 5000);
                    }else{
                       $("#ventas_"+codigo).html( objeto.responseText  );  
                    }  
                 }
             }
          })        
        }      
        
    </script>
                
           
            
<style>

    tr{
       font-size:14px;
    }
    tr>td{
        padding-left:3px;
        padding-right:3px;
    }
    th{
       font-size:13px;
       font-weight:bolder;
       text-align:center;
    }
    .num{
      text-align:right;
      padding-right:3px;
    }
    .urge{
       background: orange;
    }
    .pr{
       background: #339900;
    }

    .abierta{

    }
    .cerrada{
       background: #ccff66;
    }
    .pendiente{
       background: lightgray;
    }
    .deposito{
      background: #ffff99;
    }
    .obs{ 
        -moz-border-radius: 0px 0px 0px 20px;
        margin-bottom: 4px;
    }
    </style>
<!-- end:   general_header -->


<!-- begin: start_query0 -->
<table style="text-align: left; width: 99%;" border="1"cellpadding="0" cellspacing="0">
    <tbody>
    <thead>
<tr> <td colspan="50"> 
	<table style="text-align: left; width: 100%;" border="1"
	 cellpadding="0" cellspacing="0">
	  <tbody>
		<tr>
		  <td style="width: 184px;"> </td>
		  <td style="text-align: center;">
			<b>Marijoa</b></td>
		  <td style="text-align: right;">
			<tpage><b>Pag: </b></tpage></td>
		</tr>
		<tr>
		  <td>
			<small><small>ycube plus RAD [1.2.31]</small></small>
		  </td>
		  <td style="text-align: center;"><big
			style="font-weight: bold;"><big>Pedidos Pendientes Urgentes / Reposicion</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
        <tr> <td colspan="2" align="center">
         <input type="text" size="10" class="pr" value="Proveedor" style="text-align:center">
         <input type="text" size="10" class="urge" value="Urgente" style="text-align:center">

         <input type="text" size="10" class="" value="Abierta" style="text-align:center">
         <input type="text" size="10" class="cerrada" value="Cerrada" style="text-align:center">
         <input type="text" size="10" class="pendiente" value="Pendiente" style="text-align:center">
         <input type="text" size="10" class="deposito" value="En Deposito" style="text-align:center">
        
        </td>

        <td> <b>Pedidos desde:   {sup_origen}  &nbsp; <big> <big>  <big>   &rarr;   </big>  </big> </big>  &nbsp; {sup_destino}   </b> </td></tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th>NRO</th>
        <th>ORIGEN</th>
        <th>DESTINO</th>
        <th>FECHA</th>
        <th>USURIO</th>
        <th>CODIGO</th>
        <th>REMP</th>
        <th>GRUPO &nbsp;-&nbsp; TIPO &nbsp;-&nbsp; COLOR  &nbsp;-&nbsp; DESCRIPCION</th>
        
        <th style="text-align: right;">CANT.</th>
        <th>URGE</th>
        <th>EST.NOTA</th><th>EST.COD</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <tr class="{estado}">
            <td>{query0_NRO}</td>
            <td>{query0_ORIGEN}</td>
            <td class="{destino}">{query0_DESTINO}</td>
            <td>{query0_FECHA}</td>
            <td>{query0_USURIO}</td>
            <td id="{query0_CODIGO}" ><a style="text-decoration:none" href=javascript:verVentasDeCodigo("{fecha_inv}","{query0_CODIGO}","{query0_CANTIDAD}","{suc}") >{query0_CODIGO}</a> </td>
            <td><a style="text-decoration:none" href=javascript:verVentasDeCodigo("{fecha_inv}","{query0_REM}","{query0_CANTIDAD}","{suc}") >{query0_REM}</a></td>
            <td>{query0_GRUPO}&nbsp;-&nbsp;{query0_TIPO}&nbsp;-&nbsp;{query0_COLOR}&nbsp;-&nbsp;{query0_DESCRIP}</td>
            <td style="text-align: right;">{query0_CANTIDAD}</td>
            <td class="{urge}">{query0_URGE}</td>
            <td>{query0_ESTADO}</td>
            <td  align="center" id="estado_codigo_{query0_CODIGO}" {color_codigo} > {query0_ESTADO_CODIGO}</td>
         </tr>
         <tr><td></td><td class="obs" style="background: blanchedalmond" colspan="10">{query0_OBS}</em></td><td class="obs"></td></tr>
         {resultado_ventas}
         
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr>
            <td></td>
            <td></td><td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td><td></td>
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td colspan="3"><b>Cant.:  {i}</b></td> 
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align: right;"><b>{subtotal0_CANTIDAD}</b></td>
            <td></td><td></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->

