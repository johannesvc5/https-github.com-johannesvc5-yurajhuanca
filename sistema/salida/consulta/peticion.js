$(obtener_registros());

function obtener_registros(cliente)
{
	$.ajax({
		url : 'busqueda.php',
		type : 'POST',
		dataType : 'html',
		data : { cliente: cliente },
		})

	.done(function(resultado){
		$("#tabla_resultado_box_a").html(resultado);
	})
}

$(document).on('keyup', '#busqueda_box_a', function()
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
		url : 'busqueda_b.php',
		type : 'POST',
		dataType : 'html',
		data : { cliente_b: cliente_b },
		})

	.done(function(resultado_b){
		$("#tabla_resultado_box_b").html(resultado_b);
	})
}

$(document).on('keyup', '#busqueda_box_b', function()
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

$(obtener_registros_c());

function obtener_registros_c(cliente_c)
{
	$.ajax({
		url : 'busqueda_c.php',
		type : 'POST',
		dataType : 'html',
		data : { cliente_c: cliente_c },
		})

	.done(function(resultado_c){
		$("#tabla_resultado_box_c").html(resultado_c);
	})
}

$(document).on('keyup', '#busqueda_box_c', function()
{
	var valorBusqueda_c=$(this).val();
	if (valorBusqueda_c!="")
	{
		obtener_registros_c(valorBusqueda_c);
	}
	else
		{
			obtener_registros_c();
		}
});