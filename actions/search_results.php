<?php
		include ("../controllers/product_controller.php");

	
		
		$brand;
		//Getting the searched data
		if(isset($_GET['submit'])){
			$brand = $_GET['search'];
			
		   echo($brand);
		   $custid = $_GET['customer_id'];
		
		
			$searchresults=search_product($brand);

		
			
			header('Location: ../view/search_product.php?brd_id='.$brand.'&customer_id='.$custid);
		}
		
		?>