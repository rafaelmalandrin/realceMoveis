<!DOCTYPE html>
<html>
	
	<head><title> Realce M�veis </title>
	
	<link href="estilos/css1.css" rel="stylesheet" type="text/css" />
	
	</head>
	<body>
	
	<?php
    
		$nome = isset($_SESSION['nome']) ? $_SESSION['nome'] : '';
    
    
    
    
    
    
    
		if(isset($_POST['btnLog'])){
        
			//conectar no banco
			require("../pdo.php");
        
			//instanciar conex�o
			$conn = new Conexao();
        
			//preparar par�metros
			$usuario = $_POST['txtUsuario'];
			$senha = $_POST['txtSenha'];
        
			//preparar consulta sql
			$sql = "select * from usuario where nome = :nome and senha = :senha";
        
			//preparando consulta
			$consulta = $conn->prepare($sql);
        
			//ligar par�metros com a consulta
			$consulta->bindParam(':nome', $usuario, PDO::PARAM_STR);
			$consulta->bindParam(':senha', $senha, PDO::PARAM_STR);
        
			//executar consulta
			$consulta->execute();
			
			$item = $consulta->fetch(PDO::FETCH_OBJ);
    
   
			if($item){
				$_SESSION['logado'] = true;
				$_SESSION['usuario'] = $usuario;
            
            
				header("location: index.php");
			}
			else{
				$erro = true;
            
			}
		}
    
    
?>
		<div id="image">
			<img src="imagens/fundoLogin.png" />
		</div>
	
		<div id="login">
			<form name = "login" action = "" method = "post">
			
				<label for="usuario"><span> Usu�rio: </span>
					<input type = "text" id="txtUsuario" name="txtUsuario" value="<?=$nome?>"  />
				</label>

				<label for="senha"><span> Senha: </span>
					<input type = "password" id="txtSenha" name="txtSenha" />
				</label>
				
				<label for="btnLog">
					<input class="sub" type = "submit" name = "btnLog" value = "Entrar" />
				</label>
				
				<?php	if(isset($erro)){
				?>	<small style="display:block; text-align:center; color:red; margin-top:40px;">Usu�rio ou Senha Inv�lidos!!!</small>            
				<?php      }
				?>        
			</form>		
		</div>
		
	</body>

</html>
