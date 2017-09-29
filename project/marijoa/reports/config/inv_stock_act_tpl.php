<!-- 
    Report Template File (inv_stock_act)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
       <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
	<treset_page>
            <style>
                .texto{
                  border-width:0px;
                  text-align: center;
                }
            </style>    
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
                    <td style="width: 20%;height:40px;"> <big><big><b>{time}</b> </big></big> </td>
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
                      style="font-weight: bold;"><big>Inventario de Stock &nbsp;&nbsp;&nbsp; SUC: {sup_suc_} </big></td>
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
        <th>CODIGO</th>
        <th>FAMILIA</th>
        <th>GRUPO</th>
        <th>TIPO</th>
        <th>COLOR</th>
        <th>CANT</th>
        <th>COSTO CIF</th>
        <th>COSTO FOB</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"> </td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr>
            <td class="item">{query0_CODIGO}</td>
            <td class="item">{query0_FAMILIA}</td>
            <td class="item">{query0_GRUPO}</td>
            <td class="item">{query0_TIPO}</td>
            <td class="item">{query0_COLOR}</td>
            <td class="num">{query0_CANT}</td>
            <td class="num">{query0_P_COMPRA}</td>
            <td class="num">{query0_FOB}</td>
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
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td colspan="2"><b>Cant.: &nbsp;{cant}</b></td>
            
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align: right;"><b>{subtotal0_CANT}</b></td>
            <td></td>
            <td></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>

<br>
<br>
<br>

 <table style="text-align: left; width: 100%;" border="0"    cellpadding="0" cellspacing="0">
     <tr style="text-align: center">
         <th>--------------------------</th> <th>--------------------------</th>  <th>--------------------------</th> <th>--------------------------</th>          
     </tr>
     <tr style="text-align: center">
         <th> <input type="text" class="texto" size="24"  value="Cambiar aqui"> </th>
         <th> <input type="text" class="texto" size="24"  value="Cambiar aqui"> </th> 
         <th> <input type="text" class="texto" size="24"  value="Cambiar aqui"> </th>
         <th> <input type="text" class="texto" size="24"  value="Cambiar aqui"> </th>          
     </tr>
     <tr style="text-align: center">
         <th>Gerente General</th> <th>Gerente de Suc.</th>  <th>Auditor</th><th>Contador</th>         
     </tr>
     
 </table>

<!-- end:   end_query0 -->

