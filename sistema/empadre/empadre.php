<!DOCTYPE html>
<html lang="es" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="UTF-8">
        <title>Coop. Yurajhuanca</title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        
        <link href="https://fonts.googleapis.com/css?family=Bree+Serif|Amaranth" rel="stylesheet">
        <link rel="stylesheet" href="../../css/bootstrap.css">
        <link rel="stylesheet" href="../../css/estilos.css">
        
        <script type="text/javascript" src="../../js/jquery.js"></script>
        <script src="../../js/main.js"></script>
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
        <li role="presentation" style="background-color: #02416A;color: rgba(255, 255, 255, 1)"><a href="../principal.php" style="color: #ffffff"><span class="glyphicon glyphicon-home"></span> Principal</a></li>

        <!--Borregos-->
        
        <li role="presentation" style="background-color: #02416A;color: rgba(255, 255, 255, 1)"><a onclick="mostrarEmp()" style="color: #ffffff" ><span class="glyphicon glyphicon-chevron-down"></span> Empadrado</a></li> 
        
        <li id="empadre1" style="background-color: #00568D;color: rgba(255, 255, 255, 1); display: none;"><a onclick="ver_empadre()" style="color: #ffffff" ><span class="glyphicon glyphicon-book"></span> Registrar / Editar</a></li>
        <li id="empadre2" style="background-color: #00568D;color: rgba(255, 255, 255, 1); display: none;"><a onclick="ver_empadreb()" style="color: #ffffff" ><span class="glyphicon glyphicon-book"></span> Consultar Padres</a></li>

        <li id="empadre3" style="background-color: #00568D;color: rgba(255, 255, 255, 1); display: none;"><a onclick="ver_empadrec()" style="color: #ffffff" ><span class="glyphicon glyphicon-book"></span> Consultar Servicios</a></li>
        <li id="empadre4" style="background-color: #00568D;color: rgba(255, 255, 255, 1); display: none;"><a onclick="ver_empadred()" style="color: #ffffff" ><span class="glyphicon glyphicon-book"></span> Consultar Gestación</a></li>

        <?php
        echo '<li role="presentation" style="background-color: #02416A;color: rgba(255, 255, 255, 1)"><a href="logout.php" style="color: #ffffff"><span class="glyphicon glyphicon-off"></span> Salir</a></li>'
        ?>
    </nav>

    <!-- Primera caja borregos-->
    <div class="col-lg-9 col-md-9 col-sm-9 col-sm-12" id="box_empadre1" style="display: none;">
        <div class="row text-center" style="margin-top: 10px">
            <form class="form-inline">
              <div class="form-group">
                <label for="busqueda">Datos a Buscar</label>
                <input type="text" class="form-control" id="busqueda" name="busqueda" placeholder="Ingrese datos a Buscar">
              </div>

              <button type="button" class="btn btn-primary
              " data-toggle="modal" data-target="#userAdd"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  Añadir</button>
            </form>
            
            <!-- Modal -->
        <div class="modal fade" id="userAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h2 class="modal-title text-center" id="exampleModalLabe2">Añadir Datos del Empadrado</h2>
                </div>
                <div class="modal-body">
                    <form class="formulario" action="addEmpadre.php" method="post">
                        <div class="form-group col-lg-10 col-lg-offset-1 col-md-10">
                            <div class="col-lg-6" style="margin-top: 8px">
                                <label for="fEmpadre" class="text-left">Fecha Empadre:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-tag"></span></span>
                                        <input type="date" class="form-control" name="fEmpadre" placeholder="Ingrese Fecha de Empadre" required>
                                </div>
                            </div>
                            <!--
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                <label for="registro">Arete Padre:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-list-alt"></span></span>
                                    <input type="text" class="form-control" name="aPadre" placeholder="Ingrese Arete del Padre" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                <label for="registro">Arete Madre:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-list-alt"></span></span>
                                    <input type="text" class="form-control" name="aMAdre" placeholder="Ingrese Arete de la Madre" required>
                                </div>
                            </div>
                            -->
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                <label for="registro">Observaciones:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-list-alt"></span></span>
                                    <input type="text" class="form-control" name="observacionGeneral" placeholder="Ingrese Observaciones" required>
                                </div>
                            </div>                            
                        </div>
                        <button type="submit" class="btn btn-primary col-lg-offset-9" style="margin-bottom: 5px"><span class="glyphicon glyphicon-log-in"></span> Añadir</button>                   
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn center-block btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
          </div>
        </div>
        <!-- Fin Modal-->

        </div>  

        <div class="container col-lg-12 col-md-12 col-sm-12 col-sm-12">

            <div class="row" id="tabla_resultado">
                
            </div>
        </div>
    </div>

    <!-- Segunda caja borregos-->

    <div class="col-lg-9 col-md-9 col-sm-9 col-sm-12" id="box_empadre2" style="display: none;">
        <div class="row text-center" style="margin-top: 10px">
            <form class="form-inline">
              <div class="form-group">
                <label for="busqueda">Datos a Buscar</label>
                <input type="text" class="form-control" id="busqueda_b" name="busqueda_b" placeholder="Ingrese datos a Buscar">
              </div>

            </form>
        </div>  

        <div class="container col-lg-12 col-md-12 col-sm-12 col-sm-12">
            <div class="row" id="tabla_resultado_b">
                
            </div>
        </div>
    </div>

    <!-- Consulta de Servicios -->

    <div class="col-lg-9 col-md-9 col-sm-9 col-sm-12" id="box_empadre3" style="display: none;">
        <div class="row text-center" style="margin-top: 10px">
            <form class="form-inline">
              <div class="form-group">
                <label for="busqueda">Datos a Buscar</label>
                <input type="text" class="form-control" id="busqueda_c" name="busqueda_c" placeholder="Ingrese datos a Buscar">
              </div>

            </form>
        </div>  

        <div class="container col-lg-12 col-md-12 col-sm-12 col-sm-12">
            <div class="row" id="tabla_resultado_c">
                
            </div>
        </div>
    </div>

    <!-- Consulta de Gestacion-->

    <div class="col-lg-9 col-md-9 col-sm-9 col-sm-12" id="box_empadre4" style="display: none;">
        <div class="row text-center" style="margin-top: 10px">
            <form class="form-inline">
              <div class="form-group">
                <label for="busqueda">Datos a Buscar</label>
                <input type="text" class="form-control" id="busqueda_d" name="busqueda_d" placeholder="Ingrese datos a Buscar">
              </div>

            </form>
        </div>  

        <div class="container col-lg-12 col-md-12 col-sm-12 col-sm-12">
            <div class="row" id="tabla_resultado_d">
                
            </div>
        </div>
    </div>

    
        <script type="text/javascript" src="../../js/jquery.js"></script>
        <script src="../../js/main.js"></script>
        <script src="../../js/bootstrap.js"></script>
        <script src="../../js/mainSistema.js"></script>
    </body>
</html>