$(function(){
	$('#search_form').submit(function(e){
		e.preventDefault();
	})

	$('#search').keyup(function(){
		var envio = $('#search').val();

		$('#resultados').html('<h3 align="center">Buscando...</h3>');

		$.ajax({
			type: 'POST',
			url: 'buscarHoras.php',
			data: ('search='+envio),
			success: function(resp){
				if(resp!=""){
					$('#resultados').html(resp);
				}
			}
		})
	})
})