<!-- 
    Report Template File (prorrat_gastos)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
       <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
       <script type="text/javascript" src="include/jquery.js" > </script>
       
       <treset_page>
            
<script>
 
 var sucs = new Array();
 
 var master = new Array();
   
 var k = 0;
 
 var tiempo = 0;
 
 var current_cod = "";
 
 function generarAsientos(){
     //alert(k+"  "+flag);
      
         var array = master[k]; 
         var celda = array[0];var suc = array[1];var cuenta = array[2];
         var valor = array[3];var suc_gasto = array[4];
        
         execServer(celda,suc,cuenta,valor,suc_gasto);  
     
 } 
 
 //$(this).removeAttr("checked");   
 function preCargarArreglo(){
      
     var suc_gasto = $("#suc_gasto").val();
     
    $("input[type=checkbox][checked]").each( 
	  function(){
                var codigo = this.id.substring(6,20);
                var id_cuenta = "#cuenta_"+codigo;
		var cuenta = $(id_cuenta).text(); 
                
                var celda = "#celda_"+codigo;
                 
                for(var i = 0; i < sucs.length; i++){
                   var suc = sucs[i];                   
                   var valor_x_suc = "#"+suc+"_"+codigo; 
                   var valor = $(valor_x_suc).text().replace(".", "").replace(".", "").replace(".", ""); 
                                        
                   var hijo = [celda,suc,cuenta,valor,suc_gasto];
                   master.push(hijo); 
                    //execServer(celda,suc,cuenta,valor,suc_gasto);  
                }            
	  } 
    );
    
    //alert(master);
    
    generarAsientos(); 	
 }     
 function execServer(celda,suc,codigo,valor,suc_gasto){
     
     $.ajax({
                type: "POST",
                url: "include/Ajax.class.php",
                data: "action=gen_asiento_gastos_prorrateados&suc="+suc+"&codigo="+codigo+"&valor="+valor+"&suc_gasto="+suc_gasto,
                async:true,
                dataType: "html",
                beforeSend: function(objeto){
                    $(celda).html(" "+suc+"  <img src='images/working.gif' height='18px' width='24px'>");
                },
                complete: function(objeto, exito){
                    if(exito=="success"){ 
                        //$(celda).html( objeto.responseText  );
                        k++;
                        
                        
                        if(current_cod != codigo){
                            current_cod = codigo; 
                            tiempo = 0;
                        } 
                        var res = parseFloat(objeto.responseText); 
                        tiempo +=res; 
                        var pos = tiempo.toString().indexOf(".");
                        var t = tiempo.toString().substring(0,pos + 3)
                        $(celda).html(""+ t+"  &nbsp; Seg.  <img src='images/ok.png' >"  );
                        
                        
                        generarAsientos();
                    }
                }
            });     
 }
 
 
</script> 
<!-- end:   general_header -->


<!-- begin: start_query0 -->

<input type="hidden" id="suc_gasto" value="{suc_gasto}" >

<table style="text-align: left; width: 100%;" border="1" cellpadding="0" cellspacing="0">
    <tbody>
    <thead>
<tr> <td colspan="50"> 
	<table style="text-align: left; width: 100%;" border="1"
	 cellpadding="0" cellspacing="0">
	  <tbody>
		<tr>
		  <td style="width: 20%;height:40px;"> </td>
		  <td style="text-align: center;width: 60%;">
			<b>Marijoa</b></td>
		  <td style="text-align: right;">
			<tpage><b>Pag: </b></tpage></td>
		</tr>
		<tr>
		  <td  style="width: 20%;">
			<small><small>ycube plus RAD [1.2.31]</small></small>
		  </td>
		  <td style="text-align: center;"><big
			style="font-weight: bold;"><big>Prorrateo de Gastos Sucursal {sup_empr}</big></td>
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
        <th>SUC</th>
        <th>TOTAL DE VENTAS</th>
        <th>%</th>
        <th></th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr>
            <td class="item" >{query0_SUC}</td>
            <td class="num"  >{query0_TOTAL}</td>
            <td class="num" title="{porc_title}"  >{porc}</td>
            <td style="width: 50%"></td>
         </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr>
            <td></td>
            <td></td>
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td></td>
            <td style="text-align: right;"><b>{subtotal0_TOTAL}</b></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->


<!-- begin: gastos_h -->
 <table style="text-align: left; width: 100%;" border="1" cellpadding="0" cellspacing="0">
     <tr> <th>CODIGO</th> <th>CUENTA</th>  <th>VALOR</th> {gheader} <th></th> </tr>  
<!-- end:   gastos_h -->


<!-- begin: gastos -->
<tr> <td class="item" id="cuenta_{codigo_rem}" >{codigo}</td>  <td class="item">{cuenta}</td> <td class="num">{valor}</td> {data} <td id="celda_{codigo_rem}" class="item"> <input id="check_{codigo_rem}" type="checkbox" checked> </td> 

</tr> 
<!-- end:   gastos -->


<!-- begin: gastos_f -->

<tr>
    <td colspan="6" align="right">
       <input type="button" onclick="preCargarArreglo()" value="Generar Asientos"> 
    </td>    
</tr>

 </table>
<!-- end:   gastos_f -->