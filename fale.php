<script type="text/javascript"> 
	$(document).ready( function() {
	$("#formularioContato").validate({
		// Define as regras
		rules:{
			email:{
				// campoEmail será obrigatório (required) e precisará ser um e-mail válido (email)
				required: true, email: true
			}
		},
		// Define as mensagens de erro para cada regra
		messages:{
			email:{
				required: "Digite o seu e-mail para contato",
				email: "Digite um e-mail válido"
			}
		}
	});
});

</script>
<script type="text/javascript"> 
	function elementSupportsAttribute(element, attribute) {    
		var test = document.createElement(element);
		if (attribute in test) {
			return true;
		} 
		else {  
			return false;
		}};
		
if (!elementSupportsAttribute('textarea', 'placeholder')) { 
	// Fallback for browsers that don't support HTML5 placeholder attribute 
	$("#example-three")    
	.data("originalText", $("#example-three").text())    
	.css("color", "#999")    
	.focus(function() {
		var $el = $(this);
        if (this.value == $el.data("originalText")) {
			this.value = ""; 
			}
		}) 
		.blur(function() {
			if (this.value == "") {
				this.value = $(this).data("originalText");
			}
			});
		} else { 
		// Browser does support HTML5 placeholder attribute, so use it.
		$("#example-three")
			.attr("placeholder", $("#example-three").text())    
			.text("");}
</script>
<?php
    include('pdo.php');
    include('table.class.php');
    include('faleconosco.class.php');
    
    //instanciar banco de dados
    $dbo = database::getInstance();
    
    //instanciar aluno
    $faleconosco = new faleconosco();
         
    //preparando dados
    if(isset ($_POST['enviar'])){
    $dados = array(
        "email" => $_POST['email'],
        "texto" => $_POST['texto']
        );
    //salvar dados
    $faleconosco->bind ($dados);
    $faleconosco->store();
    
    }
   
?>

<div id="agend">

	<span class="ag" style="margin-top:40px;"> Mande um e-mail para contato </span>
	
	<form id="formularioContato" action = "#" method = "post">
		
		<div id="form" style="margin-top:40px; width:438px;">
			<label for="email" style="text-align:center;"><span style="width:70px; padding:0;"> E-mail: </span>
			<input style="width:360px;" type = "text" name = "email" />
			</label>
		</div>
	
		<label for="texto"><textarea placeholder="Escreva o e-mail" name="texto" cols="70" rows="10" style="margin-top:10px;"></textarea> 	
		</label>
	
		<label for="enviar"><input class="env" type="submit" name="enviar" value="Enviar" />
		</label>
	</form>
	
	<span class="ag"> Ou ligue em um dos telefones: </span>
	
	<ol class="telefone">
		<li>(19) 3863.2032</li>
		<li>(19) 3863.3049</li>
		<li>(19) 3863.3123</li>
	</ol>
</div>



