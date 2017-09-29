<!-- 
    Report Template File (rep_ventas_FGT)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
	<treset_page>
        <style>

    tr{
       font-size:13px;
       height:24px;
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
			style="font-weight: bold;"><big>Reporte de Ventas Sector y COLOR  &nbsp; {desde}&nbsp;--&nbsp;{hasta}&nbsp;SUC: &nbsp;[{sup_rep_localidad}] </big></td>
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
        <th>FAM</th>
        <th>COLOR</th>
       
        <th style="text-align: right;">CANT</th>
        <th style="text-align: right;">SUBTOTAL</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <div class="block"><tr>
            <td><small>&nbsp;&nbsp;{query0_FAM}</small></td>
            <td><small>&nbsp;&nbsp;{query0_COLOR}</small></td>
            
            <td style="text-align: right;">{query0_CANT}&nbsp;&nbsp;</td>
            <td style="text-align: right;">{query0_SUBTOTAL}&nbsp;&nbsp;</td>
        </div> </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr>
            <td></td>
            
            <td></td>
            <td style="text-align: right;"><b>{total0_CANT}&nbsp;&nbsp;</b></td>
            <td style="text-align: right;"><b>{total0_SUBTOTAL}&nbsp;&nbsp;</b></td>
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td></td>
            
            <td></td>
            <td style="text-align: right;"><b>{subtotal0_CANT}&nbsp;&nbsp;</b></td>
            <td style="text-align: right;"><b>{subtotal0_SUBTOTAL}&nbsp;&nbsp;</b></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: query0_subtotal_row2 -->
        <tr>
            <td>&nbsp;&nbsp;{query0_FAM}</td>
            <td>&nbsp;&nbsp;{query0_COLOR}</td>
             
            <td style="text-align: right;"><b>{subtotal0_CANT}&nbsp;&nbsp;</b></td>
            <td style="text-align: right;"><b>{subtotal0_SUBTOTAL}&nbsp;&nbsp;</b></td>
        </tr>
<!-- end:    query0_subtotal_row2 -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->

