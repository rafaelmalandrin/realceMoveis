<!--
	lista os produto e consulta por formulário de pesquisa
-->
<?php
	//carregar classe PDO
	require_once("pdo.php");
	
	//Instanciar uma conexão
	$conn 	= new Conexao();

	if($_GET ['p'] == "produtos"){
	//preparar query
	$consulta = $conn->prepare("select * from produtos");
	}
	else{
	$consulta = $conn->prepare("select * from servicos");
	}
	
	//executar a consulta
	$consulta->execute();

	
	
	//paginação
	//variavel de registros por pagina            
    $lmt = 28;
	
	include 'paginação.php';
	
    //preparar parâmetros para consulta
    
	if($_GET ['p'] == "produtos"){
		//preparar query
		$sql = "select * from produtos";
		$consulta = $conn->query($sql);
		
		//parte da paginação
		$quantidade = $consulta->rowCount($sql);
		$sql = "select * from produtos order by id desc limit $limit_inicio, $lmt";
		$consulta = $conn->query($sql);
	}
	else{
		//preparar query
		$sql = "select * from servicos";
		$consulta = $conn->query($sql);
		
		//parte da paginação
		$quantidade = $consulta->rowCount($sql);
		$sql = "select * from servicos order by id desc limit $limit_inicio, $lmt";
		$consulta = $conn->query($sql);
	}
		
	$pagina = ceil ($quantidade / $lmt);
	

?>
 
<ul>
	<?php
		while($item = $consulta->fetch(PDO::FETCH_OBJ)){
	?>			
		<li style="display:inline-block; text-align:center; width:154px; height:210px; margin:0 21px 20px 21px; float:left;">
			
			<?php if($_GET ['p'] == "produtos"){?>
			
				<img style="display:block; width:154px; height:150px;" src="adm/imagens/uploadsprodutos/<?=$item->id?>.jpg" />
                                
				<span style="display:block; width:150px; height:30px; font-size:10px; margin-top:20px;"><?=$item->comentario?></span>
						
				<span style="display:block; width:150px; height:20px; line-height:30px; color:red;">R$<?=$item->valor?></span>
			
			<?php
				}	
				
			else{	?>
				<img style="display:block; width:154px; height:150px;" src="adm/imagens/uploadsservicos/<?=$item->id?>.jpg" />
                                
				<span style="display:block; width:150px; height:30px; font-size:10px; margin-top:20px;"><?=$item->comentario?></span>
			<?php
				}
			?>
        </li>
	<?php		
		}
	?>
</ul>
	
	