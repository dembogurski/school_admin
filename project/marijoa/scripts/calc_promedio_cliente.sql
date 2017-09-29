

# Clientes categoria 1 que compraron el ultimo mes
 
 SELECT count( DISTINCT calc_promedio_cli( fact_cli_ci, fact_cli_cat) )
 FROM factura WHERE fact_fecha BETWEEN date_sub(CURRENT_DATE,INTERVAL 35 DAY) AND CURRENT_DATE AND fact_cli_cat = 1 AND fact_cli_ci <> "XXXX";



