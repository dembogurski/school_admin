

SELECT p_local AS SUC, sum(p_cant) AS STOCK,round(sum(p_cant * p_compra),2) as CIF,   round(  sum(p_compra +  (p_cant * p_compra + p_porc_recargo / 100 )),2) AS COSTO 
FROM mnt_prod WHERE prod_fin_pieza <> 'Si' AND p_cant > 0  GROUP BY SUC ASC   
INTO OUTFILE '/tmp/stock.csv'  FIELDS TERMINATED BY ';' LINES TERMINATED BY '\n'; 


