<!-- 
    Report Template File (prods_similares)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->
<!-- begin: general_header noeval -->
	<treset_page>

    <style>
    
    th{
      text-align:center;
      font-size:12px;
      font-weight:bolder;
      
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
			style="font-weight: bold;"><big>Productos Similares a: {sup_lcod} </big></td>
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
        <th>DESCRIP</th> 
        <th>SUC</th><th>CANT</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <tr>
            <td class="item">{query0_CODIGO}</td>
            <td class="item">{query0_FAMILIA}</td>
            <td class="item">{query0_GRUPO}</td>
            <td class="item">{query0_TIPO}</td>
            <td class="item">{query0_COLOR}</td>
            <td class="item">{query0_DESCRIP}</td>
            <td class="item">{query0_SUC}</td>
            <td class="num">{query0_CANT}</td>
            
        </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr>
            <td colspan="8" > <hr> </td>
 
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td colspan="8" > <hr> </td>
 
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->

