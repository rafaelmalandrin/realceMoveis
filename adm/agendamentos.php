<script type="text/javascript"> 
	$(document).ready( function() {
		$( "input[type=checkbox]" ).change(function() {
			ok = $(this).val();
			valor = $(this).prop('checked');
			alert( ok );
			$( "#ok" ).load( "checkbox.php", {"param[]": [ok, valor]} );
		});
	});
	
</script>

<?php include 'seguranca.php';
	
	include('../pdo.php');
    include('table.class.php');
    include('../agendamento.class.php');
	
	//instanciar banco de dados
    $dbo = database::getInstance();
    	
    //instanciar aluno
    $agendamento = new agendamento();
	
	
	if(isset($_GET['excluir'])){ //se o post estiver setado ele irá executar a função abaixo
		
			//instanciar aluno
			$agendamento = new agendamento();
		
			$id = $_GET ['excluir']; //armazena a id pois ela está protegida e nao consigo inserir no formulario
			$agendamento->load($id);	
				
			//gravar os dados
			$agendamento->excluir($id);
			
		}
	
	
	//checkbox
	if(isset($_POST['btn_ok']))
	{
		//pega todos os id's		
		foreach($_POST['todos'] as $key => $valor)
			{
				$agendamento->load($valor);
				$dados = array(
					"ok" => 0
				);
				//salvar dados
				$agendamento->bind ($dados);
				$agendamento->store();
			}
		//pega somentre os id's dos chacbox marcados	
		if(isset($_POST['ok'])){
			foreach($_POST['ok'] as $key => $valor)
				{
					$agendamento->load($valor);
					$dados = array(
						"ok" => 1
					);
					//salvar dados
					$agendamento->bind ($dados);
					$agendamento->store();
				}
		}
	}
	    
	//variavel de registros por pagina            
    $lmt = 30;
	
	include '../paginação.php';
	
    //preparar parâmetros para consulta
        
    //preparar query
    $sql = "select * from agendamento";
    $consulta = $conn->query($sql);
	
	//parte da paginação
	$quantidade = $consulta->rowCount($sql);
	$sql = "select * from agendamento order by data, hora limit $limit_inicio, $lmt";
	$consulta = $conn->query($sql);
	
	$pagina = ceil ($quantidade / $lmt);
	
	//print_r($_POST);
    
?>
<div id="cont" style="padding:0; border:none; width:1100px; min-height:378px;">

	<form method="post">
		<table>
			<tr style="background-color:#8383D6;">
				<th> Data/Hora</th>
				<th> Nome </th>
				<th> Endereço </th>
				<th> Telefone </th>
				<th> E-Mail </th>
				<th> Serviço </th>
				<th><img style="width:15px; height:15px;" src="imagens/check.png" />
			</tr>
			
			<?php
				while($agendamento = $consulta->fetch(PDO::FETCH_OBJ))
				{
					if($agendamento->ok){
						$color = '#9FFFB8';
					}
					else{
						$color = '#FFB3B3';
					}
			?>
					<tr style="background-color:<?php echo $color; ?>";>
						<td style="width:130px;"><?php echo fnc_date_to_br ($agendamento->data) . ', ' .$agendamento->hora ?></td>
						<td><?php echo $agendamento->nome ?></td>
						<td style="width:300px;"><?php echo "$agendamento->endereco, $agendamento->numero, $agendamento->bairro" ?></td>
						<td><?php echo $agendamento->telefone ?></td>
						<td><?php echo $agendamento->email ?></td>
						<td><?php echo $agendamento->descricao ?></td>
						<td style="width:15px;"><input title="Marque um clienta já contatado"<?php /*faz a caixa ficar marcada quando = 1*/ if($agendamento->ok){echo "checked='checked'";} ?> type="checkbox" name="ok[]" id="ok" value="<?php echo $agendamento->id ?>" /></td>
						<input type="hidden" name="todos[]" value="<?php echo $agendamento->id ?>" />
						<td style="width:15px;"><a title="Excluir cadastro" href="index.php?p=agendamentos&excluir=<?=$agendamento->id?>"><img src="imagens/excluir.png" /></a></td>
						
					</tr>
				
			<?php
				}
			?>
					
			
			<tr>
				<td colspan="8"> <!-- colspan mescla a linha de acordo com o valor inserido-->
					<input type="submit" name="btn_ok" value="OK" style="border:1px solid #000; display:block; float:right; width:40px;" />
				</td>
			</tr>
						
		</table>
		
	</form>
	<ol style="display:block; text-align:center; margin-top:20px;">
		<?php
			//repetição para numeros dos links
			for($pag = 1; $pag <= $pagina; $pag++)
			{
		?>        
			<li style="display:inline;"><a href="index.php?p=agendamentos&inicio=<?php echo $pag; ?>"><?php echo $pag; ?></a></li>
		<?php
			}
		?>
	</ol>
</div>

