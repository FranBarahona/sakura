


<?php
session_start();
 $sesion = $_SESSION['valida'];
if(!isset($sesion)){
   header("location:../login.php");
   
}else{




include '../configuracion.php';
$query = "SELECT pc.ID_pedido,c.nombre,cantidad,nombreMesa FROM `pedido_comida` as pc, pedido as p, comida as c, mesa as m WHERE p.id_pedido = pc.id_pedido AND c.id = pc.id AND p.N_mesa = m.Id_mesa";
$result = $db->query($query);   


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link  rel="icon"   href="../img/favicon.png" type="image/png" />
  <link rel="stylesheet" href="../css/pedidos.css">
  <title>Sakura System</title>
</head>
<body>
<div class="wrapper">
    
    <div class="cards">
    
      <h1 class="pen-title">
        Control de pedidos
     <?php   echo " <a href='index.php'>  <button class='btn'>atras</button> </a> " ; ?> 
      </h1>
      
      <?php while($registro = $result->fetch_assoc() ) { ?>
      <div class="card">

        <div class="card-content">
      
          <div class="top">
          <table class="">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Mesa</th>
                      <th>cantidad</th>
                    </tr>
                  </thead>
                  <tbody>
                            <tr>  
                            <td width=150><?php echo $registro['nombre']?></td>
                            <td width=80><?php echo $registro['nombreMesa']?></td>
                            <td width=10><?php echo $registro['cantidad']?></td>
                            </tr>
                  </tbody>
                </table>
            <div class="date"><span><?php echo date("d/m/Y");?></span></div>
          </div>
          <div class="bottom">
            <h2> numero de pedido</h2>
            <h2> <?php echo $registro['ID_pedido']; ?>  </h2>
         <?php   echo " <a href='deletePedido.php?id_pedido=".$registro['ID_pedido']." '>  <button class='boton'>Eliminar</button> </a> " ;?>
          </div>
        </div>
        <div class="card-bg" >
          <img
            class="bg-img"
            src="../img/order.jpg"
            alt="leafs"
          />
        </div>
        <div class="shadow">
          <img
            class="shadow-img"
            src="https://i.pinimg.com/564x/da/68/b6/da68b679121d5e7e17895d96638154f7.jpg"
            alt="leafs"
          />
        </div>
        
      </div>
      <?php } ?> 
  </div>





</body>
</html>





<?php

}

?>
