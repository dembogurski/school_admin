<!-- 
    Report Template File (monit_mens_clie)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
       <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
       <script type="text/javascript" src="include/jquery.js" > </script>
       
	<treset_page>
            
<style type="text/css">
    .valores{
        font-size:11px;
        padding-right:3px;
        text-align:right;
    }   
    .cliente{
        font-size:11px;
        padding-left:3px;
        text-align:left;
    }
    .espacio{}
 </style>    
 
 <script language="javascript">
     
function desaparecer(){
   $('.valores').css("display","none");
   $('.cliente').removeAttr("rowspan");
   $('.cliente').css("height","24px");
   $('.espacio').css("display","none");
 }
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
			style="font-weight: bold;"><big>Monitoreo Mensual de Clientes</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
                
                <tr> <td colspan="3" style="text-align: center;height: 36px;font-size: 15px"><b>Periodo:&nbsp;&nbsp;</b>{desde}&nbsp; &lArr; &rArr; &nbsp;{hasta}  &nbsp;&nbsp; &nbsp;Sucursal: {sup_suc}  &nbsp; &nbsp;&nbsp; <b>Cat.:</b>{sup_cli_cat}&nbsp;&nbsp;&nbsp;<b>Tipo: </b>{sup_cli_tipo} &nbsp;&nbsp;&nbsp;<b>Desaparecer valores:</b> <input type="checkbox" onclick="desaparecer()"> </td> </tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
     
    <tr> 
        <th style="background: rgb(240,240,240);height: 36px"> N&deg; </th>
        <th style="background: rgb(240,240,240);"> Cliente </th> 
        <th style="background: rgb(240,240,240);"> Mts/Valor </th> 
        {cabecera}  
    </tr>
     
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         {fila}
         {fila_valor}
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr>
            <td></td>
            <td></td> 
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td></td>
            <td></td>
            
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->

