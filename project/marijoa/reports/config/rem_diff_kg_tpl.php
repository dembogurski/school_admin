<!-- 
    Report Template File (rem_diff_kg)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
       <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
	   <style>
			table{empty-cells:show}
			#resultado {
				background:white none repeat scroll 0%;
				border:1px solid black;
				height:35%;
				margin-top:7px;
				overflow:scroll;
				position:fixed;
				width:521px;
				margin-left:25%;
				display:none;
				opacy:0.3;
			}
			#resultado table{
				margin:7 auto;
				background:lightBlue;
			}
			#resultado table th {background:lightCyan;padding:1px 3px;}
			#resultado table td {border:solid 1px lightCyan;padding:1px 3px;text-align:center;}
	   </style>
	   <script type="text/javascript" src="include/jquery.js" > </script>
	    <script type="text/javascript">
			$(function(){$("#resultado").click(function(){$(this).fadeOut("slow");});});
			function obtenerHijos(padre){				
				$("#resultado").load("include/Ajax.class.php",{'action':'obtener_hijos_x_padre','padre':padre},
				function(){$("#resultado").fadeIn("slow");});
			}
		</script>
	<treset_page>
<!-- end:   general_header -->


<!-- begin: start_query0 -->
<div id="resultado"></div>
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
			style="font-weight: bold;"><big>Reporte de Remisiones con Diferencias de Kilaje</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr>
            <td class="item">{query0_Codigo}</td>
            <td class="item">{query0_Descrip}</td>
            <td class="num">{query0_Cant_Env}</td>
            <td class="itemc">{query0_Enviado}</td>
            <td class="num">{query0_kg_env}</td>
            <td class="num">{query0_kg_rec}</td>
			<td class="num">{query0_kg_dif}</td>
			<td class="num">{query0__kg_}</td>
			<td class="num">{query0_tara}</td>
			<td class="num">{query0_ancho}</td>
			<td class="num">{query0_gramaje}</td>
			<td class="num">{query0_padre}</td>						
            <td class="itemc">{query0_Recibido}</td>
			<td class="num"></td>
         </tr>
<!-- end:    query0_data_row -->

<!-- begin: head -->
<tr>
    <td colspan="9" style="border: solid 0px white;height:16px"></td>
</tr>
<tr style="background: #F5F5DC">
        <th>Nro</th>
        <th>Fecha</th>
        <th>Origen</th>
        <th>Destino</th>
        <th>Usuario</th>
        <th>Receptor</th>
        <th>Fecha_cierre</th>
        <th colspan="6">Obs</th>
</tr>
<tr style="background: #F5F5DC">
            <td class="itemc">{query0_Nro}</td>
            <td class="itemc">{query0_Fecha}</td>
            <td class="itemc">{query0_Origen}</td>
            <td class="itemc">{query0_Destino}</td>
            <td class="itemc">{query0_Usuario}</td>
            <td class="itemc">{query0_Receptor}</td>
            <td class="itemc">{query0_Fecha_cierre}</td>
            <td class="item" colspan = "6">{query0_Obs}</td>
</tr>      

<tr style="background: #E8E8E8"> 
        <th>Codigo</th>
        <th>Descrip</th>
        <th>Cant_Env</th>
        <th>Enviado</th>
        <th style="text-align: right;">kg_env</th>
        <th style="text-align: right;">kg_rec</th>
		<th style="text-align: right;">Dif_kg</th>
		<th style="text-align: right;">Peso</th>
		<th style="text-align: right;">Tara</th>
		<th style="text-align: right;">Ancho</th>
		<th style="text-align: right;">Gramaje</th>		
		<th style="text-align: right;">Padre</th>	
        <th>Recibido</th>
</tr>
<!-- end:    head -->            
            
<!-- begin: query0_total_row -->
 
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
 
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align: right;"><b>{subtotal0_kg_env}</b></td>
            <td style="text-align: right;"><b>{subtotal0_kg_rec}</b></td>
			<td>1</td>
			<td>2</td>
			<td>3</td>
			<td>4</td>
			<td>5</td>
            <td></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->

