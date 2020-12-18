
<style type="text/css">
<!--
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }
.class-theme{
	background:#4cc2c5;
	padding: 5px;
	color:white;
	font-weight:bold;
	font-size:12px;
}
.silver{
	background:white;
	padding: 5px;
}

.clouds{
	background:#ecf0f1;
	padding: 5px;
}
.border-top{
	border-top: solid 2px #eee;
	
}
.border-left{
	border-left: solid 2px #eee;
}
.border-right{
	border-right: solid 2px #eee;
}
.border-bottom{
	border-bottom: solid 2px #eee;
}

table.page_header{
	width: 100%;
	padding:0px;
	background-color:#22b24b;

}

table.page_footer{
	width: 100%;
	padding:0px;
	
}
.border-bottom{
	border-bottom: #4cc2c5 3px;
	padding-bottom:10px
}
.orange-top{
	border-top: #4cc2c5 3px;
}
.orange-left{
	border-left: #4cc2c5 3px;
}
.white{
	border-bottom:white 3px;
}
table{
	color:#2c3e50;
}
 .inpar{
	 background-color: #f0eeed;
 }
 .orderBtn
 {
	padding: 10px 10px;
  border: 0;
  
  border-radius: 25px;
  margin-top: 10px;
  color: black;
  letter-spacing: 1px;
  
}

-->
</style>
<page backtop="15mm" backbottom="15mm" backleft="15mm" backright="15mm" style="font-size: 12pt; font-family: arial" >
<page_header>
        <table class="page_header" cellspacing=0 cellpadding=0 style="width:100%">
            
			

			<tr style='' >

                
				<td style="width:30%;vertical-align: middle;height:40mm;padding-left:10mm">
                   <img style="width: 100%;" src="../../../img/sakura.jpg" alt="Logo">
                </td>
				<td style="width:30%;"> &nbsp;</td>
				<td style="width:40%;color:white;vertical-align: bottom;height:30mm">
				<strong><?php echo "Restaurante Sakura"?> </strong> <br>
                  
					<strong>Teléfono : </strong> <?php echo "7344-8760";?><br>
						
				<strong>Dirección : </strong> <?php echo "sakura";?><br>
                </td>
               
            </tr>
        </table>
    </page_header>
	<page_footer>
        <table class="page_footer" cellspacing=0 cellpadding=0 >
			
			
           <tr>

                
				<td style="width:33%;min-height:100px;background-color:#961019">
                   &nbsp;
                </td>
				
				<td style="width:34%;min-height:100px;background-color:#22b24b;">
                   &nbsp;
                </td>
				
				<td style="width:33%;min-height:100px;background-color:#233f9a ">
                   &nbsp;test
                </td>
               
            </tr>


			
        </table>
    </page_footer>
	<p style='margin-top:15mm'>&nbsp;</p>
	<p style='color:#961019;font-size:20px;font-weight:bold'>Factura Nº: <?php echo $numero;?></p>
	<p style='color:#233f9a;margin-top:-10px'><?php echo date("d/m/Y");?></p>
	
	<p >
		<span style='color:#961019;font-size:20px;font-weight:bold'>Facturar a:</span><br>
		<span style='font-size:15px;color:#222f3e'><strong>Nombre: </strong> <?php echo $rw_cliente['nombre'];?><br>
			<strong>Tipo de pago: </strong> <?php echo $rw['t_de_pago'];?><br>
			<strong>Fecha de factura: </strong> <?php echo $rw['fecha_factura'];?><br>
			
		</span>
	</p>
	
	
        <table   cellspacing=0 cellpadding=0 style="width:100%;font-size:14px;color:#222f3e" >
           <tr style="background-color:#233f9a;color:white;">

                
				<td style="width:10%;text-align:center;height:8mm;vertical-align:middle;">
                   Nº
                </td>
				<td style="width:45%;text-align:left;height:8mm;vertical-align:middle;">
                   DESCRIPCIÓN
                </td>
				<td style="width:15%;text-align:right;height:8mm;vertical-align:middle;">
                   PRECIO
                </td>
				<td style="width:15%;text-align:center;height:8mm;vertical-align:middle;">
                   CANTIDAD
                </td>
				<td style="width:15%;text-align:right;height:8mm;vertical-align:middle;padding-right:4px">
                   TOTAL
                </td>
               
            </tr>
			<?php
			
			$items=1;
				if ($items%2==1){
					$clase_tr="inpar";
				} else{
					$clase_tr='';
				}
				$cartItems = $cart->contents();
            foreach($cartItems as $item){
			?>
			<tr class='<?php echo $clase_tr;?>'>
		
				<td style='width:10%;text-align:center;height:8mm;vertical-align:middle'><?php echo $items;?></td>
				<td style='width:45%;text-align:left;height:8mm;vertical-align:middle'><?php echo $item["name"];?></td>
				<td style='width:15%;text-align:right;height:8mm;vertical-align:middle'><?php echo '$'.$item["price"].' USD';?></td>
				<td style='width:15%;text-align:center;height:8mm;vertical-align:middle'><?php echo $item["qty"];?></td>
				<td style='width:15%;text-align:right;height:8mm;vertical-align:middle;padding-right:4px'><?php echo '$'.$item["subtotal"].' USD';?></td>
				

			</tr>
			<?php  }
?>
			
        </table>
		<br>
		<table   cellspacing=0 cellpadding=0 style="width:100%;font-size:14px;color:#222f3e" >
           <tr>
				<td style="width:70%;"></td>
				<td style="width:15%;text-align:right;height:8mm;vertical-align:middle;background-color:#f0eeed  ">
                   
                </td>
				<td style="width:15%;text-align:right;height:8mm;vertical-align:middle;padding-right:4px;background-color:#f0eeed ">
                   
                </td>
           </tr>
		   
		   <tr>
				<td style="width:70%;"></td>
				<td style="width:15%;text-align:right;height:8mm;vertical-align:middle;">
                   
                </td>
				<td style="width:15%;text-align:right;height:8mm;vertical-align:middle;padding-right:4px;">
                   
                </td>
           </tr>
		   
		   <tr>
				<td style="width:70%;"></td>
				<td style="width:15%;text-align:right;height:8mm;vertical-align:middle;background-color:#233f9a;color:white;">
                   TOTAL
                </td>
				<td style="width:15%;text-align:right;height:8mm;vertical-align:middle;padding-right:4px;background-color:#233f9a;color:white;">
                   <?php  echo '$'.$cart->total().' USD';?>
                </td>
           </tr>
		</table>
		
		

<a href="ordenPagada.php?action=ordenPagada" class="btn btn-success orderBtn">Realizar pago <i class="glyphicon glyphicon-menu-right"></i></a>



		
</page>   
