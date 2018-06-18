<?php include 'seguranca.php';
	include('../pdo.php');
    include('table.class.php');
    include('../faleconosco.class.php');
	
	//instanciar banco de dados
    $dbo = database::getInstance();
    	
    //instanciar aluno
    $faleconosco = new faleconosco();
	
	
	if(isset($_GET['excluir'])){ //se o post estiver setado ele irá executar a função abaixo
		
			//instanciar aluno
			$faleconosco = new faleconosco();
		
			$id = $_GET ['excluir']; //armazena a id pois ela está protegida e nao consigo inserir no formulario
			$faleconosco->load($id);	
				
			//gravar os dados
			$faleconosco->excluir($id);
			
		}
	
	
	//checkbox
	if(isset($_POST['btn_ok']))
	{
		//pega todos os id's		
		foreach($_POST['todos'] as $key => $valor)
			{
				$faleconosco->load($valor);
				$dados = array(
					"ok" => 0
				);
				//salvar dados
				$faleconosco->bind ($dados);
				$faleconosco->store();
			}
		//pega somentre os id's dos chacbox marcados	
		if(isset($_POST['ok'])){
			foreach($_POST['ok'] as $key => $valor)
				{
					$faleconosco->load($valor);
					$dados = array(
						"ok" => 1
					);
					//salvar dados
					$faleconosco->bind ($dados);
					$faleconosco->store();
		}		}
	}
		//variavel de registros por pagina            
    $lmt = 30;
	
	include '../paginação.php';
	
	//preparar parâmetros para consulta
        
    //preparar query
    $sql = "select * from faleconosco";
    $consulta = $conn->query($sql);
	
	//parte da paginação
	$quantidade = $consulta->rowCount($sql);
	$sql = "select * from faleconosco limit $limit_inicio, $lmt";
	$consulta = $conn->query($sql);
	
	$pagina = ceil ($quantidade / $lmt);
	
?>

<div id="cont" style="padding:0; border:none; width:1100px; min-height:378px;">
	<form method="post">
		<table>
			<tr style="background-color:#8383D6;">
				<th> E-mail </th>
				<th> Comentário </th>
				<th><img style="width:15px; height:15px;" src="imagens/check.png" />
			</tr>
			
			<?php
				while($faleconosco = $consulta->fetch(PDO::FETCH_OBJ))
				{
				if($faleconosco->ok){
						$color = '#9FFFB8';
					}
					else{
						$color = '#FFB3B3';
					}
					?>
					<tr style="background-color:<?php echo $color ?>";>
						<td><a href="mailto:<?php echo $faleconosco->email ?>"><?php echo $faleconosco->email ?></a></td>
						<td><?php echo $faleconosco->texto ?></td>
						<td style="width:15px;"><input title="Marque uma e-mail já enviado"<?php /*faz a caixa ficar marcada quando = 1*/ if($faleconosco->ok){echo "checked='checked'";} ?> type="checkbox" name="ok[]" value="<?php echo $faleconosco->id ?>" /></td>
						<input type="hidden" name="todos[]" value="<?php echo $faleconosco->id ?>" />
						<td style="width:15px;"><a title="Excluir e-mail" href="index.php?p=faleconosco&excluir=<?=$faleconosco->id?>"><img src="imagens/excluir.png" /></a></td>
					</tr>
			<?php
				
			}
			?>
			<tr>
				<td colspan="4"><!-- colspan mescla a linha de acordo com o valor inserido-->
				<input type="submit" name="btn_ok" value="OK" style="border:1px solid #000; display:block; float:right; width:40px;" />
			</td>
		</table>
	</form>
	<ol style="display:block; text-align:center; margin-top:20px;">
		<?php
			//repetição para numeros dos links
			for($pag = 1; $pag <= $pagina; $pag++)
			{
		?>        
			<li style="display:inline;"><a href="index.php?p=faleconosco&inicio=<?php echo $pag; ?>"><?php echo $pag; ?></a></li>
		<?php
			}
		?>
	</ol>
        
</div>