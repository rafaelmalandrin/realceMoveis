<?php

	$param = $_POST['param'];
	$id = $param['ok'];
	$value = $param['valor'];	
	
	
	include('../pdo.php');
	include('table.class.php');
	include('../agendamento.class.php');
	
	//instanciar banco de dados
    $dbo = database::getInstance();
    	
    //instanciar aluno
    $agendamento = new agendamento();
	
	
	$agendamento->load($id);
	$dados = array(
		"ok" => $value
	);
	//salvar dados
	$agendamento->bind ($dados);
	$agendamento->store();
	
?>