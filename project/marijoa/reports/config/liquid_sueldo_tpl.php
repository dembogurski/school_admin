<!-- 
    Report Template File (liquid_sueldo)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
       <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
       <script type="text/javascript" src="include/jquery.js" > </script>
	<treset_page>
            
            <style>
                th{
                   font-weight: bolder;
                   text-align: left;
                   font-size: 12px;
                   padding-left: 4px
                }   
                .n{
                    text-align: right;
                    padding-right: 4px
                }
            </style>     
            
<script type="text/javascript">
    window.onload = maxWindow;

    function maxWindow() {
        window.moveTo(0, 0);

         window.opener.close();
         
        if (document.all) {
            top.window.resizeTo(screen.availWidth, screen.availHeight);
        }

        else if (document.layers || document.getElementById) {
            if (top.window.outerHeight < screen.availHeight || top.window.outerWidth < screen.availWidth) {
                top.window.outerHeight = screen.availHeight;
                top.window.outerWidth = screen.availWidth;
            }
        }
    }
    jQuery(document).bind("keyup keydown", function(e){
        if(e.ctrlKey && e.keyCode == 80){
            return false;
        }
    }); 
    
    var size = [window.width,window.height];  //public variable
 

    $(window).resize(function(){
        //window.resizeTo(size[0],size[1]);
        maxWindow();
    });
    $(document).ready(function(){
        $(document).bind("contextmenu",function(e){
            return false;
        });
        $("#marco").mouseleave(function(){
            alert("Por motivos de Seguridad esta ventana se cerrará");
             window.close();
       });
       $("#marco").mouseenter(function(){
       
          //console.log("Adentro<<<<");
          
       });
    });
    $(document).keyup(function(e){
         if(e.keyCode == 44)   $("body").hide(); return false;
    });
    
    function enfocarMouse(){
       var p = $("#cerrar" );
       var pos = p.position();  
       //alert(pos.top +"  "+ pos.left + "  ");
        
       // $(document).mouseXPos( pos.left + 8 ).mouseYPos(pos.top + 6);
    } 
    
    function controlar(){
        var p = $("#marco" );
        var pos = p.position(); 
    }
    
     
    
    
    function cerrar(){
       self.close();
    }
</script>            
<!-- end:   general_header -->


<!-- begin: start_query0 -->
<div id="marco" style="width:100%;height:96%;border:1px solid black; padding-left: 4px;padding-top: 4px">
<table id="sueldo" style="text-align: center; width: 60%;" border="1" cellpadding="0" cellspacing="0">
    <tbody>
    <thead>
<tr> <td colspan="50"> 
	<table style="text-align: left; width: 100%;" border="1" cellpadding="0" cellspacing="0">
	  <tbody>
		<tr>
		  <td style="width: 20%;height:40px;"> </td>
		  <td style="text-align: center;width: 60%;"><big style="font-weight: bold;">Liquidaci&oacute;n de Sueldo</big>  </td>
		  <td style="text-align: right;">	 </td>
		</tr>
		<tr>
		  <td  style="width: 20%;">
			<small><small>ycube plus RAD [1.2.31]</small></small>
		  </td>
		  <td style="text-align: center;"><big> {query0_FUNCIONARIO}&nbsp;&nbsp;&nbsp; Mes: {query0_sue_mes}-{query0_anio}  </td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
           
        
    </tr>
</thead>
<tfoot>
	<tr><td colspan="4"><hr /></td></tr>
</tfoot>

<!-- end:   header0 -->

<!-- begin: query0_data_row -->
 
    <tr> <th colspan="2" style="text-align: center;background: lightgray">HABERES</th><th colspan="2" style="text-align: center;background: lightgray">DESCUENTOS</th>    </tr>
    <tr> <th>PAGO BASICO</th><td  class="n">{query0_SUELDO}</td> <th>AUSENCIAS</th><td class="n">{query0_AUSENCIAS}</td>  </tr>  
               <tr><th>VARIABLE</th><td class="n">{query0_VARIABLE}</td> <th>MALAS_OPERACIONES</th> <td class="n">{query0_MALAS_OPERACIONES}</td>  </tr>
               <tr> <th>AGUINALDO</th><td class="n">{query0_AGUINALDO}</td>   <th>SANCIONES</th><td class="n">{query0_SANCIONES}</td></tr> 
               <tr> <th>VACACIONES</th><td class="n">{query0_VACACIONES}</td> <th>TELEFONIA</th><td class="n">{query0_TELEFONIA}</td></tr>
               <tr> <th>FERIADOS</th><td class="n">{query0_FERIADOS}</td>     <th>LINEAS_CREDITO</th><td class="n">{query0_LINEAS_CREDITO}</td></tr>
               <tr> <th>HORAS EXTRAS</th><td class="n">{query0_EXTRAS}</td>   <th>APORTES SOLIDARIO</th><td class="n">{query0_APORTES}</td></tr>
               <tr> <th>REEMBOLSOS</th><td class="n">{query0_REEMBOLSOS}</td> <th>ADELANTOS</th><td class="n">{query0_ADELANTOS}</tr>
               <tr> <th>INDEMNIZACION</th><td class="n">{query0_INDEMNIZACION}</td><th>ASOCIACIONES</th><td class="n">{query0_ASOCIACIONES}</td> </tr> 
               <tr> <th style="background: lightgray">TOTAL HABERES </th> <td class="n"><b>{TOTAL_HABERES}</b></td> <th>IPS</th><td class="n">{query0_IPS}</td></tr> 
               <tr> <th colspan="2"></th> <th>REPOSO</th><td class="n">{query0_REPOSO}</td></tr> 
               <tr><th colspan="2"></th> <th>AJUSTES</th><td class="n">{query0_AJUSTES}</td></tr>
               <tr><th colspan="2"></th> <th>UNIFORME</th><td class="n">{query0_UNIFORME}</td></tr>
               <tr><th colspan="2"></th> <th style="background: lightgray">TOTAL DESCUENTOS</th><td class="n"  ><b>{TOTAL_DESCUENTOS}</b></td></tr>

      
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr>            
            <td style="padding-left: 4px"><b>TOTAL:</b>&nbsp;{TOTAL} Gs.</td>
            <td></td>
            <td></td>
        </tr>
        <tr> <td colspan="4" style="text-align: center">  <input id="cerrar" style="font-size: 10px;font-weight: bolder" type="button" onclick="cerrar()" value="Cerrar">  </td> </tr>
<!-- end:    query0_total_row -->
 
<!-- begin: end_query0 -->
    </tbody>
</table>
    <div style="text-align: center;width: 100%;bottom: 30px;position: absolute"> No mueva el mouse fuera de este Marco </div>  
</div>    
<!-- end:   end_query0 -->

