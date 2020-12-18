<?php
if(isset($_GET['id_mesa'])){$id_mesa = $_GET['id_mesa'];}else{$id_mesa = '';}


if($id_mesa !== ''){
    include '../configuracion.php';
    $query ="  UPDATE `mesa` SET `estado`='0' WHERE `Id_mesa`='$id_mesa' ";
    $result = $db->query($query);
        if($result){
            echo "<script>alert('Mesa desocupada exitosamente')</script>";
            echo "<script>window.location.href='controlMesas.php';</script>";
        }else{
            echo "<script>alert('Query mala')</script>";
            echo "<script>window.location.href='controlMesas.php';</script>";
        }

    
}else{
  
}


?>