<!DOCTYPE html>
<html lang="es" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="UTF-8">
        <title>Coop. Yurajhuanca</title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        
        <link href="https://fonts.googleapis.com/css?family=Bree+Serif|Amaranth" rel="stylesheet">
        <link rel="stylesheet" href="../../../css/bootstrap.css">
        <link rel="stylesheet" href="../../../css/estilos.css">
        
        <script type="text/javascript" src="../../../js/jquery.js"></script>
        <script src="../../../js/main.js"></script>
        <script src="peticion.js"></script>

    </head>
    <body>
        <header style="background-color: #02416A">
            <nav class="nav navbar-static-top" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacion-fm">
                            <span class="sr-only">Desplegar / Ocultar Menu</span>
                            <span class="icon-bar">></span>
                            <span class="icon-bar">></span>
                            <span class="icon-bar">></span>
                        </button>
                        <a href="../principal.php" class="navbar-brand" style="color: rgba(255, 255, 255, 1)">Coop. Yurajhuanca</a>
                    </div>
                    <!--INICIA MENU -->
                    <div class="collapse navbar-collapse navbar-right" id="navegacion-fm" style="margin-top: 5px">
                        <?php echo '
                            <div class="input-group container-fluid">
                                <p style="margin-left: -30px; color: #fff; font-family: Arial; margin-top: 10px; font-size: 15px">¡Hola!</p>    
                            </div>
                        '; ?>   
                    </div>
                </div>
            </nav>
        </header>
        <nav class="nav nav-stacked col-lg-3 col-md-3 col-sm-3 col-sm-12" style="color: rgba(255, 255, 255, 1); width: all; background-color: #02416A; padding: 0">
            <li role="presentation" style="background-color: #02416A;color: rgba(255, 255, 255, 1)"><a href="../../principal.php" style="color: #ffffff"><span class="glyphicon glyphicon-home"></span> Principal</a></li>

            <!--Animales-->
            
            <li role="presentation" style="background-color: #02416A;color: rgba(255, 255, 255, 1)"><a onclick="mostrar()" style="color: #ffffff" ><span class="glyphicon glyphicon-chevron-down"></span> Consultas de Animales</a></li> 
            
            <li id="consulta_a" style="background-color: #00568D;color: rgba(255, 255, 255, 1); display: none;"><a onclick="consulta_a()" style="color: #ffffff" ><span class="glyphicon glyphicon-book"></span> Consulta de Borregos</a></li>
            <li id="consulta_b" style="background-color: #00568D;color: rgba(255, 255, 255, 1); display: none;"><a onclick="consulta_b()" style="color: #ffffff" ><span class="glyphicon glyphicon-book"></span> Consulta de Alpacas</a></li>
            <li id="consulta_c" style="background-color: #00568D;color: rgba(255, 255, 255, 1); display: none;"><a onclick="consulta_c()" style="color: #ffffff" ><span class="glyphicon glyphicon-book"></span> Consulta de Vacunos</a></li>

            <!--Animales-->
            
            <li role="presentation" style="background-color: #02416A;color: rgba(255, 255, 255, 1)"><a onclick="mostrar_b()" style="color: #ffffff" ><span class="glyphicon glyphicon-chevron-down"></span> Consultas de Salidas</a></li> 
            
            <li id="consulta_salida_a" style="background-color: #00568D;color: rgba(255, 255, 255, 1); display: none;"><a onclick="consulta_d()" style="color: #ffffff" ><span class="glyphicon glyphicon-book"></span> Consulta de Ventas</a></li>
            <li id="consulta_salida_b" style="background-color: #00568D;color: rgba(255, 255, 255, 1); display: none;"><a onclick="consulta_e()" style="color: #ffffff" ><span class="glyphicon glyphicon-book"></span> Consulta de Alquiler</a></li>
            <li id="consulta_salida_c" style="background-color: #00568D;color: rgba(255, 255, 255, 1); display: none;"><a onclick="consulta_f()" style="color: #ffffff" ><span class="glyphicon glyphicon-book"></span> Consulta de Prestamo</a></li>
            <li id="consulta_salida_d" style="background-color: #00568D;color: rgba(255, 255, 255, 1); display: none;"><a onclick="consulta_g()" style="color: #ffffff" ><span class="glyphicon glyphicon-book"></span> Consulta de Muertes</a></li>
            <li id="consulta_salida_e" style="background-color: #00568D;color: rgba(255, 255, 255, 1); display: none;"><a onclick="consulta_h()" style="color: #ffffff" ><span class="glyphicon glyphicon-book"></span> Consultas Generales</a></li>


            <li role="presentation" class="btn-success"><a href="../salida.php" style="color: #ffffff" ><span class="glyphicon glyphicon-chevron-left"></span> Volver</a></li>

            <?php
            echo '<li role="presentation" style="background-color: #02416A;color: rgba(255, 255, 255, 1)"><a href="logout.php" style="color: #ffffff"><span class="glyphicon glyphicon-off"></span> Salir</a></li>'
            ?>
        </nav>

        <!-- Primera caja Consulta-->
        <div class="col-lg-9 col-md-9 col-sm-9 col-sm-12" id="box_consulta_a" style="display: none;">
            <div class="row text-center" style="margin-top: 10px">
                <form class="form-inline">
                    <div class="form-group">
                        <label for="busqueda">Datos a Buscar</label>
                        <input type="text" class="form-control" id="busqueda_box_a" name="busqueda_box_a" placeholder="Ingrese datos a Buscar">
                        <a href="reporte.php" class="btn btn-danger btn-xs left" target="_blank">Crear Reporte</a>
                    </div>

                </form>

            </div>  

            <div class="container col-lg-12 col-md-12 col-sm-12 col-sm-12">

                <div class="row" id="tabla_resultado_box_a">
                    
                </div>
            </div>
        </div>

        <!-- Segunda caja Consulta-->

        <div class="col-lg-9 col-md-9 col-sm-9 col-sm-12" id="box_consulta_b" style="display: none;">
            <div class="row text-center" style="margin-top: 10px">
                <form class="form-inline">
                  <div class="form-group">
                    <label for="busqueda">Datos a Buscar</label>
                    <input type="text" class="form-control" id="busqueda_box_b" name="busqueda_box_b" placeholder="Ingrese datos a Buscar">
                    <a href="reporte_alpacas.php" class="btn btn-danger btn-xs" target="_blank">Crear Reporte</a>
                  </div>

                </form>
            </div>  

            <div class="container col-lg-12 col-md-12 col-sm-12 col-sm-12">
                <div class="row" id="tabla_resultado_box_b">
                    
                </div>
            </div>
        </div>

        <!-- Tercera caja Consulta-->

        <div class="col-lg-9 col-md-9 col-sm-9 col-sm-12" id="box_consulta_c" style="display: none;">
            <div class="row text-center" style="margin-top: 10px">
                <form class="form-inline">
                  <div class="form-group">
                    <label for="busqueda">Datos a Buscar</label>
                    <input type="text" class="form-control" id="busqueda_box_c" name="busqueda_box_c" placeholder="Ingrese datos a Buscar">
                    <a href="reporte_vacunos.php" class="btn btn-danger btn-xs" target="_blank">Crear Reporte</a>
                  </div>

                </form>
            </div>  

            <div class="container col-lg-12 col-md-12 col-sm-12 col-sm-12">
                <div class="row" id="tabla_resultado_box_c">
                    
                </div>
            </div>
        </div>

        <!-- Cuarta caja Consulta-->

        <div class="col-lg-9 col-md-9 col-sm-9 col-sm-12" id="box_consulta_d" style="display: none;">
            <div class="row text-center" style="margin-top: 10px">
                <p class="text-center" style="font-size: 15px; color: #0042A3">Consulta de Ventas</p>
                <form class="form-inline" action="vantaConsulta.php" method="post">
                  <div class="form-group">
                    <label for="busqueda">Datos Fechas a Buscar</label>
                    <input type="date" class="form-control" id="fecha_a" name="fecha_a" placeholder="Ingrese fecha a buscar">
                    <input type="date" class="form-control" id="fecha_b" name="fecha_b" placeholder="Ingrese fecha a buscar">
                    <select  class="form-control" name="tipoAnimal" id="tipoAnimal" required  >
                        <option value="borrego">Borrego</option>
                        <option value="alpaca">Alpaca</option>
                        <option value="vacuno">Vacuno</option>
                    </select>
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Buscar</button>
                  </div>
                </form>
            </div>  
        </div>

        <!-- Quinta caja Consulta-->

        <div class="col-lg-9 col-md-9 col-sm-9 col-sm-12" id="box_consulta_e" style="display: none;">
            <div class="row text-center" style="margin-top: 10px">
                <p class="text-center" style="font-size: 15px; color: #0042A3">Consulta de Alquileres</p>
                <form class="form-inline" action="alquilerConsulta.php" method="post">
                  <div class="form-group">
                    <label for="busqueda">Datos Fechas a Buscar</label>
                    <input type="date" class="form-control" id="fecha_a" name="fecha_a" placeholder="Ingrese fecha a buscar">
                    <input type="date" class="form-control" id="fecha_b" name="fecha_b" placeholder="Ingrese fecha a buscar">
                    <select  class="form-control" name="tipoAnimal" id="tipoAnimal" required  >
                        <option value="borrego">Borrego</option>
                        <option value="alpaca">Alpaca</option>
                        <option value="vacuno">Vacuno</option>
                    </select>
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Buscar</button>
                  </div>
                </form>
            </div>  
        </div>

        <!-- Sexta caja Consulta-->

        <div class="col-lg-9 col-md-9 col-sm-9 col-sm-12" id="box_consulta_f" style="display: none;">
            <div class="row text-center" style="margin-top: 10px">
                <p class="text-center" style="font-size: 15px; color: #0042A3">Consulta de Prestamos</p>
                <form class="form-inline" action="prestamoConsulta.php" method="post">
                  <div class="form-group">
                    <label for="busqueda">Datos Fechas a Buscar</label>
                    <input type="date" class="form-control" id="fecha_a" name="fecha_a" placeholder="Ingrese fecha a buscar">
                    <input type="date" class="form-control" id="fecha_b" name="fecha_b" placeholder="Ingrese fecha a buscar">
                    <select  class="form-control" name="tipoAnimal" id="tipoAnimal" required  >
                        <option value="borrego">Borrego</option>
                        <option value="alpaca">Alpaca</option>
                        <option value="vacuno">Vacuno</option>
                    </select>
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Buscar</button>
                  </div>
                </form>
            </div>  
        </div>

        <!-- Septima caja Consulta-->

        <div class="col-lg-9 col-md-9 col-sm-9 col-sm-12" id="box_consulta_g" style="display: none;">
            <div class="row text-center" style="margin-top: 10px">
                <p class="text-center" style="font-size: 15px; color: #0042A3">Consulta de Muertes</p>
                <form class="form-inline" action="muerteConsulta.php" method="post">
                  <div class="form-group">
                    <label for="busqueda">Datos Fechas a Buscar</label>
                    <input type="date" class="form-control" id="fecha_a" name="fecha_a" placeholder="Ingrese fecha a buscar">
                    <input type="date" class="form-control" id="fecha_b" name="fecha_b" placeholder="Ingrese fecha a buscar">
                    <select  class="form-control" name="tipoAnimal" id="tipoAnimal" required  >
                        <option value="borrego">Borrego</option>
                        <option value="alpaca">Alpaca</option>
                        <option value="vacuno">Vacuno</option>
                    </select>
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Buscar</button>
                  </div>
                </form>
            </div>  
        </div>

        <!-- Octava caja Consulta-->

        <div class="col-lg-9 col-md-9 col-sm-9 col-sm-12" id="box_consulta_h" style="display: none;">
            <div class="row text-center" style="margin-top: 10px">
                <p class="text-center" style="font-size: 15px; color: #0042A3">Consulta General</p>
                <form class="form-inline" action="generalConsulta.php" method="post">
                  <div class="form-group">
                    <label for="busqueda">Datos Fechas a Buscar</label>
                    <input type="date" class="form-control" id="fecha_a" name="fecha_a" placeholder="Ingrese fecha a buscar">
                    <input type="date" class="form-control" id="fecha_b" name="fecha_b" placeholder="Ingrese fecha a buscar">
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Buscar</button>
                  </div>
                </form>
            </div>  
        </div>

        <script type="text/javascript" src="../../../js/jquery.js"></script>
        <script src="../../../js/main.js"></script>
        <script src="../../../js/bootstrap.js"></script>
        <script src="mainSistema.js"></script>
    </body>
</html>