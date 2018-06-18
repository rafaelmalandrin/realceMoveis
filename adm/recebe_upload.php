<?php
 include 'seguranca.php';


//pega o comentario e grava no BD

//carregar classe PDO
require_once("../pdo.php");
	
//Instanciar uma conexão
$conn 	= new Conexao();
        
	if($_GET ['p'] == "produtos2"){

		$comentario = isset($_POST['comentario']) ? trim($_POST['comentario']) : '';
		$valor = isset($_POST['valor']) ? trim($_POST['valor']) : '';
	
		$sql = "insert into produtos(comentario, valor) values(:comentario, :valor)";
		
		$conn-> beginTransaction ();
		
		$consulta = $conn->prepare($sql);
	
		//carregar parâmetro no placeholder
		
		$consulta->bindParam(':comentario',$comentario, PDO::PARAM_STR);
		$consulta->bindParam(':valor',$valor, PDO::PARAM_STR);
	}
	else{
		
		$comentario = isset($_POST['comentario']) ? trim($_POST['comentario']) : '';
			
		$sql = "insert into servicos(comentario) values(:comentario)";
		
		$conn-> beginTransaction ();	
		
		$consulta = $conn->prepare($sql);
		
		//carregar parâmetro no placeholder
		
		$consulta->bindParam(':comentario',$comentario, PDO::PARAM_STR);
		}
        
//executar a consulta
$consulta->execute();

//pegar ultimo id para nomear a foto
$sql = "select last_insert_id() as lastID";
   
$consulta = $conn->prepare($sql);
 
$consulta->execute();
 
$item = $consulta->fetch(PDO::FETCH_OBJ);


$arquivo_id = $item->lastID;


//echo $_POST['comentario'];

// Pasta onde o arquivo vai ser salvo
if($_GET ['p'] == "produtos2"){
	$_UP['pasta'] = 'imagens/uploadsprodutos/';
}
else{
	$_UP['pasta'] = 'imagens/uploadsservicos/';
}

// Tamanho máximo do arquivo (em Bytes)
$_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb

// Array com as extensões permitidas
$_UP['extensoes'] = array('jpg', 'png', 'gif');

// Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
$_UP['renomeia'] = false;

// Array com os tipos de erros de upload do PHP
$_UP['erros'][0] = "<span style='display:block; text-align:center; color:blue; margin-top:10px;'>Não houve erro</span>";
$_UP['erros'][1] = "<span style='display:block; text-align:center; color:blue; margin-top:10px;'>O arquivo no upload é maior do que o limite do PHP</span>";
$_UP['erros'][2] = "<span style='display:block; text-align:center; color:blue; margin-top:10px;'>O arquivo ultrapassa o limite de tamanho especifiado no HTML</span>";
$_UP['erros'][3] = "<span style='display:block; text-align:center; color:blue; margin-top:10px;'>O upload do arquivo foi feito parcialmente</span>";
$_UP['erros'][4] = "<span style='display:block; text-align:center; color:blue; margin-top:10px;'>Não foi feito o upload do arquivo</span>";

// Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
if ($_FILES['arquivo']['error'] != 0) {
die("<span style='display:block; text-align:center; color:blue; margin-top:20px;'>Não foi possível fazer o upload, erro:</span><br />" . $_UP['erros'][$_FILES['arquivo']['error']]);
exit; // Para a execução do script
}

// Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar

// Faz a verificação da extensão do arquivo
$arq = $_FILES['arquivo']['name'];

$extensao = explode('.', $arq);

$extensao = end($extensao);

$extensao = strtolower($extensao);






if (array_search($extensao, $_UP['extensoes']) === false) {
echo "<span style='display:block; text-align:center; color:blue; margin-top:20px;'>Por favor, envie arquivos com as seguintes extensões: jpg, png ou gif </span>";
$erro = true;
}

// Faz a verificação do tamanho do arquivo
else if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
echo "<span style='display:block; text-align:center; color:blue; margin-top:20px;'> O arquivo enviado é muito grande, envie arquivos de até 2Mb. </span>";
$erro = true;
}

// O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
else {
// Primeiro verifica se deve trocar o nome do arquivo
if ($_UP['renomeia'] == true) {
// Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
$nome_final = time().'.jpg';
} else {
// Mantém o nome original do arquivo
//$nome_final = $_FILES['arquivo']['name'];

$nome_final = $arquivo_id . '.jpg';

}

	// Depois verifica se é possível mover o arquivo para a pasta escolhida
	if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
	// Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
	echo "<span style='display:block; text-align:center; color:blue; margin-top:20px;'> Imagem salva com sucesso! </span>";
	} 
	else {
	// Não foi possível fazer o upload, provavelmente a pasta está incorreta
	echo "<span style='display:block; text-align:center; color:blue; margin-top:20px;'>Não foi possível enviar o arquivo, tente novamente </span>";
	$erro = true;
	}


}
if(!$erro){
	$conn->commit();
}
?>