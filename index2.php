<?php
include '../configuracion/conexionLogin.php';
$sql1 = "SELECT `idProducto`,`codigoProducto`,`nombreProducto`,`embalajeProducto`,`ivaProducto`,`fk_idLineaProduccion`,`estadoProducto` FROM `producto` WHERE `estadoProducto` = 1 ORDER BY `codigoProducto` ASC";

$result1 = mysqli_query($db, $sql1);
?>

<?php
//include 'config/seguridadClient.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style1.css">
    <title>Inicio Cliente</title>
</head>
<body>
    <!-- #region header-->
    <div class="encabezado">
        <header class="encabezadoChe">
            <div class="column"><img src="img/logo-chefrito1.png" alt="Logo Chefrito" class="logoChefrito"></div>
            <!--<div class="column">
                <span class="text1">FORMATO </span><p class="text3">DE</p>
                <span class="text2">PEDIDOS</span>
            </div>-->
        </header>
    </div>
    <!-- #endregion header-->
    <!-- #region Body-->
    <div class="container">
        <div class="main1">
            <img src="img/paquete1.png" alt="Paquete 1" id="" class="imagenIzquierda">
        </div>
        <div class="formularioPedido main2">
            <div class="containerDatos">
                <form action="" method="POST" class="formPedido">
                    <div class="informationClient">
                        <div class="row">
                            <div class="col-25">
                                <label for="fechaPedido" id="lbFechaPedido" class="textForm">Fecha del pedido: </label>
                            </div>
                            <div class="col-75">
                                <input type="text" name="fechaPedidoT" id="fechaPedidoT" class="datos" value="<?php date_default_timezone_set("America/Bogota");
echo date("d/m/o h:i:s a");?>" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="Identificacion" id="lbIdentificacion" class="textForm">Identificación: </label>
                            </div>
                            <div class="col-75">
                                <input type="text" name="nitCliente" id="nitCliente" class="datos" value="<?php echo $_SESSION["nitRazonSocial"]; ?>" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="Cliente" id="lbRazonSocialCliente" class="textForm">Nombre Cliente: </label>
                            </div>
                            <div class="col-75">
                                <input type="text" name="razonSocial" id="razonSocial" class="datos" value="<?php echo $_SESSION["razonSocialCliente"]; ?>" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="E-mail" id="lbCorreoCliente" class="textForm">E-mail: </label>
                            </div>
                            <div class="col-75">
                                <input type="text" name="correoClient" id="correoClient" class="datos" value="<?php echo $_SESSION["correoElectronicoCliente"]; ?>" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="Celular" id="lbCelularCliente" class="textForm">Celular: </label>
                            </div>
                            <div class="col-75">
                                <input type="text" name="celularCliente" id="celularCliente" class="datos">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="Zona" id="lbZonaCliente" class="textForm">Zona: </label>
                            </div>
                            <div class="col-75">
                                <input type="text" name="zonaCliente" id="zonaCliente" class="datos">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="EjecutivoComercial" id="lbEjecutivoComercial" class="textForm">Ejecutivo Comercial: </label>
                            </div>
                            <div class="col-75">
                                <input type="text" name="nombreEjecutivoComercial" id="nombreEjecutivoComercial" class="datos" value="<?php echo $_SESSION["fk_idEjecutivoComercial"]; ?>" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="CorreoEjecutivoComercial" id="lbCorreoEjecutivoComercial" class="textForm">Correo Ejecutivo Comercial: </label>
                            </div>
                            <div class="col-75">
                                <input type="text" name="correoEjecutivoComercial" id="correoEjecutivoComercial" class="datos" value="<?php echo $_SESSION["fk_idEjecutivoComercial"]; ?>" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="ComentariosExtra" id="lbComentariosCliente" class="textForm">Comentarios: </label>
                            </div>
                            <div class="col-75">
                                <textarea name="cometariosCliente" id="cometariosCliente" class="datosTextArea" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="tableProducts">
                        <table class="table2">
                            <thead id="encabezadoTabla">
                                <tr class="row1">
                                    <th id="rowCod">CÓDIGO</th>
                                    <th id="rowProd">DESCRIPCIÓN</th>
                                    <th id="rowEmb">EMBALAJE</th>
                                    <th id="rowIva">% IVA</th>
                                    <th id="rowCantSol">CANTIDAD</th>
                                </tr>
                            </thead>
                            <tbody class="bodyTable">
                                <!--<tr class="row2">
                                    <td id="lineaProduct" colspan="5">LINEA DE SURTIDAS</td>
                                </tr>-->
                                <?php
while ($mostrarP = mysqli_fetch_array($result1)) {
    ?>
                                <tr class="row3" id="mostrarFormulario">
                                    <td><?php echo $mostrarP['codigoProducto']; ?></td>
                                    <td><?php echo $mostrarP['nombreProducto']; ?></td>
                                    <td><?php echo $mostrarP['embalajeProducto']; ?></td>
                                    <td><?php echo $mostrarP['ivaProducto']; ?></td>
                                    <td><input type="text" name="cantidadProduct" id="cantidadProduct" class="inputTextCant" value=""></td>
                                </tr>
                                <?php
}
?>
                            </tbody>
                            <tfoot class="pedidoAbajo">
                                <div class="finalPedido">
                                    <tr class="row4">
                                        <div class="mover">
                                            <td colspan="2"><input type="submit" value="Enviar pedido" class="botonBuscarCliente"></td>
                                            <td colspan="3"><input type="reset" value="Cancelar pedido" class="botonBuscarCliente"></td>
                                        </div>
                                    </tr>
                                </div>
                            </tfoot>
                        </table>
                    </div>
                </form>
            </div>
            </div>
        <div class="main3">
            <img src="img/paquete2.png" alt="" id="" class="imagenDerecha">
        </div>
    </div>
    <!-- #endregion Body-->
    <!-- #region Footer-->
    <footer class="piePagina">
        <div class="info">
            <hr id="lineaHorizontal">
            <span id="inforUbi">CHEFRITO CLL 16 # 2 - 64, 000 Funza, Colombia 8260295</span>
            <br>
            <span id="inforDere">Todos los derechos reservados, 2020</span>
            <hr id="lineaHorizontal">
        </div>
    </footer>
    <!-- #endregion Footer-->
</body>
</html>