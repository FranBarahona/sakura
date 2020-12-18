<?php
	/*-------------------------
	Autor: Obed Alvarado
	Web: obedalvarado.pw
	Mail: info@obedalvarado.pw
	---------------------------*/
	 ob_start();

	/* Connect To Database*/
	include '../../../Configuracion.php';

// initializ shopping cart class
include '../../../La-carta.php';
$cart = new Cart;
	if ($cart->total_items() <= 0)
	{
	echo "<script>alert('No hay productos agregados al carrito')</script>";
	echo "<script>window.close();</script>";
	exit;
	}

	require_once(dirname(__FILE__).'/../html2pdf.class.php');
		
	//Variables por GET
	$cliente=$_SESSION['sessCustomerID'];
	//$descripcion=mysqli_real_escape_string($con,(strip_tags($_REQUEST['descripcion'], ENT_QUOTES)));
	

	//Fin de variables por GET
	$sql=mysqli_query($db,"SELECT * FROM factura WHERE N_factura = ".$_SESSION['factura'] );
	$rw=mysqli_fetch_array($sql);
	$numero=$rw['N_factura'];	
	
	
	$sql_cliente=mysqli_query($db,"SELECT * FROM cliente WHERE ID_Cliente = ".$_SESSION['sessCustomerID'] );//Obtengo los datos del proveedor
	$rw_cliente=mysqli_fetch_array($sql_cliente);
	// get the HTML
	
	
    
     include(dirname('__FILE__').'/res/factura_html.php');
    $content = ob_get_clean();

    try
    {
        // init HTML2PDF
        $html2pdf = new HTML2PDF('P', 'LETTER', 'es', true, 'UTF-8', array(0, 0, 0, 0));
        // display the full page
        $html2pdf->pdf->SetDisplayMode('fullpage');
        // convert
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        // send the PDF
        $html2pdf->Output('Factura.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
