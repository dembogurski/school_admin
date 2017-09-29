<!-- 
    Report Template File (codigo_barras)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: start_query0 -->
   

<!-- end:   start_query0 -->
<!-- begin: query0_data_row --> 
<table border="0" cellpadding="0" cellspacing="0" width="210px" >
   <tr> 
      <td>  <div> <label>  </label> </div> </td>
   </tr> 
          
           <td >   
                    
	        <table  border="0"   cellpadding="2" cellspacing="0">
	        <tr>  
            <!-- <td {izq}> 
                <label> {izq} </label>  
            </td>  -->
             <td> 
              <table border="0"  width="100%" cellpadding="0" cellspacing="2" > 
             
              <!--<tr align="center"> <td colspan="2"><small> <b><i>  Tejidos Marijoa </i></b> </small> </td>  </tr>  -->
              
              <!-- Datos  -->
             <tr> 
	             <td colspan="2" align="left" width="220px">		                    		                   
		           <div > <font {tam}>   Codigo: {cod_cli} </font>  </div>		                    
 		           <img border="0" src="{query0_CODIGO_BARRAS_CLI}" width="140px" height="20px" align="middle" >
                           <div > <font {tam}>   Hecho en:  {query0_p_echo_en}  &nbsp; Ancho:  {query0_p_ancho}  &nbsp;Mts. </font>  </div>
		                    <div > <font {tam}>   Importado por:  {query0_p_import}   </font>  </div>	                    
		                    
		      </td>              
             </tr> 	                
              
              <!-- Descripcion -->
  	           <tr align="left" height="18px"  >
	             <!--  <td  {ancho} > <label {tam}>  {query0_p_grupo}-{query0_p_tipo}-{query0_p_color}-{query0_p_descri}-    </label>    <br>    </td>          -->   
	             <td  colspan="2" {ancho}  > <label {tam}>  {combinado}  </label>    <br>    </td> 
	           </tr>   
	             <tr valign="middle">
				  
		               <td   {tamcode} align="center" valign="middle" > 					         
		                  <!--  <font face="C39HrP24DhTt" style="font-size:36px" > <big> {query0_CODIGO_BARRAS} </big> </font>  -->
		                  <img border="0" src="{query0_CODIGO_BARRAS}" width="200px" height="30px" align="middle" >
		               </td> 
	             </tr> 
                     <tr>
                         <td style="text-align: center;font-size: 11">{codigo}</td>
                     </tr>	 	  
		  </tr>  
          <!--  <tr>
     		   <td  colspan="2" >
                    <table height="0px" border="0"> 
                       <tr> <td  height="0px" colspan="2">   </td> </tr>	
                       {salto_linea} 	 			   
					</table>   
	     	   </td> 
	      </tr>    	  --> 
	          </table>   
	            
	               
           </td> 
		 
		   </tr>  
           
           </table>
          
            
           
          </td> 
         </tr>             
          </table> 
<!--          {saltos}    -->
 
<!--
<script>
  self:print();
</script>

-->
<!-- end:   end_query0 -->

