<!-- 
    Report Template File (codigo_barras)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header -->
	<treset_page>
<!-- end:   general_header -->


<!-- begin: start_query0 -->
<table style="text-align: left; width: 99%;" border="0"cellpadding="0" cellspacing="2">
    <tbody>
    <thead> <!--
<tr> <td colspan="50"> 
	<table style="text-align: left; width: 99%;" border="0"
	 cellpadding="0" cellspacing="2">
	  <tbody>
		<tr>
		  <td style="width: 184px;"> </td>
		  <td style="text-align: center;">
			<b>marijoa</b></td>
		  <td style="text-align: right;">
			<tpage><b>Pag: </b></tpage></td>
		</tr>
		<tr>
		  <td>
			<small><small>ycube plus RAD [1.2.9]</small></small>
		  </td>
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
	  </tbody>
	</table><hr />
</td></tr>  -->
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th>Código de Barras</th>
    </tr>

</thead>

<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <div class="block" ><tr>
          <table border="1" cellpadding="0" cellspacing="0"> <tr> <td> 
        
          <table border="0" cellpadding="0" cellspacing="0">
             <tr>
               <td width="150" height="20" align="center"> 
                   <font face="C39HrP24DhTt"  size="100">  {query0_CODIGO_BARRAS}  </font> 
               </td>
                 <td>
                    <div> Suc: {query0_LOCALIDAD}</div>  <div>Cant: {query0_p_cant}</div>                
                 </td> 
              
             </tr>
             <tr align="center">
               <td colspan="2">
                  <small> <small><small>  {query0_p_fam}-{query0_p_grupo}-{query0_p_tipo}-{query0_p_comp}</small> </small></small>  <br>
                  <small> <small><small>  {query0_p_temp}-{query0_p_estruc}-{query0_p_clasif}-{query0_p_color}</small></small></small>               
               </td>             
             </tr>    
             <tr align="center"> <td colspan="2"><small> <b>  Tejidos Marijoa </b> </small> </td>  </tr>
                       
          </table>
             
           </td> </tr>  
          </table>
        </div> </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr>
            <td></td>
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->

