<!-- 
    Report Template File (ajuste_salida)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
<link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
<script type="text/javascript" src="include/jquery.js" > </script>


<script>
       
    function marcarDesmarcarTodos(){           
        var boolean_marcar = $('#todos').is(':checked');                       
        $('[id^=check_]').each(function(){
            this.checked = boolean_marcar;                                    
        }); 
    }
    function controlado(){
        var user = $("#username").val();   
        $('[id^=check_]').each(function(){
            var thisid = $(this).attr('id');  
            var checked = $('#'+thisid).is(':checked');  
            if(checked){
                var id =   thisid.substring(6,18);  
                marcarControlado(user,id);              
            }                            
        }); 
        
        $("#passwbox").html('<label style="font-weight:bolder">Ok! Ajustes Chequeados!!!</label> ');  
    }
    
    function marcarControlado(user,id){
      $.ajax({
                type: "POST",
                url: "include/Ajax.class.php",
                data: "action=ajuste_controlado&user="+user+"&id="+id+"",
                async:true,
                dataType: "html",
                beforeSend: function(objeto){                 
                    $("#verif_"+id).html("<img src='images/progress.gif' height='18px' width='18px'>"); 
                },
                complete: function(objeto, exito){
                    if(exito=="success"){   
                       $("#verif_"+id).html(jQuery.trim(objeto.responseText)); 
                    }
                }
            });
    }
    
    function checkPassword(user){
         var passw = $("#passw").val();   
        if(passw==""){
            alert("Favor ingrese su Contraseña para verificar!");   
        }else{
            $.ajax({
                type: "POST",
                url: "include/Ajax.class.php",
                data: "action=check_password&user="+user+"&passw="+passw+"",
                async:true,
                dataType: "html",
                beforeSend: function(objeto){                 
                    $("#tmp_passw").html("<b><small> Verificando... </small></b>  &nbsp;&nbsp;&nbsp;<img src='images/progress.gif' height='18px' width='18px'>"); 
                },
                complete: function(objeto, exito){
                    if(exito=="success"){   
                       if(jQuery.trim(objeto.responseText) == "true"){
                           $("#passwbox").html('<label style="font-weight:bolder">Puede Confirmar:</label> <input type="button" class="itemc" value="Marcar como Controlado" onclick="controlado()">');   
                       }else{
                           $("#tmp_passw").html(""); 
                           alert("Contraseña incorrecta Favor vuelva a intentarlo!");
                       }  
                    }
                }
            });
        }
    }    
       
</script>       


<treset_page>
    <!-- end:   general_header -->


<!-- begin: start_query0 -->
    <input type="hidden" id="username" value="{user}"> 
    <table style="text-align: left; width: 99%;" border="1" cellpadding="0" cellspacing="0">
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
            style="font-weight: bold;"><big>Reporte para Control de Ajustes en Salida</big></td>
            <td style="text-align: right;">
                <small><small>{user} - {time}</small></small>
            </td>
            </tr>

            <tr> <td><b>Usuario:</b>{sup_usuario}</td> <td><b>Operaci&oacute;n: </b>{sup_oper}  &nbsp; &nbsp; <b>Periodo:</b>&nbsp;&nbsp;{desde}<-->{hasta}&nbsp;&nbsp;&nbsp;<b>Suc:&nbsp;{sup_suc_}&nbsp;&nbsp;{tol}</b> </td> </tr>
            </tbody>
    </table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
<tr>
    <th>CODIGO</th>
    <th>USUARIO</th>
    <th>FECHA</th>
    <th>HORA</th>
    <th>CANT. V.</th>
    <th>C_INI</th>
    <th>AJUSTE</th>
    <th>C_FINAL</th>    
	<th>FP</th>    
    <th>MOTIVO</th>
    <th>VALOR</th>
    <th>VENDEDOR</th>
    <th>CONTROL <input type="checkbox" id="todos" onchange="marcarDesmarcarTodos()" title="***** Marcar Todos/Desmarcar Todos *******"  ></th>
</tr>
</thead>
<tfoot>
    <tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
<tr>
    <td class="item">{query0_CODIGO}</td>
    <td class="item">{query0_USUARIO}</td>
    <td class="item">{query0_FECHA}</td>
    <td class="item">{query0_HORA}</td>
    <td class="item">{query0_CANT_V}</td>             
    <td class="num">{query0_C_INI}</td>
    <td class="num">{query0_AJUSTE}</td>
    <td class="num">{query0_C_FINAL}</td> 
    <td class="item">{query0_FP}</td>
	<td class="item">{query0_MOTIVO}</td>
    <td class="num">{monto}</td>
    <td class="item">{vendedor}</td>
    <td class="itemc" id="verif_{id}">{query0_VERIF}</td>
</tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
<tr>
    <td></td><td></td>
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
    <td></td><td></td>
    <td></td>
    <td></td>            
    <td></td>
    <td></td>             
    <td></td>
    <td></td>
    <td></td>
    <td class="num" style="font-size: 14px"><b>{total_monto} </b></td>
    <td class="itemc" colspan="2" style="height:30px;font-weight:bolder" id="passwbox">
        <label style="font-weight:bolder">Contrase&ntilde;a:</label>   <input  type="password" id="passw" size="14" > <input type="button" class="itemc" value="Verificar" onclick=checkPassword("{user}")>
        <span id="tmp_passw"></span>
    </td> 
</tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
</tbody>
</table>
<!-- end:   end_query0 -->

