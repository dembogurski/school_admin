<!-- 
    Report Template File (control_billete)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
	<treset_page>

    <script type="text/javascript" src="include/jquery.js" > </script>

   <style>

    tr{
       font-size:13px;
    }
    label{
       font-size:13px;
       font-weight:bolder;
    }
    th{
       font-size:13px;
       font-weight:bolder;
       text-align:center;
    }
    .num{
      text-align:right;
      padding-right:3px;
      width:100%;
    }
    .bill{
      width:100%;
      text-align:center;
    }
    .cant{
      width:100%;
      text-align:center;
    }
    .cotiz{
      text-align:center;
    }
 
    </style>
 
        


<!-- end:   general_header -->


<!-- begin: start_query0 -->
<table style="text-align: left; width: 519px;" border="0"cellpadding="0" cellspacing="0">
    <tbody>
    <thead>
<tr> <td colspan="50"> 
	<table style="text-align: left; width: 100%;" border="1"
	 cellpadding="2" cellspacing="1">
	  <tbody>
		<tr>
		  <td style="width: 30%;">&nbsp;&nbsp;<small><small>ycube plus RAD [1.2.31]</small></small> </td>
		  <td style="text-align: center;font-size: 17px">
			<b>Marijoa</b></td>
		  <td style="text-align: right;">
			<tpage><b>Pag: </b></tpage>&nbsp;</td>
		</tr>
		<tr>

		  <td style="text-align: center;" colspan="3"> <big style="font-weight: bold;">  Control de Efectivo &nbsp;&nbsp;Suc: {sup_empr}</big> </td>

		</tr>
         
        
        </tr>
        <tr>
            <td colspan="3" style="text-align:center">
                <select style="font-weight:bolder">
                    <option  value="Recaudacion"><labe style="font-weight:bolder">Recaudacion</labe></option> 
                    <option style="font-weight:bolder" value="Sencillo"><labe style="font-weight:bolder">Sencillo</labe></option> 
                    <option style="font-weight:bolder" value="Caja Chica"><labe style="font-weight:bolder">Caja Chica Particular</labe></option> 
                    <option style="font-weight:bolder" value="Caja Chica"><labe style="font-weight:bolder">Caja Chica Empresa</labe></option> 
                </select> &nbsp;&nbsp;
                <label class="label">Fecha</label>   <input type="text" value="{hoy}" size="10" style="text-align:center">  &nbsp;&nbsp; <small><small>{user} - {time}</small></small>
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

<table border="1" cellpadding="4" cellspacing="5">
 <tr> <td valign="top">
     <table border="0" cellspacing="2"  cellpadding="0" >
         <tr style="background:gold"> <th colspan="3">          GUARANIES         </th> </tr>
         <tr><th>Billetes</th><th>Cantidad</th> <th>Total</th> </tr>
         <tr class="num" >
            <td> <input class="bill" type="text" value="100000" id="b_100"  size="10"  readonly="readonly" >  </td>
            <td> <input class="cant" type="text" value="0" size="4" id="c_100" name="cbgs"> </td>
            <td> <input class="bill" type="text" value="0" size="10" id="t_100" name="tbgs"   readonly="readonly"> </td>
         </tr>
         <tr class="num" >
            <td> <input class="bill" type="text" value="50000" id="b_50" size="10"  readonly="readonly" >  </td>
            <td> <input class="cant" type="text" value="0" size="4" id="c_50" name="cbgs"> </td>
            <td> <input class="bill" type="text" value="0" size="10" id="t_50"  name="tbgs"     readonly="readonly"> </td>
         </tr>
          <tr class="num" >
            <td> <input class="bill" type="text" value="20000" id="b_20" size="10"  readonly="readonly" >  </td>
            <td> <input class="cant" type="text" value="0" size="4" id="c_20" name="cbgs"> </td>
            <td> <input class="bill" type="text" value="0" size="10" id="t_20"   name="tbgs"    readonly="readonly"> </td>
         </tr>
          <tr class="num" >
            <td> <input class="bill" type="text" value="10000" id="b_10" size="10"  readonly="readonly" >  </td>
            <td> <input class="cant" type="text" value="0" size="4" id="c_10" name="cbgs"> </td>
            <td> <input class="bill" type="text" value="0" size="10" id="t_10"  name="tbgs"    readonly="readonly"> </td>
         </tr>
         <tr class="num" >
            <td> <input class="bill" type="text" value="5000" id="b_5" size="10"  readonly="readonly" >  </td>
            <td> <input class="cant" type="text" value="0" size="4" id="c_5" name="cbgs"> </td>
            <td> <input class="bill" type="text" value="0" size="10" id="t_5"  name="tbgs"    readonly="readonly"> </td>
         </tr>
          <tr class="num" >
            <td> <input class="bill" type="text" value="2000" id="b_2" size="10"  readonly="readonly" >  </td>
            <td> <input class="cant" type="text" value="0" size="4" id="c_2" name="cbgs"> </td>
            <td> <input class="bill" type="text" value="0" size="10" id="t_2"   name="tbgs"   readonly="readonly"> </td>
         </tr>
         
         <tr><th>Monedas</th><th> </th> <th> </th> </tr>
         <tr class="num" >
            <td> <input class="bill" type="text" value="1000" id="m_1000" size="10"  readonly="readonly" >  </td>
            <td> <input class="cant" type="text" value="0" size="4" id="cm_1000" name="cbgs"> </td>
            <td> <input class="bill" type="text" value="0" size="10" id="tm_1000" name="tbgs"   readonly="readonly"> </td>
         </tr>
         <tr class="num" >
            <td> <input class="bill" type="text" value="500" id="m_500" size="10"  readonly="readonly" >  </td>
            <td> <input class="cant" type="text" value="0" size="4" id="cm_500" name="cbgs"> </td>
            <td> <input class="bill" type="text" value="0" size="10" id="tm_500" name="tbgs"   readonly="readonly"> </td>
         </tr>
         <tr class="num" >
            <td> <input class="bill" type="text" value="100" id="m_100" size="10"  readonly="readonly" >  </td>
            <td> <input class="cant" type="text" value="0" size="4" id="cm_100" name="cbgs"> </td>
            <td> <input class="bill" type="text" value="0" size="10" id="tm_100" name="tbgs"   readonly="readonly"> </td>
         </tr>
         <tr class="num" >
            <td> <input class="bill" type="text" value="50" id="m_50" size="10"  readonly="readonly" >  </td>
            <td> <input class="cant" type="text" value="0" size="4" id="cm_50" name="cbgs"> </td>
            <td> <input class="bill" type="text" value="0" size="10" id="tm_50" name="tbgs"   readonly="readonly"> </td>
         </tr>

         <tr class="num" >
            <td colspan="2"><b>Total Gs.&nbsp;&nbsp;</b>   </td>
            <td> <input style="font-weight:bolder;" class="bill" type="text" value="0" size="10" id="total_gs"  readonly="readonly"> </td>
         </tr>
     </table>

  </td>
<td  valign="top">

<table border="0" cellspacing="2"  cellpadding="0" >
<tr style="background:#009900"> <th colspan="3" align="center" > REALES   </th> </tr>
         <tr><th>Billetes</th><th>Cantidad</th> <th>Total</th> </tr>
         <tr class="num" >
            <td> <input class="bill" type="text" value="100" id="rs_100" size="10"  readonly="readonly" >  </td>
            <td> <input class="cant" type="text" value="0" size="4" id="crs_100" name="cbrs"> </td>
            <td> <input class="bill" type="text" value="0" size="10" id="trs_100" name="tbrs"   readonly="readonly"> </td>
         </tr>
         <tr class="num" >
            <td> <input class="bill" type="text" value="50" id="rs_50" size="10"  readonly="readonly" >  </td>
            <td> <input class="cant" type="text" value="0" size="4" id="crs_50" name="cbrs"> </td>
            <td> <input class="bill" type="text" value="0" size="10" id="trs_50"  name="tbrs"     readonly="readonly"> </td>
         </tr>
          <tr class="num" >
            <td> <input class="bill" type="text" value="20" id="rs_20" size="10"  readonly="readonly" >  </td>
            <td> <input class="cant" type="text" value="0" size="4" id="crs_20" name="cbrs"> </td>
            <td> <input class="bill" type="text" value="0" size="10" id="trs_20"   name="tbrs"    readonly="readonly"> </td>
         </tr>
          <tr class="num" >
            <td> <input class="bill" type="text" value="10" id="rs_10" size="10"  readonly="readonly" >  </td>
            <td> <input class="cant" type="text" value="0" size="4" id="crs_10" name="cbrs"> </td>
            <td> <input class="bill" type="text" value="0" size="10" id="trs_10"  name="tbrs"    readonly="readonly"> </td>
         </tr>
         <tr class="num" >
            <td> <input class="bill" type="text" value="5" id="rs_5" size="10"  readonly="readonly" >  </td>
            <td> <input class="cant" type="text" value="0" size="4" id="crs_5" name="cbrs"> </td>
            <td> <input class="bill" type="text" value="0" size="10" id="trs_5"  name="tbrs"    readonly="readonly"> </td>
         </tr>
          <tr class="num" >
            <td> <input class="bill" type="text" value="2" id="rs_2" size="10"  readonly="readonly" >  </td>
            <td> <input class="cant" type="text" value="0" size="4" id="crs_2" name="cbrs"> </td>
            <td> <input class="bill" type="text" value="0" size="10" id="trs_2"   name="tbrs"   readonly="readonly"> </td>
         </tr>
          <tr class="num" >
            <td> <input class="bill" type="text" value="1" id="rs_1" size="10"  readonly="readonly" >  </td>
            <td> <input class="cant" type="text" value="0" size="4" id="crs_1" name="cbrs"> </td>
            <td> <input class="bill" type="text" value="0" size="10" id="trs_1"   name="tbrs"   readonly="readonly"> </td>
         </tr>

         <tr><th>Monedas</th><th> </th> <th> </th> </tr>
         <tr class="num" >
            <td> <input class="bill" type="text" value="1" id="mrs_1" size="10"  readonly="readonly" >  </td>
            <td> <input class="cant" type="text" value="0" size="4" id="cmrs_1" name="cbrs"> </td>
            <td> <input class="bill" type="text" value="0" size="10" id="tmrs_1" name="tbrs"   readonly="readonly"> </td>
         </tr>
         <tr class="num" >
            <td> <input class="bill" type="text" value="0.50" id="mrs_05" size="10"  readonly="readonly" >  </td>
            <td> <input class="cant" type="text" value="0" size="4" id="cmrs_05" name="cbrs"> </td>
            <td> <input class="bill" type="text" value="0" size="10" id="tmrs_05" name="tbrs"   readonly="readonly"> </td>
         </tr>
         <tr class="num" >
            <td> <input class="bill" type="text" value="0.25" id="mrs_025" size="10"  readonly="readonly" >  </td>
            <td> <input class="cant" type="text" value="0" size="4" id="cmrs_025" name="cbrs"> </td>
            <td> <input class="bill" type="text" value="0" size="10" id="tmrs_025" name="tbrs"   readonly="readonly"> </td>
         </tr>
         <tr class="num" >
            <td> <input class="bill" type="text" value="0.10" id="mrs_010" size="10"  readonly="readonly" >  </td>
            <td> <input class="cant" type="text" value="0" size="4" id="cmrs_010" name="cbrs"> </td>
            <td> <input class="bill" type="text" value="0" size="10" id="tmrs_010" name="tbrs"   readonly="readonly"> </td>
         </tr>
         <tr class="num" >
            <td> <input class="bill" type="text" value="0.05" id="mrs_005" size="10"  readonly="readonly" >  </td>
            <td> <input class="cant" type="text" value="0" size="4" id="cmrs_005" name="cbrs"> </td>
            <td> <input class="bill" type="text" value="0" size="10" id="tmrs_005" name="tbrs"   readonly="readonly"> </td>
         </tr>

         <tr class="num" >
            <td colspan="2"><b>Total Rs.&nbsp;&nbsp;</b> </td>
            <td> <input style="font-weight:bolder;" class="bill" type="text" value="0" size="10" id="total_rs"  readonly="readonly"> </td>
         </tr>
</table>

</td> </tr>


<tr>
   <td>
       <table border="0" cellspacing="2"  cellpadding="0" >
        <tr style="background:orange"> <th colspan="3" align="center" > PESOS ARGENTINOS   </th> </tr>
                 <tr><th>Billetes</th><th>Cantidad</th> <th>Total</th> </tr>
                 <tr class="num" >
                    <td> <input class="bill" type="text" value="100" id="ps_100" size="10"  readonly="readonly" >  </td>
                    <td> <input class="cant" type="text" value="0" size="4" id="cps_100" name="cbps"> </td>
                    <td> <input class="bill" type="text" value="0" size="10" id="tps_100" name="tbps"   readonly="readonly"> </td>
                 </tr>
                 <tr class="num" >
                    <td> <input class="bill" type="text" value="50" id="ps_50" size="10"  readonly="readonly" >  </td>
                    <td> <input class="cant" type="text" value="0" size="4" id="cps_50" name="cbps"> </td>
                    <td> <input class="bill" type="text" value="0" size="10" id="tps_50"  name="tbps"     readonly="readonly"> </td>
                 </tr>
                  <tr class="num" >
                    <td> <input class="bill" type="text" value="20" id="ps_20" size="10"  readonly="readonly" >  </td>
                    <td> <input class="cant" type="text" value="0" size="4" id="cps_20" name="cbps"> </td>
                    <td> <input class="bill" type="text" value="0" size="10" id="tps_20"   name="tbps"    readonly="readonly"> </td>
                 </tr>
                  <tr class="num" >
                    <td> <input class="bill" type="text" value="10" id="ps_10" size="10"  readonly="readonly" >  </td>
                    <td> <input class="cant" type="text" value="0" size="4" id="cps_10" name="cbps"> </td>
                    <td> <input class="bill" type="text" value="0" size="10" id="tps_10"  name="tbps"    readonly="readonly"> </td>
                 </tr>
                 <tr class="num" >
                    <td> <input class="bill" type="text" value="5" id="ps_5" size="10"  readonly="readonly" >  </td>
                    <td> <input class="cant" type="text" value="0" size="4" id="cps_5" name="cbps"> </td>
                    <td> <input class="bill" type="text" value="0" size="10" id="tps_5"  name="tbps"    readonly="readonly"> </td>
                 </tr>
                  <tr class="num" >
                    <td> <input class="bill" type="text" value="2" id="ps_2" size="10"  readonly="readonly" >  </td>
                    <td> <input class="cant" type="text" value="0" size="4" id="cps_2" name="cbps"> </td>
                    <td> <input class="bill" type="text" value="0" size="10" id="tps_2"   name="tbps"   readonly="readonly"> </td>
                 </tr>
                  <tr class="num" >
                    <td> <input class="bill" type="text" value="1" id="ps_1" size="10"  readonly="readonly" >  </td>
                    <td> <input class="cant" type="text" value="0" size="4" id="cps_1" name="cbps"> </td>
                    <td> <input class="bill" type="text" value="0" size="10" id="tps_1"   name="tbps"   readonly="readonly"> </td>
                 </tr>

                 <tr><th>Monedas</th><th> </th> <th> </th> </tr>
                 <tr class="num" >
                    <td> <input class="bill" type="text" value="1" id="mps_1" size="10"  readonly="readonly" >  </td>
                    <td> <input class="cant" type="text" value="0" size="4" id="cm_1" name="cbps"> </td>
                    <td> <input class="bill" type="text" value="0" size="10" id="tm_1" name="tbps"   readonly="readonly"> </td>
                 </tr>
                 <tr class="num" >
                    <td> <input class="bill" type="text" value="0.50" id="mps_05" size="10"  readonly="readonly" >  </td>
                    <td> <input class="cant" type="text" value="0" size="4" id="cm_05" name="cbps"> </td>
                    <td> <input class="bill" type="text" value="0" size="10" id="tm_05" name="tbps"   readonly="readonly"> </td>
                 </tr>
                 <tr class="num" >
                    <td> <input class="bill" type="text" value="0.25" id="mps_025" size="10"  readonly="readonly" >  </td>
                    <td> <input class="cant" type="text" value="0" size="4" id="cm_025" name="cbps"> </td>
                    <td> <input class="bill" type="text" value="0" size="10" id="tm_025" name="tbps"   readonly="readonly"> </td>
                 </tr>
                 <tr class="num" >
                    <td> <input class="bill" type="text" value="0.10" id="mps_010" size="10"  readonly="readonly" >  </td>
                    <td> <input class="cant" type="text" value="0" size="4" id="cm_010" name="cbps"> </td>
                    <td> <input class="bill" type="text" value="0" size="10" id="tm_010" name="tbps"   readonly="readonly"> </td>
                 </tr>
                 <tr class="num" >
                    <td> <input class="bill" type="text" value="0.05" id="mps_005" size="10"  readonly="readonly" >  </td>
                    <td> <input class="cant" type="text" value="0" size="4" id="cm_005" name="cbps"> </td>
                    <td> <input class="bill" type="text" value="0" size="10" id="tm_005" name="tbps"   readonly="readonly"> </td>
                 </tr>

                 <tr class="num" >
                    <td colspan="2"><b>Total Ps.&nbsp;&nbsp;</b> </td>
                    <td> <input style="font-weight:bolder;" class="bill" type="text" value="0" size="10" id="total_ps"  readonly="readonly"> </td>
                 </tr>
        </table>


   </td>

   <td>

        <table border="0" cellspacing="2"  cellpadding="0" >
        <tr style="background:#CCFFFF"> <th colspan="3" align="center" > DOLARES   </th> </tr>
                 <tr><th>Billetes</th><th>Cantidad</th> <th>Total</th> </tr>
                 <tr class="num" >
                    <td> <input class="bill" type="text" value="100" id="us_100" size="10"  readonly="readonly" >  </td>
                    <td> <input class="cant" type="text" value="0" size="4" id="cus_100" name="cbus"> </td>
                    <td> <input class="bill" type="text" value="0" size="10" id="tus_100" name="tbus"   readonly="readonly"> </td>
                 </tr>
                 <tr class="num" >
                    <td> <input class="bill" type="text" value="50" id="us_50" size="10"  readonly="readonly" >  </td>
                    <td> <input class="cant" type="text" value="0" size="4" id="cus_50" name="cbus"> </td>
                    <td> <input class="bill" type="text" value="0" size="10" id="tus_50"  name="tbus"     readonly="readonly"> </td>
                 </tr>
                  <tr class="num" >
                    <td> <input class="bill" type="text" value="20" id="us_20" size="10"  readonly="readonly" >  </td>
                    <td> <input class="cant" type="text" value="0" size="4" id="cus_20" name="cbus"> </td>
                    <td> <input class="bill" type="text" value="0" size="10" id="tus_20"   name="tbus"    readonly="readonly"> </td>
                 </tr>
                  <tr class="num" >
                    <td> <input class="bill" type="text" value="10" id="us_10" size="10"  readonly="readonly" >  </td>
                    <td> <input class="cant" type="text" value="0" size="4" id="cus_10" name="cbus"> </td>
                    <td> <input class="bill" type="text" value="0" size="10" id="tus_10"  name="tbus"    readonly="readonly"> </td>
                 </tr>
                 <tr class="num" >
                    <td> <input class="bill" type="text" value="5" id="us_5" size="10"  readonly="readonly" >  </td>
                    <td> <input class="cant" type="text" value="0" size="4" id="cus_5" name="cbus"> </td>
                    <td> <input class="bill" type="text" value="0" size="10" id="tus_5"  name="tbus"    readonly="readonly"> </td>
                 </tr>
                  <tr class="num" >
                    <td> <input class="bill" type="text" value="2" id="us_2" size="10"  readonly="readonly" >  </td>
                    <td> <input class="cant" type="text" value="0" size="4" id="cus_2" name="cbus"> </td>
                    <td> <input class="bill" type="text" value="0" size="10" id="tus_2"   name="tbus"   readonly="readonly"> </td>
                 </tr>
                  <tr class="num" >
                    <td> <input class="bill" type="text" value="1" id="us_1" size="10"  readonly="readonly" >  </td>
                    <td> <input class="cant" type="text" value="0" size="4" id="cus_1" name="cbus"> </td>
                    <td> <input class="bill" type="text" value="0" size="10" id="tus_1"   name="tbus"   readonly="readonly"> </td>
                 </tr>

                 <tr><th>Monedas</th><th> </th> <th> </th> </tr>
                 <tr class="num" >
                    <td> <input class="bill" type="text" value="1" id="mus_1" size="10"  readonly="readonly" >  </td>
                    <td> <input class="cant" type="text" value="0" size="4" id="cmus_1" name="cbus"> </td>
                    <td> <input class="bill" type="text" value="0" size="10" id="tmus_1" name="tbus"   readonly="readonly"> </td>
                 </tr>
                 <tr class="num" >
                    <td> <input class="bill" type="text" value="0.50" id="mus_05" size="10"  readonly="readonly" >  </td>
                    <td> <input class="cant" type="text" value="0" size="4" id="cmus_05" name="cbus"> </td>
                    <td> <input class="bill" type="text" value="0" size="10" id="tmus_05" name="tbus"   readonly="readonly"> </td>
                 </tr>
                 <tr class="num" >
                    <td> <input class="bill" type="text" value="0.25" id="mus_025" size="10"  readonly="readonly" >  </td>
                    <td> <input class="cant" type="text" value="0" size="4" id="cmus_025" name="cbus"> </td>
                    <td> <input class="bill" type="text" value="0" size="10" id="tmus_025" name="tbus"   readonly="readonly"> </td>
                 </tr>
                 <tr class="num" >
                    <td> <input class="bill" type="text" value="0.10" id="mus_010" size="10"  readonly="readonly" >  </td>
                    <td> <input class="cant" type="text" value="0" size="4" id="cmus_010" name="cbus"> </td>
                    <td> <input class="bill" type="text" value="0" size="10" id="tmus_010" name="tbus"   readonly="readonly"> </td>
                 </tr>
                 <tr class="num" >
                    <td> <input class="bill" type="text" value="0.05" id="mus_005" size="10"  readonly="readonly" >  </td>
                    <td> <input class="cant" type="text" value="0" size="4" id="cmus_005" name="cbus"> </td>
                    <td> <input class="bill" type="text" value="0" size="10" id="tmus_005" name="tbus"   readonly="readonly"> </td>
                 </tr>

                 <tr class="num" >
                    <td colspan="2"><b>Total Us.&nbsp;&nbsp;</b> </td>
                    <td> <input style="font-weight:bolder;" class="bill" type="text" value="0" size="10" id="total_us"  readonly="readonly"> </td>
                 </tr>
        </table>


   </td>
</tr>

<tr>
   <td colspan="2"><b>Cotizaciones de Monedas </b><br>
   <label>Real:&nbsp;</label><input class="cotiz" type="text" value="{cotiz_real}"  id="cotiz_rs" size="6"  >&nbsp;&nbsp;
   <label>Peso:&nbsp;</label><input class="cotiz" type="text" value="{cotiz_peso}"  id="cotiz_ps" size="6"  >&nbsp;&nbsp;
   <label>Dolar:&nbsp;</label><input class="cotiz" type="text" value="{cotiz_dolar}"  id="cotiz_us" size="6"  >
   </td>
</tr>
<tr>
<td colspan="2"> <label>TOTAL Gs:&nbsp;&nbsp;</label><input class="cotiz" type="text" style="font-weight:bolder;" value="0"  id="total_all" size="18" readonly="readonly" >&nbsp;&nbsp;
    <a class="noprint" href="javascript:totalizar()" >+</a>
</td>
</tr>

 

</table>
<br><br>

<div align="left"> <b>Elaborado por:&nbsp; _____________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Verificado por:&nbsp; _____________ </b>     </div>

<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->
        <tr>
            <td></td>
        </tr>
<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
        <tr>
            <td></td>
        </tr>
<!-- end:    query0_subtotal_row -->

<!-- begin: end_query0 noeval -->
    </tbody>
</table>


    <script type="text/javascript">
     var total_gs = 0;
     var total_ps = 0;
     var total_rs = 0;
     var total_us = 0;
     function setChange(id_cant,id_total,id_billete){
       $("#"+id_cant).change(function() {
         $("#"+id_total).val($("#"+id_billete).val()*$("#"+id_cant).val());
       });
     }
function formatoMoneda(num){ 
    var cadena = "";
    
    var aux;

    var cont = 1,m,k;

    if(num<0) aux=1; else aux=0;

    num=num.toString();



    for(m=num.length-1; m>=0; m--){

     cadena = num.charAt(m) + cadena;

     if(cont%3 == 0 && m >aux)  cadena = "." + cadena; else cadena = cadena;

     if(cont== 3) cont = 1; else cont++;

    }

    cadena = cadena.replace(/.,/,",");

    return cadena;
}
     // Billetes Gs
     setChange("c_100","t_100","b_100");
     setChange("c_50","t_50","b_50");
     setChange("c_20","t_20","b_20");
     setChange("c_10","t_10","b_10");
     setChange("c_5","t_5","b_5");
     setChange("c_2","t_2","b_2");
     // Monedas Gs
     setChange("cm_1000","tm_1000","m_1000");
     setChange("cm_500","tm_500","m_500");
     setChange("cm_100","tm_100","m_100");
     setChange("cm_50","tm_50","m_50");

     // Reales Brasileros
     setChange("crs_100","trs_100","rs_100");
     setChange("crs_50","trs_50","rs_50");
     setChange("crs_20","trs_20","rs_20");
     setChange("crs_10","trs_10","rs_10");
     setChange("crs_5","trs_5","rs_5");
     setChange("crs_2","trs_2","rs_2");
     setChange("crs_1","trs_1","rs_1");
     // Monedas
     setChange("cmrs_1","tmrs_1","mrs_1");
     setChange("cmrs_05","tmrs_05","mrs_05");
     setChange("cmrs_025","tmrs_025","mrs_025");
     setChange("cmrs_010","tmrs_010","mrs_010");
     setChange("cmrs_005","tmrs_005","mrs_005");

     // Pesos Argentinos
     setChange("cps_100","tps_100","ps_100");
     setChange("cps_50","tps_50","ps_50");
     setChange("cps_20","tps_20","ps_20");
     setChange("cps_10","tps_10","ps_10");
     setChange("cps_5","tps_5","ps_5");
     setChange("cps_2","tps_2","ps_2");
     setChange("cps_1","tps_1","ps_1");
     // Monedas
     setChange("cm_1","tm_1","mps_1");
     setChange("cm_05","tm_05","mps_05");
     setChange("cm_025","tm_025","mps_025");
     setChange("cm_010","tm_010","mps_010");
     setChange("cm_005","tm_005","mps_005");

     // Dolares
     setChange("cus_100","tus_100","us_100");
     setChange("cus_50","tus_50","us_50");
     setChange("cus_20","tus_20","us_20");
     setChange("cus_10","tus_10","us_10");
     setChange("cus_5","tus_5","us_5");
     setChange("cus_2","tus_2","us_2");
     setChange("cus_1","tus_1","us_1");
     // Monedas
     setChange("cmus_1","tmus_1","mus_1");
     setChange("cmus_05","tmus_05","mus_05");
     setChange("cmus_025","tmus_025","mus_025");
     setChange("cmus_010","tmus_010","mus_010");
     setChange("cmus_005","tmus_005","mus_005");

     $('input[name$="cbgs"]').change(function(){
       total_gs = 0;
       $('input[name$="tbgs"]').each(function(){
          var valor = parseFloat( $(this).val() );
          total_gs += valor;
           $("#total_gs").val(total_gs);
       });
       
     });
      // Totalizador Reales
     $('input[name$="cbrs"]').change(function(){
       total_rs = 0;
       $('input[name$="tbrs"]').each(function(){
          var valor = parseFloat( $(this).val() );
          total_rs += valor;
           $("#total_rs").val(total_rs);
       });

     });

     // Totalizador Pesos Argentinos
     $('input[name$="cbps"]').change(function(){
       total_ps = 0;
       $('input[name$="tbps"]').each(function(){
          var valor = parseFloat( $(this).val() );
          total_ps += valor;
           $("#total_ps").val(total_ps);
       });

     });
      // Totalizador Dolares
     $('input[name$="cbus"]').change(function(){
       total_us = 0;
       $('input[name$="tbus"]').each(function(){
          var valor = parseFloat( $(this).val() );
          total_us += valor;
           $("#total_us").val(total_us);
       });

     });

     // Totalizador moneda de referencia
     function referencia(){
         var gs = parseInt( $("#total_gs").val());
         var rs = parseFloat( $("#total_rs").val())* parseInt($("#cotiz_rs").val());
         var ps = parseFloat($("#total_ps").val()) * parseInt($("#cotiz_ps").val());
         var us = parseFloat($("#total_us").val()) * parseInt($("#cotiz_us").val());
         var total = parseFloat(gs + rs + ps + us);
         $("#total_all").val( total );   
         var nro = formatoMoneda( $("#total_all").val(), false);
         $("#total_all").val(nro)
     }
     function setChangeTotal(id_total){
       $("#cotiz_"+id_total).focus(function() {
         // referencia();
       });
       
       $("#cotiz_"+id_total).blur(function() {
          referencia();
       });

     }
     //setChangeTotal("gs");
     setChangeTotal("rs");
     setChangeTotal("ps");
     setChangeTotal("us");
     
     function totalizar(){
        referencia();
     }
     
     $(document).ready(
               
      $("input[type='text']" ).change(function() {
         totalizar();
      })  
        
     );



    </script>



<!-- end:   end_query0 -->




