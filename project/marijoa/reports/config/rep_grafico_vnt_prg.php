<?php

/** Report prg file (rep_grafico_vnt) 
 *  
 *  Dynamically created by ycube plus RAD
 *  
 *  USE THIS FILE TO PERSONALIZE A PROGRAM SIDE OF YOUR REPORT
 *  ==========================================================
 */  

// ATTENTION: CANCEL THIS BLOCK TO EDIT A FILE 
$T = new Y_Template( $file_tpl ); 
// Superior Variables
$T->Set( 'sup_gen', '');
// ------------------------------------------

// THIS IS YOUR FIRST QUERY:
//$query0 = "select sum(df_cantidad)AS ENERO_2009 FROM factura f, det_factura d where f.fact_nro = d.df_fact_num and f.fact_fecha BETWEEN"2009-01-01" and "2009-02-01"";

$T->Set( 'time', daytime() );
$T->Set( 'user', $Global['username'] );

$firstRow=true;
$Q0 = $DB;
$Q0->Query( $query0 );

// Starting a HTML
$T->Show('general_header');			// Principal Header
$T->Show('start_query0');			// Start a Table 
$T->Show('header0');				// Show Header

//Define a  variable
$endConsult = false;
//Define a Total Variables

//Define a Subtotal Variables


//Define a Old Values Variables
$old['ENERO_2009'] = '';

 


    include('phplot/PHPlot.php');

	$data = array(
	  array('Jan', 40, 2, 4),
	  array('Feb', 30, 3, 4), 
	  array('Mar', 20, 4, 4),
	  array('Apr', 10, 5, 4), 
	  array('May',  3, 6, 4), 
	  array('Jun',  7, 7, 4),
	  array('Jul', 10, 8, 4), 
	  array('Aug', 15, 9, 4),
	  array('Sep', 20, 5, 4),
	  array('Oct', 18, 4, 4), 
	  array('Nov', 16, 7, 4), 
	  array('Dec', 14, 3, 4),
	);
 
		 
		        $graph = &new PHPlot(800,600);
			 
			$graph->SetBackgroundColor("orange");
			$graph->SetDataColors(array('red','black','green'));
			//$graph->SetDrawXGrid(true);
			 
		 
			$graph->SetPlotType('bars');
			$graph->SetDataType('text-data'); 
			$graph->SetTitle('Ejemplo de Grafico de Barras con 3 Sets de Datos'); 
			$graph->SetLegend(array('Ingenieria', 'Manufactura', 'Administracion'));
			$file="tmp.png";
			$graph->SetTitleColor("black" ); 
			$graph->SetDataValues($data);
			$graph->SetImageBorderType('plain');					
			$graph->SetIsInline(true); 
			 
			//$graph->SetOutputfile($file);
			$graph->DrawGraph(); 
 
         echo ' <img src="tmp.png" height="600" width="800" > ';
	  $T->Show('img');

     
       
       			// Ends a Table 

?>
