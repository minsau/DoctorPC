SELECT 
venta.idVenta,
servicio.claveServicio,
servicio.precio,
venta.costoTotal,
venta.fecha,
venta.anticipoGeneral
FROM servicio_has_venta,venta,servicio 
where

servicio_has_venta.Venta_idVenta = venta.idVenta and 
servicio_has_venta.Servicio_idServicio = servicio.idServicio 
order by servicio_has_venta.idServicio;



SELECT 
persona.nombresPersona,
persona.aPaterno,
persona.aMaterno
FROM persona,venta
where
venta.idVenta = 15 and 
venta.Cliente_Persona_idPersona = persona.idPersona

SELECT 
persona.nombresPersona,
persona.aPaterno,
persona.aMaterno
FROM persona,venta
where
venta.idVenta = 15 and 
venta.Empleado_Persona_idPersona = persona.idPersona;



<td class="precio"><?php echo formatPesos($reg['costoTotal']); ?></td>
