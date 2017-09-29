
<!-- begin: editar_asiento -->
<table border='1' cellspacing='2' cellpadding='2' width="100%">
    <tr><th>ID</th><th>NRO</h><th>CODIGO</th> <th><img  onclick="cerrarPopup()" style="float:right;cursor:pointer;" src="images/12-em-cross.png" /></th></tr> 
   <tr>
       <td id="id">{id}</td>
       <td>{nro_as}</td>
       <td>{codigo}</td>
       <td> </td>
       <td> </td>
   </tr>
   <tr>
     <td colspan="5" align="center">
         <input type="button" value="Cancelar" onclick="cerrarPopup()" >   <input type="button" value="Eliminar Asiento" >   <input type="button" value="Guardar" >    
     </td>
   </tr>
   
</table>
<!-- end:   editar_asiento -->


<!-- begin: reposicion_discriminada -->
<table border='1' cellspacing='0' cellpadding='0' width="100%"> 
    <tr >
       <td style="width:100px"><b>Minoristas</b></td>
       <td class="num"  title="Stock Actual">{cant_actual}</td>
       <td class="num"  title="Venta Previa">{vp_min}</td>
       <td class="num"  title="Stock Proyectado">{cp_min}</td>
       <td class="num"  title="P1">{p1_min}</td>
       <td class="num"  title="P2">{p2_min}</td>
       <td class="num"  title="P3">{p3_min}</td>
       <td class="num"  title="Tendencia">{tend_min}</td>
       <td class="num"  title="Venta Estimada">{ve_min}</td>
       <td class="num"  title="Prevision">{prev_min}</td>
   </tr>
   <tr style="background-color: #DDDDDD">
       <td style="width:100px"><b>Mayoristas</b></td>
       <td class="num"  title="Stock Actual">{cant_actual}</td>
       <td class="num"  title="Venta Previa">{vp_may}</td>
       <td class="num"  title="Stock Proyectado">{cp_may}</td>
       <td class="num"  title="P1">{p1_may}</td>
       <td class="num"  title="P2">{p2_may}</td>
       <td class="num"  title="P3">{p3_may}</td>
       <td class="num"  title="Tendencia">{tend_may}</td>
       <td class="num"  title="Venta Estimada">{ve_may}</td>
       <td class="num"  title="Prevision">{prev_may}</td>
   </tr> 
   <tr><td colspan="10" style="height: 18px">&nbsp;</td> </tr>
</table>
<!-- end:   reposicion_discriminada -->