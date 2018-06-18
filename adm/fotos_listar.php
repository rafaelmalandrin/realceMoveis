<?php include 'seguranca.php';
?>
<!--
	lista os produto e consulta por formulário de pesquisa
-->
<?php
	//excluir
	include('../table.class.php');
	
	if($_GET['p'] == "produtos"){
	
		include('produto.class.php');
    	 
		if(isset($_GET['excluir'])){ //se o post estiver setado ele irá executar a função abaixo
		
			//instanciar aluno
			$produto = new produto();
		
			$id = $_GET ['excluir']; //armazena a id pois ela está protegida e nao consigo inserir no formulario
			$produto->load($id);	
				
			//gravar os dados
			$produto->excluir($id);
		
			unlink("imagens/uploadsprodutos/$id.jpg");
		
		}
	}
	else{
		include('servico.class.php');
    	 
			if(isset($_GET['excluir'])){ //se o post estiver setado ele irá executar a função abaixo
		
				//instanciar aluno
				$servico = new servico();
			
				$id = $_GET ['excluir']; //armazena a id pois ela está protegida e nao consigo inserir no formulario
				$servico->load($id);	
				
				//gravar os dados
				$servico->excluir($id);
		
				unlink("imagens/uploadsservicos/$id.jpg");
		
		}
	}
	
	//carregar classe PDO
	require_once("../pdo.php");
	
	//Instanciar uma conexão
	$conn 	= new Conexao();

	if($_GET ['p'] == "produtos"){
	//preparar query
	$consulta = $conn->prepare("select * from produtos order by id desc");
	}
	else{
	$consulta = $conn->prepare("select * from servicos order by id desc");
	}
	
	//executar a consulta
	$consulta->execute();
	
?>

<ul>
	<?php
		while($item = $consulta->fetch(PDO::FETCH_OBJ)){
	?>			
		<li style="display:inline-block; text-align:center; width:200px; height:290px; float:left; margin:3px;">
			
			<?php if($_GET ['p'] == "produtos"){?>
			
				<div id="serv" style="width:200px; height:200px;">
					
					<img style="width:200px; height:200px;" src="imagens/uploadsprodutos/<?=$item->id?>.jpg" /> 
					<a title="Excluir este produto" style="display:block; margin-top:-25px; width:200px; text-align:right;" href="index.php?p=produtos&excluir=<?=$item->id?>"><img style="margin-right:3px;" src="imagens/excluir.png" /></a> 
				</div>
                                
				<span style="display:block; width:150px; height:30px; font-size:10px; margin-top:20px;"><?=$item->comentario?></span>
						
				<span style="display:block; width:150px; height:20px; line-height:30px; ">R$<?=$item->valor?></span>
				
			<?php
				}	
			else{	?>
				<div id="serv" style="width:200px; height:200px;">
					
					<img style="width:200px; height:200px;" src="imagens/uploadsservicos/<?=$item->id?>.jpg" /> 
					<a title="Excluir este serviço" style="display:block; margin-top:-25px; width:200px; text-align:right;" href="index.php?p=servicos&excluir=<?=$item->id?>"><img style="margin-right:3px;" src="imagens/excluir.png" /></a> 
				</div>
                                
				<span style="display:block; width:150px; height:30px; font-size:10px; margin-top:20px;"><?=$item->comentario?></span>
								
			<?php
				}
			?>
        </li>
	<?php		
		}
	?>
</ul>