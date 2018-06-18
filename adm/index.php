<!DOCTYPE html>
<?php
	include('../funcoes.php');
?>
<html>

	<head><title> Realce Móveis </title>
	
		<link href="estilos/css2.css" rel="stylesheet" type="text/css" />
		
		<script type="text/javascript" src="../estilos/jquery.js"></script>
	
	</head>
	<body>	
	
	<?php
		//iniciar a sessão
		ob_start();
		session_start();
		
		if(isset($_SESSION['logado'])){
			$logado = $_SESSION['logado'];
		}
		else{
			$logado = false;
		}
		
		//encerrar a sessão
		if(isset($_GET['exit'])){
			$_SESSION['logado'] = false;
			session_destroy();
			include('login.php');
		}
		else{
			
			if($logado==false){
				include('login.php');
			}
			
			
		}
		
	?>
	<?php if($logado == true){ ?>
		<?php include 'topo.php'; ?>
		
		<div id="site">
		
			<?php include 'barra.php' ?>
				
				
				<?php
					$parametro = isset($_GET['p']) ? $_GET['p'] : "home";
        
					include("$parametro.php");
				?>
				
	<?php } ?>			
		</div>
	</body>
</html>
	