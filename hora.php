<?php
	include('funcoes.php');
	
	$data = fnc_date_to_mysql($_POST['data']);
	
	

	
	include('pdo.php');
        
    //instanciar banco de dados
    $dbo = database::getInstance();
      	
	//Instanciar uma conexão
	$conn 	= new Conexao();
		
	
?>

	<?php	
	
	
	//for para gerar hora
		
	for($time = 9; $time <= 17; $time++){
		$time_formatado = str_pad("$time:00", 5, "0",STR_PAD_LEFT);
		
		$sql = "select * from agendamento where data = '$data' and hora = '$time_formatado'";
		$consulta = $conn->query($sql);
		$resultado = $consulta->fetch(PDO::FETCH_OBJ);
		//var_dump($resultado);
		
		if(!$resultado){
			?> <option> <?php echo $time_formatado; ?> </option>
			<?php
		}
	}
?>
