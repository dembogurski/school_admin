#!/bin/sh

UPDATE reservas r, reserva_det d, mnt_prod p SET r.estado = 'Vencida', p.prod_fin_pieza = 'No'
 WHERE r.nro_res = d.nro_res AND d.codigo = p.p_cod AND r.estado = 'Pendiente'
AND r.hasta < CURRENT_DATE ;
