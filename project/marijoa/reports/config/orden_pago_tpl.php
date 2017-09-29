<!-- 
    Report Template File (orden_pago)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
	<treset_page>
            <style>
                 .title{
                    text-align:left;
                    padding-left:10px;
                    padding-right:10px;
                    padding-top: 2px;
                    padding-bottom: 2px;
                    font-size:14px;
                    font-weight:bolder;
                  }
                  .data{
                    text-align:left;
                    padding-left:10px;
                    padding-right:10px;
                    padding-top: 2px;
                    padding-bottom: 2px;
                    font-size:14px;                    
                  }
                  
                  th{
                    font-size:15px;  
                    font-weight:bolder;
                    text-align: center;
                    padding: 4px;
                  }
                  .item{
                    font-size:14px;   
                    padding: 4px;
                  }
                  .cell{
                      height: 62px; 
                      vertical-align: bottom;
                      text-align: center
                  }
                  
                  .cell_head{
                      background: rgb(200,200,200);
                  }
                  
            </style>    
<!-- end:   general_header -->


<!-- begin: start_query0 -->
<table style="text-align: left; width: 99%;" border="1"cellpadding="0" cellspacing="0">
    <tbody>
    <thead>
<tr> <td colspan="50"> 
	<table style="text-align: left; width: 100%;" border="1"
	 cellpadding="0" cellspacing="0">
	  <tbody>
		<tr>
		  <td style="width: 25%">
                    <img src="images/logo_marijoa.png" border="0" alt="Marijoa Tejidos" width="240px" height="80px" >
                  </td>
		  
                      <td style="text-align: center;width: 50%"><big style="font-weight: bold;"> <big>ORDEN DE PAGO</big></td>
                  
		  <td style="text-align: left;width: 25%">
                      <b>&nbsp; N&deg;.: {query0_NRO}</b>
                  </td>
		</tr>
		<tr>
	 
		  <td colspan="2" >
                      <table border="1" cellpadding="0" cellspacing="0" width="100%" >
                          <tr> <td class="title">Fecha Emisi&oacute;n:</td> <td class="data">{query0_FECHA}</td> 
                            <td  class="title">Cuenta Corriente:</td> <td  class="data">{query0_BANCO}&nbsp;{query0_MONEDA} &nbsp; &QUOT;{query0_CTA}&QUOT;  </td>
                        </tr>
                        <tr> <td class="title">Fecha Pago:</td> <td  class="data">{fecha_pago}</td>
                             <td  class="title">Cheque N&deg;:</td> <td  class="data">{query0_CHEQUE}</td>
                        </tr>
                        <tr> <td class="title">Beneficiario:</td> <td  class="data">{query0_BENEF}</td>
                             <td  class="title">Moneda:</td> <td  class="data">{query0_MONEDA}</td>
                        </tr>
                        <tr>
                            <td class="title">C.I./R.U.C.:</td> <td  class="data">{query0_RUC}</td> <td class="title">SUC:</td> <td  class="data">{nombre_suc}</td>                          
                        </tr>
                                       
                      </table>    
                  </td>
                  
		  <td style="text-align: right;">
			 {user} - {time} <br> <small><small>ycube plus RAD [1.2.31]</small></small>
		  </td>
		</tr>
	  </tbody>
	</table> 
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th  style="width:80%">CONCEPTO</th>
        <th>MONTO</th> 
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"></td></tr>
</tfoot>
<!-- end:   header0 -->



<!-- begin: query0_data_row -->
        <tr> 
            <td class="item" style="width:80%">{query0_CONCEPTO}</td> 
            <td class="item" style="text-align: right; vertical-align: top "  >{query0_MONTO}</td>
        </tr>
<!-- end:    query0_data_row --> 

<!-- begin: total -->
        <tr> 
            <td class="item" style="width:80%;height: 36px">&nbsp; SON {letras}&nbsp;{mon} &nbsp;~~~~~~~</td> 
            <td class="item" style="text-align: right; vertical-align: bottom " > <b> {query0_MONTO}&nbsp;{query0_MONEDA} </b></td>
        </tr>
             
        
<!-- end:    total --> 



<!-- begin: end_query0 -->
    <tr>
        <td colspan="2" style="padding:0px">
            <table border="1" cellpadding="0" cellspacing="0" width="100%" >
                <tr> 
                    <th class="cell_head"  >Elaborado por</th> 
                    <th class="cell_head" >Verificado por</th>  
                    <th class="cell_head" >Autorizado por</th>
                 </tr>
                 <tr>
                    <td class="cell" style="text-align:left;padding: 2px">Firma...........................................................</td> 
                    <td class="cell" style="text-align:left;padding: 2px">Firma...........................................................</td>
                    <td class="cell" style="text-align:left;padding: 2px">Firma...........................................................</td>
                 </tr>
                 
                 <tr> 
                    <td class="cell" style="text-align:left;padding: 2px" >Aclaraci&oacute;n.....................................................</td>
                    <td class="cell" style="text-align:left;padding: 2px">Aclaraci&oacute;n.....................................................</td>
                    <td class="cell" style="text-align:left;padding: 2px">Aclaraci&oacute;n.....................................................</td>
                 </tr>
                 
                 
                 <tr> <th colspan="3" style="height:36px" > Recibido </th> </tr>
                 
                 <tr> 
                    <th class="cell_head" >Fecha</th> 
                    <th class="cell_head" style="width:33%" >Firma / C.I. N&deg;</th>  
                    <th class="cell_head" >Aclaraci&oacute;n</th>
                 </tr>
                 <tr>
                    <td class="cell">____/____/______</td> 
                    <td class="cell">.....................................................</td>
                    <td class="cell">.....................................................</td>
                 </tr>
            </table>         
            <br>
        </td>     
    </tr>
 
    
    </tbody>
</table>
<!-- end:   end_query0 -->

