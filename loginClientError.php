<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Cliente</title>
    <link rel="stylesheet" href="css/styleLogin.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="img/80105769-user-login.jpg" alt="profile-img">
            <p id="profile-name" class="profile-name-card"></p>
            <form action="config/evaluarSesionClient.php" method="post" class="form-signin">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" class="form-control" name="identifyClient" id="identifyClient" placeholder="Identicación" required autofocus>
                <input type="password" class="form-control" name="passwordClient" id="passwordClient" placeholder="Contraseña" required>
                    <div id="remember" class="checkbox">
                        <label>
                            <input type="checkbox" name="" id=""> Recuerdame
                        </label>
                    </div>
                <input type="submit" value="Ingresar" class="btn btn-lg btn-primary btn-block btn-signin">
                <div class="errorDatos">
                    <span class="errorData">Ha ingresado algun dato mal, verifiquelo e intente de nuevo.</span>
                </div>                
            </form>
            <a href="#" class="forgot-password">Olvido Contraseña?</a>        
        </div>        
    </div>
</body>
</html>