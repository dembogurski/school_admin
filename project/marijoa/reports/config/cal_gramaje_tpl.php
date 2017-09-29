<!--
    Report Template File (cal_gramaje)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->
<!-- begin: variables -->
<script type="text/javascript">
    var producto = {producto};
</script>
<!-- end:   variables -->
<!-- begin: general_header noeval -->
<link rel="stylesheet" type="text/css" href="templates/reports.css" />
<script type="text/javascript" src="include/jquery.js" ></script>
<treset_page>
    <script language="javascript">
		
        var loader = $("<img id='loader' src='images/loader.gif' height='32px' width='32px'>").css({"position": "fixed", "top": "27%", "left": "50%", "z-index": "1000"});
		var remData = Object();
		
        function scrollWindows(pixels) {
            $('html,body').animate({
                scrollTop: pixels
            }, 250);
        }
        function cerrarPopup() {
			$("#message").css("display","none");
            //$("#message").animate({opacity: 0}, "slow");
        }
        function limpiar() {
            $("#message").animate({opacity: 0}, "fast");
        }

        $(window).scroll(function () {
            $('#message').animate({top: $(window).scrollTop() + "px"}, {queue: false, duration: 350});
        });
        function openPopup(id) {
            $("#msg").html("");
            $("#pp_cod").html($.trim(id));
            $("#pp_padre").html($.trim($("#padre_" + id).text()));
			getRemisionNro(id);
            //$("#pp_remision").html($.trim(getRemisionNro(id)));
            if ($.trim($("#kg_dec_" + id).text()) === 0) {
                $("#replicar").attr({"checked": false, "disabled": "disabled"});
            } else {
                $("#replicar").removeAttr("disabled");
            }
            var largo = ($.trim($("#kg_dec_" + id).text()) > 0) ? ($.trim($("#cant_compra_" + id).text())) : ($.trim($("#cant_" + id).text()));
            $("#largoORG").val($.trim($("#cant_" + id).text()));
            $("#largo").val((eval(largo) + eval($("#ajustes_" + id).text())).toFixed(2));
            $("#ancho").val($.trim($('#ancho_' + id).text()));
            $("#gramaje").val($.trim($("#gramc_" + id).text()) || $.trim($("#gram_" + id).text()));
            //$("#gram_calc").text($("#gramaje").val());
            $("#gram_m").val($.trim($("#gram_m_" + id).text()) || 0);
            $("#kg").val(($.trim($("#kg_dec_" + id).text()) > 0) ? ($.trim($("#kg_dec_" + id).text())) : ($.trim($("#kg_" + id).text())));
            $("#tara").val($("#tara_" + id).text());
            $("#message").css("display","block");
            $("#message").css("height", "250px");
            setTimeout(' $("#largo").focus();', 1000);
            var showns_table_h = "";
            var showns_table_c = "";
            $.each([".cantidad", ".cant_compra", ".procesado",".regramado", ".total_ajuste", ".gram_calc", ".gram_muestra", ".tara", ".ancho", ".kg", ".kg_dec"], function (i, val) {
                showns_table_h += "<td>" + $(val).html() + "</td>";
                showns_table_c += "<td>" + $("#" + id + " " + val).html() + "</td>";
            });
            $("#msg").html("<table class='view'  border='1' cellpadding='0' cellspacing='0'><tr>" + showns_table_h + "</tr><tr>" + showns_table_c + "</tr></table>");
            if ($.trim($("#procesado_" + id).text()) === "No") {
                $("#ajustar").removeAttr("disabled");
            } else {
                $("#ajustar").attr("disabled", "disabled");
            }
            refresh();
        }
        function refresh() {
			var cod = $("#pp_cod").text();
            var largo = eval($("#largo").val()) || 0;
            var ancho = eval($("#ancho").val()) || 0;
            var kg = eval($("#kg").val()) || 0;
            var tara = eval($("#tara option:selected").val() / 1000);
            var kg_calc = kg - tara;
            var gramaje = ((kg_calc * 1000) / (largo * ancho));
			$("#kg_calc").html(eval((($("#kg_"+cod).text())/($("#cant_compra_"+cod).text()))*$("#largo").val()).toFixed(2));
            $("#gramaje").val(gramaje.toFixed(2));
        }
        function take() {
            $("#gramaje").val($.trim($("#gram_m").val()));
        }
        function guardar() {
            var cod = $.trim($("#pp_cod").text());
            var ancho = $("#ancho").val();
            var kg = ($('#mod_kg').attr('checked')) ? $("#kg").val() : 0;
            var tara = ($('#mod_tara').attr('checked')) ? $("#tara option:selected").val() : 0;
            var gramaje = $("#gramaje").val();
            $.ajax({
                type: "POST",
                async: true,
                dataType: "text",
                url: "include/Ajax.class.php",
                data: {
                    "action": "actualizar_datos_producto",
                    "usuario": $.trim($("#user").text()),
                    "codigo": cod,
                    "ancho": ancho,
                    "replicat": ($('#replicar').attr('checked')) ? 1 : 0,
                    "kg": kg,
                    "tara": tara,
                    "gramaje": gramaje
                },
                beforeSend: function (objeto) {
                    $("body").append(loader);
                },
                complete: function (objeto, exito) {
                    if (exito === "success") {
                        $("#msg").html(objeto.responseText);
                        $("#ancho_" + cod).text(ancho);
                        $("#tara_" + cod).text(tara);
                        $("#gram_" + cod).text(gramaje);
                        $("#kg_" + cod).text(kg);
                        $("#" + cod).addClass("revisado");
                        $("#loader").remove();
                        cerrarPopup();
                    }
                }
            });
        }
        function ajustar() {
            $.ajax({
                type: "POST",
                async: true,
                dataType: "text",
                url: "include/Ajax.class.php",
                data: {
                    "action": "actualizar_datos_producto",
                    "ajustar": "ajustar",
                    "usuario": $.trim($("#user").text()),
                    "codigo": $.trim($("#pp_cod").text()),
                    "metros": $("#largoORG").val()
                },
                beforeSend: function (objeto) {
                    $("body").append(loader);
                },
                complete: function (objeto, exito) {
                    if (exito === "success") {
                        $("#loader").remove();
                        $("#ajustar").attr("disabled", "disabled");
                        alert("Ya esta " + objeto.responseText);
                    }
                }
            });
        }
		
		function getRemisionNro(cod){			
			$.post("include/Ajax.class.php",
			{
				action:"actualizar_datos_producto",
				getRemisionNro:true,
				codigo:cod
			},
			function(data, status){
				if(status === "success"){
					remData = data;
					setTimeout(setRemData,300);
				}else{
					alert("error");
				}				
			},"json");			
		}
		function setRemData(){
			if(remData.rem_nro!==undefined){
				$("#pp_remision").html(remData.rem_nro+" de "+remData.rem_origen+" a "+remData.rem_destino);
				$("#pp_descrip").html(remData.descrip);
			}			
		}
    </script>
    <style type="text/css">

        .message{
            background:#FFFFCC none repeat scroll 0%;
            border:1px solid #CCCCCC;
            font-weight:bold;
            left:15%;
            padding:5px;
            position:absolute;
            text-align:center;
            top:100px;
            width:70%;
            min-width:771px;
            z-index:10;
            -webkit-border-radius: 7px;
            -moz-border-radius: 7px;
            border-radius: 7px;
        }
        .messege table th{
            font-size:10px;
        }
        td[colspan]{
            text-align:center;
        }
        .message table{
            margin: 10px auto;
            padding:0;
            font-size:9px;
        }
        label{
            font-size: 24px;
        }
        .principal{
            font-weight: bolder;
            color:blue;
        }
        tr[onclick]:hover{
            background-color:lightgrey;
            cursor:pointer;
        }
        .primero{
            background-color: lightblue;
        }
        .view {
            border:1px solid darkGray;
            border-collapse:collapse;
            empty-cells:show;
            padding:1px 2px;
        }
        .view td {
            padding:1px 2em;
        }
        table {
            empty-cells: show;
        }
        .revisado{
            color: darkgrey;
        }
		#pp_descrip{
			color: #3333ff;
			font-size: 18px;
		}
    </style>
<!-- end:   general_header -->

<!-- begin: popup -->
    <div id="message" class="message"  style="display:none">	
        <img  onclick="cerrarPopup()" style="float:right;cursor:pointer;" src="images/12-em-cross.png" />		
        <table>
            <tr><td colspan="5"><h3>Cod: <span id="pp_cod"></span> > Padre: <span id="pp_padre"></span>, En Remision: <span id="pp_remision"></span></h3></td></tr>
            <tr>
                <td></td><input type="hidden" id="largoORG" value="0" /><td><label for="largo"> Largo:</label></td><td><input tabindex="1" onchange="refresh()" class="texto" type="text"  size="8"  id="largo" value="" /></td>
            <td><label for="ancho"> Ancho:</label></td><td> <input tabindex="2" onchange="refresh()" class="texto" type="text"  size="8"  id="ancho"  value="" ></td>
            </tr>
            <tr>
                <td><input type="checkbox" id= "mod_kg" /></td><td><label for="kg"> Kg.:  </label></td><td><input tabindex="3" onchange="refresh()" class="texto" type="text"  size="8"  id="kg"  value="" />Kg.Calc: <span id="kg_calc"></span></td>
                <td><label for="gramaje"> Gramaje:  </label></td><td><input class="texto" type="text"  size="8"  id="gramaje"  value="" readonly="readonly" /></td>
            </tr>
            <tr>
                <td><input type="checkbox" id= "mod_tara" /></td><td><label for="tara"> Tara:</label></td><td> <select tabindex="4" onchange="refresh()" id="tara">{option}</select></td>
                <td><label for="replicar"> Replicar:  </label> <input tabindex="5" type="checkbox" id= "replicar" /></td><td><input tabindex="6" id="gram_m" type="button" value="0" onclick = "take()"/></td>
            </tr>
            <tr>
                <td colspan="3"><input tabindex="7" type="button" value="Guardar" onclick="guardar()"/></td>
                <td colspan="2"><input id="ajustar" tabindex="7" type="button" value="Agregar Ajuste de Entrada" onclick="ajustar()" disabled="disabled" /></td>
            </tr>
            <tr>
                <td colspan="5"><div id="msg"></div></td>
            </tr>
			<tr>
                <td colspan="5"><div id="pp_descrip"></div></td>
            </tr>
        </table>
    </div>
    <!-- end:   popup -->


    <!-- begin: start_query0 -->
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
            style="font-weight: bold;"><big>Calculos de Gramajes</big></td>
            
<!-- end:   start_query0 -->

<!-- begin: header0 -->
			<td style="text-align: right;">
                <small><small id="user">{user}</small><small> - {time}</small></small>
            </td>
            </tr>
            </tbody>
    </table><hr />
</td></tr>
<tr id="header">
    <th class="cod">Cod</th>
    <th class="padre">Padre</th>
    <th class="cantidad">Cantidad</th>
    <th class="cant_compra">Cant Compra</th>
    <th class="procesado">Procesado</th>
	<th class="regramado">ReGramado</th>
	<th class="total_ajuste">Total Ajuste</th>
    <th class="gram_calc">Gram Calc</th>
    <th class="gram_muestra">Gram Muestra</th>
    <th class="tara">Tara</th>
    <th class="ancho">Ancho</th>
    <th class="kg">Kg</th>
    <th class="kg_dec">Kg de Desc</th>
</tr>
</thead>

<!-- end:   header0 -->

<!-- begin: query0_data_row -->
<tr class="{primero} {principal}" id="{query0_p_cod}" onclick="openPopup(this.id)">
    <td class="cod" id="cod_{query0_p_cod}" class="item">{query0_p_cod}</td>
    <td class="padre" id="padre_{query0_p_cod}" class="item">{query0_p_padre}</td>
    <td class="cantidad" id="cant_{query0_p_cod}" class="num">{query0_p_cant}</td>
    <td class="cant_compra" id="cant_compra_{query0_p_cod}" class="num">{query0_p_cant_compra}</td>
    <td class="procesado item" id ="procesado_{query0_p_cod}">{tiene_ajustes}</td>
    <td class="regramado item" id ="regramado_{query0_p_cod}">{fue_regramado}</td>
    <td class="total_ajuste" id="ajustes_{query0_p_cod}" class="num">{ajustes}</td>
    <td class="gram_calc" id="gram_{query0_p_cod}" class="num">{query0_p_gram}</td>
    <td class="gram_muestra" id="gram_m_{query0_p_cod}" class="num">{query0_p_gram_m}</td>
    <td class="tara" id="tara_{query0_p_cod}" class="num">{query0_p_tara}</td>
    <td class="ancho" id="ancho_{query0_p_cod}" class="num">{query0_p_ancho}</td>
    <td class="kg" id="kg_{query0_p_cod}" class="num">{query0_p_kg}</td>
    <td class="kg_dec" id="kg_dec_{query0_p_cod}" class="num">{kg_desc}</td>
</tr>

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
    <td class="num" ><b>{total_mts}</b></td>
    <td class="itemc"> Gramaje Calc:</td>
    <td class="num" ><b><span id="gramc_{gramc}">{gramaje_calc}</span></b></td>
    <td></td>
    <td></td>
</tr>
<tr><td colspan="10" style="height: 27px">&nbsp;</td> </tr>
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
</tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
</tbody>
</table>
<!-- end:   end_query0 -->


