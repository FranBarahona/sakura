<?php
session_start();
 $sesion = $_SESSION['valida'];
if(!isset($sesion)){
   header("location:../login.php");
   
}else{

    ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sakura System </title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link  rel="icon"   href="../img/favicon.png" type="image/png" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../css/styles_3.css">
    </head>
    
    <body>

    <header>
      <div class="field">
<p class="sesion"> Bienvenido <?php echo $_SESSION['valida']; ?>  </p>
</div>
 <img src="../img/sakura.jpg"  />   

 <a class="btna " href="../cerrarSesion.php"> Cerrar sesion <a/>
</header>


        <div class="container admin">
            <div class="row">
                <h1><strong>Lista de productos  </strong>
                  <a href="insert.php" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span> Añadir</a>
                  <a href="pedidos.php" class="btn btn-success btn-lg"><span class="glyphicon "></span> Pedidos</a>
                  <a href="controlMesas.php" class="btn btn-success btn-lg"><span class="glyphicon  glyphicon-plus"></span> Mesas</a></h1>
                  
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>nombre</th>
                      <th>Descripcion</th>
                      <th>Precio</th>
                      <th>Categoria</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        require 'database.php';
                        $db = Database::connect();
                        $statement = $db->query('SELECT comida.id, comida.nombre, comida.descripcion, comida.precio_comida, categorias.nombre AS categorias FROM comida LEFT JOIN categorias ON comida.categorias = categorias.id ORDER BY comida.id DESC');
                        while($item = $statement->fetch()) 
                        {
                            echo '<tr>';
                            echo '<td>'. $item['nombre'] . '</td>';
                            echo '<td>'. $item['descripcion'] . '</td>';
                            echo '<td>'. number_format($item['precio_comida'], 2, '.', '') . '</td>';
                            echo '<td>'. $item['categorias'] . '</td>';
                            echo '<td width=300>';
                            echo '<a class="btn btn-default" href="view.php?id='.$item['id'].'"><span class="glyphicon glyphicon-eye-open"></span> Ver</a>';
                            echo ' ';
                            echo '<a class="btn btn-primary" href="update.php?id='.$item['id'].'"><span class="glyphicon glyphicon-pencil"></span> Modificar</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="delete.php?id='.$item['id'].'"><span class="glyphicon glyphicon-remove"></span> Eliminar</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        Database::disconnect();
                      ?>
                  </tbody>
                </table>
            </div>
        </div>
    </body>
</html>




<?php

}

?>









