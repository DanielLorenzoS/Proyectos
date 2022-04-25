<?php
session_start();
if ($_POST) {
    if (($_POST['usuario'] == 'lorecode' && ($_POST['contraseña'] == '12345'))) {
        $_SESSION['usuario'] = "lorecode";
        header("location:index.php");
    } else {
        echo "<script>alert('Usuario o contraseña incorrecta')</script>";
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>

    <div class="container text-center">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 mt-5">
                <div class="card bg-primary bg-dark text-white">
                    <div class="card-header">
                        Iniciar Sesión
                    </div>
                    <div class="card-body">
                        <form action="login.php" method="post">
                            Usuario: <input class="form-control bg-secondary text-white" type="text" name="usuario" id="">
                            <br>
                            Contraseña: <input class="form-control bg-secondary text-white" type="password" name="contraseña" id="">
                            <br>
                            <button class="btn btn-success" type="submit">Entrar al portafolio</button>
                        </form>
                    </div>

                </div>

            </div>
            <div class="col-md-4">

            </div>
        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>