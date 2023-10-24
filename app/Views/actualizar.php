<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Manejo de los datos del usuario con sesiones y cookies</title>
  </head>
  <body>
  <body>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab"
            href="#home" role="tab" aria-controls="home" aria-selected="true"><?php echo session('username');?></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url('/inicio'); ?>">Imágenes</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url('/salir'); ?>">Salir<span class="sr-only">(current)</span></a>
        </li>
        
        </ul>
        <?php
            date_default_timezone_set("America/Mexico_City");
            $value=date("l j F Y h:i:s a");
            setcookie("cookie", $value, time()+(86400*30), "/");
        ?>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                <h2>Envio de documento:</h2>
                    <form action="<?php echo base_url().'/actualizar'?>" method="post"
                    enctype="multipart/form-data" htmlspecialchars>
                        <input type="text" id="id" name="id" hidden>
                        <label for="archivo">Selecciona un archivo:</label<br>
                        <input type="file" name="archivo"><br>
                        <button type="submit" name="upload">Actualizar</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="table table-responsive">
                        <table class="table table-hover table-bordered">
                            <tr>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                            </tr>
                             <?php foreach($datos as $key): ?>
                                <tr>
                                    <td><img src="data:image/png;base64,<?= base64_encode(stripslashes($key['imagen']));?>" width="100"></td>
                                    <td><?= $key['nombre'];?></td>
                                    <td><a href="<?php echo base_url().'/editar/'.$key['idimagenes'] ?>" class="btn btn-warning btn-sm">Editar</a></td>
                                    <td><a href="<?php echo base_url().'/eliminar/'.$key['idimagenes'] ?>" class="btn btn-danger btn-sm">Eliminar</a></td>
                                </tr>
                            <?php endforeach;?>
                             
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>
    </body>
<footer>
        <p>Tu último inicio fue hace <?=$_COOKIE['cookie']?></p>
    </footer>
</html>