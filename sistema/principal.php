<!DOCTYPE html>
<html lang="es" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="UTF-8">
        <title>Coop. Yurajhuanca</title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        
        <link href="https://fonts.googleapis.com/css?family=Bree+Serif|Amaranth" rel="stylesheet">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/estilos.css">
        
        <script type="text/javascript" src="../js/jquery.js"></script>
        <script src="../js/main.js"></script>

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
                    <a href="principal.php" class="navbar-brand" style="color: rgba(255, 255, 255, 1)">Coop. Yurajhuanca</a>
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
    
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3">
        <div class="container text-center animales">
            <img src="../img/icono/vaca2.png">
            <p class="text-center">Registro y consulta de animales (borregos, alpacas y vacunos)</p>
            <a href="animales/animales.php" class="btn" id="btn-animal">Ver Más</a>    
        </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3">
        <div class="container text-center empadrado">
            <img src="../img/icono/oveja2.png">
            <p class="text-center">Registro y consulta de empadrado, servicios y gestación</p>
            <a href="empadre/empadre.php" class="btn" id="btn-emp">Ver Más</a>
        </div>
    </div> 
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3">
        <div class="container text-center salida">
            <img src="../img/icono/salir.png">
            <p class="text-center">Registro y consulta de salidas y reportes (ventas, alquileres, prestamos)</p>
            <a href="salida/salida.php" class="btn" id="btn-salida">Ver Más</a>
        </div>
    </div>   

    <script type="text/javascript" src="../js/jquery.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/mainSistema.js"></script>
    </body>
</html>