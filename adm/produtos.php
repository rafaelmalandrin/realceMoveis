<?php include 'seguranca.php';

	//variavel de registros por pagina            
    $lmt = 20;
	
	include '../pagina��o.php';
	
    //preparar par�metros para consulta
        
    //preparar query
    $sql = "select * from produtos";
    $consulta = $conn->query($sql);
	
	//parte da pagina��o
	$quantidade = $consulta->rowCount($sql);
	$sql = "select * from produtos limit $limit_inicio, $lmt";
	$consulta = $conn->query($sql);
	
	$pagina = ceil ($quantidade / $lmt);
?>
 
<div id="cont" style="overflow-y:auto;">
	
	<?php include 'fotos_listar.php'; ?>
	
</div>

<div id="novo">
	<a href="index.php?p=produtos2"><img class="novo" src="imagens/novoProduto.png" /> </a>
</div>
