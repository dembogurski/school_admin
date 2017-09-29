<!-- 
    Report Template File (pedido_int_resu)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
       <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
       
       <link href="templates/jquery-ui-1.8.22.custom.css" rel="stylesheet" type="text/css">
        <link href="templates/jquery.datatables.css" rel="stylesheet" type="text/css">
        <link href="templates/demo_table.css" rel="stylesheet" type="text/css">
       
       <script type="text/javascript" src="include/jquery.js"></script>
       <script type="text/javascript" src="include/jquery-ui-1.8.22.custom.min.js"></script>
        <script type="text/javascript" src="include/jquery.dataTables.min.js"></script>
	<treset_page>
            
<style type="text/css">
    .texto{
        width: 100%;
        border:solid 0px white; 
        font-size:11px;
        text-align: right
    }  
    .calc_text{  
        font-size:12px;
        font-weight: bold;
        text-align: right
    }      
    .popup{
        position: absolute;
        top: 0;
        z-index: 10;
        background:#ffc;
        padding:5px;
        border:1px solid #CCCCCC;
        text-align:center;
        font-weight:bold; 
        width: 40%;
        height: auto; 
        margin-right: 25%;  
    }
              
</style>   

<script language="javascript">
  
var id_ = 0;  
var metros = 0;

$(document).ready( function() {
      $("#mi_tabla").dataTable({
           "iDisplayLength": 30
      });
});
   
 function guardar(id){
     var cant_comp = $("#cc_"+id).val();
     var store_number = $("#st_"+id).val();
     var obs = $("#obs_"+id).val();
     var p_compra = $("#pc_"+id).val();
     
     if(isNaN(cant_comp)){
         alert("En el Campo Cant. Comprada solo puede ingresar numeros");
         $("#cc_"+id).select();
         return;
     } 
     $.ajax({
                type: "POST",
                url: "include/Ajax.class.php",
                data: "action=completar_resumen_pedido&id="+id+"&cant_comp="+cant_comp+"&store_number="+store_number+"&obs="+obs+"&p_compra="+p_compra,
                async:true,
                dataType: "html",
                beforeSend: function(objeto){ 
                    $("#msg_"+id).html("<img src='images/activity.gif'>");    //alert(id+" "+pond+" "+cant_pond+" "+precio);
                },
                complete: function(objeto, exito){
                    if(exito=="success"){ 
                        objeto.responseText
                        $("#msg_"+id).html("<img src='images/ok.png'> " ); 
                    }
                }
            }
        )         
 }       
    
  function abrirPopup(id){  
     id_ = id;
      
     var um = $("#um_"+id).val();
     if(um == "Kg"){

        var p = $("#cc_"+id ).position();
        var h = $("#cc_"+id ).height();
      
        $("#cc_"+id).css("border","solid red 1px");
      
        $('#popup_'+um).animate({top: p.top + h +3+"px",left: p.left -100 },{queue: false, duration: 150});
        $("#popup_"+um).slideDown("fast");
        $("#kg").val($("#cc_"+id_ ).val());
        $("#kg").focus();
     }
  }
  function cerrarPopup(){     
      $(".popup").slideUp("fast");
      $("#cc_"+id_).css("border","solid white 0px");
  } 
  function calc(){
      var kg = $("#kg").val();
      var gr = $("#gr").val();
      var ancho = $("#ancho").val();
      metros = (kg * 1000) / (gr * ancho);
      $("#largo").val(metros.toFixed(2));  
      $("#cc_"+id_).val(kg);
  } 
  
  function ok(){
     //$("#cc_"+id_).val(metros.toFixed(2));   
     $("#ccmts_"+id_).val(metros.toFixed(2))
     cerrarPopup();
     guardar(id_);
  } 
  function setMetros(id){
     var cc = $("#cc_"+id).val();
     var um = $("#um_"+id).val();
     if(um == "Mts" || um == "Pcs"){
        $("#ccmts_"+id).val(cc)
     }else if(um == "Yds"){
        $("#ccmts_"+id).val((cc * 0.91440).toFixed(2));
     }     
  }
      
</script>

<!-- end:   general_header -->


<!-- begin: start_query0 -->

<input type="hidden" value="{nro_pedido}" id="nro_pedido">

<div id="popup_Kg" class="popup"  style="display:none; height:18%"  > 
    <div style="height:80%">
    <div style="float:left;width:70%">
        <label> Kg.</label> <input type="text" class="calc_text" id="kg" size="4" onchange="calc()" > .1000 <br> 
        <hr>
        <label> Gramos M&sup2;  </label> <input type="text" class="calc_text" id="gr" size="6" onchange="calc()"> . <label> Ancho</label> <input type="text" class="calc_text" size="6" id="ancho" onchange="calc()">   
    </div>
    <div style="float:right;width:30%">
        = <input type="text" class="calc_text" id="largo" size="8" style="margin-top: 12%;" readonly=""> Mts.
    </div>
    </div> 
    <div style="text-align: center"> <input type="button" style="font-size:11px" value="Cancelar" onclick="cerrarPopup()"> <input type="button" style="font-size:11px" value="Ok"  onclick="ok()"> </div>
</div>




<table   style="text-align: left; width: 100%;" border="1" cellpadding="0" cellspacing="0">
    <tbody>
    <thead>
<tr> <td colspan="50"> 
	<table style="text-align: left; width: 100%;" border="1"
	 cellpadding="0" cellspacing="0">
	  <tbody>
		<tr>
                    <td style="width: 20%;height:40px;"> &nbsp; N&deg; {sup_nro_pedido_int} </td>
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
                      style="font-weight: bold;"><big>Resumen Nota de Compra Internacional<br>
                      
                          <small> Fecha:&nbsp;{fecha} &nbsp;&nbsp; Temporada: {sup_temporada}    </small>
                      </big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
	  </tbody>
	</table> 
</td></tr>

    </tr>
    </tbody>
</table>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
<table id="mi_tabla" border="1" style="width: 100%" cellpadding="0" cellspacing="0" >
    <thead>
    <tr>
        <th>Sector</th>
        <th>Grupo</th>
        <th>Tipo</th>
        <th>Color</th>
        <th style="text-align: center;">Cant. Pedida</th>
        <th style="text-align: center;">Cant. Ponderada</th>
        <th style="text-align: center;">Um</th>
        <th style="text-align: center;">Cant. Comprada</th>
        <th style="text-align: center;">Cant. Mts.</th>
        <th style="text-align: center;">Precio Compra</th>
        <th>Store Number</th>
        <th>Obs</th>
        <th>*</th>
    </tr>
</thead>
 <tbody>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr>
            <td class="item">{query0_sector}</td>
            <td class="item">{query0_p_grupo}</td>
            <td class="item">{query0_p_tipo}</td>
             <td class="item">{query0_p_color}</td>
            <td class="num" style="width:4%">{query0_Cant}</td>
            <td class="num" style="width:4%">{query0_Cant_Pond}</td> 
            <td class="num" style="width:2%">
               <select style="font-size:10px;" id="um_{id}">
                    <option value="Mts">Mts</option>
                    <option value="Kg">Kg</option>
                    <option value="Yds">Yds</option>
                    <option value="Rol">Rol</option>
                    <option value="Pcs">Pcs</option>
                </select>
            </td>  
            <td class="item" style="width:6%"><img src="images/left.png" > <input style="width:80%" id="cc_{id}" type="text" class="texto" maxlength="30"   value="{query0_Cant_comp}" onclick="abrirPopup({id})" onkeyup="setMetros({id})" onchange="guardar({id})" ></td>
            <td class="num" style="width:6%"><input style="width:80%" id="ccmts_{id}" type="text" class="texto" maxlength="30"   value="{query0_mts}" readonly=""   > </td>
            <td><input type="text" class="texto" id="pc_{id}" style="padding-right:2px" maxlength="30"   value="{p_compra}"    onchange="guardar({id})" ></td>
            <td><input type="text" class="texto" id="st_{id}" style="text-align:left" maxlength="30"   value="{query0_store_number}"    onchange="guardar({id})" ></td>
            <td style="width:24%"><input type="text" id="obs_{id}" class="texto" style="text-align:left" maxlength="30"  value="{obs}"  onchange="guardar({id})" ></td>
            <td id="msg_{id}">&nbsp;</td>
         </tr>
<!-- end:    query0_data_row -->

    </tbody>
</table>

<!-- begin: query0_subtotal_row -->
 <tfoot> 
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align: right;"><b>{subtotal0_Cant}</b></td>
            <td style="text-align: right;"><b>{subtotal0_Cant_Pond}</b></td>
            <td style="text-align: right;"><b>{subtotal0_Cant_comp}</b></td>
            <td></td>
        </tr>
  </tfoot>        
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
 
<!-- end:   end_query0 -->

