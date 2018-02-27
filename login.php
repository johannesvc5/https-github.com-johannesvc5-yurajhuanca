<!DOCTYPE html>
<html lang="es-PE">
<head>
    <meta charset="UTF-8">
    <title>Coop. Yurajhuanca</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body style="background: #fff">
<section class="container">
    <div class=" form-group row" style="margin-top: 55px;">
        <br><br>
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="panel panel-default" style="box-shadow: 2px 2px 2px #000">
                
                <div class="panel-body" style="margin-top: -40px; color: #02416A">
                    <div class="page-header">
                        <h2>Bienvenido</h2>
                    </div>
                    <form action="sistema/sesiones.php" method="POST">
                        <div class="form-group">
                            <label>Usuario:</label>
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                                <input type="text" class="form-control" name="usuario" placeholder="Ingrese su Numero de DNI">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Contraseña:</label>
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-asterisk"></span></span>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="roles">Seleccione su Rol:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon3"><span class="glyphicon glyphicon-flag"></span></span>
                                        <select  class="form-control" name="rol" id="rol" required>
                                            <option value="enfermeria">Pastor</option>
                                            <option value="administracion">Administracion</option>
                                        </select>
                                </div>
                        </div>
                        <a href="index.html"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</button></a>
                        <button type="submit" name="login" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Ingresar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>