<!-- 
    Report Template File (libro_mayor)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
       <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
	<treset_page>
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
			style="font-weight: bold;"><big>Libro Mayor</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
                <tr> <td></td> <td style="text-align: center;font-weight: bolder">Periodo: &nbsp; {desde}&nbsp; &lArr;&rArr; &nbsp;{hasta}&nbsp;&nbsp;&nbsp;Suc:&nbsp; {sup_suc}</td><td></td></tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th>NRO</th>
        <th>FECHA</th>
        <th>SUC</th>
        <th>CODIGO</th>
        <th>DESCRIP</th>
        <th style="display: {display_suc}">S_ANT_SUC</th>
        <th style="display: {display_all}">S_ANT</th>
        <th style="text-align: right;">DEBE</th>
        <th style="text-align: right;">HABER</th>
        <th style="text-align: right;display: {display_suc}">SALDO_SUC</th>
        <th style="text-align: right;display: {display_all}">SALDO</th>        
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr>
            <td class="item" style="font-size: 12px">{query0_NRO}</td>
            <td class="item" style="font-size: 12px">{query0_FECHA}</td>
            <td class="item" style="font-size: 12px">{query0_SUC}</td>
            <td class="item" style="font-size: 12px">{query0_CODIGO}</td>
            <td class="item" style="font-size: 12px">{query0_DESCRIP}</td>
            <td class="num"  style="font-size: 12px;display: {display_suc}">{query0_S_ANT_SUC}</td>
            <td class="num"  style="font-size: 12px;display: {display_all}">{query0_S_ANT}</td>
            <td class="num"  style="font-size: 12px">{query0_DEBE}</td>
            <td class="num"  style="font-size: 12px">{query0_HABER}</td>
            <td class="num"  style="font-size: 12px;display: {display_suc}">{query0_SALDO_SUC}</td>
            <td class="num"  style="font-size: 12px;display: {display_all}">{query0_SALDO}</td>
         </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
             <td></td>
            <td style="display: {display_suc}"></td>
            <td style="display: {display_all}"></td>
           
            <td style="text-align: right; "><b>{total0_DEBE} </b></td>
            <td style="text-align: right;"><b>{total0_HABER}</b></td>
            <td style="text-align: right;display: {display_suc}"><b>{total0_SALDO_SUC}</b></td>
            <td style="text-align: right;display: {display_all}"><b>{total0_SALDO}</b></td>
            
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td> 
            <td style="display: {display_suc}"></td>
            <td style="display: {display_all}"></td> 
            <td style="text-align: right; font-size: 13px"><b>{subtotal0_DEBE} </b></td>
            <td style="text-align: right; font-size: 13px"><b>{subtotal0_HABER}</b></td>
            <td style="text-align: right; font-size: 13px;display: {display_suc}"><b>{subtotal0_SALDO_SUC}</b></td>
            <td style="text-align: right; font-size: 13px;display: {display_all}"><b>{subtotal0_SALDO}</b></td>
            
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->

