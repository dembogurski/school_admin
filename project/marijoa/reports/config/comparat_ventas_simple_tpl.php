<!-- 
    Report Template File (comparat_ventas)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
	<treset_page>
	<script type="text/javascript" src="include/jquery.js" > </script> 
        <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
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
.message{
	position: absolute;
	top: 0;
	z-index: 10;
	background:#ffc;
	padding:5px;
	border:1px solid #CCCCCC;
	text-align:center;
	font-weight:bold;

    width: 50%;
    height: auto;
    margin-top: 0px;
    margin-left: 25%;
    margin-right: 25%;  
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
/*
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
 
 }*/
 function abrirPopup(obj){ 
   //document.getElementById("message").style.visibility = 'visible';	
          
          var name = "input[name="+obj.id+"]";   
          var suma = 0;
   		  var htm = "";
          $(name).each(    
		      function() {  
		         var valor = parseFloat(   $(this).val() );   
		         suma  = suma + valor;
		      } 
	     ); 
	     if(suma < 0){
	         htm = htm + "<div style='background-color:red;'> <big>"+obj.id+" :&nbsp;&nbsp;  &Sigma;:&nbsp;&nbsp;  <b>"+suma+" <b> </big> </div> "; 
	     }else{
	         htm = htm + "<div style='background-color:#ffc;'> <big>"+obj.id+" :&nbsp;&nbsp;  &Sigma;:&nbsp;&nbsp;  <b>"+suma+" <b> </big> </div> "; 
	     }

	     // htm = htm + '';
	     
	        $("#message").append( htm );
	     
	        //$("#message").append( htm );	
	     $("#message").animate({ opacity:100 }, 2000); 
	   
}
   
function cerrarPopup(){   
   $("#message").html('<img  onclick="cerrarPopup()" style="float:right;cursor:pointer;" src="images/12-em-cross.png" />');
   $("#message").animate({ opacity:0 }, "fast");    
}
function limpiar(){   
   $("#message").html('');	
   $("#message").animate({ opacity:0 }, "fast");    
}
 
 $(window).scroll(function(){
  		$('#message').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});  
 });	
</script> 

	
<!-- end:   general_header -->


<!-- begin: start_query0 -->

 <div id="message" class="message"  style="opacity:0;" onclick="cerrarPopup()">  <img  onclick="cerrarPopup()" style="float:right;cursor:pointer;" src="images/12-em-cross.png" />  </div>
	       


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
			style="font-weight: bold;"><big>Reporte Comparativo de Ventas &nbsp; &nbsp;&nbsp; Valor K: {k}</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
		<tr align="center"> <td colspan="3"><b>Periodo: {sup_desde} <---> {sup_hasta} &nbsp; Sucursales: Todas incluyendo depositos </b>   </td></tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th>SECTOR</th>
        <th>GRUPO</th>
        <th>TIPO</th>
        <th>COLOR</th>
 
        <th style="text-align: right;">CANT_V</th>
        <th style="text-align: right;">STOCK</th>
        <th>PREVISTO</th>
        <th style="text-align: right;">COMPRAR</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
   <!--     <div class="block"><tr>
            <td>{query0_FAM}</td>
            <td>{query0_GRUPO}</td>
            <td>{query0_TIPO}</td>
            <td>{query0_COLOR}</td>
             <td></td>
            <td style="text-align: right;">{query0_CANT_V}</td>
            <td style="text-align: right;">{query0_STOCK}</td>
             <td style="text-align: right;">{PREVISTO}</td>
             {query0_DIFF} 
        </div> </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
    <!--    <tr style="background-color:#CCCC99;">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align: right;"><b>{total0_CANT_V}</b></td>
            <td style="text-align: right;"><b>{total0_STOCK}</b></td>
            <td style="text-align: right;"><b>{total0_DIFF}</b></td>
        </tr> -->
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr class="tot">
            <td class="item">{query0_FAM}</td>
            <td class="item">{query0_GRUPO}</td>
            <td class="item">{query0_TIPO}</td>
            <td class="item">  {query0_COLOR}   </td>            
            <td  class="num"> {subtotal0_CANT_V} </td>
            <td  class="num"> {subtotal0_STOCK} </td>
            <td  class="num">{PREVISTO}</td>
            {query0_DIFF} 
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->

<!-- begin: suc -->
 <tr> <td style="background:#FFFF99;" colspan="11" align="left"><b> Suc: &nbsp;&nbsp;&nbsp; {suc}</b></td></tr>
 
<!-- end:   suc -->