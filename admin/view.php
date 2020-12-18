
<?php
    require 'database.php';

    if(!empty($_GET['id'])) 
    {
        $id = checkInput($_GET['id']);
    }
     
    $db = Database::connect();
    $statement = $db->prepare("SELECT comida.id, comida.nombre, comida.descripcion, comida.precio_comida, comida.imagen, categorias.nombre AS categorias FROM comida LEFT JOIN categorias ON comida.categorias = categorias.id WHERE comida.id = ?");
    $statement->execute(array($id));
    $item = $statement->fetch();
    Database::disconnect();

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
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    
    <body>
      
         <div class="container admin">
            <div class="row">
               <div class="col-sm-6">
                    <h1><strong>Ver producto</strong></h1>
                    <br>
                    <form>
                      <div class="form-group">
                        <label>Nombre:</label><?php echo '  '.$item['nombre'];?>
                      </div>
                      <div class="form-group">
                        <label>Descripcion:</label><?php echo '  '.$item['descripcion'];?>
                      </div>
                      <div class="form-group">
                        <label>Precio:</label><?php echo '  '.number_format((float)$item['precio_comida'], 2, '.', ''). ' $';?>
                      </div>
                      <div class="form-group">
                        <label>Categoria:</label><?php echo '  '.$item['categorias'];?>
                      </div>
                      <div class="form-group">
                        <label>Imagen:</label><?php echo '  '.$item['imagen'];?>
                      </div>
                    </form>
                    <br>
                    <div class="form-actions">
                      <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
                    </div>
                </div> 
                <div class="col-sm-6 site">
                    <div class="thumbnail">
                        <img src="<?php echo '../img/'.$item['imagen'];?>" alt="...">
                        <div class="price"><?php echo number_format((float)$item['precio_comida'], 2, '.', ''). ' $';?></div>
                          <div class="caption">
                            <h4><?php echo $item['nombre'];?></h4>
                            <p><?php echo $item['descripcion'];?></p>
                            <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Commander</a>
                          </div>
                    </div>
                </div>
            </div>
        </div>   
    </body>
</html>


