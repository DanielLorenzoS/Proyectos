<?php include('header.php'); ?>
<?php include('conexion.php'); ?>
<?php

if ($_POST){
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    $fecha = new DateTime();

    $imagen = $fecha->getTimestamp()."_".$_FILES['archivo']['name'];
    $imagen_temporal = $_FILES['archivo']['tmp_name'];
    move_uploaded_file($imagen_temporal,"imagenes/".$imagen);

    $objConexion = new conexion();
    $sql = "INSERT INTO `proyectos` (`id`, `nombre`, `imagen`, `descripcion`) VALUES (NULL, '$nombre', '$imagen', '$descripcion')";
    $objConexion -> ejecutar($sql);
    header("location:portfolio.php");
} 
if ($_GET){
    $id = $_GET['borrar'];
    $objConexion = new conexion();

    $imagen = $objConexion->consultar("SELECT imagen FROM `proyectos` WHERE id=".$id);
    unlink("imagenes/".$imagen[0]['imagen']);

    $sql = "DELETE FROM proyectos WHERE `proyectos`.`id` = ".$id;
    $objConexion->ejecutar($sql);
    header("location:portfolio.php");
}

$objConexion = new conexion();
$proyectos = $objConexion->consultar("SELECT * FROM `proyectos`");

?>
<br><br>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Datos del proyecto
                </div>
                <div class="card-body">
                    <form action="portfolio.php" method="post" enctype="multipart/form-data"><br>
                        Nombre: <input required class="form-control" type="text" name="nombre" id=""><br><br>
                        Imagen: <input required class="form-control" type="file" name="archivo" id=""><br><br>
                        Descripción:<textarea required class="form-control" name="descripcion" rows="3"></textarea>
                        <input class="btn-success" type="submit" value="Enviar proyecto">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Imagen</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($proyectos as $proyecto){ ?>
                    <tr>
                        <td><?php echo $proyecto['id']; ?></td>
                        <td><?php echo $proyecto['nombre']; ?></td>
                        <td>
                            <img width="150px" src="imagenes/<?php echo $proyecto['imagen']; ?>" alt="">
                            <?php echo $proyecto['imagen']; ?>
                        </td>
                        <td><?php echo $proyecto['descripcion']; ?></td>
                        <td><a name="" id="" class="btn btn-danger" href="?borrar=<?php echo $proyecto['id']; ?>">Eliminar</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>






<?php include('footer.php'); ?>