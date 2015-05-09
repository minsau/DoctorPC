<?php
	function formatPesos($cantidad){		
		$pesos = "$ ".$cantidad.".00";
		return $pesos;
	}

	function formatDate($fecha){
		$anio = substr($fecha,0,4);
		$dia = substr($fecha,-2,2);
		$mes = substr($fecha,6,2);

		switch ($mes) {
			case 1:
				$mesNombre = "Enero";
				break;
			case 2:
				$mesNombre = "Febrero";
				break;
			case 3:
				$mesNombre = "Marzo";
				break;

			case 4:
				$mesNombre = "Abril";
				break;

			case 5:
				$mesNombre = "Mayo";
				break;				

			case 6:
				$mesNombre = "Junio";
				break;

			case 7:
				$mesNombre = "Julio";
				break;

			case 8:
				$mesNombre = "Agosto";
				break;	

			case 9:
				$mesNombre = "Septiembre";
				break;			

			case 10:
				$mesNombre = "Octubre";
				break;

			case 11:
				$mesNombre = "Noviembre";
				break;

			case 12:
				$mesNombre = "Diciembre";
				break;				
		}

		$nombreFecha = $dia." de ".$mesNombre." de ".$anio;
		return $nombreFecha;
	}
?>