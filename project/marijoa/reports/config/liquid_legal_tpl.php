<!-- 
    Report Template File (liquid_legal)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header -->
	<treset_page>
<!-- end:   general_header -->


<!-- begin: start_query0 -->
<table style="text-align: left; width: 99%;" border="0" cellpadding="0" cellspacing="0">
    <tbody>
    <thead>
<tr> <td colspan="5"> 
	<table style="text-align: left; width: 100%;" border="0" 	 cellpadding="0" cellspacing="0">
	  <tbody>
	   <tr> <td height="{bsup}px" colspan="4"> &nbsp;   </td> </tr>
		<tr>
		  <td width="{izqar}px" height="34px">   &nbsp;   </td>     <td colspan="2"><b> &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; {empleador} </b> </td>  <td><b> {patronal} </b></td> 
		</tr> 
		<tr>
		  <td height="26px">   &nbsp;   </td>    <td  colspan="2"> &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<b>  {nombre}  </td>     <td>   &nbsp;   </td>   
		</tr> 	
		 <tr>

		 <td colspan="4" > 
		   <table width="100%" border="0" cellpadding="0" cellspacing="0">
		    <tr style="font-size:14px;font-weight: bolder"> 
		     <td width="140px">   &nbsp;   </td> 
		     <td width="20px"  height="30px"> &nbsp;  </td>    <td > &nbsp;&nbsp;&nbsp;&nbsp;{periodo}</td> 
                     <td  height="30px"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {dia} </td> 
                     <td align="center" width="120px">   {mesa} &nbsp; {anioc} </td> <td align="right" style="width: 100px"> &nbsp;  </td> <td> &nbsp;&nbsp;</td>
		    </tr>
		   </table>
		  </td>
		  
		 </tr> 	
		 
	  </tbody>
	</table> 
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th height="40px">  &nbsp; </th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"> </td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
    <tr>
         <td> </td>
     </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr> 
        
        <td > 
           <table width="100%;padding-right:20px" border="0"  cellpadding="0" cellspacing="0">   
  	            <tr style="font-size:10px;"> 
	            <td >  </td> 
	            <td >  </td>
	            <td width="{w}">    </td>
	            <td width="{w}">    </td> 
	            <td width="{w}">   </td> 
                    <td width="{w}" style="height: 30px">  {sup_tipo} </td> 
	            <td width="{w}">  </td> 
	            <td >  </td> 
	            <td width="{w}">   </td>
	            <td  >    </td>
	            <td  >    </td>
	            <td  >    </td>
	           </tr>           
	           <tr style="font-size:10px;"> 
	            <td align="center" width="16px"> {dt} </td> 
	            <td style="width:36px;text-align:center">  {salario} </td>
	            <td width="{w}" style="text-align:center"> {sub_total} </td>
	            <td style="text-align:center;width:40px"> {horas_extras} </td> 
	            <td width="{w}" style="text-align:center"> {comis} </td> 
	            <td width="{w}" style="text-align:right"> {oi} </td> 
	            <td width="{w}" style="text-align:center"> {total_s} </td> 
	            <td style="text-align:center;width:20px"></td> 
	            <td style="text-align:left;width:40px"> {ips} </td>
	            <td   style="text-align:right;width:60px"> {od}&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;</td>
	            <td align="right" width="{w}"> {todal_dsc} </td>
	            <td align="right" width="100px;"> {saldo} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
&nbsp;&nbsp;&nbsp;</td>
         
	           </tr>  
			   <tr> 
	             <td colspan="12" height="50px"> &nbsp;&nbsp;&nbsp;&nbsp;   </td>  
	           </tr>		           
			   <tr> 
			     <td>&nbsp;</td>
	             <td colspan="11"><b><big>  {suc}&nbsp;&nbsp;   {dia}/{m_code}/{anio} </big> </b>   </td>  
	           </tr>	           
	           
           </table> 
         </td>   
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

<script>
 //self.print();
</script>

<!-- end:   end_query0 -->

