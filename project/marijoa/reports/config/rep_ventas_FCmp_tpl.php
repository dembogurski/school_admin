<!-- 
    Report Template File (rep_ventas_F)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
       <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
       
        <link href="templates/jquery-ui-1.8.22.custom.css" rel="stylesheet" type="text/css">
        <link href="templates/jquery.datatables.css" rel="stylesheet" type="text/css">
        <link href="templates/demo_table.css" rel="stylesheet" type="text/css">
       <!-- <link href="templates/demo_table_jui.css" rel="stylesheet" type="text/css"> -->
       
        <script type="text/javascript" src="include/jquery.js"></script>
        <script type="text/javascript" src="include/jquery-ui-1.8.22.custom.min.js"></script>
        <script type="text/javascript" src="include/jquery.dataTables.min.js"></script>
        
        <script type="text/javascript" language="JavaScript">
        $(document).ready( function() {

            $("#mi_tabla").dataTable({
                "iDisplayLength": 30
            });

        });
        </script>   
	<treset_page>
<!-- end:   general_header -->


<!-- begin: start_query0 -->
<table style="text-align: left; width: 100%;" border="1" cellpadding="0" cellspacing="0">
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
			style="font-weight: bold;"><big>Reporte de Ventas Sector Comparativo  </big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
                
                <tr> 
                    <td colspan="3" style="text-align: center">
                        <b>Periodo 1:</b> <i> {desde}&nbsp;--&nbsp;{hasta}      </i> <b>Periodo 2:</b> <i> {desde2}&nbsp;--&nbsp;{hasta2}      </i>                    
                    </td>
                </tr>
                
	  </tbody>
	</table> 
</td></tr>

    </tr>
    </tbody>
</table>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <table id="mi_tabla" border="1" style="width: 100%" cellpadding="0" cellspacing="0" >
    <thead>
    <tr>
        <th>SECTOR</th>
        <th style="text-align: center;">CANT 1</th>
        <th style="text-align: center;">VENTAS 1</th>
        <th style="text-align: center;">MARGEN 1</th>
        <th style="text-align: center;">CANT 2</th>
        <th style="text-align: center;">VENTAS 2</th>
        <th style="text-align: center;">MARGEN 2</th>
        
        <th style="text-align: center;">Diff. Cant</th>
        <th style="text-align: center;">%</th>
        <th style="text-align: center;">Diff. Ventas</th>
        <th style="text-align: center;">%</th>
        <th style="text-align: center;">Diff. Margen</th>
        <th style="text-align: center;">%</th>
        
    </tr>
</thead>
 <tbody>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr>
            <td  class="item">{query0_FAM}</td>
            <td  class="num" style="background: lightyellow">{query0_CANT}</td>
            <td  class="num">{query0_SUBTOTAL}</td>
            <td  class="num" style="background: lightcyan">{query0_MARGEN}</td>
            <td  class="num" style="background: lightyellow">{query0_CANT2}</td>
            <td  class="num">{query0_SUBTOTAL2}</td>
            <td  class="num"  style="background: lightcyan">{query0_MARGEN2}</td>
            <td  class="num" style="background: lightyellow">{diff_cant}</td>
            <td  class="num" style="background: lightyellow">{porc_diff_cant}</td>
            <td  class="num">{diff_subt}</td>
            <td  class="num">{porc_diff_subt}</td>
            <td  class="num" style="background: lightcyan">{diff_marg}</td>
            <td  class="num" style="background: lightcyan">{porc_diff_marg}</td>
         </tr>
<!-- end:    query0_data_row -->



 
<!-- begin: end_query0 -->
 </tbody> 
</table> 
   


<!-- end:   end_query0 -->

<!-- begin: query0_subtotal_row -->
 <tfoot> 
 <tr style="font-weight: bolder;font-size: 13px;margin-right: 2px;text-align: right;padding-right: 2px">
            <td></td>
            <td>{total_cant1}</td>
            <td>{total_ventas1}</td>
            <td>{total_margen1}</td>
            <td>{total_cant2}</td>
            <td>{total_ventas2}</td>
            <td>{total_margen2}</td>
            <td>{total_diff_cant}</td>
            <td>{total_porc_cant}</td>
            <td>{total_diff_vent}</td>
            <td>{total_porc_ventas}</td>
            <td>{total_diff_marg}</td>
            <td>{total_porc_margen}</td>
        </tr>
    </tfoot> 
<!-- end:    query0_subtotal_row -->

