<?php
		
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
				header('location: index.php');
			}
			
			
		}
		
	?>