<?php include 'seguranca.php';

?>

<div id="cont">

	<form method="post" action="" enctype="multipart/form-data">
    
		<label for="arquivo" style="display:block; text-align:center;">Clique aqui para
		<input type="file" name="arquivo" id="arquivo"  /></label>
		
		<span style="display:block; text-align:center; margin-top:20px;">Descrição:</span>
		<label for="comentario"><textarea name="comentario" cols="70" rows="10" style="display:block; border:1px solid #000"></textarea> 	
		</label>
		
		<label for="valor" style="display:block; text-align:center; margin-top:20px;">Valor:
		<input type="text" name="valor" id="valor" style="border:1px solid #000"  /></label>
		
		<label for="btnEnviar"><input type="submit" value="Enviar" name="btnEnviar" style="display:block; border:1px solid #000; width:100px; margin-top:20px;" /></label>
	</form>
	
	<?php
	
		if (isset ($_POST['btnEnviar'])){

			include 'recebe_upload.php';
		}
	?>
</div>