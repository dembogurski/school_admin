<!-- 
    Report Template File (imprimir_lista)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header -->
	<treset_page>
<!-- end:   general_header -->


<!-- begin: start_query0 -->
<table style="text-align: left; width: 99%;" border="1"cellpadding="0" cellspacing="0">
    
    <thead>
<tr> <td colspan="50"> 
	<table style="text-align: left; width: 99%;" border="0"
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
			<small><small>ycube plus RAD [1.2.29]</small></small>
		  </td>
		  <td style="text-align: center;"><big
			style="font-weight: bold;"><big>Lista de precios</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
	  </tbody>
	</table> 
</td></tr> 

</thead>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <td align="center"><b> CODIGO </b>   </td>
        <td width="100%" align="center"><b> DESCRIPCION </b></td>
        <td align="center"><b>{PRECIO_1} </b></td>
        <td align="center"><b>{PRECIO_2} </b></td>
        <td align="center"><b>{PRECIO_3} </b></td>
        <td align="center"><b>{PRECIO_4} </b></td>
        <td align="center"><b>{PRECIO_5} </b></td>
    </tr>

<!--
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>  -->
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <tr>
            <td>{query0_CODIGO}</td>
            <td width="100%">{query0_DESCRIPCION}</td>
            <td align="right">{query0_PRECIO_1}</td>
            <td align="right">{query0_PRECIO_2}</td>
            <td align="right">{query0_PRECIO_3}</td>
            <td align="right">{query0_PRECIO_4}</td>
            <td align="right">{query0_PRECIO_5}</td>
         </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
    <!--    <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>  -->
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
     <!--   <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr> -->
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    
</table>
<!-- end:   end_query0 -->

