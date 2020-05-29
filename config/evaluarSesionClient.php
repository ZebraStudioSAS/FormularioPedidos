<?php
class Login
{
    public function evaluarSession($identifyClient, $passwordClient)
    {
        session_start();

        $cont = 0;

        //Consulta de la DB

        include 'conexionDB.php';
        $sql = "SELECT `idCliente`,`nitRazonSocial`,`razonSocialCliente`,`correoElectronicoCliente`,`contrasenaCliente`, `fk_idEjecutivoComercial`,`estadoCliente` FROM `cliente` WHERE nitRazonSocial = '$identifyClient' AND contrasenaCliente = '$passwordClient'";

        if (!$result = $db->query($sql)) {
            die('Datos no encontrados!!! [' . $db->error . ']');
        }
        while ($row = $result->fetch_assoc()) {
            $nnitRazonSocial = stripslashes($row["nitRazonSocial"]);
            $rrazonSocialCliente = stripslashes($row["razonSocialCliente"]);
            $ccorreoElectronicoCliente = stripslashes($row["correoElectronicoCliente"]);
            $ffk_idEjecutivoComercial = stripslashes($row["fk_idEjecutivoComercial"]);
            $ccontrasenaCliente = stripslashes($row["contrasenaCliente"]);
            $eestadoCliente = stripslashes($row["estadoCliente"]);

            if (($nnitRazonSocial == $identifyClient) && ($passwordClient == $ccontrasenaCliente)) {
                $cont = $cont = 1;
            }

        } //Fin del WHILE

        //Consulta de la DB

        if ($cont != "0") {
            $_SESSION["estado"] = "1";
            $_SESSION["nitRazonSocial"] = $nnitRazonSocial;
            $_SESSION["razonSocialCliente"] = $rrazonSocialCliente;
            $_SESSION["correoElectronicoCliente"] = $ccorreoElectronicoCliente;
            $_SESSION["fk_idEjecutivoComercial"] = $ffk_idEjecutivoComercial;
            //print_r($_SESSION);die;           
            if ($eestadoCliente == "1") {
                header("Location: ../index2.php");
            } elseif ($eestadoCliente == "2") {
                header("Location: ../loginClientBlock.php");
            }
        }
        if ($cont == "0") {
            header("Location: ../loginClientError.php");
        }
    }
}
$nuevo = new Login();
$nuevo->evaluarSession($_POST["identifyClient"], $_POST["passwordClient"])
?>
