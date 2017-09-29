<!-- 
    Report Template File (pedidos_tracking)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
       <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
       <script type="text/javascript" src="include/jquery.js" > </script>
	<treset_page>
            
 <style>
           .anchorTitle {
                /* border radius */
                -moz-border-radius: 8px;
                -webkit-border-radius: 8px;
                border-radius: 8px;
                /* box shadow */
                -moz-box-shadow: 2px 2px 3px #e6e6e6;
                -webkit-box-shadow: 2px 2px 3px #e6e6e6;
                box-shadow: 2px 2px 3px #e6e6e6;
                /* other settings */
                background-color: #fff;
                border: solid 3px orange;
                color: #333;
                display: none;
                font-family: Helvetica, Arial, sans-serif;
                font-size: 13px;
                line-height: 1.3;
                max-width: 600px;
                padding: 5px 7px;
                position: absolute;
            }
            * html #anchorTitle {
                /* IE6 does not support max-width, so set a specific width instead */
                width: 500px;
            }                
 </style>     
 
 <script>
$(document).ready(function() {

                $('body').append('<div id="anchorTitle" class="anchorTitle"></div>');

                $('a[title!=""]').each(function() {

                    var a = $(this);

                    a.hover(
                        function() {
                            showAnchorTitle(a, a.data('title'));
                        },
                        function() {
                            hideAnchorTitle();
                        }
                    )
                    .data('title', a.attr('title'))
                    .removeAttr('title');

                });

            

            });

            function showAnchorTitle(element, text) {

                var offset = element.offset();

                $('#anchorTitle')
                .css({
                    'top'  : (offset.top + element.outerHeight() + 4) + 'px',
                    'left' : offset.left + 'px'
                })
                .html(text)
                .show();

            }

            function hideAnchorTitle() {
                $('#anchorTitle').hide();
            }   
 </script>
<!-- end:   general_header -->


<!-- begin: start_query0 -->
<table style="text-align: left; width: 99%; empty-cells: show;" border="1" cellpadding="0" cellspacing="0">
    <tbody>
    <thead>
<tr> <td colspan="50"> 
	<table style="text-align: left; width: 100%;" border="1" cellpadding="0" cellspacing="0">
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
			style="font-weight: bold;"><big>Tracking de Pedidos</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
                <tr>
                    <td colspan="3" style="text-align: center"> <b>Origen :</b> {sup_origen}   Destino:  <b>{sup_destino}</b> </td>
                </tr>
                <tr >
                    <td colspan="3" >
                        <table border="1" style="width: 60%; height: 24px;margin: 0 auto">
                            <tr> 
                                <td style="background-color:  Orange;text-align: center;font-size: 12px">Pendiente</td>
                                <td style="background-color: #FFD700;text-align: center;font-size: 12px">Comprado</td>   
                                <td style="background-color: #FFFF00;text-align: center;font-size: 12px">En Transito</td>   
                                <td style="background-color: #ADFF2F;text-align: center;font-size: 12px">En Deposito</td>    
                                <td style="background-color: #CAE1FF;text-align: center;font-size: 12px">Despachado/Enviado</td>    
                                <td style="background-color: #5CACEE;text-align: center;font-size: 12px">Disponible en Stock</td>
                                <td style="background-color: #8B7D7B;text-align: center;font-size: 12px">Cancelado</td>
                            </tr>
                        </table>    
                    </td>
                </tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th>Nro</th>
        <th>Origen</th>
        <th>Destino</th>
        <th>Fecha</th>
	    <th>Fecha Cierre</th>
        <th>Usuario</th>
      
        <th>Codigo</th>
        <th>Remplazo</th>
        <th>Grupo_Tipo_Color</th>
        <th>Cant</th>
        <th>Urge</th>
        <th>Estado_Cod</th>
        <th>Previsto</th>
       
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
      <tr style="background: {urge};height: 26px">
            <td class="item">{query0_Nro}</td>
            <td class="item">{query0_Origen}</td>
            <td class="item">{query0_Destino}</td>
            <td class="item">{query0_Fecha}</td>
			<td class="item">{query0_Cierre}</td>
            <td class="item">{query0_Usuario}</td> 
            <td class="item">{query0_Codigo}</td>
            <td class="item">{query0_Remplazo}</td>
            <td class="item"  ><a title="{titulo}"  style="cursor:pointer" >{query0_Grupo_Tipo_Color}</a></td>
            <td class="num">{query0_Cant}</td>
            <td class="itemc">{query0_Urge}</td>
            <td class="itemc"  style="background: {color_estado}">{query0_Estado_Cod}</td>
            <td class="itemc">{query0_Previsto}</td> 
             
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
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
             
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_cab -->
        <tr>
            <td colspan="14">
                <table style="text-align: left; width: 80%; background: rgb(202, 225, 255)" border="1" cellpadding="0" cellspacing="0">
                    <tr> <th>Remision</th>   <th>Fecha</th> <th>Codigo</th>   <th>Origen</th>   <th>Destino</th>   <th>Estado Remision</th>   <th>Cant.</th>  <th>Transportadora</th>  <th>Nro. Levante</th>  <th style="display:none">Estado Codigo</th>  </tr>
         
<!-- end:    query0_subtotal_cab -->



<!-- begin: data -->
<tr> <td class="itemc">{remito}</td><td class="itemc">{fecha}</td><td class="itemc">{codigo}</td> <td class="itemc">{origen}</td><td class="itemc">{destino}</td><td class="itemc">{estado}</td><td class="num">{cant}</td> <td class="itemc">{rem_env_emp}</td> <td class="itemc">{rem_env_cod}</td> <td class="itemc" style="display:none">{enviado}</td> </tr>
<!-- end:   data -->




<!-- begin: query0_subtotal_foot -->
 
                </table>
            </td>            
        </tr>
        <tr><td style="border:0px solid white;height:20px"></td></tr>
<!-- end:    query0_subtotal_foot -->


<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->



