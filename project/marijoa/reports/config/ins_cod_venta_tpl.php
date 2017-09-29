<!-- 
    Report Template File (ins_cod_venta)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
    <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
	<script type="text/javascript" src="include/jquery.js" > </script>
	<treset_page>
	<style type="text/css">
		.excluidos {
			background:white none repeat scroll 0%;
			height:270px;
			left:31%;
			overflow-y:scroll;
			padding:3px 15px;
			position:absolute;
			top:111px;
		}
		.info {
		}
		.hide_ex {
			border:medium none;
			background-color:lightgray;
			margin:3px 12px 15px 125px;
			font-weight:bolder;
		}
		.hide_ex:hover{
			background-color:gray;
			font-weight:200;
		}
	</style>
	<script type="text/javascript">
		$(function(){
			$(".info").text(info);
			$(".ex").html(result);
			$(".hide_ex").click(function(){$(".excluidos").fadeOut("slow");});			
			$(".show_ex").click(function(){$(".excluidos").fadeIn("slow");});	
		});		
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
		  <td style="width: 20%;height:40px;">{info}</td>		  
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
			style="font-weight: bold;"><big>Inserta Codigos en Detalle Venta x Lotes</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
		<tr>
		<td colspan="50">
			<span class="info"></span>
			<input type="button" value="Mostrar Excluidos" class="show_ex" />
		</td>		
		</tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th>Cod</th>
		<th>Descripci&oacute;n</th>
		<th>Precio</th>
		<th>Cantidad</th>
		<th>Subtotal</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr>
            <td class="num">{cod}</td>
			<td class="item">{desc}</td>
			<td class="num">{precio}</td>
			<td class="num">{cant}</td>
			<td class="num">{subtotal}</td>
         </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr>
            <td></td>
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
			<td></td>
            <td colspan="2">Total de metros:{total_metros}</td>
            <td colspan="2">Total de piezas:{total_cantidad}</td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<div class="excluidos"><input type="button" value="Ocultar" class="hide_ex" /></br><span class="ex"></span></div>
<!-- end:   end_query0 -->
<!-- begin: info -->
	<script language="javascript"> 
		var info = "{info}";
		var result = "{result}";		
	</script>
<!-- end:   info -->


