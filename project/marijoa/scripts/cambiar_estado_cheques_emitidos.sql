INSERT INTO bcos_chq_tmp(chq_cta,chq_num) SELECT chq_cta,chq_num FROM bcos_chq WHERE chq_estado = 'Emitido' AND chq_fecha_pag BETWEEN '2012-07-17' AND CURRENT_DATE;	 

UPDATE  bcos_chq SET chq_estado = 'Pagado' WHERE chq_estado = 'Emitido' AND chq_fecha_pag BETWEEN '2012-07-17' AND CURRENT_DATE;	 

SELECT COUNT(cambiar_estado_chq(chq_cta,chq_num)) FROM bcos_chq_tmp;  

DELETE FROM bcos_chq_tmp;
