<!-- 
    Report Template File (modif_precios)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
       <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
       <script type="text/javascript" src="include/jquery.js" > </script>
	<treset_page>
            

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

    function imprimir(codigo){ 
      var usuario = $("#usuario").val(); 
      window.open("project/marijoa/reports/config/re_code39Lotes_prg_recib.php?codigos="+codigo+"&usuario="+usuario+"&print=yes","Codigos de Barras","width=350,height=500,scrollbars=yes");
    }	
	
</script>
            
            
<!-- end:   general_header -->


<!-- begin: start_query0 -->
<input type="hidden" id="usuario" value="{user}">
<body  >
<table style="text-align: left; width: 99%;" border="0" cellpadding="0" cellspacing="0" >
    <tbody>
    <thead>
<tr> <td colspan="50"> 
	<table style="text-align: left; width: 100%;" border="1"
	 cellpadding="0" cellspacing="0">
	  <tbody>
		<tr>
                    <td style="width: 20%;height:40px;"> &nbsp;</td>
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
			style="font-weight: bold;"><big>Fracciona y Modifica Precios</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
	  </tbody>
	</table> 
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
 
</thead>
 
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr>
             <td style="height:40px;font-size: 16px;" ><b>N&deg; :</b> &nbsp;{query0_NRO}</td>
         </tr>
         <tr>
             <td style="height:40px;font-size: 18px;" >{codigo_fraccionado}  <input style="font-size:14px;font-weight:bolder;" type="button" value="     Imprimir Codigo     " onclick="javascript:imprimir({imprimir})">  </td> 
         </tr>
         
         <tr>
             <td style="height:40px;font-size: 18px;" >{codigo_modificado} </td>
         </tr>
         
<!-- end:    query0_data_row -->
 
<!-- begin: end_query0 -->
 

    </tbody>
</table>


 

<!-- end:   end_query0 -->

<!-- begin: fraccion -->

<div style="margin-left: 100px;margin-right:100px;">

    <div style="float: left; background: gray;width: {t2}%;height:45px;text-align:center;font-weight:bolder;vertical-align: middle;border-style: dashed;">{tejido_fallado_o_sano1}</div>

    <div style="float: right;background: orange;  width: {t1}%;height:45px;text-align:center;font-weight:bolder;vertical-align: middle;border-style: dashed;">{tejido_fallado_o_sano2}</div> 

</div>

<br>
<br>

<div style="text-align:center">
    <br>
    <br>
    <input style="font-weight:bolder;font-size:26px" type="button" value="     Finalizar     " onclick="javascript:self.close()"> 
</div>

<!-- end:   fraccion -->


<!-- begin: padre -->

<div style="margin-left: 100px;margin-right:100px;">

    <div style="float: left; background: gray;width: 100%;height:45px;text-align:center;font-weight:bolder;vertical-align: middle;border-style: dashed;"> Total: {tejido_fallado_o_sano2}</div>
 
</div>

<br>
<br>

<div style="text-align:center">
    <br>
    <br> 
    <input style="font-size:26px;font-weight:bolder;" type="button" value="     Finalizar     " onclick="javascript:self.close()"> 
</div>
<br>
<br>
<!-- end:   padre -->


<!-- begin: precios -->

<table border="1" cellpadding="0" cellspacing="0"   >
    <tr> <th> {titulo} </th> </tr>
    <tr> <td class="itemc" style="font-size:16px"> {m1} </td> </tr>
    <tr> <td class="itemc" style="font-size:16px"> {m2} </td> </tr>
    <tr> <td class="itemc" style="font-size:16px"> {m3} </td> </tr>
    <tr> <td class="itemc" style="font-size:16px"> {m4} </td> </tr>
    <tr> <td class="itemc" style="font-size:16px"> {m5} </td> </tr>
    <tr> <td class="itemc" style="font-size:16px"> {m6} </td> </tr>
    <tr> <td class="itemc" style="font-size:16px"> {m7} </td> </tr>
</table>

</body>
<!-- end:   precios -->