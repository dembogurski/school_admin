<!-- 
    Report Template File (promo_primavera)

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
		  <td style="width: 20%;height:40px;">{sup_df_fact_num} </td>
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
			style="font-weight: bold;"><big>Promo Primavera en Marijoa</big></td>
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

<!-- begin: crucero -->
         <tr>
             <th style="text-align: left;padding-left: 2px" >TOTAL SECTOR CRUCERO </th> <td class="num" style="font-size: 16px">{query0_CRUCERO} Gs.</td> <td style="width:50%;text-align: left">&nbsp;{ok_error}</td>
         </tr>
<!-- end:    crucero -->
<!-- begin: hogar -->
         <tr>
             <th  style="text-align: left;padding-left: 2px">TOTAL SECTOR HOGAR </th> <td class="num" style="font-size: 16px">{query0_HOGAR} Gs.</td> <td style="width:50%;text-align: left">&nbsp;{ok_error}</td>
         </tr>
<!-- end:    hogar -->

<!-- begin: combo -->
         <tr>
             <th  style="text-align: left;padding-left: 2px">CANT SECTOR HOGAR SABANAS 300 HILOS</th> <td class="num" style="font-size: 16px">{query0_HOGAR} Gs.</td> <td style="width:50%;text-align: left">&nbsp;{ok_error}</td>
         </tr>
<!-- end:    combo -->

<!-- begin: info -->
        <tr>
             <th  style="text-align: left;padding-left: 2px">{info}</th> <td class="num" style="font-size: 16px">{descuento} Gs.</td> <td style="width:50%;text-align: left">&nbsp;{ok_error}</td>
         </tr>
<!-- end:    info -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->

