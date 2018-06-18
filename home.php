<!--ativando o slide com o codigo em jquery-->

<script type="text/javascript">  

    $(document).ready(function()
    {  
        $('#coin-slider').coinslider();  
    });  

</script>

<script type="text/javascript">  

    $(document).ready(function()
    {  
        $('#coin-slider').coinslider({ width: 800, height: 280 , navigation: false, delay: 5000, spw: 20});  
    });  

</script>

<div id="coin-slider">  
	<a href="imagens/img01.png" target="_blank"><img src='imagens/img01.png' ></a>    
		
	<a href="imagens/img02.png" target="_blank"><img src='imagens/img02.png' ></a>  
	   
	<a href="imagens/img03.png" target="_blank"><img src='imagens/img03.png' ></a>  
		
</div>

<div id="agend" style="width:760px; min-height:400px;">
	<div id="produtos" style="float:left; width:300px; height:400px; margin-left:40px;">

		<?php
			//carregar classe PDO
			require_once("pdo.php");
			
			//Instanciar uma conexão
			$conn 	= new Conexao();
			$consulta = $conn->prepare("select * from produtos order by rand() limit 1");
				
			//executar a consulta
			$consulta->execute();

			$item = $consulta->fetch(PDO::FETCH_OBJ)
		?>			
		
		
		<img style="display:block; width:300px; height:300px;" src="adm/imagens/uploadsprodutos/<?=$item->id?>.jpg" />
           
		<span style="display:block; width:300px; height:200; text-align:center; font-size:20px; margin-top:20px;"><?=$item->comentario?></span>
			
		<span style="display:block; width:154px; height:20px; text-align:center; color:red;">R$<?=$item->valor?></span>

	</div>	

	<div id="servicos" style="float:right; width:300px; height:400px; margin-right:40px;">	
		<?php
			//carregar classe PDO
			require_once("pdo.php");
			
			//Instanciar uma conexão
			$conn 	= new Conexao();
			$consulta = $conn->prepare("select * from servicos order by rand() limit 1");
				
			//executar a consulta
			$consulta->execute();

			$item = $consulta->fetch(PDO::FETCH_OBJ)
		?>			
	
		<img style="display:block; width:300px; height:300px;" src="adm/imagens/uploadsservicos/<?=$item->id?>.jpg" />
           
		<span style="display:block; width:300px; text-align:center; font-size:20px; margin-top:20px;"><?=$item->comentario?></span>
	
	</div>
</div>