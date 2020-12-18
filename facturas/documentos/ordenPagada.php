<?php

if($_REQUEST['action'] == 'ordenPagada'){
	include '../../../Configuracion.php';
include '../../../La-carta.php';
$cart = new Cart;

$updatePedido =  "UPDATE `pedido` SET  `estado`='pagado' WHERE `id_cliente`= '".$_SESSION['sessCustomerID']."' ";
$resultadoUpdate = $db->query($updatePedido);

 if($resultadoUpdate){
    session_destroy();
    $cart->destroy();
    echo "<script>alert('Su orden esta cancelada')</script>";
    echo "<script>window.location.href='../../../cliente.php';</script>";
    header("location: ../../../cliente.php");
 }else{
    echo "no se actualizo el pedido";
 }




}else{

}

?>