<!-- 
    Report Template File (rep_mov_caja)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
<link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
<script type="text/javascript" src="include/jquery-1.3.2.js" > </script>
	<treset_page>

    
    <script>
		$(function(){
			$(".show_hora").click(function(){
				var d = $(".hora").css("display");
				if(d!=="none"){
					$(".hora").css("display","none");
					$(".show_hora").text("(+)");
				}else{
					$(".hora").css("display","table-cell");
					$(".show_hora").text("(-)");
				}
			});
		});
        function desplegarDatos(){
            var suc = $("#suc").val();
            $.ajax({
                type: "POST",
                url: "include/Ajax.class.php",
                data: "action=caja_mov_cheques_y_saldos&suc="+suc+"",
                async:true,
                dataType: "html",
                beforeSend: function(objeto){
                    $("#datos").html("<label>Procesando...</label> <img src='images/working.gif' >"); 
                },
                complete: function(objeto, exito){
                      if(exito=="success"){        
                          $("#datos").html(objeto.responseText);   
                      }
                    }
                });    
          }   
    </script>
	<style>
		table{
			empty-cells: show;
		}
		.show_hora{
			margin:0;
			padding:0;
			font-size: 11px;
			color: blue;			
			cursor:pointer;
			margin-left:3px;
			padding: 1px;
		}
		.hora{
			display:none;
		}
	</style>
<!-- end:   general_header -->


<!-- begin: start_query0 -->
<input type="hidden" value="{suc}" id="suc" >
<table style="text-align: left; width: 99%;" border="1"cellpadding="0" cellspacing="0">
    <tbody>
    <thead>
<tr> <td colspan="50"> 
	<table style="text-align: left; width: 99%;" border="0"
	 cellpadding="0" cellspacing="2">
	  <tbody>
		<tr>
		  <td style="width: 184px;"> </td>
		  <td style="text-align: center;">
			<b>RAD Plus</b></td>
		  <td class="num">
			<tpage><b>Pag: </b></tpage></td>
		</tr>
		<tr>
		  <td>
			<small><small>ycube plus RAD [1.2.31]</small></small>
		  </td>
		  <td style="text-align: center;"><big
			style="font-weight: bold;"><big>Reporte de Movimientos de caja &nbsp;&nbsp;&nbsp;&nbsp;SUC.:{sup_empr}</big></td>
		  <td class="num">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
	  </tbody>
	</table> 
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>

        <th>FECHA<span class="show_hora">(+)</span></th>
		<th class="hora">HORA</th>
        <th>EoS</th>
        <th>CONEPTO</th>
        <th>COMPLEMENTO</th>
        <th>MONEDA</th>
        <th>ENTRADA</th>
        <th>SALIDA</th>
        <th>COTIZ</th>
        <th style="text-align: center;">E_REF</th>
        <th style="text-align: center;">S_REF</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"> </td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <tr>
            
            <td class="itemc">{query0_FECHA}</td>
			<td class="itemc hora">{query0_HORA}</td>
            <td class="itemc">{query0_EoS}</td>
            <td class="item">{query0_CONCEPTO}</td>
            <td class="item">{query0_COMPL}</td>
            <td class="itemc">{query0_MONEDA}</td>
            <td class="num">{query0_ENTRADA}</td>
            <td class="num">{query0_SALIDA}</td>
            <td class="itemc">{query0_COTIZ}</td>
            <td class="num">{query0_E_REF}</td>
            <td class="num">{query0_S_REF}</td>
         </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr>
			<td></td>
            <td class = "hora"></td>
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
            <td></td>
			<td class = "hora"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="num"><b>{entrada}</b></td>
            <td class="num"><b>{salida}</b></td>
            <td></td>
            <td class="num"><b>{subtotal0_E_REF}</b></td>
            <td class="num"><b>{subtotal0_S_REF}</b></td>
        </tr>
	<tr><td colspan='11'>.</td> </tr>
        <tr>


           <td></td>
           <td></td>
           <td></td>
           <td></td>                       
           <td colspan='2' style="text-align: right;background-color:rgb({fondo},{fondo},{fondo})"><b> {es_moneda}      </b></td>
	   <td style="text-align: right; "><b> {dif}   </b></td>
           <td colspan='2' style="text-align: right; background-color:rgb(200,200,200)"><b> E - REF - S - REF :  &nbsp;&nbsp;     </b></td>
	   <td style="text-align: right; "><b>    {diferencia} </b></td>
</tr>	    

 
	 
         
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<br><br>
<div align="center">  <b>Elaborado por:&nbsp; _______________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Verificado por:&nbsp; _______________ </b>     </div>
<!-- end:   end_query0 -->

