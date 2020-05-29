<?php

class RegistroPedido
{
    public function registrarPedido($fechaPedidoT, $nitCliente, $razonSocial, $correoClient, $celularCliente, $zonaCliente, $nombreEjecutivoComercial, $correoEjecutivoComercial,$cometariosCliente,$cantidadProduct)
    {

        include 'conexionDB.php';

        $contexistencia = 0;

        //Final de consulta de un ususario

        if ($contexistencia == '0') {

            $sql2 = "INSERT INTO pedido (`idPedido`, `fechaPedido`, `nitRazonSocial`, `razonSocialCliente`, `correoCliente`, `celularCliente`, `zonaCliente`, `fk_idEjecutivoComercial`, `nombreEjecutivoComercial`, `correoEjecutivoComercial`, `comentarios`, `productos`) VALUES (NULL, $fechaPedidoT, '$nitCliente', '$razonSocial', '$correoClient', '$celularCliente', '$zonaCliente', '$nombreEjecutivoComercial', '$correoEjecutivoComercial', '$cometariosCliente', '$cantidadProduct')";
            if (!$result2 = $db->query($sql2)) {
                die('Datos no encontrados!!! [' . $db->error . ']');
            }
            //print_r($sql2);die;
            echo ("Location: index2.php");
        }

        if ($contexistencia != '0') {
            echo ("Location: index.html");
        }

    }
}

$nuevo = new RegistroPedido();
$nuevo->registrarPedido($_POST["fechaPedidoT"], $_POST["nitCliente"], $_POST["razonSocial"], $_POST["correoClient"], $_POST["celularCliente"], $_POST["zonaCliente"], $_POST["nombreEjecutivoComercial"], $_POST["correoEjecutivoComercial"], $_POST["cometariosCliente"], $_POST["cantidadProduct"])

?>
