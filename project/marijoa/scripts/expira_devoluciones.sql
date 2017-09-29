UPDATE reg_pedido_dev SET estado = 'Expirado' WHERE fecha_venc < CURRENT_DATE AND estado = 'Pendiente';


