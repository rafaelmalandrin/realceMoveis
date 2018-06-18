<div id="agend" style="overflow-y:auto;">

	<?php include 'fotos_listar.php'; ?>

</div>

<div id="pagina" style="background-color:#fff; width: 840px; height:30px;">
	<ol style="display:block; text-align:center; clear:both;">
		<?php
		//repetição para numeros dos links
		for($pag = 1; $pag <= $pagina; $pag++)
		{
		?>  
			<li style="display:inline;"><a style="margin-top:40px;" href="index.php?p=servicos&inicio=<?php echo $pag; ?>"><?php echo $pag; ?></a></li>
		<?php
		}
		?>
</div>

