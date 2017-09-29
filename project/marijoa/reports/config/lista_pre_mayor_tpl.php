<!-- 
    Report Template File (lista_pre_mayor)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->

<style type="text/css">

.datosc{
   font-size:14px;
   font-weight:bolder;
}
.datos {
   font-size:13px;
}
.num{
   font-size:13px;
   text-align:right;
}

</style>

	<treset_page>
<!-- end:   general_header -->


<!-- begin: start_query0 -->
<table style="text-align: left; width: 99%;" border="1" cellpadding="0" cellspacing="0" >
    <tbody>
    <thead>
<tr> <td colspan="50"> 
	<table style="text-align: left; width: 100%;" border="0"
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
			style="font-weight: bold;"><big>Lista de Precios Mayoristas</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
        <tr> <td colspan="3" align="center"> <b>Se listar&aacute;n  un m&aacute;ximo de 2000 registros Ctrl + (+) Agrandar Letras  &nbsp;&nbsp;&nbsp; Ctrl + (-) Achicar </b> </td> </tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr class="datosc">
        <th>CODIGO</th>
        <th>FAMILIA</th>
        <th>GRUPO</th>
        <th>TIPO</th>
        <th>COLOR</th>
        <th>DESCRIP</th>
        {P1}
        {P2}
        {P3}
        {P4}
        {P5}
        {P6}
        {P7}
       <th>CANT</th>
        <th>SUC</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"> </td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <tr class="datos">
            <td>&nbsp;{query0_CODIGO}</td>
            <td>&nbsp;{query0_FAMILIA}</td>
            <td>&nbsp;{query0_GRUPO}</td>
            <td>&nbsp;{query0_TIPO}</td>
            <td>&nbsp;{query0_COLOR}</td>
            <td>&nbsp;{query0_DESCRIP}</td>
            {query0_PRECIO_1}
            {query0_PRECIO_2} 
            {query0_PRECIO_3}
            {query0_PRECIO_4}
            {query0_PRECIO_5}
            {query0_PRECIO_6}
            {query0_PRECIO_7}
             <td align="right">{query0_CANT}&nbsp;</td>
             <td align="center">{query0_SUC}</td>
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
            <td></td><td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td><td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->

