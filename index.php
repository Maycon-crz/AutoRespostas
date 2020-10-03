<?php  require_once("include/cabecalho.php");?>
	<div class='row'>
		<div class='col-12 text-center'>
			<h5>Campo Resposta:<span class='addx'></span></h5>	
		</div>
	</div>
	<div class='row'>
		<div class='col-12 text-center'>
			<button type='button' id='vermsgsprontas' class='mb-2 mt-2 btn btn-primary'>Mensagens prontas</button>
		</div>
	</div>
	<div class='row'>
		<div class='col-12 text-center prontas'>
			<ul>
				<li>
					<input type='text' name='especificapronta' id='especificapronta' placeholder='Procurar por assunto' class='form-control text-center'>
				</li><li>
					<button type='button' id='prontaespecifica' class='form-control btn btn-outline-success'>>></button>								
				</li><li>
					<div id='linhaprontaEspecifica'>---</div>
				</li>
			</ul>
		</div>		
	</div>
	
<?php  require_once("include/rodape.php");?>