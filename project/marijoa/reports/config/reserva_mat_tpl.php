<!-- 
    Report Template File (factura_cliente)

    ####################################################
    USE THIS FILE TO PERSONALIZE A VISUAL OF YOUR REPORT
    ####################################################
-->

<!-- begin: general_header -->
	<treset_page>
<!-- end:   general_header -->

 
<!-- begin: end_query0 -->
    
 

 
 
 
 <form name="ticket" action="http://localhost/ticket.php" method="POST">
    <input type="hidden" name="content" value="{content}" >
    
    <label>{content}</label>  
    
    
    <input type="submit" value="Imprimir">
 </form>
 
  <script>  document.ticket.submit();  </script> 

<!-- end:   end_query0 -->



 
