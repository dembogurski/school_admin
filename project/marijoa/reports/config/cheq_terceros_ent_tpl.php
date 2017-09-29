<!-- 
    Report Template File (cheq_terceros)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
<link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
 <script type="text/javascript" src="include/jquery.js" > </script>   
	<treset_page>
 
            
<script langguage="javascript">
    
    var valorUs = 0;
    var valorGs = 0;
    var cantUs = 0;
    var cantGs = 0;
    
$(function(){
    $( "[type=checkbox]").click(function(){
        var ch = $(this).is(":checked");        
        var id =  $(this).parent().parent().attr("id").substring(3,30);
        if(ch){
            $(this).parent().parent().addClass("selected"); 
             marcar(id,"Recibido");
        }else{
            $(this).parent().parent().removeClass("selected"); 
             marcar(id,"No Recibido");
        }  
         
        marcar(id);
    });
    
     $('.clicable').click(function(e){
        var chd = $(this).parent().find('input:checkbox:first').is(":checked");      
        var id =  $(this).parent().attr("id").substring(3,30);
        if(chd){
           $(this).parent().find('input:checkbox:first').removeAttr('checked'); 
           $(this).parent().removeClass("selected"); 
           marcar(id,"No Recibido");
          
        }else{
           $(this).parent().find('input:checkbox:first').attr('checked', 'checked'); 
           $(this).parent().addClass("selected"); 
             marcar(id,"Recibido");
        } 
         
  }); 
});

function marcar(id,recibido){
        if(recibido == undefined){
            recibido = 'No Recibido';
        }
        valorUs = 0;
        valorGs = 0;
        cantUs = 0;
        cantGs = 0;
        $.ajax({
                type: "POST",
                url: "include/Ajax.class.php",
                data: {"action":"marcar_cheque_como_recibido","id":id,"recibido":recibido}, 
                async:true,
                dataType: "html",
                beforeSend: function(){
                    $("#msg").html("<img src='img/loading.gif' width='22px' height='22px' >");                      
                }, 
                complete: function(objeto, exito) {
                    if (exito == "success") {                          
                        var result = $.trim(objeto.responseText); 
                        if(recibido == "Recibido"){
                            $("#img_"+id).fadeIn("fast");
                        }else{                        
                          $("#img_"+id).fadeOut("fast");
                        }  
                    }
                },
                error: function() {
                    $("#msg").html("Ocurrio un error en la comunicacion con el Servidor...");
                }
            }); 
        $( ".mon_Us").each(function(){
            var check = $(this).is(":checked");        
            if(check){
                var valor = eval($(this).attr("data-valor"));
                valorUs+=valor;
                cantUs++;
            }
        }); 
        $( ".mon_Gs").each(function(){
            var check = $(this).is(":checked");        
            if(check){
                var valor = eval($(this).attr("data-valor"));
                valorGs+=valor;
                cantGs++;
            }
        }); 
        $(".total_Us").html("U$ "+ format(valorUs,2));
        $(".total_Gs").html("G$ "+format(valorGs,2));
        $(".cant_Us").html(cantUs);
        $(".cant_Gs").html(cantGs);
}

function imprimirAcuse(id){
    var url = "project/marijoa/reports/config/imp_cheque_terc_prg.php?id="+id+"";
    var title = "Impresion de Acuse de Recibo de Cheque";
    var params = "width=800,height=480,scrollbars=yes,menubar=yes,alwaysRaised = yes,modal=yes,location=yes";
    window.open(url,title,params);
}

function imprimir(){
   $('.ocultable').each(function(){
       var chd = $(this).find('input:checkbox:first').is(":checked"); 
        
       if(!chd){
          //$(this).slideUp("slow"); 
          $(this).remove();
       } 
   });
   $('.clicable').css("background","white");
   $('#imprimir').fadeOut();
   $( "[type=checkbox]").fadeOut(); 
}
function format(numero,dec){
    if(dec==undefined){dec=2;}
    if(isNaN(numero) || numero == null){
        return 0;
    }else{
      return  parseFloat(numero).format(dec,3,".",",");
    }
}
Number.prototype.format = function(n, x, s, c) {
    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\D' : '$') + ')',
        num = this.toFixed(Math.max(0, ~~n));

    return (c ? num.replace('.', c) : num).replace(new RegExp(re, 'g'), '$&' + (s || ','));
};
</script>
    
<style>
    .selected{
        background-color: lightblue;
    }
    
    td:hover{
      background-color: lightgray;
    }
</style>

<!-- end:   general_header -->


<!-- begin: start_query0 -->
<table style="text-align: left; width: 99%;border-collapse:collapse;border-width: 1px;"  cellpadding="0" cellspacing="0">
    <tbody>
    <thead>
<tr> <td colspan="50"> 
	<table style="text-align: left; width: 100%;" border="1"
	 cellpadding="0" cellspacing="0">
	  <tbody>
		<tr>
		  <td style="width: 20%"> * </td>
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
                      style="font-weight: bold;font-size: 16px"><big>Cheques de Terceros de pago &nbsp; "{sup_chq_tipo}" </big></td>
		  <td style="text-align: right; width: 20% ">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
                <tr>
                    <td colspan="3" style="text-align: center">Fecha de Entrega: {fecha}</td>
                </tr>
	  </tbody>
	</table> 
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
<table style="text-align: left; width: 99%;border-collapse: collapse; border-width: 1px;border-color: #999999;" border="1"  cellpadding="0" cellspacing="0">
    <tr style="font-size: 10px">
        
        <th>Suc</th>
        <th>Banco</th>
         
        <th>N&deg; Cheque</th>
          
        <th>Titular</th>
          
        <th>Fecha_Emis</th>
        <th>Fecha_Pag</th> 
         <th >$</th>
        <th >Valor</th>
       
        <th>*</th>  
         
    </tr>
</thead>
 
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
<tr class="ocultable" id="tr_{id}">
             
            <td class="item clicable">{query0_SUC}</td>
            <td class="item clicable">{query0_BANCO}</td>
             
            <td class="item clicable">{query0_NRO}</td>
             
            
            <td class="item clicable" title="{query0_DOCS}">{query0_NOMBRE_DE}</td>
             
            <td  class="item clicable" style="text-align: center;"  >{query0_FECHA_EMIS}</td>
            <td  class="item clicable" style="text-align: center;"  >{query0_FECHA_PAG}</td>
            <td class="itemc clicable" >{query0_MON}</td>
            <td class="num clicable">{query0_VALOR}</td>
            
            <td><input type="checkbox" data-valor="{query0_VALOR_NO_FORMAT}" class="mon_{mon}" style="margin: 0">&nbsp;<img src="images/printer2.png" id="img_{id}" style="display:none; margin: 0 0 -4 0;cursor: pointer" onclick="imprimirAcuse({id})"> </td>
         </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr> 
            <td style="text-aling:center" class="cant_{moneda}"></td>
             
            <td ></td>
            <td></td>
            <td></td>
            
            <td></td>
            <td></td>
            <td></td>
            <td style="font-size:14px;font-weight: bolder;padding-right: 2px;text-align: right" class="total_{moneda}"></td>
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
        <!--  <td style="text-align: right;"><b>{subtotal0_VALOR}</b></td> -->
        </tr>
		</table>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<br>
<br>

<div style="text-align: center">
    Recibido por: _________________________________&nbsp;&nbsp;&nbsp;&nbsp;Fecha: &nbsp;__/__/____  <input type="button" value="Imprimir" onclick="imprimir()" id="imprimir">
</div>
<!-- end:   end_query0 -->

