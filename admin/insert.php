
<?php
     
    require 'database.php';
 
    $nombreError = $descripcionError = $precioError = $categoriasError = $imagenError = $nombre = $descripcion = $precio = $categorias = $imagen = "";

    if(!empty($_POST)) 
    {
        $nombre             = checkInput($_POST['nombre']);
        $descripcion        = checkInput($_POST['descripcion']);
        $precio             = checkInput($_POST['precio']); 
        $imagen             = checkInput($_FILES["imagen"]["name"]);
        $imagenPath          = '../img/'. basename($imagen);
        $imagenExtension     = pathinfo($imagenPath,PATHINFO_EXTENSION);
        $categorias           = checkInput($_POST['categorias']);
        $isSuccess          = true;
        $isUploadSuccess    = false;
        
        if(empty($nombre)) 
        {
            $nombreError = 'Este campo no puede estar vacío.';
            $isSuccess = false;
        }
        if(empty($descripcion)) 
        {
            $descripcionError = 'Este campo no puede estar vacío.';
            $isSuccess = false;
        } 
        if(empty($precio)) 
        {
            $precioError = 'Este campo no puede estar vacío.';
            $isSuccess = false;
        } 
        if(empty($categorias)) 
        {
            $categoriasError = 'Este campo no puede estar vacío.';
            $isSuccess = false;
        }
        if(empty($imagen)) 
        {
            $imagenError = 'Este campo no puede estar vacío.';
            $isSuccess = false;
        }
        else
        {
            $isUploadSuccess = true;
            if($imagenExtension != "jpg" && $imagenExtension != "png" && $imagenExtension != "jpeg" && $imagenExtension != "gif" ) 
            {
                $imagenError = "Los archivos autorizados son: .jpg, .jpeg, .png, .gif";
                $isUploadSuccess = false;
            }
            if(file_exists($imagenPath)) 
            {
                $imagenError = "
                El archivo ya existe";
                $isUploadSuccess = false;
            }
            if($_FILES["imagen"]["size"] > 500000) 
            {
                $imagenError = "
                El archivo no debe superar los 500 KB";
                $isUploadSuccess = false;
            }
            if($isUploadSuccess) 
            {
                if(!move_uploaded_file($_FILES["imagen"]["tmp_name"], $imagenPath)) 
                {
                    $imagenError = "
                    Hubo un error al subir";
                    $isUploadSuccess = false;
                } 
            } 
        }
        
        if($isSuccess && $isUploadSuccess) 
        {
            $db = Database::connect();
            $statement = $db->prepare("INSERT INTO comida (nombre,descripcion,precio_comida,imagen,categorias) values(?, ?, ?, ?, ?)");
            $statement->execute(array($nombre,$descripcion,$precio,$imagen,$categorias));
            Database::disconnect();
            header("Location: index.php");
        }
    }

    function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Sakura System</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link  rel="icon"   href="../img/favicon.png" type="image/png" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../css/styles2.css">
    </head>
    
    <body>
       
         <div class="container admin">
            <div class="row">
                <h1><strong>Ajustes de productos</strong></h1>
                <br>
                <form class="form" action="insert.php" role="form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $nombre;?>">
                        <span class="help-inline"><?php echo $nombreError;?></span>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion:</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion" value="<?php echo $descripcion;?>">
                        <span class="help-inline"><?php echo $descripcionError;?></span>
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio: (en $)</label>
                        <input type="number" step="0.01" class="form-control" id="precio" name="precio" placeholder="Precio" value="<?php echo $precio;?>">
                        <span class="help-inline"><?php echo $precioError;?></span>
                    </div>
                    <div class="form-group">
                        <label for="categorias">Categorias:</label>
                        <select class="form-control" id="categorias" name="categorias">
                        <?php
                           $db = Database::connect();
                           foreach ($db->query('SELECT * FROM categorias') as $row) 
                           {
                                echo '<option value="'. $row['id'] .'">'. $row['nombre'] . '</option>';;
                           }
                           Database::disconnect();
                        ?>
                        </select>
                        <span class="help-inline"><?php echo $categoriasError;?></span>
                    </div>
                    <div class="form-group">
                        <label for="imagen">Seleccione una imagen:</label>
                        <input type="file" id="imagen" name="imagen"> 
                        <span class="help-inline"><?php echo $imagenError;?></span>
                    </div>
                    <br>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Añadir</button>
                        <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
                   </div>
                </form>
            </div>
        </div>   
    </body>
</html>


















