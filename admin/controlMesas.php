<?php
session_start();
$sesion = $_SESSION['valida'];
if(!isset($sesion)){
  header("location:../login.php");
  
}else{


include ('../conn/conn.php');
$mostrarMesas = "SELECT * FROM `mesa`  ";
$resultadoShows= $conn->query($mostrarMesas); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link  rel="icon"   href="../img/favicon.png" type="image/png" />
    <link rel="stylesheet" href="../css/controlMesas.css">
    <title>Sakura System Mesas</title>
</head>
<body>

 

    <div class="wrapper">
    
      <div class="cards">
      
        <h1 class="pen-title">
          Control de Mesas
          <?php   
          echo " <a href='index.php'>  <button class='boton'>   Atras  </button> </a> " ; ?>
        </h1>
        
        <?php while($registro = $resultadoShows->fetch_assoc() ) { ?>
        <div class="card">

          <div class="card-content">
            <div class="top">
              <h3 class="name">Sakura</h3>
              <?php
              if($registro['estado']==0){
                echo " <h3 class='name'>Desocupada</h3>  ";
              }else{
                echo " <h3 class='name'>ocupada</h3>  ";
              }
              
              
              ?> 
              <div class="date"><span><?php echo date("d/m/Y");?></span></div>
            </div>
            <div class="bottom">
              <h2> <?php echo $registro['nombreMesa']; ?>  </h2>
           <?php   echo " <a href='actualizarMesa.php?id_mesa=".$registro['Id_mesa']." '>  <button class='boton'>Desocupar</button> </a> " ; ?>
            </div>
          </div>
          <div class="card-bg" >
            <img
              class="bg-img"
              src="../img/mesita.jpg"
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
