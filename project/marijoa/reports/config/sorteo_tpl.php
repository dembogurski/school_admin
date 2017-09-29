<!-- 
    Report Template File (sorteo)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header noeval -->
	<treset_page>
    <script type="text/javascript" src="include/jquery.js" > </script>
    <script>
        var array = [];
        var flag = 0;

        function contains(a, obj) {
            for (var i = 0; i < a.length; i++) {
                if (a[i] === obj) {
                    return true;
                }
            }
            return false;
        }
        function add(id){
            if(!contains(array,id)){
                array.push(id);
            }
        }
        function sortear(){
            var giros = parseInt( document.getElementById("tiempo").value );
            //setTimeout("parar()",tiempo);

            flag = 1; // Sorteando
            var i = 0;
            var len = array.length; 

            while(flag < giros){
              var id = array[i]; //alert(id);
              document.getElementById("chosen").value = id;
               if(i == len){
                  i = 0;
               }
               if(flag == giros-1){
                  var num=parseInt(Math.random() * len); 
                  var id = array[num]; //alert(id);
                  document.getElementById("chosen").value = id;

                  var nombre = $("#nom_"+id).text();
                  var ci = $("#ci_"+id).text();
                  var tel = $("#tel_"+id).text();
                  var dir = $("#dir_"+id).text();

                  $("#nom").html(nombre);$("#ci").html(ci);$("#tel").html(tel);$("#dir").html(dir);

                  break;
               }
              i++;
              flag++;
              
            }

        }

        function parar(){
          flag = 0;
        }

    </script>
    <style>

    tr{
       font-size:13px;
       height:26px;
      
    }
    tr>td{
 padding-left:3px;
    }
    th{
       font-size:13px;
       font-weight:bolder;
       text-align:center;
    }
    .num{
      text-align:right;
      padding-right:3px;
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
		  <td style="width: 184px;"> </td>
		  <td style="text-align: center;">
			<b>Marijoa</b></td>
		  <td style="text-align: right;">
			<tpage><b>Pag: </b></tpage></td>
		</tr>
		<tr>
		  <td>
			<small><small>ycube plus RAD [1.2.31]</small></small>
		  </td>
		  <td style="text-align: center;"><big
			style="font-weight: bold;"><big>Sorteo de Vales de Compras &nbsp;&nbsp; SUC.: {sup_suc}</big></td>
		  <td style="text-align: right;">
			<small><small>{user} - {time}</small></small>
		  </td>
		</tr>
	  </tbody>
	</table><hr />
</td></tr>
<!-- end:   start_query0 -->

<!-- begin: header0 -->
    <tr>
        <th>ID</th>
        <th>CI</th>
        <th>CLIENTE</th>
        <th>CAT</th>
        <th>TELEFONOS</th>
        <th>DIR</th>
        <th>REGISTRADO_EN</th>
        <th>TOTAL</th>
    </tr>
</thead>
<tfoot>
	<tr><td colspan="50"><hr /></td></tr>
</tfoot>
<!-- end:   header0 -->

<!-- begin: query0_data_row -->
        <tr>
            <td>{query0_ID}</td>
            <td id="ci_{query0_ID}">{query0_CI}</td>
            <td id="nom_{query0_ID}">{query0_CLIENTE} </td>
            <td align="center" >{query0_CAT}</td>
            <td id="tel_{query0_ID}">{query0_TELEFONOS}</td>
            <td id="dir_{query0_ID}">{query0_DIR}</td>
            <td align="center">{query0_REGISTRADO_EN}</td>
            <td class="num">{query0_TOTAL}</td>
        </tr>
<!-- end:    query0_data_row -->
<!-- begin: query0_total_row -->

<!-- end:    query0_total_row -->
<!-- begin: query0_subtotal_row -->
 
<!-- end:    query0_subtotal_row -->
<!-- begin: end_query0 -->
    </tbody>
</table>
<br><br>
<div style="height:80px;font-weight:bolder; font-size:16px" align="center">

    
    <input style="font-weight:bolder; font-size:16px;text-align:right;color:red" type="text"  id="chosen" size="20" value="0" >&nbsp;&nbsp;<label><B>GIROS</B></label>
    <input style="font-weight:bolder; font-size:16px;text-align:right;color:black" type="text" id="tiempo"  size="4" value="3000" >
    <input style="font-weight:bolder; font-size:16px" type="button"  onclick="sortear()" value="Sortear"  >
    

</div>

<div align="center">
<table border="1" cellspacing="0" cellpadding="0" width="80%">
    <tr style="font-size:17px;font-weight:bolder;">
      <th>CI</th> <th>NOMBRE</th> <th>TELEFONO</th> <th>DIRECCI&oacute;N</th>
    </tr>
    <tr style="font-size:17px;font-weight:bolder;">
      <td id="ci"></td>  <td id="nom"></td>   <td id="tel"></td> <td id="dir"></td>
    </tr>
</table>
</div>


 <br><br>

<!-- end:   end_query0 -->

