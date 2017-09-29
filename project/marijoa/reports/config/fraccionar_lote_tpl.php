<!-- 
    Report Template File (fraccionar_lote)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
       <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
       
       
       <script src="include/jquery-1.8.2.js"></script>
       
       <script src="include/jquery-ui.js"></script>
       
       <link rel="stylesheet" href="templates/jquery-ui.css" />
       
       <script>
         function abrirVentana(){
             $( "#dialog" ).dialog({ 
                width: 750,
                height: 600,
                modal: true,
                buttons: {
                "Puede cerrar esta ventana y proceder a Imprimir": function() {
                $(this).dialog("close");
                } 
                },
                    close: function() { self.print();
                }
            });         
         }
         document.oncontextmenu = function(){
            alert("Click derecho se ha deshabilitado tambien...:P");
            return false;
         }
       </script>
       
 <script language="javascript" type="text/javascript">
    //this code handles the F5/Ctrl+F5/Ctrl+R
    document.onkeydown = checkKeycode
    function checkKeycode(e) {
        var keycode;
        
        if (window.event)
            keycode = window.event.keyCode;
        else if (e)
            keycode = e.which;

        // Mozilla firefox
        if ($.browser.mozilla) {
            if (keycode == 116 ||(e.ctrlKey && keycode == 82)) {
                if (e.preventDefault)
                {
                    e.preventDefault();
                    e.stopPropagation();
                      alert("Actualizar esta desabilitado...");
                }
            }
        } 
      
    }
</script>

       <treset_page>
           
<style>
    .alerta{
       background: pink;
       font-weight: bolder;
       font-size: 14px;
       color:red;
       -moz-box-shadow: 10px 10px 5px #888888;
       padding: 4px;
       margin: 4px;
       border:1px solid;
       -moz-border-radius:16px;
    }
</style>        
<!-- end:   general_header -->


 


<!-- begin: ventana   -->

   <div id="dialog" title="Datos del Fraccionamiento">
         {mensaje}  
   </div>     
    
<!-- end:    ventana -->

<!-- begin: alerta   -->

   <div  class="alerta"  >
       <img src="images/dialog-warning.png" width="36" height="36" /> &nbsp;&nbsp;  {alerta}  
   </div>    
 
    
<!-- end:    alerta -->



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
		                    <div > <font {tam}>   Hecho en:  {query0_p_echo_en}  &nbsp;&nbsp; Ref: {REF} &nbsp; ({user__})&nbsp;({impresiones}) </font>  </div>
		                    <div > <font {tam}>   Importado por:  {query0_p_import}   </font>  </div>
		                    <div > <font {tam}>   Composici&oacute;n:  {query0_p_comp}   </font>  </div>
		                    <div > <font {tam}>   Ancho:  {query0_p_ancho}  &nbsp;Mts. &nbsp;&nbsp;&nbsp;      Suc: {query0_LOCALIDAD} &nbsp;&nbsp; Cant:  {query0_p_cant} m. </font>  </div>
 		                   <!-- <div > <font {tam}>   Precio: {query0_p_precio} &nbsp;G$ &nbsp;&nbsp;&nbsp; Cant:  {query0_p_cant} m. </font> </div>  --> 
		          </td>              
             </tr> 	                
              
              <!-- Descripcion -->
  	           <tr align="left" height="18px"  >
	             <!--  <td  {ancho} > <label {tam}>  {query0_p_grupo}-{query0_p_tipo}-{query0_p_color}-{query0_p_descri}-    </label>    <br>    </td>          -->   
	             <td  colspan="2" {ancho}  > <label {tam}>  {combinado}  </label>    <br>    </td> 
	           </tr>   
	             <tr valign="middle">
				       <td height="30px" width="30px" > <label style="font-size:11px;font-weight:bolder;"> Precio <br> {query0_p_precio}   G$ </label> </td> 
		               <td   {tamcode} align="center" valign="middle" > 					         
		                  <!--  <font face="C39HrP24DhTt" style="font-size:36px" > <big> {query0_CODIGO_BARRAS} </big> </font>  -->
		                  <img border="0" src="{query0_CODIGO_BARRAS}" width="140px" height="65px" align="middle" >
		               </td> 
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
