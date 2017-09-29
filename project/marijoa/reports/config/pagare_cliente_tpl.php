<!-- 
    Report Template File (pagare_cliente)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
	<treset_page>
	<script type="text/javascript" src="include/jquery.js" > </script>
	<script type="text/javascript" >
		function updateData(){
			var nombreApellido = $("#titular").val();
			$(".titular").html(nombreApellido);
		}
		$(document).ready(function(){
			var iniLength = parseInt(($("textarea.sub").val().length/50))+1;
			$("textarea.sub").attr("rows",iniLength);
			$("textarea.sub").css("height",(17*iniLength)+"px");
			$("textarea.sub").val($("textarea.sub").val().toUpperCase());
			$("#_autorizados").change(function(){
				if($("#_autorizados option:selected").val()==='0'){
					$("#nombre_autorizado").val("");
					$("#ruc_autorizado").val("");
				}else{
					$("#nombre_autorizado").val($("#_autorizados option:selected").text());
					$("#ruc_autorizado").val($("#_autorizados option:selected").val());
				}
			});
			$("textarea.sub").keyup(function(){
				var rows = parseInt(($(this).val().length/50)+1);
				$(this).attr("rows",rows);
				$(this).css("height",(17*rows)+"px");
				$(this).val($(this).val().toUpperCase());
			});
		});
	</script>
    <style>
    .sub{
       border-style: groove;
       border-width: 0px 0px 2px 0px;
	   font-family:"MS Shell Dlg";
       font-size: 12px;	   
	   width:"349px";
     }
     .cuerpo{
         font-size:13px;
     }
	 @media print {
		select {
			display:none;
		}
	}
    </style>
<!-- end:   general_header -->


<!-- begin: start_query0 -->
<table style="text-align: left; width: 99%;" border="0" cellpadding="0" cellspacing="0">
    <tbody>
    <thead>
<tr> <td colspan="50"> 
	<table style="text-align: left; width: 100%;" border="0"  cellpadding="0" cellspacing="0">
	  <tbody>
         <tr>
            <td  colspan="3"> <img src="images/logo_marijoa.png" border="0" alt="Marijoa Tejidos" width="280px" height="80px" >  </td> 
         </tr>

		<tr>
           <td width="25%"></td>
		   <td style="text-align: center;width:50%"><big style="font-weight: bold;"><big>PAGARE A LA ORDEN</big> </big> </td>
		   <td style="text-align: left;width:25%;padding-left:6px">
             <big>Ref.:&nbsp;{sup_dp_fact_nro} ~~~</big><br>
             <big>N&deg;.:&nbsp;{sup_nro_pg}&nbsp;/&nbsp;{barra} ~~~</big><br>
             <small><small>{user} - {time}</small></small>
           </td>
		</tr>
	  </tbody>
	</table>
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
 
</thead>
<tfoot>
	<tr><td colspan="50"></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
    <tr>
    <td>
     <table border="0" cellpadding="4" cellspacing="4" width="100%" style="font-size:17px;text-align:justify;">
       <tr>
        <td style="height:80px;"><b>VENCIMIENTO:&nbsp;&nbsp;
                <input class="sub" style="text-align:center;font-weight: bolder;padding:1 0;" type="text" size="3" maxlength="2" value="{query0_DIA_VENC}" />&nbsp;/&nbsp;
                <input class="sub" style="text-align:center;font-weight: bolder;padding:1 0;" type="text" size="10" maxlength="10" value="{query0_MES_VENC_LETRAS}" /> 
                &nbsp;/&nbsp;&nbsp;
                <input class="sub" style="text-align:center;font-weight: bolder; padding:1 0;" type="text" size="5" maxlength="4" value="{query0_ANIO_VENC}" /> 
                &nbsp; 
            </b>
        </td>
        <td style="text-align:right;width: 30%"><b>IMPORTE:&nbsp;Gs.&nbsp;&nbsp;{query0_MONTO}&nbsp;~~~~ &nbsp;&nbsp;&nbsp;</b></td>
       </tr>

       <tr>
           <td colspan="2" class="cuerpo" >Lugar y Fecha de emisi&oacute;n: {emp_ciu}, &nbsp;&nbsp;{dia_hoy} &nbsp;&nbsp;de &nbsp;&nbsp;{este_mes} &nbsp;&nbsp;de &nbsp;&nbsp;{este_anio}&nbsp;</td>
       </tr>
       <tr>
           <td colspan="2" class="cuerpo">El d&iacute;a &nbsp;{query0_DIA_VENC}&nbsp;de&nbsp;{query0_MES_VENC_LETRAS}&nbsp;de&nbsp;{query0_ANIO_VENC}&nbsp;
        pagar&eacute;/mos solidariamente a <b>{denominacion}</b>  o a su orden, sin protesto, la suma de guaran&iacute;es  {monto_en_letras}, por igual valor recibido en Mercader&iacute;as  a mi/nuestra entera satisfacci&oacute;n.
        <br><br>
        El pago lo realizar&eacute; en el local de la firma {denominacion} ubicado en <b>{emp_dir}</b> ciudad de <b>{emp_ciu}</b>. &nbsp; La falta de pago del capital a su vencimiento constituir&aacute; al deudor/deudores en mora autom&aacute;tica, de pleno derecho (art. 424 C.C.) 
        sin necesidad de interpelaci&oacute;n judicial o extrajudicial alguna.
        
        En caso de mora se aplicar&aacute;, desde el d&iacute;a de vencimiento un inter&eacute;s moratorio del  2% mensual m&aacute;s un inter&eacute;s
        punitorio adicional del 0,3% de la tasa a percibirse en concepto de inter&eacute;s moratorio. As&iacute; mismo el presente documento sirve
        de suficiente autorizaci&oacute;n en forma expresa e irrevocable, otorgando suficiente mandato en los t&eacute;rminos del C&oacute;digo Civil, para que en caso de atraso
        o mora superior a 90 (noventa) d&iacute;as se incluya mi/nuestro nombre personal y/o raz&oacute;n social que represento/amos en el registro general
        de morosos de empresas dedicadas y especializadas en almacenar, procesar y/o divulgar informaci&oacute;n comercial. Una vez cancelada la deuda de capital, gastos e intereses,
        la eliminaci&oacute;n de dicho registro se realizar&aacute; de acuerdo a lo dispuesto en la Ley N&deg; 1682/01 y su modificatoria Ley 1969/02. 
        A todos los efectos Jur&iacute;dicos acepto/aceptamos la competencia de los Juzgados y Tribunales de la ciudad de Encarnaci&oacute;n, con expresa renuncia a cualquier otra
        y constituyo/imos domicilio especial en el lugar se&ntilde;alado m&aacute;s abajo.
        
        </td>
        </tr>
        <tr><td colspan="2" align="center" style="height:35px;">&nbsp;</td></tr>       
       </tr>
    </table>
    </td>
    </tr>

    <tr><td>

     <table  width="99%" border="0" cellpadding="2" cellspacing="2">
       <tr><td ><b>Nombre y Apellido/Raz&oacute;n Social:</b> </td> <td> <input onkeyup="updateData()" id="titular" class="sub" type="text" size="66" value="{cliente}" />  </td> </tr>
       <tr><td ><b>C&eacute;dula de Identidad / RUC N&deg;:</b> </td> <td ><input class="sub" type="text" size="66" value="{ci}" /></td> </tr>
       <tr><td ><b>Domicilio:</b><b></b> </td> <td  ><textarea class="sub" cols="66" rows="1" style="height:17px;width:349px;rezisable:none">{dir}</textarea></td> </tr>
       <tr><td ><b>Ciudad:</b><b></b> </td> <td  ><input class="sub" type="text" size="66" value="{ciudad}" /></td> </tr>
       <tr><td ><b>Tel&eacute;fono:</b><b></b> </td> <td  ><input class="sub" type="text" size="66" value="{tel}" /></td> </tr>
     </table> 
    </td></tr>
 
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->

<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr><td colspan="2" align="center" style="height:40px;">&nbsp;</td></tr>
        <tr><td  colspan="2"  align="center" >_______________________________________ </td></tr>
        <tr><td  class="cuerpo titular"  colspan="2"  align="center" >{cliente}</td></tr>
        <tr><td colspan="2" align="center"><b>Deudor/a</b></td></tr>
	<tr colspan="2" style="height:30px">&nbsp;</tr>        	 
		<tr><td> 
	 <table  width="99%" border="0" cellpadding="2" cellspacing="2">
             <tr><td  colspan="2"  align="left" ><b>Firma por&nbsp; </b> <label class="cuerpo titular">{cliente}</label>  <b>&nbsp;conforme a autorizaci&oacute;n anterior.</b></td></tr>
       <tr><td  ><b>Nombre y Apellido:</b> </td> <td> <input id="nombre_autorizado" class="sub" type="text" size="66" value="" />{nombre_autorizado}</td> </tr>
       <tr><td  ><b>C&eacute;dula de Identidad / RUC N&deg;:</b> </td> <td ><input id="ruc_autorizado" class="sub" type="text" size="66" value="" /></td> </tr>  
     </table> 
	 </td></tr>
         <tr colspan="2" style="height:40px">&nbsp;</tr>        
	<tr><td  colspan="2"   align="center" ><b>Firma: </b>_____________________________ </td></tr>	
        <tr><td colspan="2" align="center"><b>Autorizado</b></td></tr>
		 
		 
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<br><br><br><br><br><br>

<!-- end:   end_query0 -->

