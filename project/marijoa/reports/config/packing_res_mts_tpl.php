<!-- 
    Report Template File (packing_res_mts)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
       <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
       <script type="text/javascript" src="include/jquery.js" > </script>
	<treset_page>
            <style>
             .packing{ 
               background: lightskyblue   
             } 
             .prod{ 
               background: darkgoldenrod   
             }
             .calc{ 
               background: orange   
             }
            </style>
            
            <script lang="javascript">
                function resaltar(id,resaltar){
                    if(resaltar){
                        $("#"+id).prev().prev().prev().prev().prev().prev().prev().prev().prev().prev().prev().css("border","solid red 1px");
                    }else{
                        $("#"+id).prev().prev().prev().prev().prev().prev().prev().prev().prev().prev().prev().css("border","initial");
                    }    
                }
            </script>  
  
<!-- end:   general_header -->


<!-- begin: start_query0 -->
<table style="text-align: left; width: 99%;" border="1" cellpadding="0" cellspacing="0">
    <tbody>
    <thead>
<tr> <td colspan="50"> 
	<table style="text-align: left; width: 100%;" border="1"
	 cellpadding="0" cellspacing="0">
	  <tbody>
		<tr>
                    <td style="width: 20%;height:40px;"> 
                        
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
			style="font-weight: bold;"><big>Packing List</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
                <tr>
                    <td>
                      <span class="packing" style="border:solid gray 1px;padding: 2px">Datos Packing</span>
                        <span class="prod" style="border:solid gray 1px;padding: 2px">Datos de Compra</span>
                        <span class="calc" style="border:solid gray 1px;padding: 2px">Calculos</span></td>  
                    </td>
                    <td>
                        <table border="0" cellpadding="2" cellspacing="0" width="90%" style="font-size:11;font-weight:bold;font-family: Garamound ">
                         <tr> <td>REF :</td> <td>{ref}</td> <td>INTERNO :</td> <td>{interno}</td>    </tr>
                         <tr> <td>SUC :</td> <td>{empr}</td> <td>MONEDA :</td> <td>{moneda}</td>   </tr> 
                         <tr> <td>FECHA :</td> <td>{fecha}</td>   <td>COTIZ</td> <td>{cambio}</td>  </tr>
                          <tr> <td>FECHA FACT :</td> <td>{fechafac}</td>   <td>NAC. INTR. :</td> <td>{nac_int}</td>    </tr>
                         <tr> <td>PROVEEDOR :</td> <td>{n_prov}</td>  <td>TIPO :</td> <td>{tipo}</td>    </tr> 
                         <tr> <td>FACTURA :</td> <td>{factura}</td>   <td>ESTADO :</td> <td>{estado}</td>   </tr> 
                      </table>
                    </td>
                    <td></td>
                </tr>
	  </tbody>
	</table> 
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th class="packing">Mar</th>
        <th class="prod">Codigo</th>
        <th class="prod">Sector</th>
        <th class="prod">Grupo</th>
        <th class="prod">tipo</th>
        <th class="prod">Color</th>
        <th class="packing">Cant_compra</th>
        <th class="packing">Precio_x_UM</th>
        <th class="prod">P.Compra Gs</th>
        <th class="prod">%Rec</th>
        <th class="packing">UM</th>
        <th class="packing">Each_Quty</th>
        <th class="packing">Quty_Ticket</th>
        <th class="packing">KG</th>
        <th class="packing">Ancho</th>
        <th class="packing">Gramaje</th>
        <th class="packing">Equiv</th>
        <th class="calc">Metros</th>
        <th class="calc">Ajustes</th>
        <th class="calc">Diff Mts.</th>
        <th class="calc">Valor</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
         <tr>
            <td class="item">{query0_Mar}</td>
            <td class="item">{query0_Codigo}</td>
            <td class="item">{query0_Sector}</td>
            <td class="item">{query0_Grupo}</td>
            <td class="item">{query0_tipo}</td>
            <td class="item">{query0_Color}</td>
            <td class="num">{query0_Cant_compra}</td>
            <td class="num">{query0_Precio_x_UM}</td>
            <td class="num" title="{p_compra_con_rec}">{query0_P_Compra_Gs}</td>
            <td class="num">{query0_Por_Rec}</td>
            <td class="itemc">{query0_UM}</td>
            <td class="num">{query0_Each_Quty}</td>
            <td class="num">{query0_Quty_Ticket}</td>
            <td class="num">{query0_KG}</td>
            <td class="num">{query0_Ancho}</td>
            <td class="num">{query0_Gramaje}</td>
            <td class="itemc">{query0_Equiv}</td>
            <td class="num" style="background:{fondo_metros}" onmouseover="resaltar(this.id,true)" onmouseout="resaltar(this.id,false)">{query0_Metros}</td>
            <td class="num" style="background:{fondo_ajuste}" onmouseover="resaltar(this.id,true)" onmouseout="resaltar(this.id,false)">{ajustes}</td>
            <td class="num">{diff_mts}</td>
            <td class="num" style="color:{color}">{valor}</td>
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
            <td></td>
            <td></td>
            <td></td>
            <td></td>
           <td style="text-align: right;"><b>{subtotal_Metros}</b></td>
           <td></td>
            <td></td>
           <td style="text-align: right;"><b>{total_valor}</b></td>
           
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
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align: right;"><b>{subtotal0_Metros}</b></td>
            <td></td>
            <td></td>
            <td style="text-align: right;"><b>{subtotal_valor}</b></td>
        </tr>
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->

