<!-- 
    Report Template File (imp_chq_bco_con)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header  
	<treset_page>
<!-- end:   general_header -->


<!-- begin: start_query0 -->
<table   align="right" border="0"cellpadding="0" cellspacing="4" >
     
   <!--
<tfoot>
	<tr><td colspan="50"></td></tr>
</tfoot>  -->
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
      <tr>
      <td></td>
	 <tr align="right" >
	   <td  height="30px" colspan="6" align="right"  > {query0_chq_valor}&nbsp;~~~~ </td> 
	  </tr>
	  	  
	        <!--  Fecha  -->
            <tr>  
	            <td height="42px" colspan="4" align="right" valign="bottom" >{dia}&nbsp;&nbsp;</td>
	            <td width="290px" align="center"  valign="bottom">{mes}</td>
	            <td width="90px" align="right"  valign="bottom"> {anio}</td>
            </tr>
            
            <!-- Fecha Pago -->
            <tr>         
               <td width="41px" align="right" height="26px" valign="bottom"> {diap} &nbsp;&nbsp;  </td>
               <td width="130px" align="right" valign="bottom" ><label>{mesp}&nbsp; </label> </td>
               <td width="350px"  valign="bottom" > &nbsp; {aniop}  </td>   
               
               <!-- Beneficiario -->            
               <td height="32px" align="left" colspan="3" valign="bottom"  >{query0_chq_benef}<label>&nbsp;</label> </td>
            </tr>
	            <tr >
	               <td height="26px" width="180px" colspan="1"> &nbsp; </td>
	               <td colspan="5"> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; {letras}&nbsp;~~~~~~~</td>
	            </tr>
	            <tr>
	               <td  height="128px" colspan="6"> &nbsp;&nbsp; </td>
	               
	            </tr>            
            <tr>
            
            </tr>
            </td>
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
            <td></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
     
 <!--   
    <script>
      self:print();
    </script>  -->
</table>
<!-- end:   end_query0 -->

