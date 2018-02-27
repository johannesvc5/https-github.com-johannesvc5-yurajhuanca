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
        
        <li role="presentation" style="background-color: #02416A;color: rgba(255, 255, 255, 1)"><a onclick="mostrar()" style="color: #ffffff" ><span class="glyphicon glyphicon-chevron-down"></span> Borregos</a></li> 
        
        <li id="borregos1" style="background-color: #00568D;color: rgba(255, 255, 255, 1); display: none;"><a onclick="ver_borregos()" style="color: #ffffff" ><span class="glyphicon glyphicon-book"></span> Registrar / Editar</a></li>
        <li id="borregos2" style="background-color: #00568D;color: rgba(255, 255, 255, 1); display: none;"><a onclick="ver_borregosb()" style="color: #ffffff" ><span class="glyphicon glyphicon-book"></span> Consultar</a></li>

        <!--Alpacas-->
        
        <li role="presentation" style="background-color: #02416A;color: rgba(255, 255, 255, 1)"><a onclick="mostrar2()" style="color: #ffffff" ><span class="glyphicon glyphicon-chevron-down"></span> Alpacas</a></li> 
        
        <li id="alpacas1" style="background-color: #00568D;color: rgba(255, 255, 255, 1); display: none"><a onclick="ver_alpacas()" style="color: #ffffff" ><span class="glyphicon glyphicon-book"></span> Registrar / Editar</a></li>
        <li id="alpacas2" style="background-color: #00568D;color: rgba(255, 255, 255, 1); display: none"><a onclick="ver_alpacasb()" style="color: #ffffff" ><span class="glyphicon glyphicon-book"></span> Consultar</a></li>

        <!--Vacunos-->
        
        <li role="presentation" style="background-color: #02416A;color: rgba(255, 255, 255, 1)"><a onclick="mostrar3()" style="color: #ffffff" ><span class="glyphicon glyphicon-chevron-down"></span> Vacunos</a></li> 
        
        <li id="vacunos1" style="background-color: #00568D;color: rgba(255, 255, 255, 1); display: none"><a onclick="ver_vacunos()" style="color: #ffffff" ><span class="glyphicon glyphicon-book"></span> Registrar / Editar</a></li>
        <li id="vacunos2" style="background-color: #00568D;color: rgba(255, 255, 255, 1); display: none"><a onclick="ver_vacunosb()" style="color: #ffffff" ><span class="glyphicon glyphicon-book"></span> Consultar</a></li>

        <?php
        echo '<li role="presentation" style="background-color: #02416A;color: rgba(255, 255, 255, 1)"><a href="logout.php" style="color: #ffffff"><span class="glyphicon glyphicon-off"></span> Salir</a></li>'
        ?>
    </nav>

    <!-- Primera caja borregos-->
    <div class="col-lg-9 col-md-9 col-sm-9 col-sm-12" id="box_borregos" style="display: none;">
        <p class="col-lg-12 col-md-12 col-sm-12 col-sm-12 text-center" style="font-size: 30px; margin-top: 10px; color: #00568D;"><u>Modulo de Borregos</u></p>
        <div class="row text-center" style="margin-top: 10px">
            <form class="form-inline">
              <div class="form-group">
                <label for="busqueda">Datos a Buscar</label>
                <input type="text" class="form-control" id="busqueda" name="busqueda" placeholder="Ingrese datos a Buscar">
              </div>

              <button type="button" class="btn btn-primary
              " data-toggle="modal" data-target="#borregoAdd"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  Añadir</button>
            </form>
            
            <!-- Modal -->
        <div class="modal fade" id="borregoAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h2 class="modal-title text-center" id="exampleModalLabe2">Añadir Datos del Animal (Borregos)</h2>
                </div>
                <div class="modal-body">
                    <form class="formulario" action="borregoNew.php" method="post">
                        <div class="form-group col-lg-10 col-lg-offset-1 col-md-10">
                            <div class="col-lg-6" style="margin-top: 8px">
                                <label for="Arete" class="text-left">Arete:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-tag"></span></span>
                                        <input type="text" class="form-control" name="arete" placeholder="Ingrese Arete de Identificación" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                <label for="registro">Registro:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-list-alt"></span></span>
                                    <input type="text" class="form-control" name="registro" placeholder="Ingrese Registro">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                <label for="tipo">Tipo de Animal:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-piggy-bank"></span></span>
                                    <select  class="form-control" name="tipo" id="tipo" required  >
                                        <option value="borrego">Borregos</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                <label for="tat_izq">Tatuaje Oreja Izquierda:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-chevron-left"></span></span>
                                    <input type="text" class="form-control" name="tat_izq" placeholder="Ingrese tatuaje de Oreja Izquierda">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                <label for="tat_der">Tatuaje Oreja Derecha:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-chevron-right"></span></span>
                                    <input type="text" class="form-control" name="tat_der" placeholder="Ingrese tatuaje de Oreja Derecha">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                <label for="edad">Edad:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-gift"></span></span>
                                    <input type="text" class="form-control" name="edad" placeholder="Ingrese Edad">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                <label for="sexo">Sexo:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-heart"></span></span>
                                    <select  class="form-control" name="sexo" id="sexo" required  >
                                        <option value="macho">Macho</option>
                                        <option value="hembra">Hembra</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                <label for="cond_corp">Condicion Corporal:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                                    <input type="text" class="form-control" name="cond_corp" placeholder="Estado de Condición Corporal">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                <label for="tatuaje">Tatuaje:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-fire"></span></span>
                                    <input type="text" class="form-control" name="tatuaje" placeholder="Ingrese Tatuaje" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                <label for="pastor">Pastor Encargado:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-comment"></span></span>
                                    <input type="text" class="form-control" name="pastor" placeholder="Ingrese Pastor Encargado" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                <label for="observaciones">Observaciones:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-comment"></span></span>
                                    <input type="text" class="form-control" name="observaciones" placeholder="Ingrese Observaciones">
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

    <div class="col-lg-9 col-md-9 col-sm-9 col-sm-12" id="box_borregosb" style="display: none;">
        <p class="col-lg-12 col-md-12 col-sm-12 col-sm-12 text-center" style="font-size: 30px; margin-top: 10px; color: #00568D;"><u>Modulo de Borregos</u></p>
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

    <!-- Primera caja Alpacas-->

    <div class="col-lg-9 col-md-9 col-sm-9 col-sm-12" id="box_alpacas" style="display: none;">
        <p class="col-lg-12 col-md-12 col-sm-12 col-sm-12 text-center" style="font-size: 30px; margin-top: 10px; color: #00568D;"><u>Modulo de Alpacas</u></p>
        <div class="row text-center" style="margin-top: 10px">
            <form class="form-inline">
              <div class="form-group">
                <label for="busqueda">Datos a Buscar</label>
                <input type="text" class="form-control" id="busqueda_c" name="busqueda_c" placeholder="Ingrese datos a Buscar">
              </div>

              <button type="button" class="btn btn-primary
              " data-toggle="modal" data-target="#alpacasAdd"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  Añadir</button>
            </form>
            
            <!-- Modal -->
        <div class="modal fade" id="alpacasAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h2 class="modal-title text-center" id="exampleModalLabe2">Añadir Datos del Animal (Alpacas)</h2>
                </div>
                <div class="modal-body">
                    <form class="formulario" action="alpacaNew.php" method="post">
                        <div class="form-group col-lg-10 col-lg-offset-1 col-md-10">
                            <div class="col-lg-6" style="margin-top: 8px">
                                <label for="Arete" class="text-left">Arete:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-tag"></span></span>
                                        <input type="text" class="form-control" name="arete" placeholder="Ingrese Arete de Identificación" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                <label for="registro">Registro:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-list-alt"></span></span>
                                    <input type="text" class="form-control" name="registro" placeholder="Ingrese Registro">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                <label for="tipo">Tipo de Animal:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-piggy-bank"></span></span>
                                    <select  class="form-control" name="tipo" id="tipo" required  >
                                        <option value="alpaca">Alpacas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                <label for="tat_izq">Tatuaje Oreja Izquierda:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-chevron-left"></span></span>
                                    <input type="text" class="form-control" name="tat_izq" placeholder="Ingrese tatuaje de Oreja Izquierda">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                <label for="tat_der">Tatuaje Oreja Derecha:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-chevron-right"></span></span>
                                    <input type="text" class="form-control" name="tat_der" placeholder="Ingrese tatuaje de Oreja Derecha">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                <label for="edad">Edad:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-gift"></span></span>
                                    <input type="text" class="form-control" name="edad" placeholder="Ingrese Edad">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                <label for="sexo">Sexo:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-heart"></span></span>
                                    <select  class="form-control" name="sexo" id="sexo" required  >
                                        <option value="macho">Macho</option>
                                        <option value="hembra">Hembra</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                <label for="cond_corp">Condicion Corporal:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                                    <input type="text" class="form-control" name="cond_corp" placeholder="Ingrese Condición Corporal">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                <label for="tatuaje">Tatuaje:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-fire"></span></span>
                                    <input type="text" class="form-control" name="tatuaje" placeholder="Ingrese Tatuaje" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                <label for="pastor">Pastor Encargado:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-comment"></span></span>
                                    <input type="text" class="form-control" name="pastor" placeholder="Ingrese Pastor Encargado" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                <label for="observaciones">Observaciones:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-comment"></span></span>
                                    <input type="text" class="form-control" name="observaciones" placeholder="Ingrese Observaciones">
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
            <div class="row" id="tabla_resultado_c">
                
            </div>
        </div>
    </div>

    <!-- Segunda caja alpacas-->

    <div class="col-lg-9 col-md-9 col-sm-9 col-sm-12" id="box_alpacasb" style="display: none;">
        <p class="col-lg-12 col-md-12 col-sm-12 col-sm-12 text-center" style="font-size: 30px; margin-top: 10px; color: #00568D;"><u>Modulo de Alpacas</u></p>
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

    <!-- Primera caja Vacunos-->

    <div class="col-lg-9 col-md-9 col-sm-9 col-sm-12" id="box_vacunos" style="display: none;">
        <p class="col-lg-12 col-md-12 col-sm-12 col-sm-12 text-center" style="font-size: 30px; margin-top: 10px; color: #00568D;"><u>Modulo de Vacunos</u></p>
        <div class="row text-center" style="margin-top: 10px">
            <form class="form-inline">
              <div class="form-group">
                <label for="busqueda">Datos a Buscar</label>
                <input type="text" class="form-control" id="busqueda_e" name="busqueda_e" placeholder="Ingrese datos a Buscar">
              </div>

              <button type="button" class="btn btn-primary
              " data-toggle="modal" data-target="#vacunosAdd"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  Añadir</button>
            </form>
            
            <!-- Modal -->
        <div class="modal fade" id="vacunosAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h2 class="modal-title text-center" id="exampleModalLabe2">Añadir Datos del Animal (Vacunos)</h2>
                </div>
                <div class="modal-body">
                    <form class="formulario" action="vacunoNew.php" method="post">
                        <div class="form-group col-lg-10 col-lg-offset-1 col-md-10">
                            <div class="col-lg-6" style="margin-top: 8px">
                                <label for="Arete" class="text-left">Arete:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-tag"></span></span>
                                        <input type="text" class="form-control" name="arete" placeholder="Ingrese Arete de Identificación" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                <label for="registro">Registro:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-list-alt"></span></span>
                                    <input type="text" class="form-control" name="registro" placeholder="Ingrese Registro">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                <label for="tipo">Tipo de Animal:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-piggy-bank"></span></span>
                                    <select  class="form-control" name="tipo" id="tipo" required  >
                                        <option value="vacuno">Vacuno</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                <label for="tat_izq">Tatuaje Oreja Izquierda:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-chevron-left"></span></span>
                                    <input type="text" class="form-control" name="tat_izq" placeholder="Ingrese tatuaje de Oreja Izquierda">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                <label for="tat_der">Tatuaje Oreja Derecha:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-chevron-right"></span></span>
                                    <input type="text" class="form-control" name="tat_der" placeholder="Ingrese tatuaje de Oreja Derecha">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                <label for="edad">Edad:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-gift"></span></span>
                                    <input type="text" class="form-control" name="edad" placeholder="Ingrese Edad">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                <label for="sexo">Sexo:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-heart"></span></span>
                                    <select  class="form-control" name="sexo" id="sexo" required  >
                                        <option value="macho">Macho</option>
                                        <option value="hembra">Hembra</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                <label for="cond_corp">Condicion Corporal:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                                    <input type="text" class="form-control" name="cond_corp" placeholder="Ingrese Condición Corporal">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                <label for="tatuaje">Tatuaje:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-fire"></span></span>
                                    <input type="text" class="form-control" name="tatuaje" placeholder="Ingrese Tatuaje" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                <label for="pastor">Pastor Encargado:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-comment"></span></span>
                                    <input type="text" class="form-control" name="pastor" placeholder="Ingrese Pastor Encargado" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                <label for="observaciones">Observaciones:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-comment"></span></span>
                                    <input type="text" class="form-control" name="observaciones" placeholder="Ingrese Observaciones">
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
            <div class="row" id="tabla_resultado_e">
                
            </div>
        </div>
    </div>

    <!-- Segunda caja Vacunss-->

    <div class="col-lg-9 col-md-9 col-sm-9 col-sm-12" id="box_vacunosb" style="display: none;">
        <p class="col-lg-12 col-md-12 col-sm-12 col-sm-12 text-center" style="font-size: 30px; margin-top: 10px; color: #00568D;"><u>Modulo de Vacunos</u></p>
        <div class="row text-center" style="margin-top: 10px">
            <form class="form-inline">
              <div class="form-group">
                <label for="busqueda">Datos a Buscar</label>
                <input type="text" class="form-control" id="busqueda_f" name="busqueda_f" placeholder="Ingrese datos a Buscar">
              </div>

            </form>
        </div>  
 
        <div class="container col-lg-12 col-md-12 col-sm-12 col-sm-12">
            <div class="row" id="tabla_resultado_f">
                
            </div>
        </div>
    </div>
        <script type="text/javascript" src="../../js/jquery.js"></script>
        <script src="../../js/main.js"></script>
        <script src="../../js/bootstrap.js"></script>
        <script src="../../js/mainSistema.js"></script>
    </body>
</html>