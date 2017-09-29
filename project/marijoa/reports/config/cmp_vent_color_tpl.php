<!-- 
    Report Template File (cmp_vent_color)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
	<treset_page>
	<script type="text/javascript" src="include/jquery.js" > </script> 
<style>
.fila{
 font-size:11px;
}
.tot{
 font-size:12px;
}

.diff{
  height:20px;
  text-align:right; 
}

</style>


<script>
 
 function limpiar(){  
	$("input[type=checkbox][checked]").each( 
		      function() {  
		          $(this).removeAttr("checked");   
		      } 
    );    	
 }

 function display(){
 	
 	var suma = 0;
 	
 	if( $('#cab').is(':checked') ||  $('#cab2').is(':checked') ){  
			$("input[type=checkbox]:not([checked])").each( 
		      function() { 
		      	 var id = "#"+this.id; 
		         //$(id).slideUp();  
		         $(id).fadeOut("fast");  
		      } 
		    ); 
		    // Sumar todos los chequeados
			$("input[type=checkbox]:checked").each( 
		      function() { 
		      	 var id = "#"+this.id;  
		         var text_id = "#diff_"+this.id; 
		         
		         if( $('#cab').is(':checked') ) {
		           if(id!='#cab'){
			            var valor = parseFloat(   $(text_id).val() );   
			         	suma = suma + valor;  
			       }
		         }else{
		          if(id!='#cab2'){
		         	 var valor = parseFloat(   $(text_id).val() );    
		         	 suma = suma + valor;
		          }
		         }

		      } 
		    );

		    $("#suma").html("<b><big>  Suma :"+suma+"     &nbsp;&nbsp;&nbsp;</big></b>"); 
		    $("#sumatr").fadeIn("slow");  
		    if(suma < 0){
		    	$("#sumatr").css("background-color","red");
		    }else{
		    	$("#sumatr").css("background-color","lightgray");
		    }
	    }else{
			$("input[type=checkbox]:not([checked])").each( 
		      function() { 
		      	 var id = "#"+this.id; 
		         //$(id).slideDown(); 
		         $(id).fadeIn("fast");   
		      } 
		    ); 
		     $("#sumatr").fadeOut("fast");  	    	
	    }
 
 }
 
 
</script> 

	
<!-- end:   general_header -->


<!-- begin: start_query0 -->
<table style="text-align: left; width: 99%;" border="1"cellpadding="0" cellspacing="0">
    <tbody>
    <thead>
<tr> <td colspan="50"> 
	<table style="text-align: left; width: 100%;" border="1"
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
			style="font-weight: bold;"><big>Reporte Comparativo de Ventas (Color)  &nbsp; &nbsp;&nbsp; Valor K: {k}</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
		<tr align="center"> <td colspan="3"><b>Periodo: {sup_desde} <---> {sup_hasta} &nbsp; Sucursales: {sucursales} </b>   </td></tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        
        <th>FAM</th>
        <th>GRUPO</th>
        <th>TIPO</th>
        <th>CLASIF</th>
        <th>ESTRUC</th>
        <th>COLOR</th>
        <th style="text-align: center;">CANT_V</th>
        <th style="text-align: center;">STOCK</th>
        <th style="text-align: center;">PREVISTO</th>
        <th style="text-align: center;">DIFF</th>
        <th style="text-align: center;"><input type="checkbox" id="cab" onclick="display()" title="Colapsar" > </th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <div class="block"><tr class="fila">
            <td>{query0_COD}</td>
            <td>{query0_FAM}</td>
            <td>{query0_GRUPO}</td>
            <td>{query0_TIPO}</td>
            <td>{query0_CLASIF}</td>
            <td>{query0_ESTRUC}</td>
            <td>{query0_COLOR}</td>
            <td style="text-align: right;">{query0_CANT_V}</td>
            <td style="text-align: right;">{query0_STOCK}</td> 
        </div> </tr>
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
            <td style="text-align: right;"><b>{total0_CANT_V}</b></td>
            <td style="text-align: right;"><b>{total0_STOCK}</b></td>
        </tr>
<!-- end:    query0_total_row -->

<!-- begin: query0_subtotal_row -->
        <tr class="tot" id="{check_id}" > 
            <td>{query0_FAM}</td>
            <td>{query0_GRUPO}</td>
            <td>{query0_TIPO}</td>
            <td>{query0_CLASIF}</td>
            <td>{query0_ESTRUC}</td>
            <td>{query0_COLOR}</td>
            <td style="text-align: right;"> {subtotal0_CANT_V} </td>
            <td style="text-align: right;"> {subtotal0_STOCK} </td>
            <td style="text-align: right;">{PREVISTO}</td>
             {query0_DIFF}    
             <td style="text-align: right;"><input type="checkbox" id="{check_id}"  ></td>   
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->

 <tr> <td style="background:#cccc99;" colspan="11" align="right"> <labe> <b>Marque los colores iguales por Sucursal que desea comparar y despues pulse "Colapsar" Arriba o Abajo &nbsp;&nbsp;&nbsp;</b> </label> 
  <input type="button" onclick="limpiar()" value="Desmarcar"> <span><b> Colapsar:<b> </span>   <input type="checkbox" id="cab2" onclick="display()" value="Colapsar" title="Colapsar" >  
 <tr> <td style="background:white;" colspan="11" align="left"><b> {tiempo}</b></td></tr>
  </td></tr>
     <tr style="background:#cccccc;display:none;" id="sumatr" > <td height="36px" colspan="11" align="right" id="suma" > </td></tr>
    </tbody>
</table>
<!-- end:   end_query0 -->

<!-- begin: suc -->
 <tr> <td style="background:#FFFF99;" colspan="11" align="left"><b> Suc: &nbsp;&nbsp;&nbsp; {suc}</b></td></tr>
 
<!-- end:   suc -->

<!-- begin: bar -->
     
<!-- end:   bar -->

