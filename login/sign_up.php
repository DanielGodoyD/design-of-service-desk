<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="container vh-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Formulario de creación de usuario</h1>
                    <form action="generar_u.php" method="POST">
                        <div class="form-group">
                            <label for="dni">N° de Documento de Identidad:</label>
                            <input type="text" class="form-control" name="dni" placeholder="Ejemplo: 12345678" maxlength="8" minlength="8">
                        </div>
                        <div class="form-group">
                            <label for="nombres">Nombres:</label>
                            <input type="text" class="form-control" name="nombres" placeholder="Ejemplo: Juan Pablo">
                        </div>
                        <div class="form-group">
                            <label for="apellidos">Apellidos:</label>
                            <input type="text" class="form-control" name="apellidos" placeholder="Ejemplo: López Aguirre">
                        </div>
                        <div class="form-group">
                            <label for="fecha">Fecha de Nacimiento:</label>
                            <input type="date" class="form-control" name="fecha">
                        </div>
                        <input type="submit" value="Crear Cuenta" name="submit" class="btn btn-primary btn-block">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
