<?php
if(isset($_GET['id_pedido'])){$id_pedido = $_GET['id_pedido'];}else{$id_pedido = '';}

if($id_pedido !== ''){
    include '../configuracion.php';
    $query ="  DELETE FROM `pedido_comida` WHERE `ID_pedido` = '$id_pedido' " ;
    $result = $db->query($query);
        if($result){
            header("location: pedidos.php ");
        }else{
            echo "<script>alert('NO se pudo borrar pedido')</script>";
            echo "<script>window.location.href='pedidos.php';</script>";
        }




}else{
    echo "<script>alert('No se envio el id del pedido')</script>";
    echo "<script>window.location.href='pedidos.php';</script>";
}




?>