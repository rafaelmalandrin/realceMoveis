<?php include 'seguranca.php';
?>
<?php
	$parametro = isset($_GET['p']) ? $_GET['p'] : "home";

?>
<div id="barra">
	<ul>
		<li <?php if ($parametro=="produtos"){echo "style='background-color:#FF9934'";} ?><?php if ($parametro=="produtos2"){echo "style='background-color:#FF9934'";} ?>><a href="index.php?p=produtos"> Produtos </a></li>
		<li <?php if ($parametro=="servicos"){echo "style='background-color:#FF9934'";} ?><?php if ($parametro=="servicos2"){echo "style='background-color:#FF9934'";} ?>><a href="index.php?p=servicos"> Serviços </a></li>
		<li <?php if ($parametro=="agendamentos"){echo "style='background-color:#FF9934'";} ?>><a href="index.php?p=agendamentos"> Agendamentos </a></li>
		<li class="fim" <?php if ($parametro=="faleconosco"){echo "style='background-color:#FF9934'";} ?>><a href="index.php?p=faleconosco"> E-Mail </a></li>
	</ul>
</div>

