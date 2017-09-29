<!-- 
    Report Template File (rep_ventas_F)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
       <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
       <script type="text/javascript" src="include/jquery.js" > </script>
	<treset_page>
            
<script langguage="javascript">
   function selectFam(){
       
      var total_ventas = parseFloat($("#total_ventas").val());
      var selecteds = 0;
      var noselecteds = 0;
       
      
      $('[id^=check_]').each(function(){
                var thisid = $(this).attr('id');  
                var checked = $(this).is(':checked'); 
                var codigo =   thisid.substring(6,40); 
                var select = parseFloat($("#subt_"+codigo).val());  
                if(checked){                     
                    selecteds +=select;                    
                }else{
                    noselecteds+=select;
                }                               
      });  
      
      var seleccionados = parseFloat(selecteds * 100 / total_ventas).toFixed(2);
      var noseleccionados = parseFloat(noselecteds * 100 / total_ventas).toFixed(2);
      
      
      $("#selecteds").html("Seleccionados: "+selecteds.toFixed(2)+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+seleccionados+"%");
      $("#noselecteds").html("No Seleccionados: "+noselecteds.toFixed(2)+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+noseleccionados+"%") 
      
      
       
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
			style="font-weight: bold;"><big>Reporte de Ventas Sector &nbsp; {desde}&nbsp;--&nbsp;{hasta}&nbsp;SUC: &nbsp;[{sup_rep_localidad}]</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th>SECTOR</th>
        <th style="text-align: center;">CANT</th>
        <th style="text-align: center;">% CANT</th>
        <th style="text-align: center;">VENTA</th>
        <th style="text-align: center;">% VENTA</th>
        <th style="text-align: center;">MARGEN</th
        <th style="text-align: center;">% MARGEN</th>
        
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"> </td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr > 
            <td  class="item"  ><input type="checkbox" id="check_{id}"  onclick="selectFam()" >&nbsp;{query0_FAM}</td>
            <td  class="num">{query0_CANT}</td>
            <td  class="itemc">{porc_CANT}%</td>
            <td  class="num" >{query0_SUBTOTAL}</td>
            <td  class="itemc">{porc_SUBTOTAL}%</td>
            <td  class="num">{query0_MARGEN}</td>
            <td  class="itemc">{porc_MARGEN}%</td>
         </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr>
            <td></td>
            <td style="text-align: right;"><b>{total0_CANT}</b></td>
            <td></td>
            <td style="text-align: right;"  ><b>{total0_SUBTOTAL}</b></td>
            <td></td>
            <td style="text-align: right;"><b>{total0_MARGEN}</b></td>
            <td></td>
        </tr>
        <tr> 
            <td></td>  <td colspan="3"  style="text-align: center;font-weight: bolder;font-size: 14px" id="selecteds"></td><td   style="text-align: center;font-weight: bolder;font-size: 14px"colspan="3" id="noselecteds"></td>
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->

