<!-- 
    Report Template File (packing_list)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
 <script type="text/javascript" src="include/jquery1.2.6.js" > </script>
-->

<!-- begin: general_header noeval -->
       <link rel="stylesheet" type="text/css" href="templates/reports.css" /> 
       <script type="text/javascript" src="include/jquery.js" > </script>
        
	<treset_page>
<style type="text/css">
    .design{
        background-color: activeborder;
    }        
    .minititle{
        font-size: 11px;
        font-weight: bold;
    }
    .mar_bag{
        font-size:11px;
        padding-left:3px;
        text-align:center;
    }
    .mar_bag_painted{
        font-size:11px;
        padding-left:3px;
        text-align:center;
        background: #228B22;
    }
    .texto{
        width: 100%;
        border:solid 0px white; 
        font-size:11px;
    }
     .numero{
        width: 100%;
        border:solid 0px white; 
        font-size:11px;
        text-align: right;
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
        margin-top: 40px;
        margin-left: 25%;
        margin-right: 25%;  
    }
    
 
    /*
    .complete{
        background-color: #B0E2FF;
    }
    */
    
</style>         

 
<script language="javascript"> 
 
      
  
       
    $(document).ready(function() {  
        $("#loading").html("&nbsp;...");   
       
     }); 
 
   
      
    
   
</script>    
<input type="hidden" id="usuario" value="{user}">
<input type="hidden" id="ref" value="{ref}">
<div id="message" class="message"  style="display:none;"  >     </div>
 
<!-- end:   general_header -->


<!-- begin: start_query0 -->

<table style="text-align: left; width: 100%;" border="1" cellpadding="0" cellspacing="0" onkeyup="chekKey(event.KeyCode);" >
    <tbody>
    <thead>
<tr> <td colspan="50"> 
	<table style="text-align: left; width: 100%;" border="1"
	 cellpadding="0" cellspacing="0">
	  <tbody>
		<tr>
                    <td style="width: 20%;height:40px;"> <span id="loading" style="color:green"><label>&nbsp;Cargando espere... </label> <img src="images/search2.gif"  ></span>   </td>
		  <td style="text-align: center;width: 60%;">
			<b>Marijoa</b></td>
		  <td style="text-align: right;">
			<tpage><b>Pag: </b></tpage></td>
		</tr>
		<tr>
		  <td  style="width: 20%;">
			<small><small>ycube plus RAD [1.2.31]</small></small>
		  </td>
		  <td style="text-align: center;">
                      <big style="font-weight: bold;"><big>Packing List</big>
                    
                          <div style="text-align: center">
                              <b>Ref:</b> {ref}  <b> &nbsp;&nbsp;&nbsp; Invoice: </b> {invoice} 
                          </div>    
                  </td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
                  <tr><td colspan="3">
                        <table cellpadding="2" cellspacing="2" border="0" style="width:100%;">
                            <tr> <td style="width:15%"><label>Fecha de Descarga:</label></td><td><input type="text" class="date-pick" readonly maxlength="10" size="10" id="fecha_desc" onchange="saveCab()" value="{fecha_desc}">
                                <label>Estado:</label> {estado} </td> 
                            <td style="width:15%"><label>Transportadora:</label></td><td><input type="text" id="transp" onchange="saveCab()" {state} value="{transp}" style="width:100%"></td> </tr>
                           <tr> 
                               <td><label>Integrantes:</label></td><td><input type="text" id="integrantes" onchange="saveCab()" {state} value="{integ}" style="width:100%"></td>
                               <td><label>Supervisor:</label></td><td><input type="text" id="supervisor" onchange="saveCab()" {state} value="{superv}" style="width:100%"></td> 
                           </tr>
                           <tr> 
                               <td><label>Observacion:</label> </td><td colspan="3">  <textarea {state} style="width:100%">{observacion}</textarea></td> 
                           </tr>
                        </table> 
                    </td> </tr>                
                 
	  </tbody>
	</table>
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr id="cabecera">
        <th class="design" style="width: 15%">Design/Descrip</th>
        <th class="design" style="width: 10%">Mar</th>
        <th class="design" style="width: 5%">Bag/Bulto</th>
        <th class="design" style="width: 5%">Precio</th>
        <th class="design" style="width: 10%">Color Desc.</th>
        <th class="design" style="width: 5%">Each Quty</th>
        <th class="design" style="width: 5%">Unit</th>
                                                      <th class="design" style="width: 5%">Codigo 
        <th style="width: 13%">Color</th>
        <th style="width: 5%">Quty Ticket</th>
        <!--  <th style="width: 5%">Kg Real</th>
        <th style="width: 5%">Ancho</th>
        <th style="width: 5%">Gramaje</th>
        <th style="width: 4%">N&deg; Foto</th> -->  
        <th colspan="4" >Obs</th>
        
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
    <tr >
            <td class="item"  >{query0_p_design}</td>
            <td class="mar_bag"   >{query0_p_mar}</td>
            <td class="mar_bag"  >{query0_p_bag}</td>
            <td class="num"  >{query0_p_precio}</td>
            <td class="item" >{query0_p_color_desc}</td>
            <td class="num"  >{query0_p_each_quty}</td>
            <td class="itemc">{query0_p_unit}</td>
            <td class="item" >{query0_p_cod} </td> 
            <td class="item ">  {query0_p_color}  </td>
            <td class="num ">  {query0_p_qty_ticket} </td>
                                                                 <!-- <td class="num">   {query0_p_kg_real}  </td>
                                                                 <td class="num">   {query0_p_ancho}  </td>
                                                                 <td class="num">   {query0_p_gram}  </td>
                                                                 <td class="itemc"> {query0_p_foto}  </td>  -->
            <td class="itemc"  colspan="4" style="background:{completo}" >{query0_p_obs}</td>
            
         </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr>
            <td colspan="3" style="font-size:14px" ><b>&nbsp;&nbsp;Total: {cant_rec}/{cant}&nbsp;rollos completos &nbsp;&nbsp; {diff_cant}&nbsp;incompletos </b></td>
              
            <td colspan="3" style="text-align: center"><b>Resumen</b></td>
        
            <td style="text-align: right;font-size: 12px;padding-right: 2px"><b> </b></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align: right;font-size: 12px;padding-right: 2px"><b> </b></td>
            <td colspan="4"> </td>
        </tr>
        <tr style="text-align: center;background: lightgrey"> <td colspan="3"></td> <td>U.M.</td> <td colspan="2">Diferencia</td>    </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align: right;font-size: 12px;padding-right: 2px"><b>{subtotal0_p_each_quty}</b></td>
            <td></td>
            <td></td>          
            <td style="text-align: right;font-size: 12px;padding-right: 2px"><b>{subtotal0_p_qty_ticket}</b></td>
            <td style="text-align: right;font-size: 12px;padding-right: 2px;width:100px"><b>{subtotal0_diff}</b></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr><td style="border-bottom-color: white;border:solid white 0px" >&nbsp;</td></tr>
<!-- end:    query0_subtotal_row -->


<!-- begin: resumen -->
<tr>   <td colspan="3" style="font-size:14px" ></td> <td style="text-align: center">{unidad}</td> <td colspan="2" style="text-align: center;color: {color}">{valor}</td> </tr>
<!-- end:   resumen -->


<!-- begin: end_query0 -->
    </tbody>
</table>
<!-- end:   end_query0 -->

