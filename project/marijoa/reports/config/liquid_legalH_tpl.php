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
<table style="text-align: left; width: 99%;" border="0"cellpadding="0" cellspacing="0">
    <tbody>
    <thead>
<tr> <td colspan="5"> 
	<table style="text-align: left; width: 100%;" border="0" ellpadding="0" cellspacing="0">
	  <tbody>
	   <tr> <td height="{bsup}px" colspan="4"> &nbsp;   </td> </tr>
		<tr>
		  <td width="{izqar}px" height="34px">   &nbsp;   </td>     <td colspan="2"><b>   &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; {empleador} </b> </td>  <td><b> {patronal} </b></td> 
		</tr> 
		<tr>
		  <td height="26px">   &nbsp;   </td>    <td  colspan="2"> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<b>  {nombre}  </td>     <td>   &nbsp;   </td>   
		</tr> 	
		 <tr>

		 <td colspan="4" > 
		   <table width="100%" border="0" cellpadding="0" cellspacing="0">
		    <tr style="font-size:12px;"> 
		     <td width="60px">   &nbsp;   </td> 
		      <td width="60px"  height="30px"> &nbsp;  </td>    <td> {periodo} </td> <td width="120px"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {dia} </td> <td>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  {mesa} </td> <td align="right">&nbsp;&nbsp;&nbsp; {anioc}  &nbsp;  </td>
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
        <th height="65px">  &nbsp; </th>
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
        <td  width="{izq}px"> &nbsp; </td>
        <td > 
           <table width="100%" border="1" cellpadding="0" cellspacing="0">   
  	        <!--   <tr> 
	            <td width="{w}"> dt </td> 
	            <td width="{w}"> salario </td>
	            <td width="{w}">  sub_total  </td>
	            <td width="{w}">  horas_extras  </td> 
	            <td width="{w}">  comis </td> 
	            <td width="{w}">  oi </td> 
	            <td width="{w}"> total_s  </td> 
	            <td width="{w}">  total_s  </td> 
	            <td width="{w}"> ips  </td>
	            <td width="{w}">  oi  </td>
	            <td width="{w}">  todal_dsc  </td>
	            <td width="100px">  saldo ac cobrar  </td>
	           </tr>           -->
	           <tr style="font-size:10px;"> 
	            <td align="left" width="20px"> {dt} </td> 
	            <td width="{w}"> {salario} </td>
	            <td width="{w}"> {sub_total} </td>
	            <td width="{w}"> {horas_extras} </td> 
	            <td width="{w}"> {comis} </td> 
	            <td width="{w}"> {oi} </td> 
	            <td width="{w}"> {total_s} </td> 
	            <td width="{w}"> &nbsp; </td> 
	            <td width="{w}"> {ips} </td>
	            <td width="{w}"> {oi} </td>
	            <td align="right" width="{w}"> {todal_dsc} </td>
	            <td align="right" width="100px"> {saldo} </td>
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

