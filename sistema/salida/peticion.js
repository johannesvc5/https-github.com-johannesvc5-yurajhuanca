$(obtener_registros());

function obtener_registros(cliente)
{
	$.ajax({
		url : 'consulta.php',
		type : 'POST',
		dataType : 'html',
		data : { cliente: cliente },
		})

	.done(function(resultado){
		$("#tabla_resultado").html(resultado);
	})
}

$(document).on('keyup', '#busqueda', function()
{
	var valorBusqueda=$(this).val();
	if (valorBusqueda!="")
	{
		obtener_registros(valorBusqueda);
	}
	else
		{
			obtener_registros();
		}
});

$(obtener_registros_b());

function obtener_registros_b(cliente_b)
{
	$.ajax({
		url : 'consulta_b.php',
		type : 'POST',
		dataType : 'html',
		data : { cliente_b: cliente_b },
		})

	.done(function(resultado_b){
		$("#tabla_resultado_b").html(resultado_b);
	})
}

$(document).on('keyup', '#busqueda_b', function()
{
	var valorBusqueda_b=$(this).val();
	if (valorBusqueda_b!="")
	{
		obtener_registros_b(valorBusqueda_b);
	}
	else
		{
			obtener_registros_b();
		}
});