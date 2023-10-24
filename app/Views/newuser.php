<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Producto Integrador</title>
  </head>
  <body>
  
            <div class="container">
                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <h1>Nuevo Usuario:</h1>
                        <form method="post" action='<?php echo base_url().'/newus'?>' htmlspecialchars>
                            <label>Nombre:<br><input type="text" name="nombre" required></label><br>
                            <label>Apellido:<br><input type="text" name="apellido" required></label>
                            <label>Email:<br><input type="email" name="email" required></label>
                            <label>Nombre de usuario:<br><input type="text" name="username" required></label><br>
                            <label>Contraseña:<br><input type="password" name="password" required ></label><br>
                            <br><button type="submit">Crear usuario</button><br>
                        </form>
                    </div>
                    <div class="col-sm-4"></div>
                </div>
                <a class="nav-link" href="<?php echo base_url('newuser'); ?>">Imágenes</a>
            </div><br><br> 
            
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </body>
</html>