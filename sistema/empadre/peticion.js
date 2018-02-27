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

$(obtener_registros_c());

function obtener_registros_c(cliente_c)
{
	$.ajax({
		url : 'consulta_c.php',
		type : 'POST',
		dataType : 'html',
		data : { cliente_c: cliente_c },
		})

	.done(function(resultado_c){
		$("#tabla_resultado_c").html(resultado_c);
	})
}

$(document).on('keyup', '#busqueda_c', function()
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

$(obtener_registros_d());

function obtener_registros_d(cliente_d)
{
	$.ajax({
		url : 'consulta_d.php',
		type : 'POST',
		dataType : 'html',
		data : { cliente_d: cliente_d },
		})

	.done(function(resultado_d){
		$("#tabla_resultado_d").html(resultado_d);
	})
}

$(document).on('keyup', '#busqueda_d', function()
{
	var valorBusqueda_d=$(this).val();
	if (valorBusqueda_d!="")
	{
		obtener_registros_d(valorBusqueda_d);
	}
	else
		{
			obtener_registros_d();
		}
});