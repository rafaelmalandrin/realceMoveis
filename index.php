<!DOCTYPE html>
<?php include 'funcoes.php' ?>
<html>

	<head><title> Realce Móveis </title>

		<link href="estilos/css.css" rel="stylesheet" type="text/css" />
		
		<script type="text/javascript" src="estilos/jquery.js"></script>  
		
		<script type="text/javascript" src="estilos/jquery.validate.js"></script> 
		
		<script type="text/javascript" src="estilos/coin-slider.min.js"></script>  

	</head>

	<body>
		<div id="site">

			<?php include 'top.php'; ?>

			<div id="conteudo">
				
				<?php
					$parametro = isset($_GET['p']) ? $_GET['p'] : "home";
        
					include("$parametro.php");
				?>

			</div>

			<?php include 'rod.php'; ?>
		</div>
	</body>
</html>

