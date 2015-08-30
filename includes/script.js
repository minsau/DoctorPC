
	function closeVentana () {
		$(".modal").slideUp("slow");
	}

	function openVentana () {
		$(".modal").slideDown("slow");
	}

	function agregarPesos (nombre) {
		alert(nombre);
		var valor = document.getElementById(nombre).value;
		document.getElementById(nombre).value = '$'+valor;
	}
