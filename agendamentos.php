<script type="text/javascript"> 
	$(document).ready( function() {
	$("#formularioContato").validate({
		// Define as regras
		rules:{
			nome:{
				// campoNome será obrigatório (required) e terá tamanho mínimo (minLength)
				required: true
			},
			email:{
				// campoEmail será obrigatório (required) e precisará ser um e-mail válido (email)
				required: true, email: true
			},
			endereco:{
				// campoMensagem será obrigatório (required) e terá tamanho mínimo (minLength)
				required: true
			},
			numero:{
				// campoMensagem será obrigatório (required) e terá tamanho mínimo (minLength)
				required: true , number: true
			},
			bairro:{
				// campoMensagem será obrigatório (required) e terá tamanho mínimo (minLength)
				required: true
			},
			telefone:{
				// campoMensagem será obrigatório (required) e terá tamanho mínimo (minLength)
				required: true
			},
			data:{
				// campoMensagem será obrigatório (required) e terá tamanho mínimo (minLength)
				required: true
			},
			hora:{
				// campoMensagem será obrigatório (required) e terá tamanho mínimo (minLength)
				required: true
			}
		},
		// Define as mensagens de erro para cada regra
		messages:{
			nome:{
				required: "Digite o seu nome",
				
			},
			email:{
				required: "Digite o seu e-mail para contato",
				email: "Digite um e-mail válido"
			},
			endereco:{
				required: "Digite sua rua"
				
			},
			numero:{
				required: "Número de sua residencia",
				number: "Precisa ser um numero"
				
			},
			bairro:{
				required: "Digite seu bairro"
				
			},
			telefone:{
				required: "Digite seu telefone de contato"
				
			},
			data:{
				required: "Escolha uma data"
				
			},
			hora:{
				required: "Escolha uma hora"
				
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

<script type="text/javascript"> 
	$(document).ready( function() {
		$( "#data" ).change(function() {
			data = $(this).val();
			//alert( data );
			$( "#hora" ).load( "hora.php", {data: data} );
		});
	});
	

</script>

<?php
	include('pdo.php');
    include('table.class.php');
    include('agendamento.class.php');
    
    //instanciar banco de dados
    $dbo = database::getInstance();
    
    //instanciar aluno
    $agendamento = new agendamento();
         
    //preparando dados
    if(isset ($_POST['btnEnviar'])){
    $dados = array(
        "nome" => strtoupper($_POST['nome']),
        "endereco" => strtoupper($_POST['endereco']),
        "numero" => $_POST['numero'],
		"bairro" => strtoupper($_POST['bairro']),
		"telefone" => $_POST['telefone'],
		"email" => $_POST['email'],
		"descricao" => $_POST['descricao'],
		"data" => fnc_date_to_mysql($_POST['data']),
		"hora" => $_POST['hora']
    );
    //salvar dados
    $agendamento->bind ($dados);
    $agendamento->store();
    
    }
   
?>

<div id="agend">

	<span class="ag" style="margin-top:30px;"> Faça seu cadastro para agendar uma visita </span>
	
	<form id="formularioContato" action = "#" method = "post">
		
		<div id="form" style="margin-top:40px;">
			<label style="display:block;" for="nome"><span> Nome: </span>
				<input class="ex" type = "text" name = "nome" style="text-transform:uppercase;" />
			</label>
		</div>
		
		<div id="form">
			<label style="display:block;" for="endereco"><span> Endereço: </span>
				<input class="ex" type = "text" name = "endereco" style="text-transform:uppercase;" />
			</label>
		</div>
		
		<div id="form" style="width:254px; float:left;">
			<label for="numero"><span> Número: </span>
				<input style="width:150px;" type = "text" name = "numero" />
			</label>
		</div>
		
		<div id="form">	
			<label style="margin-left:15px" for="bairro"><span style="width:70px;"> Bairro: </span>
				<input style="width:373px;" type = "text" name = "bairro" style="text-transform:uppercase;" />
			</label>
		</div>	
		
		<div id="form" style="width:254px; float:left;">
			<label for="telefone"><span> Telefone: </span>
				<input style="width:150px;" type = "text" name = "telefone" />
			</label>
		</div>
		
		<div id="form">		
			<label style="margin-left:15px" for="email"><span style="width:70px;"> E-mail: </span>
				<input style="width:373px;" type = "text" name = "email" />
			</label>
		</div>
		
		<label for="id" class="ser"><span>Cidade: </span>
			<input type="text" name="id" readonly="readonly" value="Itapira/SP" style="color:#999999; width:95px; font-size:18px; padding:2px 0px 2px 15px;" />
		</label>
		
		<label for="descricao"><textarea placeholder="Descreva o serviço necessário" name="descricao" cols="70" rows="10"></textarea> 	
		</label>
		
		<div id="form" style="width:200px; float:left; margin: 20px; padding-left:140px">
			<label for="data" style="margin-left:10px;"><span style="width:35px"> Dia: </span>
			<select name = "data" id="data">
				<option></option>
			<?php
				date_default_timezone_set("Brazil/East");
				//for para gerar data
				$dia_semana = date("w");
				for($qtd = 1; $qtd <= 10; $qtd++){
					$dia_semana += 1;
					if($dia_semana == 7){
						$dia_semana = 0;
					}
					if($dia_semana != 0 and $dia_semana != 6){
						$data = date('d/m/Y', strtotime("+$qtd days"));
						?> <option> <?php echo $data; ?> </option>
						<?php
					}
					
				}
			?>	
			</select></label>
		</div>
		
		<div id="form" style="width:200px; float:right; margin: 20px; padding-right:90px;">
			<label for="hora" style="margin-left:10px"><span style="width:48px;"> Hora: </span>
			<select name = "hora" id="hora">
			<option> Escolha uma data </option>	
			</select></label>
		</div>
		
		<label for="enviar"><input class="env" type="submit" name="btnEnviar" value="Enviar" />
		</label>
	</form>
</div>
