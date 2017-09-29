<!-- 
    Report Template File (prods_vendedor)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
   <script type="text/javascript" src="include/jquery.js" > </script>
   <link rel="stylesheet" type="text/css" href="templates/reports.css" />
	<treset_page>
            
        <script language="javascript"> 
            
        function verImagen(url){
             window.open(url,"Imagen de Producto","width=640,height=480,scrollbars=yes");
        } 
          
          function verificarCodigoEnRemision(codigo){ 
          
                $.ajax({
                    type: "POST",
                    url: "include/Ajax.class.php",
                    data: "action=verificar_codigo_en_remision&codigo="+codigo+"",
                    async:true,
                    dataType: "html",
                    beforeSend: function(objeto){
                       $("#cod_"+codigo).html("<b>Procesando...</b>  &nbsp;&nbsp;&nbsp;<img src='images/activity.gif' height='9px' width='26px'>"); 
                    },
                    complete: function(objeto, exito){
                      if(exito=="success"){ 
                        $("#cod_"+codigo).html( objeto.responseText  ); 
                      }
                    }
               })               
          }
   </script>     

    <style>
    .marco{
       border:solid 0px;
    }
    .curve{
        -moz-border-radius: 9px 9px 9px 9px;
         border:solid 1px;
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
    th{
      text-align:center;
      font-size:12px;
      font-weight:bolder;
      
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
      font-size:11px;  
    }
    .num{
        text-align:right;
      padding-left:3px;
      font-size:11px; 
    }
	.no{
		color:red;
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
			style="font-weight: bold;"><big>Reporte Variado de Productos (Vendedores)</big></td>
		  <td style="text-align: right;">
			<p><small><small>{user} - {time}</small></small></p>
			<p><small><small> {showing_result} de {results_count} resultados</small></small></p>
		  </td>
		</tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th>CODIGO</th>   
		<th>PADRE</th> 
		<th>REF</th>
		<th>SECTOR</th> 
		<th>GRUPO</th> 
		<th>TIPO</th>
		<th>COLOR</th>
		<th>DESCRIP</th>
		<th>CANT</th>
		<th>ANCHO</th>
		<th>SUC</th>
		<th>PRECIO</th>
		<th>ESTADO</th>
		<th></th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50">  </td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <tr class="{disponible}">
            <td class="item" style="background:{color}"> <a  href=javascript:verificarCodigoEnRemision("{query0_p_cod}")  style="text-decoration:none" title="Verifique si no se encuentra en Remision" >{query0_p_cod}</a> </td>  <td class="item">{query0_p_padre}</td>  
             <td class="item">{query0_p_ref}</td>
            <td class="item">{query0_fam}</td>
            <td class="item">{query0_grupo}</td>
            <td class="item">{query0_tipo}</td>
            <td class="item">{query0_color}</td>
            <td class="item">{descrip}</td>
            <td class="num">{query0_p_cant}</td>
            <td class="num">{query0_p_ancho}</td>
            <td class="item" style="text-align:center" >{query0_p_local}</td>
            <td class="num">{query0_p_precio_1}</td>
            <td class="item"  {estado} >{query0_ESTADO}</td>
            <td class="itemc">{foto}</td>
       </tr>
       <tr><td style="font-size:14px" colspan="6" id="cod_{query0_p_cod}"></td></tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td> <td></td>
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td> <td></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->

