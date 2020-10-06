<?php  require_once("include/cabecalho.php");?>
	<div class='row'>
		<div class='col-12 text-center'>
			<h5>Campo Resposta:<span class='addx'></span></h5>	
		</div>
	</div>
	<div class='row'>
		<div class='col-12 text-center'>
			<button type='button' id='vermsgsprontas' class='form-control mb-2 mt-2 btn btn-primary'>Mensagens prontas</button>
		</div>
	</div>
	<div class='row' id='linhaProntas'>
		<div class='col-12 text-center'>
			<ul>
				<li>
					<input type='text' name='especificapronta' id='especificapronta' placeholder='Procurar por assunto' class='form-control text-center'>
				</li><li>
					<button type='button' id='prontaespecifica' class='form-control btn btn-success'>Procurar->></button>								
				</li><li>
					<div id='linhaProntaEspecifica'>--linhaProntaEspecifica--</div>
				</li><li>
					<div id='linhaTodasProntas'>**linhaTodasProntas**</div>					
				</li><li>
					<button type='button' class='form-control btn btn-secondary'>Mais (+)</button>
				</li>
			</ul>
		</div>		
	</div>
	<div class='row'>
		<div class='col-12 text-center'>
			<button type='button' class='form-control mt-2 btn btn-primary' id='btmostracadprontas'>Cadastrar Mensagem Pronta</button>
		</div>
	</div>
	<div class='row' id='linhaCadastromsgsprontas'>
		<div class='col-12 text-center'>
			<form action='confg.php' method='post' id='formsgsprontas'>
				<ul>
					<li>
						<h5 class='mt-3'>Cadastro de Mensagens Prontas</h5>
					</li><li>											
						<label for='assuntoMSGpronta' class='form-control mt-2 mb-0'><h5>Assunto:</h5></label>
					</li><li>
						<input type='text' name='' id='assuntoMSGpronta' placeholder='Ex: Estismulante...' class='form-control text-center'>
					</li><li>											
						<label for='criadaPor' class='form-control mt-2 mb-0'><h5>Criada Por:</h5></label>
					</li><li>
						<input type='text' name='' id='criadaPor' placeholder='Seu Nome' class='form-control text-center'>
					</li><li>
						<textarea cols='35' rows='5' placeholder='Mensagem...' name='' id='mensagemParaCadastro' class='form-control mt-2'></textarea>
					</li><li>
						<button type='button' id='btAddDinamicos' class='form-control mt-1 btn btn-primary'>Adicionar Dinâmicos</button>
					</li>
					<div id='itensDinamicos' class='mt-2'></div>
					<li>
						<button type='button' id='btVerMSGpronta' class='form-control mt-1 btn btn-primary'>Visualizar</button>
					</li>
					<div id='visualizandoMSGS'></div>
					<li>
						<button type='button' id='btCadastrarMSGpronta' class='form-control mt-1 btn btn-primary'>Cadastrar</button>
					</li>					
				</ul>
			</form>
		</div>
	</div>
	
<?php  require_once("include/rodape.php");?>