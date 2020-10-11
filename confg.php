<?php require_once("include/conn.php");?>
<?php

	class msgsProntas{
		function listandoMSGSprontas($con, $ferramentas, $vermsgsprontas){
			// echo json_encode("Bora laa funcao chamada ".$vermsgsprontas);
			$vermsgsprontas = $ferramentas->filtrando($vermsgsprontas);
			$sqlSelectMSGSprontas = "SELECT * FROM mensagensprontas WHERE 1=1 LIMIT $vermsgsprontas";
			$selectMSGSprontas = $con->prepare($sqlSelectMSGSprontas);
			if($selectMSGSprontas->execute()){
				$corpoMSGSprontas = $selectMSGSprontas->fetchAll(PDO::FETCH_ASSOC);
				$MSGSprontasCorpo = "";
				$contadorprontas=0;
				foreach($corpoMSGSprontas as $corpoMSGS){
					$contadorprontas++;
					$MSGSprontasCorpo .= "<ul class='border border-success'>";
					$MSGSprontasCorpo .= "<li><h3 class='mt-4'>Criada Por: </h3></li>";
					$MSGSprontasCorpo .= "<li><input type='text' value='".$corpoMSGS['criadapor']."' class='form-control text-center border border-primary' id='inputCriadaporMSGSdinamicasDB".$contadorprontas."' disabled /></li>";
					$MSGSprontasCorpo .= "<li><h3 class='mt-4'>Assunto:</h3></li>";
					$MSGSprontasCorpo .= "<li><input type='text' value='".$corpoMSGS['assuntomsgpronta']."' class='form-control text-center border border-primary' id='inputAssuntoMSGSdinamicasDB".$contadorprontas."'></li>";
					$MSGSprontasCorpo .= "<li><h3 class='mt-2'>Menssagem: </h4></li>";
					$MSGSprontasCorpo .= "<li><textarea class='form-control border border-warning' id='textareaMSGSdinamicasDB".$contadorprontas."'>".$corpoMSGS['mensagemparacadastro']."</textarea></li>";
					
					//Criar funcao separada para inputs dinamicos
					if($corpoMSGS['inputitensdinamicos1']){
						$MSGSprontasCorpo .= "<li><h3>Dinamicos: </h4></li>";
						$MSGSprontasCorpo .= "<li>
							<h5>
								<input type='text' value='#1' size='2' class='text-center' id='numero1ParametroMSGSdinamicas".$contadorprontas."' disabled /> => ".$corpoMSGS['inputitensdinamicos1']."
								<input type='hidden' value='".$corpoMSGS['inputitensdinamicos1']."' id='nome1ParametroMSGSdinamicas".$contadorprontas."'/>: 
								<input type='text' placeholder='Digite ".$corpoMSGS['inputitensdinamicos1']."' id='valor1ParametroMSGSdinamicas".$contadorprontas."'/>						
							</h5>
						</li>";
						if($corpoMSGS['inputitensdinamicos2'] != ""){
							$MSGSprontasCorpo .= "<li>
								<h5>
									<input type='text' value='#2' size='2' class='text-center' id='numero2ParametroMSGSdinamicas".$contadorprontas."' disabled /> => ".$corpoMSGS['inputitensdinamicos2']."
									<input type='hidden' value='".$corpoMSGS['inputitensdinamicos2']."' id='nome2ParametroMSGSdinamicas".$contadorprontas."'/>: 
									<input type='text' placeholder='Digite ".$corpoMSGS['inputitensdinamicos2']."' id='valor2ParametroMSGSdinamicas".$contadorprontas."'/>							
								</h5>
							</li>";
							if($corpoMSGS['inputitensdinamicos3'] != ""){
								$MSGSprontasCorpo .= "<li>
									<h5>
										<input type='text' value='#3' size='2' class='text-center' id='numero3ParametroMSGSdinamicas".$contadorprontas."' disabled /> => ".$corpoMSGS['inputitensdinamicos3']."
										<input type='hidden' value='".$corpoMSGS['inputitensdinamicos3']."' id='nome3ParametroMSGSdinamicas".$contadorprontas."' />: 
										<input type='text' placeholder='Digite ".$corpoMSGS['inputitensdinamicos3']."' id='valor3ParametroMSGSdinamicas".$contadorprontas."' />								
									</h5>
								</li>";
								if($corpoMSGS['inputitensdinamicos4'] != ""){
									$MSGSprontasCorpo .= "<li>
										<h5>
											<input type='text' value='#4' size='2' class='text-center' id='numero4ParametroMSGSdinamicas".$contadorprontas."' disabled /> => ".$corpoMSGS['inputitensdinamicos4']."
											<input type='hidden' value='".$corpoMSGS['inputitensdinamicos4']."' id='nome4ParametroMSGSdinamicas".$contadorprontas."' />: 
											<input type='text' placeholder='Digite ".$corpoMSGS['inputitensdinamicos4']."' id='valor4ParametroMSGSdinamicas".$contadorprontas."' />									
										</h5>
									</li>";
									if($corpoMSGS['inputitensdinamicos5'] != ""){
										$MSGSprontasCorpo .= "<li>
											<h5>
												<input type='text' value='#5' size='2' class='text-center' id='numero5ParametroMSGSdinamicas".$contadorprontas."' disabled /> => ".$corpoMSGS['inputitensdinamicos5']."
												<input type='hidden' value='".$corpoMSGS['inputitensdinamicos5']."' id='nome5ParametroMSGSdinamicas".$contadorprontas."' />: 
												<input type='text' placeholder='Digite ".$corpoMSGS['inputitensdinamicos5']."' id='valor5ParametroMSGSdinamicas".$contadorprontas."' />										
											</h5>
										</li>";
									}
								}
							}
						}
					}

					$MSGSprontasCorpo .= "<li>
						<button type='button' class='btn btn-success mr-3 btVisualizarMSGSprontaDoDB' id='".$contadorprontas."'>Visualizar</button>
						<button type='button' class='btn btn-warning mr-3'>Gravar Edição</button>
						<button type='button' class='btn btn-danger'>Excluir</button>
					</li>";
					$MSGSprontasCorpo .= "<li id='visualizandoMSGSdb".$contadorprontas."'></li>";
					$MSGSprontasCorpo .= "<li><hr class='bg-dark'/></li>";									
					$MSGSprontasCorpo .= "</ul>";
				}
				echo json_encode($MSGSprontasCorpo);
			}else{
				echo json_encode("Erro ao listar");
			}
		}
		function cadastrandoMSGSprontas($con, $ferramentas, $mensagemParaCadastro, $assuntoMSGpronta, $criadaPor, $inputItensDinamicos1, 
		$inputItensDinamicos2, $inputItensDinamicos3, $inputItensDinamicos4, $inputItensDinamicos5){
			$mensagemParaCadastro = $ferramentas->filtrando($mensagemParaCadastro);
			$assuntoMSGpronta = $ferramentas->filtrando($assuntoMSGpronta);
			$criadaPor = $ferramentas->filtrando($criadaPor);
			$inputItensDinamicos1 = $ferramentas->filtrando($inputItensDinamicos1);
			$inputItensDinamicos2 = $ferramentas->filtrando($inputItensDinamicos2);
			$inputItensDinamicos3 = $ferramentas->filtrando($inputItensDinamicos3);
			$inputItensDinamicos4 = $ferramentas->filtrando($inputItensDinamicos4);
			$inputItensDinamicos5 = $ferramentas->filtrando($inputItensDinamicos5);
			$sqlInsertMSGSprontas = 
				"INSERT INTO mensagensprontas(mensagemparacadastro, assuntomsgpronta, criadapor, inputitensdinamicos1,
				inputitensdinamicos2, inputitensdinamicos3, inputitensdinamicos4, inputitensdinamicos5) 
				VALUES(:mensagemparacadastro, :assuntomsgpronta, :criadapor, :inputitensdinamicos1,
				:inputitensdinamicos2, :inputitensdinamicos3, :inputitensdinamicos4, :inputitensdinamicos5)"
			;
			$insertMSGSprontas = $con->prepare($sqlInsertMSGSprontas);			
			$insertMSGSprontas->bindParam(":mensagemparacadastro", $mensagemParaCadastro);
			$insertMSGSprontas->bindParam(":assuntomsgpronta", $assuntoMSGpronta);
			$insertMSGSprontas->bindParam(":criadapor", $criadaPor);
			$insertMSGSprontas->bindParam(":inputitensdinamicos1", $inputItensDinamicos1);
			$insertMSGSprontas->bindParam(":inputitensdinamicos2", $inputItensDinamicos2);
			$insertMSGSprontas->bindParam(":inputitensdinamicos3", $inputItensDinamicos3);
			$insertMSGSprontas->bindParam(":inputitensdinamicos4", $inputItensDinamicos4);
			$insertMSGSprontas->bindParam(":inputitensdinamicos5", $inputItensDinamicos5);

			if($insertMSGSprontas->execute()){
				echo json_encode("Mensagem cadastrada com sucesso!");
			}else{
				echo json_encode("Erro ao cadastrar!");
			}
		}
	}
	class ferramentas{
		function filtrando($dados){
			$dados = trim($dados);
			$dados = htmlspecialchars($dados);			
			$dados = addslashes($dados);
			return $dados;		
		}
	}
	
	class inicia{
		function iniciando(){
			$banco = new banco;
			$con = $banco->conexao();

			$ferramentas = new ferramentas;			
			$msgsProntas = new msgsProntas;			
	
			if(isset($_POST['vermsgsprontas'])){				
				$msgsProntas->listandoMSGSprontas($con, $ferramentas, $_POST['vermsgsprontas']);
			}
			if( isset($_POST['mensagemParaCadastro']) || isset($_POST['assuntoMSGpronta']) || isset($_POST['criadaPor']) || 
				isset($_POST['inputItensDinamicos1']) || isset($_POST['inputItensDinamicos2']) || isset($_POST['inputItensDinamicos3']) || 
				isset($_POST['inputItensDinamicos4']) || isset($_POST['inputItensDinamicos5']) ){				
				$msgsProntas->cadastrandoMSGSprontas($con, $ferramentas, $_POST['mensagemParaCadastro'], $_POST['assuntoMSGpronta'], $_POST['criadaPor'], $_POST['inputItensDinamicos1'], $_POST['inputItensDinamicos2'], $_POST['inputItensDinamicos3'], $_POST['inputItensDinamicos4'], $_POST['inputItensDinamicos5']);
			}
		}
	}		
	$inicia = new inicia;	
	$inicia->iniciando();
?>